<?php

session_start(); 
include ("dbconnect.php");

?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			UniLEAD | Assessment Status
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
				<? include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">UniLEAD Assessment Status</h3>
							</div>
							<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
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
													Candidate Profiled
												</h4>
												<br>
												<span class="m-widget24__desc">
													Total Profiled
												</span>
												<span class="m-widget24__stats m--font-brand">
													302
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													78%
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
													VC-Fit List</h4>
												<br>
												<span class="m-widget24__desc">
													Total Selected
												</span>
												<span class="m-widget24__stats m--font-info">
													26
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													84%
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
													Deputy VC-Fit List</h4>
												<br>
												<span class="m-widget24__desc">
													Total Selected</span>
												<span class="m-widget24__stats m--font-danger">
													102
												</span>
												<div class="m--space-10"></div>
												<div class="progress m-progress--sm">
													<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												<span class="m-widget24__change">
													Change
												</span>
												<span class="m-widget24__number">
													69%
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
													Dean-Fit List
												</h4>
												<br>
												<span class="m-widget24__desc">
													Total Selected
												</span>
												<span class="m-widget24__stats m--font-success">
													0
												</span>
											<div class="m--space-10"></div>
											  <span class="m-widget24__change">
												  Change
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
						
						
						<!-- end section -->
		
						
						<!-- tables starts here -->
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Candidate Details</h3>
									</div>
								</div>
							</div>
							
							<div class="m-portlet__body">	
								<div class="m-section__content">
								<table class="table">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Candidate</th>
                              <th>Current Post </th>
							  <th>Target Post </th>
                              <th>1.1</th>
							  <th>1.2</th>
							  <th>1.3</th>
							  <th>2.1</th>
							  <th>2.2</th>
							  <th>2.3</th>
							  <th>3.1</th>
							  <th>3.2</th>
							  <th>3.3</th>
							  <th>4.1</th>
							  <th>4.2</th>
							  <th>4.3</th>
							  <th>5.1</th>
							  <th>5.2</th>
							  <th>5.3</th>
							  <th>Edit Target</th>
							  <th><div align="center">Action</div></th>
						    </tr>
                          </thead>
                          <tbody>
                            
                            <?
								$sql_events = mysqli_query($connection, "select * from training,profile,ipta,tblSecurity,regprog,finalmark where finalmark.user_id=regprog.user_id and  regprog.user_id=profile.user_id and tblSecurity.id=regprog.ass_id and training.prog_id=regprog.prog_id and ipta.ipta_id=profile.ipta_id and cf='5'") or die (mysql_error());
								$z =1;

								$date_today =date('Y-m-d');
								while ($row = mysqli_fetch_array($sql_events)) {

									$cf = $row["cf"];
									$user_id = $row["user_id"];
									$prog_date = $row["prog_date"];
									$prog_name = $row["prog_name"];
									$firstName = $row["firstName"];
									$name = $row["name"];
									$curr = $row["curr"];
									$tar = $row["tar"];
									$ipta_a = $row["ipta_a"];
									
									$a12 = $row["a12"];
									$a22 = $row["a22"];
									$a32 = $row["a32"];
									
									$b12 = $row["b12"];
									$b22 = $row["b22"];
									$b32 = $row["b32"];
									
									$c12 = $row["c12"];
									$c22 = $row["c22"];
									$c32 = $row["c32"];
									
									$d12 = $row["d12"];
									$d22 = $row["d22"];
									$d32 = $row["d32"];
									
									$e12 = $row["e12"];
									$e22 = $row["e22"];
									$e32 = $row["e32"];
									
									if ($cf=='0')
									{
										$stat = "Invitation Send";
									}
									else if ($cf =='1')
									{
										$stat = "Confirm";
									}
									else if ($cf =='2')
									{
										$stat = "Rejected";
									}
									else if ($cf =='3')
									{
										$stat = "BEI Received";
									}
									else if ($cf =='4')
									{
										$stat = "Submitted for final Review";
									}
									else if ($cf =='5')
									{
										$stat = "Completed";
									}

								?>
								<tr>
                              <th scope="row"><? echo $z ?></th>
                              <td><? echo $name ?></td>
                              <td><? echo $curr ?></td>
							  <td><? echo $tar ?></td>
							  <td><? echo $a12 ?></td>
							  <td><? echo $a22 ?></td>
							  <td><? echo $a32 ?></td>
							  <td><? echo $b12 ?></td>
							  <td><? echo $b22 ?></td>
							  <td><? echo $b32 ?></td>
							  <td><? echo $c12 ?></td>
							  <td><? echo $c22 ?></td>
							  <td><? echo $c32 ?></td>
							  <td><? echo $d12 ?></td>
							  <td><? echo $d22 ?></td>
							  <td><? echo $d32 ?></td>
							  <td><? echo $e12 ?></td>
							  <td><? echo $e22 ?></td>
							  <td><? echo $e32 ?></td>
									<td>
									   
							   <a href="updateCandidate.php?user_id=<? echo $user_id ?>" class="btn btn-warning m-btn btn-sm 	m-btn m-btn--icon">
								  <span>
									  <i class="fa flaticon-edit-1"></i>
									  <span>Edit</span>
								  </span>
								</a>
									</td>
							  <td>
							    
							   <a href="calcRes.php?user_id=<? echo $user_id ?>" target="_blank" class="btn btn-success m-btn btn-sm 	m-btn m-btn--icon">
								  <span>
									  <i class="fa flaticon-edit-1"></i>
									  <span>BEI Result</span>
								  </span>
								</a>
								  
								</td>
									
							  
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
				</div>
			</div>
			<!-- end:: Body -->
<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2018 &copy; AKEPT. UniLEAD Management Sytem by <a href="#" class="m-link">
									Matiin Education Services Sdn Bhd
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
