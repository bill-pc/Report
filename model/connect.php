<?php 

    class Connect {
        public function connect(){
            return mysqli_connect('localhost','root','','shopmypham');
        }
        public function closeConnect($conn){
            $conn->close();
        }
    }



?>