<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo base_url(); ?>" />
    <link href="public/css/style.css" rel="stylesheet" href="">
</head>

<body>
    <div class="wrapper">
        <?php if (is_login()) {
        ?>
            <div class="top">
                <p class="hello">Xin chào <b class="name"><?php echo $fullname ?></b> | <a href="<?php echo base_url("?mod=users&action=logout") ?>">Thoát</a></p>
            </div>
        <?php
        } ?>

        <div class="header">
            <ul class="main-menu">
                <li><a href="?">Trang chủ</a></li>
                <li><a href="?mod=page&controller=index&action=detail&id=1">Giới thiệu</a></li>
                <li><a href="?mod=users&controller=index&action=index">Thành viên</a></li>
                <li><a href="?mod=products&controller=index&action=index">Sản phẩm</a></li>
                <li><a href="?mod=users&controller=index&action=reg">Đăng nhập</a></li>
            </ul>
        </div>