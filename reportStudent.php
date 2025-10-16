<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

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
			CRS | Asasi Student Report
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
        <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
        <style>
        /* Donut charts get built from Pie charts but with a fundamentally difference in the drawing approach. The donut is drawn using arc strokes for maximum freedom in styling */
.ct-series-a .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #8E44AD;

}
.ct-series-b .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #26C281;

}
.ct-series-c .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #E43A45;

}
.ct-series-d .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #F3C200;

}

        </style>

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
                          <?php countStudent();?>
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
                          <?php countAdministration();?>
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
                          <?php countAcademic();?>
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

            <!-- begin section -->
            <div align="right">
              <a href="conExcel.php" class="btn btn-outline-success m-btn m-btn--icon">
                <span>
                  <i class="fa flaticon-graphic"></i>
                  <span>Export to Excel</span>
                </span>
              </a>
            </div>
            <br>
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    Asasi Students List
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                  </li>
                </ul>
              </div>
            </div>
              <!--begin: Datatable -->
              <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>IC Number</th>
                    <th>Prog Code</th>
                    <th>Activities Joint</th>
                    <th>Activity Marks</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_events = mysqli_query($connection, "select * from student order by stdName asc") or die (mysqli_error());
                  $z =1;

                  while ($row = mysqli_fetch_array($sql_events)) {

                    $stdName = $row["stdName"];
                    $stdNo = $row["stdNo"];
                    $kod_sem = $row["kod_sem"];
                    $jantina = $row["jantina"];
                    $noic = $row["noIc"];
                    $progCode = $row["progCode"];
                    $noPhone = $row["noPhone"];
                    $email = $row["email"];
                  ?>
				
                  <tr>
                    <th scope="row"><?php echo $z ?></th>

                    <td><?php echo $stdNo ?></td>
                    <td><?php echo $stdName ?></td>
                    <td><?php echo $noic ?></td>
                    <td><?php echo $progCode ?></td>
                    <td><?php echo countStudentInvolvement($stdNo) ?></td> 
                    <td><?php echo sumMarks($stdNo) ?></td>
                  </tr>
                  <?php
                  $z++;
                }
                ?>
				   <?php
                $sql_events = mysqli_query($connection, " select * from student, regcom, com_marks where student.stdNo=regcom.stdNo and com_marks.com_id=regcom.com_id and regcom.stdNo='$ssid' ") or die (mysqli_error());
                $z =1;
                $totmarkah = 0;
                while ($row = mysqli_fetch_array($sql_events)) {
                  $stdNo = $row["stdNo"];
                  $regcom_id = $row["regcom_id"];
                  $com_name = $row["com_name"];
                  $com_marks = $row["com_marks"];
                  $totmarkah += $com_marks;

                ?>
                <tr>
                  <th scope="row"><?php echo $z ?></th>
                  <td><?php echo $com_name ?></td>
                  <td><?php echo $com_marks ?></td>
                </tr>
                <?php
                $z++;
              }
              ?>
 
                </tbody>
				
              </table>
            </div>
          </div>
            <!-- end section -->
</div>

				</div>
			</div>

      <!--begin::Add Modal-->

      <!--end::Modal-->

      <!--begin::Edit Modal-->

      <!--end::Modal-->

			<!-- end:: Body -->
    <?php include("footer.php"); ?>
		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
      <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
  		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
  		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
  		<script src="assets/app/js/dashboard.js" type="text/javascript"></script>
      <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

    <script>
    $(document).ready( function () {
    $('#m_table_1').DataTable();
      } );
    </script>

	</body>
	<!-- end::Body -->
</html>



