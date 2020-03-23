<?php

function get_list_post_cat()
{
    $list_0 = db_fetch_array("SELECT * FROM `tbl_post_cat_lv0`");
    $list_1 = db_fetch_array("SELECT * FROM `tbl_post_cat_lv1`");
    $list_post_cat = array(
        'list_0' => $list_0,
        'list_1' => $list_1
    );
    return $list_post_cat;
}

function delete_post_cat($id, $level)
{
    if ($level != 0) {
        db_delete("tbl_post_cat_lv$level", "`id_$level` = $id AND `level` = $level");
    } else {
        db_delete("tbl_post_cat_lv1", "`id_0` = $id");
        db_delete("tbl_post_cat_lv$level", "`id_$level` = $id AND `level` = $level");
    }
}

function get_list_parent_cat()
{
    return db_fetch_array("SELECT * FROM `tbl_post_cat_lv0`");
}

function get_id_parent_cat($parent_cat)
{
    $parent_cat = db_fetch_row("SELECT * FROM `tbl_post_cat_lv0` WHERE `cat_title` ='{$parent_cat}' ");
    return $parent_cat['id_0'];
}

function add_cat($data)
{
    db_insert("`tbl_post_cat_lv1`", $data);
}

function get_post_cat_by_id_level($id, $level)
{
    $cat = db_fetch_row("SELECT * FROM `tbl_post_cat_lv{$level}` WHERE `id_{$level}` = {$id}");
    return $cat;
}

function get_cat_title_by_id($id_0)
{
    $cat = db_fetch_row("SELECT * FROM `tbl_post_cat_lv0` WHERE `id_0` = {$id_0}");
    return $cat['cat_title'];
}

function update_cart($data, $id, $level){
    db_update("`tbl_post_cat_lv{$level}`", $data, "`id_{$level}` = {$id}");
}