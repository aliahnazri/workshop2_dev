<?php 
session_start();
include 'body_upper.php' ?>
<?php
    
   include('../connect.php');

    if(isset($_POST['submit']))
    {
        //define variable
        $user_id =$_POST['user_id'];
        $user_name='".mysqli_real_escape_string($user_name)."';
        $user_password=$_POST['user_password'];
        $user_level='".mysqli_real_escape_string($user_level)."'; 
        
       
        $query = "INSERT INTO user (user_id,user_name,user_password,user_level, user_status) VALUES('".$_POST["user_id"]."','".$_POST["user_name"]."','".md5($_POST["user_password"])."','".$_POST["user_level"]."', 'ACTIVE')";
        $result = mysqli_query($con,$query); 
        
        if(($result) == TRUE)
            echo "<script type='text/javascript'>alert('successfully saved!')</script>";
        else
            echo "<script type='text/javascript'>alert('failed!')</script>";
        
        
    }
    
    
?>

<!-- Add New User in Admin-->


<div id="page-wrapper">
    <div class="col-lg-12">
        <h1 class="page-header">Add New User</h1>
    <div class="modal-body">
        
    <div class="container-fluid">
    <form method="POST" >
        <div class="row">
            <div class="col-lg-2">
                <label class="control-label" style="position:relative; top:7px;">UserID:</label>
            </div>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="user_id" required>
            </div>
            </div>
            
        
    <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label class="control-label" style="position:relative; top:7px;">User Name:</label>
            </div>
            <div class="col-lg-10">
				<input type="text" class="form-control" name="user_name" required>
            </div>
        </div>
        
        
    <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
                <label class="control-label" style="position:relative; top:7px;">User Password:</label>
            </div>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="user_password" required>
            </div>
        </div>
        
        
    <div style="height:10px;"></div>
        <div class="row">
            <div class="col-lg-2">
				<label class="control-label" style="position:relative; top:7px;">User Level:</label>
            </div>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="user_level">
            </div>
        </div>
                    
        
    <div class="modal-footer">
        <a href='admin_home.php'><button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></a>
        <button  name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
    </div>
    </form>

    </div>
</div> 


<!--/#page-wrapper-->

<?php include 'body_lower.php'?>
        
   