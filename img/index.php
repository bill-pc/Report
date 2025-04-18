<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trangchu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header> 
    <div class="box-header">
    <a href="index.php"><img src="img/logo-my-pham-11.jpg" alt="" style=" width: 200px, height: 100px"></a>
    <h1 style="color: #044115"> Shop Mỹ Phẩm </h1>
    </div>


</header>
<nav  class="nav-header" >
    <div class="box">
        <?php 
            if(isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                if($user["role"] == 'admin') {
                    header("Location: quanlycty.php");
                } else {
                    echo "<a href='index.php'>Trang chủ |</a>";
                    echo "<a href='view/gioithieu.php'>Giới thiệu |</a>";
                    echo "<a href='giohang.php'>Giỏ hàng |</a>";
                    echo "<a href='view/dangxuat.php'>Đăng xuất</a>";
                }
            } else {
                echo "<a href='index.php'>Trang chủ |</a>";
                echo "<a href='view/gioithieu.php'>Giới thiệu |</a>";
                echo "<a href='view/dangky.php'>Đăng ký |</a>";
                echo "<a href='view/dangnhap.php'>Đăng nhập |</a>";
            }
        ?>
    </div>

        <form action="index.php" method="post">
            <div class="search" >
                <input type="text"  name="txtsearch" placeholder="Tìm kiếm..." style="background-color: white;">
                
                <button type="submit" name ="btnsearch" value="Search" style="width: 30px; height: 20px; background-color: white;">go</button>
            </div>
        </form>
</nav>
    <div class="container-body">
        
        <div class="menu">
            <div class="menu1">   
            <h3 class ="h3_category">Danh mục</h3>
            <br>
            <?php
                include_once("controller/CType.php");
                $p = new CType();
                $tableComp = $p->getAllType();
                
                if(!$tableComp){
                    echo "Không có sản phẩm";
                }elseif($tableComp == null){
                    echo "Chưa có dữ liệu";
                }else{
                    while ($row=$tableComp->fetch_assoc()){
                        echo "<a href='index.php?type=".$row["category_id"]."'>".$row["category_name"]."</a><br><br>";
                    }
                }
            ?>
            </div>
        </div>

                <div class="sec">
            <?php 
                if (isset($_GET['page'])) {
                    switch ($_GET['page']) {
                        case "gioithieu":
                            include("view/gioithieu.php");
                            break;
                        case "giohang":
                            include("view/giohang.php");
                            break;
                        case "dangky":
                            include("view/dangky.php");
                            break;
                        case "dangnhap":
                            include("view/dangnhap.php");
                            break;
                        default:
                            include("view/SanPham/index.php");
                            break;
                    }
                } else {
                    require_once("view/SanPham/index.php");
                }
            ?>
        </div>

    </div>
    <footer class="site-footer">
    <div class="footer-container">
        <div class="footer-box">
            <h3>VỀ CHÚNG TÔI</h3>
            <p>BeautyFly Cosmetics – Nơi sắc đẹp thăng hoa cùng thiên nhiên.
                Chạm đến vẻ đẹp tự nhiên, lan tỏa sự tự tin.</p>
        </div>
        <div class="footer-box">
            <h3>LIÊN KẾT NHANH</h3>
            <p><a href="index.php">Trang chủ</a></p>
            <p><a href="view/gioithieu.php">Giới thiệu</a></p>
            <p><a href="giohang.php">Giỏ hàng</a></p>
        </div>
        <div class="footer-box">
            <h3>HỖ TRỢ</h3>
            <p><a href="#">Chính sách bảo mật</a></p>
            <p><a href="#">Chính sách đổi trả</a></p>
            <p><a href="#">Liên hệ</a></p>
        </div>
        <div class="footer-box">
            <h3>KẾT NỐI VỚI CHÚNG TÔI</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/BeautyFlyCosmetics" target="_blank">
                    <img src="img/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com/BeautyFlyCosmetics" target="_blank">
                    <img src="img/instagram.png" alt="Instagram">
                </a>
                <a href="https://www.youtube.com/beautyfly" target="_blank">
                    <img src="img/youtube.png" alt="YouTube">
                </a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <hr>
        © 2025 BeautyFly Cosmetics | Thiết kế bởi bobonteam 💖
    </div>
</footer>
</body>
</html>