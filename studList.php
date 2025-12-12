<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Get club token from URL
$token = filter_input(INPUT_GET, "club_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!$token) {
    die("Invalid or missing club token.");
}

// Fetch club info using prepared statement
$stmt = $connection->prepare("SELECT * FROM club WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Invalid club token.");
}

$club = $result->fetch_assoc();
$club_id   = $club['club_id'];
$club_name = $club['club_name'];
$club_max  = $club['club_max'];
$club_stat = $club['club_stat'];
$club_obj  = $club['club_obj'];

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AsidApps - Student's Club List</title>
    <meta name="description" content="List of students registered in a club">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() { 
                sessionStorage.fonts = true; 
            }
        });
    </script>

    <!-- Styles -->
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-aside-left--enabled m-aside-left--skin-dark">

<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- Header -->
    <?php include("menuheader.php"); ?>

    <!-- Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- Left Aside -->
        <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
        <?php include("mainmenu.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content">

                <!-- Club Info -->
                <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text"><?php echo htmlspecialchars($club_name); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-section">
                            <span class="m-section__sub">
                                <b>Advisor(s):</b><br>
                                <?php senaraiPenasihat($club_id); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Registered Students Table -->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="flaticon-calendar-2"></i>
                                </span>
                                <h3 class="m-portlet__head-text">List of Registered Students</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student No</th>
                                    <th>Name</th>
                                    <th>Program</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Total Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stmt = $connection->prepare("
                                SELECT s.stdNo, s.stdName, s.progCode, s.noPhone, s.email
                                FROM student s
                                JOIN club_registration cr ON s.stdNo = cr.stdNo
                                WHERE cr.club_id = ?
                            ");
                            $stmt->bind_param("i", $club_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                $stdNo   = htmlspecialchars($row['stdNo']);
                                $stdName = htmlspecialchars($row['stdName']);
                                $progCode = htmlspecialchars($row['progCode']);
                                $noPhone = htmlspecialchars($row['noPhone']);
                                $email   = htmlspecialchars($row['email']);
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $counter; ?></th>
                                    <td><?php echo $stdNo; ?></td>
                                    <td><?php echo $stdName; ?></td>
                                    <td><?php echo $progCode; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $noPhone; ?></td>
                                    <td><?php echo sumMarks($stdNo); ?></td>
                                </tr>
                            <?php
                                $counter++;
                            }
                            $stmt->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("footer.php"); ?>
</div>

<!-- Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- Scripts -->
<script src="assets/vendors/base/vendors.bundle.js"></script>
<script src="assets/demo/default/base/scripts.bundle.js"></script>
<script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>
<script>
$(document).ready(function () {
    $('#m_table_1').DataTable();
});
</script>

</body>
</html>
