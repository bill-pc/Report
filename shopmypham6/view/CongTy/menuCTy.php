<?php
    include("controller/cCompany.php");
    
    $p = new CCompany();
    $tableComp = $p->getAllCompany();
    
    if(!$tableComp){
        echo "Không có sản phẩm";
    }elseif($tableComp == null){
        echo "Chưa có dữ liệu";
    }else{
        while ($row=$tableComp->fetch_assoc()){
            echo "<a href='index.php?Comp=".$row["company_id"]."'>".$row["name"]."</a><br><br>";
        }
    }
?>