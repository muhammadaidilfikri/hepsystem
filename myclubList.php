<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Legends
// roleid 1 = SUPER ADMINISTRATOR
// roleid 2 = IT ADMINISTRATOR
// roleid 3 = HEP
// roleid 4 = HEA
$allowedroles = array(3,4); // roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | My Club List</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Web fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() { sessionStorage.fonts = true; }
        });
    </script>

    <!-- Base Styles -->
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <style>
        .ct-series-a .ct-slice-donut { stroke: #8E44AD; }
        .ct-series-b .ct-slice-donut { stroke: #26C281; }
        .ct-series-c .ct-slice-donut { stroke: #E43A45; }
        .ct-series-d .ct-slice-donut { stroke: #F3C200; }
    </style>

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- Header -->
    <?php include("menuheader.php"); ?>

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- Left Aside -->
        <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>

        <?php include("mainmenu.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content">

                <!-- Widgets/Stats -->
                <div class="m-portlet">
                    <div class="m-portlet__body m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">

                            <!-- Total Clubs -->
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">Club</h4><br>
                                        <span class="m-widget24__desc">Total Club</span>
                                        <span class="m-widget24__stats m--font-brand"><?php echo countClub(); ?></span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-brand" style="width: 100%;"></div>
                                        </div>
                                        <span class="m-widget24__change">Registered & Active Club</span>
                                        <span class="m-widget24__number">100%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Advisors -->
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">Advisor</h4><br>
                                        <span class="m-widget24__desc">Total Advisors</span>
                                        <span class="m-widget24__stats m--font-info"><?php echo countAdvisor(); ?></span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-info" style="width: 100%;"></div>
                                        </div>
                                        <span class="m-widget24__change">Registered Advisor(s)</span>
                                        <span class="m-widget24__number">100%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Students -->
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">Student</h4><br>
                                        <span class="m-widget24__desc">Total Student Offered</span>
                                        <span class="m-widget24__stats m--font-danger"><?php echo countStudent(); ?></span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-danger" style="width: 89%;"></div>
                                        </div>
                                        <span class="m-widget24__change">Total Registered Students</span>
                                        <span class="m-widget24__number">89%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Club Registrations -->
                            <div class="col-md-12 col-lg-6 col-xl-3">
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">Club Registrations</h4><br>
                                        <span class="m-widget24__desc">Total Student Registered</span>
                                        <span class="m-widget24__stats m--font-success"><?php echo countStudentRegistered(); ?></span>
                                        <div class="m--space-10"></div>
                                        <div class="progress m-progress--sm">
                                            <div class="progress-bar m--bg-success" style="width: 2%;"></div>
                                        </div>
                                        <span class="m-widget24__change">Total Opening</span>
                                        <span class="m-widget24__number"><?php echo countClub()*50; ?></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Active Clubs Table -->
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Co-curricular Club List (Active Clubs)</h3>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <table class="table  table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Club Name</th>
                                <th>Total Advisor(s)</th>
                                <th>Maximum Members</th>
                                <th>Registered Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $connection->prepare("
                                SELECT c.club_id, c.club_name, c.club_max, c.token
                                FROM club c
                                JOIN club_advisor ca ON c.club_id = ca.club_id
                                LEFT JOIN club_registration cr ON c.club_id = cr.club_id
                                WHERE ca.staffID = ?
                                  AND c.club_stat = 'e'
                                GROUP BY c.club_id
                                ORDER BY c.club_name ASC
                            ");
                            $stmt->bind_param("s", $_SESSION['username']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                $club_id   = $row['club_id'];
                                $club_name = $row['club_name'];
                                $club_max  = $row['club_max'];
                                $token     = $row['token']; // use token for secure links
                            ?>
                            <tr>
                                <th scope="row"><?php echo $counter; ?></th>
                                <td><?php echo htmlspecialchars($club_name); ?></td>
                                <td><?php echo totalAdvisor($club_id); ?></td>
                                <td><?php echo htmlspecialchars($club_max); ?></td>
                                <td><?php echo countClubRegistration($club_id); ?></td>
                                <td>
                                    <a href="studList.php?club_id=<?php echo urlencode($token); ?>" class="btn btn-info m-btn btn-sm m-btn--icon">
                                        <span><i class="fa flaticon-add"></i><span>Student List</span></span>
                                    </a>
                                </td>
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

    <?php include("footer.php"); ?>
</div>

<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src="assets/vendors/base/vendors.bundle.js"></script>
<script src="assets/demo/default/base/scripts.bundle.js"></script>
<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="assets/app/js/dashboard.js"></script>
<script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>

<script>
    $(document).ready(function () {
        $('#m_table_1').DataTable();
    });
</script>

</body>
</html>