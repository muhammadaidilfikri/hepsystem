<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get staffID from URL parameter (like editSystemRoles.php?staffID=S1234)
$staffID = filter_input(INPUT_GET, "staffID", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$staffID) {
    die("Invalid staff ID");
}

// Fetch staff info with current role/access
$query = mysqli_query($connection, "
    SELECT 
        a.staffID,
        a.nama,
        a.email,
        r.roletitle,
        s.roleid,
        s.is_active,
        s.role_staff_id
    FROM acstaff a
    LEFT JOIN sysrole_acstaff s ON a.staffID = s.staffID
    LEFT JOIN sysroles r ON s.roleid = r.roleid
    WHERE a.staffID = '$staffID'
");

if (!$query || mysqli_num_rows($query) == 0) {
    die("Staff not found or not assigned any role");
}

$staff = mysqli_fetch_assoc($query);

// Fetch available roles
$roles = [];
$roleQuery = mysqli_query($connection, "SELECT * FROM sysroles ORDER BY roleid ASC");
while ($r = mysqli_fetch_assoc($roleQuery)) {
    $roles[] = $r;
}

// Handle update form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $roleid = mysqli_real_escape_string($connection, $_POST['role']);
    $allow_access = $_POST['allow_access'] ?? '';
    $is_active = ($allow_access === 'YES') ? 1 : 0;

    // Check if staff already has access
    $check = mysqli_query($connection, "SELECT * FROM sysrole_acstaff WHERE staffID='$staffID'");
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($connection, "
            UPDATE sysrole_acstaff
            SET roleid='$roleid', is_active='$is_active'
            WHERE staffID='$staffID'
        ");
    } else {
        $update = mysqli_query($connection, "
            INSERT INTO sysrole_acstaff (staffID, roleid, is_active)
            VALUES ('$staffID', '$roleid', '$is_active')
        ");
    }

    if ($update) {
        echo "<script>
            alert('Staff role and access updated successfully!');
            window.location.href='systemRoles.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
    }
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

        <!-- Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 
             m-header--fixed m-header--fixed-mobile 
             m-aside-left--enabled m-aside-left--skin-dark 
             m-aside-left--offcanvas m-footer--push 
             m-aside--offcanvas-default">

    <div class="m-grid m-grid--hor m-grid--root m-page">

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-aside-left--enabled m-aside-left--skin-dark">

    <div class="m-grid m-grid--hor m-grid--root m-page">
        <?php include("menuheader.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <?php include("mainmenu.php"); ?>

            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-subheader">
                    <h3 class="m-subheader__title">Edit Staff Role</h3>
                </div>

                <div class="m-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">Staff Role & Access</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-portlet__body">
                                    <form method="post">
                                        <div class="form-group m-form__group">
                                            <label><b>Staff ID</b></label>
                                            <input type="text" class="form-control m-input m-input--solid" value="<?php echo htmlspecialchars($staff['staffID']); ?>" readonly>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label><b>Name</b></label>
                                            <input type="text" class="form-control m-input m-input--solid" value="<?php echo htmlspecialchars($staff['nama']); ?>" readonly>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label><b>Email</b></label>
                                            <input type="email" class="form-control m-input m-input--solid" value="<?php echo htmlspecialchars($staff['email']); ?>" readonly>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label><b>Role</b></label>
                                            <select name="role" class="form-control" required>
                                                <option value="">Select Role</option>
                                                <?php foreach ($roles as $r): ?>
                                                    <option value="<?php echo $r['roleid']; ?>" 
                                                        <?php if ($staff['roleid'] == $r['roleid']) echo 'selected'; ?>>
                                                        <?php echo htmlspecialchars($r['roletitle']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group m-form__group">
                                            <label><b>Allow Access</b></label>
                                            <select name="allow_access" class="form-control">
                                                <option value="Yes" <?php echo ($staff['is_active'] == 1) ? 'selected' : ''; ?>>Yes</option>
                                                <option value="No" <?php echo ($staff['is_active'] == 0) ? 'selected' : ''; ?>>No</option>
                                            </select>
                                        </div>

                                        <div class="text-center">
                                            <a href="systemRoles.php" class="btn btn-secondary">Cancel</a>
                                            <button type="submit" name="update" class="btn btn-warning">Update</button>
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

    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
</body>
</html>
