<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

//$dact_ida = $_GET["dact_id"];
$dact_ida = filter_input(INPUT_GET, "dact_id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


// Validate token exists
if (!$dact_ida) {
    die("Invalid activity token");
}

$sql_events = mysqli_query($connection, "SELECT da.*, d.dept_name, k.kew_name 
                                       FROM dept_activities da 
                                       JOIN dept d ON da.dept_id = d.dept_id 
                                       LEFT JOIN kew k ON da.kew_id = k.kew_id 
                                       WHERE da.token = '$dact_ida'") or die(mysqli_error($connection));

if (mysqli_num_rows($sql_events) > 0) {
    $row = mysqli_fetch_array($sql_events);
    
    $dact_id = $row["dact_id"];
    $dept_id = $row["dept_id"];
    $dact_name = $row["dact_name"];
    $date_s = date_create($row["date_start"]);
    $date_e = date_create($row["date_end"]);
    $total_pax = $row["total_pax"];
    $dept_stat = $row["dept_stat"];
    $budget = $row["budget"];
    $location = $row["location"];
    $dept_allow = $row["dept_allow"];
    $level_id = $row["level_id"];
    $kew_idd = $row["kew_id"];
    $token = $row["token"];
} else {
    die("Activity not found!");
}

?>




<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Edit Department Activity</title>
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
								<h3 class="m-subheader__title ">Edit Activity / Event </h3>
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
											Event Details
										</h3>
									</div>
								</div>
							</div>

					<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<span class="m-section__sub">
					<form action="updateActivityDept.php" method="post">
						
						<div class="form-group m-form__group">
							<label for="Name"><b>Activity Name</b></label>
							<input type="text" class="form-control m-input m-input--solid" name="dact_name" id="dact_name" aria-describedby="dact_name" placeholder="Name of the event" value="<?php echo $dact_name ?>" >
							<span class="m-form__help"></span>
						</div>

						<div class="form-group m-form__group">
						    <label for="Name"><b>Date Start</b></label>
						    <div class="input-group date" data-z-index="1100">
						        <input type="text"  name="date_start"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" data-date-format="yyyy-m-d H:i:s"  value="<?php echo date_format($date_s, 'Y-m-d H:i'); ?>"/>
						        <div class="input-group-append">
						        	<span class="input-group-text">
						            	<i class="la la-calendar-check-o glyphicon-th"></i>
						        	</span>
						    	</div>
							</div>
						</div>

						<div class="form-group m-form__group">
							<label for="Name"><b>Date End</b></label>
							<div class="input-group date" data-z-index="1100">
								<input type="text"  name="date_end"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" data-date-format="yyyy-m-d H:i:s"  value="<?php echo date_format($date_e, 'Y-m-d H:i'); ?>"/>
								<div class="input-group-append">
									<span class="input-group-text">
										<i class="la la-calendar-check-o glyphicon-th"></i>
									</span>
								</div>
							</div>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Location</b></label>
							 <input type="text" class="form-control m-input m-input--solid" name="location" id="location" aria-describedby="location" placeholder="Location" value="<?php echo $location ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Expected Audience</b></label>
							 <input type="number" class="form-control m-input m-input--solid" name="total_pax" id="total_pax" aria-describedby="total_pax" placeholder="Total Audience" value="<?php echo $total_pax ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Budget (RM)</b></label>
							 <input type="number" step="0.01" class="form-control m-input m-input--solid" name="budget" id="budget" aria-describedby="location" placeholder="Location" value="<?php echo $budget ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group">
							<label for="Name"><b>Budget From</b></label>
							<select class="custom-select form-control" name="kew_id">
								<option selected>Select source of funding</option>
								<?php
								$sql_events1 = mysqli_query($connection, "SELECT * FROM kew ORDER BY kew_name") or die(mysqli_error($connection));
                                while ($row = mysqli_fetch_array($sql_events1)) {
                                    $kew_id = $row['kew_id'];
                                    $kew_name = $row['kew_name'];
                                    $selected = ($kew_id == $kew_idd) ? 'selected' : '';
								?>
								<option value="<?php echo $kew_id; ?>" <?php echo $selected; ?>>
                                    <?php echo htmlspecialchars($kew_name); ?>
								<?php
								}
								?>
							</select>
						</div>
						 <br>
						 <div class="form-group">
							 <label for="Name"><b>Activity / Event Level</b></label>
							 <div class="m-radio-inline">
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="1" <?php if($level_id=="1") echo " checked " ?> /> International
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="2" <?php if($level_id=="2") echo " checked " ?> /> National
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="3" <?php if($level_id=="3") echo " checked " ?> /> State
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="4" <?php if($level_id=="4") echo " checked " ?> /> District
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="5" <?php if($level_id=="5") echo " checked " ?> /> University
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="6" <?php if($level_id=="6") echo " checked " ?> /> Campus
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="7" <?php if($level_id=="7") echo " checked " ?> /> Mentor / Mentee
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="8" <?php if($level_id=="8") echo " checked " ?> /> College
									 <span></span>
								 </label>
								 <label class="m-radio">
									<input type="radio" name="level_id" value="9" <?php if($level_id=="9") echo " checked " ?> /> MDS
									<span></span>
								</label>
								<label class="m-radio">
									<input type="radio" name="level_id" value="10" <?php if($level_id=="10") echo " checked " ?> /> Bicara Interaktif Siswa
									<span></span>
								</label>
							 </div>
						 </div>
						<br>
					<div class="form-group">
					<label for="Name"><b>Allow others (than your dept members) to Register?</b></label>
					<div class="m-radio-inline">
	 						<label class="m-radio">
	 							<input type="radio" name="dept_allow" value="y" <?php if($dept_allow=="y") echo " checked " ?> /> Yes
	 							<span></span>
	 						</label>
	 						<label class="m-radio">
	 							<input type="radio" name="dept_allow" value="n" <?php if($dept_allow=="n") echo " checked " ?> /> No
	 							<span></span>
	 						</label>
	 				</div>
					</div>
					
					
					<input type="hidden" id="dact_id" name="dact_id" value="<?php echo htmlspecialchars($dact_id); ?>">
                    <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($token); ?>">

					<div class="m-portlet__foot " align="center">
						<input type="hidden" id="stdNo" name="stdNo" value="<?php echo $vid ?>">
						<div class="m-form__actions">
							<a href="mydeptActivities.php" class="btn btn-secondary">Reset </a>
							<button type="submit" class="btn btn-warning">Update Activity</button>
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
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>


	</body>
	<!-- end::Body -->
</html>
