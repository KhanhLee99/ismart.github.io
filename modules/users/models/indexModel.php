<?php

function update_reset_pass_token($data, $email)
{
    db_update("tbl_user", $data, "`email` = '{$email}'");
}

function update_pass($data, $reset_pass_token)
{
    db_update("tbl_user", $data, "`reset_pass_token` = '{$reset_pass_token}'");
}

function check_email($email)
{
    $count = db_num_rows("SELECT * FROM `tbl_user` WHERE `email`='{$email}'");
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function check_reset_pass_token($reset_pass_token)
{
    $count = db_num_rows("SELECT * FROM `tbl_user` WHERE `reset_pass_token`='{$reset_pass_token}'");
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function get_list_user()
{
    $list_user = db_fetch_array("SELECT * FROM `tbl_user`");
    return $list_user;
}

function get_user_by_id($id)
{
    $user = db_fetch_row("SELECT * FROM `tbl_user` WHERE `user_id` = {$id}");
    return $user;
}

function user_exits($username, $email)
{
    $count = db_num_rows("SELECT * FROM `tbl_user` WHERE `username`='{$username}' OR `email` = '{$email}'");
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function add_user($data)
{
    return db_insert('tbl_user', $data);
}

function check_login($username, $password)
{
    $count = db_num_rows("SELECT * FROM `tbl_user` WHERE `username`='{$username}' AND `password` = '{$password}'");
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function  active_user($active_token)
{
    return db_update('tbl_user', array('is_active' => 1), "active_token = '{$active_token}'");
}

function check_active_token($active_token)
{
    $count = db_num_rows("SELECT * FROM `tbl_user` WHERE `active_token`='{$active_token}' AND `is_active` = '0'");
    if ($count > 0) {
        return true;
    }
    return false;
}
