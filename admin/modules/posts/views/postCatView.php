<?php
get_header();
?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách danh mục</h3>
                    <a href="?mod=posts&controller=postCat&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($list_post_parent_cat)) {
                                    $temp = 0;
                                    foreach ($list_post_parent_cat as $cat) {
                                        $temp++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo str_repeat("- - ", $cat['level']) . $cat['cat_name'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $cat['level']  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cat['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cat['created_by'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cat['created_at'] ?></span></td>
                                        </tr>
                                        <?php

                                        foreach ($list_post_son_cat as $cat_son) {
                                            if ($cat_son['parent_id'] == $cat['cat_id']) {
                                                $temp++;
                                        ?>
                                                <tr>
                                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                                    <td class="clearfix">
                                                        <div class="tb-title fl-left">
                                                            <a href="?mod=posts&controller=post&action=listPost&id=<?php echo $cat_son['cat_id'] ?>" title=""><?php echo str_repeat("- - ", $cat_son['level']) . $cat_son['cat_name'] ?></a>
                                                        </div>
                                                        <ul class="list-operation fl-right">
                                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                            <li><a href="" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="tbody-text"><?php echo $cat_son['level']  ?></span></td>
                                                    <td><span class="tbody-text"><?php echo $cat_son['status'] ?></span></td>
                                                    <td><span class="tbody-text"><?php echo $cat_son['created_by'] ?></span></td>
                                                    <td><span class="tbody-text"><?php echo date('d/m/Y H:i:s',$cat_son['created_at'])  ?></span></td>
                                                </tr>
                                <?php
                                            }
                                        }
                                    }
                                } ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text-text">Tiêu đề</span></td>
                                    <td><span class="tfoot-text">Thứ tự</span></td>
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                <</a> </li> <li>
                                    <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>