<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục sản phẩm </h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <?php echo form_error('add'); ?>
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="product_cat_name" id="title" value="<?php echo get_value('product_cat_name') ?>">
                        <?php echo form_error('product_cat_name'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label>Danh mục cha</label>
                        <select name="parent_Cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php if (!empty($list_product_cat)) {
                                foreach ($list_product_cat as $cat) {
                                    if ($cat['level'] == 0) {
                            ?>
                                        <option value="<?php echo $cat['product_cat_id'] ?>" <?php if (isset($_POST['btn_add_product_cat']) && empty($error['parent_Cat']) && $_POST['parent_Cat'] == $cat['product_cat_id']) echo "selected = 'selected'" ?>><?php echo $cat['product_cat_name'] ?></option>
                                    <?php
                                    }
                                }
                            } ?>
                        </select>
                        <?php echo form_error('parent_Cat'); ?>
                        <input type="submit" name="btn_add_product_cat" id="btn-submit" value="Thêm danh mục">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>