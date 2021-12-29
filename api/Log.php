<?php
 
 $connect = new mysqli('localhost','root','','orange_tourism');
    if($connect){
        $email = $_GET['email'];
        $password = $_GET['password'];

        $qeuryResult=$connect->query("SELECT * FROM user WHERE email='$email' AND password='$password'");
        
        $result=array();
        while($fetchData=$qeuryResult->fetch_assoc()){
            $result[]=$fetchData;
        }
        echo json_encode($result);
    }else{
        echo "Connection Failed";
        exit();
    }

?>