<?php

function get_fullname($username){
    $user = db_fetch_row("SELECT * FROM `tbl_user` WHERE `username` = '{$username}'");
    return $user['fullname'];
}