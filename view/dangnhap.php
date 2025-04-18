<?php
session_start();
require_once("../controller/cUser.php");


if (isset($_POST["submit"])) { 
    $p = new CUser(); 
    $id = $_POST["txtID"];
    $pwd = $_POST["txtPWD"];
    
    $result = $p->login($id, $pwd); 
    if($result) { 
        $_SESSION["user"] = $result; // Lưu thông tin người dùng vào session
        header("Location: ../index.php");
        exit();
        
    } else { 
        echo "<script>alert('Đăng nhập thất bại!');</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/dangNhap.css">
</head>
<body>


<form id="form1" name="form1" method="post"  >

<h2 style="text-align: center; margin-top: 20px;">Trang Đăng Nhập</h2>

  
  <table width="442" height="183" ,border="1" ,align="center">
    <tbody>
      <tr>
        <th colspan="2">ĐĂNG NHẬP</th>
      </tr>
      <tr>
        <td width="108">EMAIL:</td>
        <td width="193"><input name="txtID" type="email" id="txtID" size="40" required></td>
      </tr>
      <tr>
        <td>PASSWORD:</td>
        <td><input name="txtPWD" type="password" id="txtPWD" size="40" required></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: center">
          <input type="submit" name="submit" id="submit" value="Đăng nhập">
        </td>
      </tr>
    </tbody>
  </table>
  <p style="text-align: center;"><a href="dangky.php">Chưa có tài khoản? Đăng ký ngay!</a></p>
</form>
</body>
</html>
