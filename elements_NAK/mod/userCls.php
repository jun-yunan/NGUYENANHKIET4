<?php
$s = '../mod/database.php';
if (file_exists($s)) {
    $f = $s;
}
else {
    $f = './elements_NAK/mod/database.php';
}
require $f;

class userCls extends database {
    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
        $add = $this->connect->prepare("INSERT INTO user(username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?);");

        $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));
        return $add->rowCount();
    }

    public function UserCheckLogin($username, $password) {
        $select = $this->connect->prepare("select * from user "."where username = ? and password = ? and active=1");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username, $password));

        if (count($select->fetchAll()) == 1) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function UserCheckUsername($username) {
        $select = $this->connect->prepare("select * from user where username = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));

        if (count($select->fetchAll()) == 1) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    public function UserGetAll() {
        $getAll = $this->connect->prepare("select * from user");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function UserDelete($iduser) {
        $del = $this->connect->prepare("delete from user where iduser=?");
        $del->execute(array($iduser));
        return $del->rowCount();
    }

    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser) {
        $update = $this->connect->prepare("UPDATE user SET "
        . "username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ?"
        . "WHERE iduser = ?");
        $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
        return $update->rowCount();
    }

    public function UserGetbyId($iduser) {
        $getTk = $this->connect->prepare("select * from user where iduser=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($iduser));

        return $getTk->fetch();
    }

    public function UserSetPassword($iduser, $password) {
        $update = $this->connect->prepare("update user set password=? where iduser=?");
        $update->execute(array($password, $iduser));
        return $update->rowCount();
    }

    public function UserSetActive($iduser, $ability) {
        $update = $this->connect->prepare("update user set ability=? where iduser=?");
        $update->execute(array($ability, $iduser));

        return $update->rowCount();
    }

    public function UserChangePassword($username, $passwordold, $passwordnew) {
        $selectMK = $this->connect->prepare('select password from user where username=?');
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($username));

        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($passwordold == $temp->password) {
                $update = $this->connect->prepare("update user set password=? where username=?");
                return $update->rowCount();
            }
            else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }
}

?>