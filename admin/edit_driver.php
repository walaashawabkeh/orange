<?php
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from driver where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);



if(isset($_POST['updateBtn'])){
    $ssn = $_POST['ssn'];
    $email =$_POST['email'];
    $full_name = $_POST['full_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $passengers_no = $_POST['passengers_no'];
    $address = $_POST['address'];
    $school = $_POST['school'];

    $d_image=false;
    $v_image=false;
    $vl_image=false;
    $dl_image=false;
    $df_image=false;



    $path = 'uploads/';
    

    $driver_image = $_FILES['driver_image']['name'];
    $driver_tmp_name = $_FILES['driver_image']['tmp_name'];

    if($_FILES['driver_image']['size'] != 0 && $_FILES['driver_image']['error'] == 0){
        $d_image=true;
    }
    
    $vehicle_image = $_FILES['vehicle_image']['name'];
    $vehicle_tmp_name = $_FILES['vehicle_image']['tmp_name'];

    if($_FILES['vehicle_image']['size'] != 0 && $_FILES['vehicle_image']['error'] == 0){
        $v_image=true;
    }
    $vehicle_license_image = $_FILES['vehicle_license_image']['name'];
    $license_tmp_name = $_FILES['vehicle_license_image']['tmp_name'];

    if($_FILES['vehicle_license_image']['size'] != 0 && $_FILES['vehicle_license_image']['error'] == 0){
        $vl_image=true;
    }
    $driver_license_image = $_FILES['driver_license_image']['name'];
    $dr_license_tmp_name = $_FILES['driver_license_image']['tmp_name'];

    if($_FILES['driver_license_image']['size'] != 0 && $_FILES['driver_license_image']['error'] == 0){
        $dl_image=true;
    }
    $disease_freedom = $_FILES['disease_freedom']['name'];
    $disease_tmp_name = $_FILES['disease_freedom']['tmp_name'];

    if($_FILES['disease_freedom']['size'] != 0 && $_FILES['disease_freedom']['error'] == 0){
        $df_image=true;
    }
    $no_criminal_record = $_POST['no_criminal_record'];
    

    if($d_image==true && $v_image==false && $vl_image==false && $dl_image==false && $df_image==false){
  $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`driver_image`='$driver_image',
        `no_criminal_record`='$no_criminal_record' WHERE id='$id' ";  
    }
    elseif($d_image==true && $v_image==true && $vl_image==false && $dl_image==false && $df_image==false){
        $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`driver_image`='$driver_image',`vehicle_image`='$vehicle_image',
        `no_criminal_record`='$no_criminal_record' WHERE id='$id' "; 
    }
    elseif($d_image==true && $v_image==true && $vl_image==true && $dl_image==false && $df_image==false){
        $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`driver_image`='$driver_image',`vehicle_image`='$vehicle_image',`vehicle_license_image`='$vehicle_license_image',
        `no_criminal_record`='$no_criminal_record' WHERE id='$id' "; 
    }
    elseif($d_image==true && $v_image==true && $vl_image==true && $dl_image==true && $df_image==false){
        $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`driver_image`='$driver_image',`vehicle_image`='$vehicle_image',`vehicle_license_image`='$vehicle_license_image',
        `driver_license_image`='$driver_license_image',`no_criminal_record`='$no_criminal_record' WHERE id='$id' "; 
    }
    elseif($d_image==true && $v_image==true && $vl_image==true && $dl_image==true && $df_image==true){
        $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`driver_image`='$driver_image',`vehicle_image`='$vehicle_image',`vehicle_license_image`='$vehicle_license_image',
        ,`disease_freedom`='$disease_freedom',`no_criminal_record`='$no_criminal_record' WHERE id='$id' "; 
    }
    else{
        $q=" UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
        `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
        `phone`='$phone',`no_criminal_record`='$no_criminal_record' WHERE id='$id' ";  
    }
  
    // elseif($v_image==true && $d_image==false && $vl_image==false && $dl_image==false && $df_image==false){
    //     $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
    //     `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
    //     `phone`='$phone',`vehicle_image`='$vehicle_image',`no_criminal_record`='$no_criminal_record' WHERE id='$id' "; 
    // }
    // elseif($v_image==true && $d_image==true && $vl_image==false && $dl_image==false && $df_image==false){
    //     $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
    //     `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
    //     `phone`='$phone',`vehicle_image`='$vehicle_image',`no_criminal_record`='$no_criminal_record',
    //     `driver_image`='$driver_image' WHERE id='$id' "; 
    // }
    // elseif($v_image==true && $d_image==true && $vl_image==true && $dl_image==false && $df_image==false){
    //     $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
    //     `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
    //     `phone`='$phone',`vehicle_image`='$vehicle_image',`no_criminal_record`='$no_criminal_record',
    //     `driver_image`='$driver_image',`vehicle_license_image`='$vehicle_license_image' WHERE id='$id' "; 
    // }
    // elseif($v_image==true && $d_image==true && $vl_image==true && $dl_image==true && $df_image==false){
    //     $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
    //     `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
    //     `phone`='$phone',`vehicle_image`='$vehicle_image',`no_criminal_record`='$no_criminal_record',
    //     `driver_image`='$driver_image',`vehicle_license_image`='$vehicle_license_image',
    //      `driver_license_image`='$driver_license_image' WHERE id='$id' "; 
    // }
    // elseif($vl_image==true && $v_image==flase && $d_image==false  && $dl_image==false && $df_image==false){
    //     $q= " UPDATE `driver` SET `full_name`='$full_name',`email`='$email',`password`='$password',`age`='$age',
    //     `ssn`='$ssn',`passengers_no`='$passengers_no',`address_id`='$address',`school_id`='$school',
    //     `phone`='$phone',`vehicle_image`='$vehicle_image',`no_criminal_record`='$no_criminal_record',
    //     `driver_image`='$driver_image',`vehicle_license_image`='$vehicle_license_image',
    //      `driver_license_image`='$driver_license_image' WHERE id='$id' "; 
    // }


// echo $v_image;
// echo $d_image;
// echo $vl_image;
// echo $dl_image;
// echo $df_image;
// echo $q;
// print_r($_FILES);
// die;
   

    if(mysqli_query($conn,$q)){
       
        move_uploaded_file($driver_tmp_name, $path.$driver_image);
        move_uploaded_file($vehicle_tmp_name,$path.$vehicle_image);
        move_uploaded_file($license_tmp_name,$path.$vehicle_license_image);
        move_uploaded_file($dr_license_tmp_name,$path.$driver_license_image);
        move_uploaded_file($disease_tmp_name,$path.$disease_freedom);
        header('location:manage_drivers.php');
    }

    
}






?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage Drivers</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Serial Number</label>
                                <input type="text" id="ssn" name="ssn" placeholder="Serial Number" value="<?php echo $row['ssn'] ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="full_name" placeholder="fullname" value="<?php echo $row['full_name'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo $row['email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" value="<?php echo $row['password'] ?>" placeholder="password" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="phone" value="<?php echo $row['phone'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" value="<?php echo $row['age'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">passengers No</label>
                                <input type="number" id="passengers_no" name="passengers_no" value="<?php echo $row['passengers_no'] ?>" placeholder="passengers no" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
                            <select name="address" class="form-control" id="">
                                <?php 
                                    $query2 = "SELECT * FROM `address`";
                                    $excute2 = mysqli_query($conn,$query2);
                                    while($row2 = mysqli_fetch_assoc($excute2)){
                                ?>
                                <option value="<?php echo $row2['id'] ?>" <?php if($row['address_id'] == $row2['id']) echo 'selected' ?> ><?php echo $row2['address'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">school</label>
                            <select name="school" class="form-control" id="">
                                <?php 
                                    $query3 = "SELECT * FROM `school`";
                                    $excute3 = mysqli_query($conn,$query3);
                                    while($row3 = mysqli_fetch_assoc($excute3)){
                                ?>
                                <option value="<?php echo $row3['id'] ?>" <?php if($row['school_id'] == $row3['id']) echo 'selected' ?>><?php echo $row3['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">driver image</label>
                                <input type="file" id="driver_image" name="driver_image" placeholder="driver image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Vehicle Image</label>
                                <input type="file" id="vehicle_image" name="vehicle_image" placeholder="vehicle image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">vehicle license image</label>
                                <input type="file" id="vehicle_license_image" name="vehicle_license_image" placeholder="vehicle license image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">driver license image</label>
                                <input type="file" id="driver_license_image" name="driver_license_image" placeholder="driver license image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">disease freedom</label>
                                <input type="file" id="disease_freedom" name="disease_freedom" placeholder="disease freedom" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">No criminal record</label>
                                <input type="text" id="no_criminal_record" name="no_criminal_record" value="<?php echo $row['no_criminal_record'] ?>" placeholder="No criminal record" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="updateBtn" class="btn btn-success btn-sm">Update Driver</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>

