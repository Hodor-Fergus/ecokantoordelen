<?php
include_once("controller/db.php");
session_start();
if (!isset($_SESSION['name'])) {
header("location:login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">
        <!-- Title Page-->
        <title>Admin Panel | Update</title>
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
                            <a class="logo" href="index.html">
                                <img src="images/icon/logo-mini.png" alt="CoolAdmin" />
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
            <!-- END HEADER MOBILE-->
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-mini.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="has-sub">
                                <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                <li class="active">
                                    <a href="registration.php">
                                    <i class="far fa-check-square"></i>Registration</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                    <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </aside>
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
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                            <i class="zmdi zmdi-account"></i>Account</a>
                                                        </div>
                                                        <div class="account-dropdown__item">
                                                            <a href="#">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                        </div>
                                                        <div class="account-dropdown__footer">
                                                            <a href="#">
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
                    <!-- HEADER DESKTOP-->
                    <?php
                    $idu=$_GET['update'];
                    $show="SELECT * from cregister WHERE id=$idu";
                    $query=mysqli_query($con,$show);
                    $array=mysqli_fetch_array($query);
                    if(isset($_POST['update'])){
                    $idc=$_GET['update'];
                    $cname=$_POST['companyname'];
                    $cid=$_POST['companyid'];
                    $street=$_POST['companystreet'];
                    $city=$_POST['companycity'];
                    $pcode=$_POST['companypostal'];
                    $country=$_POST['country'];
                    $temployee=$_POST['temployee'];
                    $aemployee=$_POST['aemployee'];
                    $technical=$_POST['technical'];
                    $nontechnical=$_POST['nontechnical'];
                    $aspace=$_POST['aspace'];
                    $expdate=$_POST['expdate'];
                    $addins="UPDATE cregister SET cname='$cname',cid='$cid',street='$street',city='$city',pcode='$pcode',country='$country',temployee='$temployee',aemployee='$aemployee',technical='$technical', nontechnical='$nontechnical', aspace='$aspace', expdate='$expdate' WHERE id=$idc";
                    $q=mysqli_query($con,$addins);
                    if($q==true){
                    header("Location: index.php?updated");
                    }
                    else{
                    header("Location:index.php?notupdated");
                    }
                    }
                    ?>
                    <!-- MAIN CONTENT-->
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>Update Company</strong>
                                                    <small> Form</small>
                                                </div>
                                                <div class="card-body card-block">
                                                    <div class="form-group">
                                                        <label for="company" class=" form-control-label">Company</label>
                                                        <input type="text" name="companyname" id="company" placeholder="Enter your company name" class="form-control" value="<?php echo $array['cname']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="vat" class=" form-control-label">Company ID</label>
                                                        <input type="text" id="vat" name="companyid" value="<?php echo $array['cid']; ?>" placeholder="DE1234567890" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="street" class=" form-control-label">Street</label>
                                                        <input type="text" id="street" name="companystreet" value="<?php echo $array['street']; ?>" placeholder="Enter street name" class="form-control" required>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <label for="city" class=" form-control-label">City</label>
                                                                <input type="text" id="city" name="companycity" value="<?php echo $array['city']; ?>" placeholder="Enter your city" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <label for="postal-code" class=" form-control-label">Postal Code</label>
                                                                <input type="text" id="postal-code" name="companypostal" value="<?php echo $array['pcode']; ?>" placeholder="Postal Code" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="country" class=" form-control-label">Country</label>
                                                        <input type="text" id="country" name="country" value="<?php echo $array['country']; ?>" placeholder="Country name" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>Update Information</strong>
                                                </div>
                                                <div class="card-body card-block">
                                                    <div class="form-group">
                                                        <label for="Total Employee" class=" form-control-label">Total Employee</label>
                                                        <input type="number" name="temployee" value="<?php echo $array['temployee']; ?>" id="company" placeholder="Toal Employee" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="AEmployee" class=" form-control-label">Available Employee</label>
                                                        <input type="number" id="vat" name="aemployee" value="<?php echo $array['aemployee']; ?>" placeholder="Available Employee" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="street" class=" form-control-label">Technical Person</label>
                                                        <input type="number" id="street" name="technical" value="<?php echo $array['technical']; ?>" placeholder="Technical Person" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="street" class=" form-control-label">Non Technical Person</label>
                                                        <input type="number" id="street" name="nontechnical" value="<?php echo $array['nontechnical']; ?>" placeholder="Non Technical Person" class="form-control" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="street" class=" form-control-label">Alloted Space</label>
                                                        <input type="number" id="street" name="aspace" value="<?php echo $array['aspace']; ?>" placeholder="50/100/200" class="form-control" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="street" class=" form-control-label">Expire Date</label>
                                                        <input type="date" id="street" name="expdate" value="<?php echo $array['expdate']; ?>" placeholder="Expire Date" class="form-control" required>
                                                    </div>
                                                    <div class="card-footer">
                                                        <input type="submit" name="update" class="btn btn-primary btn-sm" value="update">
                                                        
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
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