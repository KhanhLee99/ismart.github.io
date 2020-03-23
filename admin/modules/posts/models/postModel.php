<?php
function get_list_post_cat($level)
{
    $list_post_cat = db_fetch_array("SELECT * FROM `tbl_post_cat_lv{$level}`");
    return $list_post_cat;
}

function get_list_post_cat_lv1($parent_Cat)
{
    $list = db_fetch_array("SELECT `tbl_post_cat_lv1`.`cat_title` FROM `tbl_post_cat_lv0` JOIN `tbl_post_cat_lv1` ON `tbl_post_cat_lv0`.`id_0` = `tbl_post_cat_lv1`.`id_0` WHERE `tbl_post_cat_lv0`.`cat_title` = '{$parent_Cat}'");
    return $list;
}

function get_list_post_parent_cat()
{
    $list_post_cat = db_fetch_array("SELECT * FROM `tbl_post_cat` WHERE `level` = '0'");
    return $list_post_cat;
}

function get_list_post_son_cat()
{
    $list_post_cat = db_fetch_array("SELECT * FROM `tbl_post_cat` WHERE `level` = '1'");
    return $list_post_cat;
}

function get_list_post()
{
    $list_post = db_fetch_array("SELECT * FROM `tbl_post`");
    return $list_post;
}

function get_post_cat_by_id($cat_id)
{
    $post_cat = db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `cat_id` = {$cat_id}");
    $cat_name = $post_cat['cat_name'];
    return $cat_name;
}

function get_post_by_id($id){
    $post = db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id` = {$id}");
    return $post;
}

function add_post($data){
    db_insert("`tbl_post`", $data);
}

function get_list_post_by_id($id){
    $list_post = db_fetch_array("SELECT * FROM `tbl_post` WHERE `id_parent` = {$id}");
    return $list_post;
}

function update_post($data, $id){
    db_update("`tbl_post`", $data, "`post_id` = {$id}");
}