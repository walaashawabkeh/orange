
<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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


















<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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
































<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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
































<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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
































<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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
































<?php 
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $full_name = $_POST['fullname'];
    $age = $_POST['age'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $driver_id = $_POST['driver_id'];
    $parent_id = $_POST['parent_id'];
    $home_address =$_POST['home_address'];
    $lat =$_POST['lat'];
    $lon =$_POST['lon'];




    $query = "INSERT INTO `student`(`full_name`, `age`, `phone1`, `phone2` 
    , `address_id`,`school_id`, `driver_id`,`parent_id`,`home_address`,`lat`,`lon`) 
    VALUES ('$full_name','$age','$phone1','$phone2','$address','$school','$driver_id','$parent_id'
    ,'$home_address','$lat','$lon')";

    mysqli_query($conn,$query);
    header("location:manage_students.php");
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
                                <label for="">FullName</label>
                                <input type="text" id="fullname" name="fullname" placeholder="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" id="age" name="age" placeholder="age" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-1</label>
                                <input type="text" id="phone1" name="phone1" placeholder="phone-1" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Phone-2</label>
                                <input type="text" id="phone2" name="phone2" placeholder="phone2" class="form-control">
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
                            <label for="">Driver Id</label>
                            <select name="driver_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `driver`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `parents`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                                <label for="">Home </label>
                                <input type="text" id="home_address" name="home_address" placeholder="Home" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat</label>
                                <input type="text" id="lat" name="lat" placeholder="Lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon</label>
                                <input type="text" id="lon" name="lon" placeholder="Lon" class="form-control">
                        </div>
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Student</button></div>
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
                                            <th>status</th>
                                            <th>Name</th>
                                            <th>school</th>
                                            <th>Age</th>
                                            <th>Phone1</th>
                                            <th>Driver</th>
                                            <th>Parent</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php  
                                            $query = "SELECT student.*,driver.full_name as 'driver_name',parents.name as 'parent_name',school.name as 'school_name' FROM student inner join driver on student.driver_id=driver.id inner join school on student.school_id=school.id  inner join parents on student.parent_id=parents.id ";
                                            $excute = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($excute)){
                                            ?>
                                        <tr>
                                            <td>
                                        <?php if($row['status'] == 0){ ?>
                                            <a href="accpet_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('are you sure?')" ><i class="fa fa-check"></i></a>
                                            <a href="decline_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php }elseif(($row['status'] == 1)){ ?>
                                            <span class="text-success" style="font-weight:bold; text-align:center">Active</span>
                                        <?php }elseif($row['status'] == -1){ ?>
                                            <span class="text-danger" style="font-weight:bold; text-align:center">Decline</span>
                                        <?php } ?>
                                            </td>
                                            <td><?php echo $row['full_name'] ?></td>
                                            <td><?php echo $row['school_name'] ?></td>
                                            <td><?php echo $row['age'] ?></td>
                                            <td><?php echo $row['phone1'] ?></td>
                                            <td><?php echo $row['driver_name'] ?></td>
                                            <td><?php echo $row['parent_name'] ?></td>
                                            <td>
                                            <a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                            <a href="edit_student.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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



