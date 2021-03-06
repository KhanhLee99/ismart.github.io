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
                        <?php echo form_error('addCat') ?>
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="cat_title" id="title" value="<?php echo get_value('cat_title') ?>">
                        <?php echo form_error('cat_title') ?>
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
                        <select name="parent-cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_parent_cat)) {
                                foreach ($list_parent_cat as $cat) {
                            ?>
                                    <option value="<?php echo $cat['cat_title'] ?>" <?php if (isset($_POST['btn-addCat']) && empty($error['parent-cat']) && $_POST['parent-cat'] == $cat['cat_title']) echo "selected='selected'" ?>><?php echo $cat['cat_title'] ?></option>
                            <?php
                                }
                            } ?>


                        </select>
                        <?php echo form_error('parent-cat') ?>
                        <button type="submit" name="btn-addCat" id="btn-submit">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>