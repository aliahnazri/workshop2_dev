<?php 
session_start();


include 'body_upper.php' 
?>


<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Feedback</h1>
            
        </div>
          
    <table class="table table-striped table-bordered table-hover">
        <thead>

            <tr>

                <th>App Review ID</th>

                <th>User ID</th>
                
                <th>Feedback Title</th>
                
                <th>Feedback Content</th>
                

            </tr>

        </thead>
        <form method = "POST" >
        <tbody>
            <?php
                include '../connect.php';
                $query = "SELECT * FROM app_review";
                $result =mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    
                ?>
            <tr>
             

                <td><?php echo $row['app_review_id'];?></td>

                <td><?php echo $row['user_id'];?></td>
                
                <td><?php echo $row['feedback_title'];?></td>
                
                <td><?php echo $row['feedback_content'];?></td>
     

            </tr>
            
        </tbody>
    
</form>
            <?php
                }
?>
        
        
        
        
        
        
        
<!-- /#page-wrapper -->

<?php include 'body_lower.php' ?>