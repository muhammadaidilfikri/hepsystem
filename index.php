<?php
 session_start();
require('dbconnect.php');
require_once 'google-api/vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID_HERE');
$client->setClientSecret('YOUR_CLIENT_SECRET_HERE');
$host = $_SERVER['HTTP_HOST'];
if ($host === 'localhost') {
    $client->setRedirectUri('http://localhost/hepsystem-1/index.php');
}

$client->addScope('email');
$client->addScope('profile');
$client->setPrompt('consent');
$client->setPrompt('select_account');
$login_url = $client->createAuthUrl();

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $googleid = $google_account_info->id;
        $email = $google_account_info->email;
        $nama = $google_account_info->name;
        $profile_pic = $google_account_info->picture;

        // Allowed domain only
        $allowed = ['uitm.edu.my', 'student.uitm.edu.my'];
        $domain = substr(strrchr($email, "@"), 1);

        if (in_array($domain, $allowed)) {

            // Get staffID using email
            $stmt = $connection->prepare("SELECT staffID FROM acstaff WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $r = $result->fetch_assoc(); 
                $staffID = $r['staffID'];   
            } else {
                header("Location: index.php?warning2");
                exit();
            }
            $stmt->close();

            // Get roleID using staffID
            $stmt_role = $connection->prepare(
                "SELECT a.staffID, a.nama, a.email, s.roleid, s.roletitle 
                FROM sysrole_acstaff sa
                RIGHT JOIN acstaff a ON sa.staffID = a.staffID
                LEFT JOIN sysroles s ON sa.roleid = s.roleid
                WHERE a.staffID = ? AND a.email = ?"
            );
            $stmt_role->bind_param("is", $staffID, $email);
            $stmt_role->execute();
            $result_role = $stmt_role->get_result();
            
            if ($result_role->num_rows > 0) {
                $r_role = $result_role->fetch_assoc();
                $roleid = $r_role['roleid'];
            } else {
                $roleid = 99; // default role id
            }
            $stmt_role->close();
   
            $_SESSION["loggedin"] = true;
            $_SESSION['username'] = $staffID;
            $_SESSION['email'] = $email;   
            $_SESSION['nama'] = $nama;
            $_SESSION['profile_pic'] = $profile_pic;
            $_SESSION['roleid'] = $roleid;

            header('Location: main.php');
            exit();
        } else {
            header("Location: index.php?warning2");
            exit();
        }
    } else {
        echo "Error fetching access token.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>CRS | Co-Curiculum Registration System</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>

    <!-- Base Styles -->
    <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
</head>

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled
             m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas
             m-footer--push m-aside--offcanvas-default">

<!-- Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" 
         id="m_login" style="background-image: url(assets/app/media/img//bg/bg-3.jpg);">

        <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
            <div class="m-login__container">

                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">CRS - Admin Login</h3>
                    </div>

                    <!-- Sign In Form -->
                    <form class="m-login__form m-form" action="checkLogin.php" method="post">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Staff ID" name="staffID" autocomplete="off">
                        </div>
                        <div class="form-group m-form__group">
                            <input class="form-control m-input m-login__form-input--last" type="password" placeholder="IC Number (eg 880115-01-1132)" name="nokp">
                        </div>

                        <div class="m-login__form-action">
                            <button id="m_login_signin_submit"
                                class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn"
                                style="width: 50%; padding: 10px 0; font-size: 13px;">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <!-- Google Login -->
                    <div class="m-login__form-action text-center">
                        <a href="<?php echo htmlspecialchars($login_url); ?>" 
                           class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn"
                           style="width: 50%; padding: 10px 0; font-size: 13px;">
                           Login with Google
                        </a>
                    </div>
                </div>  
                <div class="m-login__container">
                    <div class="m-login__account">
                        <span class="m-login__account-msg">
                            Copyright Reserved © 2018 - <?php echo date("Y") ?> <br>
                            Pusat Asasi Universiti Teknologi MARA.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

<!-- Base Scripts -->
<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

</body>
</html>