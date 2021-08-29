<?php
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'functions.php';
require_once  dirname(__FILE__).DIRECTORY_SEPARATOR.'koneksi'.DIRECTORY_SEPARATOR.'koneksi.php';
session_start();

// Cek Session Apakah Sudah Login?
    // Redirect ke index.php, lalu dari index ke /dashboard
if (isset($_SESSION['username']) && !isset($_POST['submitLogin'])) {
    // echo $_SESSION['userName']; // DEBUGG
    if ($_SESSION['username'] != "" || $_SESSION['username'] !=NULL ) {
        header("Location: index.php");
    }
}
// ===================================

/* CONTROLLER LOGIN */
$FLAG_LOGIN = 0; // 0 - Belum Ada Aksi, 1 - Login berhasil, -1 - Login Gagal

// ALGORITMA
// Cek Apakah sudah submit ? - Method POST
    // (IF TRUE)
        // Verifikasi USER BENAR ATAU TIDAK
        // (IF BENAR)
            // AMBIL DATA BERKAITAN DENGAN USER ex: userName, Role
            // MASUKAN KE SESSION
            // RETURN FLAG_LOGIN =  1 - Login berhasil
        // (ELSE SALAH)
            // CLEAR SESSION
            // RETURN FLAG_LOGIN =  -1 - Login Gagal

    // (ELSE FALSE)
        // RETURN FLAG_LOGIN =  0 - Belum Ada Aksi

if (isset($_POST['submitLogin'])) { // Cek Apakah sudah submit ? - Method POST
    // AMBIL DATA USER INPUT
    $username = $_POST['usernameLogin'];
    $password = $_POST['passwordLogin'];

    // ==== KONEKSI DATABASE
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }
    // ====== END KONEKSI

    $sqlCekUser = sprintf("SELECT * FROM `tbl_user` WHERE `username` = '%s' AND `password` = '%s'", $username, $password); // Verifikasi USER BENAR ATAU TIDAK
    $hasil = $koneksi -> query($sqlCekUser);

    if ((int)$hasil->num_rows > 0) {      // JIKA BENAR -- ADA DATA/USER VALID
        $username = "";
        $password = "";
        $role = "";
        $id_user = "";
        $nama_akun = "";

        if($row = $hasil->fetch_assoc()) { // AMBIL DATA BERKAITAN DENGAN USER ex: userName, Role
            //echo "id: " . $row["id_user"]. " - Name: " . $row["username"]. " password " . $row["password"]. "<br>"; // DEBUGG
            $id_user = $row["id_user"];
            $nama_akun = $row["nama_akun"];
            $username = $row["username"];
            $password = $row["password"];
            $role = $row["role"];
        }

        // MASUKAN KE SESSION
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama_akun'] = $nama_akun;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = strtolower($role);

        $FLAG_LOGIN = 1; // BERHASIL

    }
    else { // JIKA BENAR --  TIDAK ADA DATA/USER TIDAK VALID
        //  echo "USER ATAU PASSOWORD SALAH"; // DEBUGG

        // RESET SESSION
        $_SESSION['id_user']    = NULL;
        $_SESSION['nama_akun']  = NULL;
        $_SESSION['username']   = NULL;
        $_SESSION['password']   = NULL;
        $_SESSION['role']       = NULL;

        $FLAG_LOGIN = -1; // USER PASS SALAH
    }
}
else { // Tidak Submit
    $FLAG_LOGIN = 0; // TIDAK ADA AKSI
}

//printHallo();
// ========================================
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> LIMS </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/elements/alert.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">

</head>

<body class="form p-2">
<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    <h2 class="">Login Page</h2>
                    <?php
                        if ($FLAG_LOGIN == 1) {
                            echo '
                                    <div class="alert alert-success mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                        <strong> Login Success! </strong> <br> Please wait :)</button>
                                    </div> 
                                    <script>
                                         setTimeout(function(){
                                            window.location.href = "index.php";
                                         }, 500);
                                      </script>
                                    ';
                        } else if ($FLAG_LOGIN == -1) {
                            echo '
                                    <div class="alert alert-danger mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                        <strong>Login Failed!</strong> <br> Please Check Your Password :(
                                    </div>
                                    ';
                        }
                        else { // FLAG LOGIN = 0
                            // pass
                        }
                    ?>

                    <div class="division">
                    </div>
<!--                    --><?php //echo dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'functions.php'; ?>
                    <form class="text-left" method="POST">
                        <div class="form">
                            <div id="username-field" class="field-wrapper input">
                                <label for="username">Username </label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input id="username" name="usernameLogin" type="text" class="form-control" placeholder="Username">
                            </div>

                            <div id="password-field" class="field-wrapper input">
                                <label for="password">Password</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input id="password" name="passwordLogin" type="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">LOGIN</button>
                                </div>
                            </div>
                            <input type="hidden" name="submitLogin" value="submited"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="plugins/highlight/highlight.pack.js"></script>
<script src="assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/js/scrollspyNav.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>