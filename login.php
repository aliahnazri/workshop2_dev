<?php

require('connect.php');
session_start();
    
// If form submitted, insert values into the database.
if (isset($_POST['userid'])){
    
    // removes backslashes
    $userid = stripslashes($_REQUEST['userid']);
    
    //escapes special characters in a string
    $userid = mysqli_real_escape_string($con,$userid);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    
    $query_1 = "SELECT * FROM `user` WHERE user_id = '$userid'";
    $result_1 = mysqli_query($con,$query_1) or die(mysqli_error());
    $rows_1 = mysqli_num_rows($result_1);
    
    if($rows_1==1){
        
        //Checking is user existing in the database or not
        $query_2 = "SELECT * FROM `user` WHERE user_id = '$userid' AND user_password='".md5($password)."' AND user_status = 'ACTIVE'";
        $result_2 = mysqli_query($con,$query_2) or die(mysqli_error());
        $rows_2 = mysqli_num_rows($result_2);
        
        $result_2 = mysqli_fetch_array($result_2);
        
        $userid = $result_2['user_id'];
        $username = $result_2['user_name'];
        $password = $result_2['user_password'];
        $userlevel = $result_2['user_level'];
        $userstatus = $result_2['user_status'];
        $lastlogin = $result_2['last_login'];
        $img = $result_2['user_img'];
        
        //Set up session
        $_SESSION['user_id'] = $userid;
        $_SESSION['user_name']= $username;
        $_SESSION['user_password']= $password;
        $_SESSION['user_level']= $userlevel;
        $_SESSION['user_status']= $userstatus;
        $_SESSION['last_login']= $lastlogin;
        $_SESSION['user_img']= $img;
                 
        if($userlevel == 'ADMIN'){
            $_SESSION['isAdmin'] = true;
            header("Location: admin/");
        }

        elseif($userlevel == 'MANAGER'){
            $_SESSION['isManager'] = true;                    
            header("Location: manager/");
        }
        elseif($userlevel == 'CUSTOMER'){
            $_SESSION['isCustomer'] = true;                    
            header("Location: customer/");
        }
        else{
            $PasswordMessage = "Password is incorrect.";
//            echo "<script type='text/javascript'>alert('$message');</script>";
//            header("refresh:1;");
        }
    }

    else
    {
        $UsernameMessage = "Email is not registered.";
//        echo "<script type='text/javascript'>alert('$message');</script>";
//        header("refresh:1;");
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Restaurant Table Reservation</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">

                            <?php if(isset($PasswordMessage)){ ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $PasswordMessage; ?></strong><br />
                            </div>
                            <?php } 
            
                            elseif(isset($UsernameMessage)){ ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $UsernameMessage; ?></strong><br />
                            </div>
                            <?php } ?>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="userid" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <label class="label"><a href="#">Forgot Password?</a></label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="btn-toolbar">
                                    <button type="submit" class="btn btn-md btn-success pull-right">Sign In</button>
                                    <a href="index.html" class="btn btn-md btn-primary pull-left">Sign Up</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
