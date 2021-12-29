<?php 
ob_start();
$conn = mysqli_connect('localhost','root','','orange_tourism')
        or die('Could Not Connect');

$id = $_GET['id'];

$query = "DELETE from city where id=$id";
if(mysqli_query($conn,$query)){
    header("location:manage_city.php");
}

?>