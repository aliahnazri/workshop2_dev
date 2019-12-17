<?php 
session_start();


include 'body_upper.php' 
?>


<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Admin</h1>
            
        </div>
        
        <div class="btn-toolbar">
            <a href="add_admin.php" ><button name="newAdmin" type="button" style="float:right" class="btn btn-primary">New Admin</button></a> 
        
        </div>
        

      
    <table class="table table-striped table-bordered table-hover">
        <thead>

            <tr>

                <th>UserID</th>

                <th>UserName</th>
                
                <th>UserLevel</th>
                
                <th>Action</th>

            </tr>

        </thead>
        <form method = "POST" action="delete.php">
        <tbody>
            <?php
                include '../connect.php';
                $query = "SELECT user_id, user_name, user_level FROM user WHERE user_level='ADMIN'";
                $result =mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    
                ?>
            <tr>
             

                <td><?php echo $row['user_id'];?></td>

                <td><?php echo $row['user_name'];?></td>
                
                <td><?php echo $row['user_level'];?></td>
                
                <td>
                
                    
                            <!--Delete Button-->
                            <a href='delete.php?user_id=<?php echo $row['user_id']?>' name="delete" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                    
                    

            </tr>
            
        </tbody>
    
</form>
            <?php
                }
?>

<!-- /#page-wrapper -->

<?php include 'body_lower.php' ?>