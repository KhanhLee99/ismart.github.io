<?php
function construct()
{
    load_model('post');
}

function indexAction()
{
    $list_post = get_list_post();
    $data['list_post'] = $list_post;
    // $cat_name = get_post_cat_by_id(10);
    // echo $cat_name;
    load_view('post', $data);
}

function addPostAction()
{
    global $error, $post_cat, $post_title, $post_desc, $post_content, $created_at, $created_by, $post_image;

    if (isset($_POST['btn-addPost'])) {
        $error = array();

        #post_cat
        if (empty($_POST['post_cat'])) {
            $error['post_cat'] = "Bạn chưa chọn danh mục";
        } else {
            $post_cat = $_POST['post_cat'];
        }

        #post_title
        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Không được để trống mục này";
        } else {
            $post_title = $_POST['post_title'];
        }

        #post_desc
        if (empty($_POST['post_desc'])) {
            $error['post_desc'] = "Không được để trống mục này";
        } else {
            $post_desc = $_POST['post_desc'];
        }

        #post_content
        if (empty($_POST['post_content'])) {
            $error['post_content'] = "Không được để trống mục này";
        } else {
            $post_content = $_POST['post_content'];
        }

        if (isset($_FILES['image'])) {

            $upload_dir = 'public/images/';
            $upload_file = $upload_dir . $_FILES['image']['name'];
            $post_image = $upload_file;
            move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
        } else {
            $error['post_image'] = "Bạn chưa thêm ảnh";
        }

        #created_at
        $created_at = time();

        #created_by
        $created_by = $_SESSION['username'];


        #error
        if (empty($error)) {
            $data = array(
                'post_title' => $post_title,
                'post_desc' => $post_desc,
                'post_content' => $post_content,
                'created_at' => $created_at,
                'created_by' => $created_by,
                'id_parent' => $post_cat,
                'post_image' => $post_image
            );
            // show_array($data);
            add_post($data);
            $error['addPost'] = "OK";
        } else {
            $error['addPost'] = "Error";
        }
    }

    $list_post_parent_cat = get_list_post_parent_cat();
    $list_post_son_cat = get_list_post_son_cat();
    $data = array(
        'list_post_parent_cat' => $list_post_parent_cat,
        'list_post_son_cat' => $list_post_son_cat
    );

    load_view('addPost', $data);
}

function addPostAjaxAction()
{
    $parent_Cat = $_POST['parent_Cat'];
    $list_post_cat_lv1 = get_list_post_cat_lv1($parent_Cat);
    $data = array(
        'list_post_cat_lv1' => $list_post_cat_lv1
    );
    echo json_encode($data);
}

function detailAction()
{
    $id = (int) $_GET['id'];
    $post = get_post_by_id($id);
    $data['post'] = $post;

    load_view('detailPost', $data);
}

function listPostAction()
{
    $id = (int) $_GET['id'];
    $list_post = get_list_post_by_id($id);
    $data['list_post'] = $list_post;
    $data['id'] = $id;
    load_view('listPostEachCat', $data);
}

function updatePostAction()
{
    $id = (int) $_GET['id'];
    global $error, $post_cat, $post_title, $post_desc, $post_content, $post_image;

    if (isset($_POST['btn-updatePost'])) {
        $error = array();

        #post_cat
        if (empty($_POST['post_cat'])) {
            $error['post_cat'] = "Bạn chưa chọn danh mục";
        } else {
            $post_cat = $_POST['post_cat'];
        }

        #post_title
        if (empty($_POST['post_title'])) {
            $error['post_title'] = "Không được để trống mục này";
        } else {
            $post_title = $_POST['post_title'];
        }

        #post_desc
        if (empty($_POST['post_desc'])) {
            $error['post_desc'] = "Không được để trống mục này";
        } else {
            $post_desc = $_POST['post_desc'];
        }

        #post_content
        if (empty($_POST['post_content'])) {
            $error['post_content'] = "Không được để trống mục này";
        } else {
            $post_content = $_POST['post_content'];
        }

        // if (!empty($_FILES['image']['name'])) {

        //     $upload_dir = 'public/images/';
        //     $upload_file = $upload_dir . $_FILES['image']['name'];
        //     $post_image = $upload_file;
        //     move_uploaded_file($_FILES['image']['tmp_name'], $upload_file);
        // }
        // else{
        //     $error['post_image'] = "Bạn chưa thêm ảnh";
        // }

        #error
        if (empty($error)) {
            $data = array(
                'post_title' => $post_title,
                'post_desc' => $post_desc,
                'post_content' => $post_content,
                'id_parent' => $post_cat,
            );
            // show_array($data);
            update_post($data, $id);
            $error['addPost'] = "OK";
        } else {
            $error['addPost'] = "Error";
        }
    }
    $post = get_post_by_id($id);
    $list_post_parent_cat = get_list_post_parent_cat();
    $list_post_son_cat = get_list_post_son_cat();
    $data = array(
        'list_post_parent_cat' => $list_post_parent_cat,
        'list_post_son_cat' => $list_post_son_cat
    );
    $data['post'] = $post;
    // show_array($post);
    load_view('updatePost', $data);
}
