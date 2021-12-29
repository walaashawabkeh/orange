<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from address where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  

    $address = $_POST['address'];
 
    
    
  


    $query = "UPDATE `address` SET `address`='$address' WHERE id=$id";
        

           mysqli_query($conn,$query);
             header("location:manage_address.php");
            }
    

    

?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage Adress</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for="">Adress Name</label>
                                <input type="text" id="address" name="address" placeholder="address" value="<?php echo $row['address'] ?>" class="form-control">
                        </div>
                        

                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update Address</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>

