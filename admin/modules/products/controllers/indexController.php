<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    load("helper", "format");
    $list_product = get_list_product();
    $data['list_product'] = $list_product;

    load_view('index', $data);
    show_array($data);
}

function addAction()
{
    global $error, $product_title, $product_price, $product_desc, $product_content, $product_code, $created_by, $created_at, $parent_id;
    if (isset($_POST['btn-add'])) {
        $error = array();

        #product_title
        if (empty($_POST['product_title'])) {
            $error['product_title'] = "Không được để trống phần này";
        } else {
            $product_title = $_POST['product_title'];
        }

        #product_price
        if (empty($_POST['product_price'])) {
            $error['product_price'] = "Không được để trống phần này";
        } else {
            $product_price = $_POST['product_price'];
        }

        #product_desc
        if (empty($_POST['product_desc'])) {
            $error['product_desc'] = "Không được để trống phần này";
        } else {
            $product_desc = $_POST['product_desc'];
        }

        #product_content
        if (empty($_POST['product_content'])) {
            $error['product_content'] = "Không được để trống phần này";
        } else {
            $product_content = $_POST['product_content'];
        }

        #parent_id
        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = "Không được để trống phần này";
        } else {
            $parent_id = $_POST['parent_id'];
        }

        #product_code

        #created_at
        $created_at = time();

        #created_by
        $created_by = $_SESSION['username'];
    }
    if (empty($error)) {
        $data = array(
            'product_title' => $product_title,
            'product_price' => $product_price,
            'product_desc' => $product_desc,
            'product_content' => $product_content,
            'created_at' => $created_at,
            'created_by' => $created_by,
            'parent_id' => $parent_id
        );
        add_product($data);
        $error['add'] = "OK";
    } else {
        $error['add'] = "Error";
    }
    $list_product_cat = get_list_product_cat();
    $data['list_product_cat'] = $list_product_cat;
    load_view('add', $data);
}

function editAction()
{
    $id = (int) $_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
