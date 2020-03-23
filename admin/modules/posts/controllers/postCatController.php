<?php
function construct()
{
    load_model('postCat');
}

function postCatAction()
{
    $list_post_parent_cat = get_list_post_parent_cat();
    $list_post_son_cat = get_list_post_son_cat();
    $data = array(
        'list_post_parent_cat' => $list_post_parent_cat,
        'list_post_son_cat' => $list_post_son_cat
    );
    // show_array($list_post_son_cat);
    load_view('postCat', $data);
}

function addAction()
{
    global $error, $cat_name, $parent_Cat,  $created_by, $created_at;
    if (isset($_POST['btn_add_post_cat'])) {
        $error = array();

        #cat_name
        if (empty($_POST['cat_name'])) {
            $error['cat_name'] = "Không được để trống mục này";
        } else {
            $cat_name = $_POST['cat_name'];
        }

        #parent_Cat
        if (empty($_POST['parent_Cat'])) {
            $error['parent_Cat'] = "Không được để trống mục này";
        } else {
            $parent_Cat = $_POST['parent_Cat'];
        }

        #created_by
        $created_by = $_SESSION['username'];

        #created_at
        $created_at = time();

        #error
        if (empty($error)) {
            $data = array(
                'cat_name' => $cat_name,
                'parent_id' => $parent_Cat,
                'level' => '1',
                'created_by' => $created_by,
                'created_at' => $created_at
            );
            add_post_son_cat($data);
            // show_array($data);
            
            $error['add'] = "OK";
        }
        else{
            $error['add'] = "Error";
        }
    }
    
    
    $list_post_parent_cat = get_list_post_parent_cat();
    $data['list_post_parent_cat'] = $list_post_parent_cat;
    load_view('addPostCat', $data);
}
