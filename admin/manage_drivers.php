
<?php
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
    $ssn = $_POST['ssn'];

    $full_name = $_POST['full_name'];
    $email=$_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $passengers_no = $_POST['passengers_no'];
    $address = $_POST['address'];
    $school = $_POST['school'];

    $path = 'uploads/';
    
    $driver_image =time().'1'.$_FILES['driver_image']['name'];
    $driver_tmp_name = $_FILES['driver_image']['tmp_name'];

    $vehicle_image =time().'2'.$_FILES['vehicle_image']['name'];
    $vehicle_tmp_name = $_FILES['vehicle_image']['tmp_name'];

    $vehicle_license_image =time().'3'.$_FILES['vehicle_license_image']['name'];
    $license_tmp_name = $_FILES['vehicle_license_image']['tmp_name'];

    $driver_license_image =time().'4'.$_FILES['driver_license_image']['name'];
    $dr_license_tmp_name = $_FILES['driver_license_image']['tmp_name'];
    
    $disease_freedom =time().'5'.$_FILES['disease_freedom']['name'];
    $disease_tmp_name = $_FILES['disease_freedom']['tmp_name'];

    $no_criminal_record = $_POST['no_criminal_record'];


    $query = "INSERT INTO driver (`full_name`,`email`, `password`, `age`, `ssn`, `passengers_no`, `address_id`, `school_id`, `phone`,
        `vehicle_image`, `vehicle_license_image`, `driver_license_image`, `driver_image`,
        `disease_freedom`, `no_criminal_record`)
        VALUE ('$full_name','$email','$password','$age','$ssn','$passengers_no','$address','$school','$phone',
        '$vehicle_image','$vehicle_license_image','$driver_license_image','$driver_image','$disease_freedom','$no_criminal_record')";


    


    if(mysqli_query($conn,$query)){
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
                                <input type="text" id="ssn" name="ssn" placeholder="Serial Number" class="form-control">
                        </div>
                        
                        <div class="form-group">
                                <label for=""> FullName :</label>
                                <input type="text" id="full_name" name="full_name" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for=""> E-mail :</label>
                                <input type="email" id="email" name="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" placeholder="password" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="phone" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">passengers No</label>
                                <input type="number" id="passengers_no" name="passengers_no" placeholder="passengers no" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">address</label>
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
                        <div class="form-group">
                            <label for="">school</label>
                            <select name="school" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `school`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

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
                                <input type="text" id="no_criminal_record" name="no_criminal_record" placeholder="No criminal record" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Driver</button></div>
                    </form>
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
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Age</th>
                                            <th>Phone</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT driver.*,address.address as 'address_name' FROM `driver`inner join `address` on driver.address_id=address.id ";
                                        $excute = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['address_name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td>
                                                <a href="delete_driver.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_driver.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
 <script src="assets/js/init/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>