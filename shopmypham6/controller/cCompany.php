<?php
include_once("model/mCompany.php");
class CCompany{
    public function getAllCompany(){
        $p = new MCompany();
        $table = $p->getAllCompany();
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }

    public function getCompanyById($company_id){
        $p = new MCompany();
        $table = $p->getCompanyById($company_id);
        
        if($table){
            if($table->num_rows>0){
                return $table->fetch_assoc();
            }
        }else{
            return false;
        }
    }

    public function updateCompany($company_id, $TenCty, $address, $email){
        $p = new MCompany();
        $table = $p->updateCompany($company_id, $TenCty, $address, $email);
        
        if($table){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCompany($company_id){
        $p = new MCompany();
        $table = $p->deleteCompany($company_id);
        
        if($table){
            return true;
        }else{
            return false;
        }
    }

}

?>