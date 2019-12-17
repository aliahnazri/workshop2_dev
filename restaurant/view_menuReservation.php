<?php
session_start();
include('../connect.php');

?>

<title>Menu Reservation</title>

<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Menu Reservation</h1>
        </div>
    </div>

   <br />

    <table class="table table-striped table-bordered table-hover">

        <thead>

            <tr>

                <th>Menu</th>

                <th>Menu Price</th>

                <th>Quantity</th>
                
                
            </tr>

         </thead>

        <tbody>

           <?php 
                $sql = "SELECT * FROM menu_reservation
                        INNER JOIN restaurant_menu ON menu_reservation.menu_id = restaurant_menu.menu_id";
		        $result = mysqli_query($conn,$sql);
    
            while($row = mysqli_fetch_array($result)){ ?>
            <tr>

               <td><?php echo $row['menu_name'] ?></td>
                
                <td><?php echo $row['menu_price'] ?></td>
                
                <td><?php echo $row['quantity'] ?></td>

            </tr>

    <?php } ?>

        </tbody>

    </table>
</div>

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>