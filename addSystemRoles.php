<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$staffData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $staffID = mysqli_real_escape_string($connection, $_POST['staffID']);
    $result = mysqli_query($connection, "SELECT * FROM acstaff WHERE staffID = '$staffID'");
    
    if (mysqli_num_rows($result) > 0) {
        $staffData = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['msg'] = "No staff found with Staff No: $staffID";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Fetch roles from sysroles table
$roles = [];
$roleQuery = mysqli_query($connection, "SELECT * FROM sysroles ORDER BY roleid ASC");
if ($roleQuery) {
    while ($row = mysqli_fetch_assoc($roleQuery)) {
        $roles[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $staffID = mysqli_real_escape_string($connection, $_POST['staffID']);
    $role = mysqli_real_escape_string($connection, $_POST['roleid']);
    $allow = mysqli_real_escape_string($connection, $_POST['allow_access']);

    $query = "UPDATE acstaff SET roleid='$role', allow_access='$allow' WHERE staffID='$staffID'";
    if (mysqli_query($connection, $query)) {
        $_SESSION['msg'] = "Staff details updated successfully.";
    } else {
        $_SESSION['msg'] = "Error updating details: " . mysqli_error($connection);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CRS | Edit System Roles</title>
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

                    <div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">Users</h3>
            </div>
        </div>
    </div>

    <div class="m-portlet__body">

        <!-- Search Section -->
        <div class="card mb-4">
            <div class="card-header" style="background:F7FBFF; color:black;">Search Staff</div>
            <div class="card-body">
                <form method="post" class="form-inline" style="gap:10px;">
                    <input type="text" name="staffID" class="form-control flex-grow-1" placeholder="Enter Staff No" required>
                    <button type="submit" name="search" class="btn btn-info">Search</button>
                </form>
            </div>
        </div>

        <!-- Staff Details Section -->
        <?php if (isset($staffData)) { ?>
            <div class="card">
                <div class="card-header" style="background:F7FBFF; color:black;">Staff Details</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>Staff No</label>
                                <input type="text" name="staffID" value="<?php echo htmlspecialchars($staffData['staffID']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo htmlspecialchars($staffData['email']); ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-5">
                                <label>Name</label>
                                <input type="text" name="nama" value="<?php echo htmlspecialchars($staffData['nama']); ?>" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
    <label>Role</label>
    <select name="role" class="form-control" required>
        <option value="">Select Role</option>
        <?php foreach ($roles as $r) { ?>
            <option value="<?php echo htmlspecialchars($r['roleid']); ?>"
                <?php if ($staffData['roleid'] == $r['roleid']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($r['roletitle']); ?>
            </option>
        <?php } ?>
    </select>
                            </div>
                            <div class="col-md-6">
                                <label>Allow Access</label>
                                <select name="allow_access" class="form-control">
                                    <option value="">Select One</option>
                                    <option value= 'YES' <?php if ($staffData['is_active'] == 1 ) echo 'selected'; ?>>Yes</option>
                                    <option value= 'NO' <?php if ($staffData['is_active'] == 0 ) echo 'selected'; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-start">
                            <button type="submit" name="update" class="btn btn-primary">Save</button>
                            <a href="SystemRoles.php" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
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

    <!-- JS Libraries -->
    <!-- jQuery + Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>



</body>
</html>
