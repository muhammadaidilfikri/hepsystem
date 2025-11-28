<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

// Check if user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Role legends
// 1 = SUPER ADMINISTRATOR
// 2 = IT ADMINISTRATOR
// 3 = HEP
// 4 = HEA
$allowedroles = array(2, 3, 4); // Roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

if (isset($_GET['ajax_sem'])) {
    $sem = $_GET['ajax_sem'];

    // Step 1: Get all students
    $sql = mysqli_query($connection, "
        SELECT stdNo, stdName, kod_sem, jantina, progCode, noPhone, email_uitm
        FROM student
        WHERE kod_sem = '$sem'
        ORDER BY stdName ASC
    ");

    if (!$sql) {
        die("SQL Error: " . mysqli_error($connection));
    }

    if(mysqli_num_rows($sql) == 0){
        echo "No students found for this semester.";
        exit;
    }

    // Store students and get their numbers
    $students = array();
    $studentNos = array();
    while ($row = mysqli_fetch_array($sql)) {
        $students[] = $row;
        $studentNos[] = $row['stdNo'];
    }
    
    // Get all marks for all students at once (much faster - 3 queries total instead of 3 per student)
    $marksCache = sumMarksBatch($studentNos);

    // Display results
    $z = 1;
    foreach ($students as $row) {
        $totalMarks = isset($marksCache[$row['stdNo']]) ? $marksCache[$row['stdNo']] : 0;
        echo "
        <tr>
            <td>$z</td>
            <td>{$row['stdNo']}</td>
            <td>{$row['stdName']}</td>
            <td>{$row['kod_sem']}</td>
            <td>{$row['jantina']}</td>
            <td>{$row['progCode']}</td>
            <td>{$row['noPhone']}</td>
            <td>{$row['email_uitm']}</td>
            <td>$totalMarks</td>
        </tr>";
        $z++;
    }

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>AsidApps | Asasi Students</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Web fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
            active: function() { sessionStorage.fonts = true; }
        });
    </script>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" />

    <style>
        /* Donut chart styles */
        .ct-series-a .ct-slice-donut { stroke: #8E44AD; }
        .ct-series-b .ct-slice-donut { stroke: #26C281; }
        .ct-series-c .ct-slice-donut { stroke: #E43A45; }
        .ct-series-d .ct-slice-donut { stroke: #F3C200; }
        
        /* Gap between header and dataTable */
        #m_table_1 {
            margin-top: 20px;
        }
    </style>

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile 
             m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push 
             m-aside--offcanvas-default">

    <!-- Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- Header -->
        <?php include("menuheader.php"); ?>
        <!-- End Header -->

        <!-- Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- Left Aside -->
            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <?php include("mainmenu.php"); ?>
            <!-- End Left Aside -->

            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">

                    <!-- Widgets/Stats -->
                    <div class="m-portlet">
                        <div class="m-portlet__body m-portlet__body--no-padding">
                            <div class="row m-row--no-padding m-row--col-separator-xl">

                                <!-- Students -->
                                <div class="col-md-12 col-lg-6 col-xl-3">
                                    <div class="m-widget24">
                                        <div class="m-widget24__item">
                                            <h4 class="m-widget24__title">Students</h4><br>
                                            <span class="m-widget24__desc">Total Students</span>
                                            <span class="m-widget24__stats m--font-brand"><?php countStudent(); ?></span>
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
                                            <span class="m-widget24__stats m--font-info"><?php countAdministration(); ?></span>
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
                                            <span class="m-widget24__stats m--font-danger"><?php countAcademic(); ?></span>
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

                    <!-- Student List Section -->
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Asasi Student List</h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <select id="semesterSelect" class="form-control">
                                    <option value="">Select Semester</option>
                                    <?php
                                    $semQuery = mysqli_query($connection, "SELECT kod_sem FROM semesters ORDER BY kod_sem ASC");
                                    while ($s = mysqli_fetch_array($semQuery)) {
                                        echo '<option value="'.$s['kod_sem'].'">'.$s['kod_sem'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="m-portlet__body">

                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Semester</th>
                                        <th>Gender</th>
                                        <th>Prog Code</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Activity Marks</th>
                                    </tr>
                                </thead>
                                <tbody id="studentTableBody">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include("footer.php"); ?>
        <!-- End Footer -->

    </div>

    <!-- Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>

<script>
let dataTable = null;

function initializeTable() {
    if ($.fn.DataTable.isDataTable('#m_table_1')) {
        $('#m_table_1').DataTable().destroy();
    }

    dataTable = $('#m_table_1').DataTable({
        pageLength: 50,
        scrollX: true
    });
}

$(document).ready(function() {
    // Initialize DataTable on page load (even if empty)
    initializeTable();
    
    $('#semesterSelect')
        .select2({
            placeholder: "Select Semester",
            allowClear: true,
            width: '200px'
        })
        .on('change', function() {
            loadSemester(this.value);
        });
});

// Load students for selected semester
function loadSemester(sem) {
    if (sem === "") {
        // Clear table body
        $('#studentTableBody').html("");
        // Destroy existing DataTable
        if ($.fn.DataTable.isDataTable('#m_table_1')) {
            $('#m_table_1').DataTable().destroy();
        }
        dataTable = null;
        // Reinitialize empty table to show search box
        initializeTable();
        return;
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                // Destroy existing DataTable completely
                if ($.fn.DataTable.isDataTable('#m_table_1')) {
                    $('#m_table_1').DataTable().destroy();
                }
                dataTable = null;
                
                // Clear and set the new HTML content
                $('#studentTableBody').html(this.responseText);

                // Reinitialize DataTable with new data
                initializeTable();
            } else {
                alert('Error loading data. Please try again.');
            }
        }
    };

    xmlhttp.onerror = function() {
        alert('Network error. Please check your connection and try again.');
    };

    xmlhttp.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>?ajax_sem=" + sem + "&t=" + new Date().getTime(), true);
    xmlhttp.send();
}

    </script>

</body>
</html>