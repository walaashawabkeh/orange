

<?php
    $name = $_POST["name"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];
    $password = $_POST["password"];
    
    require_once 'connection.php';
$findexist="select * from user where email='$email'";
        $resultsearch=mysqli_query($connection,$findexist);
    if(mysqli_num_rows($resultsearch)>0)
    {
           while($row=mysqli_fetch_array($resultsearch))
          {
              $result["success"] = "3";
              $result["message"] = "user Already exist";
              echo json_encode($result);
              mysqli_close($connection);
          }
  }
else{
    $sql = "INSERT INTO user (name,email,phone,password) VALUES ('$name','$email','$phone','$password');";
    if ( mysqli_query($connection, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "Registration success";
        echo json_encode($result);
        mysqli_close($connection);
    } else {
        $result["success"] = "0";
        $result["message"] = "error in Registration";
        echo json_encode($result);
        mysqli_close($connection);
    }
}
?>


