<?php
session_start();
//print_r($_SESSION);

require_once '../assets/functions.php';
require_once  '../koneksi/koneksi.php';

// ==== KONEKSI DATABASE
$incoming_data = $_POST['jenisData'];
$DB_HOST = "127.0.0.1";
$DB_USER = "root";
$DB_PASS = "";
$DB_DATABASE = "lims";
$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}
// ====== END KONEKSI


//
//
//

function tampilTombolTambahData()
{
    if (strtolower((string)$_SESSION['role']) == "siteman") {
        if ($_GET['page'] == "packaging") {
            echo '<a href="tambah_data_pkg.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
        }
        else {
            echo '<a href="tambah_data_add.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
        }

    }
}
function tampilTombolExportData()
{
    if (strtolower((string)$_SESSION['role']) == "analyst") {
        if ($_GET['page'] == "packaging") {
            echo '<a href="export_data_pkg.php"><button class="btn btn-primary mb-2 " >+ Export Data</button></a>';
        }
        else {
            echo '<a href="export_data_add.php"><button class="btn btn-primary mb-2 " >+ Export Data</button></a>';
        }

    }
}

//getId("pm", $row['id_item_pkg']); // pm, 19
function getId($type, $number) {
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_pkg_". $type ." WHERE id_" . $type ."=". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return $rowP["id_". $type];
        }
    }
}

function getDetailPKG($type, $number){
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
//    echo $type;
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_pkg_". $type ." LEFT JOIN tbl_utama_pkg ON tbl_detail_pkg_". $type . ".id_" . $type." = tbl_utama_pkg.id_utama LEFT JOIN tbl_data_item_pkg ON tbl_utama_pkg.id_item_pkg = tbl_data_item_pkg.id_item_pkg WHERE id_utama = ". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            if ($type == "pm") {
                return ($rowP['id_pm']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['warna_botol']. '+'  .$rowP['kondisi_screw']. '+'  .$rowP['tempat_lubang']. '+'  .$rowP['label_depan']. '+'  .$rowP['label_belakang']. '+'  .$rowP['cacat']. '+'  .$rowP['posisi_ldb']. '+'  .$rowP['kotoran']. '+'  .$rowP['benda_asing']. '+'  .$rowP['npt']. '+'  .$rowP['doc_no']);

            } elseif ($type == "pd") {
                return ($rowP['id_pd']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['warna_drum']. '+'  .$rowP['terdapat_lk']. '+'  .$rowP['terdapat_lpb']. '+'  .$rowP['kondisi_seal']. '+'  .$rowP['kotoran']. '+'  .$rowP['karat']. '+'  .$rowP['benda_asing']. '+'  .$rowP['bau_ytb']. '+'  .$rowP['doc_no']);
            } elseif ($type == "pcb") {
                return ($rowP['id_pcb']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['kondisi_cart']. '+'  .$rowP['warna_cart']. '+'  .$rowP['kotoran_l']. '+'  .$rowP['gambar']. '+'  .$rowP['label']. '+'  .$rowP['kotoran_d']. '+'  .$rowP['coa']. '+'  .$rowP['doc_no']);
            } elseif ($type == "pc") {
//                echo "INI PC";
                return ($rowP['id_pc']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['warna_cap']. '+'  .$rowP['kotoran']. '+'  .$rowP['goresan_pc']. '+'  .$rowP['cacat_pc']. '+'  .$rowP['lubang']. '+'  .$rowP['kondisi_seal']. '+'  .$rowP['terdapat_bami']. '+'  .$rowP['doc_no']);
            } elseif ($type == "p") {
                return ($rowP['id_p']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['warna_pail']. '+'  .$rowP['terdapat_lk']. '+'  .$rowP['terdapat_lpb']. '+'  .$rowP['kondisi_seal']. '+'  .$rowP['kotoran']. '+'  .$rowP['karat']. '+'  .$rowP['benda_asing']. '+'  .$rowP['kotoran_ytb']. '+'  .$rowP['doc_no']);
            } elseif ($type == "ibc") {
                return ($rowP['id_ibc']. '+'  .$rowP['quantity']. '+'  .$rowP['packaging_name']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['cek_sampel']. '+'  .$rowP['kondisi_vn']. '+'  .$rowP['terdapat_lk']. '+'  .$rowP['kotoran']. '+'  .$rowP['air_oli']. '+'  .$rowP['doc_no']);
            } else {
                return 0;
            }
        }
    }
}

function getIdA($number) {
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_add WHERE id_add=". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return $rowP["id_add"];
        }
    }
}

function getDetailADD($number){
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    // tbl_utama
    $queryDetail = $koneksi->query("SELECT * FROM tbl_detail_add LEFT JOIN tbl_utama_add ON tbl_detail_add.id_add = tbl_utama_add.id_utama LEFT JOIN tbl_data_item_add ON tbl_utama_add.id_item_add = tbl_data_item_add.id_item_add WHERE id_utama = ". $number);
    if ($num_rows = $queryDetail->num_rows > 0) {
        while ($rowP = $queryDetail->fetch_assoc()){
            return ($rowP['id_add']. '+'  .$rowP['item_check']. '+'  .$rowP['quantity']. '+'  .$rowP['nama_produk']. '+'  .$rowP['tgl_cek']. '+'  .$rowP['approval']. '+'  .$rowP['lot_no']. '+'  .$rowP['nama_psdd']. '+'  .$rowP['berat_psdpl']. '+'  .$rowP['seal_tdb']. '+'  .$rowP['bocorl']. '+'  .$rowP['kotoranba']. '+'  .$rowP['penyok']. '+'  .$rowP['karat']. '+'  .$rowP['doc_no']);
        }
    }
}

function tampilTombolPrint($idAF, $idTF, $pP, $dataIn, $approval){
    if($idAF == $idTF && $approval == 1) {
        return '<form action="../dashboard/halaman_print.php?data='. $pP .'" method="POST"><button name="data_print" value="'. $dataIn .'" class="btn btn-primary mb-2 ">Print</button></form>';
    }
    else {
        return '<button class="btn btn-primary mb-2 " disabled>Print</button></form>';
    }
}

function tampilTombolEditData($jenis, $pkgn, $itmc, $idipg, $tglIn, $jmlP){
    if (strtolower((string) $_SESSION['role']) == "analyst") {
        return '<form action="edit_data.php?type='.$jenis.'" method="POST"><button name="data_edit" value="'.$jenis.'#'.$pkgn.'#'.$itmc.'#'.$idipg.'#'.$tglIn.'#'.$jmlP.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
    else if (strtolower((string) $_SESSION['role']) == "siteman") {
        return '<form action="edit_data_utama.php" method="POST"><input type="hidden" name="mode" value="'.$pkgn.'"/><button name="id_utama" value="'.$jenis.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
}

function tampilTombolHapusData($jenis, $pkgn, $itmc, $idipg, $tglIn){
    if (strtolower((string) $_SESSION['role']) == "analyst") {
//        return '<form action="hapus_data_utama.php?type='.$jenis.'" method="POST"><button name="data_edit" value="'.$jenis.'#'.$pkgn.'#'.$itmc.'#'.$idipg.'#'.$tglIn.'" class="btn btn-primary mb-2 ">Edit</button></form>';
    }
    else if (strtolower((string) $_SESSION['role']) == "siteman") {
        return '<form action="hapus_data_utama.php" method="POST"><input type="hidden" name="mode" value="'.$pkgn.'"/><input type="hidden" name="jenis" value="'.$itmc.'"/><input type="hidden" name="id_pkg" value="'.$idipg.'"/> <button name="id_utama" value="'.$jenis.'" class="btn btn-primary mb-2 ">Hapus</button></form>';
    }
}

function tampilTabel($jenis_tabel, $koneksi) {
    if (strtolower($jenis_tabel) == "packaging"){
        echo '
         <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Date</th>
                <th>Doc No</th>
                <th>Receive Time</th>
                <th>Item Code</th>
                <th>Packaging Name</th>
                <th>Supplier Name</th>
                <th>Quantity</th>
                <th>Packaging Condition</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Submitted</th>
                <th>Received</th>
                <th>Finnish Time</th>
                <th>Status Approval</th>
                <th colspan="" class=""> ACTION</th>
                
                </tr>
            </thead>
            <tbody> ';

        // ====== END KONEKSI
        $hasilQuery = $koneksi->query("SELECT * FROM `tbl_utama_pkg` LEFT JOIN tbl_data_item_pkg ON tbl_data_item_pkg.id_item_pkg = tbl_utama_pkg.id_item_pkg");
        if ($num_rows = $hasilQuery->num_rows > 0) {
            while ($row = $hasilQuery->fetch_assoc()){
                echo '
                            <tr>
                                <td>'.$row['date'] .'</td>
                                <td>'.$row['doc_no'] .'</td>
                                <td>'.$row['receive_time'] .'</td>
                                <td>'.$row['item_code'] .'</td>
                                <td>'.$row['packaging_name'] .'</td>
                                <td>'.$row['suplier_name'] .'</td>
                                <td>'.$row['quantity'] .'</td>
                                <td>'.$row['packaging_condition'] .'</td>
                                <td>'.$row['status'] .'</td>
                                <td>'.$row['remark'] .'</td>
                                <td>'.$row['submitted'] .'</td>
                                <td>'.$row['received'] .'</td>
                                <td>'.$row['finnish_time'] .'</td>
                               ';
                // KONVERSI JADi Jenis Package
                $itemCheck = strtolower($row['item_check']);
                $jenisPackage = "";
                $pkg_name = $row['packaging_name'];
                $itm_code = $row['item_code'];
                $quantity = $row['quantity'];

                $id_pkg = $row['id_item_pkg'];
                $id_utama = $row['id_utama'];

                $tgl_masuk = $row['date'];
                $idA = $row['id_utama'];
//                echo $itemCheck."-";

                if ($itemCheck == "botol" || $itemCheck == "tube") {
                    $jenisPackage = "material";
                    $idT = getId("pm", $row['id_utama']);
                    $halamanPrint = "pm";
                    $dataCol = getDetailPKG("pm", $row['id_utama']);

                } elseif ($itemCheck == "cap" || $itemCheck == "cover cap") {

                    $jenisPackage = "cap";
                    $idT = getId("pc", $row['id_utama']);
//                    echo "hai";
                    $halamanPrint = "pc";
                    $dataCol = getDetailPKG("pc", $row['id_utama']);
                } elseif ($itemCheck == "pail") {
                    $jenisPackage = "pail";
                    $idT = getId("p", $row['id_utama']);
                    $halamanPrint = "p";
                    $dataCol = getDetailPKG("p", $row['id_utama']);
                } elseif ($itemCheck == "drum") {
                    $jenisPackage = "drum";
                    $idT = getId("pd", $row['id_utama']);
                    $halamanPrint = "pd";
                    $dataCol = getDetailPKG("pd", $row['id_utama']);
                } elseif ($itemCheck == "carton") {
                    $jenisPackage = "cartonbox";
                    $idT = getId("pcb", $row['id_utama']);
                    $halamanPrint = "pcb";
                    $dataCol = getDetailPKG("pcb", $row['id_utama']);
                } elseif ($itemCheck == "ibc") {
                    $jenisPackage = "ibc";
                    $idT = getId("ibc", $row['id_utama']);
                    $halamanPrint = "ibc";
                    $dataCol = getDetailPKG("ibc", $row['id_utama']);
                }
                else {
                    $idT = "";
                    $halamanPrint = "";
                    $dataCol = "";
                }

                if ($itemCheck == "label") {
                    $jenisPackage = "lbl";

                }
                // APPROVAL

                $approval = 0;
                $sql_select_aproval = "SELECT * FROM tbl_detail_pkg_" . $halamanPrint . " WHERE id_".$halamanPrint." = '$id_utama'";
                $hasilApproval = $koneksi->query($sql_select_aproval);
                if ($hasilApproval) {
                    if ($num_rows = $hasilApproval->num_rows > 0) {
                        $row_detail = $hasilApproval->fetch_assoc();

                        if ($row_detail['approval'] != 0 && $row_detail['approval'] != NULL  ) {
                            $approval = 1;
                        }
                    }
                }

                if ($approval == 1 ) {
                    echo "<td>OKE</td>";
                }
                else {
                    echo "<td>TIDAK</td>";
                }

                // ACTION
                if (strtolower((string) $_SESSION['role']) == "analyst") {
                    echo '<td>'.tampilTombolEditData($jenisPackage, $pkg_name, $itm_code, $id_utama, $tgl_masuk, $quantity). tampilTombolPrint($idA, $idT, $halamanPrint, $dataCol, $approval) .'</td>';
                }
                else if (strtolower((string) $_SESSION['role']) == "siteman") {
                    echo '<td>'.tampilTombolEditData($row['id_utama'], "packaging", NULL, NULL, NULL, NULL).tampilTombolHapusData($row['id_utama'], "packaging", $jenisPackage, $id_utama, NULL).'</td>';
                }

                echo ' </tr>';
            }
        }
        else {
            echo '
                <tr>
                    <td colspan="14" class="text-center">Tidak Ada Data</td>
                </tr>
                ';
        }
        echo '
                </tbody>
            </table>';

    }

    // ADDITIVE
    else if (strtolower($jenis_tabel) == "additive") {
        echo '
         <table id="zero-config" class="table table-hover" style="width:100%">
            <thead>
            <tr>
                <th>Date</th>
                <th>Doc No</th>
                <th>Lot Number</th>
                <th>Additive</th>
                <th>Weight</th>
                <th>Approval</th>
                <th>Quantity</th>
                <th colspan="" class=""> ACTION</th>
                </tr>
            </thead>
            <tbody> ';

        // ====== END KONEKSI
        $hasilQuery = $koneksi->query("SELECT * FROM `tbl_utama_add` LEFT JOIN tbl_data_item_add ON tbl_data_item_add.id_item_add = tbl_utama_add.id_item_add");
        $jenisPackage = "add";
        if ($num_rows = $hasilQuery->num_rows > 0) {
            while ($row = $hasilQuery->fetch_assoc()) {
                echo '
                <tr>
                     <td>'.$row['date'] .'</td>
                     <td>'.$row['doc_no'] .'</td>
                     <td>'.$row['lot_no'] .'</td>
                     <td>'.$row['additive'] .'</td>
                     <td>'.$row['weight'] .'</td>
                     <td>'.$row['quantity'] .'</td>
                     ';
                $pkg_name = $row['additive'];
                $itm_code = $row['lot_no'];
                $id_pkg = $row['id_utama'];
                $tgl_masuk = $row['date'];
                $quantity = $row['quantity'];

                $idA = $row['id_utama'];
                $idT = getIdA($row['id_utama']);
                $dataCol = getDetailADD($row['id_utama']);

                // APPROVAL
                $approval = 0;
                $sql_select_aproval = "SELECT * FROM tbl_detail_add  WHERE id_add = '$id_pkg'";
                $hasilApproval = $koneksi->query($sql_select_aproval);
                if ($hasilApproval) {
                    if ($num_rows = $hasilApproval->num_rows > 0) {
                        $row_detail = $hasilApproval->fetch_assoc();

                        if ($row_detail['approval'] != 0 && $row_detail['approval'] != NULL  ) {
                            $approval = 1;
                        }
                    }
                }

                if ($approval == 1 ) {
                    echo "<td>OKE</td>";
                }
                else {
                    echo "<td>TIDAK</td>";
                }
                   if (strtolower((string) $_SESSION['role']) == "analyst") {
                       echo '<td>'.tampilTombolEditData($jenisPackage, $pkg_name, $itm_code, $id_pkg, $tgl_masuk, $quantity). tampilTombolPrint($idA, $idT, "add", $dataCol, $approval) .'</td>';
                   }
                   else if (strtolower((string) $_SESSION['role']) == "siteman") {
                        echo '<td>'.tampilTombolEditData($row['id_utama'], "additive", NULL, NULL, NULL, NULL).tampilTombolHapusData($row['id_utama'], "additive", NULL, NULL, NULL).'</td>';
                   }


                echo '</tr>';
            }

        }
        else {
            echo '
                <tr>
                    <td colspan="9" class="text-center">Tidak AdAa Data</td>
                </tr>
                ';
        }
        echo '
                </tbody>
            </table>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">

    <link href="../plugins/font-icons/fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/elements/alert.css">
    <link href="../plugins/loaders/custom-loader.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/bootstrap-select/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">

</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <div class="navbar-item theme-brand flex-row  text-center">
            <a href="javascript:void(0);" class="sidebarCollapse" style="color:whitesmoke;" data-placement="bottom">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6"  x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>
        </div>
    </header>
</div>
<!--  END NAVBAR  -->
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <div class="dropdown-toggle">
                        <span>Hallo, <?php echo (string) $_SESSION['nama_akun'];  ?> </span>
                    </div>
                </li>

                <li class="menu">
                    <a href="index.php?page=packaging" aria-expanded="false" onClick="window.location.reload();" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                            <span>Packaging</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="index.php?page=additive" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                            <span>Additive</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="../logout.php" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
                            <span> Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="shadow-bottom"></div>
        </nav>
    </div>
    <!--  END SIDEBAR  -->
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content mb-5">
        <div class="row layout-px-spacing">
            <!-- HALAMAN FULL -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                <div class="widget-content widget-content-area text-right ">
                    <?php
                    if (isset($_GET['page'])){
                        if($_GET['page'] == "packaging") {
                            tampilTombolTambahData();
                            tampilTombolExportData();
                            echo '
                                    <div class="bio-skill-box box box-shadow text-left">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive mb-4 mt-4"> ';
                            tampilTabel("packaging", $koneksi);
                            echo '</div>
                                            </div>
                                        </div>
                                    </div>';
                        }
                        else if ($_GET['page'] == "additive"){
                            tampilTombolTambahData();
                            tampilTombolExportData();
                            echo '
                                    <div class="bio-skill-box box box-shadow text-left">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive mb-4 mt-4"> ';
                            tampilTabel("additive", $koneksi);
                            echo '</div>
                                            </div>
                                        </div>
                                    </div>';
                        }
                    }
                    else { ?>
                        <div class="bio-skill-box box box-shadow text-left">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <a href="index.php?page=packaging"><button class="btn btn-primary btn-large">PACKAGING</button></a>
                                    <a href="index.php?page=additive"><button class="btn btn-primary btn-large">ADDITIVE</button></a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>



            <div class="footer-wrapper mt-5">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2021.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script src="plugins/apex/apexcharts.min.js"></script> -->
    <script src="../plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="../assets/js/dashboard/dash_1.js"></script>
    <script src="../plugins/table/datatable/datatables.js"></script>
    <script>


        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5
        });
    </script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <!-- <script src="plugins/apex/apexcharts.min.js"></script> -->
</body>

</html>
