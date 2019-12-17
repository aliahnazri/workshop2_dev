<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Restaurant Details</h1>
        </div>
    </div>

    <!--
    <div class="btn-toolbar">
        <button type="button" style="float:right" class="btn btn-primary">New Restaurant</button>
    </div>
-->

    <br />


    <div class="row">
        <div class="col-sm-6">
            <!--left col-->


            <div class="text-center">
                <img src="http://placehold.it/500x300" alt="">

            </div>

            <br />
            <div class="btn-toolbar">
                <button type="button" style="float:left" class="btn btn-primary">Menu</button>
                <button type="button" style="float:right" class="btn btn-primary">Review</button>
            </div>
            <br />


            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
            </div>

<?php

include '../connect.php';
$restaurantID = $_GET['restaurantID'];    
    
$query = "SELECT * FROM restaurant where rest_id = '$restaurantID'";
                            
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)) { 
?>            

            <ul class="list-group">
                <!--                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>-->
                <li class="list-group-item text-center"><strong><?php echo $row['rest_name']; ?></strong></li>
                <li class="list-group-item text-center"><?php echo $row['rest_address']; ?></li>
                <li class="list-group-item text-center"><?php echo $row['rest_email']; ?></li>
                <li class="list-group-item text-center"><?php echo $row['rest_phone_no']; ?></li>
                <li class="list-group-item text-center">Operating Hours</li>
            </ul>
            
<?php } ?>            

<!--            <button type="button" style="float:center" class="btn btn-success btn-block">Book Now</button>-->
            <a href="booking_1.php?restaurantID=<?php echo $restaurantID; ?>" class="btn btn-success btn-block" role="button">Book Now</a>

            <br/>
        </div>
        <!--/col-3-->
        <div class="col-sm-6">

        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>