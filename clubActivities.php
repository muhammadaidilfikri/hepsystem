<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$sxid = $_SESSION["username"];
$user_role = $_SESSION["role"] ?? 'staff'; // Default to staff if role not set

$c_id = ($user_role == 'moderator') ? checkMyClubID($sxid) : null;

if (!$c_id) {
    foreach (['advisors', 'club_moderators'] as $table) {
        if (mysqli_num_rows(mysqli_query($connection, "SHOW TABLES LIKE '$table'"))) {
            $result = mysqli_query($connection, "SELECT club_id FROM $table WHERE staff_id = '$sxid' LIMIT 1");
            if ($result && mysqli_num_rows($result)) {
                $c_id = mysqli_fetch_assoc($result)['club_id'];
                break;
            }
        }
    }
}

// Get active semester
$active_semester_result = mysqli_query($connection, "SELECT kod_sem, sem_english FROM semesters WHERE is_active = 1 LIMIT 1");
$has_active_semester = ($active_semester_result && mysqli_num_rows($active_semester_result) > 0);

if ($has_active_semester) {
    $row = mysqli_fetch_assoc($active_semester_result);
    $active_semester = $row['kod_sem'];
    $active_semester_name = $row['sem_english'];
} else {
    $active_semester = $active_semester_name = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | My club Activities</title>
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
                          Registered Club
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
                          <div class="progress-bar m--bg-danger" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                          Total Registered Students
                        </span>
                        <span class="m-widget24__number">
                          78%
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

            <!-- Current Semester Display -->
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="m-section">
                        <div class="m-section__content">
                            <?php if ($has_active_semester): ?>
                                <h4>Current Active Semester: <?php echo $active_semester . ' - ' . $active_semester_name; ?></h4>
                            <?php else: ?>
                                <h4 class="m--font-danger">No Active Semester - Please activate a semester to manage activities</h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- begin section -->

          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    My Club Activities
                    <?php if (!empty($c_id)): ?>
                      <small class="m--font-info">(Filtered by your club)</small>
                    <?php else: ?>
                      <small class="m--font-info">(All clubs)</small>
                    <?php endif; ?>
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                    <?php if ($has_active_semester): ?>
                        <button type="button" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-toggle="modal" data-target="#m_modal_add"><i class="la la-plus"></i> New Activities</button>
                    <?php else: ?>
                        <button type="button" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" disabled title="No active semester"><i class="la la-plus"></i> New Activities</button>
                    <?php endif; ?>
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
                    <th>ID</th>
                    <th>Activities / Events</th>
                    <th>Organized By</th>
                    <th>Semester</th>
                    <th>Date &amp Time</th>
                    <th>Registered</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // Get activities for current semester with proper JOINs
                    if ($has_active_semester) {
                        $sql_events = "SELECT ca.*, c.club_name, s.sem_english 
                                       FROM club_activities ca 
                                       JOIN club c ON ca.club_id = c.club_id 
                                       LEFT JOIN semesters s ON ca.kod_sem = s.kod_sem 
                                       WHERE ca.kod_sem = '$active_semester'";
                        if (!empty($c_id)) {
                            $sql_events .= " AND ca.club_id = '$c_id'";
                        }
                        $sql_events .= " ORDER BY ca.date_start ASC";
                        $sql_events = mysqli_query($connection, $sql_events);
                    } else {
                        $sql_events = mysqli_query($connection, "SELECT * FROM club_activities WHERE 1=0");
                    }

                  $z =1;
                  $resultSearch = "";
                  $regError = 0;
                  
                  if (mysqli_num_rows($sql_events) > 0) {
                      while ($row = mysqli_fetch_array($sql_events)) {

                        $act_id = $row["act_id"];
                        $club_id = $row["club_id"];
                        $act_name = $row["act_name"];
                        $date_s = date_create($row["date_start"]);
                        $date_e = date_create($row["date_end"]);
                        $total_pax = $row["total_pax"];
                        $club_stat = $row["club_stat"];
                        $club_name = $row["club_name"] ?? ''; // Fixed: Added null coalescing
                        $location = $row["location"];
                        $level_id = $row["level_id"];
                        $budget = $row["budget"];
                        $act_allow = $row["act_allow"];
                        $kod_sem = $row["kod_sem"];
                        $sem_english = $row["sem_english"] ?? ''; // Fixed: Added null coalescing
                        $token = $row["token"];

                        if ($act_allow=='y')
                        {
                          $allow = "Yes";
                        }
                        else {
                          $allow = "No";
                        }

                        if ($club_stat=='p')
                        {
                          $c_stat = "<span class=\"m--font-warning\">Pending</span>";
                        }
                        else if ($club_stat=='a')
                        {
                          $c_stat = "<span class=\"m--font-success\">Approved</span>";
                        }
                        else if ($club_stat=='x')
                        {
                          $c_stat = "<span class=\"m--font-danger\">Postponed</span>";
                        }
                        else if ($club_stat=='r')
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
                          $lvl = "Club";
                        }
                        else if ($level_id==8)
                        {
                          $lvl = "College";
                        }
                  ?>
                  <tr>
                    <th scope="row"><?php echo $z ?></th>
                    <td><?php echo $act_id ?></td>
                    <td><?php echo $act_name ?> <br><br>
                      <?php
                      if($club_stat!='a')
                      {

                      }
                      else {
                      ?>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=c&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Committee" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Committee</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=p&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Participant" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Contestant</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=a&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Add Audience" class="btn btn-primary m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Audience</span>
                        </span>
                      </a>
                      <a href="RegisteredList.php?act_id=<?php echo $act_id ?>&amp;resultSearch=<?php echo $resultSearch ?>&amp;regError=<?php echo $regError ?>" title="Overall List" class="btn btn-info m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-list"></i>
                          <span>Overall List</span>
                        </span>
                      </a>
                      <?php
                      }
                      ?>
                    </td>
                    <td><?php echo $club_name ?></td>
                    <td><strong><?php echo $kod_sem; ?></strong><br><?php echo $sem_english; ?></td>
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
                      <br>
                      <?php echo date_format($date_s, 'G:i a'); ?> to <?php echo date_format($date_e, 'G:i a'); ?>
                      </td>
                    <td><b><?php echo countClubStdRegistered($act_id) ?></b></td>
                    <td><?php echo $lvl?></td>
                    <td><?php echo $c_stat ?></td>
                    <td>
                      <a href="editActivityMod.php?act_id=<?php echo $token ?>" class="btn btn-warning m-btn btn-sm 	m-btn m-btn--icon">
                        <span>
                          <i class="fa flaticon-edit-1"></i>
                          <span>Edit</span>
                        </span>
                      </a>
                      <button type="button" class="btn btn-danger m-btn btn-sm m-btn--icon" onclick="confirmDelete('<?php echo $token; ?>', '<?php echo addslashes($act_name); ?>')">
                        <span>
                          <i class="fa flaticon-delete"></i>
                          <span>Remove</span>
                        </span>
                      </button>
                    </td>

                  </tr>
                  <?php
                  $z++;
                    }
                  } else {
                    ?>
                    <tr>
                        <td colspan="10" class="text-center">
                            <?php if (!$has_active_semester): ?>
                                <div class="m-alert m-alert--icon m-alert--outline alert alert-warning" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="la la-warning"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        <strong>No active semester found.</strong> Please activate a semester to view activities.
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="m-alert m-alert--icon m-alert--outline alert alert-info" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="la la-info-circle"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        <strong>No activities found for the current semester.</strong> 
                                        <?php if (!empty($c_id)): ?>
                                            Create a new activity to get started.
                                        <?php else: ?>
                                            No activities available for your accessible clubs.
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
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

              <form action="createActivityMod.php" method="post">
                <!-- Current Semester Display (Read Only) -->
                <div class="form-group">
                  <label class="form-control-label"><strong>Current Semester</strong></label>
                  <?php if ($has_active_semester): ?>
                    <input type="text" class="form-control" value="<?php echo $active_semester . ' - ' . $active_semester_name; ?>" readonly style="background-color: #f8f9fa; font-weight: bold;">
                    <input type="hidden" name="kod_sem" value="<?php echo $active_semester; ?>">
                  <?php else: ?>
                    <input type="text" class="form-control" value="No Active Semester" readonly style="background-color: #f8f9fa; font-weight: bold; color: #dc3545;">
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <label for="act_name" class="form-control-label">Activity / Event Name</label>
                  <input type="text" class="form-control" name="act_name" id="act_name" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                </div>

              <div class="form-group">
                <label for="Name"><b>Organized By</b></label>
                <select class="custom-select form-control" name="club_id" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                    <?php
                    if (!empty($c_id)) {
                        // If user has specific club, preselect it
                        $club_query = mysqli_query($connection, "SELECT club_id, club_name FROM club WHERE club_id = '$c_id'");
                        if ($club_query && mysqli_num_rows($club_query) > 0) {
                            $club_row = mysqli_fetch_assoc($club_query);
                            echo "<option value=\"{$club_row['club_id']}\" selected>{$club_row['club_name']}</option>";
                        } else {
                            echo "<option value=\"\">No club assigned</option>";
                        }
                    } else {
                        // If user can see all clubs, show dropdown with all clubs
                        echo "<option value=\"\">Select Club Name</option>";
                        $sql_events1 = mysqli_query($connection, "SELECT * FROM club ORDER BY club_name") or die(mysqli_error($connection));
                        while ($row = mysqli_fetch_array($sql_events1)) {
                            $club_id = $row['club_id'];
                            $club_name = $row['club_name'];
                            echo "<option value=\"$club_id\">$club_name</option>";
                        }
                    }
                    ?>
                </select>
              </div>

                <div class="form-group">
                  <label for="location" class="form-control-label">Location</label>
                  <input type="text" class="form-control" name="location" id="location" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                </div>

              <div class="form-group">
                <label for="date_start" class="form-control-label">Date Start</label>
                    <div class="input-group date" data-z-index="1100">
                      <input type="text"  name="date_start"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" data-date-format="yyyy-m-d H:i:s" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required />
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
                        <input type="text"  name="date_end"  class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" data-date-format="yyyy-m-d H:i:s" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="la la-calendar-check-o glyphicon-th"></i>
                          </span>
                        </div>
                      </div>
                  </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Activity / Event Level </label>
                  <div class="m-radio-inline">
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="1" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> International
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="2" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> National
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="3" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> State
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="4" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> District
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="5" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> University
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="6" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> Campus
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="7" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> Club
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="level_id" value="8" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> College
                      <span></span>
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="club_name" class="form-control-label">Expected Budget (RM)</label>
                  <input type="number" step="0.01" class="form-control" name="budget" id="budget" placeholder="RM " value="0.00" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                </div>
                <div class="form-group">
                  <label for="Name"><b>Budget From</b></label>
                    <select class="custom-select form-control" name="kew_id" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                      <option value='0'>No Fund</option>
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
                  <label for="club_name" class="form-control-label">Expected Audience (Total)</label>
                  <input type="number" class="form-control" name="total_pax" id="total_pax" value="0" <?php echo !$has_active_semester ? 'disabled' : ''; ?> required>
                </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Allow others (than your club members) to Register?</label>
                  <div class="m-radio-inline">
                    <label class="m-radio">
                      <input type="radio" name="act_allow" value="y" <?php echo !$has_active_semester ? 'disabled' : ''; ?>> Yes
                      <span></span>
                    </label>
                    <label class="m-radio">
                      <input type="radio" name="act_allow" value="n" checked <?php echo !$has_active_semester ? 'disabled' : ''; ?>> No
                      <span></span>
                    </label>
                </div>

            </div>

            <div class="form-group">
            <label for="Name"><b>Activity Status</b></label>
            <div class="m-radio-inline">
                <label class="m-radio">
                  <input type="radio" name="club_stat" value="p" checked <?php echo !$has_active_semester ? 'disabled' : ''; ?> /> Pending Approval
                  <span></span>
                </label>
                <label class="m-radio">
                  <input type="radio" name="club_stat" value="a" <?php echo !$has_active_semester ? 'disabled' : ''; ?> /> Approved
                  <span></span>
                </label>
                <label class="m-radio">
                  <input type="radio" name="club_stat" value="r" <?php echo !$has_active_semester ? 'disabled' : ''; ?> /> Rejected
                  <span></span>
                </label>
                <label class="m-radio">
                  <input type="radio" name="club_stat" value="x" <?php echo !$has_active_semester ? 'disabled' : ''; ?> /> Postponed
                  <span></span>
                </label>
            </div>
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" <?php echo !$has_active_semester ? 'disabled' : ''; ?>>Save</button>
            </div>
              </form>
          </div>
        </div>
      </div>

      <!--end::Modal-->

      <!-- end:: Body -->
    <?php include("footer.php"); ?>
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
      
    // delete confirmation function
    function confirmDelete(actId, actName) {
      if (confirm('Are you sure you want to remove the activity: "' + actName + '"?\n\nThis action cannot be undone.')) {
        window.location.href = 'deleteClubActivity.php?act_id=' + actId;
      }
    }
    </script>

</body>
<!-- end::Body -->
</html>