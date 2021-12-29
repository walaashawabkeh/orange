<?php
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from parents where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  
    $name = $_POST['name'];
    $phone =$_POST['phone'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $address=$_POST['address'];
    
    $query = "UPDATE `parents` SET `name`='$name',`phone`='$phone',`email`='$email',`password`='$password',
    `address`='$address'  WHERE id=$id";
      
           mysqli_query($conn,$query);
             header("location:manage_parent.php");
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
                                <label for="">Name</label>
                                <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $row['name'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" value="<?php echo $row['phone'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" id="email" name="email" placeholder="E-mail" value="<?php echo $row['email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">password</label>
                                <input type="text" id="password" name="password" placeholder="password" value="<?php echo $row['password'] ?>" class="form-control">
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="">address</label>
                            <select name="address" class="form-control" id="">
                                <?php 
                                    $query2 = "SELECT * FROM `address`";
                                    $excute2 = mysqli_query($conn,$query2);
                                    while($row2 = mysqli_fetch_assoc($excute2)){
                                ?>
                                <option value="<?php echo $row2['id'] ?>" <?php if($row['address'] == $row2['id']) echo 'selected' ?> ><?php echo $row2['address'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update Parents</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>
