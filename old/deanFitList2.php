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
			UniLEAD | DVC Fit List
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
								<h3 class="m-subheader__title ">
									Dean Fit List
								(Phase III)</h3>
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
											Candidate List (Suitable)
										</h3>
									</div>
								</div>
							</div>
							
							<div class="m-portlet__body">	
								<div class="m-section__content">
								<table class="table">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Profile</th>
									  <th>Uni </th>
									  <th>Age</th>
									  <th>Origin</th>
									  <th align="center">Average Competency Variance</th>
									  <th align="center">Lowest Gap Competency</th>
									  <th>Succession Status</th>
									  <th>Overall Report</th>
									</tr>
								  </thead>
								  <tbody>

		 						<?	  
								$sql_events = mysqli_query($connection, "select * from profile, ipta, cfa where  ncpl2=3 and cfa.user_id=profile.user_id and  profile.ipta_id=ipta.ipta_id and JF02 like 'S%' and phase=3 ") or die (mysqli_error());
								$z =1;

								$date_today =date('Y-m-d');
								while ($row = mysqli_fetch_array($sql_events)) {

									$user_id = $row["user_id"];
									$name = $row["name"];
									$cposition = $row["cposition"];
									$ipta_a = $row["ipta_a"];
									$origin = $row["origin"];
									$age = $row["age"];
									$b2 = $row["b2"];
									$c2 = $row["c2"];
									$z1 = $row["z1"];
									$JF02 = $row["JF02"];

									?>
									<tr>
									  <th scope="row"><? echo $z ?></th>
									  <td><? echo $name ?></td>
									  <td><? echo $ipta_a ?></td>
									  <td><? echo $age ?></td>
									  <td align="center"><? echo $origin ?></td>
									  <td align="center"><? echo $c2 ?></td>
									  <td align="center"><? echo $z1 ?></td>
									  <td align="center"><? echo $JF02 ?></td>
									  <td align="center"><a href="resultVC.php?user_id=<? echo $user_id ?>"><i class="fa fa-print" /></td>
									</tr>
									<?
										$z++; }
									?>
								  </tbody>
								</table>
								</div>
							 </div>
						 </div>
						
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Candidate List (Developable)
										</h3>
									</div>
								</div>
							</div>
							
							<div class="m-portlet__body">	
								<div class="m-section__content">
								<table class="table">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Profile</th>
									  <th>Uni </th>
									  <th>Age</th>
									  <th>Origin</th>
									  <th align="center">Average Competency Variance</th>
									  <th align="center">Lowest Gap Competency</th>
									  <th>Succession Status</th>
									  <th>Overall Report</th>
									</tr>
								  </thead>
								  <tbody>

		 						<?	  
								$sql_events = mysqli_query($connection, "select * from profile, ipta, cfa where  ncpl2=3 and cfa.user_id=profile.user_id and  profile.ipta_id=ipta.ipta_id and JF02 like 'D%' and phase=3") or die (mysqli_error());
								$z =1;

								$date_today =date('Y-m-d');
								while ($row = mysqli_fetch_array($sql_events)) {

									$user_id = $row["user_id"];
									$name = $row["name"];
									$cposition = $row["cposition"];
									$ipta_a = $row["ipta_a"];
									$origin = $row["origin"];
									$age = $row["age"];
									$b2 = $row["b2"];
									$c2 = $row["c2"];
									$z1 = $row["z1"];
									$JF02 = $row["JF02"];

									?>
									<tr>
									  <th scope="row"><? echo $z ?></th>
									  <td><? echo $name ?></td>
									  <td><? echo $ipta_a ?></td>
									  <td><? echo $age ?></td>
									  <td align="center"><? echo $origin ?></td>
									  <td align="center"><? echo $c2 ?></td>
									  <td align="center"><? echo $z1 ?></td>
									  <td align="center"><? echo $JF02 ?></td>
									  <td align="center"><a href="resultVC.php?user_id=<? echo $user_id ?>"><i class="fa fa-print" /></td>
									</tr>
									<?
										$z++; }
									?>
								  </tbody>
								</table>
								</div>
							 </div>
						 </div>		
						
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Candidate List (Reviewable)
										</h3>
									</div>
								</div>
							</div>
							
							<div class="m-portlet__body">	
								<div class="m-section__content">
								<table class="table">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Profile</th>
									  <th>Uni </th>
									  <th>Age</th>
									  <th>Origin</th>
									  <th align="center">Average Competency Variance</th>
									  <th align="center">Lowest Gap Competency</th>
									  <th>Succession Status</th>
									  <th>Overall Report</th>
									</tr>
								  </thead>
								  <tbody>

		 						<?	  
								$sql_events = mysqli_query($connection, "select * from profile, ipta, cfa where  ncpl2=3 and cfa.user_id=profile.user_id and  profile.ipta_id=ipta.ipta_id and JF02 like 'R%' and phase=3 ") or die (mysqli_error());
								$z =1;

								$date_today =date('Y-m-d');
								while ($row = mysqli_fetch_array($sql_events)) {

									$user_id = $row["user_id"];
									$name = $row["name"];
									$cposition = $row["cposition"];
									$ipta_a = $row["ipta_a"];
									$origin = $row["origin"];
									$age = $row["age"];
									$b2 = $row["b2"];
									$c2 = $row["c2"];
									$z1 = $row["z1"];
									$JF02 = $row["JF02"];

									?>
									<tr>
									  <th scope="row"><? echo $z ?></th>
									  <td><? echo $name ?></td>
									  <td><? echo $ipta_a ?></td>
									  <td><? echo $age ?></td>
									  <td align="center"><? echo $origin ?></td>
									  <td align="center"><? echo $c2 ?></td>
									  <td align="center"><? echo $z1 ?></td>
									  <td align="center"><? echo $JF02 ?></td>
									  <td align="center"><a href="resultVC.php?user_id=<? echo $user_id ?>"><i class="fa fa-print" /></td>
									</tr>
									<?
										$z++; }
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
		<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
			<div class="m-quick-sidebar__content m--hide">
				<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
					<i class="la la-close"></i>
				</span>
				<ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">
							Messages
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" 		data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">
							Settings
						</a>
					</li>
					<li class="nav-item m-tabs__item">
						<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">
							Logs
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
						<div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
							<div class="m-messenger__messages">
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="assets/app/media/img//users/user3.jpg" alt=""/>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Hi Bob. What time will be the meeting ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Hi Megan. It's at 2.30PM
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="assets/app/media/img//users/user3.jpg" alt=""/>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Will the development team be joining ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Yes sure. I invited them as well
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__datetime">
									2:30PM
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="assets/app/media/img//users/user3.jpg"  alt=""/>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Noted. For the Coca-Cola Mobile App project as well ?
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Yes, sure.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Please also prepare the quotation for the Loop CRM project as well.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__datetime">
									3:15PM
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-no-pic m--bg-fill-danger">
											<span>
												M
											</span>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Noted. I will prepare it.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--out">
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-text">
													Thanks Megan. I will see you later.
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="m-messenger__wrapper">
									<div class="m-messenger__message m-messenger__message--in">
										<div class="m-messenger__message-pic">
											<img src="assets/app/media/img//users/user3.jpg"  alt=""/>
										</div>
										<div class="m-messenger__message-body">
											<div class="m-messenger__message-arrow"></div>
											<div class="m-messenger__message-content">
												<div class="m-messenger__message-username">
													Megan wrote
												</div>
												<div class="m-messenger__message-text">
													Sure. See you in the meeting soon.
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="m-messenger__seperator"></div>
							<div class="m-messenger__form">
								<div class="m-messenger__form-controls">
									<input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
								</div>
								<div class="m-messenger__form-tools">
									<a href="" class="m-messenger__form-attachment">
										<i class="la la-paperclip"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_settings" role="tabpanel">
						<div class="m-list-settings">
							<div class="m-list-settings__group">
								<div class="m-list-settings__heading">
									General Settings
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Email Notifications
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Site Tracking
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										SMS Alerts
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Storage
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
							</div>
							<div class="m-list-settings__group">
								<div class="m-list-settings__heading">
									System Settings
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										System Logs
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Error Reporting
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Applications Logs
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Servers
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
								<div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
									<span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">
						<div class="m-list-timeline">
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									System Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											12 new users registered
											<span class="m-badge m-badge--warning m-badge--wide">
												important
											</span>
										</a>
										<span class="m-list-timeline__time">
											Just now
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											System shutdown
										</a>
										<span class="m-list-timeline__time">
											11 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">
											New invoice received
										</a>
										<span class="m-list-timeline__time">
											20 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">
											Database overloaded 89%
											<span class="m-badge m-badge--success m-badge--wide">
												resolved
											</span>
										</a>
										<span class="m-list-timeline__time">
											1 hr
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											System error
										</a>
										<span class="m-list-timeline__time">
											2 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											Production server down
											<span class="m-badge m-badge--danger m-badge--wide">
												pending
											</span>
										</a>
										<span class="m-list-timeline__time">
											3 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											Production server up
										</a>
										<span class="m-list-timeline__time">
											5 hrs
										</span>
									</div>
								</div>
							</div>
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									Applications Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											New order received
											<span class="m-badge m-badge--info m-badge--wide">
												urgent
											</span>
										</a>
										<span class="m-list-timeline__time">
											7 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											12 new users registered
										</a>
										<span class="m-list-timeline__time">
											Just now
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											System shutdown
										</a>
										<span class="m-list-timeline__time">
											11 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">
											New invoices received
										</a>
										<span class="m-list-timeline__time">
											20 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">
											Database overloaded 89%
										</a>
										<span class="m-list-timeline__time">
											1 hr
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											System error
											<span class="m-badge m-badge--info m-badge--wide">
												pending
											</span>
										</a>
										<span class="m-list-timeline__time">
											2 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											Production server down
										</a>
										<span class="m-list-timeline__time">
											3 hrs
										</span>
									</div>
								</div>
							</div>
							<div class="m-list-timeline__group">
								<div class="m-list-timeline__heading">
									Server Logs
								</div>
								<div class="m-list-timeline__items">
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											Production server up
										</a>
										<span class="m-list-timeline__time">
											5 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											New order received
										</a>
										<span class="m-list-timeline__time">
											7 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											12 new users registered
										</a>
										<span class="m-list-timeline__time">
											Just now
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											System shutdown
										</a>
										<span class="m-list-timeline__time">
											11 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
										<a href="" class="m-list-timeline__text">
											New invoice received
										</a>
										<span class="m-list-timeline__time">
											20 mins
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
										<a href="" class="m-list-timeline__text">
											Database overloaded 89%
										</a>
										<span class="m-list-timeline__time">
											1 hr
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											System error
										</a>
										<span class="m-list-timeline__time">
											2 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											Production server down
										</a>
										<span class="m-list-timeline__time">
											3 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
										<a href="" class="m-list-timeline__text">
											Production server up
										</a>
										<span class="m-list-timeline__time">
											5 hrs
										</span>
									</div>
									<div class="m-list-timeline__item">
										<span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
										<a href="" class="m-list-timeline__text">
											New order received
										</a>
										<span class="m-list-timeline__time">
											1117 hrs
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
