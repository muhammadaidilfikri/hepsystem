<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>



<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			AsidApps | Dashboard
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
        <style>
        /* Donut charts get built from Pie charts but with a fundamentally difference in the drawing approach. The donut is drawn using arc strokes for maximum freedom in styling */
.ct-series-a .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #8E44AD;

}
.ct-series-b .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #26C281;

}
.ct-series-c .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #E43A45;

}
.ct-series-d .ct-slice-donut {
  /* give the donut slice a custom colour */
  stroke: #F3C200;

}

        </style>

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
				<!-- Start : Left Aside -->

				<? include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->

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
                          Students
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Students
                        </span>
                        <span class="m-widget24__stats m--font-brand">
                          <? countStudent();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          0%
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
                          Administration</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff
                        </span>
                        <span class="m-widget24__stats m--font-info">
                          <? countAdministration();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          3%
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
                          Academicians</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff</span>
                        <span class="m-widget24__stats m--font-danger">
                          <? countAcademic();?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
                        </span>
                        <span class="m-widget24__number">
                          0%
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
                          Concessioner
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Staff
                        </span>
                        <span class="m-widget24__stats m--font-success">
                          0
                        </span>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-success" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered
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
            <h3>IPTA Financial AID</h3>
            <div class="m-portlet">

              <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                  <div class="col-xl-4">

                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="m-widget1">
                      <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                          <div class="col">
                          <h3 class="m-widget1__title">Application Received</h3>
                            <span class="m-widget1__desc">up to <? echo date("d M Y") ?></span>
                          </div>
                          <div class="col m--align-right">
                            <span class="m-widget1__number m--font-warning"><? echo countBKP() ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                          <div class="col">
                          <h3 class="m-widget1__title">Less Than RM 10,000</h3>
                            <span class="m-widget1__desc"><? echo countBKPApproved() ?> has already been approved</span></div>
                          <div class="col m--align-right"><span class="m-widget1__number m--font-success"><? echo countBKPLess() ?></span></div>
                        </div>
                      </div>
                      <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                          <div class="col">
                            <h3 class="m-widget1__title">Over RM10,000</h3>
                            <span class="m-widget1__desc"><? echo countBKPRejected() ?> has already been rejected</span></span>

                          </div>
                          <div class="col m--align-right">
                            <span class="m-widget1__number m--font-danger"><? echo countBKPOver() ?></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--end:: Widgets/Stats2-1 -->
                  </div>

                  <div class="col-xl-4">

                    <!--begin:: Widgets/Daily Sales-->
                    <div class="m-widget14">
                      <div class="m-widget14__header m--margin-bottom-30">
                        <h3 class="m-widget14__title">
                          Daily Progress
                        </h3>
                        <span class="m-widget14__desc">
                          Check out each collumn for progress details
                        </span>
                      </div>
                      <div class="m-widget14__chart" style="height:120px;">
                        <canvas id="m_chart_daily_sales"></canvas>
                      </div>
                    </div>

                    <!--end:: Widgets/Daily Sales-->
                  </div>
                  <div class="col-xl-4">

                    <!--begin:: Widgets/Profit Share-->
                    <div class="m-widget14">
                      <div class="m-widget14__header">
                        <h3 class="m-widget14__title">
                          Quick Note
                        </h3>
                        <span class="m-widget14__desc">
                          between received / approved / rejected applications</span>
                      </div>
                      <div class="row  align-items-center">
                        <div class="col">
                          <div id="ct-chart" class="m-widget14__chart" style="height: 160px">
                            <div class="m-widget14__stat"><? echo countBKP() ?></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="m-widget14__legends">
                            <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-brand"></span>
                              <span class="m-widget14__legend-text"><? echo round( countBKPPending()/countBKP()*100,2)?>% Pending </span>
                            </div>
                            <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-success"></span>
                              <span class="m-widget14__legend-text"><? echo round( countBKPApproved()/countBKP()*100,2)?>% Approved </span>
                            </div>
                            <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-danger"></span>
                              <span class="m-widget14__legend-text"><? echo round( countBKPRejected()/countBKP()*100,2)?>% Rejected</span>
                            </div>
                            <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-warning"></span>
                              <span class="m-widget14__legend-text"><? echo round( countBKPIncomplete()/countBKP()*100,2)?>% Incomplete</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--end:: Widgets/Profit Share-->
                  </div>
                </div>
              </div>
            </div>
              <div class="col m--align-right"><a class="btn btn-primary" href="searchBKP.php" role="button">Search Student</a> <a class="btn btn-warning" href="pendingBKP.php" role="button">Pending List</a> <a class="btn btn-success" href="approvedBKP.php" role="button">Approved List</a> <a class="btn btn-danger" href="rejectedBKP.php" role="button">Rejected List</a></div><br>
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      Activity Log (10 Most Recent)
                    </h3>
                  </div>
                </div>
              </div>
            <div class="m-portlet__body">

              <!--begin::Section-->
              <div class="m-section">
                <div class="m-section__content">
                  <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Matrix No</th>
                        <th>Name</th>
                        <th>Gross Salary (RM)</th>
                        <th>Status</th>
                          <th>Updated</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      $sql_events = mysqli_query($connection, "select * from student, bkp where student.stdNo=bkp.stdNo  order by timestamp desc limit 10 ");
                      $z =1;

                      while ($row = mysqli_fetch_array($sql_events)) {

                        $stdNo = $row["stdNo"];
                        $totSal = $row["totSal"];
                        $stdName = $row["stdName"];
                        $bkp_stat = $row["bkp_stat"];
                        $timestamp = $row["timestamp"];

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
                        <td><a href="t1.php?vid=<? echo $stdNo ?>"><? echo $stdNo ?></a></td>
                        <td><? echo $stdName ?></td>
                        <td><? echo $totSal ?></td>
                          <td><? echo $stat ?></td>
                        <td><? echo $date->format('Y-m-d H:i:s'); ?></td>
                      </tr>
                      <?
                      $z++;
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!--end::Section-->

            </div>
          </div>

            <!-- end section -->
</div>

				</div>
			</div>
			<!-- end:: Body -->

		</div>
		<!-- end:: Page -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
      <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
  		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
  		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
  		<script src="assets/app/js/dashboard.js" type="text/javascript"></script>

		<script>
		 $('#calendar').fullCalendar({

			  eventSources: [

				{
				  url: 'calHea.php',
				  className:'m-fc-event--light m-fc-event--solid-warning'
				},
        {
				  url: 'calCuti.php',
				  className:'m-fc-event--light m-fc-event--solid-success'
				},
        {
				  url: 'calExam.php',
				  className:'m-fc-event--light m-fc-event--solid-danger'
				},



			  ]


			});
		</script>

    <script>
    var chart = new Chartist.Pie('#ct-chart', {
  series: [<? echo countBKPPending() ?> , <? echo countBKPApproved() ?> , <? echo countBKPRejected() ?> , <? echo countBKPIncomplete() ?>],
  labels: [1, 2, 3, 4]
}, {
  donut: true,
  showLabel: false
});

chart.on('draw', function(data) {
  if(data.type === 'slice') {
    // Get the total path length in order to use for dash array animation
    var pathLength = data.element._node.getTotalLength();

    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
    data.element.attr({
      'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
    });

    // Create animation definition while also assigning an ID to the animation for later sync usage
    var animationDefinition = {
      'stroke-dashoffset': {
        id: 'anim' + data.index,
        dur: 1000,
        from: -pathLength + 'px',
        to:  '0px',
        easing: Chartist.Svg.Easing.easeOutQuint,
        // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
        fill: 'freeze'
      }
    };

    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
    if(data.index !== 0) {
      animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
    }

    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
    data.element.attr({
      'stroke-dashoffset': -pathLength + 'px'
    });

    // We can't use guided mode as the animations need to rely on setting begin manually
    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
    data.element.animate(animationDefinition, false);
  }
});

// For the sake of the example we update the chart every time it's created with a delay of 8 seconds
chart.on('created', function() {
  if(window.__anim21278907124) {
    clearTimeout(window.__anim21278907124);
    window.__anim21278907124 = null;
  }
  window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
});

  </script>
	</body>
	<!-- end::Body -->
</html>
