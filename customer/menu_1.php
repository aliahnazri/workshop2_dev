<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Menu of </h1>
        </div>
    </div>

<!--
    <div class="btn-toolbar">
        <button type="button" style="float:right" class="btn btn-primary">New Restaurant</button>
    </div>
-->

    <br />

    <div class="row">

        <?php
        include '../connect.php';

        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no']; }
        else { $page_no = 1; }
            $total_records_per_page = 4;
            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2"; 

        $query_1 = "SELECT COUNT(*) As total_records FROM `restaurant`";
        $result_count = mysqli_query($con, $query_1);
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; // total page minus 1

        $query_2 = "SELECT * FROM `restaurant` LIMIT $offset, $total_records_per_page";
        $result = mysqli_query($con, $query_2) or die(mysqli_error());
        
        while($row = mysqli_fetch_array($result)) { 
        ?>

        <div class="col-xs-18 col-sm-6 col-md-3">
            <div id="example" class="thumbnail">
                <img src="http://placehold.it/500x300" alt="">
                <div class="caption">
                    <h4 class="text-center"><?php echo $row['rest_name']; ?></h4>
                    <p class="text-center"><?php echo $row['rest_address']; ?></p>
                    <center>
                        <p>
                            <a href="restaurant_details.php?restaurantID=<?php echo $row['rest_id']; ?>" class="btn btn-info btn-sm" role="button">Restaurant Details</a>
                            <a href="booking_1.php?restaurantID=<?php echo $row['rest_id']; ?>" class="btn btn-success btn-sm" role="button">Book Now</a>
                        </p>
                    </center>
                </div>
            </div>
        </div>

        <?php } ?>

    </div><!-- End row -->

    <div class="row">
        <div style='padding: 10px 20px 0px;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
        </div>
        <center>
            <ul class="pagination">
                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                </li>

                <?php 
                    if ($total_no_of_pages <= 10){  	 
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                           echo "<li class='active'><a>$counter</a></li>";	
                                }else{
                           echo "<li><a href='?page_no=$counter'>$counter</a></li>"; }
                        }
                    }
                    
                    elseif($total_no_of_pages > 10){
                        if($page_no <= 4) {			
                            for ($counter = 1; $counter < 8; $counter++){		 
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>"; }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }

                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) { 
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }                  
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                        }

                        else {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>"; }
                            }
                        }
                    }
                    ?>

                <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                </li>
                <?php
                    if($page_no < $total_no_of_pages){
                        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                    }
                    ?>
            </ul>
        </center>
    </div> <!-- End row -->
</div>

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>