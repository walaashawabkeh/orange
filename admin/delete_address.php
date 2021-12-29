<?php 
ob_start();
$conn = mysqli_connect('localhost','root','','hero_bus')
        or die('Could Not Connect');

$id = $_GET['id'];

$query = "DELETE from address where id=$id";
if(mysqli_query($conn,$query)){
    header("location:manage_address.php");
}

?>