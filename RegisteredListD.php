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

// Get token from URL
$token = isset($_GET["dact_id"]) ? $_GET["dact_id"] : "";
$resultSearch = isset($_GET["resultSearch"]) ? $_GET["resultSearch"] : "";
$regError = isset($_GET["regError"]) ? $_GET["regError"] : "";

// Get the actual dact_id using the token
$actual_dact_id = "";
if (!empty($token)) {
    $sql_events2 = mysqli_query($connection, "SELECT dact_id FROM dept_activities WHERE token='$token'") or die(mysqli_error($connection));
    if ($row = mysqli_fetch_array($sql_events2)) {
        $actual_dact_id = $row["dact_id"];
    }
}

// Now use $actual_dact_id in your query instead of $sid
?>

<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
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
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
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

					<!-- END: Subheader -->
					<div class="m-content">
            <?php if ($regError==0)
            {

            }
            else if ($regError==1)
            {
              ?>
              <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"> <?php echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
            else if ($regError==2)
            {
              ?>
              <div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"> <?php echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
            else {

            }
            ?>

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
        <th>Student ID</th>
        <th>Name</th>
        <th>Programme</th>
        <th>Activities</th>
        <th>Marks</th>

      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($actual_dact_id)) {
          $sql_events = mysqli_query($connection, "SELECT student.stdNo, student.stdName, student.progCode, dactreg.dactreg_id, dactreg.regpoint, dept_activities.dact_name, dept.dept_name 
                                                   FROM student 
                                                   JOIN dactreg ON student.stdNo = dactreg.stdNo 
                                                   JOIN dept_activities ON dept_activities.dact_id = dactreg.dact_id 
                                                   JOIN dept ON dept.dept_id = dept_activities.dept_id 
                                                   WHERE dept_activities.dact_id = '$actual_dact_id' 
                                                   ORDER BY dactreg.regpoint desc, student.stdName") or die (mysqli_error($connection));
          $z =1;

          if (mysqli_num_rows($sql_events) > 0) {
              while ($row = mysqli_fetch_array($sql_events)) {
                $stdNo = $row["stdNo"];
                $dactreg_id = $row["dactreg_id"];
                $stdName = $row["stdName"];
                $dact_name = $row["dact_name"];
                $progCode = $row["progCode"];
                $regpoint = $row["regpoint"];

                if($regpoint=='a')
                {
                  $regs = "Audience";
                }
                else if($regpoint=='p')
                {
                  $regs = "Contestant";
                }
                else if($regpoint=='c')
                {
                  $regs = "Committee";
                }
                else {
                  $regs = "Unknown";
                }

              ?>
              <tr>
                <th scope="row"><?php echo $z ?></th>
                <td><?php echo htmlspecialchars($stdNo) ?></td>
                <td><?php echo htmlspecialchars($stdName) ?></td>
                <td><?php echo htmlspecialchars($progCode) ?></td>
                <td><?php echo $regs ?></td>
                <td><?php echo checkMarksD($dactreg_id) ?></td>
              </tr>
              <?php
              $z++;
              }
          } else {
              echo '<tr><td colspan="6" class="text-center">No students registered for this activity yet.</td></tr>';
          }
      } else {
          echo '<tr><td colspan="6" class="text-center">Invalid activity token or activity not found.</td></tr>';
      }
      ?>


    </tbody>
  </table>
  <div class="button-container" style="text-align: center;">
                                    <br><button type="button" onclick="window.history.back()" class="btn btn-information" style="margin-right: 10px; display: inline-block;">
                                        Back
                                    </button>
                                </div>

</div>
</div>
<!--end::Portlet-->
</div>
</div>

      <!-- end of calendar -->

      <!-- start of widget -->

      <!-- end of widget -- >

      <!--End::Section-->
    </div>

		</div>
	</div>
			<!-- end:: Body -->
<!-- begin::Footer -->
		  <?php include("footer.php"); ?>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    		        <!-- begin::Quick Sidebar -->

		<!-- end::Quick Sidebar -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->		    <!-- begin::Quick Nav -->

		<!-- begin::Quick Nav -->
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
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

	</body>
	<!-- end::Body -->
</html>