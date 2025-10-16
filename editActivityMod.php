<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

$act_ida = $_GET["act_id"];
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Edit Club Activity</title>
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
					<form action="updateActivityMod.php" method="post">
						<?

						$sql_events = mysqli_query($connection, "select * from club,club_advisor,club_activities,kew where kew.kew_id=club_activities.kew_id and club.club_id=club_activities.club_id and  club.club_id=club_advisor.club_id  and club_activities.act_id='$act_ida'") or die (mysqli_error());
						while ($row = mysqli_fetch_array($sql_events)) {

							$act_id = $row["act_id"];
							$club_id = $row["club_id"];
							$act_name = $row["act_name"];
							$date_s = date_create($row["date_start"]);
							$date_e = date_create($row["date_end"]);
							$total_pax = $row["total_pax"];
							$club_stat = $row["club_stat"];
							$budget = $row["budget"];
							$location = $row["location"];
							$act_allow = $row["act_allow"];
							$level_id = $row["level_id"];
							$kew_idd = $row["kew_id"];

								}


						?>

						<div class="form-group m-form__group">
							<label for="Name"><b>Activity Name</b></label>
							<input type="text" class="form-control m-input m-input--solid" name="act_name" id="act_name" aria-describedby="act_name" placeholder="Name of the event" value="<? echo $act_name ?>" >
							<span class="m-form__help"></span>
						</div>

						<div class="form-group m-form__group">
						                <label for="Name"><b>Date Start</b></label>
						                    <div class="input-group date" data-z-index="1100">
						                      <input type="text"  name="date_start"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" data-date-format="yyyy-m-d H:i:s"  value="<? echo date_format($date_s, 'Y-m-d H:i'); ?>"/>
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
																									<input type="text"  name="date_end"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" data-date-format="yyyy-m-d H:i:s"  value="<? echo date_format($date_e, 'Y-m-d H:i'); ?>"/>
																									<div class="input-group-append">
																										<span class="input-group-text">
																											<i class="la la-calendar-check-o glyphicon-th"></i>
																										</span>
																									</div>
																								</div>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Location</b></label>
							 <input type="text" class="form-control m-input m-input--solid" name="location" id="location" aria-describedby="location" placeholder="Location" value="<? echo $location ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Expected Audience</b></label>
							 <input type="number" class="form-control m-input m-input--solid" name="total_pax" id="total_pax" aria-describedby="total_pax" placeholder="Total Audience" value="<? echo $total_pax ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group m-form__group">
							 <label for="Name"><b>Budget (RM)</b></label>
							 <input type="number" step="0.01" class="form-control m-input m-input--solid" name="budget" id="budget" aria-describedby="location" placeholder="Location" value="<? echo $budget ?>" >
							 <span class="m-form__help"></span>
						 </div>
						 <div class="form-group">
							 <label for="Name"><b>Budget From</b></label>

								 <select class="custom-select form-control" name="kew_id">
									 <option selected>Select Budget From</option>
									 <?
									 $sql_events1 = mysqli_query($connection, "select * from kew order by kew_name ") or die (mysqli_error());
									 while ($row = mysqli_fetch_array($sql_events1)) {


										 $kew_id = $row['kew_id'];
										 $kew_name = $row['kew_name'];
									 ?>
									 <option value="<? echo $kew_id ?>" <? if($kew_id==$kew_idd) echo selected ?> > <? echo $kew_name ?></option>
									 <?
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
									 <input type="radio" name="level_id" value="7" <?php if($level_id=="7") echo " checked " ?> /> Club
									 <span></span>
								 </label>
								 <label class="m-radio">
									 <input type="radio" name="level_id" value="8" <?php if($level_id=="8") echo " checked " ?> /> College
									 <span></span>
								 </label>
							 </div>
						 </div>
						<br>
					<div class="form-group">
					<label for="Name"><b>Allow others (than your club members) to Register?</b></label>
					<div class="m-radio-inline">
	 						<label class="m-radio">
	 							<input type="radio" name="act_allow" value="y" <?php if($act_allow=="y") echo " checked " ?> /> Yes
	 							<span></span>
	 						</label>
	 						<label class="m-radio">
	 							<input type="radio" name="act_allow" value="n" <?php if($act_allow=="n") echo " checked " ?> /> No
	 							<span></span>
	 						</label>
	 				</div>
					</div>

					<br>
					<div class="form-group">
					<label for="Name"><b>Activity Status</b></label>
					<div class="m-radio-inline">
							<label class="m-radio">
								<input type="radio" name="club_stat" value="p" <?php if($club_stat=="p") echo " checked " ?> /> Pending Approval
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="club_stat" value="a" <?php if($club_stat=="a") echo " checked " ?> /> Approved
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="club_stat" value="r" <?php if($club_stat=="r") echo " checked " ?> /> Rejected
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="club_stat" value="x" <?php if($club_stat=="x") echo " checked " ?> /> Postponed
								<span></span>
							</label>
					</div>
					</div>

					<input type="hidden" id="act_id" name="act_id" value="<? echo $act_ida ?>">

					<div class="m-portlet__foot " align="center">
						<input type="hidden" id="stdNo" name="stdNo" value="<? echo $vid ?>">
						<div class="m-form__actions">
							<a href="clubActivities.php" class="btn btn-secondary">Reset </a>
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
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>


	</body>
	<!-- end::Body -->
</html>
