<?php
session_start();
include ("dbconnect.php");
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

$sid = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AsidApps - Register Clubs's Student</title>
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
        <?php include ("menuheader.php")?>
        <!-- END: Header -->
        
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <?php include ("mainmenu.php")?>
            <!-- END: Left Aside -->
            
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <div class="m-subheader ">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title ">Add New Student</h3>
                        </div>
                    </div>
                </div>
                <!-- END: Subheader -->
                
                <div class="m-content">
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
                                                Club Details
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
    <!--begin::Section-->
    <div class="m-section">
        <span class="m-section__sub">
            <form action="regStudent.php" method="post">
                <?php
                $sqlCheck = "SELECT * FROM club WHERE token = ?";
                $stmtCheck = $mysqli->prepare($sqlCheck);
                $stmtCheck->bind_param("s", $sid);
                $stmtCheck->execute();
                $resultCheck = $stmtCheck->get_result();
                if($resultCheck->num_rows > 0) {
                    $row = $resultCheck->fetch_assoc();
                    $club_id = $row["club_id"];
                    $club_name = $row["club_name"];
                    $club_token = $row["token"]; // Get the token for redirection
                } else {
                    // Handle case where club is not found
                    echo "<script>alert('Club not found!'); history.back();</script>";
                    exit();
                }
                ?>
                <!-- Fix: Use hidden input and remove the visible text input -->
                <input type="hidden" id="club_id" name="club_id" value="<?php echo $club_id ?>">
                <h3><?php echo htmlspecialchars($club_name) ?></h3>

                <div class="form-group m-form__group">
                    <label for="Name"><b>Add Student</b></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" class="form-control m-input m-input--solid" name="stdNo" id="stdNo" aria-describedby="stdNo" placeholder="Enter Student No" required>
                        <span class="m-form__help">Enter the student's ID number</span>
                    </div>
                </div>

                <div class="m-portlet__foot " align="center">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-success">Register Student</button>
                        <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </span>
    </div>
</div>
                            </div>
                        </div>
                    </div>

                    <div class="m-content">
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
                                        <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Student No</th>
                                                    <th>Name</th>
                                                    <th>Program</th>
                                                    <th>Club Name</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Retrieve and display all students registered to the selected club
                                                $sql_events = "SELECT c.*, cr.*, s.*, cr.is_active AS registration_status 
                                                              FROM club c, club_registration cr, student s 
                                                              WHERE c.club_id = cr.club_id 
                                                              AND s.stdNo = cr.stdNo 
                                                              AND cr.club_id = ?";
                                                
                                                $stmt = $connection->prepare($sql_events);
                                                $stmt->bind_param("s", $club_id); 
                                                $stmt->execute();
                                                $result = $stmt->get_result();
                                                
                                                $z = 1;
                                                
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $reg_id = $row["reg_id"];
                                                        $club_id = $row["club_id"];
                                                        $club_name = $row["club_name"];
                                                        $stdName = $row["stdName"];
                                                        $stdNo = $row["stdNo"];
                                                        $progCode = $row["progCode"];
                                                        $is_active = isset($row["registration_status"]) ? (int)$row["registration_status"] : 0;
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $z ?></th>
                                                    <td><?php echo htmlspecialchars($stdNo) ?></td>
                                                    <td><?php echo htmlspecialchars($stdName) ?></td>
                                                    <td><?php echo htmlspecialchars($progCode) ?></td>
                                                    <td><?php echo htmlspecialchars($club_name) ?></td>
                                                    <td>
                                                        <?php echo ($is_active === 1) ? 
                                                            '<span class="m-badge m-badge--success m-badge--wide">ACTIVE</span>' : 
                                                            '<span class="m-badge m-badge--danger m-badge--wide">INACTIVE</span>'; ?>
                                                    </td>
                                                   <td>
                                                        <?php if ($is_active === 0): ?>
                                                            <!-- Activate Button (shown when student is inactive) -->
                                                            <a href="activateStudent.php?reg_id=<?php echo $reg_id ?>&club_id=<?php echo $club_token ?>" 
                                                            class="btn btn-success m-btn btn-sm m-btn--icon"
                                                            onclick="return confirm('Are you sure you want to activate this student?')">
                                                                <span>
                                                                    <i class="fa flaticon-user"></i>
                                                                    <span>Activate Student</span>
                                                                </span>
                                                            </a>
                                                        <?php else: ?>
                                                            <!-- Deactivate Button (shown when student is active) -->
                                                            <a href="deleteRegisterStudent.php?reg_id=<?php echo $reg_id ?>&club_id=<?php echo $club_token ?>" 
                                                            class="btn btn-warning m-btn btn-sm m-btn--icon"
                                                            onclick="return confirm('Are you sure you want to deactivate this student?')">
                                                                <span>
                                                                    <i class="fa flaticon-close"></i>
                                                                    <span>Deactivate</span>
                                                                </span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                        $z++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7' class='text-center'>No students registered for this club.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>
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
    <script src="assets/vendors/custom/flot/flot.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->
    <!--begin::Page Snippets -->
    <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
    <!--end::Page Snippets -->
</body>
</html>