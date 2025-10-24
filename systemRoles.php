<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | System Roles</title>
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
        .ct-series-a .ct-slice-donut { stroke: #8E44AD; }
        .ct-series-b .ct-slice-donut { stroke: #26C281; }
        .ct-series-c .ct-slice-donut { stroke: #E43A45; }
        .ct-series-d .ct-slice-donut { stroke: #F3C200; }

        .btn-activate:hover { background: #219150 !important; }
        .btn-deactivate:hover { background: #BF0000 !important; }
    </style>

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed 
             m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark 
             m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

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
                                            <h4 class="m-widget24__title">Students</h4><br>
                                            <span class="m-widget24__desc">Total Students</span>
                                            <span class="m-widget24__stats m--font-brand"><?php echo countStudent(); ?></span>
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
                                            <h4 class="m-widget24__title">Administration</h4><br>
                                            <span class="m-widget24__desc">Total Staff</span>
                                            <span class="m-widget24__stats m--font-info"><?php echo countAdministration(); ?></span>
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
                                            <h4 class="m-widget24__title">Academicians</h4><br>
                                            <span class="m-widget24__desc">Total Staff</span>
                                            <span class="m-widget24__stats m--font-danger"><?php echo countAcademic(); ?></span>
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
                                            <h4 class="m-widget24__title">Concessioner</h4><br>
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

                    <!-- USERS SECTION -->
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Users</h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="editSystemRoles.php" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                            <i class="la la-plus"></i> Add User
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Staff ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Allow Access</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_events = mysqli_query($connection, "
                                        SELECT 
                                            sysrole_acstaff.staffID,
                                            acstaff.nama,
                                            sysroles.roletitle,
                                            sysrole_acstaff.is_active,
                                            sysrole_acstaff.start_date
                                        FROM sysrole_acstaff
                                        JOIN acstaff ON acstaff.staffID = sysrole_acstaff.staffID
                                        JOIN sysroles ON sysroles.roleid = sysrole_acstaff.role_id
                                        ORDER BY sysrole_acstaff.staffID ASC
                                    ") or die(mysqli_error($connection));

                                    $z = 1;
                                    while ($row = mysqli_fetch_array($sql_events)) {
                                        $staffID = $row['staffID'];
                                        $nama    = $row['nama'];
                                        $role    = $row['roletitle'];
                                        $access  = $row['aaccess'];
                                        $date_s  = date_create($row['start_date']);
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $z; ?></th>
                                            <td><?php echo $staffID; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $roletitle; ?></td>
                                            <td><?php echo ($access == 1) ? "Yes" : "No"; ?></td>
                                            <td><?php echo date_format($date_s, 'd/m/Y g:i a'); ?></td>
                                            <td>
                                                <a href="editSystemRoles.php?staffID=<?php echo $staffID; ?>" class="btn btn-warning m-btn btn-sm m-btn--icon">
                                                    <span>
                                                        <i class="fa flaticon-edit-1"></i>
                                                        <span>Edit</span>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $z++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END USERS SECTION -->

                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>

    </div>

    <!-- Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('#m_table_1').DataTable();
        });
    </script>

</body>
</html>
