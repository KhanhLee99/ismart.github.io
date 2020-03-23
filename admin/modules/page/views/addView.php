<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <?php echo form_error('add-pages') ?>
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="pages_title" id="title" value="<?php echo get_value('pages_title') ?>">
                        <?php echo form_error('pages_title') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="desc">Mô tả</label>
                        <textarea name="pages_content" id="desc" class="ckeditor"><?php echo get_value('pages_content') ?></textarea>
                        <?php echo form_error('pages_content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <?php  ?>
                            <img src="public/images/img-thumb.png">
                        </div>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm bài viết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>