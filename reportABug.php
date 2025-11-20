<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>CRS | Report A Bug</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: { "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
            active: function () {
                sessionStorage.fonts = true;
            }
<<<<<<< HEAD
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
								<h3 class="m-subheader__title ">User Reporting Form</h3>
							</div>
							<div>
=======
        });
    </script>
    <!--end::Web font -->
>>>>>>> b666f8971a55824b894a49de9dcd86aeaec4d614

    <!--begin::Base Styles -->
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- 
       m-content--skin-light2 m-header--fixed m-header--fixed-mobile 
       m-aside-left--enabled m-aside-left--skin-dark 
       m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        <?php include("menuheader.php") ?>
        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid 
                    m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>

            <?php include("mainmenu.php") ?>
            <!-- END: Left Aside -->

            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <div class="m-content">

                    <!--Begin::Section-->
                    <div class="m-portlet">

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Help! I found a bug. Please let us know your problem, we will attend it as soon as humanly possible.
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">
                            <div class="m-section__content">

                                <form class="m-form m-form--state m-form--fit m-form--label-align-right"
                                      action="bugCheck.php" method="post" id="bugForm">

                                    <div class="m-portlet__body">
                                        <div class="m-form__section m-form__section--first">

                                            <div class="form-group m-form__group row">
                                                <label for="Menu">Menu</label>
                                                <input type="text"
                                                       class="form-control m-input m-input--solid"
                                                       name="bugMenu" id="bugMenu"
                                                       placeholder="Specify which menu/section/division that you found the problem">
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="Detail">Details</label>
                                                <textarea class="form-control m-input"
                                                          id="bugdetail" name="bugdetail"
                                                          rows="5"
                                                          placeholder="Put your comments here..."></textarea>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <button type="submit" class="btn btn-accent">Send</button>
                                            <button type="button" onclick="window.location.href='main.php'"
                                                    class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>

                                </form>

<<<<<<< HEAD
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
=======
                            </div>
                        </div>

                    </div>
                    <!--End::Section-->
>>>>>>> b666f8971a55824b894a49de9dcd86aeaec4d614

                </div>
            </div>

        </div>
        <!-- end:: Body -->

        <!-- begin::Footer -->
        <footer class="m-grid__item m-footer">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">

                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">

                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            2019 &copy; AsidApps by 
                            <a href="https://asasi.uitm.edu.my" class="m-link">
                                Centre of Foundation Studies, UiTM
                            </a>
                        </span>
                    </div>

                    <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                        <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">

                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">About</span>
                                </a>
                            </li>

                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">Privacy</span>
                                </a>
                            </li>

                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">T&C</span>
                                </a>
                            </li>

                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="m-tooltip"
                                   title="Support Center" data-placement="left">
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

    <!-- Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="assets/vendors/custom/flot/flot.bundle.js" type="text/javascript"></script>
    <script src="assets/app/js/dashboard.js" type="text/javascript"></script>
    <script src="assets/demo/default/custom/components/charts/flotcharts.js" type="text/javascript"></script>
    <script src="assets/demo/default/custom/components/charts/morris-charts.js" type="text/javascript"></script>
    <script src="assets/demo/default/custom/crud/forms/validation/form-controls.js" type="text/javascript"></script>

</body>
</html>