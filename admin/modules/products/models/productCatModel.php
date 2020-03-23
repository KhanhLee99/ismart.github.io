<?php

function get_list_product_cat()
{
    $list_product_cat = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    return $list_product_cat;
}

function get_product_cat_by_id($id)
{
    $product_cat = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `product_cat_id` = {$id}");
    return $product_cat;
}

function add_product_cat($data)
{
    db_insert("`tbl_product_cat`", $data);
}

function update_product_cat($data, $id)
{
    db_update("`tbl_product_cat`", $data, "`product_cat_id`={$id}");
}
