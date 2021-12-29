<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from student where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
$full_name = $_POST['fullname'];
$age = $_POST['age'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$address = $_POST['address'];
$school = $_POST['school'];
$driver_id = $_POST['driver_id'];
$parent_id =  $_POST['parent_id'];
$home_address =  $_POST['home_address'];
$lat =  $_POST['lat'];
$lon =  $_POST['lon'];






$query = "UPDATE `student` SET `full_name`='$full_name', `age`='$age', `phone1`='$phone1', `phone2`='$phone2',
`address_id`='$address', `school_id`='$school', `driver_id`='$driver_id', `parent_id`='$parent_id',
 `home_address`='$home_address', `lat`='$lon', `lon`='$lon' where id=$id";
   
   mysqli_query($conn,$query);
        header('location:manage_students.php');
    

    
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" value="<?php echo $row['full_name'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" value="<?php echo $row['age'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone1</label>
                                <input type="text" id="phone" name="phone1" placeholder="phone1" value="<?php echo $row['phone1'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone2</label>
                                <input type="text" id="phone" name="phone2" placeholder="phone2" value="<?php echo $row['phone2'] ?>" class="form-control">
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
                            <label for="">Driver </label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query4 = "SELECT * FROM `driver`";
                                    $excute4 = mysqli_query($conn,$query4);
                                    while($row4 = mysqli_fetch_assoc($excute4)){
                                ?>
                                <option value="<?php echo $row4['id'] ?>" <?php if($row['driver_id'] == $row4['id']) echo 'selected' ?>><?php echo $row4['full_name'] ?></option>


                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Perent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query5 = "SELECT * FROM `parents`";
                                    $excute5 = mysqli_query($conn,$query5);
                                    while($row5 = mysqli_fetch_assoc($excute5)){
                                ?>
                                <option value="<?php echo $row5['id'] ?>" <?php if($row['parent_id'] == $row5['id']) echo 'selected' ?>><?php echo $row5['name'] ?></option>


                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home Address</label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home Address" value="<?php echo $row['home_address'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="lat" value="<?php echo $row['lat'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="lon" value="<?php echo $row['lon'] ?>" class="form-control">
                        </div>

                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update Students</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>

