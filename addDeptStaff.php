<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$sid = $_GET["dept_id"];
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Add Department Staff</title>
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
								<h3 class="m-subheader__title ">Add New Department / Unit Staff</h3>
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
											Department Details
										</h3>
									</div>
								</div>
							</div>

					<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<span class="m-section__sub">
					<form action="addDStaff.php" method="post">

						<?php
						$sql_events2 = mysqli_query($connection, "select * from dept where dept_id='$sid' ") or die (mysqli_error());
						while ($row = mysqli_fetch_array($sql_events2)) {

							$dept_id = $row["dept_id"];
							$dept_name = $row["dept_name"];

								}
							?>

							<input type="hidden" id="dept_id" name="dept_id" value="<?php echo $dept_id ?>">
							<h3><? echo $dept_name ?></h3>


								<div class="form-group m-form__group">
										<div class="col-lg-9 col-md-9 col-sm-12">
								<input type="text" class="form-control m-input m-input--solid" name="staffID" id="staffID" aria-describedby="staffID" placeholder="Enter Staff ID">
									<span class="m-form__help"></span>
								</div>
								</div>


					<div class="m-portlet__foot " align="center">
						<div class="m-form__actions">
							<button type="submit" class="btn btn-success">Add Staff</button>
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
        List of Department / Unit Staff(s)
      </h3>
    </div>
  </div>
</div>
<div class="m-portlet__body">
  <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
    <thead>
      <tr>
        <th>No</th>
        <th>staff ID</th>
        <th>Staff Name</th>
        <th>Position</th>
        <th>dept Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_events = mysqli_query($connection, "select * from dept,dept_advisor,acstaff,jawatanhakiki where jawatanhakiki.jh_code=acstaff.jh_code and acstaff.staffID=dept_advisor.staffID and dept.dept_id=dept_advisor.dept_id  and dept_advisor.dept_id='$sid'  ") or die (mysqli_error());
      $z =1;

      while ($row = mysqli_fetch_array($sql_events)) {
        $dad_id = $row["dad_id"];
        $dept_id = $row["dept_id"];
        $dept_name = $row["dept_name"];
        $name = $row["nama"];
        $staffID = $row["staffID"];
        $gred_code = $row["jawatanhakiki"];


      ?>
      <tr>
        <th scope="row"><?php echo $z ?></th>

        <td><?php echo $staffID ?></td>
        <td><?php echo $name ?></td>
        <td><?php echo $gred_code ?></td>
        <td><?php echo $dept_name ?></td>
        <td>
          <a href="deleteDStaff.php?dad_id=<?php echo $dad_id ?>" class="btn btn-danger m-btn btn-sm 	m-btn m-btn--icon">
            <span>
              <i class="fa flaticon-delete"></i>
              <span>Delete Staff</span>
            </span>
          </a>

        </td>

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

	</body>
	<!-- end::Body -->
</html>
