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
                    <a href="?mod=posts&action=addCat" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                                <?php if (!empty($list_0)) {
                                    $temp = 0;
                                    foreach ($list_0 as $cat_0) {
                                        $temp++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $cat_0['cat_title'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=posts&action=deleteCat&level=<?php echo $cat_0['level'] ?>&id=<?php echo $cat_0['id_0'] ?>" title="Xóa" ><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text"><?php echo $cat_0['level'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cat_0['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $cat_0['created_by'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m/Y H:i:s',$cat_0['created_at'])  ?></span></td>
                                        </tr>
                                        <?php
                                        if (!empty($list_1)) { 
                                            foreach ($list_1 as $cat_1) {
                                                if ($cat_0['id_0'] == $cat_1['id_0']) {
                                                    $temp++;
                                        ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                                        <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                                        <td class="clearfix">
                                                            <div class="tb-title fl-left">
                                                                <a href="" title="">--- <?php echo $cat_1['cat_title'] ?></a>
                                                            </div>
                                                            <ul class="list-operation fl-right">
                                                                <li><a href="?mod=posts&action=updateCat&level=<?php echo $cat_1['level'] ?>&id=<?php echo $cat_1['id_1'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                                <li><a href="?mod=posts&action=deleteCat&level=<?php echo $cat_1['level'] ?>&id=<?php echo $cat_1['id_1'] ?>" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </td>
                                                        <td><span class="tbody-text"><?php echo $cat_1['level'] ?></span></td>
                                                        <td><span class="tbody-text"><?php echo $cat_1['status'] ?></span></td>
                                                        <td><span class="tbody-text"><?php echo $cat_1['created_by'] ?></span></td>
                                                        <td><span class="tbody-text"><?php echo date('d/m/Y H:i:s',$cat_1['created_at'])   ?></span></td>
                                                    </tr>
                                <?php
                                                }
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