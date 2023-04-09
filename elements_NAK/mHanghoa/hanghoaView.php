<?php
require './elements_NAK/mod/loaihangCls.php';
$obj = new loaihang();
$list_loaihang = $obj->LoaihangGetAll();
?>

<div><img class="iconimg" src="./img_NAK/goods.png" alt="">Quản lý hàng hoá</div>
<hr>
<div class="title_mod"><img src="./img_NAK/insert.png" alt="" class="iconimg">Thêm hàng hoá</div>
<div class="content_mod">
    <form name="newhanghoa" id="formadd_hanghoa" method="post" enctype="multipart/form-data" action="./elements_NAK/mHanghoa/hanghoaAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên loại hàng</td>
                <td><input type="text" name="tenhanghoa"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><textarea name="mota" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Giá tham khảo</td>
                <td><input type="number" name="giathamkhao"></td>
            </tr>
            <tr>
                <td>Tên hình ảnh:</td>
                <td><input type="text" name="tenhinhanh"></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input type="file" name="fileimage"></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_loaihang as $l) {
                        ?>
                        <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang;?>">
                        <img class="iconimg" src="data:image/png;base64, <?php echo $l->hinhanh;?>" alt="">
                        <?php echo ($l->tenloaihang);?><br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"></td>
                <td><input type="reset" value="Làm lại"><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>

<hr>

<div class="title_mod"><img class="iconimg" src="./img_NAK/list.png" alt="">Danh sách hàng hoá</div>
<div class="content_mod">
    <?php
    require './elements_NAK/mod/hanghoaCls.php';
    $obj_hanghoa = new hanghoa();
    $listhanghoa = $obj_hanghoa->HanghoaGetAll();
    $lengthanghoa = count($listhanghoa);
    ?>
    <p>Trong bảng có <b><?php echo $lengthanghoa;?></b></p>
    <?php
    if ($lengthanghoa > 0) {
        echo 'fdfs';
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tên hàng hoá</th>
                    <th><img src="./img_NAK/money.png" alt="" class="iconimg"></th>
                    <th><img src="./img_NAK/nameproduct.png" alt="" class="iconimg"></th>
                    <th><img src="./img_NAK/img.png" alt="" class="iconimg"></th>
                    <th><img src="./img_NAK/tool.png" alt="" class="iconimg"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listhanghoa as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->idhanghoa;?></td>
                        <td><?php echo $v->tenhanghoa;?></td>
                        <td><?php echo $v->giathamkhao;?></td>
                        <td><?php echo $v->tenhinhanh;?></td>
                        <td><img src="data:image/png;base64, <?php echo ($v->hinhanh); ?>" alt="" class="imgtable"></td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./elements_NAK/mHanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->idhanghoa;?>">
                                    <img src="./img_NAK/delete1.png" alt="" class="iconimg">
                                </a>
                                <?php
                            }
                            else {
                                ?>
                                <img src="./img_NAK/delete1.png" alt="" class="iconimg">
                                <?php
                            }
                            ?>

                            <a href="index.php?req=hanghoaUpdate&idhanghoa=<?php echo $v->idhanghoa; ?>">
                                <img src="./img_NAK/update1.png" alt="" class="iconimg">
                            </a>
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
<hr>