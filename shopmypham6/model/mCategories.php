<?php
include_once("connect.php");

class MCategories {
    public function getAllCategories(){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "SELECT * FROM categories";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }


    public function getCategoryById($id) {
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from categories where category_id = '$id'";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table->fetch_assoc();
        }
    }

    public function insertCategory($name, $MoTa){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "INSERT INTO categories(category_name, description) VALUES ('$name', '$MoTa')";
            $result = $conn->query($query);
            $p->closeConnect($conn);
            return $result;
        }
    }

    public function updateCategory($id, $name, $description){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "UPDATE categories SET category_name = '$name', description = '$description' WHERE category_id = $id";
            $result = $conn->query($query);
            $p->closeConnect($conn);
            return $result;
        }
    }

    public function deleteCategory($id){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "DELETE FROM categories WHERE category_id = $id";
            $result = $conn->query($query);
            $p->closeConnect($conn);
            return $result;
        }
    }
}
?>
