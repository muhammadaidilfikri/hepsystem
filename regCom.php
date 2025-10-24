<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");


if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$resultSearch = $_GET["resultSearch"];
$regError = $_GET["regError"];


?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Activity Student's Registrations</title>
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

					<!-- END: Subheader -->
					<div class="m-content">
            <?php if ($regError==0)
            {

            }
            else if ($regError==1)
            {
              ?>
              <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"> <?echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
            else if ($regError==2)
            {
              ?>
              <div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"> <?echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
            else {

            }
            ?>
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
											 Committe Marks
										</h3>
									</div>
								</div>
							</div>

					<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<span class="m-section__sub">
					<form action="regComMarks.php" method="post">
						<div class="form-group m-form__group">
							<div>
								<input type="text" class="form-control m-input m-input--solid" name="stdNo" id="stdNo" aria-describedby="staffID" placeholder="Enter Student ID" autofocus>
									<span class="m-form__help"></span>
							</div>
						</div>
            <div class="form-group">
              <label for="Name"><b>Select Post</b></label>
                <select class="custom-select form-control" name="com_id">
                  <option value='0'>Please Select</option>
                  <?php
                  $sql_events1 = mysqli_query($connection, "select * from com_marks kew order by com_id ") or die (mysqli_error());
                  while ($row = mysqli_fetch_array($sql_events1)) {
                    $com_id = $row['com_id'];
                    $com_name = $row['com_name'];
                    $com_marks = $row['com_marks'];
                  ?>
                  <option value="<?php echo $com_id ?> "> <?php echo $com_name ?> (<?php echo $com_marks ?>)</option>
                  <?php
                    }
                  ?>
                </select>
            </div>
					<div class="m-portlet__foot " align="center">
						<div class="m-form__actions">
							<button type="submit" class="btn btn-success">Register</button>
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
        List of Students
      </h3>
    </div>
  </div>
</div>
<div class="m-portlet__body">
  <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
    <thead>
      <tr>
        <th>No</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Committe Post</th>
        <th>Marks</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_events = mysqli_query($connection, "select * from student, regcom, com_marks where student.stdNo=regcom.stdNo and com_marks.com_id=regcom.com_id order by com_marks desc") or die (mysqli_error());
      $z =1;

      while ($row = mysqli_fetch_array($sql_events)) {
        $stdNo = $row["stdNo"];
        $com_id = $row["com_id"];
        $stdName = $row["stdName"];
        $regcom_id = $row["regcom_id"];
        $com_marks = $row["com_marks"];
        $com_name = $row["com_name"];


      ?>
      <tr>
        <th scope="row"><? echo $z ?></th>

        <td><?php echo $stdNo ?></td>
        <td><?php echo $stdName ?></td>
        <td><?php echo $com_name ?></td>
        <td><?php echo $com_marks ?></td>
        <td>
          <a href="deleteRegCom.php?regcom_id=<?php echo $regcom_id ?>" class="btn btn-danger m-btn btn-sm 	m-btn m-btn--icon">
            <span>
              <i class="fa flaticon-delete"></i>
              <span>Delete</span>
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
		  <? include("footer.php"); ?>
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
