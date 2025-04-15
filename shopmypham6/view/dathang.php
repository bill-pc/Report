<?php
session_start();
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<p>Không có sản phẩm trong giỏ hàng để đặt.</p>";
    exit;
}

// Ở đây bạn có thể thêm xử lý lưu vào database nếu cần
// Hiện tại mình chỉ demo logic

echo "<h2>Đặt hàng thành công!</h2>";
echo "<p>Cảm ơn bạn đã mua hàng tại BeautyFly Cosmetics.</p>";

unset($_SESSION['cart']); // Xóa giỏ hàng sau khi đặt

echo "<a href='../index.php'>Quay về trang chủ</a>";
?>
