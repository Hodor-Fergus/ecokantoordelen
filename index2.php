<?php
include_once("admin/controller/db.php");
session_start();
if (!isset($_SESSION['name'])) {
header("location:login.php");
exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Reset the AUTO_INCREMENT value of user_selections
    $reset_query = "ALTER TABLE user_selections AUTO_INCREMENT = 1";
    mysqli_query($con, $reset_query);

    $company = $_POST['company'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user_id = $_SESSION['user_id']; // Assuming `user_id` is stored in the session

    // Insert the data into the user_selections table
    $query = "INSERT INTO user_selections (company, start_date, end_date, user_id) VALUES ('$company', '$start_date', '$end_date', '$user_id')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // $message = "Location updated successfully!";
        $_SESSION['message'] = "Location updated successfully!";
    } else {
        // $message = "Error: " . mysqli_error($con);
        $_SESSION['message'] = "Error: " . mysqli_error($con);
    }

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); // Ensure no further code is executed
}

// Check if there's a message to display
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    // Clear the message after displaying
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="favicon.png" />
        <!-- Title Page-->
        <title>User Panel</title>
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
        <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">
        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">
    </head>
    <body class="animsition">
        <div class="page-wrapper">
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar2">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-22.png" alt="Cool Admin" />
                        <h3 class="text-white">User Panel</h3>
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar1">
                    <div class="account2">
                        <h4 class="name"><?= $_SESSION['name']; ?></h4>
                        <a href="controller/logout.php">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <li class="active">
                                    <a href="index2.php">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                                </li>
                            </li>
                            <li class="has-sub">
                                <li>
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
            <!-- END MENU SIDEBAR-->
            <!-- PAGE CONTAINER-->
            <div class="page-container2">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop2">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap2">
                                <div class="logo d-block d-lg-none">
                                    <a href="#">
                                        <img src="images/icon/logo-22.png" alt="CoolAdmin" />
                                    </a>
                                </div>
                                <div class="header-button2">
                                    <button type="button" class="btn mb-1  border-white" data-toggle="modal" data-target="#account"><i class="zmdi zmdi-account text-white"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                    <div class="logo">
                        <a href="#">
                            <img src="images/icon/logo-22.png" alt="Cool Admin" />
                        </a>
                    </div>
                    <div class="menu-sidebar2__content js-scrollbar2">
                        <div class="account2">
                            <div class="image img-cir img-120">
                                <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                            </div>
                            <h4 class="name"><?= $_SESSION['name']; ?></h4>
                            <a href="#">Sign out</a>
                        </div>
                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard
                                        <span class="arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="has-sub">
                                    <li>
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
                <!-- END HEADER DESKTOP-->
                <!-- BREADCRUMB-->
                <section class="au-breadcrumb m-t-75">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="au-breadcrumb-content">
                                        <div class="au-breadcrumb-left">
                                            <span class="au-breadcrumb-span">You are here:</span>
                                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                                <li class="list-inline-item active">
                                                    <a href="#">Home</a>
                                                </li>
                                                <li class="list-inline-item seprate">
                                                    <span>/</span>
                                                </li>
                                                <li class="list-inline-item">Dashboard</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END BREADCRUMB-->
                <!-- STATISTIC-->
                <section class="statistic">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                $sel="SELECT temployee FROM cregister";
                                $qur=mysqli_query($con,$sel);
                                $details=mysqli_fetch_assoc($qur);
                                ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number"><?= $details['temployee'];?></h2>
                                        <span class="desc">Members</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $sel="SELECT count(id) as tid FROM cregister";
                                $qur=mysqli_query($con,$sel);
                                $info=mysqli_fetch_assoc($qur);
                                ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number"><?= $info['tid'];?></h2>
                                        <span class="desc">Company</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $sel="SELECT sum(tspace) as totalspace FROM officespace";
                                $qur=mysqli_query($con,$sel);
                                $totals=mysqli_fetch_assoc($qur);
                                ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number"><?= $totals['totalspace'];?></h2>
                                        <span class="desc">Total Spaces</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-calendar-note"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $sel="SELECT sum(tspace) as totalspace, aspace FROM officespace,cregister";
                                $qur=mysqli_query($con,$sel);
                                $asp=mysqli_fetch_assoc($qur);
                                ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <h2 class="number"><?= $asp['totalspace']-$asp['aspace'];?></h2>
                                        <span class="desc">Available Spaces</span>
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END STATISTIC-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive table--no-card m-b-10">
                                        <table class="table table-borde  C  cx
                                            09iu8ytrless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>date</th>
                                                    <th>Company</th>
                                                    <th>CompanyID</th>
                                                    <th>Street</th>
                                                    <th>Country</th>
                                                    <th>Employee</th>
                                                    <th>A-Employee</th>
                                                    <th>Alloted Space</th>
                                                    <th>Expire Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $s="select * from cregister";
                                                $q=mysqli_query($con,$s);
                                                while($show=mysqli_fetch_array($q)){
                                                ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?= $show['date'];?></th>
                                                    <th scope="row"><?= $show['cname'];?></th>
                                                    <th scope="row"><?= $show['cid'];?></th>
                                                    <th scope="row"><?= $show['street'];?></th>
                                                    <th scope="row"><?= $show['country'];?></th>
                                                    <th scope="row"><?= $show['temployee'];?></th>
                                                    <th scope="row"><?= $show['aemployee'];?></th>
                                                    <th scope="row"><?= $show['aspace'];?></th>
                                                    <th scope="row"><?= $show['expdate'];?></th>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                              <!-- Display success or error message -->
                        <?php if (isset($message)): ?>
                            <div class="alert alert-info">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Form to Select Company and Date Range -->
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <h5>Request Office Location</h5>
                                        <div class="form-group">
                                            <label for="company">Select Company:</label>
                                            <select name="company" id="company" class="form-control" required>
                                                <?php
                                                $query = "SELECT cname FROM cregister";
                                                $result = mysqli_query($con, $query);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['cname'] . '">' . $row['cname'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">End Date:</label>
                                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <br><br><br><br>

                        <!-- Display Admin Responses -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- <h5>Admin Responses</h5> -->
                                    <br>
                                    <div class="table-responsive table--no-card m-b-10">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Approved Addresses</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center;">
                                                <?php
                                                $response_query = "SELECT company, office_address, num_people, start_date, end_date FROM admin_responses";
                                                $response_result = mysqli_query($con, $response_query);

                                                while ($row = mysqli_fetch_assoc($response_result)) {
                                                    echo '<tr>';
                                                    echo '<td>';
                                                    // echo $row['company'] . ', your office address is ' . $row['office_address'] . ' for ' . $row['num_people'] . ' employees from ' . $row['start_date'] . ' till ' . $row['end_date'] .'.';
                                                    echo '<strong>' . $row['company'] . '</strong>, your office address is <strong>' . $row['office_address'] . '</strong> for <strong>' . $row['num_people'] . '</strong> employees from <strong>' . $row['start_date'] . '</strong> till <strong>' . $row['end_date'] . '</strong>.';
                                                    echo '</td>';
                                                    echo '</tr>';
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
                                    $na=$_SESSION['name'];
                                    $show="SELECT * from register WHERE username='$na'";
                                    $query=mysqli_query($con,$show);
                                    $array=mysqli_fetch_array($query);

                                        // Check if the array keys exist and set them to a default value if they don't
                                    $username = isset($array['username']) ? $array['username'] : '';
                                    $email = isset($array['email']) ? $array['email'] : '';
                                    $password = isset($array['password']) ? $array['password'] : '';


                                    if(isset($_POST['updateaccount'])){
                                        $n=$_SESSION['name'];
                                        $name=$_POST['username'];
                                        $email=$_POST['email'];
                                        $password=$_POST['password'];
                                        $addins="UPDATE register SET username='$name',email='$email',password='$password' where username='$n'";
                                        $q=mysqli_query($con,$addins);
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="au-input au-input--full" type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars(''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars(''); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="text" name="password" placeholder="Password" value="<?php echo htmlspecialchars(''); ?>">
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
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2023. All rights reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- END PAGE CONTAINER-->
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
            <script src="vendor/vector-map/jquery.vmap.js"></script>
            <script src="vendor/vector-map/jquery.vmap.min.js"></script>
            <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
            <script src="vendor/vector-map/jquery.vmap.world.js"></script>
            <!-- Main JS-->
            <script src="js/main.js"></script>
        </body>
    </html>
    <!-- end document-->