<?php include 'configuration.php'; ?>
<?php
    // connect to database
      
    $html = '';
    $id = $_GET["id"];

    $select_place = "select * from tourist_place where city_id = '$id'";
    $result_place = mysqli_query( $link , $select_place );
    if( mysqli_num_rows( $result_place ) >0 ){
        while( $row_place = mysqli_fetch_array( $result_place ) ){
            $html .= '
            <div class="tm-recommended-place">
                <img src="'.$row_place["img"].'" alt="Image" class="img-fluid tm-recommended-img">
                <div class="tm-recommended-description-box">
                    <h3 class="tm-recommended-title">'.$row_place["nameplace"].'</h3>
                    <p class="tm-text-highlight">Two North</p>
                    <p class="tm-text-gray">'.$row_place["desc"].'</p>   
                </div>
                <div id="preload-hover-img"></div>
                <a href="#" class="tm-recommended-price-box">
                    <p class="tm-recommended-price">$120</p>
                    <p class="tm-recommended-price-link">Continue Reading</p>
                </a>
            </div>
            ';
        }
    }

    echo $html;
?>