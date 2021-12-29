
<?php
ob_start();
include 'includes/header.php' ?>
<?php 

if(isset($_POST['addBtn'])){

    $nameplace = $_POST['nameplace'];
    $desc = $_POST['desc'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];
    $city_id = $_POST['city_id'];

    $img   =time().'1'. $_FILES['img']['name'];
    $tmp     = $_FILES['img']['tmp_name'];
    $path    = 'uploads/';
    
    $query = "INSERT INTO `tourist_place`(`nameplace`, `desc`, `img`, `lat`, `lon`, `city_id`) VALUE ('$nameplace','$desc','$img','$lat','$lon','$city_id')";
    if(mysqli_query($conn,$query)){
        move_uploaded_file($tmp,$path.$img);
        header('location:manage_place.php');
    }
}

?>


<div class="content">
    <div class="animated fadeIn">
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header bg-secondary text-light">Manage Place</div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="">Nmae Place :</label>
                                <input type="text" id="nameplace" name="nameplace" placeholder="Name Place" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Descirption :</label>
                                <input type="text" id="desc" name="desc" placeholder="Description" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Place image :</label>
                                <input type="file" id="img" name="img" placeholder="city image" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lat :</label>
                                <input type="text" id="lat" name="lat" placeholder="lat" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="">Lon :</label>
                                <input type="text" id="lon" name="lon" placeholder="lon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">City Id</label>
                            <select name="city_id" class="form-control" id="">
                                <?php 
                                    $query = "SELECT * FROM `city`";
                                    $excute = mysqli_query($conn,$query);
                                    while($row = mysqli_fetch_assoc($excute)){
                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['address'] ?></option>

                                <?php }
                                    
                                ?>

                            </select>
                        </div>

                        <div class="form-actions form-group"><button type="submit" name="addBtn" class="btn btn-success btn-sm">Add City</button></div>
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
                                            <th>Name Place</th>
                                            <th>Descirption</th>
                                            <th>Image</th>
                                            <th>Lat</th>
                                            <th>Lon</th>
                                            <th>City(name)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $query = "SELECT * FROM tourist_place INNER JOIN city ON tourist_place.city_id=city.id";
                                        $excute = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($excute)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['nameplace'] ?></td>
                                            <td><?php echo $row['desc'] ?></td>
                                            <td><img src="uploads/<?php echo $row['img']?>" width="60px" height="50px"></td>
                                            <td><?php echo $row['lat'] ?></td>
                                            <td><?php echo $row['lon'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td>
                                                <a href="delete_city.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure?')"><i class="fa fa-trash fa-sm"></i></a>
                                                <a href="edit_city.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm"></i></a>
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