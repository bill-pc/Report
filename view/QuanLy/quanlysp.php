<?php
include("controller/cProduct.php");
$p = new CProduct();

// Xử lý xóa sản phẩm
if (isset($_GET['del'])) {
    $product_id = $_GET['del'];
    if ($p->deleteProduct($product_id)) {
        echo "<script>alert('Xóa sản phẩm thành công!'); window.location.href='quanlysp.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa sản phẩm!');</script>";
    }
}

$tbl = $p->getAllProduct();
$trang = 5; // số sản phẩm trên mỗi trang
$tong = $tbl->num_rows; // tổng số sản phẩm
$tongtrang = ceil($tong / $trang); // tính tổng số trang

$tranghientai = isset($_GET['page']) ? $_GET['page'] : 1;

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
