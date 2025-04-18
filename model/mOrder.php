<?php
require_once("connect.php");

class MOrder {
    // Tạo đơn hàng mới
    public function createOrder($user_id, $address, $payment_method, $total_amount) {
        $conn = new Connect();
        $conn = $conn->connect();
        $query = "INSERT INTO orders (user_id, address, payment_method, total_amount, order_date)
                  VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issd", $user_id, $address, $payment_method, $total_amount);
        $stmt->execute();

        return $conn->insert_id; // Lấy ID của đơn hàng vừa tạo
    }

    // Thêm sản phẩm vào đơn hàng
    public function addOrderItem($order_id, $product_id, $quantity, $price) {
        $conn = new Connect();
        $conn = $conn->connect();
        $query = "INSERT INTO order_items (order_id, product_id, quantity, price)
                  VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        $stmt->execute();
    }

    // Xóa giỏ hàng của người dùng sau khi thanh toán thành công
    public function clearCart($user_id) {
        $conn = new Connect();
        $conn = $conn->connect();
        $query = "DELETE FROM cart_items WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    }
}
?>
