<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
 $name=$_POST['name'];
 $phone=$_POST['phone'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $address=$_POST['address'];

 $query="INSERT INTO `parents`(`name`, `phone`, `email`, `password`, `address`) VALUES 
 ('$name','$phone','$email','$password','$address')";
 mysqli_query($conn,$query);
 header('location: manage_parent.php');
}
?>
 <div class="content">
     <div class="animated fadeIn">
         <div class="row mb-5">
             <div class="col-lg-12 ">
                 <div class="card">
                     <div class="card-header bg-secondary text-light">Manage Students</div>
                         <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for="">Name :</label>
                                <input type="text" id="name" name="name" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone:</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">E-mail :</label>
                                <input type="text" id="email" name="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <select name="address" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `address`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['address'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Parents</button></div>
                                        </form>
                                 </div>
                           </div>
                    </div>
             </div>
      </div>  
</div>              
<div class="row mb-5">
    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>E-mail</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT parents.*,address.address as address_name FROM `parents` INNER JOIN `address` on parents.address=address.id";
                                        $excute = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['address_name'] ?></td>
                                            <td>
                                            <a href="delete_parent.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_parent.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                              </div>
                        </div>
                  </div>
            </div>
       </div>
 </div>




<?php include 'includes/footer.php' ?>