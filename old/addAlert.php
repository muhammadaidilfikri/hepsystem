<?php

session_start(); 
include ("dbconnect.php");
include ("addScript.php")

?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			UniLEAD | Add New Candidate
		</title>
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
								<h3 class="m-subheader__title ">Add Candidate</h3>
							</div>
							<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<!--Begin::Section-->
						<!--begin:: Widgets/Stats-->
						<div class="m-portlet ">
							<div class="m-portlet__body  m-portlet__body--no-padding">
							  <div class="row m-row--no-padding m-row--col-separator-xl">
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::Total Profit-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													System Administrator
												</h4>
												<br>
												<span class="m-widget24__desc">
													Total User
												</span>
												<span class="m-widget24__stats m--font-brand">
													302
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													78%
												</span>
											</div>
										</div>
										<!--end::Total Profit-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Feedbacks-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													AKEPT Administrator</h4>
												<br>
												<span class="m-widget24__desc">
													Total User
												</span>
												<span class="m-widget24__stats m--font-info">
													26
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													84%
												</span>
											</div>
										</div>
										<!--end::New Feedbacks-->
									</div>
									<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Orders-->
										<div class="m-widget24">
											<div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Assessors</h4>
												<br>
												<span class="m-widget24__desc">
													Total </span>
												<span class="m-widget24__stats m--font-danger">
													102
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													69%
												</span>
											</div>
										</div>
										<!--end::New Orders-->
									</div>
								<div class="col-md-12 col-lg-6 col-xl-3">
										<!--begin::New Users-->
										<div class="m-widget24">
										  <div class="m-widget24__item">
												<h4 class="m-widget24__title">
													Maatin Administrator
												</h4>
												<br>
												<span class="m-widget24__desc">
													Total 
												</span>
												<span class="m-widget24__stats m--font-success">
													0
												</span>
											<div class="m--space-10"></div>
											  <span class="m-widget24__change">
												  Change
											  </span>
											  <span class="m-widget24__number">
												  0%
											  </span>
											</div>
										</div>
										<!--end::New Users-->
								  </div>
									<div class="progress m-progress--sm">
									  <div class="progress-bar m--bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							    </div>
								</div>
							</div>
						</div>
						
						<!-- begin section -->
						
						
						<!-- end section -->
		
						
						<!-- tables starts here -->
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Add New UA Alert</h3>
									</div>
								</div>
							</div>
							
							<div class="m-portlet__body">	
								<div class="m-section__content">
							
									<!-- put your content here -->
									
									<form class="m-form m-form--fit m-form--label-align-right" action="checkAlert.php" method="post">
										<div class="m-portlet__body">
											
											<div class="form-group m-form__group">
												<label for="Name">Name</label>
												<input type="text" class="form-control m-input m-input--solid" name="name" id="name" aria-describedby="name" placeholder="Name">
												<span class="m-form__help">Full Name</span>
											</div>
											
											<div class="form-group m-form__group">
												<label for="Name">IC Number</label>
												<input type="text" class="form-control m-input m-input--solid" name="noic" id="noic" aria-describedby="noic" placeholder="000000-00-0000">
												<span class="m-form__help">Your IC Number</span>
											</div>
											
												
											
											<div class="form-group m-form__group">
												<label for="Salutation">Position</label>
												<select class="form-control m-input m-input--solid" name="post_id" id="post_id">
													<option value="0">Please Select...</option>
													<?
														
														$sql_events = mysqli_query($connection, "select * from position") or die (mysql_error());
															while ($row = mysqli_fetch_array($sql_events)) {
																$post_id = $row["post_id"];
																$position = $row["position"];
	
													?>
													<option value="<? echo $post_id ?> "><? echo $position ?> </option>
													
													<? } ?>
													
												</select>
											</div>
											
											<div class="form-group m-form__group">
												<label for="Authentication">UA</label>
												<select class="form-control m-input m-input--solid" name="ipta_id" id="ipta_id">
													<option value="">Please Select...</option>
													<?
														
														$sql_events = mysqli_query($connection, "select * from ipta") or die (mysql_error());
															while ($row = mysqli_fetch_array($sql_events)) {
																$ipta_id = $row["ipta_id"];
																$ipta = $row["ipta"];
																$ipta_a = $row["ipta_a"];
	
													?>
													<option value="<? echo $ipta_id ?> "><? echo $ipta ?>(<? echo $ipta_a ?> ) </option>
													
													<? } ?>
													
												</select>
											</div>
											
											
											
											<div class="form-group m-form__group">
												<label for="Position">Date Start</label>
												<input type="text" class="form-control m-input m-input--solid" name="date_start" id="date_start" aria-describedby="date_start" placeholder="0000-00-00 (year-month-day)">
												
											</div>
											
											<div class="form-group m-form__group">
												<label for="Position">Date End</label>
												<input type="text" class="form-control m-input m-input--solid" name="date_end" id="date_end" aria-describedby="date_start" placeholder="0000-00-00 (year-month-day)">
												
											</div>
											
											
											<div class="form-group m-form__group">
												<label for="term">TERM</label>
												<select class="form-control m-input m-input--solid" name="term" id="term">
													<option value="">Please Select...</option>
													<option value="I">I</option>
													<option value="II">II</option>
													<option value="III">III</option>
													<option value="IV">IV</option>
													<option value="V">V</option>
													
													
												</select>
												
											</div>
											
										
											
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="submit" class="btn btn-success">Submit</button>
												<button type="reset" class="btn btn-secondary">Cancel</button>
											</div>
										</div>
									</form>
									
									
									<!-- end of content -->
								</div>
							 </div>
						 </div>	
						<!-- tables stops here -->
						
						<!--End::Section-->
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
								2018 &copy; AKEPT. UniLEAD Management Sytem by <a href="#" class="m-link">
									Matiin Education Services Sdn Bhd
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
		
	</body>
	<!-- end::Body -->
</html>


