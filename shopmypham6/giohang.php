<?php
session_start();
require_once("controller/cCartItem.php");
$p = new CCartItem();
$user = $_SESSION['user'];
$cartItem = $p->getCartItems($user["user_id"]);
$total = 0;


if (isset($_GET["remove"])) {
    $p->deleteCartItem($_GET["remove"]);
    header("Location: giohang.php");
    exit();
}




?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="css/giohang.css">
</head>
<body>

<h2>🛒 Giỏ hàng của bạn</h2>

<?php if (empty($cartItem)): ?>
    <p>Giỏ hàng của bạn đang trống.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xoá</th>
        </tr>
        <?php foreach ($cartItem as $sp): $total += $sp["price"]*$sp["quantity"] ?>
        <tr>
            <td>
                <?php if (!empty($sp["image_url"])): ?>
                    <img height="50px" src="img/<?= $sp["image_url"] ?>" alt="<?= $sp["product_name"] ?>">
                <?php else: ?>
                    <span>Không có ảnh</span>
                <?php endif; ?>
            </td>
            <td><?= $sp["product_name"] ?></td>
            <td><?= number_format($sp["price"]) ?>đ</td>
            <td><?= $sp["quantity"] ?></td>
            <td><?= number_format($sp["price"] * $sp["quantity"]) ?>đ</td>
            <td><a class="btn-remove" href="giohang.php?remove=<?= $sp['product_id'] ?>">Xoá</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="cart-footer">
    <p class="total">Tổng cộng: <strong><?= number_format($total) ?>đ</strong></p>
    <a class="checkout-btn" href="thanhtoan.php">Thanh toán</a>
</div>
<?php endif; ?>
    
<a class="back-link" href="index.php">← Tiếp tục mua sắm</a>
<!-- <a href="index.php" style="text-decoration: none;">
    <button>Tiếp tục mua sắm</button>
</a> -->

</body>
</html>
