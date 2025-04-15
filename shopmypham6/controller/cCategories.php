<?php
include_once("model/mCategories.php");

class CCategories{
    public function getAllCategories(){
        $p = new MCategories();
        $table = $p->getAllCategories();
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }
    public function getCategoryById($id){
        $p = new MCategories();
        $table = $p->getCategoryById($id);

        if($table){
            return $table;
        }else{
            return false;
        }
    }

    public function insertCategory($name, $MoTa){
        $p = new MCategories();
        $kq = $p->insertCategory($name, $MoTa);
        return $kq;
    }

    public function updateCategory($id, $name, $description){
        $p = new MCategories();
        $kq = $p->updateCategory($id, $name, $description);
        return $kq;
    }

    public function deleteCategory($id){
        $p = new MCategories();
        $kq = $p->deleteCategory($id);
        return $kq;
    }

}



?>