<?php
function construct(){

}

function detailAction(){
    $id['slug']= $_GET['slug'];
    load_view('index', $id);
}