<?php


require_once(__DIR__ . "/../model/mCartItem.php");

class CCartItem {
    public function addCartItem($user_id, $product_id, $quantity) {
        $cartItem = new MCartItem();
        $result = $cartItem->addToCart($user_id, $product_id, $quantity);
        return $result;
    }

    public function getCartItems($user_id) {
        $cartItem = new MCartItem();
        return $cartItem->getCart($user_id);
    }

    public function deleteCartItem($product_id) {
        $model = new MCartItem();
        
        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $model->deleteItem($product_id);
        
        // Xóa sản phẩm khỏi giỏ hàng trong session
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    }
    public function updateCartItem($cart_item_id, $quantity) {
        $model = new MCartItem();
        return $model->updateQuantity($cart_item_id, $quantity);
    }

}


?>