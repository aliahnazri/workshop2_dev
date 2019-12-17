<?php include 'body_upper.php' ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Restaurant Approval</h1>
        </div>
	</div>
	<div class="col-lg-12">
		<table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Restaurant Name</th>
                    <th>SSM</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Operating Hours</th>
                    <th width="11%">Action</th>
                </tr>
            </thead>
            <?php
            include '../connect.php';
            $bil = 0;
            $query = "SELECT * FROM restaurant WHERE status='PENDING'";
            $result =mysqli_query($con,$query);
            while($row = mysqli_fetch_array($result)){
            	$id = $row["rest_id"];
                $email = $row["user_id"];
            	$bil ++;
                ?>
                <tr>
                    <td><?php echo $bil;?></td>
                    <td><?php echo $row['rest_name'];?></td>
                    <td><?php echo $row['SSM'];?></td>
                    <td><?php echo $row['rest_address'];?></td>
                    <td><?php echo $row['rest_email'];?></td>
                    <td><?php echo $row['rest_phone_no'];?></td>
                    <td><?php echo $row['operating_hours'];?></td>
                    <td>
                    	<a href='restaurantdb.php?id=<?php echo $id ?>&status=approve' name="approve" class="btn btn-success" ><span class="glyphicon glyphicon-ok"></span></a>
                    	<a href='restaurantdb.php?id=<?php echo $id ?>&email=<?php echo $email ?>&status=delete' onclick="return confirm('Are you sure you want to reject this restaurant?');" name="delete" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
	</div>
</div>
<?php include 'body_lower.php' ?>