<?php
session_start();
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if($user["role"] != 'admin') {
        header("Location: index.php");
    }
} else header("Location: index.php");

include("controller/cProduct.php");
$p = new CProduct();

// Xử lý cập nhật sản phẩm
if (isset($_POST['update_product'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $category = $_POST['category_id'];
    $image = $_POST['image_url'];

    if ($p->updateProduct($id, $name, $price, $quantity, $description, $category, $image)) {
        echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='quanlysp.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật sản phẩm!');</script>";
    }
}

// Hiển thị form sửa sản phẩm nếu có ?edit
if (isset($_GET['edit'])) {
    $product_id = $_GET['edit'];
    $product = $p->getProductByID($product_id);
    if ($product) {
        $row = $product->fetch_assoc();
        echo "
        <h3>Chỉnh sửa sản phẩm</h3>
        <form method='post' action=''>
            <input type='hidden' name='product_id' value='{$row['product_id']}'>
            <label>Tên sản phẩm: </label>
            <input type='text' name='product_name' value='{$row['product_name']}'><br>
            <label>Giá: </label>
            <input type='text' name='price' value='{$row['price']}'><br>
            <label>Số lượng: </label>
            <input type='text' name='quantity' value='{$row['quantity']}'><br>
            <label>Mô tả: </label>
            <textarea name='description'>{$row['description']}</textarea><br>
            <label>Loại sản phẩm (Mã): </label>
            <input type='text' name='category_id' value='{$row['category_id']}'><br>
            <label>Hình ảnh (tên file): </label>
            <input type='text' name='image_url' value='{$row['image_url']}'><br>
            <input type='submit' name='update_product' value='Cập nhật'>
        </form>
        <hr>
        ";
    }
} 

// Đảm bảo trang hiện tại hợp lệ
if ($tranghientai > $tongtrang || $tranghientai < 1) {
    $tranghientai = 1;
}

// Tính offset
$offset = ($tranghientai - 1) * $trang;

echo "<script>
    function confirmDelete(id) {
        if (confirm('Bạn có chắc muốn xóa sản phẩm này không?')) {
            window.location.href = 'quanlysp.php?del=' + id;
        }
    }
</script>";

echo "<table class='tb'>";
echo "<thead>";
echo "<th>ID</th>";
echo "<th>Product Name</th>";
echo "<th>Image</th>";
echo "<th>Price</th>";
echo "<th>Action</th>";
echo "</thead>";

// Di chuyển con trỏ về vị trí đầu tiên của kết quả
$tbl->data_seek($offset);

// Hiển thị sản phẩm
for ($i = 0; $i < $trang; $i++) {
    if ($row = $tbl->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["product_id"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td><img src='img/" . $row["image_url"] . "' width='70px' alt=''></td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>
                <a href='quanlysp.php?edit=" . $row['product_id'] . "'>Sửa</a> |
                <a href='#' onclick='confirmDelete(" . $row['product_id'] . ")'>Xóa</a>
              </td>";
        echo "</tr>";
    }
}

echo "</table>";

echo "<div>";
for ($i = 1; $i <= $tongtrang; $i++) {
    if ($i == $tranghientai) {
        echo "<strong>$i</strong> ";
    } else {
        echo "<a href='?page=$i'>| $i</a> ";
    }
}
echo "</div>";
?>
