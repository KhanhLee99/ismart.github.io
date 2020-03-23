<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    if (is_login()) {
        $fullname = get_fullname($_SESSION['username']);
        $data['fullname'] = $fullname;
        load_view('index', $data);
    } else {
        load_view('index');
    }
}
