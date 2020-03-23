<?php
function get_list_product(){
    $list = db_fetch_array("SELECT * FROM `tbl_product`");
    return $list;
}

function get_list_product_cat()
{
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    return $list_product_cat;
}

function add_product($data){
    db_insert("`tbl_product`", $data);
}