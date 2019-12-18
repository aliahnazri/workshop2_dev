<?php include 'body_upper.php' ?>

<?php 
        
include('../connect.php');
$userid = $_SESSION['user_id'];
$restid = $_GET['restaurantID'];

$query = "SELECT * FROM restaurant WHERE rest_id = '$restid'";                    
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

if(isset($_POST['updatePicture']))
{   
    $imgFile = $_FILES['restaurant_image']['name'];
    $tmp_dir = $_FILES['restaurant_image']['tmp_name'];
    $imgSize = $_FILES['restaurant_image']['size'];

    if(empty($imgFile)){
        $errMSG = "Please Select Image File.";
    }
    
    else
    {
        $upload_dir = '../restaurant_images/'; // upload directory
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
        // rename uploading image
        $restpic = rand(1000,1000000).".".$imgExt;
				
        // allow valid image file formats
        if(in_array($imgExt, $valid_extensions)){			
            
            // Check file size '5MB'
            if($imgSize < 5000000){
                unlink($upload_dir.$row['rest_img']);
                move_uploaded_file($tmp_dir,$upload_dir.$restpic);
            }
            else{
                $errMSG = "Sorry, your file is too large."; }
        }
        else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; }
    }
    
    
    if(!isset($errMSG))
    {
        $query = "UPDATE `restaurant` SET rest_img = '$restpic' WHERE rest_id ='$restid' AND user_id = '$userid'";
        $result = mysqli_query($con, $query) or $error = die(mysqli_error());
        
        if(!isset($error))
        {
            $successMSG = "Restaurant picture has been updated.";
        }
        else
        {
            $errMSG = "Error updating restaurant picture.";
        }
    }    
}

if(isset($_POST['updateDetail']))
{   
    $username = $_POST['userName'];
   
    $sql = "UPDATE `user` SET user_name = '$username' WHERE user_id = '$userid';";   
    $query = mysqli_query($con, $sql) or $error = mysqli_error($con);    
    
    if(!isset($error)){
        $successMSG = "Your details has been updated.";
//        header("Refresh:2");
        } 
    else { $errMSG = "Error updating data."; }  
}


?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!--/col-3-->
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab" href="#detail">Restaurant Profile Picture</a></li>
<!--                <li><a data-toggle="tab" href="#password">Password</a></li>-->
            </ul>

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


                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">Profile Picture</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="registrationForm">


                                <div class="file-tab panel-body">
                                    <center>
                                        <p><img src="../user_images/<?php echo $row['user_img']; ?>" height="150" width="150" class="avatar" /></p>
                                        <input type="file" name="restaurant_image" class="file-upload" accept="image/*">
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
                

                    <hr>

                </div>
                <!--/tab-pane-->
          
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