<?php
function get_list_post_parent_cat(){
    $list_post_cat = db_fetch_array("SELECT * FROM `tbl_post_cat` WHERE `level` = '0'");
    return $list_post_cat;
}

function get_list_post_son_cat(){
    $list_post_cat = db_fetch_array("SELECT * FROM `tbl_post_cat` WHERE `level` = '1'");
    return $list_post_cat;
}

function add_post_son_cat($data){
    db_insert("`tbl_post_cat`", $data);
}