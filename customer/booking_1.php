<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Restaurant</h1>
        </div>
    </div>
    <br />

    <div class="row">

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Pax</th>
                    <th>Table Number</th>
                    <th>Time Availability</th>
                    <th>Table Status</th>
                    <th>Book</th>
                </tr>
            </thead>
            <tbody>
                
<?php
include '../connect.php';
$restaurantID = $_GET['restaurantID'];    
    
$query = "SELECT * FROM restaurant JOIN restaurant_table JOIN reservation_time ON restaurant.rest_id = restaurant_table.rest_id WHERE restaurant.rest_id = '$restaurantID'
AND restaurant_table.table_id = reservation_time.table_id";
                            
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)) { 
?>
                
                <tr class="odd gradeX">
                    <td><center><?php echo $row['table_pax']; ?></center></td>
                    <td><center><?php echo $row['table_no']; ?></center></td>
                    <td><center><?php echo $row['time']; ?></center></td>
                    <td><center><?php echo $row['status']; ?></center></td>
                    <?php if($row['table_status'] == 'AVAILABLE') { ?>
<!--                    <button disabled><a href="go.php">hi</a></button>-->
                    <td><a href="booking_2.php?restaurantID=<?php echo $restaurantID; ?>&tableID=<?php echo $row['table_id']; ?>" class="btn btn-sm btn-success btn-block" role="button">Book Now</a></td>
                    <?php } 
                    else { ?>
                    <td><a disabled href="#" class="btn btn-sm btn-success btn-block" role="button">Book Now</a></td>
                    <?php } ?>
                </tr>
<?php } ?> 
                
            </tbody>
        </table>


    </div><!-- End row -->


</div>

<!-- /#page-wrapper -->



<?php include 'body_lower.php' ?>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

</script>