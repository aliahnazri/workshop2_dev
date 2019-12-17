<?php include 'body_upper.php' ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Restaurant</h1>
        </div>
    </div>
    <br />

    <div class="row">

        <?php
include '../connect.php';

$userid = $_SESSION['user_id'];
$restaurantID = $_GET['restaurantID'];    
$tableID = $_GET['tableID'];    
    
$query = "SELECT * FROM restaurant JOIN restaurant_table ON restaurant.rest_id = restaurant_table.rest_id
WHERE restaurant.rest_id AND restaurant_table.table_id= '$tableID'";
                            
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);    

if(isset($_POST['confirm']))
{   
    $date = $_POST['date'];    
    $time = $_POST['time'];    
    
    $sql = "INSERT INTO table_reservation (table_id, user_id, deposit, date, time, payment_status) VALUES ('$tableID', '$userid', 10, '$date', '$time', 'PENDING')";   
    $query = mysqli_query($con, $sql) or $error = mysqli_error($con);    
    
    if(!isset($error)){
        $successMSG = "Thank you. Your booking has been confirmed.";
//        header("Refresh:2");
        } 
    else { $errMSG = "Error inserting data. Please try again."; }  
    
    $sql_update = "UPDATE restaurant_table SET table_status = 'UNAVAILABLE' WHERE table_id = '$tableID'";   
    $query_update = mysqli_query($con, $sql_update) or $error = mysqli_error($con);    
}
?>

        <div class="col-xs-12 col-sm-12">
            <form name="frmChange" class="form-horizontal" method="post" action="">

                <?php
                            if(isset($errMSG)){
                            ?>
                <div class="alert alert-danger">
                    <strong><?php echo $errMSG; ?></strong><br />
                </div>
                <?php
                            }
                            else if(isset($successMSG)){
                            ?>
                <div class="alert alert-success">
                    <strong><?php echo $successMSG; ?></strong><br />
                </div>
                <?php
                            }
                            ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Confirm Booking</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Table Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="tablenumber" class="form-control" id="tablenumber" value="<?php echo $row['table_no']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Deposit (RM)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="deposit" id="deposit" value="50" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="time" id="time">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Time</label>
                            <div class="col-sm-10">
                                <select name="year" class="form-control" required>
                                    <option value=''>SELECT TIME</option>
                                    <?php 
                        $sql = "SELECT time_available FROM reservation_time";
                        $res = mysqli_query($con, $sql);
                        if(mysqli_num_rows($res) > 0) {
                            while($row = mysqli_fetch_object($res)) {
                                echo "<option value='".$row->time_id."'>".$row->time_available."</option>";
                            }
                        }
                        ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button name="confirm" type="submit" class="btn btn-primary">Confirm</button>
                                <button type="button" class="btn btn-default"><a href="">Back</a></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>


    </div><!-- End row -->


</div>

<!-- /#page-wrapper -->



<?php include 'body_lower.php' ?>