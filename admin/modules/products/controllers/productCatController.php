<?php

function construct() {
    load_model('productCat');
}

function indexAction(){
    $list_product_cat = get_list_product_cat();
    $data['list_product_cat'] = $list_product_cat; 
    // show_array($list_product_cat);
    load_view('productCat', $data);
}

function addAction(){
    global $error, $product_cat_name, $parent_Cat, $created_by, $created_at;
    if(isset($_POST['btn_add_product_cat'])){
        #product_cat_name
        if(empty($_POST['product_cat_name'])){
            $error['product_cat_name'] = "Không được để trống phần này";
        }
        else{
            $product_cat_name = $_POST['product_cat_name'];
        }

        #parent_Cat
        if(empty($_POST['parent_Cat'])){
            $error['parent_Cat'] = "Không được để trống phần này";
        }
        else{
            $parent_Cat = $_POST['parent_Cat'];
        }

        #created_by
        $created_by = $_SESSION['username'];

        #created_at
        $created_at = time();

        if(empty($error)){
            $data = array(
                'product_cat_name' => $product_cat_name,
                'parent_id' => $parent_Cat,
                'created_by' => $created_by,
                'created_at' => $created_at
            );
            add_product_cat($data);
            $error['add'] = "OK";
        }
        else{
            $error['add'] = "Error";
        }
    }
    $list_product_cat = get_list_product_cat();
    $data['list_product_cat'] = $list_product_cat; 
    load_view('addCat', $data);
}

function updateAction(){
    $id = (int)$_GET['id'];
    global $error, $product_cat_name, $parent_cat;
    if(isset($_POST['btn-updateCat'])){
        #product_cat_name
        if(empty($_POST['product_cat_name'])){
            $error['product_cat_name'] = "Không được để trống mục này";
        }
        else{
            $product_cat_name = $_POST['product_cat_name'];
        }

        #parent_cat
        if(empty($_POST['parent_cat'])){
            $error['parent_cat'] = "Không được để trống mục này";
        }
        else{
            $parent_cat = $_POST['parent_cat'];
        }

        if(empty($error)){
            $data = array(
                'product_cat_name' => $product_cat_name,
                'parent_id' => $parent_cat,
            ); 
            update_product_cat($data, $id);
            $error['updateCat'] = "OK";
        }
        else{
            $error['updateCat'] = "Error";
        }
    }
    $product_cat = get_product_cat_by_id($id);
    $list_product_cat = get_list_product_cat();
    $data['product_cat'] = $product_cat;
    $data['list_product_cat'] = $list_product_cat;
    load_view('updateCat', $data);
}