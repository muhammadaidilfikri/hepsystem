<?php
session_start();
include ("dbconnect.php");
$ssid = $_SESSION['username'];

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
            <div class="row">
              <div class="col-xl-12">

                <div class="m-portlet">
                  <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                      <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                          Sejarah Permohonan Bantuan IPTA
                        </h3>
                      </div>
                    </div>
                  </div>
                  <div class="m-portlet__body">

                    <!--begin::Section-->
                    <div class="m-section">
                      <div class="m-section__content">
                        <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nama</th>
                              <th>Jumlah Pendapatan (RM)</th>
                              <th>Status</th>
                                <th>Tarikh dikemaskini</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?
                            $sql_events = mysqli_query($connection, "select * from student, bkp where student.stdNo=bkp.stdNo and bkp.stdNo='$ssid' ");
                            $z =1;

                            while ($row = mysqli_fetch_array($sql_events)) {

                              $stdNo = $row["stdNo"];
                              $totSal = $row["totSal"];
                              $stdName = $row["stdName"];
                              $bkp_stat = $row["bkp_stat"];
                              $timestamp = $row["timestamp"];

                              if($bkp_stat=='p')
                              {
                                $stat = "Permohonan telah di hantar ke HEA";
                              }
                              else if($bkp_stat=='i')
                              {
                                $stat = "Dokumen tidak Lengkap";
                              }
                              else if($bkp_stat=='x')
                              {
                                $stat = "Tidak layak";
                              }
                              else if($bkp_stat=='a')
                              {
                                $stat = "Dokumen Lengkap.";
                              }
                              else {
                                  $stat = " ";
                              }

                              $date = new DateTime("@$timestamp");



                            ?>
                            <tr>
                              <th scope="row"><? echo $z ?></th>
                              <td><? echo $stdName ?></td>
                              <td><? echo $totSal ?></td>
                                <td><? echo $stat ?></td>
                              <td><? echo $date->format('Y-m-d H:i:s'); ?></td>
                            </tr>
                            <?
                            $z++;
                          }
                          ?>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <!--end::Section-->

                  </div>

                  <!--end::Form-->
                </div>

              </div>
            </div>
          </div>


				</div>
			</div>
			<!-- end:: Body -->
<!-- begin::Footer -->

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

			  eventSources: [

				{
				  url: 'alert.php',
				  className:'m-fc-event--light m-fc-event--solid-danger'


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

		<script src="assets/demo/default/custom/components/charts/flotcharts.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/components/charts/morris-charts.js" type="text/javascript"></script>
		<!--end::Page Resources -->

	</body>
	<!-- end::Body -->
</html>
