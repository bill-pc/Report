<?php
session_start();
include_once("model/mGiohang.php");

class CGioHang {
    private $model;

    public function __construct() {
        $this->model = new GioHang();

        // Xoá sản phẩm nếu có tham số remove
        if (isset($_GET["remove"])) {
            $this->model->removeItem($_GET["remove"]);
            header("Location: ../view/giohang.php");
            exit();
        }
    }

    public function hienThiGioHang() {
        return $this->model->getCart();
    }

    public function tinhTong() {
        return $this->model->getTotal();
    }
}
?>
