<?php
include_once("controller/db.php");
session_start();
if (!isset($_SESSION['name'])) {
header("location: login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="../favicon.png" />
        <!-- Title Page-->
        <title>Admin Panel | Registration</title>
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.php">
                                <img src="images/icon/logo-22.png" alt="CoolAdmin" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="has-sub">
                                <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="registration.php"><i class="far fa-check-square"></i>Registration</a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="menu-sidebar2">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-22.png" alt="Cool Admin" />
                        <h3 class="text-white">Admin Panel</h3>
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar1">
                    <div class="account2">
                        <h4 class="name"><?= $_SESSION['name']; ?></h4>
                        <a href="controller/logout.php">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="has-sub">
                                    <a href="index.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="active has-sub">
                                <li class = "active">
                                    <a href="registration.php">
                                    <i class="far fa-check-square"></i>Registration</a>
                                </li>
                                <li>
                                    <a href="calendar.php">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER MOBILE-->
            <!-- MENU SIDEBAR-->
            <!-- <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-22.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="has-sub">
                                <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <li class="active">
                                    <a href="register.html">
                                    <i class="far fa-check-square"></i>Registration</a>
                                </li>
                                <li>
                                    <a href="calendar.php">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside> -->
                <!-- END MENU SIDEBAR-->
                <!-- PAGE CONTAINER-->
                <div class="page-container">
                    <!-- HEADER DESKTOP-->
                    <header class="header-desktop">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="header-wrap">
                                    <form class="form-header" action="" method="POST">
                                        <input class="au-input au-input--xl" type="hidden" name="search" placeholder="Search for datas &amp; reports..." />
                                        <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                        </button>
                                    </form>
                                    <div class="header-button">
                                        <div class="account-wrap">
                                            <div class="account-item clearfix js-item-menu">
                                                
                                                <div class="content">
                                                    <a class="js-acc-btn" href="#"><?= $_SESSION['name']; ?> </a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="content">
                                                            <h5 class="name">
                                                            <a href="#"><?= $_SESSION['name']; ?> </a>
                                                            </h5>
                                                            <span class="email"><?= $_SESSION['email']; ?> </span>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__body">
                                                        <div class="account-dropdown__footer">
                                                            <a href="controller/logout.php">
                                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- New User-->
                    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodalLabel">New User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/register.php" method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="login-checkbox">
                                            <label>
                                                <input type="checkbox" name="aggree">Agree the terms and policy
                                            </label>
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">register</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- office space -->
                    <div class="modal fade" id="officespace" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodalLabel">New User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="controller/officespace.php" method="post">
                                        <div class="form-group">
                                            <label for="Total Employee" class=" form-control-label">Office Space Name</label>
                                            <input type="text" name="officename" id="company" placeholder="Office Name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="AEmployee" class=" form-control-label">Total Space in Office</label>
                                            <input type="number" id="vat" name="tspace" placeholder="Total Space" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Office Address</label>
                                            <input type="text" id="street" name="address" placeholder="address" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm" name="officespace">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                            <h3 style="text-align: center; color: green;">ADD OFFICE SPACES</h3>

                                <br>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#smallmodal">
                                            New Admin User
                                            </button>
                                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#officespace">
                                            Add Space For Companies
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive table--no-card m-b-10">
                                            <table class="table table-borde  C  cx
                                                09iu8ytrless table-striped table-earning">
                                                <thead>
                                                    <tr>
                                                        <th>date</th>
                                                        <th>Office Name</th>
                                                        <th>Space</th>
                                                        <th>Address</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $s="select * from officespace";
                                                    $q=mysqli_query($con,$s);
                                                    while($show=mysqli_fetch_array($q)){
                                                    ?>
                                                    <tr>
                                                        <td><?= $show['date'];?></td>
                                                        <td><?= $show['officename'];?></td>
                                                        <td><?= $show['tspace'];?></td>
                                                        <td><?= $show['address'];?></td>
                                                        <td>
                                                            <div class="table-data-feature">
                                                                <!-- <a href="controller/delete.php?delanimal=<?php echo $show['id']; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></a> -->
                                                                <a href="controller/delete.php?delitem=<?php echo $show['id']; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        <div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodalLabel">Account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $show="SELECT * from admin";
                                    $query=mysqli_query($con,$show);
                                    $array=mysqli_fetch_array($query);
                                    if(isset($_POST['updateaccount'])){
                                    $name=$_POST['username'];
                                    $email=$_POST['email'];
                                    $password=$_POST['password'];
                                    $addins="UPDATE admin SET name='$name',email='$email',password='$password' ";
                                    $q=mysqli_query($con,$addins);
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="au-input au-input--full" type="text" name="username" placeholder="Username" value="<?php echo $array['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="<?php echo $array['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="text" name="password" placeholder="Password" value="<?php echo $array['password']; ?>">
                                        </div>
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="updateaccount">update account</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © 2023. All rights reserved.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js">
            </script>
            <!-- Main JS-->
            <script src="js/main.js"></script>
        </body>
    </html>
    <!-- end document-->