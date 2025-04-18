<?php
session_start();
// error_reporting(0);
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
            <h2><b>Thêm sản phẩm</b></h2>
            <br>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="my">
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" name = "txtten"></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>    
                        <input type="number" name="txtgia" id="">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>    
                        <input type="number" name="txtsl" id="">
                    </td>
                </tr>
                <tr>
                    <td>Ảnh đại diện</td>
                    <td>
                        <input type="file" name="file" id="">
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <textarea name="txtmota" id="" cols="24" rows="5"></textarea>
                    </td>
                </tr>
                    <td>
                        Danh mục
                    </td>
                    <td>
                        <?php
                            include_once("view/QuanLy/addsp.php");
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="Submit" name="btnthem">Thêm</button>
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