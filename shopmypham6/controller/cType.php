<?php
include_once("model/mType.php");

class CType{
    public function getAllType(){
        $p = new MType();
        $table = $p->getAllType();
        
        if($table){
            if($table->num_rows>0){
                return $table;
            }
        }else{
            return false;
        }
    }

}



?>