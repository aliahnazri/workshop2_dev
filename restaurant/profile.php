<title>New Restaurant</title>

<?php 
    session_start();   
    include('../connect.php');
    include 'body_upper.php';

    $userid = $_SESSION['user_id'];
    
    
$query = "SELECT * FROM `user` WHERE user_id = '$userid'";
$result = mysqli_query($conn,$query) or die(mysql_error());
$row = mysqli_fetch_assoc($result);


    if(isset($_POST['updatePicture']))
{   
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];
    if(empty($imgFile)){
        $errMSG = "Please Select Image File.";
    }
    
    else
    {
        $upload_dir = '../user_images/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
        // rename uploading image
        $userpic = rand(1000,1000000).".".$imgExt;
				
        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions)){			
            
            // Check file size '5MB'
            if($imgSize < 5000000){
                unlink($upload_dir.$row['user_img']);
                move_uploaded_file($tmp_dir,$upload_dir.$userpic);
            }
            else{
                $errMSG = "Sorry, your file is too large."; }
        }
        else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; }
    }
    
    
    if(!isset($errMSG))
    {
        $query = "UPDATE `user` SET user_img = '$userpic' WHERE user_id = '$userid'";
        $result = mysqli_query($conn, $query) or $error = die(mysqli_error());
        
        if(!isset($error))
        {
            $successMSG = "Profile image has been uploaded.";
        }
        else
        {
            $errMSG = "Error uploading profile image.";
        }
    }    
}
if(isset($_POST['updateDetail']))
{   
    $username = $_POST['user_name'];
    //$getresname = isset($_GET['rest_name']) ? $_GET['rest_name'] : '';
   
    $sql = "UPDATE `user` SET user_name = '$username' WHERE user_id = '$userid';";   
    $query = mysqli_query($conn, $sql) or $error = mysqli_error($conn);    
    
    if(!isset($error)){
        $successMSG = "User's profile has been updated.";
//        header("Refresh:2");
        } 
    else { $errMSG = "Error updating data."; }  
}
if(isset($_POST['updatePassword']))
{
    if(md5($_POST["currentPassword"]) == $row["user_password"])
    {
        $sql = "UPDATE `user` SET user_password = '" . md5($_POST["newPassword"]) . "' WHERE user_id = '$userid'";
        mysqli_query($conn, $sql);
        $smessage = "Password Changed";
    }
    else $emessage = "Current Password is not correct";
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User's Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!--/col-3-->
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab">
<!--                <li class="active"><a data-toggle="tab" href="#detail">Restaurant Details</a></li>-->
                

            <div class="tab-content">
                <div class="tab-pane active" id="detail">
                    <hr>


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


                    <div class="centre">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">Profile Picture</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="registrationForm">


                                <div class="file-tab panel-body">
                                    <center>
                                        <p><img src="../user_images/<?php echo $row['rest_img']; ?>" height="150" width="150" class="avatar" /></p>
                                        <input type="file" name="rest_image" class="file-upload" accept="image/*">
                                    </center>

                                    <br />

                                    <div class="form-group">
                                        <div class="col-xs-12 btn-toolbar" style="justify-content: center; display: flex;">
                                            <button name="updatePicture" class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">User's info</h4>
                            </div>
                            <div class="file-tab panel-body">

                                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="registrationForm">

                                
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">User Id</label>
                                        <div class="col-xs-11">
                                            <input name="name" type="varchar" class="form-control" value="<?php echo $row['user_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Name</label>
                                        <div class="col-xs-11">
                                            <input name="name" type="varchar" class="form-control" value="<?php echo $row['user_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Password</label>
                                        <div class="col-xs-11">
                                            <input name="ssmNo" type="varchar" class="form-control" value="<?php echo $row['user_password']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Level</label>
                                        <div class="col-xs-11">
                                            <input name="restAddress" type="varchar" class="form-control" value="<?php echo $row['user_level']; ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-xs-1 control-label">Status</label>
                                        <div class="col-xs-11">
                                            <input name="restEmail" type="varchar" class="form-control" value="<?php echo $row['user_status']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 btn-toolbar" style="justify-content: center; display: flex;">
                                            <button name="updateDetail" class="btn btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                            <button onClick="document.location.reload(true)" class="btn btn-primary" type="button"><i class="glyphicon glyphicon-refresh"></i> Refresh</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
<!--
                /tab-pane
                <div class="tab-pane" id="password">

                    <hr>

                    <div class="col-xs-12 col-sm-12">
                        <form name="frmChange" class="form-horizontal" method="post" action="" onSubmit="return validatePassword()">

                            <?php
                            if(isset($emessage)){
                            ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $emessage; ?></strong><br />
                            </div>
                            <?php
                            }
                            else if(isset($smessage)){
                            ?>
                            <div class="alert alert-success">
                                <strong><?php echo $smessage; ?></strong><br />
                            </div>
                            <?php
                            }
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Password</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Current password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="currentPassword" class="form-control" id="currentPassword" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">New password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Confirm password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button name="updatePassword" type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
-->
                </div>
                <!--/tab-pane-->
            </div>

        </div> <!-- row -->


    </div>


    <!-- /#page-wrapper -->

    <?php include 'body_lower.php' ?>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>

    <script>
        function validatePassword() {
            var currentPassword, newPassword, confirmPassword, output = true;
            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;
            if (!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "required";
                output = false;
            } else if (!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "required";
                output = false;
            } else if (!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "required";
                output = false;
            }
            if (newPassword.value != confirmPassword.value) {
                newPassword.value = "";
                confirmPassword.value = "";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "not same";
                output = false;
            }
            return output;
        }
    </script>