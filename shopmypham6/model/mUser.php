<?php
include_once("connect.php");

class MUser {
    // Đăng ký người dùng
    public function register($email, $password) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if (!$conn) return false;

        // Kiểm tra tài khoản đã tồn tại
        $check = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($check);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $p->closeConnect($conn);
            return false; // Tài khoản đã tồn tại
        }

        // Mã hóa mật khẩu
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Thêm người dùng mới
        $insert = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss",$email, $hashed);
        $success = $stmt->execute();

        $p->closeConnect($conn);
        return $success;
    }

    // Đăng nhập
    public function login($username, $password) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if (!$conn) return false;

        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $p->closeConnect($conn);
                return $user; // Đăng nhập thành công
            }
        }

        $p->closeConnect($conn);
        return false; // Đăng nhập thất bại
    }
}
?>
