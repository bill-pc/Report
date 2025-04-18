<?php
include("controller/cCategories.php");
$p = new CCategories();

$tbl = $p->getAllCategories();

$trang = 5; // số danh mục mỗi trang
$tong = $tbl->num_rows; // tổng số danh mục
$tongtrang = ceil($tong / $trang);

$tranghientai = isset($_GET['page']) ? $_GET['page'] : 1;
if ($tranghientai > $tongtrang || $tranghientai < 1) {
    $tranghientai = 1;
}

$offset = ($tranghientai - 1) * $trang;

echo "<script>
    function confirmDelete(id) {
        if (confirm('Bạn có chắc muốn xóa danh mục này không?')) {
            window.location.href = 'quanlycty.php?delComp=' + id;
        }
    }
</script>";

// Xử lý xóa
if (isset($_GET['delComp'])) {
    $id = $_GET['delComp'];
    if ($p->deleteCategory($id)) {
        echo "<script>alert('Xóa thành công'); window.location.href='quanlycty.php';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

echo "<table class='tb'>";
echo "<thead>";
echo "<th>ID</th>";
echo "<th>Tên danh mục</th>";
echo "<th>Mô tả</th>";
echo "<th>Hành động</th>";
echo "</thead>";

$tbl->data_seek($offset); // nhảy tới dòng bắt đầu

for ($i = 0; $i < $trang; $i++) {
    if ($row = $tbl->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["category_id"] . "</td>";
        echo "<td>" . $row["category_name"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>
                <a href='quanlycty.php?editComp=" . $row['category_id'] . "'>Sửa</a> |
                <a href='#' onclick='confirmDelete(" . $row['category_id'] . ")'>Xóa</a>
              </td>";
        echo "</tr>";
    }
}

echo "</table>";

// Hiển thị phân trang
echo "<div style='margin-top: 15px'>";
for ($i = 1; $i <= $tongtrang; $i++) {
    if ($i == $tranghientai) {
        echo "<strong>$i</strong> ";
    } else {
        echo "<a href='?page=$i'>| $i</a> ";
    }
}
echo "</div>";
?>
