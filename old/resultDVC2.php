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
			<? include ("menuheader.php")?>
			<!-- END: Header -->		
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<? include ("mainmenu.php")?>
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
	
	$noic = $row["noic"];
	
	$aveC1 = round(($comp1+$comp2+$comp3)/3,2);
	$aveC2 = round(($comp4+$comp5+$comp6)/4,2);
	$aveC3 = round(($comp7+$comp8+$comp9)/4,2);
	$aveC4 = round(($comp10+$comp11+$comp12)/5,2);
	$aveC5 = round(($comp13+$comp14+$comp15)/3,2);

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
            data : ['1.1','1.2','1.3','2.1','2.2','2.3','3.1','3.2','3.3','4.1','4,2','4.3','5.1','5.2','5.3']
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
          data: [<? echo $comp1 ?>, <? echo $comp2 ?>, <? echo $comp3 ?>,<? echo $comp4 ?>, <? echo $comp5 ?>, <? echo $comp6 ?>, <? echo $comp7 ?>,<? echo $comp8 ?>, <? echo $comp9 ?>, <? echo $comp10 ?>, <? echo $comp11 ?>,<? echo $comp12 ?>, <? echo $comp13 ?>, <? echo $comp14 ?>, <? echo $comp15 ?>]
        },{
            name: 'Overall Average',
            type: 'scatter',
            data: [<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>,<? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>, <? echo $a2 ?>]
        },{
            name: 'Current Position',
            type: 'scatter',
            data: [<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>,<? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>, <? echo $ncpl1 ?>]
        },{
            name: 'Target Position',
            type: 'line',
            data: [<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>,<? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>, <? echo $ncpl2 ?>]
        },{
            name: 'Cluster Average',
            type: 'scatter',
            data: [<? echo $aveC1 ?>, <? echo $aveC1 ?>, <? echo $aveC1 ?>,<? echo $aveC2 ?>, <? echo $aveC2 ?>, <? echo $aveC2 ?>, <? echo $aveC2 ?>,<? echo $aveC3 ?>, <? echo $aveC3 ?>, <? echo $aveC3 ?>, <? echo $aveC3 ?>,<? echo $aveC4 ?>, <? echo $aveC4 ?>, <? echo $aveC4 ?>, <? echo $aveC4 ?>]
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
