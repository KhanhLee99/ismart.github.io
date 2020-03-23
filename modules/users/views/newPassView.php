<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i&display=swap&subset=vietnamese" rel="stylesheet">
    <title>Thiết lập mật khẩu mới</title>
    <link rel="stylesheet" href="public/css/reg.css">
</head>

<body>
    <div class="block">
        <div class="image">
            <img src="http://brandio.io/envato/iofrm/html/images/graphic3.svg" alt="">
        </div>
        <div class="form-reg">
            <h3>Input new password</h3>
            <form action="" method="POST">
                <input class="form-control" type="password" name="password" placeholder="New Password" value="">
                <?php echo form_error('password') ?>
                <input class="form-submit" type="submit" name="btn_new_pass" value="Khôi phục mật khẩu">
                <?php echo form_error('check_reset_pass_token') ?>
            </form>
        </div>
    </div>

</body>

</html>