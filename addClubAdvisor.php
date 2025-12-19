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

//$sid = $_GET["club_id"];
$sid = filter_input(INPUT_GET, 'club_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Add Club Advisor</title>
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
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">Add New Club Advisor</h3>
							</div>
							<div>

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
					<form action="addAdvisor.php" method="post">

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
							}	
							?>

							<input type="hidden" id="club_id" name="club_id" value="<?php echo $club_id ?>">
							<h3><?php echo $club_name ?></h3>


								<div class="form-group m-form__group">
									<label for="Name"><b>Add Advisor</b></label>
										<div class="col-lg-9 col-md-9 col-sm-12">
								<input type="text" class="form-control m-input m-input--solid" name="staffID" id="staffID" aria-describedby="staffID" placeholder="Enter Staff ID">
									<span class="m-form__help"></span>
								</div>
								</div>


					<div class="m-portlet__foot " align="center">
						<div class="m-form__actions">
							<button type="submit" class="btn btn-success">Add Advisor</button>
						</div>
					</div>
				</form>
				</div>


						<!-- tables stops here -->

						<!--End::Section-->
					</div>
					<!--End::Row-->
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
        List of Advisor(s)
      </h3>
    </div>
  </div>
</div>
<div class="m-portlet__body">
  <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
    <thead>
      <tr>
        <th>No</th>
        <th>staff ID</th>
        <th>Staff Name</th>
        <th>Position</th>
        <th>Advisor Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
			<?php
			// Select the numeric is_active value explicitly to avoid alias/name collisions
			$sql_events = mysqli_query($connection, "SELECT c.*, ca.*, a.*, j.*, ca.is_active AS is_active_numeric FROM club c, club_advisor ca, acstaff a, jawatanhakiki j WHERE j.jh_code = a.jh_code AND a.staffID = ca.staffID AND c.club_id = ca.club_id AND c.token = '$sid'");
			$z = 1;

			while ($row = mysqli_fetch_array($sql_events)) {
				$ad_id = $row["ad_id"];
				$club_id = $row["club_id"];
				$club_name = $row["club_name"];
				$name = $row["nama"];
				$staffID = $row["staffID"];
				$gred_code = $row["jawatanhakiki"];
				$club_stat = $row["club_stat"];
				// Use the numeric value for logic, cast to int to be explicit
				$is_active = isset($row["is_active_numeric"]) ? (int)$row["is_active_numeric"] : 0;

				if ($club_stat == 'e') {
					$c_stat = "Enable";
				} else if ($club_stat == 'd') {
					$c_stat = "Disable";
				}
			?>
      <tr>
        <th scope="row"><?php echo $z ?></th>
        <td><?php echo $staffID ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $gred_code ?></td>
				<td><?php echo ($is_active === 1) ? '<span class="m-badge m-badge--success m-badge--wide">YES</span>' : '<span class="m-badge m-badge--danger m-badge--wide">NO</span>'; ?></td>

				<td>
					<?php if ($is_active === 0): ?>
						<!-- Activate Button (shown when advisor is inactive) -->
						<a href="activateAdvisor.php?ad_id=<?php echo $ad_id ?>&club_id=<?php echo $club_id ?>" 
							 class="btn btn-success m-btn btn-sm m-btn--icon"
							 onclick="return confirm('Are you sure you want to activate this advisor?')">
							<span>
								<i class="fa flaticon-interface-11"></i>
								<span>Activate</span>
							</span>
						</a>
					<?php else: ?>
						<!-- Deactivate Button (shown when advisor is active) -->
						<a href="deleteAdvisor.php?ad_id=<?php echo $ad_id ?>&club_id=<?php echo $club_id ?>" 
							 class="btn btn-warning m-btn btn-sm m-btn--icon"
							 onclick="return confirm('Are you sure you want to deactivate this advisor?')">
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
      ?>
    </tbody>
  </table>
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
