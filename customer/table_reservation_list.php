<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List of reservations made</h1>
        </div>
    </div>
    <br />

    <div class="row">

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th>Table Number</th>
                    <th>Pax</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total (RM)</th>
                    <th>Status</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                
<?php
include '../connect.php';
$userid = $_SESSION['user_id'];
//$restaurantID = $_GET['restaurantID'];    
    
$query = "SELECT * FROM restaurant JOIN restaurant_table JOIN table_reservation JOIN reservation_time ON
restaurant.rest_id = restaurant_table.rest_id AND restaurant_table.table_id = table_reservation.table_id AND table_reservation.time_id = reservation_time.time_id
WHERE table_reservation.user_id = '$userid'";
                            
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)) { 
?>
                
                <tr class="odd gradeX">
                    <td><center><?php echo $row['rest_name']; ?></center></td>
                    <td><center><?php echo $row['table_no']; ?></center></td>
                    <td><center><?php echo $row['table_pax']; ?></center></td>
                    <td><center><?php echo $row['date']; ?></center></td>
                    <td><center><?php echo $row['time_available']; ?></center></td>
                    <td><center><?php echo $row['checkout']; ?></center></td>
                    <td><center><?php echo $row['payment_status']; ?></center></td>
                    <td><a href="booking_2.php?restaurantID=<?php echo $restaurantID; ?>&tableID=<?php echo $row['table_id']; ?>" class="btn btn-sm btn-success btn-block" role="button">See Menu</a></td>
                   
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