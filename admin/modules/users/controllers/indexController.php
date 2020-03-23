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
    // echo time()."<br>";
    // echo date("d/m/Y H:i:s");
    $format = "d/m/Y H:i:s";
    $timestamp = time();
    echo date($format, $timestamp);

    load('helper', 'format');
    $list_user = get_list_user();
    // show_array($list_user);
    $data['list_user'] = $list_user;
    load_view('index', $data);
}

function regAction()
{
//     global $error, $username, $fullname, $email, $password;
//     load('lib', 'mail');

//     if (isset($_POST['btn_reg'])) {
//         $error = array();

//         #fullname
//         if (empty($_POST['fullname'])) {
//             $error['fullname'] = 'Không được để trống fullname';
//         } else {
//             $fullname = $_POST['fullname'];
//         }
//         #username
//         if (empty($_POST['username'])) {
//             $error['username'] = 'Không được để trống username';
//         } else {
//             if (!is_username($_POST['username'])) {
//                 $error['username'] = 'Username không đúng định dạng';
//             } else {
//                 $username = $_POST['username'];
//             }
//         }

//         #email
//         if (empty($_POST['email'])) {
//             $error['email'] = 'Không được để trống email';
//         } else {
//             if (!is_email($_POST['email'])) {
//                 $error['email'] = 'Email không đúng định dạng';
//             } else {
//                 $email = $_POST['email'];
//             }
//         }

//         #password
//         if (empty($_POST['password'])) {
//             $error['password'] = 'Không được để trống password';
//         } else {
//             if (!is_password($_POST['password'])) {
//                 $error['password'] = 'Password không đúng định dạng';
//             } else {
//                 $password = md5($_POST['password']);
//             }
//         }

//         if (empty($error)) {
//             if (!user_exits($username, $email)) {
//                 $active_token = md5($username . time());
//                 $data = array(
//                     'fullname' => $fullname,
//                     'username' => $username,
//                     'email' => $email,
//                     'password' => $password,
//                     'active_token' => $active_token,
//                 );
//                 add_user($data);
//                 $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
//                 $content = "Kích <a href='{$link_active}'>vào đây <a> để xác thực tài khoản";
//                 echo send_mail("levietkhanh99@gmail.com", $fullname, "Xac thuc tai khoan", $content);
//                 // redirect("?mod=users&controller=index&action=index");
//             } else {
//                 $error['account'] = "Username hoặc Email đã tồn tại";
//             }
//         }
//     }
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

// function activeAction()
// {
//     $active_token = $_GET['active_token'];
//     $link_login = base_url("?mod=users&action=login");
//     if (check_active_token($active_token)) {
//         active_user($active_token);
//         echo "<p>Kích hoạt thành công. <a href='{$link_login}'>Đăng nhập</a></p>";
//     } else {
//         echo "Xác thực không hợp lệ hoặc đã kích hoạt <a href='{$link_login}'>Đăng nhập</a>";
//     }
// }

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['username']);

    redirect('?mod=users&action=login');
}

function resetAction()
{
    global $pass_old, $pass_new, $pass_confirm, $error;
    if (isset($_POST['btn-reset'])) {
        $error = array();
        #password - old
        if (empty($_POST['pass-old'])) {
            $error['pass-old'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['pass-old'])) {
                $error['pass-old'] = 'Password không đúng định dạng';
            } else {
                $pass_old = md5($_POST['pass-old']);
            }
        }

        #password - new
        if (empty($_POST['pass-new'])) {
            $error['pass-new'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['pass-new'])) {
                $error['pass-new'] = 'Password không đúng định dạng';
            } else {
                $pass_new = md5($_POST['pass-new']);
            }
        }

        #password - confirm
        if (empty($_POST['confirm-pass'])) {
            $error['confirm-pass'] = 'Không được để trống password';
        } else {
            if (!is_password($_POST['confirm-pass'])) {
                $error['confirm-pass'] = 'Password không đúng định dạng';
            } else {
                $pass_confirm = md5($_POST['confirm-pass']);
            }
        }

        if (empty($error)) {
            if (check_pass_old($pass_old)) {
                if ($pass_new == $pass_confirm) {
                    $change_pass = array(
                        'password' => $pass_new,
                    );
                    change_pass($change_pass, user_login());
                    $error['change'] = "Đổi mật khẩu thành công";
                } else {
                    $error['confirm-pass'] = "Mật khẩu mới không trùng khớp";
                }
            } else {
                $error['pass-old'] = "Mật khẩu cũ không đúng";
            }
        } else {
            $error['change'] = "Đổi mật khẩu không thành công";
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

function updateAction()
{
    global $fullname, $phone_number, $address ,$error;
    if (isset($_POST['btn-update'])) {
        $error = array();
        #fullname
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống fullname';
        } else {
            $fullname = $_POST['fullname'];
        }

        #address
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để trống address';
        } else {
            $address = $_POST['address'];
        }

        #phone
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = 'Không được để trống phone_number';
        } else {
            if (!is_phone($_POST['phone_number'])) {
                $error['phone_number'] = 'Phone_number không đúng định dạng';
            } else {
                $phone_number = $_POST['phone_number'];
            }
        }

        if (empty($error)) {

            $update = array(
                'fullname' => $fullname,
                'address' => $address,
                'phone_number' => $phone_number,
            );
            update_account($update, user_login());
            $error['account'] = "Đã update thành công";
        } else {
            $error['account'] = "Update không thành công";
            // show_array($error);
        }
    }
    $info_user = get_user_by_username(user_login());
    $data['info_user'] = $info_user;
    load_view('update',$data);
}
