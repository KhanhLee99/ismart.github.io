<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="public/vendor/font-awesome.css">
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <div class="block">
        <div class="form-login">
            <h3 class="logo">LOGIN</h3>
            <div class="button">
                <a href="<?php echo base_url("?mod=users&action=login") ?>" class="login">Login</a>
                <a href="<?php echo base_url("?mod=users&action=reg") ?>" class="register">Register</a>
            </div>

            <form action="" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="username" value="<?php echo get_value('username') ?>" placeholder="User Name">
                    <i class="fa fa-user-o icon"></i>
                    <?php echo form_error('username') ?>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" value="" placeholder="Password">
                    <i class="fa fa-unlock-alt icon"></i>
                    <?php echo form_error('password') ?>
                </div>
                <div class="checkbox">
                    <div class="form-check">
                        <input class="remember-me" type="checkbox" name="remember_me" id="remember_me">
                        <label for="remember_me">Rememeber me</label>
                    </div>
                    <a class="forgot-password" href="<?php echo base_url("?mod=users&action=reset") ?>">Forgot Password</a>
                </div>
                <div class="form-group">
                    <input class="form-submit" type="submit" name="btn_login" value="Login">
                    <?php echo form_error('account') ?>
                </div>
            </form>

            <div class="hr"></div>
            <div class="or">
                Or Login With
            </div>
            <div class="social">
                <ul>
                    <li class="facebook"> <a href="">Facebook</a></li>
                    <li class="twitter"><a href="">Twitter</a></li>
                    <li class="google"><a href="">Google</a></li>
                </ul>                
            </div>
        </div>
        <div class="welcome">
            <h1 class="title">Welcome to logdy</h1>
            <p class="content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>
        </div>
    </div>
</body>

</html>