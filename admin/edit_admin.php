<?php
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from admin where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  

    $name = $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    
    
  


    $query = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password' WHERE id=$id";
      

           mysqli_query($conn,$query);
             header("location:manage_admin.php");
            }
    

    

?>
<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage school</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for=""> Name :</label>
                                <input type="text" id="name" name="name" placeholder="name" value="<?php echo $row['name'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> E-mail :</label>
                                <input type="text" id="email" name="email" placeholder="email" value="<?php echo $row['email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Password :</label>
                                <input type="password" id="password" name="password" placeholder="password" value="<?php echo $row['password'] ?>" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update Admin</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>