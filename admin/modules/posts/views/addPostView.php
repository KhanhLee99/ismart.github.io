<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <?php echo form_error('addPost') ?>

                        <label for="post_title">Tiêu đề</label>
                        <input type="text" name="post_title" id="post_title" value="<?php echo get_value('post_title') ?>">
                        <?php echo form_error('post_title') ?>

                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">

                        <label for="post_desc">Mô tả</label>
                        <textarea name="post_desc" id="post_desc"><?php echo get_value('post_desc') ?></textarea>
                        <?php echo form_error('post_desc') ?>

                        <label for="post_content">Nội dung</label>
                        <textarea name="post_content" id="post_content" class="ckeditor"><?php echo get_value('post_content') ?></textarea>
                        <?php echo form_error('post_content') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="image" id="upload-thumb">
                        </div>

                        <label>Danh mục cha</label>
                        <select name="post_cat" id="select">
                            <option value="">-- Chọn danh mục --</option>
                            <?php
                            $temp = 0;
                            foreach ($list_post_parent_cat as $parent_cat) {
                                foreach ($list_post_son_cat as $son_cat) {
                                    if ($parent_cat['cat_id'] == $son_cat['parent_id']) {
                                        $temp++;
                            ?>
                                        <option value="<?php echo $son_cat['cat_id'] ?>" <?php if (isset($_POST['btn-addPost']) && empty($error['post_cat']) && $_POST['post_cat'] == $son_cat['cat_id']) echo "selected = 'selected'" ?>><?php echo $temp . ". " . $parent_cat['cat_name'] . " - " . $son_cat['cat_name'] ?></option>
                            <?php
                                    }
                                }
                            } ?>
                        </select>
                        <?php echo form_error('post_cat') ?>
                        <button type="submit" name="btn-addPost">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>