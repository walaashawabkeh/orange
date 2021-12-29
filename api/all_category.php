<?php 

header("Content-Type: application/json");
include 'connection.php';


# query --1--

$query = "select * from city";
$result =mysqli_query($connection,$query);

$output = [];
while($item =$result->fetch_assoc()){
    $output[] = $item;

}
echo json_encode($output);
?>


