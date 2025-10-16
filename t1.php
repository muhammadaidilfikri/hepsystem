<?php
session_start();
include ("dbconnect.php");
$vid = $_GET['vid'];
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
								<h3 class="m-subheader__title ">Student Financial Aid Application </h3>
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
										<h3 class="m-portlet__head-text">Student Details (<? echo $vid ?>) </h3>
									</div>
								</div>
							</div>

							<div class="m-portlet__body">

								<?

								$sql_events1 = mysqli_query($connection, "select * from student,bkp where bkp.stdNo=student.stdNo and bkp.stdNo='$vid' ") or die (mysqli_error());
								while ($row = mysqli_fetch_array($sql_events1)) {


									$stdNo = $row['stdNo'];
									$stdName = $row['stdName'];
									$progCode = $row['progCode'];
									$progName = $row['progName'];
									$noIc = $row['noIc'];
									$noPhone = $row['noPhone'];
									$email = $row['email'];
									$bkp_stat = $row['bkp_stat'];
									$bkp1 = $row['bkp1'];
									$bkp2 = $row['bkp2'];
									$fName = $row['fName'];
									$fNoic = $row['fNoic'];
									$fPosition = $row['fPost'];
									$fEmployee = $row['fEmployee'];
									$fSalary = $row['fSalary'];

									$mName = $row['mName'];
									$mNoic = $row['mNoic'];
									$mPosition = $row['mPost'];
									$mEmployee = $row['mEmployee'];
									$mSalary = $row['mSalary'];
									$totSal = $row['totSal'];

									?>

									<div class="m-section__content">
											<div class="m-portlet__body">
												<div class="form-group m-form__group">
													<label for="Username">Student Name</label>
													<input type="text" class="form-control m-input m-input--solid" name="fName" id="fName" aria-describedby="fName" placeholder="<? echo $stdName ?>" readonly>
													<span class="m-form__help"></span>
												</div>

												<div class="form-group m-form__group">
													<label for="Name">IC Number</label>
													<input type="text" class="form-control m-input m-input--solid" name="fNoic" id="fNoic" aria-describedby="fNoic" placeholder="<? echo $noIc ?>" readonly>
													<span class="m-form__help"></span>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Course Code | Name</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" placeholder="<? echo $progCode ?> (<? echo $progName ?>)" readonly>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Email</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" placeholder="<? echo $email ?>" readonly>
												</div>

												<div class="form-group m-form__group">
													<label for="Position">Phone Number</label>
													<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" placeholder="<? echo $noPhone ?>" readonly>
												</div>


											</div>
										</div>

										<div class="m-separator m-separator--dashed m-separator--lg"></div>

								<div class="m-section__content">
										<div class="m-portlet__body">
											<div class="form-group m-form__group">
												<label for="Username">Father / Guardian</label>
												<input type="text" class="form-control m-input m-input--solid" name="fName" id="fName" aria-describedby="fName" placeholder="<? echo $fName ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Name">IC Number</label>
												<input type="text" class="form-control m-input m-input--solid" name="fNoic" id="fNoic" aria-describedby="fNoic" placeholder="<? echo $fNoic ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Position">Designation</label>
												<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" placeholder="<? echo $fPosition ?>" readonly>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Employee</label>
												<input type="text" class="form-control m-input m-input--solid" name="fEmployee" id="fEmployee" aria-describedby="fEmployee" placeholder="<? echo $fEmployee ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Gross Income</label>
												<input type="text" class="form-control m-input m-input--solid" name="fSalary" id="fSalary" aria-describedby="fSalary" placeholder="<? echo $fSalary ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="m-separator m-separator--dashed m-separator--lg"></div>

											<div class="form-group m-form__group">
												<label for="Username">Mother / Guardian</label>
												<input type="text" class="form-control m-input m-input--solid" name="mName" id="mName" aria-describedby="mName" placeholder="<? echo $mName ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Name">IC Number</label>
												<input type="text" class="form-control m-input m-input--solid" name="mNoic" id="mNoic" aria-describedby="mNoic" placeholder="<? echo $mNoic ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Position">Designation</label>
												<input type="text" class="form-control m-input m-input--solid" name="mPosition" id="mPosition" aria-describedby="mPosition" placeholder="<? echo $mPosition ?>" readonly>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Employee</label>
												<input type="text" class="form-control m-input m-input--solid" name="mEmployee" id="mEmployee" aria-describedby="mEmployee" placeholder="<? echo $mEmployee ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Salary">Gross Income</label>
												<input type="text" class="form-control m-input m-input--solid" name="mSalary" id="mSalary" aria-describedby="mSalary" placeholder="<? echo $mSalary ?>" readonly>
												<span class="m-form__help"></span>
											</div>

										</div>
									<!-- end of content -->
								</div>
							 </div>
							 <?
						 		}
							 ?>
						 </div>

					  </div>


					<div class="col-lg-6">

						<div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark ">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">Total Gross Income : RM <? echo round($totSal,2) ?></h3>
									</div>
								</div>
							</div>
						</div>

						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											Update Status
										</h3>
									</div>
								</div>
							</div>

					<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<span class="m-section__sub">
					<form action="t2.php" method="post">

						<table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
							<thead>
								<tr>
									<th> 1. Document Submissions (Father / Guardian)</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
											<input type="radio" name="bkp1" value='0'<?php if($bkp1=="0") echo " checked " ?>/> No Documents Submitted
											<span></span>
										</label>
									</td>
								</tr>

								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
											<input type="radio" name="bkp1" value='1'<?php if($bkp1=="1") echo " checked " ?>/> Penyata pendapatan/gaji [bagi ibu <b>DAN</b> bapa/ penjaga yang bekerja]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
										<input type="radio" name="bkp1" value='2'<?php if($bkp1=="2") echo " checked " ?>/> Penyata pencen [bagi ibu <b>DAN</b> bapa/penjaga yang telah bersara]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
												<input type="radio" name="bkp1" value='3'<?php if($bkp1=="3") echo " checked " ?>/> Borang Cukai Pendapatan dari Lembaga Hasil Dalam Negeri [bagi ibu <b>DAN</b> bapa/penjaga yang mempunyai perniagaan]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
										<input type="radio" name="bkp1" value='4'<?php if($bkp1=="4") echo " checked " ?>/> Tidak Bekerja/Tiada Penyata Pendapatan/Gaji [Surat Akuan Sumpah/ Surat Pengesahan Tidak Bekerja/ Surat Pengesahan Pendapatan]
										<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
												<input type="radio" name="bkp1" value='5'<?php if($bkp1=="5") echo " checked " ?>/> Dokumen sokongan yang berkaitan [Surat Pencen, Sijil Kematian/Sijil Cerai, sijil anak angkat dan lain-lain]
											<span></span>
										</label>
									</td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
							<thead>
								<tr>
									<th> 2. Document Submissions (Mother / Guardian)</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
											<input type="radio" name="bkp2" value='0'<?php if($bkp2=="0") echo " checked " ?>/> No Documents Submitted
											<span></span>
										</label>
									</td>
								</tr>

								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
											<input type="radio" name="bkp2" value='1'<?php if($bkp2=="1") echo " checked " ?>/> Penyata pendapatan/gaji [bagi ibu <b>DAN</b> bapa/ penjaga yang bekerja]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
										<input type="radio" name="bkp2" value='2'<?php if($bkp2=="2") echo " checked " ?>/> Penyata pencen [bagi ibu <b>DAN</b> bapa/penjaga yang telah bersara]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
												<input type="radio" name="bkp2" value='3'<?php if($bkp2=="3") echo " checked " ?>/> Borang Cukai Pendapatan dari Lembaga Hasil Dalam Negeri [bagi ibu <b>DAN</b> bapa/penjaga yang mempunyai perniagaan]
											<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
										<input type="radio" name="bkp2" value='4'<?php if($bkp2=="4") echo " checked " ?>/> Tidak Bekerja/Tiada Penyata Pendapatan/Gaji [Surat Akuan Sumpah/ Surat Pengesahan Tidak Bekerja/ Surat Pengesahan Pendapatan]
										<span></span>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class="m-radio m-radio--solid m-radio--success">
												<input type="radio" name="bkp2" value='5'<?php if($bkp2=="5") echo " checked " ?>/> Dokumen sokongan yang berkaitan [Surat Pencen, Sijil Kematian/Sijil Cerai, sijil anak angkat dan lain-lain]
											<span></span>
										</label>
									</td>
								</tr>
							</tbody>
						</table>


						<div class="form-group m-form__group">
							<label for="Name"><b>3. Actual Gross Income (RM)</b></label>
							<input type="text" class="form-control m-input m-input--solid" name="tSalary" id="tSalary" aria-describedby="tSalary" value="<? echo $totSal ?>">
							<span class="m-form__help"></span>
						</div>
						<label for="Name"><b>4. Action</b></label>
						<div class="m-form__group form-group" align="center">
						<label class="m-radio m-radio--solid m-radio--warning">
								<input type="radio" name="bkp_stat" value='p'<?php if($bkp_stat=="p") echo " checked " ?>/> Pending
								<span></span>
						</label>

						<label class="m-radio m-radio--solid m-radio--warning">
								<input type="radio" name="bkp_stat" value='i'<?php if($bkp_stat=="i") echo " checked " ?>/> Incomplete
							<span></span>
						</label>

						<label class="m-radio m-radio--solid m-radio--danger">
								<input type="radio" name="bkp_stat" value='x'<?php if($bkp_stat=="x") echo " checked " ?>/>Rejected
							<span></span>
						</label>
						<label class="m-radio m-radio--solid m-radio--success">
								<input type="radio" name="bkp_stat" value='a'<?php if($bkp_stat=="a") echo " checked " ?>/> Approve
							<span></span>
						</label>
					</div>

					<div class="form-group m-form__group">
							<label for="comment">Remark</label>
							<textarea  rows="8"  class="form-control m-input m-input--solid" name="comment" id="comment" aria-describedby="comment" ></textarea>
							<span class="m-form__help"></span>
						</div>

					<div class="m-portlet__foot m-portlet__foot--fit" align="center">
						<input type="hidden" id="stdNo" name="stdNo" value="<? echo $vid ?>">
						<div class="m-form__actions">
							<a href="bkpForm.php" class="btn btn-secondary">Reset </a>
							<button type="submit" class="btn btn-success">Update Application</button>
						</div>
					</div>
				</form>

					<div class="m-separator m-separator--dashed m-separator--lg"></div>
					<label for="Audit_Trails"><b>Audit Trails</b></label>

					<div class="m-section">
						<div class="m-section__content">
							<table class="table table-bordered m-table m-table--border-warning m-table--head-bg-warning">
								<thead>
									<tr>
										<th>No</th>
										<th>Status</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?
									$sql_events = mysqli_query($connection, "select * from student, bkp_log where student.stdNo=bkp_log.stdNo and bkp_log.stdNo='$stdNo' ") or die (mysqli_error());
									$z =1;

									while ($row = mysqli_fetch_array($sql_events)) {

										$stdNo = $row["stdNo"];
										$totSal = $row["totSal"];
										$stdName = $row["stdName"];
										$bkp_stat = $row["bkp_stat"];
										$timestamp = $row["timestamp"];
										$tcomment = $row["tcomment"];
										$loggedby = $row["loggedBy"];

										if($bkp_stat=='p')
										{
											$stat = "Pending";
										}
										else if($bkp_stat=='i')
										{
											$stat = "Incomplete";
										}
										else if($bkp_stat=='x')
										{
											$stat = "Rejected";
										}
										else if($bkp_stat=='a')
										{
											$stat = "Approved.";
										}
										else {
												$stat = " ";
										}

										$date = new DateTime("@$timestamp");

									?>
									<tr>
										<th scope="row"><? echo $z ?></th>
										<td><? echo $stat ?></td>
										<td><? echo $tcomment ?> <br> <small> updated by <? echo $loggedby ?> on : (<? echo $date->format('Y-m-d H:i:s'); ?>)</small></td>
									</tr>
									<?
									$z++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>

				</div>


						<!-- tables stops here -->

						<!--End::Section-->
					</div>
					<!--End::Row-->
				</div>
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
								2019 &copy; AsidApps by <a href="https://asasi.uitm.edu.my" class="m-link">
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
