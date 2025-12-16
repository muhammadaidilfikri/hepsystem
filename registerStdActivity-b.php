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
//roleid 4 = HEA
$allowedroles = array(3,4); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

// Generate CSRF token if not exists
if (empty($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['form_token'];

// Get parameters - dact_id parameter contains the token value
$token = isset($_GET["dact_id"]) ? $_GET["dact_id"] : "";
$regpoint = isset($_GET["regpoint"]) ? $_GET["regpoint"] : "";
$resultSearch = isset($_GET["resultSearch"]) ? $_GET["resultSearch"] : "";
$regError = isset($_GET["regError"]) ? $_GET["regError"] : 0;

if ($regpoint == 'a') {
    $sttName = "Audience";
} else if ($regpoint == 'c') {
    $sttName = "Committee";
} else if ($regpoint == 'p') {
    $sttName = "Contestant";
} else {
    $sttName = "Unknown";
}

// Get activity details using token
$dact_name = "";
$dept_name = "";
$actual_dact_id = "";
if (!empty($token)) {
    $sql_events2 = mysqli_query($connection, "SELECT * FROM dept, dept_activities WHERE dept.dept_id=dept_activities.dept_id AND dept_activities.token='$token'") or die(mysqli_error($connection));
    if ($row = mysqli_fetch_array($sql_events2)) {
        $dept_name = $row["dept_name"];
        $dact_name = $row["dact_name"];
        $actual_dact_id = $row["dact_id"];
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
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                <?php echo $sttName ?> Registrations
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="m-section">
                                        <span class="m-section__sub">
                                            <form action="regStdD.php" method="post">
                                                <!-- CSRF Token -->
                                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                                
                                                <!-- Use token for redirect but actual dact_id for processing -->
                                                <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($token); ?>">
                                                <input type="hidden" id="dact_id" name="dact_id" value="<?php echo htmlspecialchars($actual_dact_id); ?>">
                                                <input type="hidden" id="regpoint" name="regpoint" value="<?php echo htmlspecialchars($regpoint); ?>">
                                                
                                                <h4><?php echo htmlspecialchars($dact_name); ?></h4>
                                                <span class="m--font-primary">Organized by: <?php echo htmlspecialchars($dept_name); ?></span>
                                                <br><br>
                                                
                                                <div class="form-group m-form__group">
                                                    <div>
                                                        <span class="m-form__help">Enter the student ID to register as <?php echo strtolower($sttName); ?></span><br>
                                                        <br><input type="text" class="form-control m-input m-input--solid" name="stdNo" id="stdNo" aria-describedby="staffID" placeholder="Enter Student ID" autofocus required>
                                                    </div>
                                                </div>
                                                
                                                <div class="m-portlet__foot" align="center">
                                                    <div class="m-form__actions">
                                                        <button type="submit" class="btn btn-success">Register</button>
                                                        <button type="button" onclick="window.location.href='deptActivities.php'" class="btn btn-information" style="margin-right: 10px;">Back</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </span>
                                    </div>
                                    <!--End::Section-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Registered Students List -->
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
                                                List of <?php echo $sttName ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="m-portlet__body">
                                    <?php if (empty($actual_dact_id)): ?>
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
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($actual_dact_id) && !empty($regpoint)) {
                                                    $sql_events = mysqli_query($connection, "SELECT student.stdNo, student.stdName, student.progCode, dactreg.dactreg_id, dactreg.regpoint 
                                                                                            FROM student 
                                                                                            JOIN dactreg ON student.stdNo = dactreg.stdNo 
                                                                                            JOIN dept_activities ON dept_activities.dact_id = dactreg.dact_id 
                                                                                            WHERE dept_activities.dact_id = '$actual_dact_id' AND dactreg.regpoint = '$regpoint' 
                                                                                            ORDER BY student.stdName") or die(mysqli_error($connection));
                                                    
                                                    $z = 1;
                                                    if (mysqli_num_rows($sql_events) > 0) {
                                                        while ($row = mysqli_fetch_array($sql_events)) {
                                                            $stdNo = $row["stdNo"];
                                                            $dactreg_id = $row["dactreg_id"];
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
                                                    <td>
                                                        <button type="button" class="btn btn-danger m-btn btn-sm m-btn--icon" onclick="confirmDelete('<?php echo $dactreg_id; ?>', '<?php echo htmlspecialchars($stdName); ?>', '<?php echo htmlspecialchars($token); ?>', '<?php echo htmlspecialchars($regpoint); ?>')">
                                                            <span>
                                                                <i class="fa flaticon-delete"></i>
                                                                <span>Delete</span>
                                                            </span>
                                                        </button>
                                                    </td>
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
                                                                <strong>No <?php echo strtolower($sttName); ?> found.</strong> Register students using the form above.
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                } else {
                                                ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <div class="m-alert m-alert--icon m-alert--outline alert alert-warning" role="alert">
                                                            <div class="m-alert__icon">
                                                                <i class="la la-warning"></i>
                                                            </div>
                                                            <div class="m-alert__text">
                                                                <strong>Invalid activity or registration type.</strong> Please check the URL parameters.
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
    
    <!--begin::Page Vendors -->
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->

    <script>
        // Delete confirmation function
        function confirmDelete(dactregId, studentName, token, regpoint) {
            if (confirm('Are you sure you want to remove ' + studentName + ' from this activity?\n\nThis action cannot be undone.')) {
                // Redirect to delete page with token instead of dact_id
                window.location.href = 'deleteRegStudentD.php?dactreg_id=' + dactregId + '&token=' + token + '&regpoint=' + regpoint;
            }
        }

        // Initialize DataTable
        $(document).ready(function() {
            $('#m_table_1').DataTable({
                responsive: true,
                "pageLength": 10,
                "order": [[0, 'asc']]
            });
        });

        // Auto-focus on student ID input
        $(document).ready(function() {
            $('#stdNo').focus();
        });
    </script>
</body>
</html>