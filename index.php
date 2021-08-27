<?php
session_start();

if (!isset($_SESSION['username'])) { // Cek Jika Belum Login
    header("Location: login.php");
}
else { // Jika Sudah
    // Cek Role
    if (strtolower((string)$_SESSION['role']) == "analyst" ) { // if Role Analyst => header to dashboard/index.php?role=analyst
        echo "BERHASIL LOGIN ANALYST";
        header("Location: dashboard/index.php?role=analyst");
    }
    else if (strtolower((string)$_SESSION['role']) == "siteman" ) { // else Role Siteman => header to dashboard/index.php?role=siteman
        header("Location: dashboard/index.php?role=siteman");
    }
}

// <div class="row">
//      <div class="col-xl-12 col-md-12 col-sm-12 col-12">
//          <select class="form-control selectpicker" id="select-country" data-live-search="true">
//              <option data-tokens="china">China</option>
//              <option data-tokens="malayasia">Malayasia</option>
//              <option data-tokens="singapore">Singapore</option>
//          </select>
//      </div>
//  </div>

?>


