<?php
session_start();
include('../connect.php');

?>

<title>Reservation</title>

<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div>

   <br />

    <table class="table table-striped table-bordered table-hover">

        <thead>

            <tr>

                <th>Table ID</th>

                <th>User ID</th>

                <th>Customer's Name</th>

                <th>Deposit</th>
                
                <th>Date and Time</th>
                
                <th>Checkout</th>
                
                <th>Menu Reservation</th>
                
            </tr>

         </thead>

        <tbody>

           <?php 
                $sql = "SELECT * FROM table_reservation
                        INNER JOIN user ON table_reservation.user_id = user.user_id";
		        $result = mysqli_query($conn,$sql);
    
            while($row = mysqli_fetch_array($result)){ ?>
            <tr>

               <td><?php echo $row['table_id'] ?></td>
                
                <td><?php echo $row['user_id'] ?></td>
                
                <td><?php echo $row['user_name'] ?></td>

                <td><?php echo $row['deposit'] ?></td>

               <td><?php echo $row['datetime'] ?></td>

                <td><?php echo $row['checkout'] ?></td>
                
                <td><a href="view_menuReservation.php?"><i class="fa fa-file"></i> View</a></td>

            </tr>

    <?php } ?>

        </tbody>

    </table>
</div>

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>