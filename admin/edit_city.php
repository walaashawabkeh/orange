<?php
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from city where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  

    $address = $_POST['name'];
    
    $path = 'uploads/';
    

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    
  


    $query = "UPDATE `city` SET `address`='$address',`image`='$image' WHERE id=$id";
      

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
                                <label for=""> Address :</label>
                                <input type="text" id="address" name="address" placeholder="name" value="<?php echo $row['address'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> Image :</label>
                                <input type="file" id="image" name="image" placeholder="image" class="form-control">
                        </div>
                        
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update City</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>