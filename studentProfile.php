<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");
$vid = $_POST['stdVi'];
?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Student's Platform</title>
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
								<h3 class="m-subheader__title ">Student's Profile</h3>
							</div>
							<div>

							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">

						<div class="col-lg-6">
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Student Details (<?php echo $vid ?>) </h3>
									</div>
								</div>
							</div>

							<div class="m-portlet__body">

								<?php

								$sql_events1 = mysqli_query($connection, "select * from student where stdNo='$vid' ");
								while ($row = mysqli_fetch_array($sql_events1)) {


									$stdNo = $row['stdNo'];
									$stdName = $row['stdName'];
									$progCode = $row['progCode'];
									$progName = $row['progName'];
									$noIc = $row['noIc'];
									$noPhone = $row['noPhone'];
									$email = $row['email'];


									?>

									<div class="m-section__content">
											<div class="m-portlet__body">
												<div class="form-group m-form__group">
													<label for="Username">Student Name</label>
													<input type="text" class="form-control m-input m-input--solid" name="fName" id="fName" aria-describedby="fName" value="<?php echo $stdName ?>" readonly>
													<span class="m-form__help"></span>
												</div>

												<div class="form-group m-form__group">
													<label for="Name">IC Number</label>
													<input type="text" class="form-control m-input m-input--solid" name="fNoic" id="fNoic" aria-describedby="fNoic" value="<?php echo $noIc ?>" readonly>
													<span class="m-form__help"></span>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Course Code</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" value="<?php echo $progCode ?>" readonly>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Email</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" value="<?php echo $email ?>" readonly>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Phone Number</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" value="<?php echo $noPhone ?>" readonly>
												</div>


											</div>
										</div>

										<div class="m-separator m-separator--dashed m-separator--lg"></div>


							 </div>
							 <?php
						 		}
							 ?>
						 </div>

					  </div>
					<div class="col-lg-6">
						<div class="m-portlet m--bg-brand m-portlet--bordered-semi m-portlet--skin-dark ">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Club Registered  :  <?php echo checkCocoReg($vid) ?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--skin-dark ">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Overall Marks  :  <?php echo sumMarks($vid) ?></h3>
									</div>
								</div>
							</div>
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
				Asasi Activities Joined
			</h3>
		</div>
	</div>
</div>
<div class="m-portlet__body">
		<table class="table m-table m-table--head-bg-primary">
		<thead>
			<tr>
				<th>No</th>
				<th>Programme</th>
				<th>Organized By</th>
				<th>Joined As</th>
				<th>Marks</th>

			</tr>
		</thead>
		<tbody>
			<?php
			$sql_events = mysqli_query($connection, "select * from student,dept,dept_activities,dactreg where student.stdNo=dactreg.stdNo and dept.dept_id=dept_activities.dept_id and dept_activities.dact_id=dactreg.dact_id and dactreg.stdNo='$vid'");
			$z =1;

			while ($row = mysqli_fetch_array($sql_events)) {
				$stdNo = $row["stdNo"];
				$dactreg_id = $row["dactreg_id"];
				$stdName = $row["stdName"];
				$dact_id = $row["dact_id"];
				$dact_name = $row["dact_name"];
				$dept_name = $row["dept_name"];
				$progCode = $row["progCode"];
				$regpoint = $row["regpoint"];

				if($regpoint=='a')
				{
					$regs = "Audience";
				}
				else if($regpoint=='p')
				{
					$regs = "Participant";
				}
				else if($regpoint=='c')
				{
					$regs = "Committee";
				}

			?>
			<tr>
				<th scope="row"><?php echo $z ?></th>

				<td><?php echo $dact_name ?></td>
				<th><?php echo $dept_name ?></th>
				<td><?php echo $regs ?></td>
				<td><?php echo checkMarksD($dactreg_id) ?></td>

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
		        Clubs Comittee
		      </h3>
		    </div>
		  </div>
		</div>
		<div class="m-portlet__body">
		  	<table class="table m-table m-table--head-bg-primary">
		    <thead>
		      <tr>
		        <th>No</th>
		        <th>Comittee</th>
		        <th>Marks</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      $sql_events = mysqli_query($connection, " select * from student, regcom, com_marks where student.stdNo=regcom.stdNo and com_marks.com_id=regcom.com_id and regcom.stdNo='$vid' ");
		      $z =1;

		      while ($row = mysqli_fetch_array($sql_events)) {
		        $stdNo = $row["stdNo"];
		        $regcom_id = $row["regcom_id"];
		        $com_name = $row["com_name"];
		        $com_marks = $row["com_marks"];

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
		<!--end::Portlet-->
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
        Clubs Activities Joined
      </h3>
    </div>
  </div>
</div>
<div class="m-portlet__body">
  	<table class="table m-table m-table--head-bg-primary">
    <thead>
      <tr>
        <th>No</th>
        <th>Programme</th>
				<th>Organized By</th>
				<th>Joined As</th>
        <th>Marks</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_events = mysqli_query($connection, "select * from student,club,club_activities,actreg where student.stdNo=actreg.stdNo and club.club_id=club_activities.club_id and club_activities.act_id=actreg.act_id and actreg.stdNo='$vid' ");
      $z =1;

      while ($row = mysqli_fetch_array($sql_events)) {
        $stdNo = $row["stdNo"];
        $actreg_id = $row["actreg_id"];
        $stdName = $row["stdName"];
        $act_id = $row["act_id"];
        $act_name = $row["act_name"];
				$club_name = $row["club_name"];
        $progCode = $row["progCode"];
        $regpoint = $row["regpoint"];

        if($regpoint=='a')
        {
          $regs = "Audience";
        }
        else if($regpoint=='p')
        {
          $regs = "Participant";
        }
        else if($regpoint=='c')
        {
          $regs = "Committee";
        }

      ?>
      <tr>
        <th scope="row"><?php echo $z ?></th>
        <td><?php echo $act_name ?></td>
        <td><?php echo $club_name ?></td>
				  <td><?php echo $regs ?></td>
        <td><?php echo checkMarks($actreg_id) ?></td>

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
								2019 - 2020 &copy; AsidApps by <a href="https://asasi.uitm.edu.my" class="m-link">
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

	</body>
	<!-- end::Body -->
</html>
