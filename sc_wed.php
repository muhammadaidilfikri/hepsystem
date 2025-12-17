<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");
$date_wed = "2019-06-19";
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


            <!-- begin section -->
            <h3>Smart Card Registration System</h3>

            </div>
        <div class="col m--align-right"><a class="btn btn-warning" href="searchCard.php" role="button">Register Student</a> <a class="btn btn-success" href="searchCard2.php" role="button">Card Collection</a> |  <a class="btn btn-primary" href="sc_tue.php" role="button">(Tuesday List)</a> <a class="btn btn-primary" href="sc_wed.php" role="button">(Wednesday List)</a> <a class="btn btn-primary" href="sc_thur.php" role="button">(Thursday List)</a></div><br>
            <div class="m-portlet">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      List of Students (Registered on Wednesday)
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
                        <th>Card ID</th>
                        <th>Name</th>
                        <th>Programme</th>
                        <th>Registered</th>
                        <th>Collected</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?
                      $sql_events = mysqli_query($connection, "select * from student, stdcard where student.stdNo=stdcard.stdNo order by stdName asc");
                      $z =1;

                      while ($row = mysqli_fetch_array($sql_events)) {

                        $stdNo = $row["stdNo"];
                        $stdcard_id = $row["stdcard_id"];
                        $stdName = $row["stdName"];
                        $progName = $row["progName"];
                        $timestamp = $row["timestamp"];
                        $timestamp2 = $row["timestamp2"];

                        $date = new DateTime("@$timestamp");
                        $date2 = new DateTime("@$timestamp2");

                        $date = new DateTime("@$timestamp");

                        if ($date->format('Y-m-d')==$date_wed){

                      ?>
                      <tr>
                        <th scope="row"><? echo $z ?></th>
                        <td><? echo $stdNo ?></td>
                        <td><? echo $stdcard_id ?></td>
                        <td><? echo $stdName ?></td>
                        <td><? echo $progName ?></td>
                        <td><? echo $date->format('Y-m-d H:i:s'); ?></td>
                        <td> <? if ($timestamp2==0)
                        {
                          echo "";
                        }
                        else {
                          echo  $date2->format('Y-m-d H:i:s');
                        }
                        ?>
                        </td>
                      </tr>
                      <?
                      $z++;
                    }
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
