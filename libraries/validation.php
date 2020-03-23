<?php 

function is_username($username){
    $patern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($patern, $username)){
        return false;
    }
    return true;
}

function is_password($password){
    $patern = "/^([A-Z]){1}([\w.\_!@#$%^&*()]+){5,31}$/";
    if(!preg_match($patern, $password)){
        return false;
    }
    return true;
}

function is_email($email){
    $patern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($patern, $email)){
        return false;
    }
    return true;
}

function get_value($field){
    global $$field;
    if(!empty($$field)){
        return $$field;
    }
    return false;
}

function form_error($field){
    global $error;
    if(!empty($error[$field])){
        return "<p style='color:red;'>{$error[$field]}</p>";
    }
    return false;
}