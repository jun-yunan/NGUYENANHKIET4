<?php
$r = '../../elements_NAK/mod/database.php';
if (file_exists($r)) {
    $f = $r;
}
else {
    $f = './elements_NAK/mod/database.php';
}
require $f;

class loaihang extends database {
    public function LoaihangGetAll() {
        $getAll = $this->connect->prepare("select * from loaihang");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

    public function LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh) {
        $add = $this->connect->prepare("INSERT INTO loaihang(tenloaihang, tenhinhanh, hinhanh) VALUES (?,?,?)");
        $add->execute(array($tenloaihang, $tenhinhanh, $hinhanh));

        return $add->rowCount();
    }

    public function LoaihangDelete($idloaihang) {
        $del = $this->connect->prepare("Delete from loaihang where idloaihang=?");

        $del->execute(array($idloaihang));

        return $del->rowCount();
    }

    public function LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang) {
        $update = $this->connect->prepare("UPDATE loaihang SET " . " tenloaihang = ?, tenhinhanh = ?, hinhanh = ? " . " WHERE idloaihang = ? ");

        $update->execute(array($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang));

        return $update->rowCount();
    }

    public function LoaihangGetbyId($idloaihang) {
        $getTk = $this->connect->prepare("select * from loaihang where idloaihang = ? ");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($idloaihang));

        return $getTk->fetch();
    }
}
?>
