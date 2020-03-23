<?php

function get_fullname($username){
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $user['fullname'];
}