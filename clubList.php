<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | Club List</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/demo/default/media/img/logo/favicon.ico" type="image/x-icon">
    
    <!-- Web Font -->
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
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    
    <style>
        /* Reset and full width constraints */
        * {
            box-sizing: border-box;
        }
        
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }
        
        body {
            min-height: 100vh;
            position: relative;
        }
        
        .m-page {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        .m-grid {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            padding: 0;
        }
        
        .m-wrapper {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        .m-content {
            width: 100% !important;
            max-width: 100% !important;
            padding: 20px 15px;
            margin: 0;
            overflow-x: hidden;
        }
        
        /* Stats widgets container */
        .m-portlet__body--no-padding {
            width: 100% !important;
            max-width: 100% !important;
        }
        
        .row.m-row--no-padding {
            width: 100% !important;
            max-width: 100% !important;
            margin-left: 0;
            margin-right: 0;
        }
        
        /* Table container fixes */
        .m-portlet.m-portlet--mobile {
            width: 100% !important;
            max-width: 100% !important;
        }
        
        .m-portlet__body {
            width: 100% !important;
            max-width: 100% !important;
            padding: 0;
        }
        
        /* Table responsive container */
        .table-responsive-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border: 1px solid #ebedf2;
            border-radius: 4px;
        }
        
        /* DataTable fixes */
        #m_table_1 {
            width: 100% !important;
            min-width: 800px; /* Minimum width for table */
            margin: 0;
        }
        
        #m_table_1_wrapper {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            padding: 0;
        }
        
        /* Donut charts styling */
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
        
        /* Mobile responsiveness */
        @media (max-width: 1024px) {
            .m-content {
                padding: 15px 10px;
            }
            
            .col-xl-3 {
                margin-bottom: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .m-content {
                padding: 10px 5px;
            }
            
            .m-portlet__head-tools {
                margin-top: 10px;
            }
            
            .btn {
                margin-bottom: 5px;
            }
        }
        
        @media (max-width: 480px) {
            .m-content {
                padding: 5px;
            }
            
            .m-widget24__title {
                font-size: 1.1rem;
            }
            
            .m-portlet__head-text {
                font-size: 1.2rem;
            }
        }
        
        /* Ensure no horizontal scroll */
        .m-body {
            overflow-x: hidden !important;
        }
        
        /* Modal fixes */
        .modal-lg {
            max-width: 95% !important;
            margin: 20px auto;
        }
        
        /* Action buttons responsiveness */
        .m-btn--icon {
            white-space: nowrap;
        }
        
        @media (max-width: 1200px) {
            .m-btn--icon span span {
                display: none;
            }
            
            .m-btn--icon span i {
                margin-right: 0 !important;
            }
        }
    </style>
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
            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <?php include ("mainmenu.php")?>
            <!-- END: Left Aside -->
            
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content" style="width: 100%; max-width: 100%;">
                    <!-- Stats Widgets -->
                    <div class="m-portlet">
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <div class="row m-row--no-padding m-row--col-separator-xl">
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Club</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Club</span>
                                            <span class="m-widget24__stats m--font-brand"><?php echo countClub() ?></span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Registered Club</span>
                                            <span class="m-widget24__number">100%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Advisor</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Advisors</span>
                                            <span class="m-widget24__stats m--font-info"><?php echo countAdvisor()?></span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Registered Advisor(s)</span>
                                            <span class="m-widget24__number">100%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Student</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Student Offered</span>
                                            <span class="m-widget24__stats m--font-danger"><?php echo countStudent() ?></span>
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-danger" role="progressbar" style="width: 89%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Registered Students</span>
                                            <span class="m-widget24__number">89%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Club Registrations</h4>
                                            <br>
                                            <span class="m-widget24__desc">Total Student Registered</span>
                                            <span class="m-widget24__stats m--font-success"><?php echo countStudentRegistered() ?></span>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar m--bg-success" role="progressbar" style="width: 2%;"></div>
                                            </div>
                                            <span class="m-widget24__change">Total Opening</span>
                                            <span class="m-widget24__number">
                                                <?php $tot = countClub()*50; echo $tot; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Club List Table -->
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Co-curricular Club List</h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <button type="button" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-toggle="modal" data-target="#m_modal_add">
                                            <i class="la la-plus"></i> New Club
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="table-responsive-container">
                                <table class="table table-striped table-bordered table-hover table-checkable" id="m_table_1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Club Name</th>
                                            <th>Club Status</th>
                                            <th>Active Status</th>
                                            <th>Group WS Link</th>
                                            <th>Total Advisor(s)</th>
                                            <th>Maximum Members</th>
                                            <th>Registered Students</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_events = mysqli_query($connection, "select * from club order by club_name asc") or die (mysqli_error());
                                        $z = 1;

                                        while ($row = mysqli_fetch_array($sql_events)) {
                                            $club_id = $row["club_id"];
                                            $club_name = $row["club_name"];
                                            $club_max = $row["club_max"];
                                            $club_stat = $row["club_stat"];
                                            $club_ws = $row["club_ws"];
                                            $is_active = $row["is_active"];
                                            $token = $row['token'];
                                            
                                            if($club_stat=='e') {
                                                $c_stat='<span class="m-badge m-badge--success m-badge--wide">Enable</span>';
                                            } else if($club_stat=='d') {
                                                $c_stat='<span class="m-badge m-badge--danger m-badge--wide">Disable</span>';
                                            }

                                            if($is_active=='1') {
                                                $a_stat='<span class="m-badge m-badge--info m-badge--wide">Active</span>';
                                            } else if($is_active=='0') {
                                                $a_stat='<span class="m-badge m-badge--metal m-badge--wide">Inactive</span>';
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $z ?></td>
                                            <td><?php echo $club_name ?></td>
                                            <td><?php echo $c_stat ?></td>
                                            <td><?php echo $a_stat ?></td>
                                            <td><?php echo $club_ws ?></td>
                                            <td><?php totalAdvisor($club_id) ?></td>
                                            <td><?php echo $club_max ?></td>
                                            <td><?php echo countClubRegistration($club_id) ?></td>
                                            <td>
                                                <div class="btn-group-vertical btn-group-sm">
                                                    <a href="addClubAdvisor.php?club_id=<?php echo $token; ?>" class="btn btn-success m-btn m-btn--icon" title="Add Advisor">
                                                        <i class="fa flaticon-add"></i>
                                                        <span>Advisor</span>
                                                    </a>
                                                    <a href="addStudent.php?club_id=<?php echo $token; ?>" class="btn btn-info m-btn m-btn--icon" title="Add Student">
                                                        <i class="fa flaticon-add"></i>
                                                        <span>Student</span>
                                                    </a>
                                                    <a href="editClub.php?id=<?php echo $token; ?>" class="btn btn-warning m-btn m-btn--icon" title="Edit Club">
                                                        <i class="fa flaticon-edit"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                </div>
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Club Modal -->
        <div class="modal fade" id="m_modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Club</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="addClub.php" method="post">
                            <div class="form-group">
                                <label for="club_name" class="form-control-label">Club Name</label>
                                <input type="text" class="form-control" name="club_name" id="club_name" required>
                            </div>
                            <div class="form-group">
                                <label for="club_obj" class="form-control-label">Club Objective</label>
                                <textarea rows="5" class="form-control" name="club_obj" id="club_obj" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="club_max" class="form-control-label">Maximum Members (Minimum 50 students)</label>
                                <input type="number" class="form-control" name="club_max" id="club_max" min="50" required>
                            </div>
                            <div class="form-group">
                                <label for="club_ws" class="form-control-label">Club Group WhatsApp / Telegram Link</label>
                                <input type="text" class="form-control" name="club_ws" id="club_ws">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Club Status</label>
                                <div class="m-radio-inline">
                                    <label class="m-radio">
                                        <input type="radio" name="club_stat" value="d" checked> Draft
                                        <span></span>
                                    </label>
                                    <label class="m-radio">
                                        <input type="radio" name="club_stat" value="e"> Enable
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
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
    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>

    <script>
    $(document).ready(function() {
        // Initialize DataTable with proper responsive settings
        $('#m_table_1').DataTable({
            "responsive": true,
            "autoWidth": false,
            "scrollX": true,
            "scrollCollapse": true,
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "zeroRecords": "No records found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "search": "Search:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
        
        // Force proper layout
        setTimeout(function() {
            $('body').trigger('resize');
            $(window).trigger('resize');
        }, 500);
    });
    
    // Handle window resize
    $(window).on('resize', function() {
        $('#m_table_1').DataTable().columns.adjust().responsive.recalc();
    });
    </script>
</body>
</html>