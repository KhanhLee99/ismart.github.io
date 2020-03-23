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
                        <?php echo form_error('updateCat') ?>
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="product_cat_name" id="title" value="<?php echo $product_cat['product_cat_name'] ?>">
                        <?php echo form_error('product_cat_name') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label>Danh mục cha</label>
                        <select name="parent_cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_product_cat)) {
                                foreach ($list_product_cat as $cat) {
                                    if ($cat['level'] == 0) {
                            ?>
                                        <option value="<?php echo $cat['product_cat_id'] ?>" <?php if ($cat['product_cat_id'] == $product_cat['parent_id']) echo "selected='selected'" ?>><?php echo $cat['product_cat_name'] ?></option>
                                    <?php
                                    }   
                                }
                            } ?>
                        </select>
                        <?php echo form_error('parent_cat') ?>
                        <button type="submit" name="btn-updateCat" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>