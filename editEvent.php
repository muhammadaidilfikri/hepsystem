<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

$sid = $_GET[id];
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Edit Event Calendar</title>
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
			<? include ("menuheader.php")?>
			<!-- END: Header -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<? include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">Add New Event </h3>
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
					<form action="updateEvent.php" method="post">

						<?
						$sql_events2 = mysqli_query($connection, "select * from ical, dept where id='$sid' ");
						while ($row = mysqli_fetch_array($sql_events2)) {

							$id = $row["id"];
							$dept_name = $row["dept_name"];
							$eventname = $row["eventname"];
							$date_start = $row["date_start"];
							$date_end = $row["date_end"];
							$status = $row["status"];

								}
							?>
					<input type="hidden" id="id" name="id" value="<? echo $id ?>">
						<div class="form-group m-form__group">
							<label for="Name"><b>Event Name</b></label>
								<div class="col-lg-9 col-md-9 col-sm-12">
							<input type="text" class="form-control m-input m-input--solid" name="eventname" id="fileNum" aria-describedby="fileNum" placeholder="Name of the event" value="<? echo $eventname ?>">
							<span class="m-form__help"></span>
						</div>
						</div>

						<div class="form-group m-form__group">
								<label for="Name"><b>Date Start</b></label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="input-group date">
									<input type="text" name="date_start" class="form-control m-input" readonly placeholder="Select date" id="m_datepicker_2" data-date-format="yyyy-m-d"  value="<? echo $date_start?>" />
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar-check-o"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group m-form__group">
								<label for="Name"><b>Date End</b></label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="input-group date">
									<input type="text" name="date_end" class="form-control m-input" readonly placeholder="Select date" id="m_datepicker_2"  data-date-format="yyyy-m-d" value="<? echo $date_end?>" />
									<div class="input-group-append">
										<span class="input-group-text">
											<i class="la la-calendar-check-o"></i>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group1 m-form__group">
						<label for="Name"><b>Organized By / Holidays</b></label>
							<div class="col-lg-4 col-md-9 col-sm-12">
							<select class="custom-select form-control" name="dept">
								<option selected>Select Organizer / Holidays</option>
								<?
								$sql_events1 = mysqli_query($connection, "select * from dept ");
								while ($row = mysqli_fetch_array($sql_events1)) {

									$dept_id = $row['dept_id'];
									$dept_name = $row['dept_name'];
								?>
								<option value="<? echo $dept_id ?> "> <? echo $dept_name ?></option>
								<?
									}
								?>
							</select>
						</div>
					</div>
						<br>
					<div class="form-group1 m-form__group">
					<label for="Name"><b>Status</b></label>
						<div class="col-lg-4 col-md-9 col-sm-12">
						<select class="custom-select form-control" name="statz" >
							<option selected>Select...</option>
							<option value="a">Active</option>
							<option value="d">Draft</option>
							<option value="p">Postponed</option>
						</select>
					</div>
				</div>


				<br><br>
					<div class="m-portlet__foot " align="center">
						<input type="hidden" id="stdNo" name="stdNo" value="<? echo $vid ?>">
						<div class="m-form__actions">

							<button type="submit" class="btn btn-warning">Update Event</button> <a class="btn btn-danger" href="delEvent.php?id=<? echo $id ?>" role="button">Delete Parmenantly </a>
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
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; AsidApps by <a href="https://asasi.uitm.edu.my" class="m-link">
									Centre of Foundation Studies, UiTM
								</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											About
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#"  class="m-nav__link">
										<span class="m-nav__link-text">
											Privacy
										</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="#" class="m-nav__link">
										<span class="m-nav__link-text">
											T&C
										</span>
									</a>
								</li>

								<li class="m-nav__item m-nav__item">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
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
