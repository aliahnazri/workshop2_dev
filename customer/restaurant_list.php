<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List of restaurants</h1>
        </div>
    </div>
    <br />

    <div class="row">

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                
<?php
include '../connect.php';
$userid = $_SESSION['user_id'];
//$restaurantID = $_GET['restaurantID'];    
    
$query = "SELECT * FROM restaurant JOIN user ON
restaurant.user_id = user.user_id WHERE restaurant.user_id = '$userid'";
                            
$result = mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)) { 
?>
                
                <tr class="odd gradeX">
                    <td><center><?php echo $row['rest_name']; ?></center></td>
                    <td><center><?php echo $row['rest_email']; ?></center></td>
                    <td><center><?php echo $row['rest_phone_no']; ?></center></td>
                    <td><a href="restaurant_list_view.php?restaurantID=<?php echo $row['rest_id']; ?>" class="btn btn-sm btn-success btn-block" role="button">View</a></td>
                    <td><a href="restaurant_list_delete.php?restaurantID=<?php echo $row['rest_id']; ?>" class="btn btn-sm btn-success btn-block" role="button">Delete</a></td>
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