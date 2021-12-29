<?php include 'includes/header.php' ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            $q="select * from admin";
                                            $result = mysqli_query($conn,$q);
                                            $rowcount=mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></span></div> 
                                            <div class="stat-heading">Admin</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            $q="select * from user";
                                            $result = mysqli_query($conn,$q);
                                            $rowcount=mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">User's</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-note"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            $q="select * from city";
                                            $result = mysqli_query($conn,$q);
                                            $rowcount=mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">City</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-delete-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            $q="select * from tourist_place";
                                            $result = mysqli_query($conn,$q);
                                            $rowcount=mysqli_num_rows($result);
                                            echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">T-Place</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <!-- <div class="row">
                <div class="col-lg-4 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-delete-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            // $q="select * from address";
                                            // $result = mysqli_query($conn,$q);
                                            // $rowcount=mysqli_num_rows($result);
                                            // echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">Address</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
              
                <!-- <div class="col-lg-4 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-delete-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            // $q="select * from admin";
                                            // $result = mysqli_query($conn,$q);
                                            // $rowcount=mysqli_num_rows($result);
                                            // echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">Admin</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="col-lg-4 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-delete-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php 
                                            // $q="select * from parents";
                                            // $result = mysqli_query($conn,$q);
                                            // $rowcount=mysqli_num_rows($result);
                                            // echo $rowcount;
                                            ?></span></div>
                                            <div class="stat-heading">parents</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                </div>

<?php include 'includes/footer.php' ?>