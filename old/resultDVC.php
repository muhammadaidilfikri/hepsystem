<?php

session_start(); 
include ("dbconnect.php");
include ("iqfunction.php");

$u_id = $_GET["user_id"];

?>

<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			UniLEAD | Result
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
			<header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="index.html" class="m-brand__logo-wrapper">
										<img alt="" src="images/logo_dark.png"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
					 ">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
			<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
										<a  href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-add"></i>
											<span class="m-menu__link-text">
												Actions
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-file"></i>
														<span class="m-menu__link-text">
															Create New Post
														</span>
													</a>
												</li>
												<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-diagram"></i>
														<span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Generate Reports
																</span>
																<span class="m-menu__link-badge">
																	<span class="m-badge m-badge--success">
																		2
																	</span>
																</span>
															</span>
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="javascript:;" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															Manage Orders
														</span>
							dash							<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Latest Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Pending Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Processed Orders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Delivery Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Payments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customers
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="#" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-chat-1"></i>
														<span class="m-menu__link-text">
															Customer Feedbacks
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Customer Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Supplier Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reviewed Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Resolved Feedbacks
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Feedback Reports
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-users"></i>
														<span class="m-menu__link-text">
															Register Member
														</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
										<a  href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-line-graph"></i>
											<span class="m-menu__link-text">
												Reports
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<div class="m-menu__subnav">
												<ul class="m-menu__content">
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Finance Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-map"></i>
																	<span class="m-menu__link-text">
																		Annual Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-user"></i>
																	<span class="m-menu__link-text">
																		HR Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-clipboard"></i>
																	<span class="m-menu__link-text">
																		IPO Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Finance Margins
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-2"></i>
																	<span class="m-menu__link-text">
																		Revenue Reports
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Project Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Coca Cola CRM
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Delta Airlines Booking Site
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Malibu Accounting
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Vineseed Website Rewamp
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Zircon Mobile App
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--line">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Mercury CMS
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																HR Reports
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Client Directory
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Salary Reports
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Staff Payslips
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Corporate Expenses
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Project Expenses
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Reporting Apps
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Adjusments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Sources & Mediums
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Reporting Settings
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Conversions
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Report Flows
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Audit & Logs
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
										<a  href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-paper-plane"></i>
											<span class="m-menu__link-title">
												<span class="m-menu__link-wrap">
													<span class="m-menu__link-text">
														Apps
													</span>
													<span class="m-menu__link-badge">
														<span class="m-badge m-badge--brand m-badge--wide">
															new
														</span>
													</span>
												</span>
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<ul class="m-menu__subnav">
												<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-business"></i>
														<span class="m-menu__link-text">
															eCommerce
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="crud/datatable_v1.html" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-computer"></i>
														<span class="m-menu__link-text">
															Audience
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-users"></i>
																	<span class="m-menu__link-text">
																		Active Users
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-interface-1"></i>
																	<span class="m-menu__link-text">
																		User Explorer
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-lifebuoy"></i>
																	<span class="m-menu__link-text">
																		Users Flows
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Market Segments
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic"></i>
																	<span class="m-menu__link-text">
																		User Reports
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
												<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-map"></i>
														<span class="m-menu__link-text">
															Marketing
														</span>
													</a>
												</li>
												<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="header/actions.html" class="m-menu__link ">
														<i class="m-menu__link-icon flaticon-graphic-2"></i>
														<span class="m-menu__link-title">
															<span class="m-menu__link-wrap">
																<span class="m-menu__link-text">
																	Campaigns
																</span>
																<span class="m-menu__link-badge">
																	<span class="m-badge m-badge--success">
																		3
																	</span>
																</span>
															</span>
														</span>
													</a>
												</li>
												<li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
													<a  href="javascript:;" class="m-menu__link m-menu__toggle">
														<i class="m-menu__link-icon flaticon-infinity"></i>
														<span class="m-menu__link-text">
															Cloud Manager
														</span>
														<i class="m-menu__hor-arrow la la-angle-right"></i>
														<i class="m-menu__ver-arrow la la-angle-right"></i>
													</a>
													<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
														<span class="m-menu__arrow "></span>
														<ul class="m-menu__subnav">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-add"></i>
																	<span class="m-menu__link-title">
																		<span class="m-menu__link-wrap">
																			<span class="m-menu__link-text">
																				File Upload
																			</span>
																			<span class="m-menu__link-badge">
																				<span class="m-badge m-badge--danger">
																					3
																				</span>
																			</span>
																		</span>
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-signs-1"></i>
																	<span class="m-menu__link-text">
																		File Attributes
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-folder"></i>
																	<span class="m-menu__link-text">
																		Folders
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="header/actions.html" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-cogwheel-2"></i>
																	<span class="m-menu__link-text">
																		System Settings
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="
	m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" 
	m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															9 New
														</span>
														<span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alerts
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
																		Events
																	</a>
																</li>
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
																		Logs
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
																					<span class="m-list-timeline__text">
																						12 new users registered
																					</span>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System shutdown
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						14 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						New invoice received
																					</span>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						DB overloaded 80%
																						<span class="m-badge m-badge--info m-badge--wide">
																							settled
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						1 hr
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						System error -
																						<a href="#" class="m-link">
																							Check
																						</a>
																					</span>
																					<span class="m-list-timeline__time">
																						2 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span href="" class="m-list-timeline__text">
																						New order received
																						<span class="m-badge m-badge--danger m-badge--wide">
																							urgent
																						</span>
																					</span>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item m-list-timeline__item--read">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server down
																					</span>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge"></span>
																					<span class="m-list-timeline__text">
																						Production server up
																					</span>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						Just now
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
																					<a href="" class="m-list-timeline__text">
																						New invoice received
																					</a>
																					<span class="m-list-timeline__time">
																						20 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server up
																					</a>
																					<span class="m-list-timeline__time">
																						5 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						New order received
																					</a>
																					<span class="m-list-timeline__time">
																						7 hrs
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						System shutdown
																					</a>
																					<span class="m-list-timeline__time">
																						11 mins
																					</span>
																				</div>
																				<div class="m-list-timeline__item">
																					<span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
																					<a href="" class="m-list-timeline__text">
																						Production server down
																					</a>
																					<span class="m-list-timeline__time">
																						3 hrs
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
																		<div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Quick Actions
														</span>
														<span class="m-dropdown__header-subtitle">
															Shortcuts
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="data" data="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-file"></i>
																			<span class="m-nav-grid__text">
																				Generate Report
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-time"></i>
																			<span class="m-nav-grid__text">
																				Add New Event
																			</span>
																		</a>
																	</div>
																	<div class="m-nav-grid__row">
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-folder"></i>
																			<span class="m-nav-grid__text">
																				Create New Task
																			</span>
																		</a>
																		<a href="#" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-clipboard"></i>
																			<span class="m-nav-grid__text">
																				Completed Tasks
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="images/ismie.png" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
													Ismie
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(images/user_profile_bg.png); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="images/ismie.png" class="m--img-rounded m--marginless" alt=""/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Ismie Roha
																</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">
																	ismie@mohe.gov.my
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Activity
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Messages
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			FAQ
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="header/profile.html" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Support
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="logout.php" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
																		Logout
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
	<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		m-menu-vertical="1"
		 m-menu-scrollable="0" m-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="main.php" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">
													4
												</span>
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									administration menu
							  </h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										UA Alert
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
									
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="uaList.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													UA List
												</span>
											</a>
										</li>

									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										VC -Fit
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="vcFitList.php" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													VC_Fit List
												</span>
											</a>
										</li>

									</ul>
								</div>
							</li>

                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										DVC -Fit
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="dvcFitList.php" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													DVC_Fit List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										Dean -Fit
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="deanFitList.php" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													Dean_Fit List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							
						  <li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									UniLEAD Management
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										Candidate
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="components/icons/flaticon.html" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													Candidate List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										UA
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="components/icons/flaticon.html" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													UA List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							
							 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										Academic Career
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="components/icons/flaticon.html" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													Career List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										IL Career
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="components/icons/flaticon.html" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													IL List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							
							 <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-share"></i>
                                    <span class="m-menu__link-text">
										Salutation
									</span>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu ">
                                    <span class="m-menu__arrow"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="components/icons/flaticon.html" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
													Salutation List
												</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
							<li class="m-menu__section ">
								<h4 class="m-menu__section-text">
									Setting
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-interface-9"></i>
									<span class="m-menu__link-text">
										System User
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													
												</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													AKEPT
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="snippets/general/pricing-tables/pricing-table-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Accessor
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="snippets/general/pricing-tables/pricing-table-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													MOE
												</span>
											</a>
										</li>
						
										
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-piggy-bank"></i>
									<span class="m-menu__link-text">
										System Log
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													User Log
												</span>
											</span>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="snippets/invoices/invoice-1.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Server Log
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="snippets/invoices/invoice-2.html" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Database Log
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-exclamation"></i>
									<span class="m-menu__link-text">
										Manuals
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<span class="m-menu__link">
												<span class="m-menu__link-text">
													FAQS
												</span>
											</span>
										
									</ul>
								</div>
							</li>
							
		</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Candidate Profile
								</h3>
							</div>
							
						</div>
					</div>
					<!-- END: Subheader -->

					<div class="m-content">
		           
						<?
$sql_events = mysqli_query($connection, "select * from profile, ipta, cfa, competency where ncpl2='4' and competency.user_id=profile.user_id  and cfa.user_id=profile.user_id and  profile.ipta_id=ipta.ipta_id and cfa.user_id='$u_id' limit 1") or die (mysql_error());
$z =1;

$date_today =date('Y-m-d');
while ($row = mysqli_fetch_array($sql_events)) {

	$user_id = $row["user_id"];
    $name = $row["name"];
	$cposition = $row["cposition"];
	$ipta = $row["ipta"];
	$ipta_a = $row["ipta_a"];
	$origin = $row["origin"];
	$age = $row["age"];
	$pict = $row["pict"];
	$ncpl1 = $row["ncpl1"];
	$ncpl2 = $row["ncpl2"];
	$a1 = $row["a1"];
	$a1 = $row["a1"];
	$a2 = $row["a2"];
	$b1 = $row["b1"];
	$b2 = $row["b2"];
	$c1 = $row["c1"];
	$c2 = $row["c2"];
	$d1 = $row["d1"];
	$d2 = $row["d2"];
	$e1 = $row["e1"];
	$e2 = $row["e2"];
	$e3 = $row["e3"];
	$e4 = $row["e4"];
	$f1 = $row["f1"];
	$f2 = $row["f2"];
	$f3 = $row["f3"];
	$f4 = $row["f4"];
	$g1 = $row["g1"];
	$g2 = $row["g2"];
	$g3 = $row["g3"];
	$g4 = $row["g4"];
	$h1 = $row["h1"];
	$h2 = $row["h2"];
	$h3 = $row["h3"];
	$h4 = $row["h4"];
	$i1 = $row["i1"];
	$i2 = $row["i2"];
	$i3 = $row["i3"];
	$i4 = $row["i4"];
	$j1 = $row["j1"];
	$j2 = $row["j2"];
	$j3 = $row["j3"];
	$j4 = $row["j4"];
	$k1 = $row["k1"];
	$k2 = $row["k2"];
	$k3 = $row["k3"];
	$k4 = $row["k4"];
	$l1 = $row["l1"];
	$l2 = $row["l2"];
	$l3 = $row["l3"];
	$l4 = $row["l4"];
	$m1 = $row["m1"];
	$m2 = $row["m2"];
	$m3 = $row["m3"];
	$m4 = $row["m4"];
	$n1 = $row["n1"];
	$n2 = $row["n2"];
	$n3 = $row["n3"];
	$n4 = $row["n4"];
	$o1 = $row["o1"];
	$o2 = $row["o2"];
	$o3 = $row["o3"];
	$o4 = $row["o4"];
	$JF01 = $row["JF01"];
	$JF02 = $row["JF02"];
	$JFR = $row["JFR"];
	$z1 = $row["z1"];
	
	$comp1 = $row["1c"];
	$comp2 = $row["2c"];
	$comp3 = $row["3c"];
	$comp4 = $row["4c"];
	$comp5 = $row["5c"];
	$comp6 = $row["6c"];
	$comp7 = $row["7c"];
	$comp8 = $row["8c"];
	$comp9 = $row["9c"];
	$comp10 = $row["10c"];
	$comp11 = $row["11c"];
	$comp12 = $row["12c"];
	$comp13 = $row["13c"];
	$comp14 = $row["14c"];
	$comp15 = $row["15c"];
	$comp16 = $row["16c"];
	$comp17 = $row["17c"];
	$comp18 = $row["18c"];
	$comp19 = $row["19c"];
	$noic = $row["noic"];
	
	$aveC1 = round(($comp1+$comp2+$comp3)/3,2);
	$aveC2 = round(($comp4+$comp5+$comp6+$comp7)/4,2);
	$aveC3 = round(($comp8+$comp9+$comp10+$comp11)/4,2);
	$aveC4 = round(($comp12+$comp13+$comp14+$comp15+$comp16)/5,2);
	$aveC5 = round(($comp17+$comp18+$comp19)/3,2);
	

	
	
  
?>
						<div class="row">
	<div class="col-xl-3 col-lg-4">
		<div class="m-portlet m-portlet--full-height  ">
			<div class="m-portlet__body">
				<div class="m-card-profile">
					<div class="m-card-profile__title m--hide">
						Your Profile
					</div>
					<div class="m-card-profile__pic">
						<div class="m-card-profile__pic-wrapper">	
							<img src="<? echo $pict ?>" alt=""/>
						</div>
					</div>
					<div class="m-card-profile__details">
						<span class="m-card-profile__name"><? echo $name ?></span>
						<a href="#"  class="btn m-btn--pill btn-success"><? echo $JF02 ?> </a>
					</div>
				</div>	
				<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
					<li class="m-nav__separator m-nav__separator--fit"></li>
					<li class="m-nav__section m--hide">
						<span class="m-nav__section-text">Section</span>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-diagram"></i>
							<span class="m-nav__link-title">  
								<span class="m-nav__link-wrap">      
									<span class="m-nav__link-text"><? echo $cposition ?></span>      
								</span>
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<i class="m-nav__link-icon flaticon-location"></i>
							<span class="m-nav__link-title">  
								<span class="m-nav__link-wrap">      
									<span class="m-nav__link-text"><? echo $ipta ?></span>      
								</span>
							</span>
						</a>
					</li>
				</ul>

				<div class="m-portlet__body-separator"></div>

				<div class="m-widget1 m-widget1--paddingless">
					<div class="m-widget1__item">
						<div class="row m-row--no-padding align-items-center">
							<div class="col">
								<h3 class="m-widget1__title">Average</h3>
								<span class="m-widget1__desc">Competency Variance</span>
							</div>
							<div class="col m--align-right">
								<span class="m-widget1__number m--font-brand"><? echo $c1; ?></span>
							</div>
						</div>
					</div>
					<div class="m-widget1__item">
						<div class="row m-row--no-padding align-items-center">
							<div class="col">
								<h3 class="m-widget1__title">Lowest</h3>
								<span class="m-widget1__desc">Gap Competency </span>
							</div>
							<div class="col m--align-right">
								<span class="m-widget1__number m--font-danger"><? echo $z1; ?></span>
							</div>
						</div>
					</div>
					
				</div>
			</div>			
		</div>	
	</div>
	<div class="col-xl-9 col-lg-8">
		<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-tools">
					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
								<i class="flaticon-share m--hide"></i>Assessment Result
							</a>
						</li>
						
					</ul>
				</div>
				
			</div>
			
			<!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                          Leadership Cluster
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
               <div align="center" id="mainc" style="height:350px;"></div> 
				<div align="center"><a href="#"  class="btn m-btn--pill btn-primary"><? echo $JFR ?> </a></div>
				
				
            </div>
			
			<div class="m-portlet__body">
              <table class="table-borderless" width="98%">
				  <tbody>
					<tr>
						<td height="30" align ="center" colspan="5" bgcolor="#F8E9A1"><strong><? echo $name?></strong></td>
					</tr>
					<tr>
						<td height="30" bgcolor="#f8f1d2" align ="center" colspan="2"><strong>Current Position</strong></td>
					  <td height="30" align ="center">&nbsp;</td>
						<td height="30" bgcolor="#f8f1d2"  align ="center" colspan="2"><strong>Target Position</strong></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $cposition?></td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center"><strong>Position Title</strong></td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $ipta_a?></td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center"><strong>Location</strong></td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $ncpl1?></td>
					  <td height="30" bgcolor="#f8f1d2" align ="center" colspan="3"><strong>Normative Competency Proficiency Level</strong></td>
						<td height="30" bgcolor="#f8f1d2" align ="center"><div class="table_warning"><? echo $ncpl2?></div></td>
					</tr>
					<tr>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					</tr>
					<tr>
					  <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
					  <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
					  <td height="30"  bgcolor="#F8E9A1" align ="center"><strong>Competency Fit Analysis</strong></td>
					  <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
					  <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
					  </tr>
					<tr>
					  <td height="30" align ="center"><? echo $a1?></td>
					  <td height="30" align ="center" colspan="3"><strong>Average Competency Level</strong></td>
					  <td height="30" align ="center"><? echo $a2?></td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#F8E9A1" align ="center"><? echo $c1?></td>
					  <td height="30" bgcolor="#F8E9A1" align ="center" colspan="3"><strong>Average Competency Variance</strong></td>
					  <td height="30" bgcolor="#F8E9A1" align ="center"><? echo $c2?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><strong>Current Position</strong></td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center">&nbsp;</td>
					  <td height="30" align ="center"><strong>Target Position</strong></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><strong>%</strong></td>
					  <td height="30" align ="center"><strong>f</strong></td>
					  <td height="30" align ="center"><strong>Variance Level</strong></td>
					  <td height="30" align ="center"><strong>f</strong></td>
					  <td height="30" align ="center"><strong>%</strong></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $e1?></td>
					  <td height="30" align ="center"><? echo round($e2,1) ?></td>
					  <td height="30" align ="center"><strong>2.5</strong></td>
					  <td height="30" align ="center"><? echo round($e3,1) ?></td>
					  <td height="30" align ="center"><? echo $e4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $f1?></td>
					  <td height="30" align ="center"><? echo round($f2,1) ?></td>
					  <td height="30" align ="center"><strong>2.0</strong></td>
					  <td height="30" align ="center"><? echo round($f3,1) ?></td>
					  <td height="30" align ="center"><? echo $f4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $g1?></td>
					  <td height="30" align ="center"><? echo round($g2,1) ?></td>
					  <td height="30" align ="center"><strong>1.5</strong></td>
					  <td height="30" align ="center"><? echo round($g3,1) ?></td>
					  <td height="30" align ="center"><? echo $g4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $h1?></td>
					  <td height="30" align ="center"><? echo round($h2,1) ?></td>
					  <td height="30" align ="center"><strong>1.0</strong></td>
					  <td height="30" align ="center"><? echo round($h3,1) ?></td>
					  <td height="30" align ="center"><? echo $h4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $i1?></td>
					  <td height="30" align ="center"><? echo round($i2,1) ?></td>
					  <td height="30" align ="center"><strong>0.5</strong></td>
					  <td height="30" align ="center"><? echo round($i3,1) ?></td>
					  <td height="30" align ="center"><? echo $i4?></td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $j1?></td>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><? echo round($j2,1) ?></td>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><strong>0</strong></td>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><? echo round($j3,1) ?></td>
					  <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $j4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $k1?></td>
					  <td height="30" align ="center"><? echo round($k2,1) ?></td>
					  <td height="30" align ="center"><strong>-0.5</strong></td>
					  <td height="30" align ="center"><? echo round($k3,1) ?></td>
					  <td height="30" align ="center"><? echo $k4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $l1?></td>
					  <td height="30" align ="center"><? echo round($l2,1) ?></td>
					  <td height="30" align ="center"><strong>-1.0</strong></td>
					  <td height="30" align ="center"><? echo round($l3,1) ?></td>
					  <td height="30" align ="center"><? echo $l4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $m1?></td>
					  <td height="30" align ="center"><? echo round($m2,1) ?></td>
					  <td height="30" align ="center"><strong>-1.5</strong></td>
					  <td height="30" align ="center"><? echo round($m3,1) ?></td>
					  <td height="30" align ="center"><? echo $m4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $n1?></td>
					  <td height="30" align ="center"><? echo round($n2,1) ?></td>
					  <td height="30" align ="center"><strong>-2.0</strong></td>
					  <td height="30" align ="center"><? echo round($n3,1) ?></td>
					  <td height="30" align ="center"><? echo $n4?></td>
					</tr>
					<tr>
					  <td height="30" align ="center"><? echo $o1?></td>
					  <td height="30" align ="center"><? echo round($o2,1) ?></td>
					  <td height="30" align ="center"><strong>-2.5</strong></td>
					  <td height="30" align ="center"><? echo round($o3,1) ?></td>
					  <td height="30" align ="center"><? echo $o4?></td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#F8E9A1" align ="center" colspan="2"><strong>Current Job</strong></td>
					  <td height="30" bgcolor="#F8E9A1" align ="center"><strong>Person : Job Fit</strong></td>
					  <td height="30" bgcolor="#F8E9A1" align ="center" colspan="2" ><div class="table_warning"><strong>Target Job</strong></div></td>
					</tr>
					<tr>
					  <td height="30" align ="center" colspan="2"><? echo $JF01?></td>
					  <td height="30" align ="center">&nbsp;</td>
						<td height="30" align ="center" colspan="2"><div class="table_warning"><? echo $JF02?></div></td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#F8E9A1" align ="center" colspan="5"><strong>Person : Target Job Fit</strong></td>
					</tr>
					<tr>
					  <td height="30" bgcolor="#f8f1d2"  colspan="5" align ="center"><? echo $JFR?></td>
					  </tr>
				  </tbody>
				</table>
				
				
            </div>
			
<div class="m-portlet  m-portlet--full-height ">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">Recommended Roles</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
					<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
					<i class="la la-ellipsis-h m--font-brand"></i>
					</a>
					<div class="m-dropdown__wrapper">
						<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
						<div class="m-dropdown__inner">
							<div class="m-dropdown__body">
								<div class="m-dropdown__content">
									<ul class="m-nav">
										<li class="m-nav__section m-nav__section--first">
											<span class="m-nav__section-text">Quick Actions</span>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-share"></i>
											<span class="m-nav__link-text">Activity</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-chat-1"></i>
											<span class="m-nav__link-text">Messages</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-info"></i>
											<span class="m-nav__link-text">FAQ</span>
											</a>
										</li>
										<li class="m-nav__item">
											<a href="" class="m-nav__link">
											<i class="m-nav__link-icon flaticon-lifebuoy"></i>
											<span class="m-nav__link-text">Support</span>
											</a>
										</li>
										<li class="m-nav__separator m-nav__separator--fit">
										</li>
										<li class="m-nav__item">
											<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Cancel</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

</div>
			
			
        </div>
        <!--end::Portlet-->	
		<div class="m-portlet__body">
		<div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">
			<!--Begin::Timeline 2 -->
			<div class="m-timeline-2">
				<div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
					<div class="m-timeline-2__item">
						<span class="m-timeline-2__item-time">Profiles</span>	
						<div class="m-timeline-2__item-cricle">									 
							<i class="fa fa-genderless m--font-danger"></i>									 
						</div>
						<div class="m-timeline-2__item-text  m--padding-top-5">
							<? rolesProfile($user_id) ?>                                         	                                	               
						</div>
					</div>
					<div class="m-timeline-2__item m--margin-top-30">
						<span class="m-timeline-2__item-time">Action</span>	
						<div class="m-timeline-2__item-cricle">																		 
							<i class="fa fa-genderless m--font-success"></i>									 
						</div>
						<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
							<? rolesAction($user_id) ?>
						</div>
						
					</div>
					<div class="m-timeline-2__item m--margin-top-30">
						<span class="m-timeline-2__item-time">Thinking</span>	
						<div class="m-timeline-2__item-cricle">																		 
							<i class="fa fa-genderless m--font-brand"></i>									 
						</div>
						<div class="m-timeline-2__item-text m--padding-top-5">
							<? rolesThinking($user_id) ?>
						</div>
					</div>
					<div class="m-timeline-2__item m--margin-top-30">
						<span class="m-timeline-2__item-time">Others</span>
						<div class="m-timeline-2__item-cricle">																		 
							<i class="fa fa-genderless m--font-warning"></i>									 
						</div>
						<div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
							<? rolesOthers($user_id) ?>                                                      	                                
						</div>
					</div>
					
				</div>
			</div>
			<!--End::Timeline 2 -->
		</div>
	</div>
			
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
		
		<!-- ECharts -->
    	<script src="assets/vendors/echarts/dist/echarts.min.js"></script>
	
	
	<!-- ECharts -->
    <script>
      var theme = {
          color: [
              '#F8E9A1', '#34495E', '#BDC3C7', '#DC143C',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };
	  
	  $(window).on('resize', function(){
        if(chart != null && chart != undefined){
            chart.resize();
        }
    });

	  var echartBarLine = echarts.init(document.getElementById('mainc'), theme);

      echartBarLine.setOption({
        title: {
          x: 'center',
          y: 'top',
          padding: [0, 0, 20, 0],
          text: 'Leadership Cluster',
          textStyle: {
            fontSize: 15,
            fontWeight: 'normal'
          }
        },
        tooltip: {
          trigger: 'axis',
			axisPointer : {     
            type : 'shadow'       
        }
        },
        toolbox: {
          show: true,
          feature: {
            dataView: {
              show: true,
              readOnly: false,
              title: "Text View",
              lang: [
                "Text View",
                "Close",
                "Refresh",
              ],
            },
            restore: {
              show: true,
              title: 'Restore'
            },
            saveAsImage: {
              show: true,
              title: 'Save'
            }
          }
        },
        calculable: true,
        legend: {
          data: ['test'],
          y: 'bottom'
        },
        xAxis : [
        {
            type : 'category',
			maximum: 5,
            data : ['c1','c2','c3','c4','c5','c6','c7','c8','c9','c10','c11','c12','c13','c14','c15','c16','c17','c18','c19']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
		
        series: [{
          name: 'Value',
          type: 'bar',
          data: [<? echo $comp1 ?>, <? echo $comp2 ?>, <? echo $comp3 ?>,<? echo $comp4 ?>, <? echo $comp5 ?>, <? echo $comp6 ?>, <? echo $comp7 ?>,<? echo $comp8 ?>, <? echo $comp9 ?>, <? echo $comp10 ?>, <? echo $comp11 ?>,<? echo $comp12 ?>, <? echo $comp13 ?>, <? echo $comp14 ?>, <? echo $comp15 ?>, <? echo $comp16 ?>,<? echo $comp17 ?>, <? echo $comp18 ?>, <? echo $comp19 ?>]
        },{
            name: 'Overall Average',
            type: 'scatter',
            data: [<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>]
        },{
            name: 'Current Position',
            type: 'scatter',
            data: [<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>]
        },{
            name: 'Target Position',
            type: 'line',
            data: [<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>]
        },{
            name: 'Cluster Average',
            type: 'scatter',
            data: [<? echo $aveC1 ?>, <? echo $aveC1 ?>, <? echo $aveC1 ?>,<? echo $aveC2 ?>, <? echo $aveC2 ?>, <? echo $aveC2 ?>, <? echo $aveC2 ?>,<? echo $aveC3 ?>, <? echo $aveC3 ?>, <? echo $aveC3 ?>, <? echo $aveC3 ?>,<? echo $aveC4 ?>, <? echo $aveC4 ?>, <? echo $aveC4 ?>, <? echo $aveC4 ?>, <? echo $aveC4 ?>,<? echo $aveC5 ?>, <? echo $aveC5 ?>, <? echo $aveC5 ?>]
        }]
      });
	  
	</script>
		<!--end::Page Resources -->
		
	</body>
	<!-- end::Body -->
</html>

<?	
}
?>
