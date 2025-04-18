<?php
require_once("../model/mUser.php");

class CUser {
    private $modelUser;

    public function __construct() {
        $this->modelUser = new MUser();
    }

    // Đăng ký người dùng mới
    public function register($email, $password) {
        return $this->modelUser->register($email, $password);
    }

    // Đăng nhập
    public function login($email, $password) {
        return $this->modelUser->login($email, $password);
    }
}
?>