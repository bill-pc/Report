<?php
include_once("connect.php");

class MCartItem {
    // Thêm sản phẩm vào giỏ
    public function addToCart($user_id, $product_id, $quantity) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset("utf8");

        // Kiểm tra nếu đã có sản phẩm trong giỏ thì tăng số lượng
        $check = "SELECT * FROM cart_items WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($check);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Cập nhật số lượng
            $update = "UPDATE cart_items SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
            $stmt = $conn->prepare($update);
            $stmt->bind_param("iii", $quantity, $user_id, $product_id);
            $stmt->execute();
        } else {
            // Thêm mới
            $insert = "INSERT INTO cart_items (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);
            $stmt->execute();
        }
        $p->closeConnect($conn);
        return $result;
    }

    // Xem giỏ hàng của 1 user
    public function getCart($user_id) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset("utf8");

        $query = "SELECT c.cart_item_id, c.product_id, p.product_name, p.price, p.image_url, c.quantity
                  FROM cart_items c
                  JOIN products p ON c.product_id = p.product_id
                  WHERE c.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $cart = [];
        while ($row = $result->fetch_assoc()) {
            $cart[] = $row;
        }

        $p->closeConnect($conn);
        return $cart;
    }

    // Cập nhật số lượng sản phẩm
    public function updateQuantity($cart_item_id, $quantity) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset("utf8");

        $update = "UPDATE cart_items SET quantity = ? WHERE cart_item_id = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("ii", $quantity, $cart_item_id);
        $stmt->execute();

        $p->closeConnect($conn);
    }

    // Xóa sản phẩm khỏi giỏ
    public function deleteItem($product_id) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset("utf8");
    
        $delete = "DELETE FROM cart_items WHERE product_id = ? AND user_id = ?";
        $stmt = $conn->prepare($delete);
        $stmt->bind_param("ii", $product_id, $_SESSION['user']['user_id']);  // Xóa theo product_id và user_id
        $stmt->execute();
    
        $p->closeConnect($conn);
    }

    // Xóa toàn bộ giỏ hàng của người dùng (nếu cần)
    public function clearCart($user_id) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset("utf8");

        $delete = "DELETE FROM cart_items WHERE user_id = ?";
        $stmt = $conn->prepare($delete);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $p->closeConnect($conn);
    }
    
}
?>
