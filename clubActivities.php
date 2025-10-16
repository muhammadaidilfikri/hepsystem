<?php
session_start();
include ("dbconnect.php");
include("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
$sxid = $_SESSION["username"];
$c_id = checkMyClubID($_SESSION["username"]);

// Get current active semester
$current_semester = getCurrentActiveSemester();

// Function to get current active semester
function getCurrentActiveSemester() {
    global $connection;
    $query = "SELECT kod_sem FROM semesters WHERE is_active = 1 LIMIT 1";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['kod_sem'];
    }
    return null;
}

// Function to get semester name
function getSemesterName($kod_sem) {
    global $connection;
    if (!$kod_sem) return 'No Semester';
    $query = "SELECT sem_english FROM semesters WHERE kod_sem = '$kod_sem'";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['sem_english'];
    }
    return 'Unknown Semester';
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
		<meta charset="utf-8" />
		<title>CRS | My club Activities</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
        <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    	<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
	</head>
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<?php include ("menuheader.php")?>
			<div class="m-grid_item m-grid_item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<?php include ("mainmenu.php")?>
				<div class="m-grid_item m-grid_item--fluid m-wrapper">
          <div class="m-content">
            <div class="m-portlet ">
              <div class="m-portlet_body  m-portlet_body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                  <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                      <div class="m-widget24__item">
                        <h4 class="m-widget24__title">Club</h4>
                        <br>
                        <span class="m-widget24__desc">Total Club</span>
                        <span class="m-widget24__stats m--font-brand"><?php echo countClub() ?></span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">Registered Club</span>
                        <span class="m_widget24__number">-0%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                      <div class="m-widget24__item">
                        <h4 class="m-widget24__title">Advisor</h4>
                        <br>
                        <span class="m-widget24__desc">Total Advisors</span>
                        <span class="m-widget24__stats m--font-info"><?php echo countAdvisor()?></span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">Registered Advisor(s)</span>
                        <span class="m-widget24__number">-0%</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                      <div class="m-widget24__item">
                        <h4 class="m-widget24__title">Student</h4>
                        <br>
                        <span class="m-widget24__desc">Total Student Offered</span>
                        <span class="m-widget24__stats m--font-danger"><?php echo countStudent() ?></span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-danger" role="progressbar" style="width: 89%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">Total Registered Students</span>
                        <span class="m-widget24__number">89%</span>
                      </div>
                    </div>
                  </div>
                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="m-widget24">
                      <div class="m-widget24__item">
                        <h4 class="m-widget24__title">Club Registrations</h4>
                        <br>
                        <span class="m-widget24__desc">Total Student Registered</span>
                        <span class="m-widget24__stats m--font-success"><?php echo countStudentRegistered() ?></span>
                        <div class="progress m-progress--sm">
                          <div class="progress-bar m--bg-success" role="progressbar" style="width: 2%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">Total Opening</span>
                        <span class="m-widget24__number">
                          <?php $tot = countClub()*50; echo $tot; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text">
                    My Club Activities 
                    <?php if ($current_semester): ?>
                      <small class="text-success">(Current Semester: <?php echo $current_semester . ' - ' . getSemesterName($current_semester); ?>)</small>
                    <?php else: ?>
                      <small class="text-danger">(No Active Semester)</small>
                    <?php endif; ?>
                  </h3>
                </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                    <button type="button" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" data-toggle="modal" data-target="#m_modal_add" <?php echo !$current_semester ? 'disabled' : ''; ?>>
                      <i class="la la-plus"></i> New Activities
                    </button>
                    <?php if (!$current_semester): ?>
                      <small class="text-danger">No active semester selected</small>
                    <?php endif; ?>
                  </li>
                </ul>
              </div>
            </div>
            <div class="m-portlet__body">
              <?php if (!$current_semester): ?>
                <div class="alert alert-warning" role="alert">
                  <strong>No active semester!</strong> Please activate a semester to view and create activities.
                </div>
              <?php endif; ?>

              <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Activities / Events</th>
                    <th>Organized By</th>
                    <th>Date &amp Time</th>
                    <th>Semester</th>
                    <th>Registered</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($current_semester) {
                    // MODIFIED QUERY: Only show activities from current semester
                    $sql_events = mysqli_query($connection, "
                        SELECT ca.*, c.club_name, s.sem_english
                        FROM club_activities ca 
                        LEFT JOIN club c ON ca.club_id = c.club_id 
                        LEFT JOIN semesters s ON ca.kod_sem = s.kod_sem 
                        WHERE ca.kod_sem = '$current_semester'
                        ORDER BY ca.date_start DESC
                    ") or die(mysqli_error($connection));
                    
                    $z = 1;
                    
                    if (mysqli_num_rows($sql_events) > 0) {
                      while ($row = mysqli_fetch_array($sql_events)) {
                        $act_id = $row["act_id"];
                        $club_id = $row["club_id"];
                        $act_name = $row["act_name"];
                        $date_s = date_create($row["date_start"]);
                        $date_e = date_create($row["date_end"]);
                        $total_pax = $row["total_pax"];
                        $club_stat = $row["club_stat"];
                        $club_name = $row["club_name"];
                        $location = $row["location"];
                        $level_id = $row["level_id"];
                        $budget = $row["budget"];
                        $act_allow = $row["act_allow"];
                        $kod_sem = $row["kod_sem"];
                        $sem_english = $row["sem_english"];

                        if ($act_allow=='y') {
                          $allow = "Yes";
                        } else {
                          $allow = "No";
                        }

                        if ($club_stat=='p') {
                          $c_stat = "<span class=\"m--font-warning\">Pending</span>";
                        } else if ($club_stat=='a') {
                          $c_stat = "<span class=\"m--font-success\">Approved</span>";
                        } else if ($club_stat=='x') {
                          $c_stat = "<span class=\"m--font-danger\">Postponed</span>";
                        } else if ($club_stat=='r') {
                          $c_stat = "<span class=\"m--font-danger\">Rejected</span>";
                        }

                        if ($level_id==1) {
                          $lvl = "International";
                        } else if ($level_id==2) {
                          $lvl = "National";
                        } else if ($level_id==3) {
                          $lvl = "State";
                        } else if ($level_id==4) {
                          $lvl = "District";
                        } else if ($level_id==5) {
                          $lvl = "University";
                        } else if ($level_id==6) {
                          $lvl = "Campus";
                        } else if ($level_id==7) {
                          $lvl = "Club";
                        } else if ($level_id==8) {
                          $lvl = "College";
                        }
                  ?>
                  <tr>
                    <th scope="row"><?php echo $z ?></th>
                    <td><?php echo $act_id ?></td>
                    <td>
                      <?php echo $act_name ?>
                      <br><br>
                      <?php
                      if($club_stat!='a') {
                        // No action buttons if not approved
                      } else {
                      ?>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=c" title="Add Committee" class="btn btn-primary m-btn btn-sm m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Committee</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=p" title="Add Participant" class="btn btn-primary m-btn btn-sm m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Contestant</span>
                        </span>
                      </a>
                      <a href="registerStdActivity-a.php?act_id=<?php echo $act_id ?>&amp;regpoint=a" title="Add Audience" class="btn btn-primary m-btn btn-sm m-btn--icon">
                        <span>
                          <i class="fa flaticon-user-add"></i>
                          <span>Audience</span>
                        </span>
                      </a>
                      <a href="RegisteredList.php?act_id=<?php echo $act_id ?>" title="Overall List" class="btn btn-info m-btn btn-sm m-btn--icon">
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
                    <td>
                      <?php
                      if (date_format($date_s, 'd/m/y')==date_format($date_e, 'd/m/y')) {
                        echo date_format($date_s, 'd/m/Y');
                      } else {
                        echo date_format($date_s, 'd/m'); ?> to <?php echo date_format($date_e, 'd/m/Y');
                      }
                      ?>
                      <br>
                      <?php echo date_format($date_s, 'G:i a'); ?> to <?php echo date_format($date_e, 'G:i a'); ?>
                    </td>
                    <td>
                      <?php echo $kod_sem ? $kod_sem : 'N/A'; ?>
                      <?php if ($sem_english): ?>
                        <br><small>(<?php echo $sem_english; ?>)</small>
                      <?php endif; ?>
                    </td>
                    <td><b><?php echo countClubStdRegistered($act_id) ?></b></td>
                    <td><?php echo $lvl?></td>
                    <td><?php echo $c_stat ?></td>
                    <td>
                      <a href="editActivityMod.php?act_id=<?php echo $act_id ?>" class="btn btn-warning m-btn btn-sm m-btn--icon">
                        <span>
                          <i class="fa flaticon-edit-1"></i>
                          <span>Edit</span>
                        </span>
                      </a>
                      <a href="deleteClubActivity.php?act_id=<?php echo $act_id ?>" class="btn btn-danger m-btn btn-sm m-btn--icon">
                        <span>
                          <i class="fa flaticon-edit-1"></i>
                          <span>Delete Activity</span>
                        </span>
                      </a>
                    </td>
                  </tr>
                  <?php
                        $z++;
                      }
                    } else {
                      echo '<tr><td colspan="10" class="text-center">No activities found for current semester.</td></tr>';
                    }
                  } else {
                    echo '<tr><td colspan="10" class="text-center">Please activate a semester to view activities.</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>

				</div>
			</div>

      <div class="modal fade" id="m_modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Add New Activity / Event 
                <?php if ($current_semester): ?>
                  <small class="text-success">(Current Semester: <?php echo $current_semester . ' - ' . getSemesterName($current_semester); ?>)</small>
                <?php endif; ?>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="createActivityMod.php" method="post">
                <input type="hidden" name="kod_sem" value="<?php echo $current_semester; ?>">
                <div class="form-group">
                  <label for="act_name" class="form-control-label">Activity / Event Name</label>
                  <input type="text" class="form-control" name="act_name" id="act_name" required>
                </div>
                <div class="form-group">
    						<label for="Name"><b>Organized By</b></label>
    							<select class="custom-select form-control" name="club_id" required>
    								<option value="">Select Club Name</option>
    								<?php
    								$sql_events1 = mysqli_query($connection, "select * from club order by club_name ") or die (mysqli_error());
    								while ($row = mysqli_fetch_array($sql_events1)) {
    									$club_id = $row['club_id'];
    									$club_name = $row['club_name'];
    									echo '<option value="'.$club_id.'">'.$club_name.'</option>';
    								} ?>
    							</select>
    					</div>
                <div class="form-group">
                  <label for="location" class="form-control-label">Location</label>
                  <input type="text" class="form-control" name="location" id="location" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Current Semester</label>
                  <input type="text" class="form-control" value="<?php echo $current_semester ? $current_semester . ' - ' . getSemesterName($current_semester) : 'No Active Semester'; ?>" readonly disabled>
                </div>
                <div class="form-group">
                  <label for="date_start" class="form-control-label">Date Start</label>
                    <div class="input-group date" data-z-index="1100">
                      <input type="text" name="date_start" class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2_modal" required />
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="la la-calendar-check-o glyphicon-th"></i>
                        </span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="date_end" class="form-control-label">Date End</label>
                      <div class="input-group date" data-z-index="1100">
                        <input type="text" name="date_end" class="form-control m-input" readonly placeholder="Select date & time" id="m_datetimepicker_2" required />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="la la-calendar-check-o glyphicon-th"></i>
                          </span>
                        </div>
                      </div>
                  </div>
                <div class="form-group">
                  <label class="form-control-label">Activity Level</label>
                  <div class="m-radio-inline">
                    <label class="m-radio"><input type="radio" name="level_id" value="1" required> International<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="2"> National<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="3"> State<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="4"> District<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="5"> University<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="6"> Campus<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="7"> Club<span></span></label>
                    <label class="m-radio"><input type="radio" name="level_id" value="8"> College<span></span></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="budget" class="form-control-label">Expected Budget (RM)</label>
                  <input type="number" step="0.01" class="form-control" name="budget" id="budget" value="0.00" required>
                </div>
                <div class="form-group">
      						<label><b>Budget From</b></label>
      							<select class="custom-select form-control" name="kew_id" required>
      								<option value="">Select Budget From</option>
                      <option value='0'>No Fund</option>
      								<?php
      								$sql_events1 = mysqli_query($connection, "select * from kew order by kew_name ") or die (mysqli_error());
      								while ($row = mysqli_fetch_array($sql_events1)) {
      									$kew_id = $row['kew_id'];
      									$kew_name = $row['kew_name'];
      									echo '<option value="'.$kew_id.'">'.$kew_name.'</option>';
      								} ?>
      							</select>
      					</div>
                <div class="form-group">
                  <label for="total_pax" class="form-control-label">Expected Audience (Total)</label>
                  <input type="number" class="form-control" name="total_pax" id="total_pax" value="0" required>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Allow others to Register?</label>
                  <div class="m-radio-inline">
                    <label class="m-radio"><input type="radio" name="act_allow" value="y"> Yes<span></span></label>
                    <label class="m-radio"><input type="radio" name="act_allow" value="n" checked> No<span></span></label>
                  </div>
                </div>
                <div class="form-group">
                  <label><b>Activity Status</b></label>
                  <div class="m-radio-inline">
                    <label class="m-radio"><input type="radio" name="club_stat" value="p" checked> Pending Approval<span></span></label>
                    <label class="m-radio"><input type="radio" name="club_stat" value="a"> Approved<span></span></label>
                    <label class="m-radio"><input type="radio" name="club_stat" value="r"> Rejected<span></span></label>
                    <label class="m-radio"><input type="radio" name="club_stat" value="x"> Postponed<span></span></label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" <?php echo !$current_semester ? 'disabled' : ''; ?>>Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

			<?php include("footer.php"); ?>
		</div>
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
      
      <script src="assets/vendors/base/vendors.bundle.js"></script>
  		<script src="assets/demo/default/base/scripts.bundle.js"></script>
  		<script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>
      <script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datetimepicker.js"></script>

    <script>
    $(document).ready( function () {
      $('#m_table_1').DataTable({
        "order": [[ 0, "asc" ]],
        "pageLength": 10
      });
    });
    </script>

	</body>
</html>