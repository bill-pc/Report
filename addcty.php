<?php
session_start();
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if($user["role"] != 'admin') {
        header("Location: index.php");
    }
} else header("Location: index.php");


include_once("controller/cCategories.php");
$p = new CCategories();

if (isset($_POST["btnthemcty"])) {
    $TenSP = $_POST["txtten"];
    $MoTa = $_POST["txtmota"];
    $kq = $p->insertCategory($TenSP, $MoTa);
    if ($kq) {
        echo "<script>alert('Thêm sản phẩm thành công');</script>";
        header("Location: quanlycty.php");
    } else {
        echo "<script>alert('Lỗi khi thêm sản phẩm');</script>";
    }
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quanlycongty</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <a href="index.php"><img src="img/logo-test.png" alt=""></a>
</header>
<nav>
        <a href="index.php">Trang chủ |</a>
        <a href="quanlycty.php">| Quản lý</a>
        <form action="index.php" method="post">
        <div class="search">
            <input type="text"  name="txtsearch" placeholder="Tìm kiếm..." style="background-color: white;">
            
            <button type="submit" name ="btnsearch" value="Search" style="width: 30px; height: 20px; background-color: white;">go</button>
            </div>
        </form>
</nav>
    <div class="container-body">
        
        <div class="menu">
            <div class="menu1">
            <br>
            <div> 
                <a href="quanlycty.php">Quản lý công ty</a>
            </div>
            <br>
            <div>
                <a href="quanlysp.php">Quản lý sản phẩm</a>
            </div>
            </div>
        </div>

        <div class="sec" id="tbl1">
            <h2><b>Thêm danh mục</b></h2>
            <br>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="my">
                <tr>
                    <td>Tên danh mục</td>
                    <td><input type="text" name = "txtten"></td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <textarea name="txtmota" id="" cols="24" rows="5"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="Submit" name="btnthemcty">Thêm</button>
                        <button type="Reset">Nhập lại</button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>

<footer style="background-color: pink ">
    <b></b>
</footer>
</body>
</html>