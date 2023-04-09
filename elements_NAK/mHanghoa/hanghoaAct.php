<?php
require '../../elements_NAK/mod/hanghoaCls.php';
if (isset($_REQUEST['reqact'])) {
    $requestAction = $_REQUEST['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $mota = $_REQUEST['mota'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $tenhinhanh = $_REQUEST['tenhinhanh'];
            $idloaihang = $_REQUEST['idloaihang'];

            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang);
            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            }
            else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;

        case 'deletehanghoa':
            $idhanghoa = $_REQUEST['idhanghoa'];
            $hanghoa = new hanghoa();
            $rs = $hanghoa->HanghoaDelete($idhanghoa);
            
            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            }
            else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
        case 'updatehanghoa':
            $file_tmp = $_FILES['fileimage']['tmp_name'];

            $idhanghoa = $_POST['idhanghoa'];
            $tenhanghoa = $_POST['tenhanghoa'];
            $mota = $_POST['mota'];
            $giathamkhao = $_POST['giathamkhao'];
            $idloaihang = $_POST['idloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];

            if(isset($_FILES['fileimage']['tmp_name']) && !empty($_FILES['fileimage']['tmp_name'])) {
                $image_size = getimagesize($_FILES['fileimage']['tmp_name']);
                if ($image_size == FALSE) {
                    //$hinhanh = $_POST['hinhanh'];
                    $hinhanh = $_POST['hinhanh'];
                }
                else {
                    $hinhanh = $file_tmp;
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                }
            }
            else {
                echo "Ảnh không được tải lên";
            }


            $hanghoa = new hanghoa();
            //$rs = $loaihang->LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);
            $rs = $hanghoa->HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa);

            if ($rs) {
                header('location:../../index.php?req=hanghoaView&result=ok');
            }
            else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
    }

}
else {
    header('location:../../index.php?req=hanghoaView');
}
?>