<?php
session_start();
include('../connect.php');
$userid = $_SESSION['user_id'];
//restid = $_GET['rest_id'];

$sql = "SELECT * FROM restaurant WHERE user_id = '$userid'";
$result = mysqli_query($conn,$sql) or die(mysql_error());
$row = mysqli_fetch_array($result);
    
?>

<title>View Restaurant</title>

<?php include 'body_upper.php' ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Restaurant</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    
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
                                <h3 class="panel-title pull-left">Restaurant Picture</h3>
                            </div>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="registrationForm">


                                <div class="file-tab panel-body">
                                    <center>
                                        <p><img src="../user_images/<?php echo $row['user_img']; ?>" height="150" width="150" class="avatar" /></p>
                                        <input type="file" name="user_image" class="file-upload" accept="image/*">
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


                    <div class="col-lg-9">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">Restaurant info</h4>
                            </div>
                            <div class="file-tab panel-body">

                                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="registrationForm">


                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Name</label>
                                        <div class="col-xs-11">
                                            <input name="name" readonly type="varchar" class="form-control" value="<?php echo $row['rest_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">SSM No</label>
                                        <div class="col-xs-11">
                                            <input name="ssmNo" readonly type="varchar" class="form-control" value="<?php echo $row['SSM']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Address</label>
                                        <div class="col-xs-11">
                                            <input name="restAddress" readonly type="text" class="form-control" value="<?php echo $row['rest_address']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Phone No</label>
                                        <div class="col-xs-11">
                                            <input name="restPhoneNo" readonly type="varchar" class="form-control" value="<?php echo $row['rest_phone_no']; ?>">
                                        </div>
                                    </div>

                                   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
