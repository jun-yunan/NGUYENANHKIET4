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
        case 'deleteuser':
            $iduser = $_REQUEST['iduser'];
            $user = new userCls();
            $rs = $user->UserDelete($iduser);

            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            }
            else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'setlock':
            $iduser = $_REQUEST['iduser'];
            $abtility = $_REQUEST['abtility'];
            $user = new userCls();

            if ($abtility == 0) {
                $rs = $user->UserSetActive($iduser, 1);
            }
            else {
                $rs = $user->UserSetActive($iduser, 0);
            }

            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            }
            else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'updateuser':
            $iduser = $_REQUEST['iduser'];
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $hoten = $_REQUEST['hoten'];
            $gioitinh = $_REQUEST['gioitinh'];
            $ngaysinh = $_REQUEST['ngaysinh'];
            $diachi = $_REQUEST['diachi'];
            $dienthoai = $_REQUEST['dienthoai'];

            $user = new userCls();
            $rs = $user->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);
            
            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            }
            else {
                header('location:../../index.php?req=userview&result=notok');
            }
        
        default:
            header('location:../../index.php?req=userview');
            break;
    }
}
else {
    header('location:../../index.php?req=userview');
}
?>