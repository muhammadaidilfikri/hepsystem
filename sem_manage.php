<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

//legends
//roleid 1 = Moderator
//roleid 2 = IT Administrator
//roleid 3 = Super Administrator
$allowedroles = array(1,2,3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kod_sem']) && $_POST['kod_sem'] != '') {
    $semester = mysqli_real_escape_string($connection, $_POST['kod_sem']);

    if (isset($_POST['activate'])) {
        $is_active = 1;
        $msg = "Semester activated successfully.";
    } elseif (isset($_POST['deactivate'])) {
        $is_active = 0;
        $msg = "Semester deactivated successfully.";
    }

    if (isset($is_active)) {
        $query = "UPDATE semesters SET is_active = $is_active WHERE kod_sem = '$semester'";
        $_SESSION['msg'] = mysqli_query($connection, $query)
            ? $msg
            : "Error updating semester: ";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CRS | Semester Session List</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Base Styles -->
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <style>
        .ct-series-a .ct-slice-donut {
            stroke: #8E44AD;
        }

        .ct-series-b .ct-slice-donut {
            stroke: #26C281;
        }

        .ct-series-c .ct-slice-donut {
            stroke: #E43A45;
        }

        .ct-series-d .ct-slice-donut {
            stroke: #F3C200;
        }

        .btn-activate:hover {
            background: #219150 !important;
        }

        .btn-deactivate:hover {
            background: #BF0000 !important;
        }
    </style>

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include("menuheader.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>

            <?php include("mainmenu.php"); ?>

            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">

                    <!-- STATS SECTION -->
                    <div class="m-portlet">
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <div class="row m-row--no-padding m-row--col-separator-xl">

                                <!-- Students -->
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Students</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Students</span>
                                            <span class="m-widget24__stats m--font-brand">
                                                <?php echo countStudent(); ?>
                                            </span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Registered</span>
                                            <span class="m-widget24__number">0%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Administration -->
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Administration</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Staff</span>
                                            <span class="m-widget24__stats m--font-info">
                                                <?php echo countAdministration(); ?>
                                            </span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Registered</span>
                                            <span class="m-widget24__number">3%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Academicians -->
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Academicians</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Staff</span>
                                            <span class="m-widget24__stats m--font-danger">
                                                <?php echo countAcademic(); ?>
                                            </span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Registered</span>
                                            <span class="m-widget24__number">0%</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Concessioner -->
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Concessioner</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Staff</span>
                                            <span class="m-widget24__stats m--font-success">0</span>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-success" role="progressbar" style="width: 69%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Registered</span>
                                            <span class="m-widget24__number">0%</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SEMESTER SESSION LIST -->
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Semester Session List</h3>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <div class="m-section">
                                <span class="m-section__sub">

                                    <?php
                                    if (isset($_SESSION['msg'])) {
                                        $msg = $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                        echo "<script>alert('$msg');</script>";
                                    }
                                    ?>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <select class="form-control js-example-basic-single" name="kod_sem" style="width: 100%;">
                                                <option value=''>Search or select a semester</option>
                                                <?php
                                                $sql_events1 = mysqli_query($connection, "SELECT * FROM semesters ORDER BY kod_sem");
                                                while ($row = mysqli_fetch_array($sql_events1)) {
                                                    $sem_english = $row['sem_english'];
                                                    $active = $row['is_active'] == 1 ? " (Active)" : "";
                                                    ?>
                                                    <option value="<?php echo $row['kod_sem']; ?>" data-active="<?php echo $row['is_active']; ?>">
                                                        <?php echo $row['kod_sem'] . ' - ' . $sem_english . $active; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="m-portlet__foot" align="center">
                                            <div class="m-form__actions">
                                                <button type="submit" name="activate" id="activateBtn" class="btn-activate"
                                                    style="background:#27ae60;color:#fff;border:none;padding:10px 20px;margin:5px;border-radius:5px;cursor:pointer;min-width:120px;">
                                                    Activate
                                                </button>

                                                <button type="submit" name="deactivate" id="deactivateBtn" class="btn-deactivate"
                                                    style="background:#FF0000;color:#fff;border:none;padding:10px 20px;margin:5px;border-radius:5px;cursor:pointer;min-width:120px;">
                                                    Deactivate
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIVE SEMESTER LIST -->
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Active Semester</h3>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <div class="m-section">
                                <span class="m-section__sub">
                                    <table class="table table-striped- table-bordered table-hover table-checkable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Semester Code</th>
                                                <th>Semester Name</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_active = "SELECT * FROM semesters WHERE is_active = 1 ORDER BY kod_sem";
                                            $result_active = mysqli_query($connection, $query_active);
                                            $z = 1;
                                            while ($row = mysqli_fetch_array($result_active)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $z++; ?></td>
                                                    <td><?php echo $row['kod_sem']; ?></td>
                                                    <td><?php echo $row['sem_english']; ?></td>
                                                    <td><span style="color: #27ae60; font-weight: 600;">Active</span></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- END ACTIVE SEMESTER LIST -->
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>

    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- JS Libraries -->
    <!-- jQuery + Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>

   <script>
$(document).ready(function () {
    $('.js-example-basic-single').select2();

    // Get currently active semester code from PHP
    var activeSemesterCode = "<?php
        $getActive = mysqli_query($connection, 'SELECT kod_sem FROM semesters WHERE is_active = 1 LIMIT 1');
        $activeCode = ($getActive && mysqli_num_rows($getActive) > 0) ? mysqli_fetch_assoc($getActive)['kod_sem'] : '';
        echo $activeCode;
    ?>";

    function toggleButtons() {
        var selectedOption = $('select[name="kod_sem"] option:selected');
        var isActive = selectedOption.data('active');
        var selectedCode = selectedOption.val();

        if (selectedCode == '') {
            // No semester selected, disable both
            $('#activateBtn, #deactivateBtn').prop('disabled', true)
                .css({ 'opacity': '0.6', 'cursor': 'not-allowed' });
        } 
        else if (isActive == 1) {
            // This semester is active
            $('#activateBtn').prop('disabled', true)
                .css({ 'opacity': '0.6', 'cursor': 'not-allowed' });
            $('#deactivateBtn').prop('disabled', false)
                .css({ 'opacity': '1', 'cursor': 'pointer' });
        } 
        else if (activeSemesterCode !== '' && selectedCode !== activeSemesterCode) {
            // Another semester is already active
            $('#activateBtn, #deactivateBtn').prop('disabled', true)
                .css({ 'opacity': '0.6', 'cursor': 'not-allowed' });
        } 
        else {
            // No active semester yet
            $('#activateBtn').prop('disabled', false)
                .css({ 'opacity': '1', 'cursor': 'pointer' });
            $('#deactivateBtn').prop('disabled', true)
                .css({ 'opacity': '0.6', 'cursor': 'not-allowed' });
        }
    }

    // Initial check when page loads
    toggleButtons();

    // Re-check when selection changes
    $('select[name="kod_sem"]').on('change', toggleButtons);
});
</script>



</body>
</html>
