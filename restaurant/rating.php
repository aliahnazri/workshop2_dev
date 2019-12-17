<?php
session_start();
include('../connect.php');

?>

<title>Reviews and Rating</title>

<?php include 'body_upper.php' ?>


<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reviews and Rating</h1>
        </div>
    </div>

   <br />

    <table class="table table-striped table-bordered table-hover">

        <thead>

            <tr>

                <th>Rating</th>

                <th>Comment</th>

                <th>Date & Time</th>
                
            </tr>

        </thead>

        <tbody>

           
        <?php   
            $sql = "SELECT * FROM rest_review INNER JOIN user on rest_review.user_id = user.user_id";
            $result = mysqli_query($conn,$sql);

            while($row = mysqli_fetch_array($result)){ ?>
            <tr>

<!--                <td><?php echo $row['rest_rev_id'] ?></td>-->

<!--               <td><?php echo $row['user_id'] ?></td>-->

<!--                <td><?php echo $row['rest_id'] ?></td>-->

                <td><?php echo $row['rest_rating'] ?></td>

                <td><?php echo $row['comment'] ?></td>
                
                <td><?php echo $row['datetime'] ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

<!-- /#page-wrapper -->


<?php include 'body_lower.php' ?>