<?php
session_start();
include('../connect.php');
$userid = $_SESSION['user_id'];
// echo $userid;
$sql = "SELECT * FROM restaurant WHERE user_id = '$userid'";
$result = mysqli_query($conn,$sql) or die(mysql_error);
?>

<title>Restaurant</title>

<?php include 'body_upper.php' ?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Restaurant</h1>
        </div>
    </div>

    <div class="btn-toolbar">
        <a href="new_restaurant.php"><button type="button" style="float:right" class="btn btn-primary">New Restaurant</button>
    </div>

    <br />

    <table class="table table-striped table-bordered table-hover">

        <thead>

            <tr>

                <th>Restaurant Name</th>

                <th>SSM No.</th>

<!--            <th>Restaurant Address</th>-->

                <th>Restaurant Phone No.</th>

                <th>Restaurant Email</th>

                <th>Update</th>

                <th>Delete</th>
                
                <th>View</th>

                <th>Menu</th>

            </tr>

        </thead>

        <tbody>

            <?php   while($row = mysqli_fetch_array($result)){ ?>
            <tr>

<!--                <td><?php echo $row['rest_id'] ?></td>-->

                <td><?php echo $row['rest_name'] ?></td>

                <td><?php echo $row['SSM'] ?></td>

<!--                <td><?php echo $row['rest_address'] ?></td>-->

                <td><?php echo $row['rest_phone_no'] ?></td>
                
                <td><?php echo $row['rest_email'] ?></td>

                <td><a href="update_restaurant.php?restid=<?php echo $row ['rest_id']; ?>"><i i class="fa fa-pencil fa-fw"></i>Update</a></td>

                <td><a href="del_rest.php"><i class="fa fa-trash-o fa-fw"></i> Delete</a></td>
                
                <td><a href="view_restaurant.php?"><i class="fa fa-file"></i> View</a></td>

                <td><a href="menu.php?restid=<?php echo $row ['rest_id']; ?>"><i></i>Menu</a></td> 

            </tr>

    <?php } ?>

        </tbody>

    </table>
<script>
function delFunction(rest_id)
{
	var message = confirm("Are you sure you want to delete this restaurant");
	if (message == true)
	{
		window.location.href = "restaurant.php?rest_id=" + rest_id;
	}
	else
	{
		
	}
}
</script>

</body>
</html>

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>