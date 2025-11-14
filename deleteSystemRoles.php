<!-- <?php
session_start();
include("dbconnect.php");
include("iqfunction.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$token = filter_input(INPUT_GET, "staffID", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!$token) {
    echo "<script>
            alert('Invalid token.');
            window.location.href = 'systemRoles.php';
          </script>";
    exit;
}

// Soft delete using token
$is_active = 0;
$sql = "UPDATE sysrole_acstaff 
        SET is_active = ?, deleted_at = NOW() 
        WHERE token = ?";

$stmt = $connection->prepare($sql);
$stmt->bind_param("is", $is_active, $token);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    echo "<script>
            alert('User successfully removed.');
            window.location.href = 'systemRoles.php';
          </script>";
} else {
    echo "<script>
            alert('Error deleting user or user not found.');
            window.location.href = 'systemRoles.php';
          </script>";
}

$stmt->close();
$connection->close();
?> -->
