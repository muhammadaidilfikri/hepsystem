<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//legends
//roleid 1 = SUPER ADMINISTRATOR
//roleid 2 = IT ADMINISTRATOR
//roleid 3 = HEP
$allowedroles = array(3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

// Get the token from URL (act_id parameter contains the token)
$token = $_GET["act_id"] ?? '';
$resultSearch = $_GET["resultSearch"] ?? '';
$regError = $_GET["regError"] ?? '';

// Get the actual act_id from the token
$actual_act_id = "";
$activity_name = "";
if (!empty($token)) {
    $activity_query = mysqli_query($connection, "SELECT act_id, act_name FROM club_activities WHERE token='$token'");
    if ($row = mysqli_fetch_array($activity_query)) {
        $actual_act_id = $row["act_id"];
        $activity_name = $row["act_name"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AsidApps - Activity Student's Registrations</title>
    <meta name="description" content="Latest updates and statistic charts">
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
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!-- Add DataTables CSS -->
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        <?php include("menuheader.php")?>
        <!-- END: Header -->
        
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <?php include("mainmenu.php")?>
            <!-- END: Left Aside -->
            
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <!-- END: Subheader -->
                
                <div class="m-content">
                    <?php if ($regError == 1): ?>
                        <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text"><?php echo htmlspecialchars($resultSearch); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($regError == 2): ?>
                        <div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--skin-dark ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text"><?php echo htmlspecialchars($resultSearch); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Portlet-->
                            <div class="m-portlet" id="m_portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon">
                                                <i class="flaticon-calendar-2"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                List of Registered Students
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <?php if (empty($actual_act_id)): ?>
                                        <div class="m-alert m-alert--icon m-alert--outline alert alert-danger" role="alert">
                                            <div class="m-alert__icon">
                                                <i class="la la-warning"></i>
                                            </div>
                                            <div class="m-alert__text">
                                                <strong>Error:</strong> Invalid activity token or activity not found.
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Programme</th>
                                                    <th>Role</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_events = mysqli_query($connection, "SELECT student.stdNo, student.stdName, student.progCode, actreg.actreg_id, actreg.regpoint, club_activities.act_name 
                                                                                        FROM student 
                                                                                        JOIN actreg ON student.stdNo = actreg.stdNo 
                                                                                        JOIN club_activities ON club_activities.act_id = actreg.act_id 
                                                                                        WHERE club_activities.act_id = '$actual_act_id' 
                                                                                        ORDER BY student.stdName");
                                                
                                                $z = 1;
                                                if (mysqli_num_rows($sql_events) > 0) {
                                                    while ($row = mysqli_fetch_array($sql_events)) {
                                                        $stdNo = $row["stdNo"];
                                                        $actreg_id = $row["actreg_id"];
                                                        $stdName = $row["stdName"];
                                                        $progCode = $row["progCode"];
                                                        $regpoint = $row["regpoint"];

                                                        if($regpoint == 'a') {
                                                            $regs = "Audience";
                                                        } else if($regpoint == 'p') {
                                                            $regs = "Contestant";
                                                        } else if($regpoint == 'c') {
                                                            $regs = "Committee";
                                                        } else {
                                                            $regs = "Unknown";
                                                        }
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $z; ?></th>
                                                    <td><?php echo htmlspecialchars($stdNo); ?></td>
                                                    <td><?php echo htmlspecialchars($stdName); ?></td>
                                                    <td><?php echo htmlspecialchars($progCode); ?></td>
                                                    <td><?php echo $regs; ?></td>
                                                    <td><?php echo checkMarks($actreg_id); ?></td>
                                                </tr>
                                                <?php
                                                        $z++;
                                                    }
                                                } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <div class="m-alert m-alert--icon m-alert--outline alert alert-info" role="alert">
                                                            <div class="m-alert__icon">
                                                                <i class="la la-info-circle"></i>
                                                            </div>
                                                            <div class="m-alert__text">
                                                                <strong>No students registered for this activity yet.</strong>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                    <div class="button-container" style="text-align: center;">
                                    <br><button type="button" onclick="window.location.href='clubActivities.php'" class="btn btn-information" style="margin-right: 10px; display: inline-block;">
                                        Back
                                    </button>
                                </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Body -->

        <!-- begin::Footer -->
        <?php include("footer.php"); ?>
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->

    <!--begin::Base Scripts -->
    <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->
    
    <!-- Add DataTables JS -->
    <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#m_table_1').DataTable({
                responsive: true,
                "pageLength": 10,
                "order": [[0, 'asc']],
                "language": {
                    "emptyTable": "No students registered for this activity"
                }
            });
        });
    </script>
</body>
</html>