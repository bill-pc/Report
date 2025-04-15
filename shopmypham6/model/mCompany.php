<?php
include_once("connect.php");

class MCompany {
    public function getAllCompany(){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from companies";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function getCompanyById($company_id){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "select * from companies where company_id = $company_id";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }

    public function updateCompany($company_id, $TenCty, $address, $email){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "update companies set name = '$TenCty', address = '$address', email = '$email' where company_id = $company_id";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
    public function deleteCompany($company_id){
        $p = new Connect();
        $conn = $p->connect();
        $conn->set_charset('utf8');
        if(!$conn) return false;
        else {
            $query = "delete from companies where company_id = $company_id";
            $table = $conn->query($query);
            $p->closeConnect($conn);
            return $table;
        }
    }
}




?>