<?php 

include 'body_upper.php' 
?>

<?php
$user_id = $_GET["user_id"];
//die($user_id);
// Process delete operation after confirmation
if(isset($_POST["user_id"]) && !empty($_POST["user_id"])){
    // Include config file
    require_once "../connect.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM user WHERE user_id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["user_id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: admin_home.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["user_id"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="delete_user.php" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="text" name="user_id" value="<?php echo $_GET["user_id"] ?>"/>
<!--                            <input type="text" name="user_id" value="asdadas" placeholder="asdasd"/>-->
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="admin_home.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

<!-- /#page-wrapper -->

<?php include 'body_lower.php' ?>