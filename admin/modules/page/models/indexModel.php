<?php

function get_list_pages($status)
{
    if (empty($status)) {
        $list_pages = db_fetch_array("SELECT * FROM `tbl_pages`");
        return $list_pages;
    } else {
        $list_pages = db_fetch_array("SELECT * FROM `tbl_pages` WHERE `status` ='{$status}'");
        return $list_pages;
    }
}


function get_page_by_id($id)
{
    $page = db_fetch_row("SELECT * FROM `tbl_pages` WHERE `id` ={$id}");
    return $page;
}


function add_pages($data){
    return db_insert("tbl_pages", $data);
}

function update_pages($id, $data){
    db_update("tbl_pages", $data, "`id` = {$id}");
}

function count_page(){
    $total_page = db_num_rows("SELECT * FROM `tbl_pages`");
    $total_page_public = db_num_rows("SELECT * FROM `tbl_pages` WHERE `status` = 'public' ");
    $total_page_private = db_num_rows("SELECT * FROM `tbl_pages` WHERE `status` = 'private' ");
    $total_page_trash = db_num_rows("SELECT * FROM `tbl_pages` WHERE `status` = 'trash' ");

    $count = array(
        'total_page' => $total_page,
        'total_page_public' => $total_page_public,
        'total_page_private' => $total_page_private,
        'total_page_trash' => $total_page_trash
    );

    return $count;

}