<?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$token = filter_input(INPUT_GET, "staffID", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$staffData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $staffID = mysqli_real_escape_string($connection, $_POST['staffID']);
    $sql = "select a.*, s.is_active, s.roleid from acstaff a left join sysrole_acstaff s on a.staffID = s.staffID where a.staffID = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $staffID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $staffData = $result->fetch_assoc();
    } else {
        $_SESSION['msg'] = "No staff found with Staff No: $staffID";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $stmt->close();
}

$roles = [];
$roleQuery = mysqli_query($connection, "select * from sysroles order by roleid asc");
if (!$roleQuery) {
    die("Error fetching roles: " . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($roleQuery)) {
    $roles[] = $row;
}

function getDeptID($connection, $staffID) {
    $stmt = $connection->prepare("select dept_id from dept_advisor where staffID = ?");
    $stmt->bind_param("s", $staffID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        return $row['dept_id'];
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $staffID = $_POST['staffID'];
    $role = $_POST['role'];
    $allow_access = $_POST['allow_access'] ?? '';
    $is_active = ($allow_access === 'YES') ? 1 : 0;
    $created_at = date('Y-m-d H:i:s');
    $dept_id = getDeptID($connection, $staffID);

    $checkStmt = $connection->prepare("select staffID from sysrole_acstaff where staffID = ?");
    $checkStmt->bind_param("s", $staffID);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $updateStmt = $connection->prepare("update sysrole_acstaff set roleid = ?, is_active = ?, dept_id = ? WHERE staffID = ?");
        $updateStmt->bind_param("iiis", $role, $is_active, $dept_id, $staffID);
    } else {
        $token = generateToken(32);
        $updateStmt = $connection->prepare("insert into sysrole_acstaff (staffID, roleid, is_active, token, dept_id, created_at) values (?, ?, ?, ?, ?, ?)");
        $updateStmt->bind_param("siisis", $staffID, $role, $is_active, $token, $dept_id, $created_at);
    }

    if ($updateStmt->execute()) {
        echo "<script>
            alert('Staff role and access updated successfully!');
            window.location.href = 'systemRoles.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Error updating record: " . addslashes($updateStmt->error) . "');
            history.back();
        </script>";
    }

    $updateStmt->close();
    $checkStmt->close();
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

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
                            <div class="card mb-4">
                                <div class="card-header" style="background:#F7FBFF; color:black;">Search Staff</div>
                                <div class="card-body">
                                    <form method="post" class="form-inline" style="gap:10px;">
                                        <input type="text" name="staffID" class="form-control flex-grow-1" placeholder="Enter Staff No" required>
                                        <button type="submit" name="search" class="btn btn-info">Search</button>
                                    </form>
                                </div>
                            </div>

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
                                                            <option value="<?php echo htmlspecialchars($r['roleid']); ?>" <?php if (isset($staffData['roleid']) && $staffData['roleid'] == $r['roleid']) echo 'selected'; ?>>
                                                                <?php echo htmlspecialchars($r['roletitle']); ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Allow Access</label>
                                                    <select name="allow_access" class="form-control" required>
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

    <script src="assets/vendors/base/vendors.bundle.js"></script>
    <script src="assets/demo/default/base/scripts.bundle.js"></script>
    <script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="assets/app/js/dashboard.js"></script>
    <script src="assets/vendors/custom/datatables/datatables.bundle.js"></script>
</body>
</html>