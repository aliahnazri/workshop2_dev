<?php include 'body_upper.php' ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User</h1>
        </div>
        
    <!-- /.col-lg-12 -->
    </div>
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a data-toggle="tab" href="#Customer">Customer Details</a></li>
            <li><a data-toggle="tab" href="#Manager">Manager Details</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="Customer">
                <hr>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>UserID</th>
                            <th>UserName</th>
                            <th>UserPassword</th>
                            <th>UserLevel</th>
                            <th>UserStatus</th>
                            <th>LastLogin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    include '../connect.php';
                    $query = "SELECT * FROM user WHERE user_level='CUSTOMER'";
                    $result =mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['user_id'];?></td>
                            <td><?php echo $row['user_name'];?></td>
                            <td><?php echo $row['user_password'];?></td>
                            <td><?php echo $row['user_level'];?></td>
                            <td><?php echo $row['user_status'];?></td>
                            <td><?php echo $row['last_login'];?></td>
                            <td style="text-align: center;">
                                <?php
                                if($row['user_status'] == "ACTIVE"){
                                    ?>
                                    <a href='edituser.php?id=<?php echo $row['user_id'] ?>' name="edit" class="btn btn-primary" alt="Edit User"><span class="glyphicon glyphicon-edit"> Edit</span></a>
                                    <?php
                                }
                                else if($row['user_status'] == "DEACTIVE"){
                                    ?>
                                    <a href='reactiveuser.php?id=<?php echo $row['user_id'] ?>' name="edit" class="btn btn-warning" alt="Edit User"><span class="glyphicon glyphicon-link"> Activate</span></a>
                                    <?php
                                }
                                ?>  
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane" id="Manager">
                <hr>
                <div class="col-xs-12 col-sm-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>UserName</th>
                                <th>UserPassword</th>
                                <th>UserLevel</th>
                                <th>UserStatus</th>
                                <th>LastLogin</th>
                                <th>UserImg</th>
                            </tr>
                        </thead>
                        <?php
                        include '../connect.php';
                        $query = "SELECT * FROM user WHERE user_level='MANAGER'";
                        $result =mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['user_id'];?></td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['user_password'];?></td>
                                <td><?php echo $row['user_level'];?></td>
                                <td><?php echo $row['user_status'];?></td>
                                <td><?php echo $row['last_login'];?></td>
                                <td><?php echo $row['user_img'];?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
<?php include 'body_lower.php' ?>