<?php
include_once("controller/cCategories.php");
include_once("controller/cProduct.php");
$p = new CCategories();
$p2 = new CProduct();
$tbl = $p->getAllCategories();

if (!$tbl) {
    echo "Không thể kết nối";
} elseif ($tbl->num_rows == 0) {
    echo "Chưa có dữ liệu";
} else {
    echo "<select name='txtdm' required>";
    while ($r = $tbl->fetch_assoc()) {
        echo "<option value='" . $r["category_id"] . "'>" . $r["category_name"] . "</option>";
    }
    echo "</select>";
}

if (isset($_POST["btnthem"])) {
    $TenSP = $_POST["txtten"];
    $DonGia = $_POST["txtgia"];
    $SoLuong = $_POST["txtsl"];
    $MaLSP = $_POST["txtdm"];
    $MoTa = $_POST["txtmota"];
    
    // Xử lý ảnh
    $HinhAnh = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_type = strtolower(pathinfo($HinhAnh, PATHINFO_EXTENSION));
    $allowed_types = array("jpg", "jpeg", "png");
    
    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Chỉ nhận file JPG, JPEG, PNG.');</script>";
    } else {
        $upload_dir = "img/";
        $file_path = $upload_dir . basename($HinhAnh);
        if (move_uploaded_file($file_tmp, $file_path)) {
            $kq = $p2->addProduct($TenSP, $DonGia, $SoLuong, $MaLSP, $HinhAnh, $MoTa);
            if ($kq) {
                echo "<script>alert('Thêm sản phẩm thành công');</script>";
            } else {
                echo "<script>alert('Lỗi khi thêm sản phẩm');</script>";
            }
        } else {
            echo "<script>alert('Lỗi khi upload file');</script>";
        }
    }
}
?>
