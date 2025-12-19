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

// Get token from URL parameter
$act_ida = filter_input(INPUT_GET, "act_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Validate token exists
if (!$act_ida) {
    die("Invalid activity token");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AsidApps - Edit Club Activity</title>
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
        <?php include("menuheader.php"); ?>
        <!-- END: Header -->
        
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <?php include("mainmenu.php"); ?>
            <!-- END: Left Aside -->
            
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <div class="m-subheader">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title">Edit Activity / Event</h3>
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
                                                Event Details
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
                                    <div class="m-section">
                                        <div class="m-section__sub">
                                            <form action="updateActivityMod.php" method="post">
                                                <?php
                                                
                                                $sql_events = mysqli_query($connection, 
                                                    "SELECT ca.act_id, ca.club_id, ca.act_name, ca.date_start, ca.date_end, 
                                                            ca.total_pax, ca.club_stat, ca.budget, ca.location, 
                                                            ca.act_allow, ca.level_id, ca.kew_id, ca.token 
                                                     FROM club_activities ca 
                                                     LEFT JOIN club c ON ca.club_id = c.club_id 
                                                     LEFT JOIN club_advisor caa ON c.club_id = caa.club_id 
                                                     LEFT JOIN kew k ON ca.kew_id = k.kew_id 
                                                     WHERE ca.token = '$act_ida'");
                                                
                                                if (mysqli_num_rows($sql_events) > 0) {
                                                    $row = mysqli_fetch_array($sql_events);
                                                    
                                                    $act_id = $row["act_id"];
                                                    $club_id = $row["club_id"];
                                                    $act_name = $row["act_name"];
                                                    $date_s = date_create($row["date_start"]);
                                                    $date_e = date_create($row["date_end"]);
                                                    $total_pax = $row["total_pax"];
                                                    $club_stat = $row["club_stat"];
                                                    $budget = $row["budget"];
                                                    $location = $row["location"];
                                                    $act_allow = $row["act_allow"];
                                                    $level_id = $row["level_id"];
                                                    $kew_idd = $row["kew_id"];
                                                    $token = $row["token"];
                                                } else {
                                                    die("Activity not found");
                                                }
                                                ?>

                                                <div class="form-group m-form__group">
                                                    <label for="act_name"><b>Activity Name</b></label>
                                                    <input type="text" class="form-control m-input m-input--solid" name="act_name" id="act_name" placeholder="Name of the event" value="<?php echo htmlspecialchars($act_name); ?>">
                                                    <span class="m-form__help"></span>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label for="date_start"><b>Date Start</b></label>
                                                    <div class="input-group date" data-z-index="1100">
                                                        <input type="text" name="date_start" class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" data-date-format="yyyy-m-d H:i:s" value="<?php echo date_format($date_s, 'Y-m-d H:i'); ?>"/>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar-check-o glyphicon-th"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label for="date_end"><b>Date End</b></label>
                                                    <div class="input-group date" data-z-index="1100">
                                                        <input type="text" name="date_end" class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" data-date-format="yyyy-m-d H:i:s" value="<?php echo date_format($date_e, 'Y-m-d H:i'); ?>"/>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar-check-o glyphicon-th"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label for="location"><b>Location</b></label>
                                                    <input type="text" class="form-control m-input m-input--solid" name="location" id="location" placeholder="Location" value="<?php echo htmlspecialchars($location); ?>">
                                                    <span class="m-form__help"></span>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label for="total_pax"><b>Expected Audience</b></label>
                                                    <input type="number" class="form-control m-input m-input--solid" name="total_pax" id="total_pax" placeholder="Total Audience" value="<?php echo htmlspecialchars($total_pax); ?>">
                                                    <span class="m-form__help"></span>
                                                </div>

                                                <div class="form-group m-form__group">
                                                    <label for="budget"><b>Budget (RM)</b></label>
                                                    <input type="number" step="0.01" class="form-control m-input m-input--solid" name="budget" id="budget" placeholder="Budget amount" value="<?php echo htmlspecialchars($budget); ?>">
                                                    <span class="m-form__help"></span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kew_id"><b>Budget From</b></label>
                                                    <select class="custom-select form-control" name="kew_id" id="kew_id">
                                                        <option value="">Select Budget From</option>
                                                        <?php
                                                        $sql_events1 = mysqli_query($connection, "SELECT * FROM kew ORDER BY kew_name");
                                                        while ($row = mysqli_fetch_array($sql_events1)) {
                                                            $kew_id = $row['kew_id'];
                                                            $kew_name = $row['kew_name'];
                                                            $selected = ($kew_id == $kew_idd) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?php echo $kew_id; ?>" <?php echo $selected; ?>>
                                                            <?php echo htmlspecialchars($kew_name); ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label><b>Activity / Event Level</b></label>
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="1" <?php echo ($level_id == "1") ? "checked" : ""; ?> /> International
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="2" <?php echo ($level_id == "2") ? "checked" : ""; ?> /> National
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="3" <?php echo ($level_id == "3") ? "checked" : ""; ?> /> State
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="4" <?php echo ($level_id == "4") ? "checked" : ""; ?> /> District
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="5" <?php echo ($level_id == "5") ? "checked" : ""; ?> /> University
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="6" <?php echo ($level_id == "6") ? "checked" : ""; ?> /> Campus
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="7" <?php echo ($level_id == "7") ? "checked" : ""; ?> /> Club
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="level_id" value="8" <?php echo ($level_id == "8") ? "checked" : ""; ?> /> College
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label><b>Allow others (than your club members) to Register?</b></label>
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio">
                                                            <input type="radio" name="act_allow" value="y" <?php echo ($act_allow == "y") ? "checked" : ""; ?> /> Yes
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="act_allow" value="n" <?php echo ($act_allow == "n") ? "checked" : ""; ?> /> No
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label><b>Activity Status</b></label>
                                                    <div class="m-radio-inline">
                                                        <label class="m-radio">
                                                            <input type="radio" name="club_stat" value="p" <?php echo ($club_stat == "p") ? "checked" : ""; ?> /> Pending Approval
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="club_stat" value="a" <?php echo ($club_stat == "a") ? "checked" : ""; ?> /> Approved
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="club_stat" value="r" <?php echo ($club_stat == "r") ? "checked" : ""; ?> /> Rejected
                                                            <span></span>
                                                        </label>
                                                        <label class="m-radio">
                                                            <input type="radio" name="club_stat" value="x" <?php echo ($club_stat == "x") ? "checked" : ""; ?> /> Postponed
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Pass both act_id and token to update script -->
                                                <input type="hidden" id="act_id" name="act_id" value="<?php echo htmlspecialchars($act_id); ?>">
                                                <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($token); ?>">

                                                <div class="m-portlet__foot" align="center">
                                                    <div class="m-form__actions">
                                                        <a href="clubActivities.php" class="btn btn-secondary">Cancel</a>
                                                        <button type="submit" class="btn btn-warning">Update Activity</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
    
    <!--begin::Page Resources -->
    <script src="assets/demo/default/custom/components/charts/flotcharts.js" type="text/javascript"></script>
    <script src="assets/demo/default/custom/components/charts/morris-charts.js" type="text/javascript"></script>
    <!--end::Page Resources -->
    
    <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
</body>
</html>