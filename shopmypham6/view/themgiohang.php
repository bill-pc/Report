<?php
session_start();

// Lấy dữ liệu từ form
if (isset($_POST['product_id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) && isset($_POST['image_url'])) {
    $id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = intval($_POST['quantity']);
    $image_url = $_POST['image_url'];

    // Tạo sản phẩm
    $item = array(
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'image_url' => $image_url
    );

    // Thêm vào giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Nếu sản phẩm đã tồn tại thì tăng số lượng
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = $item;
    }

    // Chuyển hướng về giỏ hàng
    header("Location:giohang.php");
    exit();
} else {
    echo "Thiếu dữ liệu sản phẩm.";
}
?>
