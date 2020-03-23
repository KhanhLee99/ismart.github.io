<?php
get_header();
?>
<div class="content">
    <h1>danh sách thành viên</h1>
    <table>
        <?php if (!empty($list_user)) {
        ?>
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Giới tính</td>
                    <td>Thu nhập</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $temp = 0;
                foreach ($list_user as $user) {
                    $temp++;
                ?>
                    <tr>
                        <td><?php echo $temp; ?></td>
                        <td><?php echo $user['fullname'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['gender'] ?></td>
                        <td><?php echo currency_format($user['earn']) ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
        <?php
        } ?>

    </table>

</div>

<?php
get_footer();

?>