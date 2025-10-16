<?php
session_start();
include ("dbconnect.php");
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
			CRS | Dashboard
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
			<?php include ("menuheader.php")?>
			<!-- END: Header -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<!-- Start : Left Aside -->

				<?php include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->

					<!-- END: Subheader -->
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
							Asasi Calendar
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">

						</li>
						<li class="m--hide m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
	                        <a href="#" class="btn btn-focus m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
								<span>
									<i class="la la-cog"></i>
									<span>Settings</span>
								</span>
							</a>
	                        <div class="m-dropdown__wrapper">
	                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 52px;"></span>
	                            <div class="m-dropdown__inner">
	                                    <div class="m-dropdown__body">
	                                        <div class="m-dropdown__content">
	                                            <ul class="m-nav">
	                                                <li class="m-nav__section m-nav__section--first">
	                                                    <span class="m-nav__section-text">Quick Actions</span>
	                                                </li>
	                                                <li class="m-nav__item">
	                                                    <a href="" class="m-nav__link">
	                                                        <i class="m-nav__link-icon flaticon-share"></i>
	                                                        <span class="m-nav__link-text">Activity</span>
	                                                    </a>
	                                                </li>
	                                                <li class="m-nav__item">
	                                                    <a href="" class="m-nav__link">
	                                                        <i class="m-nav__link-icon flaticon-chat-1"></i>
	                                                        <span class="m-nav__link-text">Messages</span>
	                                                    </a>
	                                                </li>
	                                                <li class="m-nav__item">
	                                                    <a href="" class="m-nav__link">
	                                                        <i class="m-nav__link-icon flaticon-info"></i>
	                                                        <span class="m-nav__link-text">FAQ</span>
	                                                    </a>
	                                                </li>
	                                                <li class="m-nav__item">
	                                                    <a href="" class="m-nav__link">
	                                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
	                                                        <span class="m-nav__link-text">Support</span>
	                                                    </a>
	                                                </li>
	                                                <li class="m-nav__separator m-nav__separator--fit">
	                                                </li>
	                                                <li class="m-nav__item">
	                                                    <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                            </div>
	                        </div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div id="calendar"></div>
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

		<script>
		 $('#calendar').fullCalendar({
       header:{left:"prev,next today",center:"title",right:"month,agendaWeek,agendaDay,listWeek"},editable:!0,eventLimit:!0,navLinks:!0,


			  eventSources: [

				{
				  url: 'calHea.php',
				  className:'m-fc-event--dark m-fc-event--solid-primary'
				},
        {
        	url: 'calHep.php',
        	className:'m-fc-event--light m-fc-event--solid-warning'
        },
        {
				  url: 'calCuti.php',
				  className:'m-fc-event--light m-fc-event--solid-danger'
				},

        {
				  url: 'calPA.php',
				  className:'m-fc-event--light m-fc-event--solid-success'
},

{
  url: 'calKolej.php',
  className:'m-fc-event--light m-fc-event--solid-primary'
},

			  ]


			});
		</script>

		<script src="assets/vendors/custom/flot/flot.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
        <!--begin::Page Snippets -->
	    <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
        <!--begin::Page Resources -->
	<!--begin::Page Resources -->

	<!-- <script src="assets/demo/default/custom/components/charts/flotcharts.js" type="text/javascript"></script> --!>

		<script src="assets/demo/default/custom/components/charts/morris-charts.js" type="text/javascript"></script>
		<!--end::Page Resources -->

	</body>
	<!-- end::Body -->
</html>
