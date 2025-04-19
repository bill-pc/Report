<?php

require_once(__DIR__ . "/../../controller/cCartItem.php");
require_once(__DIR__ . "/../../controller/cProduct.php");

$p1 = new CCartItem();
$p = new CProduct();

// Kiểm tra nếu người dùng đã đăng nhập
$user_id = $_SESSION['user']['user_id'] ?? null; // Kiểm tra nếu user_id tồn tại trong session

// Nếu có id sản phẩm được chọn → hiển thị chi tiết
if (isset($_GET["id"])) {
    $tbl = $p->getProductByID($_GET["id"]);
    $r = $tbl->fetch_assoc();

    // Xử lý thêm vào giỏ hàng (sau khi có dữ liệu $r)
    if (isset($_POST["add_to_cart"], $_POST["product_id"], $_POST["name"], $_POST["price"], $_POST["quantity"])) {
        $product_id = $_POST["product_id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = max(1, intval($_POST["quantity"]));

        // Kiểm tra nếu người dùng đã đăng nhập
        if ($user_id) {
            // Thêm vào giỏ hàng nếu người dùng đã đăng nhập
            $p1->addCartItem($user_id, $product_id, $quantity);
            // Tránh bị thêm lại khi reload
            header("Location: index.php?id=$product_id&success=1");
            exit();
        } else {
            // Nếu người dùng chưa đăng nhập
            echo "<p style='color:red; font-weight:bold;'>⚠ Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.</p>";
            echo "<a href='view/dangnhap.php'><strong><u>Đăng Nhập</u></strong></a>";
            exit();
        }
    }

    // Hiển thị chi tiết sản phẩm
    echo "<h2>Chi tiết sản phẩm</h2>";
    echo "<table><tr><td style='padding: 10px; border: 1px solid #ccc'>";
    echo "<img src='img/" . $r["image_url"] . "' width='200px'><br>";
    echo "<strong>" . $r["product_name"] . "</strong><br>";
    echo "Giá: " . number_format($r["price"]) . "đ<br><br>";
    echo "<em>Mô tả: " . $r["description"] . "</em><br><br>";

    // Form thêm vào giỏ hàng
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='product_id' value='" . $r["product_id"] . "'>";
    echo "<input type='hidden' name='name' value='" . $r["product_name"] . "'>";
    echo "<input type='hidden' name='price' value='" . $r["price"] . "'>";
    echo "Số lượng: <input type='number' name='quantity' value='1' min='1'><br><br>";
    echo "<input type='submit' name='add_to_cart' value='Thêm vào giỏ hàng'>";
    echo "</form>";

    // Thông báo đã thêm thành công
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p style='color: green; font-weight: bold;'>✔ Đã thêm sản phẩm vào giỏ hàng!</p>";
    }

    echo "<br><a href='index.php'>← Quay lại danh sách sản phẩm</a>";
    echo "</td></tr></table>";

} else {
    echo "<h2>Danh sách sản phẩm</h2>";
    // Hiển thị danh sách sản phẩm
    if (isset($_GET["type"])) {
        $tbl = $p->getAllProductByType($_GET["type"]);
    } elseif (isset($_POST["btnsearch"])) {
        $tbl = $p->getAllProductByName($_POST["txtsearch"]);
    } else {
        $tbl = $p->getAllProduct();
    }

    if (!$tbl || $tbl->num_rows == 0) {
        echo "Không có sản phẩm";
    } else {
        $dem = 0;
        echo "<table><tr>";
        while ($r = $tbl->fetch_assoc()) {
            echo "<td style='vertical-align: top; padding: 10px; border: 1px solid #ccc; text-align:center'>";
            echo "<img src='img/" . $r["image_url"] . "' width='100px'><br>";
            echo "<strong>" . $r["product_name"] . "</strong><br>";
            echo "Giá: " . number_format($r["price"]) . "đ<br><br>";

            echo "<form method='get' action='index.php'>";
            echo "<input type='hidden' name='id' value='" . $r["product_id"] . "'>";
            echo "<input type='submit' value='Xem chi tiết'>";
            echo "</form>";

            echo "</td>";
            $dem++;
            if ($dem % 5 == 0) echo "</tr><tr>";
        }
        echo "</tr></table>";
    }
}
?>
