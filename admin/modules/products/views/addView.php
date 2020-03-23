<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo form_error('add') ?>
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_title" id="product-name">
                        <?php echo form_error('product_title') ?>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="product_price" id="price">
                        <?php echo form_error('product_title') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc"></textarea>
                        <?php echo form_error('product_desc') ?>
                        <label for="desc">Chi tiết</label>
                        <textarea name="product_content" id="desc" class="ckeditor"></textarea>
                        <?php echo form_error('product_content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb">
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="public/images/img-thumb.png">
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_product_cat)) {
                                foreach ($list_product_cat as $cat) {
                                    if ($cat['level'] == 0) {
                            ?>
                                        <option value="<?php echo $cat['product_cat_id'] ?>"><?php echo $cat['product_cat_name'] ?></option>
                            <?php
                                    }
                                }
                            } ?>
                        </select>
                        <?php echo form_error('parent_id') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>