<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i&display=swap&subset=vietnamese" rel="stylesheet">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="public/css/reg.css">
</head>

<body>
    <div class="block">
        <div class="image">
            <img src="http://brandio.io/envato/iofrm/html/images/graphic3.svg" alt="">
        </div>
        <div class="form-reg">
            <h3>Register new account</h3>
            <p>Access to the most powerfull tool in the entire design and web industry.</p>
            <form action="" method="POST">
                <input class="form-control" type="text" name="fullname" placeholder="Full Name" value="<?php echo get_value('fullname') ?>">
                <?php echo form_error('fullname') ?>
                <input class="form-control" type="text" name="username" placeholder="User Name" value="<?php echo get_value('username') ?>">
                <?php echo form_error('username') ?>
                <input class="form-control" type="text" name="email" placeholder="E-mail Address" value="<?php echo get_value('email') ?>">
                <?php echo form_error('email') ?>
                <input class="form-control" type="password" name="password" placeholder="Password" >
                <?php echo form_error('password') ?>
                <input class="form-submit" type="submit" name="btn_reg" value="Register">
                <?php echo form_error('account') ?>
            </form>
            <a href="<?php echo base_url("?mod=users&action=login") ?>" class="login">Đăng nhập</a>
        </div>
    </div>

</body>

</html>