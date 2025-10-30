<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$staffData = null;

//Search staff details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $staffID = mysqli_real_escape_string($connection, $_POST['staffID']);

    // Join acstaff with sysrole_acstaff to get is_active
    $result = mysqli_query($connection, "
        SELECT a.*, s.is_active 
        FROM acstaff a 
        LEFT JOIN sysrole_acstaff s ON a.staffID = s.staffID
        WHERE a.staffID = '$staffID'
    ");

    if ($result && mysqli_num_rows($result) > 0) {
        $staffData = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['msg'] = "No staff found with Staff No: $staffID";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

//Fetch roles for dropdown
$roles = [];
$roleQuery = mysqli_query($connection, "SELECT * FROM sysroles ORDER BY roleid ASC");
if (!$roleQuery) {
    die("Error fetching roles: " . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($roleQuery)) {
    $roles[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $staffID = mysqli_real_escape_string($connection, $_POST['staffID']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);
    $allow_access = $_POST['allow_access'] ?? '';
    $is_active = ($allow_access === 'YES') ? 1 : 0;

    $checkExist = mysqli_query($connection, "SELECT * FROM sysrole_acstaff WHERE staffID='$staffID'");

    if (mysqli_num_rows($checkExist) > 0) {
        $updateAccess = mysqli_query($connection, "
            UPDATE sysrole_acstaff
            SET roleid='$role', is_active='$is_active'
            WHERE staffID='$staffID'
        ");
    } else {
        $updateAccess = mysqli_query($connection, "
            INSERT INTO sysrole_acstaff (staffID, roleid, is_active)
            VALUES ('$staffID', '$role', '$is_active')
        ");
    }

    // ✅ Only continue if insert or update succeeded
    if ($updateAccess) {
        $query = mysqli_query($connection, "
            SELECT 
                a.staffID,
                a.nama,
                a.email,
                r.roletitle,
                s.is_active,
                s.created_at,
                s.roleid
            FROM acstaff a
            LEFT JOIN sysrole_acstaff s ON a.staffID = s.staffID
            LEFT JOIN sysroles r ON s.roleid = r.roleid
            WHERE a.staffID = '$staffID'
        ");

        // ✅ Now show popup *only after success*
        echo "<script>
            alert('Staff role and access updated successfully!');
            window.location.href = 'systemRoles.php';
        </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>CRS | System Roles</title>
    <meta name="description" content="Latest updates and statistic charts">
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

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Base Styles -->
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

        <?php include("menuheader.php"); ?>

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>

            <?php include("mainmenu.php"); ?>

            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">

                    <?php if (isset($_SESSION['msg'])): ?>
                        <div class="alert alert-info">
                            <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">Users</h3>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__body">

                            <!-- Search Section -->
                            <div class="card mb-4">
                                <div class="card-header" style="background:#F7FBFF; color:black;">Search Staff</div>
                                <div class="card-body">
                                    <form method="post" class="form-inline" style="gap:10px;">
                                        <input type="text" name="staffID" class="form-control flex-grow-1" placeholder="Enter Staff No" required>
                                        <button type="submit" name="search" class="btn btn-info">Search</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Staff Details Section -->
                            <?php if (!empty($staffData)) {
                                $isActive = $staffData['is_active'] ?? 0;
                            ?>
                                <div class="card">
                                    <div class="card-header" style="background:#F7FBFF; color:black;">Staff Details</div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <label>Staff No</label>
                                                    <input type="text" name="staffID" value="<?php echo htmlspecialchars($staffData['staffID']); ?>" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" name="email" value="<?php echo htmlspecialchars($staffData['email']); ?>" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-5">
                                                    <label>Name</label>
                                                    <input type="text" name="nama" value="<?php echo htmlspecialchars($staffData['nama']); ?>" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label>Role</label>
                                                    <select name="role" class="form-control" required>
                                                        <option value="">Select Role</option>
                                                        <?php foreach ($roles as $r) { ?>
                                                            <option value="<?php echo htmlspecialchars($r['roleid']); ?>"
                                                                <?php if (isset($staffData['role']) && $staffData['role'] == $r['roleid']) echo 'selected'; ?>>
                                                                <?php echo htmlspecialchars($r['roletitle']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Allow Access</label>
                                                    <select name="allow_access" class="form-control">
                                                        <option value="" selected>Select Access</option>
                                                        <option value="YES">Yes</option>
                                                        <option value="NO">No</option>
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
                            <?php } ?>
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

    <!-- JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>

</body>
</html>