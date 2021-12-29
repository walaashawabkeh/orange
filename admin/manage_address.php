
<?php
ob_start();
 include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){
  

    $address = $_POST['address'];
 
    
    
  


    $query = "INSERT INTO address(`address`)
        VALUE ('$address')";

           mysqli_query($conn,$query);
             header("location:manage_address.php");
            }
?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage Address</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        
                        
                        <div class="form-group">
                                <label for="">Address Name </label>
                                <input type="text" id="address" name="address" placeholder="address" class="form-control">
                        </div>
                    












                     
                        
                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add Address</button></div>
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
                                            <th>Address Name</th>
                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM `address`";
                                        $excute = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['address'] ?></td>
                                        
                                            <td>
                                                <a href="delete_address.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_address.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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