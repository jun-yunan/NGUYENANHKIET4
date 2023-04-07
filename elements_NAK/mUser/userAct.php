<?php
require '../mod/userCls.php';
if (isset($_REQUEST['reqact'])) {
    $requestAction = $_REQUEST['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];

            $user = new userCls();
            $rs = $user->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);

            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            }
            else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=userview');
            break;
    }
}
else {
    header('location:../../index.php?req=userview');
}
?>