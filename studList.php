<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//legends
//roleid 1 = Moderator
//roleid 2 = IT Administrator
//roleid 3 = Super Administrator
$allowedroles = array(1,2,3); //roles allowed to access this page
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

$sid = $_GET["club_id"];
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Student's Club List</title>
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

					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">

					<div class="col-lg-12">
            <?php
						$sql_events2 = mysqli_query($connection, "select * from club where club_id='$sid' ") or die (mysqli_error());
						while ($row = mysqli_fetch_array($sql_events2)) {

							$club_id = $row["club_id"];
							$club_name = $row["club_name"];
							$club_max = $row["club_max"];
							$club_stat = $row["club_stat"];
							$club_obj = $row["club_obj"];

								}
							?>

						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											<?php echo $club_name ?>
										</h3>
									</div>
								</div>

							</div>

					<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<span class="m-section__sub">
                      <b>Advisor(s) </b><br>
                      <?php senaraiPenasihat($club_id) ?>
				</div>


						<!-- tables stops here -->

						<!--End::Section-->
					</div>
					<!--End::Row-->
				</div>
				</div>
			</div>
		</div>

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
        List of Registered Students
      </h3>
    </div>

  </div>

</div>
<div class="m-portlet__body">
  <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
    <thead>
      <tr>
        <th>No</th>
        <th>Student No</th>
        <th>Name</th>
        <th>Program</th>

        <th>Email</th>
        <th>Phone Number</th>
        <th>Total Marks</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_events = mysqli_query($connection, "select * from club,club_registration,student where  club.club_id=club_registration.club_id and student.stdNo=club_registration.stdNo and club_registration.club_id='$sid' ") or die (mysqli_error());
      $z =1;

      while ($row = mysqli_fetch_array($sql_events)) {
        $reg_id = $row["reg_id"];
        $club_id = $row["club_id"];
        $club_name = $row["club_name"];
        $stdName = $row["stdName"];
        $stdNo = $row["stdNo"];
        $progCode = $row["progCode"];
        $noPhone = $row["noPhone"];
        $email = $row["email"];

      ?>
      <tr>
        <th scope="row"><?php echo $z ?></th>

        <td><?php echo $stdNo ?></td>
        <td><?php echo $stdName ?></td>
        <td><?php echo $progCode ?></td>

        <td><?php echo $email ?></td>
        <td><?php echo $noPhone ?></td>
        <td><?php echo sumMarks($stdNo) ?></td>

      </tr>
      <?php
      $z++;
    }
    ?>


    </tbody>
  </table>

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
    <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

  <script>
  $(document).ready( function () {
  $('#m_table_1').DataTable();
    } );
  </script>

	</body>
	<!-- end::Body -->
</html>
