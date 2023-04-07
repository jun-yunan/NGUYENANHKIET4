<div>Quản lý người dùng</div>
<hr>
<div>Người dùng mới</div>
<div>
    <form name="newuser" id="formreg" method="post" action="./elements_NAK/mUser/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    Nam<input type="radio" name="gioitinh" value="1" checked="true">
                    Nữ<input type="radio" name="gioitinh" value="0" />
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh" /></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi" /></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai" /></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới" /></td>
                <td><input type="reset" value="Làm lại" /><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>

<hr>

<?php
require './elements_NAK/mod/userCls.php'
?>
<div class="title_user">Danh sách người dùng</div>
<div class="content_user">
    <?php
    $user = new userCls();
    $list = $user->UserGetAll();
    // $length = count($list_user)
    ?>
    <p>Trong bảng có <b><?php echo count($list); ?></b></p>Tài khoản<br />
    <?php
    if (count($list) > 0) {
        // foreach ($list as $v) {
        //     echo $v->hoten . "<br/>";
    ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Ngày đăng kí</th>
                    <th>Hoạt động</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $v) {
                ?>
                    <tr>
                        <td><?php echo $v->iduser; ?></td>
                        <td><?php echo $v->username; ?></td>
                        <td><?php echo $v->password; ?></td>
                        <td><?php echo $v->hoten; ?></td>
                        <td align="center">
                            <?php
                            if ($v->gioitinh == 0) {
                            ?>
                                <img class="iconimg" src="./img_NAK/girl.png" />
                            <?php
                            } else {
                            ?>
                                <img class="iconimg" src="./img_NAK/boy.png" />
                            <?php
                            }
                            ?>
                        </td>
                        <!-- <td><?php //echo $v->gioitinh; ?></td> -->
                        <td><?php echo $v->ngaysinh; ?></td>
                        <td><?php echo $v->diachi; ?></td>
                        <td><?php echo $v->dienthoai; ?></td>
                        <td><?php echo $v->ngaydangki; ?></td>
                        <td align="center">
                            <?php
                            if ($v->abtility == 0) {
                            ?>
                                <img class="iconimg" src="./img_NAK/clock.png" />
                            <?php
                            } else {
                            ?>
                                <img class="iconimg" src="./img_NAK/unclock.png" />
                            <?php
                            }
                            ?>
                        </td>
                        <!-- <td><?php //echo $v->abtility; ?></td> -->
                        
                        <td>
                            <img class="iconimg" src="./img_NAK/delete.png" alt="">
                            <img class="iconimg" src="./img_NAK/update.png" alt="">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
</div>