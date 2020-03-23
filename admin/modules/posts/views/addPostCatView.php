<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <?php echo form_error('add'); ?>
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="cat_name" id="title" value="<?php echo get_value('cat_name') ?>">
                        <?php echo form_error('cat_name'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="desc">Mô tả</label>
                        <textarea name="desc" id="desc" class="ckeditor"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">
                        </div>
                        <label>Danh mục cha</label>
                        <select name="parent_Cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_post_parent_cat)) {
                                foreach ($list_post_parent_cat as $post_cat) {
                            ?>
                                    <option value="<?php echo $post_cat['cat_id'] ?>" <?php if (isset($_POST['btn_add_post_cat']) && empty($error['parent_Cat']) && $_POST['parent_Cat'] == $post_cat['cat_id']) echo "selected = 'selected'" ?>><?php echo $post_cat['cat_name'] ?></option>
                            <?php
                                }
                            } ?>
                        </select>
                        <?php echo form_error('parent_Cat'); ?>
                        <input type="submit" name="btn_add_post_cat" id="btn-submit" value="Thêm danh mục">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>