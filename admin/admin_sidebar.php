<?php
include '../connect.php';
$total =0;
$query = "SELECT COUNT(*) AS total FROM restaurant WHERE status='PENDING'";
$result =mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_array($result)){
    $total = $row["total"];
}
?>
<style type="text/css">
.badge {
    position: absolute;
    margin-left: 20px;
    border-radius: 50%;
    background: #e71a1a;
    color: white;
}
</style>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="admin_home.php"><i class="fa fa-dashboard fa-fw"></i> Admin</a>
            </li>
            <li>
                <a href="user.php"><i class="fa fa-users fa-fw"></i> User</a>
            </li>
            <li>
                <a href="res_appr.php"><i class="fa fa-check fa-fw"></i> Restaurant Approval <span class="badge"><?php echo $total ?></span></a>
            </li>
            <li>
                <a href="feedback.php"><i class="fa fa-comments"></i> Feedback</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->