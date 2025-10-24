<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//$sid = $_GET["id"];
$sid = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Edit Club</title>
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
								<h3 class="m-subheader__title "> Edit Club Details </h3>
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
					<form action="updateClub.php" method="post">

						<?php
						$sql_events2 = mysqli_query($connection, "select * from club where token='$sid' ") or die (mysqli_error());
						while ($row = mysqli_fetch_array($sql_events2)) {

							$club_id = $row["club_id"];
							$club_name = $row["club_name"];
							$club_max = $row["club_max"];
							$club_stat = $row["club_stat"];
							$club_obj = $row["club_obj"];
              				$club_ws = $row["club_ws"];
							$is_active = $row["is_active"]; 

							}
							?>

							<input type="hidden" id="club_id" name="club_id" value="<?php echo $club_id ?>">
								<div class="form-group m-form__group">
									<label for="Name"><b>Club Name</b></label>
										<div class="col-lg-9 col-md-9 col-sm-12">
									<input type="text" class="form-control m-input m-input--solid" name="club_name" id="fileNum" aria-describedby="fileNum" placeholder="Enter Club Name" value="<?php echo $club_name ?>">
									<span class="m-form__help"></span>
								</div>
								</div>

								<div class="form-group m-form__group">
									<label for="Name"><b>Club Objective</b></label>
										<div class="col-lg-9 col-md-9 col-sm-12">
									<textarea rows="10" class="form-control m-input m-input--solid" name="club_obj" id="club_obj"> <?php echo $club_obj ?> </textarea>
									<span class="m-form__help"></span>
								</div>
								</div>

								<div class="form-group m-form__group">
									<label for="Name"><b>Maximum Club Members</b></label>
										<div class="col-lg-9 col-md-9 col-sm-12">
								<input type="number" class="form-control m-input m-input--solid" name="club_max" id="club_max" aria-describedby="club_max" placeholder="Enter Maximum Club member" value="<?php echo $club_max ?>">
									<span class="m-form__help"></span>
								</div>
								</div>

								<div class="form-group m-form__group">
                  <label for="message-text"><b>Club Status</b></label>
									<div class="m-radio-inline">
                    <label class="m-radio">
                      <input type="radio" name="club_stat" value="e" <?php if($club_stat=="e") echo " checked " ?> />Enable
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="club_stat" value="d" <?php if($club_stat=="d") echo " checked " ?> />Disable
                      <span></span>
                    </label>
                  </div>
                </div>

							<div class="form-group m-form__group">
				<label for="message-text"><b>Club Active Status</b></label>
				<div class="m-radio-inline">
					<label class="m-radio">
						<input type="radio" name="is_active" value="1" <?php if($is_active=="1") echo " checked " ?> />Active
						<span></span>
					</label>
					<label class="m-radio">
						<input type="radio" name="is_active" value="0" <?php if($is_active=="0") echo " checked " ?> />Inactive
						<span></span>
					</label>
				</div>
			</div>

                <div class="form-group m-form__group">
                  <label for="Name"><b>Club  Group Whatsapp / Telegram Link</b></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                  <input type="text" class="form-control m-input m-input--solid" name="club_ws" id="club_ws" aria-describedby="club_ws" placeholder="Enter Club Group Link" value="<?php echo $club_ws ?>">
                  <span class="m-form__help"></span>
                </div>
                </div>



					<div class="m-portlet__foot " align="center">
						<div class="m-form__actions">
							<button type="submit" class="btn btn-warning">Update Club</button> 
							<a class="btn btn-metal" href="clubList.php" role="button">Cancel</a>
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
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

	</body>
	<!-- end::Body -->
</html>