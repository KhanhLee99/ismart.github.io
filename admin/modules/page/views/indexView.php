<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách trang</h3>
                    <a href="?mod=page&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=page">Tất cả <span class="count">(<?php echo $count_page['total_page'] ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=page&status=public">Đã đăng <span class="count">(<?php echo $count_page['total_page_public'] ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=page&status=private">Chờ xét duyệt <span class="count">(<?php echo $count_page['total_page_private'] ?>)</span> |</a></li>
                            <li class="trash"><a href="?mod=page&status=trash">Thùng rác <span class="count">(<?php echo $count_page['total_page_trash'] ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Chỉnh sửa</option>
                                <option value="2">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>

                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Người CN</span></td>
                                    <td><span class="thead-text">Cập nhật</span></td>
                                    <td><span class="thead-text">Người Xóa</span></td>
                                    <td><span class="thead-text">Xóa</span></td>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (!empty($list_pages)) {
                                    $temp = 0;
                                    foreach ($list_pages as $page) {
                                        $temp++;
                                ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="?mod=page&action=detail&id=<?php echo $page['id'] ?>" title=""><?php echo $page['pages_title'] ?></a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="?mod=page&action=update&id=<?php echo $page['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="" title="Xóa" class="delete"  id="<?php echo $page['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>   
                                            </td>

                                            <td><span class="tbody-text status_<?php echo $page['id'] ?>"><?php echo $page['status'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo $page['created_by'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m/Y H:i', $page['created_at'])  ?></span></td>
                                    
                                            <td><span class="tbody-text"><?php echo $page['updated_by'] ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m H:i', $page['updated_at'])  ?></span></td>
                                            <td><span class="tbody-text"><?php echo $page['deleted_by']  ?></span></td>
                                            <td><span class="tbody-text"><?php echo date('d/m H:i', $page['deleted_at'])  ?></span></td>
                                            
                                        </tr>
                                <?php
                                    }
                                } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="tfoot-text">STT</span></td>
                                    <td><span class="tfoot-text">Tiêu đề</span></td>
                                    
                                    <td><span class="tfoot-text">Trạng thái</span></td>
                                    <td><span class="tfoot-text">Người tạo</span></td>
                                    <td><span class="tfoot-text">Thời gian</span></td>
                                    <td><span class="tfoot-text">Cập nhật</span></td>
                                    <td><span class="tfoot-text">Người CN</span></td>
                                    <td><span class="tfoot-text">Xóa</span></td>
                                    <td><span class="tfoot-text">Người Xóa </span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
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