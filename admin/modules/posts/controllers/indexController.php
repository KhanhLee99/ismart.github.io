<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
}

function addAction()
{
    load_view('add');
}

function indexCatAction()
{
    $list_post_cat = get_list_post_cat();
    $data['list_0'] = $list_post_cat['list_0'];
    $data['list_1'] = $list_post_cat['list_1'];
    //show_array($list_post_cat);
    load_view('indexCat', $data);
}

function deleteCatAction()
{
    $id = (int) $_GET['id'];
    $level = (int) $_GET['level'];
    // $data = array(
    //     'id' => $id,
    //     'level' => $level
    // );


    delete_post_cat($id, $level);

    redirect("?mod=posts&action=indexCat");
}

function addCatAction()
{

    //show_array($list_parent_cat);
    global $error, $cat_title, $parent_cat;
    if (isset($_POST['btn-addCat'])) {
        $error = array();
        #cat_title
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Không được để trống mục này";
        } else {
            $cat_title = $_POST['cat_title'];
        }

        #parent_cat
        if (empty($_POST['parent-cat'])) {
            $error['parent-cat'] = "Không được để trống mục này";
        } else {
            $parent_cat = $_POST['parent-cat'];
        }

        #created_by
        $created_by = $_SESSION['username'];

        #created_at
        $time = time();

        if (empty($error)) {
            $id_parent_cat = get_id_parent_cat($parent_cat);
            $data = array(
                'cat_title' => $cat_title,
                'id_0' => $id_parent_cat,
                'created_by' => $created_by,
                'created_at' => $time,
            );
            add_cat($data);
            $error['addCat'] = "OK";
        } else {
            $error['addCat'] = "Lỗi";
        }
    }
    $list_parent_cat = get_list_parent_cat();
    $data['list_parent_cat'] = $list_parent_cat;
    load_view('addCat', $data);
}

function updateCatAction()
{
    $id = (int) $_GET['id'];
    $level = (int) $_GET['level'];
    global $error, $cat_title, $parent_cat;
    if(isset($_POST['btn-updateCat'])){
        $error = array();

        #cat_title
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Không được để trống mục này";
        } else {
            $cat_title = $_POST['cat_title'];
        }

        #parent_cat
        if (empty($_POST['parent-cat'])) {
            $error['parent-cat'] = "Không được để trống mục này";
        } else {
            $parent_cat = $_POST['parent-cat'];
        }

        if(empty($error)){
            $data = array(
                'cat_title' => $cat_title,
            );
            update_cart($data, $id, $level);
            
            $error['updateCat'] = "OK";
        }
        else{
            $error['updateCat'] = "Error";
        }

    }
   
    $cat = get_post_cat_by_id_level($id, $level);

    $list_parent_cat = get_list_parent_cat();
    $data['list_parent_cat'] = $list_parent_cat;
    $data['cat'] = $cat;
    if ($level != 0) {
        $id_0 = $cat['id_0'];
        $parent_cat = get_cat_title_by_id($id_0);
        $data['parent_cat'] = $parent_cat;
    }

    
    load_view('updateCat', $data);
  //  show_array($cat);
}
