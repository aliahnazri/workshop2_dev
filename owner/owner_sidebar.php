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

            <div>
                <br />
                <img class="img-profile img-circle img-responsive center-block" src="../user_images/<?php echo $_SESSION['user_img']; ?>" alt="" height="50%" width="50%">
                <br />
                <ul class="list-unstyled text-center">
                    <li style="border-bottom: 0;"><label class="label label-info"><?php echo $_SESSION["user_level"]; ?></label></li>
                    <li style="border-bottom: 0;"><?php echo $_SESSION["user_name"]; ?></li>
                    <!--                    <li style="border-bottom: 0;"><a href="#">Rebecca.S@website.com</a></li>-->
                    <li style="border-bottom: 0;">Last logged in: <br /> <?php echo $_SESSION["last_login"]; ?></li>
                </ul>
            </div>
            <br />

            <li></li>
            <li>
                <a href="restaurant.php"><i class="fa fa-home fa-fw"></i>Restaurant</a>
            </li>
            <li>
                <a href="reservation.php"><i class="fa fa-calendar fa-fw"></i> Reservation</a>
            </li>
            <li>
                <a href="menu.php"><i class="fa fa-cutlery fa-fw"></i> Menu</a>
            </li>
            <li>
                <a href="rating.php"><i class="fa fa-star-o fa-fw"></i> Reviews and Rating</a>
            </li>

        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->