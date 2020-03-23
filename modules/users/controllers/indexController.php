<?php

use function GuzzleHttp\Psr7\_parse_message;

function construct()
{
    // echo "Dùng chung";
    load_model('index');
}

function indexAction()
{
    // echo "Hiển thị danh sách";
    load('helper', 'format');
    $list_user = get_list_user();
    // show_array($list_user);
    $data['list_user'] = $list_user;
    load_view('index', $data);
}

function regAction()
{
    global $error, $username, $fullname, $email, $password;
    load('lib', 'mail');

    if (isset($_POST['btn_reg'])) {
        $error = array();

        #fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống fullname';
        } else {
            $fullname = $_POST['fullname'];
        }
        #username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống username';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Username không đúng định dạng';
            } else {
                $username = $_POST['username'];
            }
        }

        #email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không đúng định dạng';
            } else {
                $email = $_POST['email'];
            }
        }

        #password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = 'Password không đúng định dạng';
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($error)) {
            if (!user_exits($username, $email)) {
                $active_token = md5($username . time());
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'active_token' => $active_token,
                );
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "Kích <a href='{$link_active}'>vào đây <a> để xác thực tài khoản";
                echo send_mail("levietkhanh99@gmail.com", $fullname, "Xac thuc tai khoan", $content);
                // redirect("?mod=users&controller=index&action=index");
            } else {
                $error['account'] = "Username hoặc Email đã tồn tại";
            }
        }
    }
    load_view('reg');
}



function loginAction()
{
    global $error, $username, $password;
    if (isset($_POST['btn_login'])) {
        $error = array();
        #username
        if (empty($_POST['username'])) {
            $error['username'] = 'Không được để trống username';
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = 'Username không đúng định dạng';
            } else {
                $username = $_POST['username'];
            }
        }

        #password
        if (empty($_POST['password'])) {
            $error['password'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = 'Password không đúng định dạng';
            } else {
                $password = md5($_POST['password']);
            }
        }

        if (empty($error)) {
            if (check_login($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['username'] = $username;

                redirect("?mod=home&action=index");
            } else {
                $error['account'] = "Tài khoản không đúng hoặc không tồn tại";
            }
        }
    }
    load_view('login');
}

function activeAction()
{
    $active_token = $_GET['active_token'];
    $link_login = base_url("?mod=users&action=login");
    if (check_active_token($active_token)) {
        active_user($active_token);
        echo "<p>Kích hoạt thành công. <a href='{$link_login}'>Đăng nhập</a></p>";
    } else {
        echo "Xác thực không hợp lệ hoặc đã kích hoạt <a href='{$link_login}'>Đăng nhập</a>";
    }
}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['username']);

    redirect('?mod=users&action=login');
}

function resetAction()
{
    load('lib', 'mail');
    global $error, $password, $email;

    if (isset($_POST['btn_reset'])) {
        $error = array();
        #email
        if (empty($_POST['email'])) {
            $error['email'] = 'Không được để trống email';
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Email không đúng định dạng';
            } else {
                $email = $_POST['email'];
            }
        }

        if (empty($error)) {
            if (check_email($email)) {
                $reset_pass_token = md5($email . time());
                $data = array(
                    'reset_pass_token' => $reset_pass_token,
                );
                update_reset_pass_token($data, $email);
                $link_reset = base_url("?mod=users&action=newPass&reset_pass_token={$reset_pass_token}");
                $content = "<p>Click <a href='{$link_reset}'>vào đây</a> để xác thực khôi phục mật khẩu</p>";
                echo send_mail("levietkhanh99@gmail.com", "", "Khôi phục mật khẩu", $content);
                $error['check_email'] = "Yêu cầu xác thức tại email của bạn";
            } else {
                $error['check_email'] = "Email not exits";
            }
        }
    }
    load_view('reset');
}

function newPassAction()
{
    global $error, $password;
    $reset_pass_token = $_GET['reset_pass_token'];
    if (!empty($reset_pass_token)) {
        if (isset($_POST['btn_new_pass'])) {
            $error = array();
            if (empty($_POST['password'])) {
                $error['password'] = "Không được để trống password";
            } else {
                if (!is_password($_POST['password'])) {
                    $error['password'] = "Password không đúng định dạng";
                } else {
                    $password = md5($_POST['password']);
                }
            }
            if (empty($error)) {
                if (check_reset_pass_token($reset_pass_token)) {
                    $data = array(
                        'password' => $password,
                    );
                    update_pass($data, $reset_pass_token);
                    $link_login = base_url("?mod=users&action=login");
                    $error['check_reset_pass_token'] = "Chúc mừng bạn đã thiết lập mật khẩu mới thành công. Click <a href = '{$link_login}'>vào đây</a> để đăng nhập !";
                } else {
                    $error['check_reset_pass_token'] = "Thiết lập mật khẩu mới không thành công";
                }
            }
        }
        load_view('newPass');
    }
}
