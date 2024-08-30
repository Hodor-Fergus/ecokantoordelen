<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="../favicon.png" />

        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap5" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
        />

        <link rel="stylesheet" href="../fonts/icomoon/style.css" />
        <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link rel="stylesheet" href="../css/tiny-slider.css" />
        <link rel="stylesheet" href="../css/aos.css" />
        <link rel="stylesheet" href="../css/style.css" />

        <!-- Title Page-->
        <title>Admin Login</title>
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
        <nav class="site-nav">
            <div class="container">
                <div class="menu-bg-wrap">
                    <div class="site-navigation">
                        <a href="index.html" class="logo m-0 float-start">ADMIN LOGIN</a>

                        <ul
                        class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
                        >
                            <li class="active"><a href="../index.html">Home</a></li>
                            <li><a href="../properties.html">Resources</a></li>
                            <li><a href="../services.html">Services</a></li>
                            <li><a href="../about.html">About</a></li>
                            <li><a href="../contact.html">Contact Us</a></li>
                            <li class="has-children">
                                <a href="#">Get Started</a>
                                <ul class="dropdown">
                                    <li><a href="../register.html">Sign Up</a></li>
                                    <li><a href="../login.php">Sign In</a></li>
                                </ul>
                            </li>
                            <li><a href="../admin/login.php">Admin</a></li>

                        </ul>

                        <a
                        href="#"
                        class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                        data-toggle="collapse"
                        data-target="#main-navbar"
                        >
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <br><br>
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <div class="login-content">
                            <div class="login-logo">
                                <a href="#">
                                    <img src="images/icon/logo-22.png" alt="CoolAdmin">
                                </a>
                            </div>
                            <div class="login-form">
                                <?php
                                include_once("../controller/db.php");
                                if(isset($_REQUEST['signin'])){
                                $email=$_POST['email'];
                                $pass=$_POST['password'];
                                $s="select * from admin where email='$email'";
                                $q= mysqli_query($con,$s);
                                $count=mysqli_num_rows($q);
                                if($count){
                                $pwd=mysqli_fetch_assoc($q);
                                $dbpass=$pwd['password'];
                                $_SESSION['name']=$pwd['name'];
                                $_SESSION['email']=$pwd['email'];
                                if($pass===$dbpass){
                                ?>
                                <script>
                                window.location.href = "index.php?";
                                </script>
                                <?php
                                }
                                else{
                                ?>
                                <script>
                                window.location.href = "login.php";
                                </script>
                                <?php
                                }
                                }
                                else{
                                $msz ='<div class="alert alert-warning alert-dismissible text-center mt-5">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Warning! Envalid Email</strong> ?
                                </div> ';
                                }
                                }
                                ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input class="au-input au-input--full" type="email" name="email" placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                    </div>
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="signin">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                                
      <!-- /.container -->
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