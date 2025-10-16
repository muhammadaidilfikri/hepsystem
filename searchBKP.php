<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>



<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			AsidApps | Dashboard
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
				<!-- Start : Left Aside -->

				<? include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->

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
                          Students
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Students
                        </span>
                        <span class="m-widget24__stats m--font-brand">
                          <? countStudent();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          0%
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
                          Administration</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff
                        </span>
                        <span class="m-widget24__stats m--font-info">
                          <? countAdministration();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          3%
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
                          Academicians</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff</span>
                        <span class="m-widget24__stats m--font-danger">
                          <? countAcademic();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          0%
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
                          Concessioner
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff
                        </span>
                        <span class="m-widget24__stats m--font-success">
                          0
                        </span>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-success" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
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
          </div>

          <div class="m-content">
						<!--Begin::Section-->
						<!--begin:: Widgets/Stats-->

						<!-- tables starts here -->

						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Search Student</h3>
									</div>
								</div>
							</div>

							<div class="m-portlet__body">
								<div class="m-section__content">

									<form class="m-form m-form--state m-form--fit m-form--label-align-right" action="t3.php" method="post" id="searchBKP">
										<div class="m-portlet__body">
										<div class="m-form__section m-form__section--first">
											<div class="form-group m-form__group row">
												<input type="text" class="form-control m-input m-input--solid" name="stdNo" id="stdNo" aria-describedby="fName" placeholder="Please enter student no" autofocus>
												<span class="m-form__help"></span>
											</div>
	                     </div><!--end of section one -->
										</div>


										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions">
												<button type="submit" class="btn btn-accent">Search</button>
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

		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
    	<!--begin::Base Scripts -->
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="assets/vendors/custom/flot/flot.bundle.js" type="text/javascript"></script>
	  <script src="assets/app/js/dashboard.js" type="text/javascript"></script>

		<script>
		 $('#calendar').fullCalendar({

			  eventSources: [

				{
				  url: 'calHea.php',
				  className:'m-fc-event--light m-fc-event--solid-warning'
				},
        {
				  url: 'calCuti.php',
				  className:'m-fc-event--light m-fc-event--solid-success'
				},
        {
				  url: 'calExam.php',
				  className:'m-fc-event--light m-fc-event--solid-danger'
				},



			  ]


			});
		</script>
	</body>
	<!-- end::Body -->
</html>
