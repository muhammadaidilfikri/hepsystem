<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$sxid = $_SESSION["username"];
$c_id = checkMyDeptID($_SESSION["username"]);

?>



<!DOCTYPE html>

<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			CRS | My Department Activities
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
        <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
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
			<?php include ("menuheader.php")?>
			<!-- END: Header -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<!-- Start : Left Aside -->

				<?php include ("mainmenu.php")?>
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
                          Club
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Club
                        </span>
                        <span class="m-widget24__stats m--font-brand">
                          <?php echo countClub() ?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Registered dept
                        </span>
                        <span class="m-widget24__number">
                          100%
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
                          Advisor</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Advisors
                        </span>
                        <span class="m-widget24__stats m--font-info">
                          <?php echo countAdvisor()?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                        Registered Advisor(s)
                        </span>
                        <span class="m-widget24__number">
                          100%
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
                          Student</h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Student Offered</span>
                        <span class="m-widget24__stats m--font-danger">
                          <?php echo countStudent() ?>
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-danger" role="progressbar" style="width: 89%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered Students
                        </span>
                        <span class="m-widget24__number">
                          89%
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
                          Club Registrations
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                          Total Student Registered
                        </span>
                        <span class="m-widget24__stats m--font-success">
                          <?php echo countStudentRegistered() ?>
                        </span>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-success" role="progressbar" style="width: 2%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                        Total Opening
                        </span>
                        <span class="m-widget24__number">
                          <?php $tot = countClub()*50;
                            echo $tot;
                           ?>
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
        <h2>My Department Activities</h2>
        <br>
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    My Department Activities
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">

                    <button type="button" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-toggle="modal" data-target="#m_modal_add"><i class="la la-plus"></i> New Activities</button>
                  </li>
                </ul>
              </div>
            </div>
            <div class="m-portlet__body">

              <!--begin: Datatable -->

              <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Dept Name</th>
		    <th>Activities / Events</th>
		    <th>Created By</th>
                    <th>Date &amp Time</th>
                    <th>Registered</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql_events = mysqli_query($connection, "select * from dept,dept_advisor,dept_activities where dept.dept_id=dept_activities.dept_id and  dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='$_SESSION[username]'  ") or die (mysqli_error());
                  $z =1;
                  $resultSearch = "";
                  $regError = 0;
                  while ($row = mysqli_fetch_array($sql_events)) {

                    $dact_id = $row["dact_id"];
                    $dept_id = $row["dept_id"];
                    $dact_name = $row["dact_name"];
                    $date_s = date_create($row["date_start"]);
                    $date_e = date_create($row["date_end"]);
                    $total_pax = $row["total_pax"];
                    $dept_stat = $row["dept_stat"];
                    $budget = $row["budget"];
                    $level_id = $row["level_id"];
                    $dept_name = $row["dept_name"];
		                $dept_allow = $row["dept_allow"];
		                $addedBy = $row["addedBy"];
                    $token = $row["token"];

                    if ($dept_allow=='y')
                    {
                      $allow = "Yes";
                    }
                    else {
                      $allow = "No";
                    }

                    if ($dept_stat=='p')
                    {
                      $c_stat = "<span class=\"m--font-warning\">Pending</span>";
                    }
                    else if ($dept_stat=='a')
                    {
                      $c_stat = "<span class=\"m--font-success\">Approved</span>";
                    }
                    else if ($dept_stat=='x')
                    {
                      $c_stat = "<span class=\"m--font-danger\">Postponed</span>";
                    }
                    else if ($dept_stat=='r')
                    {
                      $c_stat = "<span class=\"m--font-danger\">Rejected</span>";
                    }

                    if ($level_id==1)
                    {
                      $lvl = "International";
                    }
                    else if ($level_id==2)
                    {
                      $lvl = "National";
                    }
                    else if ($level_id==3)
                    {
                      $lvl = "State";
                    }
                    else if ($level_id==4)
                    {
                      $lvl = "District";
                    }
                    else if ($level_id==5)
                    {
                      $lvl = "University";
                    }
                    else if ($level_id==6)
                    {
                      $lvl = "Campus";
                    }
                    else if ($level_id==7)
                    {
                      $lvl = "Mentor/mentee";
                    }
                    else if ($level_id==8)
                    {
                      $lvl = "College";
                    }
                    else if ($level_id==9)
                    {
                      $lvl = "MDS";
                    }
                    else if ($level_id==10)
                    {
                      $lvl = "Bicara Interaktif Siswa";
                    }
                  ?>
                  <tr>
                    <th scope="row"><?php echo $z ?></th>
                    <td><b><?php echo $dept_name ?></b></td>
                    <td><?php echo $dact_name?>(<?php echo $dact_id ?>) ( <a href="download/dept_activity.xlsx">Download Template </a>)<br><br>
                      <?php
                      if($dept_stat!='a')
                      {

                      }
                      else {
                      ?>
                      <a href="registerStdActivity-b.php?dact_id=<?php echo $dact_id ?>&amp;regpoint=c&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Committee" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Commitee</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-b.php?dact_id=<?php echo $dact_id ?>&amp;regpoint=p&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Participant" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Contestant</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-b.php?dact_id=<?php echo $dact_id ?>&amp;regpoint=a&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Audience" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Audience</span>
                        </span>
                      </a>
                      <a href="RegisteredListD.php?dact_id=<?php echo $dact_id ?>&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Overall List" class="btn btn-info m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-list"></i>
                          <span>Overall List</span>
                        </span>
                      </a>
                      <?php
                      }
                      ?>
                    </td>
		<td><?php echo $addedBy ?></td>
                    <td>
                      <?php
                      if (date_format($date_s, 'd/m/y')==date_format($date_e, 'd/m/y'))
                      {
                        echo date_format($date_s, 'd/m/Y');
                      }
                      else {
                        echo date_format($date_s, 'd/m'); ?> to <?php echo date_format($date_e, 'd/m/Y');
                      }
                      ?>
                      <?php echo date_format($date_s, 'G:i a'); ?> to <?php echo date_format($date_e, 'G:i a'); ?>
                      </td>


                    <td><b><?php echo countDeptStdRegistered($dact_id) ?></b></td>
                    <td><?php echo $lvl ?></td>
                    <td><?php echo $c_stat ?></td>
                    <td>
                      <a href="editActivityDept.php?dact_id=<?php echo $token ?>" class="btn btn-warning m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-edit-1"></i>
                          <span>Edit</span>
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
            <!-- end section -->
          </div>

				</div>
			</div>



      <!--begin::Add Modal-->
      <div class="modal fade" id="m_modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Activity / Event</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form action="createDeptActivity.php" method="post">
                <div class="form-group">
                  <label for="Name"><b>Organized By</b></label>

                    <select class="custom-select form-control" name="dept_id">
                      <option selected>Select Department</option>
                      <?php
                      $sql_events1 = mysqli_query($connection, "select * from dept,dept_advisor where dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='$_SESSION[username]' order by dept_name ") or die (mysqli_error());
                      while ($row = mysqli_fetch_array($sql_events1)) {


                        $dept_id = $row['dept_id'];
                        $dept_name = $row['dept_name'];
                      ?>
                      <option value="<?php echo $dept_id ?> "> <?php echo $dept_name ?></option>
                      <?php
                        }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="dact_name" class="form-control-label">Activity / Event Name</label>
                  <input type="text" class="form-control" name="dact_name" id="dact_name">
                </div>
                <div class="form-group">
                  <label for="location" class="form-control-label">Location</label>
                  <input type="text" class="form-control" name="location" id="location">
                </div>

              <div class="form-group">
                <label for="date_start" class="form-control-label">Date Start</label>
                    <div class="input-group date" data-z-index="1100">
                      <input type="text"  name="date_start"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" data-date-format="yyyy-m-d H:i:s" />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="la la-calendar-check-o glyphicon-th"></i>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="date_start" class="form-control-label">Date End</label>
                      <div class="input-group date" data-z-index="1100">
                        <input type="text"  name="date_end"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" data-date-format="yyyy-m-d H:i:s" />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="la la-calendar-check-o glyphicon-th"></i>
                          </span>
                        </div>
                      </div>
                  </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Activity / Event Level <label>
                  <label class="m--font-warning">(Only Mentor/Mentee activities will be automatically approved. The rest will need approval from Moderators)</label>
                  <div class="m-radio-inline">
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="1"> International
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="2"> National
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="3"> State
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="4"> District
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="5"> University
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="6"> Campus
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="7"> Mentor/Mentee
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="8"> College
                      <span></span>
                    </label>

                    <label class="m-radio">
                      <input type="radio" name="level_id" value="9"> MDS
                      <span></span>
                    </label>

                    <label class="m-radio">
                      <input type="radio" name="level_id" value="9"> Bicara Interaktif Siswa
                      <span></span>
                    </label>

                  </div>
                </div>
                <div class="form-group">
                  <label for="dept_name" class="form-control-label">Expected Budget (RM)</label>
                  <input type="number" step="0.01" class="form-control" name="budget" id="budget" placeholder="RM " value="0.00">
                </div>
                <div class="form-group">
      						<label for="Name"><b>Budget From</b></label>

      							<select class="custom-select form-control" name="kew_id">
      								<option selected>Select Budget</option>
      								<?php
      								$sql_events1 = mysqli_query($connection, "select * from kew order by kew_name ") or die (mysqli_error());
      								while ($row = mysqli_fetch_array($sql_events1)) {


      									$kew_id = $row['kew_id'];
      									$kew_name = $row['kew_name'];
      								?>
      								<option value="<?php echo $kew_id ?> "> <?php echo $kew_name ?></option>
      								<?php
      									}
      								?>
      							</select>
      					</div>
                <div class="form-group">
                  <label for="dept_name" class="form-control-label">Expected Audience (Total)</label>
                  <input type="number" class="form-control" name="total_pax" id="total_pax" value="0">
                </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Open to Public?</label>
                  <div class="m-radio-inline">
                    <label class="m-radio">
                      <input type="radio" name="dept_allow" value="y"> Yes
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="dept_allow" value="n" checked> No
                      <span></span>
                    </label>
                </div>
                <input type="hidden" id="sxid" name="sxid" value="<?php echo $sxid ?>">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
              </form>
          </div>
        </div>
      </div>

      <!--end::Modal-->

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
      <script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
      <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
  		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>


    <script>
    $(document).ready( function () {
    $('#m_table_1').DataTable();
      } );
    </script>

	</body>
	<!-- end::Body -->
   <?php include("footer.php"); ?>
</html>
