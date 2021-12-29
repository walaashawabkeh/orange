<?php 

header("Content-Type: application/json");
include 'connection.php';


# query --1--

$query = "SELECT city.address , tourist_place.nameplace , tourist_place.description, tourist_place.lat ,tourist_place.lon
FROM city
INNER JOIN tourist_place ON city.id  = tourist_place.city_id";
$result =mysqli_query($connection,$query);

$output = [];
while($item =$result->fetch_assoc()){
    $output[] = $item;

}
echo json_encode($output);
?>


