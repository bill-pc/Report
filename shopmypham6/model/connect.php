<?php 

    class Connect {
        public function connect(){
            return mysqli_connect('localhost','root','','shopmypham6');
        }
        public function closeConnect($conn){
            $conn->close();
        }
    }



?>