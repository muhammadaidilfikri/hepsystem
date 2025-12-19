<?php
session_start();
include ("dbconnect.php");
include ("iqfunction.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//legends
//roleid 1 = SUPER ADMINISTRATOR
//roleid 2 = IT ADMINISTRATOR
//roleid 3 = HEP
//roleid 4 = HEA
$allowedroles = array(3,4); //roles allowed to access this page.
if (!in_array($_SESSION['roleid'], $allowedroles)) {
    header("Location: logout.php");
}

// Check for messages from add operation
$addMessage = '';
$addMessageType = '';
if(isset($_GET['add_success'])) {
    $addMessage = "Student committee position added successfully!";
    $addMessageType = 'success';
} elseif(isset($_GET['add_error'])) {
    $addMessageType = 'error';
    switch($_GET['add_error']) {
        case 'invalid_student':
            $addMessage = "Invalid student ID. Please check and try again.";
            break;
        case 'already_registered':
            $addMessage = "This student is already registered for a committee position.";
            break;
        case 'no_position':
            $addMessage = "Please select a committee position.";
            break;
        case 'database_error':
            $addMessage = "Database error. Please try again.";
            break;
        default:
            $addMessage = "Failed to add student. Please try again.";
    }
}

// Check for messages from delete operation
$deleteMessage = '';
$deleteMessageType = '';
if(isset($_GET['delete_success'])) {
    $deleteMessage = "Student committee position deleted successfully!";
    $deleteMessageType = 'success';
} elseif(isset($_GET['delete_error'])) {
    $deleteMessage = "Failed to delete student. Please try again.";
    $deleteMessageType = 'error';
}

$resultSearch = $_GET["resultSearch"] ?? '';
$regError = $_GET["regError"] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>AsidApps - Activity Student's Registrations</title>
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
			<?php include ("menuheader.php")?>
			<!-- END: Header -->
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<?php include ("mainmenu.php")?>
				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<!-- END: Subheader -->
					<div class="m-content">
            <!-- Display Add Student Messages -->
            <?php if($addMessage): ?>
                <div class="m-alert m-alert--icon m-alert--outline alert alert-<?php echo $addMessageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-<?php echo $addMessageType === 'success' ? 'check' : 'warning'; ?>"></i>
                    </div>
                    <div class="m-alert__text">
                        <?php echo $addMessage; ?>
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Display Delete Student Messages -->
            <?php if($deleteMessage): ?>
                <div class="m-alert m-alert--icon m-alert--outline alert alert-<?php echo $deleteMessageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                    <div class="m-alert__icon">
                        <i class="la la-<?php echo $deleteMessageType === 'success' ? 'check' : 'warning'; ?>"></i>
                    </div>
                    <div class="m-alert__text">
                        <?php echo $deleteMessage; ?>
                    </div>
                    <div class="m-alert__close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            
            <!-- Original Error Messages -->
            <?php if ($regError==1): ?>
              <div class="m-portlet m--bg-danger m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"><?php echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            <?php elseif ($regError==2): ?>
              <div class="m-portlet m--bg-success m-portlet--bordered-semi m-portlet--skin-dark ">
                <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text"><?php echo $resultSearch; ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            
				<div class="row">
					<div class="col-lg-12">
						<div class="m-portlet m-portlet--tab">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon m--hide">
											<i class="la la-gear"></i>
										</span>
										<h3 class="m-portlet__head-text">
											 Committee Marks Registration
										</h3>
									</div>
								</div>
							</div>

					<div class="m-portlet__body">
						<!--begin::Section-->
						<div class="m-section">
							<span class="m-section__sub">
					<form action="regComMarks.php" method="post">
						<div class="form-group m-form__group">
							<label for="stdNo"><b>Student ID</b></label>
							<div>
								<input type="text" class="form-control m-input m-input--solid" name="stdNo" id="stdNo" aria-describedby="staffID" placeholder="Enter Student ID" autofocus required>
									<span class="m-form__help">Enter the student's identification number</span>
							</div>
						</div>
            <div class="form-group">
              <label for="com_id"><b>Select Committee Position</b></label>
                <select class="custom-select form-control" name="com_id" required>
                  <option value=''>Please Select</option>
                  <?php
<<<<<<< HEAD
                  $sql_events1 = mysqli_query($connection, "SELECT * FROM com_marks ORDER BY com_name") or die (mysqli_error());
=======
                  $sql_events1 = mysqli_query($connection, "select * from com_marks kew order by com_id ");
>>>>>>> 8adae7f2bd68db182c2e6a7ce8668bda577ba77f
                  while ($row = mysqli_fetch_array($sql_events1)) {
                    $com_id = $row['com_id'];
                    $com_name = $row['com_name'];
                    $com_marks = $row['com_marks'];
                  ?>
                  <option value="<?php echo $com_id ?>"><?php echo $com_name ?> (<?php echo $com_marks ?> marks)</option>
                  <?php } ?>
                </select>
            </div>
					<div class="m-portlet__foot" align="center">
						<div class="m-form__actions">
							<button type="reset" class="btn btn-secondary">Clear</button>
							<button type="submit" class="btn btn-success">Register Student</button>
						</div>
					</div>
				</form>
				</div>
						<!--End::Section-->
					</div>
					<!--End::Row-->
				</div>
				</div>
			</div>
		</div>

    <div class="m-content">
      <div class="row">
<div class="col-lg-12">
<!--begin::Portlet-->
<div class="m-portlet" id="m_portlet">
<div class="m-portlet__head">
  <div class="m-portlet__head-caption">
    <div class="m-portlet__head-title">
      <span class="m-portlet__head-icon">
        <i class="flaticon-calendar-2"></i>
      </span>
      <h3 class="m-portlet__head-text">
        List of Registered Students
      </h3>
    </div>
  </div>
</div>
<div class="m-portlet__body">
  <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
    <thead>
      <tr>
        <th>No</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Committee Post</th>
        <th>Marks</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
<<<<<<< HEAD
      $sql_events = mysqli_query($connection, "SELECT * FROM student, regcom, com_marks WHERE student.stdNo=regcom.stdNo AND com_marks.com_id=regcom.com_id ORDER BY com_marks DESC") or die (mysqli_error());
      $z = 1;
      
      if(mysqli_num_rows($sql_events) == 0): ?>
        <tr>
          <td colspan="6" class="text-center">
            <div class="m-alert m-alert--icon m-alert--outline alert alert-info" role="alert">
              <div class="m-alert__icon">
                <i class="la la-info-circle"></i>
              </div>
              <div class="m-alert__text">
                No students registered for committee positions yet.
              </div>
            </div>
          </td>
        </tr>
      <?php else: 
        while ($row = mysqli_fetch_array($sql_events)) {
          $stdNo = $row["stdNo"];
          $com_id = $row["com_id"];
          $stdName = $row["stdName"];
          $regcom_id = $row["regcom_id"];
          $com_marks = $row["com_marks"];
          $com_name = $row["com_name"];
=======
      $sql_events = mysqli_query($connection, "select * from student, regcom, com_marks where student.stdNo=regcom.stdNo and com_marks.com_id=regcom.com_id order by com_marks desc");
      $z =1;

      while ($row = mysqli_fetch_array($sql_events)) {
        $stdNo = $row["stdNo"];
        $com_id = $row["com_id"];
        $stdName = $row["stdName"];
        $regcom_id = $row["regcom_id"];
        $com_marks = $row["com_marks"];
        $com_name = $row["com_name"];


>>>>>>> 8adae7f2bd68db182c2e6a7ce8668bda577ba77f
      ?>
      <tr>
        <th scope="row"><?php echo $z ?></th>
        <td><?php echo $stdNo ?></td>
        <td><?php echo $stdName ?></td>
        <td><?php echo $com_name ?></td>
        <td><span class="m-badge m-badge--info m-badge--wide"><?php echo $com_marks ?></span></td>
        <td>
          <button type="button" class="btn btn-danger m-btn btn-sm m-btn--icon" onclick="confirmDelete('<?php echo $regcom_id; ?>', '<?php echo addslashes($stdName); ?>')">
            <span>
              <i class="fa flaticon-delete"></i>
              <span>Delete</span>
            </span>
          </button>
        </td>
      </tr>
      <?php
        $z++;
        }
      endif;
      ?>
    </tbody>
  </table>
</div>
</div>
<!--end::Portlet-->
</div>
</div>
      <!--End::Section-->
    </div>
		</div>
	</div>
			<!-- end:: Body -->
<!-- begin::Footer -->
		  <?php include("footer.php"); ?>
			<!-- end::Footer -->
		</div>
		<!-- end:: Page -->
    		        <!-- begin::Quick Sidebar -->
		<!-- end::Quick Sidebar -->
	    <!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end::Scroll Top -->
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
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
		
		<script>
		$(document).ready(function() {
		$('#m_table_1').DataTable();
			
			// Auto-hide alerts after 5 seconds
			setTimeout(function() {
				$('.alert').alert('close');
			}, 5000);
		});
		
		// Delete confirmation function
		function confirmDelete(regcomId, studentName) {
			if (confirm('Are you sure you want to remove ' + studentName + ' from committee positions?\n\nThis action cannot be undone.')) {
				window.location.href = 'deleteRegCom.php?regcom_id=' + regcomId;
			}
		}
		</script>
	</body>
	<!-- end::Body -->
</html>