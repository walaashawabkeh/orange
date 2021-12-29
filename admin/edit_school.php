<?php
ob_start();
include 'includes/header.php' ?>
<?php 

$id = $_GET['id'];

$query = "SELECT * from school where id=$id";
$excute = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($excute);

if(isset($_POST['addBtn'])){
  

    $school = $_POST['school'];
    $address= $_POST['address'];
    
    
  


    $query = "UPDATE `school` SET `name`='$school',`address`='$address' WHERE id=$id";
      

           mysqli_query($conn,$query);
             header("location:manage_school.php");
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
                                <label for="">Adress Name</label>
                                <input type="text" id="school" name="school" placeholder="school" value="<?php echo $row['name'] ?>" class="form-control">
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

                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Update school</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    </div></div>


<?php include 'includes/footer.php' ?>

