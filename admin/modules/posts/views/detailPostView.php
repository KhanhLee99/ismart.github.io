<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/post-content.css">
    <title>Document</title>
</head>

<body>
    <div class="post">
        <div class="post-title">
            <h1><?php echo $post['post_title'] ?></h1>
        </div>
        <div class="post-content">
            <?php echo $post['post_content'] ?>
        </div>
    </div>

</body>

</html>