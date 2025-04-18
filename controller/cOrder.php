<?php
require_once("model/mOrder.php");

class COrder {
    public function processPayment($user_id, $address, $payment_method, $total_amount) {
        $orderModel = new MOrder();
        
        // Tạo đơn hàng
        $order_id = $orderModel->createOrder($user_id, $address, $payment_method, $total_amount);
        
        // Lấy giỏ hàng của người dùng
        $cartItems = $this->getCartItems($user_id);

        // Thêm sản phẩm vào đơn hàng
        foreach ($cartItems as $item) {
            $orderModel->addOrderItem($order_id, $item['product_id'], $item['quantity'], $item['price']);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        $orderModel->clearCart($user_id);

        return $order_id; // Trả về ID đơn hàng vừa tạo
    }

    public function getCartItems($user_id) {
        // Bạn có thể thêm logic để lấy giỏ hàng của người dùng ở đây
        // Ví dụ: sử dụng controller cCartItem để lấy giỏ hàng
        require_once("controller/cCartItem.php");
        $cartItem = new CCartItem();
        return $cartItem->getCartItems($user_id);
    }
    
}
?>
