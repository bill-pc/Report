<?php
include("controller/cCategories.php");
$p = new CCategories();

// Kiểm tra nếu có ID sản phẩm cần chỉnh sửa
if (isset($_GET['editComp'])) {
    $company_id = $_GET['editComp'];
    $company = $p->getCategoryById($company_id);
    if (!$company) {
        echo "<script>alert('Sản phẩm không tồn tại!'); window.location.href='quanlyCty.php';</script>";
        exit;
    }
}

// Xử lý cập nhật sản phẩm
if (isset($_POST['btnupdate'])) {
    $TenCty = $_POST['compName'];
    $MoTa = $_POST['txtmota'];
    // Cập nhật sản phẩm
    if ($p->updateCategory($company_id, $TenCty, $MoTa)) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='quanlycty.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi cập nhật công ty!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa công ty</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="compName" value="<?php echo $company['category_name']; ?>" required></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea name="description" required><?php echo $company['description']; ?></textarea></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="btnupdate">Lưu thay đổi</button>
                <a href="quanlysp.php">Hủy</a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>