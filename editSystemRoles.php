<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

// Validate session
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

// Get staffID (actually token) from URL
$token = filter_input(INPUT_GET, "staffID", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!$token) {
    die("Invalid or missing staff token.");
}

// Fetch staff details
$sql = " select a.staffID, a.nama, a.email, r.roletitle, s.roleid, s.is_active, s.token, s.updated_at from acstaff a left join sysrole_acstaff s on a.staffID = s.staffID left join sysroles r on s.roleid = r.roleid where s.token = '$token'";
$result = mysqli_query($connection, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Staff record not found or invalid token.");
}

$staff = mysqli_fetch_assoc($result);
$staffToken = $staff['token'];

// Fetch all roles
$roles = [];
$roleQuery = mysqli_query($connection, "select * from sysroles order by roleid asc");
while ($row = mysqli_fetch_assoc($roleQuery)) {
    $roles[] = $row;
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $roleid = $_POST['role'];
    $access = $_POST['allow_access'] ?? '';
    $active = ($access === 'YES') ? 1 : 0;
    $token = $_POST['token']; 
    $updated_at = date("Y-m-d H:i:s");

    $stmt = $connection->prepare("UPDATE sysrole_acstaff SET roleid=?, updated_at=?, is_active=? WHERE token=?");
    $stmt->bind_param("ssis", $roleid, $updated_at, $active, $token);

    if ($stmt->execute()) {
        echo "<script>
            alert('Staff role and access updated successfully!');
            window.location.href='systemRoles.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($connection) . "');</script>";
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | Edit System Roles</title>
    <meta name="description" content="Edit staff role and access">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function() { sessionStorage.fonts = true; }
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" />
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed 
             m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark 
             m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page">

    <?php include("menuheader.php"); ?>

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <?php include("mainmenu.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content">

                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Edit Staff Role</h3>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__body">
                        <div class="card">
                            <div class="card-header" style="background:#F7FBFF; color:black;">Staff Details</div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label>Staff No</label>
                                            <input type="text" name="staffID" value="<?php echo htmlspecialchars($staff['staffID']); ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?php echo htmlspecialchars($staff['email']); ?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label>Name</label>
                                            <input type="text" name="nama" value="<?php echo htmlspecialchars($staff['nama']); ?>" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($staffToken); ?>">

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label>Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="">Select Role</option>
                                                <?php foreach ($roles as $r): ?>
                                                    <option value="<?php echo htmlspecialchars($r['roleid']); ?>" 
                                                        <?php if ($staff['roleid'] == $r['roleid']) echo 'selected'; ?>>
                                                        <?php echo htmlspecialchars($r['roletitle']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Allow Access</label>
                                            <select name="allow_access" class="form-control" required>
                                                <option value="">Select Access</option>
                                                <option value="YES" <?php echo ($staff['is_active'] == 1) ? 'selected' : ''; ?>>Yes</option>
                                                <option value="NO" <?php echo ($staff['is_active'] == 0) ? 'selected' : ''; ?>>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-start">
                                        <button type="submit" name="update" class="btn btn-primary">Save</button>
                                        <a href="systemRoles.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
</div>

<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="assets/vendors/base/vendors.bundle.js"></script>
<script src="assets/demo/default/base/scripts.bundle.js"></script>
<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="assets/app/js/dashboard.js"></script>
<script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>
</body>
</html>
