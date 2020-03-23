<?php
function construct()
{
    load_model('index');
}

function detailAction()
{
    $id = $_GET['id'];
    $page = get_page_by_id($id);

    $data['page'] = $page;
    // show_array($data);
    load_view('detail', $data);
}

function indexAction()
{
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    $list_pages = get_list_pages($status);
    $data['list_pages'] = $list_pages;

    $count_page = count_page();
    $data['count_page'] = $count_page;
    // show_array($list_pages);
    load_view('index', $data);
}

function addAction()
{
    global $pages_title, $pages_content, $error;
    if (isset($_POST['btn-add'])) {
        $error = array();

        #pages_title
        if (empty($_POST['pages_title'])) {
            $error['pages_title'] = "Không được để trống phần này";
        } else {
            $pages_title = $_POST['pages_title'];
        }

        #pages_content
        if (empty($_POST['pages_content'])) {
            $error['pages_content'] = "Không được để trống phần này";
        } else {
            $pages_content = $_POST['pages_content'];
        }

        #created_at
        $created_at = time();
       
        #created_by
        if (is_login()) {
            $created_by = $_SESSION['username'];
        }

        if (empty($error)) {
            $data = array(
                'pages_title' => $pages_title,
                'pages_content' => $pages_content,
                'created_at' => $created_at,
                'created_by' => $created_by
            );
            add_pages($data);
            // show_array($data);
            $error['add-pages'] = "Đã thêm bài viết, chờ xét duyệt";
        } else {
            $error['add-pages'] = "Lỗi";
        }
    }
    load_view('add');
}

function updateAction()
{
    global $pages_title, $pages_content, $error;
    $id = (int)$_GET['id'];
    if (isset($_POST['btn-update'])) {
        $error = array();

        #pages_title
        if (empty($_POST['pages_title'])) {
            $error['pages_title'] = "Không được để trống phần này";
        } else {
            $pages_title = $_POST['pages_title'];
        }

        #pages_content
        if (empty($_POST['pages_content'])) {
            $error['pages_content'] = "Không được để trống phần này";
        } else {
            $pages_content = $_POST['pages_content'];
        }

        #updated_at
        $updated_at = time();
        

        #updated_by
        if (is_login()) {
            $updated_by = $_SESSION['username'];
        }

        if (empty($error)) {
            $data = array(
                'pages_title' => $pages_title,  
                'pages_content' => $pages_content,
                'updated_at' => $updated_at,
                'updated_by' => $updated_by
            );
            update_pages($id, $data);
            // show_array($data);
            $error['add-pages'] = "Đã cập nhật bài viết, chờ xét duyệt";
        } else {
            $error['add-pages'] = "Lỗi";
        }
    }

    $page = get_page_by_id($id);
    $data['page'] = $page;
    load_view('update', $data);
}

function deleteAction(){
    $id = (int)$_GET['id'];

    #status
    $status = "trash";

    #deleted_at
    $deleted_at = time();

    #deleted_by
    if (is_login()) {
        $deleted_by = $_SESSION['username'];
    }

    $data = array(
        'status' => $status,
        'deleted_at' => $deleted_at,
        'deleted_by' => $deleted_by
    );
    update_pages($id, $data);
    redirect("?mod=page&action=index");
}

function deleteAjaxAction(){
    $id = $_POST['id'];

    #status
    $status = "trash";

    #deleted_at
    $deleted_at = time();

    #deleted_by
    if (is_login()) {
        $deleted_by = $_SESSION['username'];
    }

    $data = array(
        'status' => $status,
        'deleted_at' => $deleted_at,
        'deleted_by' => $deleted_by
    );
    update_pages($id, $data);

    echo json_encode($data);
}