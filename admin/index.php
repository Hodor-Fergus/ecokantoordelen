<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once("controller/db.php");
session_start();
if (!isset($_SESSION['name'])) {
header("location:login.php");
exit();
}

// Handle admin form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_selection_id'])) {
    $user_selection_id = $_POST['user_selection_id'];
    $company = $_POST['company'];
    $office_address = $_POST['office_address'];
    $start_date = $_POST['start_date'];
    $end_date =  $_POST['end_date'];
    $num_people = $_POST['num_people'];

    
    // Insert the data into the admin_responses table
    // $query = "INSERT INTO admin_responses (user_selection_id, office_address, duration, num_people) VALUES ('$user_selection_id', '$office_address', '$duration', '$num_people')";
    $query = "INSERT INTO admin_responses (user_selection_id, company, office_address, start_date, end_date, num_people) VALUES ('$user_selection_id','$company', '$office_address', '$start_date', '$end_date', '$num_people')";
    $result = mysqli_query($con, $query);

    if ($result) {

        // Temporarily disable foreign key checks
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");
        // $message = "Response recorded successfully!";
        // Delete the data from user_selections table

        $delete_query = "DELETE FROM user_selections WHERE id = '$user_selection_id'";
        $delete_result = mysqli_query($con, $delete_query);

        // Re-enable foreign key checks
        mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1");

        if ($delete_result) {
            $message = "Response recorded and request removed successfully!";
        } else {
            $message = "Response recorded, but failed to remove request: " . mysqli_error($con);
        }
        header("Location: index.php");
        exit();
    } else {
        $message = "Error: " . mysqli_error($con);
    }
}

// // Handle delete request
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_selection_id'])) {
//     $delete_user_selection_id = $_POST['delete_user_selection_id'];

//     // Delete the request from user_selections table
//     $delete_query = "DELETE FROM user_selections WHERE id = '$delete_user_selection_id'";
//     $delete_result = mysqli_query($con, $delete_query);

//     if ($delete_result) {
//         $message = "Request removed successfully!";
//     } else {
//         $message = "Failed to remove request: " . mysqli_error($con);
//     }

//     // Redirect to avoid form resubmission issues
//     header("Location: index.php");
//     exit();
// }

// Handle row deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Temporarily disable foreign key checks
    mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0");

    $delete_query = "DELETE FROM user_selections WHERE id = '$delete_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        $message = "Request deleted successfully!";
        header("Location: index.php");
        exit();
    } else {
        $message = "Failed to delete request: " . mysqli_error($con);
    }
}

// Fetch user requests
$user_requests_query = "SELECT * FROM user_selections";
$user_requests_result = mysqli_query($con, $user_requests_query);


if (!$user_requests_result) {

    die("Error fetching user requests: " . mysqli_error($con));

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
        <title>Admin Panel</title>
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
                            <li class="active has-sub">
                                <li class="active">
                                    <a href="index.php">
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
                                        <img src="images/icon/logo-white.png" alt="CoolAdmin" />
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
                            <img src="images/icon/logo-white.png" alt="Cool Admin" />
                        </a>
                    </div>
                    <div class="menu-sidebar2__content js-scrollbar2">
                        <div class="account2">
                            <div class="image img-cir img-120">
                                <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                            </div>
                            <h4 class="name">Welcome <?= $_SESSION['name']; ?></h4>
                            <a href="#">Sign out</a>
                        </div>
                        <nav class="navbar-sidebar2">
                            <ul class="list-unstyled navbar__list">
                                <li class="active has-sub">
                                    <a class="js-arrow" href="index.php">
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
                <!--   <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#account">
                New Admin User
                </button> -->
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
                                                    <th>Country</th>
                                                    <th>Employee</th>
                                                    <th>A-Employee</th>
                                                    <th>Alloted Space</th>
                                                    <th>Action</th>
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
                                                    <th scope="row"><?= $show['country'];?></th>
                                                    <th scope="row"><?= $show['temployee'];?></th>
                                                    <th scope="row"><?= $show['aemployee'];?></th>
                                                    <th scope="row"><?= $show['aspace'];?></th>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a href="update.php?update=<?php echo $show['id']; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                                            <a href="controller/delete.php?comdel=<?php echo $show['id']; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    <!-- Display success or error message -->
                                    <?php if (isset($message)): ?>
                                                        <div class="alert alert-info">
                                                            <?php echo $message; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <!-- Client Request Table -->
                                                    <h5>Client Requests</h5>
                                                    <br>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Request Number</th>
                                                                <!-- <th>Delete</th> -->
                                                                <th>Company</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Requested On</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($row = mysqli_fetch_assoc($user_requests_result)): ?>
                                                                <tr>
                                                                    <td><?= $row['id']; ?></td>
                                                                    <td><?= $row['company']; ?></td>
                                                                    <td><?= $row['start_date']; ?></td>
                                                                    <td><?= $row['end_date']; ?></td>
                                                                    <td><?= $row['created_at']; ?></td>
                                                                    <td>
                                                                        <!-- Admin Response Form -->
                                                                        <form action="" method="post" style="display:inline;">
                                                                            <input type="hidden" name="user_selection_id" value="<?= $row['id']; ?>">

                                                                            <div class="form-group">
                                                                                <label for="company">Company:</label>
                                                                                <input type="text" name="company" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="office_address">Office Address:</label>
                                                                                <input type="text" name="office_address" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="start_date">Start Date:</label>
                                                                                <input type="date" name="start_date" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="end_date">End Date:</label>
                                                                                <input type="date" name="end_date" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="num_people">Number of People:</label>
                                                                                <input type="number" name="num_people" class="form-control" required>
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </form>

                                                                         <!-- Delete Request Button -->
                                                                        <form action="" method="post" style="display:inline;">
                                                                            <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Display Admin Responses -->
                     <br><br>
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
                    


 
                    <!-- update account -->
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