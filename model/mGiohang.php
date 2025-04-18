<?php
class GioHang {
    public function __construct() {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }
    }

    public function getCart() {
        return $_SESSION["cart"];
    }

    public function removeItem($product_id) {
        if (isset($_SESSION["cart"][$product_id])) {
            unset($_SESSION["cart"][$product_id]);
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $total += $item["price"] * $item["quantity"];
        }
        return $total;
    }
}
?>
