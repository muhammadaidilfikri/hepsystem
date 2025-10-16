<?php
session_start();
include ("dbconnect.php");

$fName = $_POST['fName'];
$fNoic = $_POST['fNoic'];
$fPosition = $_POST['fPosition'];
$fEmployee = $_POST['fEmployee'];
$fSalary = $_POST['fSalary'];

$mName = $_POST['mName'];
$mNoic = $_POST['mNoic'];
$mPosition = $_POST['mPosition'];
$mEmployee = $_POST['mEmployee'];
$mSalary = $_POST['mSalary'];

$totSal = $mSalary+$fSalary;


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
								<h3 class="m-subheader__title ">Borang Permohonan Bantuan Kewangan Asasi IPTA</h3>
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
										<h3 class="m-portlet__head-text">Maklumat Bapa / Penjaga </h3>
									</div>
								</div>
							</div>

							<div class="m-portlet__body">
								<div class="m-section__content">

									<!-- put your content here -->

										<div class="m-portlet__body">

											<div class="form-group m-form__group">
												<label for="Username">Nama</label>
												<input type="text" class="form-control m-input m-input--solid" name="fName" id="fName" aria-describedby="fName" placeholder="<? echo $fName ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Name">No Kad Pengenalan</label>
												<input type="text" class="form-control m-input m-input--solid" name="fNoic" id="fNoic" aria-describedby="fNoic" placeholder="<? echo $fNoic ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Position">Pekerjaan</label>
												<input type="text" class="form-control m-input m-input--solid" name="fPosition" id="fPosition" aria-describedby="fPosition" placeholder="<? echo $fPosition ?>" readonly>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Nama Majikan</label>
												<input type="text" class="form-control m-input m-input--solid" name="fEmployee" id="fEmployee" aria-describedby="fEmployee" placeholder="<? echo $fEmployee ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Pendapatan Kasar (Gaji+Elaun Tetap)</label>
												<input type="text" class="form-control m-input m-input--solid" name="fSalary" id="fSalary" aria-describedby="fSalary" placeholder="<? echo $fSalary ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="m-separator m-separator--dashed m-separator--lg"></div>

											<div class="form-group m-form__group">
												<label for="Username">Nama Ibu / Penjaga</label>
												<input type="text" class="form-control m-input m-input--solid" name="mName" id="mName" aria-describedby="mName" placeholder="<? echo $mName ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Name">No Kad Pengenalan</label>
												<input type="text" class="form-control m-input m-input--solid" name="mNoic" id="mNoic" aria-describedby="mNoic" placeholder="<? echo $mNoic ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Position">Pekerjaan</label>
												<input type="text" class="form-control m-input m-input--solid" name="mPosition" id="mPosition" aria-describedby="mPosition" placeholder="<? echo $mPosition ?>" readonly>
											</div>

											<div class="form-group m-form__group">
												<label for="Email">Nama Majikan</label>
												<input type="text" class="form-control m-input m-input--solid" name="mEmployee" id="mEmployee" aria-describedby="mEmployee" placeholder="<? echo $mEmployee ?>" readonly>
												<span class="m-form__help"></span>
											</div>

											<div class="form-group m-form__group">
												<label for="Salary">Pendapatan Kasar (Gaji+Elaun Tetap))</label>
												<input type="text" class="form-control m-input m-input--solid" name="mSalary" id="mSalary" aria-describedby="mSalary" placeholder="<? echo $mSalary ?>" readonly>
												<span class="m-form__help"></span>
											</div>

										</div>


									<!-- end of content -->
								</div>
							 </div>
						 </div>

					  </div>

					<div class="col-lg-6">
					<div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark ">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">Jumlah Pendapatan Kasar Keluarga : RM <? echo round($totSal,2) ?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="m-separator m-separator--dashed m-separator--lg"></div>
					<h4>Pengakuan Pemohon</h4>
					<br>
					<p> Saya dengan sesungguhnya dan sebenarnya mengaku bahawa segala maklumat yang diberikan diatas adalah benar. Saya juga faham sekiranya terdapat maklumat yang <b>tidak benar</b>, Bantuan Kewangan Asasi saya boleh ditarik balik / diberhentikan dengan serta merta</p>
					<div class="m-separator m-separator--dashed m-separator--lg"></div>
					<form action="t2.php" method="post">
						<input type="hidden" id="fName" name="fName" value="<? echo $fName ?>">
						<input type="hidden" id="fNoic" name="fNoic" value="<? echo $fNoic ?>">
						<input type="hidden" id="fPosition" name="fPosition" value="<? echo $fPosition ?>">
						<input type="hidden" id="fEmployee" name="fEmployee" value="<? echo $fEmployee ?>">
						<input type="hidden" id="fSalary" name="fSalary" value="<? echo $fSalary ?>">
						<input type="hidden" id="mName" name="mName" value="<? echo $mName ?>">
						<input type="hidden" id="mNoic" name="mNoic" value="<? echo $mNoic ?>">
						<input type="hidden" id="mPosition" name="mPosition" value="<? echo $mPosition ?>">
						<input type="hidden" id="mEmployee" name="mEmployee" value="<? echo $mEmployee ?>">
						<input type="hidden" id="mSalary" name="mSalary" value="<? echo $mSalary ?>">

					<div class="m-portlet__foot m-portlet__foot--fit" align="center">
						<div class="m-form__actions">
							<a href="bkpForm.php" class="btn btn-secondary">Isi Semula </a>
							<button type="submit" class="btn btn-success">Hantar Pemohonan</button>

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
