<?php include 'body_upper.php' ?>


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
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#detail">User Details</a></li>
                <li><a data-toggle="tab" href="#password">Password</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="detail">
                    <hr>

                    <form class="form-horizontal" action="#" method="post" id="registrationForm">

                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Profile Picture</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-xs-12">

                                            <center>
                                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" width="68.5%" height="68.5%">
                                                <br />
                                                <br />
                                                <input type="file" class="file-upload">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">User info</h4>
                                </div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Email</label>
                                        <div class="col-xs-11">
                                            <input type="text" class="form-control" value="<?php echo $row['user_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Name</label>
                                        <div class="col-xs-11">
                                            <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Level</label>
                                        <div class="col-xs-11">
                                            <input type="text" class="form-control" value="<?php echo $row['manager_position']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-1 control-label">Status</label>
                                        <div class="col-xs-11">
                                            <input type="text" class="form-control" value="<?php echo $row['manager_position']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 btn-toolbar">
                                <button class="btn btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn pull-right" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                        </div>

                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="password">

                    <hr>

                    <div class="col-xs-12 col-sm-12">
                        <form name="frmChange" class="form-horizontal" method="post" action="" onSubmit="return validatePassword()">

                            <div class="message">
                                <?php if(isset($message)) { echo $message; } ?>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Security</h4>
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
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <!--/tab-pane-->


            </div>
            <!--/tab-pane-->
            <!--        </div>-->
            <!--/tab-content-->

        </div> <!-- row -->


    </div>


    <!-- /#page-wrapper -->

    <?php include 'body_lower.php' ?>

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