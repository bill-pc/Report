<?php
session_start();
require_once("controller/cCartItem.php");

$p = new CCartItem();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$cartItem = $user ? $p->getCartItems($user["user_id"]) : [];

$total = 0;
$orderPlaced = false;
$fullName = $address = $phone = $paymentMethod = "";

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = $_POST["full_name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $paymentMethod = $_POST["payment_method"];

    $orderPlaced = true;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán đơn hàng</title>
    <link rel="stylesheet" href="css/thanhtoan.css">
</head>
<body>

<div class="payment-container">
    <h2>Thông tin thanh toán</h2>

    <div class="order-summary">
        <h3>Thông tin đơn hàng</h3>
        <table>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php if (!empty($cartItem)): ?>
                <?php foreach ($cartItem as $sp): 
                    $total += $sp["price"] * $sp["quantity"];
                ?>
                <tr>
                    <td><?= $sp["product_name"] ?></td>
                    <td><?= $sp["quantity"] ?></td>
                    <td><?= number_format($sp["price"]) ?>đ</td>
                    <td><?= number_format($sp["price"] * $sp["quantity"]) ?>đ</td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Tổng cộng:</strong></td>
                    <td><strong><?= number_format($total) ?>đ</strong></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="4">Giỏ hàng của bạn hiện tại trống.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <div class="payment-info">
        <h3>Thông tin giao hàng</h3>

        <?php if ($orderPlaced): ?>
            <div class="order-status-box">
                <p>✅ Cảm ơn bạn, <strong><?= htmlspecialchars($fullName) ?></strong>!</p>
                <p>Đơn hàng của bạn đã được ghi nhận và đang được xử lý.</p>
                <p>📦 Giao đến: <strong><?= htmlspecialchars($address) ?></strong></p>
                <p>📞 Liên hệ: <strong><?= htmlspecialchars($phone) ?></strong></p>
                <p>💳 Thanh toán: 
                    <strong>
                        <?= $paymentMethod === "credit_card" ? "Thẻ tín dụng" : "Thanh toán khi nhận hàng" ?>
                    </strong>
                </p>
                
                <!-- Hiển thị trạng thái thanh toán -->
                <?php if ($paymentMethod === "credit_card"): ?>
                    <p><strong>Trạng thái đơn hàng:</strong> Chờ thanh toán. <a href="link_to_payment_gateway">Thanh toán ngay</a></p>
                <?php elseif ($paymentMethod === "cash_on_delivery"): ?>
                    <p><strong>Trạng thái đơn hàng:</strong> Chờ xử lý.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <form action="" method="POST">
                <label for="full_name">Họ và tên:</label>
                <input type="text" id="full_name" name="full_name" required>

                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="payment_method">Phương thức thanh toán:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="credit_card">Thẻ tín dụng</option>
                    <option value="cash_on_delivery">Thanh toán khi nhận hàng</option>
                </select>

                <button type="submit" class="btn-submit">Đặt hàng</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
