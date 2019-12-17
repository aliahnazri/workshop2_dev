<?php
session_start();
include('../connect.php');
$userid = $_SESSION['user_id'];

 $sql = "SELECT * FROM restaurant_menu INNER JOIN restaurant ON restaurant_menu.rest_id = restaurant.rest_id where restaurant.user_id = '$userid'";

$result = mysqli_query($conn,$sql) or die( mysqli_error($conn));

?>

<title>Menu</title>

<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Menu</h1>
        </div>
    </div>

    <div class="btn-toolbar">
    <?php $row = mysqli_fetch_array($result) ?>
        <a href="new_menu.php?restid=<?php echo $row ['rest_id']; ?>"><button type="button" style="float:right" class="btn btn-primary">New Menu</button>
    </div>

    <br />

    <table class="table table-striped table-bordered table-hover">

        <thead>

            <tr>

                <th>Menu</th>

                <th>Category</th>

                <th>Price</th>
                
                <th>Description</th>
                
                <th>Update</th>
                
                <th>Delete</th>

            </tr>

        </thead>

        <tbody>
            
           <?php  while($row = mysqli_fetch_array($result)){ ?>
            <tr>

                <td><?php echo $row['menu_name'] ?></td>

                <td><?php echo $row['menu_category'] ?></td>

                <td><?php echo $row['menu_price'] ?></td>

                <td><?php echo $row['menu_desc'] ?></td>
    
                <td><a href="update_menu.php"><i i class="fa fa-pencil fa-fw"></i>Update</a></td>
                
                <td><a href="del_menu.php"><i class="fa fa-trash-o fa-fw"></i> Delete</a></td>

            </tr>
 <?php } ?>

        </tbody>

    </table>
</div>
         

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>
    
    