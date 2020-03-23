<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i&display=swap&subset=vietnamese" rel="stylesheet">
    <title>Khôi phục mật khẩu</title>
    <link rel="stylesheet" href="public/css/reg.css">
</head>

<body>
    <div class="block">
        <div class="image">
            <img src="http://brandio.io/envato/iofrm/html/images/graphic3.svg" alt="">
        </div>
        <div class="form-reg">
            <h3>Input your email</h3>
            <form action="" method="POST">
                <input class="form-control" type="text" name="email" placeholder="E-mail Address" value="<?php echo get_value('email') ?>">
                <?php echo form_error('email') ?>
                <input class="form-submit" type="submit" name="btn_reset" value="Tiếp tục">
                <?php echo form_error('check_email') ?>
            </form>
        </div>
    </div>

</body>

</html>