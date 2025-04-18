<?php
include_once("connect.php");
class MProduct{
    public function getAllProduct() {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function getAllProductByType($type) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products where category_id = '$type'";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function getAllProductByName($name) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from products where product_name like '%$name%'";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
    public function getProductByID($id){
    $p = new Connect();
    $conn = $p->connect();
    $conn->set_charset('utf8');

    if (!$conn) return false;
    else {
        $query = "SELECT * FROM products WHERE product_id = '$id'";
        $result = $conn->query($query);
        $p->closeConnect($conn);
        return $result;
    }
}
    public function addProduct($TenSP, $DonGia, $SoLuong, $MaLSP, $HinhAnh, $MoTa){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "insert into products(product_name, price, stock, category_id, image_url, description) values('$TenSP', '$DonGia', '$SoLuong', '$MaLSP', '$HinhAnh', '$MoTa')";
            $kq = $conn->query($query);
            $p->closeConnect($conn);
            return $kq;
        }
    }
    public function deleteProduct($product_id){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "delete from products where product_id = '$product_id'";
            $kq = $conn->query($query);
            $p->closeConnect($conn);
            return $kq;
        }
    }
    public function updateProduct($product_id, $TenSP, $DonGia, $SoLuong, $MoTa, $MaLSP, $HinhAnh){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "update products set product_name = '$TenSP', price = '$DonGia', stock = '$SoLuong', description = '$MoTa', category_id = '$MaLSP', image_url = '$HinhAnh' where product_id = '$product_id'";
            $kq = $conn->query($query);
            $p->closeConnect($conn);
            return $kq;
        }
    }
}



?>