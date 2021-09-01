<?php
require_once '../assets/functions.php';
include  '../koneksi/koneksi.php';
session_start();
//print_r($_SESSION);


function tampilTombolTambahData() {
    if (strtolower((string) $_SESSION['role']) == "siteman") {
        echo '<a href="tambah_data_pkg.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
    }
}

if (isset( $_POST['data_edit'])){
    $data_edit = $_POST['data_edit'];
    $dE_buffer = explode('#', $data_edit);
}


$data_edit = $_POST['data_edit'];
$dE_buffer = explode('#', $data_edit);

function formShow(){

    if (isset( $_POST['data_edit'])){
        $data_edit = $_POST['data_edit'];
        $dE_buffer = explode('#', $data_edit);
    }




    /*

    if(isset($_POST['value'])) {
        echo file_get_contents('../dashboard/edit_form/ps_pd.php');
    } else {
        echo file_get_contents('../dashboard/edit_form/ps_pcb.php');
    }
    */



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
        <style>
            .check_form {
                margin: 5px;
            }
            .check_form tr {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .check_form td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 8px;
            }
        </style>
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
               <?php include'menu.php' ; ?>
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
                        <div class="bio-skill-box box box-shadow text-left">
                            <h2>Edit Data</h2>

                            <div class="row mt-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <form action="../dashboard/throw_data.php" method="POST">
                                        <div class="form-group mb-4" id="topLabel">
                                            <label for="namaProduct">Nama Product</label>
                                            <h4><?php echo ($dE_buffer[1]) ?></h4>
                                        </div>
                                        <div class="form-group mb-4" id="topLabel">
                                            <label for="itemCode">Item Code</label>
                                            <h4><?php echo ($dE_buffer[2]) ?></h4>
                                        </div>
                                        <?php
                                        $jd = '';
                                        if (isset($_GET['type'])){
                                            if ($_GET['type'] == "material") {
                                                $jd = "pm";
                                                echo '
                                                <div class="form-group mb-4">
    <label for="itemCheck">Item Check</label><br/>
    <h4 id="itemCheck">Botol</h4>
</div>

<div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
</div>

<div class="form-group mb-4">
    <label for="approval">Approval</label><br/>
    <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
</div>

<div class="form-group mb-4">
    <label for="jumlahProduct">Jumlah Product</label>
    <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
</div>

<div class="form-group mb-4">
    <label for="cekSampel">Cek Sampel</label>
    <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
</div>

<div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
</div>

<div class="form-group mb-4">
    <label for="NPT">NPT</label><br/>
    <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="NPT" name="NPT" value="Valid" checked/>Valid</td><td style="padding:10px;"><input id="NPT" type="radio" name="NPT" value="Expired"/>Expired</td></tr></table>
</div>

<div class="form-row mb-4">
    <label for="pengecekan">Pengecekan</label><br/>
    <table class="check_form" id="pengecekan">
        <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
        <tr><td colspan="2">Kondisi Luar</td></tr>
        <tr><td>1</td><td>Warna Botol</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td></tr>
        <tr><td>2</td><td>Kondisi Screw *</td><td><input type="radio" name="2,1" value="OK" checked/>OK<br/><input type="radio" name="2,1" value="NG"/>NG</td><td><input type="radio" name="2,2" value="OK" checked/>OK<br/><input type="radio" name="2,2" value="NG"/>NG</td><td><input type="radio" name="2,3" value="OK" checked/>OK<br/><input type="radio" name="2,3" value="NG"/>NG</td><td><input type="radio" name="2,4" value="OK" checked/>OK<br/><input type="radio" name="2,4" value="NG"/>NG</td><td><input type="radio" name="2,5" value="OK" checked/>OK<br/><input type="radio" name="2,5" value="NG"/>NG</td><td><input type="radio" name="2,6" value="OK" checked/>OK<br/><input type="radio" name="2,6" value="NG"/>NG</td><td><input type="radio" name="2,7" value="OK" checked/>OK<br/><input type="radio" name="2,7" value="NG"/>NG</td><td><input type="radio" name="2,8" value="OK" checked/>OK<br/><input type="radio" name="2,8" value="NG"/>NG</td></tr>
        <tr><td>3</td><td>Tempat lubang</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
        <tr><td>4</td><td>Label Depan</td><td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input type="radio" name="4,1" value="NG"/>NG</td><td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input type="radio" name="4,2" value="NG"/>NG</td><td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input type="radio" name="4,3" value="NG"/>NG</td><td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input type="radio" name="4,4" value="NG"/>NG</td><td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input type="radio" name="4,5" value="NG"/>NG</td><td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input type="radio" name="4,6" value="NG"/>NG</td><td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input type="radio" name="4,7" value="NG"/>NG</td><td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input type="radio" name="4,8" value="NG"/>NG</td></tr>
        <tr><td>5</td><td>Label Belakang</td><td><input type="radio" name="5,1" value="OK" checked/>OK<br/><input type="radio" name="5,1" value="NG"/>NG</td><td><input type="radio" name="5,2" value="OK" checked/>OK<br/><input type="radio" name="5,2" value="NG"/>NG</td><td><input type="radio" name="5,3" value="OK" checked/>OK<br/><input type="radio" name="5,3" value="NG"/>NG</td><td><input type="radio" name="5,4" value="OK" checked/>OK<br/><input type="radio" name="5,4" value="NG"/>NG</td><td><input type="radio" name="5,5" value="OK" checked/>OK<br/><input type="radio" name="5,5" value="NG"/>NG</td><td><input type="radio" name="5,6" value="OK" checked/>OK<br/><input type="radio" name="5,6" value="NG"/>NG</td><td><input type="radio" name="5,7" value="OK" checked/>OK<br/><input type="radio" name="5,7" value="NG"/>NG</td><td><input type="radio" name="5,8" value="OK" checked/>OK<br/><input type="radio" name="5,8" value="NG"/>NG</td></tr>
        <tr><td>6</td><td>Cacat</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td></tr>
        <tr><td>7</td><td>Posisi Label Depan dan Belakang</td><td><input type="radio" name="7,1" value="OK" checked/>OK<br/><input type="radio" name="7,1" value="NG"/>NG</td><td><input type="radio" name="7,2" value="OK" checked/>OK<br/><input type="radio" name="7,2" value="NG"/>NG</td><td><input type="radio" name="7,3" value="OK" checked/>OK<br/><input type="radio" name="7,3" value="NG"/>NG</td><td><input type="radio" name="7,4" value="OK" checked/>OK<br/><input type="radio" name="7,4" value="NG"/>NG</td><td><input type="radio" name="7,5" value="OK" checked/>OK<br/><input type="radio" name="7,5" value="NG"/>NG</td><td><input type="radio" name="7,6" value="OK" checked/>OK<br/><input type="radio" name="7,6" value="NG"/>NG</td><td><input type="radio" name="7,7" value="OK" checked/>OK<br/><input type="radio" name="7,7" value="NG"/>NG</td><td><input type="radio" name="7,8" value="OK" checked/>OK<br/><input type="radio" name="7,8" value="NG"/>NG</td></tr>
        <tr><td colspan="10">Kondisi Dalam</td></tr>
        <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td></tr>
        <tr><td>2</td><td>Benda Asing</td><td><input type="radio" name="9,1" value="Ada" checked/>Ada<br/><input type="radio" name="9,1" value="Tidak"/>Tidak</td><td><input type="radio" name="9,2" value="Ada" checked/>Ada<br/><input type="radio" name="9,2" value="Tidak"/>Tidak</td><td><input type="radio" name="9,3" value="Ada" checked/>Ada<br/><input type="radio" name="9,3" value="Tidak"/>Tidak</td><td><input type="radio" name="9,4" value="Ada" checked/>Ada<br/><input type="radio" name="9,4" value="Tidak"/>Tidak</td><td><input type="radio" name="9,5" value="Ada" checked/>Ada<br/><input type="radio" name="9,5" value="Tidak"/>Tidak</td><td><input type="radio" name="9,6" value="Ada" checked/>Ada<br/><input type="radio" name="9,6" value="Tidak"/>Tidak</td><td><input type="radio" name="9,7" value="Ada" checked/>Ada<br/><input type="radio" name="9,7" value="Tidak"/>Tidak</td><td><input type="radio" name="9,8" value="Ada" checked/>Ada<br/><input type="radio" name="9,8" value="Tidak"/>Tidak</td></tr>
    </table>
    * Pengecekan dilakukan apabila diperlukan
</div>
                                                ';
                                            } elseif ($_GET['type'] == "ibc") {
                                                $jd = "ibc";
                                                echo '
                                                <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">IBC</h4>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-row mb-4">
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Kondisi Valve Nozzle</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td><</tr>
            <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak"/>Tidak</td><td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak"/>Tidak</td><td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak"/>Tidak</td><td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak"/>Tidak</td><td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak"/>Tidak</td><td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak"/>Tidak</td><td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak"/>Tidak</td><td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak"/>Tidak</td></tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>2</td><td>Air / Oli</td><td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak"/>Tidak</td><td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2" value="Tidak"/>Tidak</td><td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3" value="Tidak"/>Tidak</td><td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4" value="Tidak"/>Tidak</td><td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5" value="Tidak"/>Tidak</td><td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6" value="Tidak"/>Tidak</td><td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7" value="Tidak"/>Tidak</td><td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8" value="Tidak"/>Tidak</td></tr>
        </table>
    </div>
                                                ';
                                            } elseif ($_GET['type'] == "pail") {
                                                $jd = "p";
                                                echo '
                                                <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Pail</h4>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-row mb-4">
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Warna Pail</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td><</tr>
            <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak"/>Tidak</td><td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak"/>Tidak</td><td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak"/>Tidak</td><td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak"/>Tidak</td><td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak"/>Tidak</td><td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak"/>Tidak</td><td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak"/>Tidak</td><td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Kondisi Seal</td><td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input type="radio" name="4,1" value="NG"/>NG</td><td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input type="radio" name="4,2" value="NG"/>NG</td><td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input type="radio" name="4,3" value="NG"/>NG</td><td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input type="radio" name="4,4" value="NG"/>NG</td><td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input type="radio" name="4,5" value="NG"/>NG</td><td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input type="radio" name="4,6" value="NG"/>NG</td><td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input type="radio" name="4,7" value="NG"/>NG</td><td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input type="radio" name="4,8" value="NG"/>NG</td><</tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>2</td><td>Karat</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>3</td><td>Benda Asing</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Bau yang tidak biasa</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td></tr>
        </table>
    </div>
                                                ';
                                            } elseif ($_GET['type'] == "cap") {
                                                $jd = "pc";
                                                echo '
                                                <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Cap</h4>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-row mb-4">
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px; height: 40px">Item Pengecekan</td><td style="width: 80px; text-align: center">1</td><td style="width: 80px; text-align: center">2</td><td style="width: 80px; text-align: center">3</td><td style="width: 80px; text-align: center">4</td><td style="width: 80px; text-align: center">5</td><td style="width: 80px; text-align: center">6</td><td style="width: 80px; text-align: center">7</td><td style="width: 80px; text-align: center">8</td></tr>
            <tr><td>1</td><td>Warna Cap</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td><</tr>
            <tr><td>2</td><td>Kotoran</td><td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak"/>Tidak</td><td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak"/>Tidak</td><td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak"/>Tidak</td><td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak"/>Tidak</td><td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak"/>Tidak</td><td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak"/>Tidak</td><td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak"/>Tidak</td><td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>3</td><td>Goresan pada cap</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Cacat pada cap</td><td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak"/>Tidak</td><td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2" value="Tidak"/>Tidak</td><td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3" value="Tidak"/>Tidak</td><td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4" value="Tidak"/>Tidak</td><td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5" value="Tidak"/>Tidak</td><td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6" value="Tidak"/>Tidak</td><td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7" value="Tidak"/>Tidak</td><td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>5</td><td>Lubang</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>6</td><td>Kondisi Seal</td><td><input type="radio" name="6,1" value="OK" checked/>OK<br/><input type="radio" name="6,1" value="NG"/>NG</td><td><input type="radio" name="6,2" value="OK" checked/>OK<br/><input type="radio" name="6,2" value="NG"/>NG</td><td><input type="radio" name="6,3" value="OK" checked/>OK<br/><input type="radio" name="6,3" value="NG"/>NG</td><td><input type="radio" name="6,4" value="OK" checked/>OK<br/><input type="radio" name="6,4" value="NG"/>NG</td><td><input type="radio" name="6,5" value="OK" checked/>OK<br/><input type="radio" name="6,5" value="NG"/>NG</td><td><input type="radio" name="6,6" value="OK" checked/>OK<br/><input type="radio" name="6,6" value="NG"/>NG</td><td><input type="radio" name="6,7" value="OK" checked/>OK<br/><input type="radio" name="6,7" value="NG"/>NG</td><td><input type="radio" name="6,8" value="OK" checked/>OK<br/><input type="radio" name="6,8" value="NG"/>NG</td><</tr>
            <tr><td>7</td><td>Terdapat Bari atau Mata ikan</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td></tr>
        </table>
    </div>
                                                ';
                                            } elseif ($_GET['type'] == "cartonbox") {
                                                $jd = "pcb";
                                                echo '
                                                <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Carton Box</h4>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-group mb-4">
        <label for="COA">COA</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="COA" name="COA" value="Ada" checked/>Ada</td><td style="padding:10px;"><input id="COA" type="radio" name="COA" value="Tidak"/>Tidak</td></tr></table>
    </div>

    <div class="form-row mb-4">
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Kondisi Carton</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td><</tr>
            <tr><td>2</td><td>Warna Carton</td><td><input type="radio" name="2,1" value="OK" checked/>OK<br/><input type="radio" name="2,1" value="NG"/>NG</td><td><input type="radio" name="2,2" value="OK" checked/>OK<br/><input type="radio" name="2,2" value="NG"/>NG</td><td><input type="radio" name="2,3" value="OK" checked/>OK<br/><input type="radio" name="2,3" value="NG"/>NG</td><td><input type="radio" name="2,4" value="OK" checked/>OK<br/><input type="radio" name="2,4" value="NG"/>NG</td><td><input type="radio" name="2,5" value="OK" checked/>OK<br/><input type="radio" name="2,5" value="NG"/>NG</td><td><input type="radio" name="2,6" value="OK" checked/>OK<br/><input type="radio" name="2,6" value="NG"/>NG</td><td><input type="radio" name="2,7" value="OK" checked/>OK<br/><input type="radio" name="2,7" value="NG"/>NG</td><td><input type="radio" name="2,8" value="OK" checked/>OK<br/><input type="radio" name="2,8" value="NG"/>NG</td><</tr>
            <tr><td>3</td><td>Kotoran</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Gambar</td><td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak"/>Tidak</td><td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2" value="Tidak"/>Tidak</td><td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3" value="Tidak"/>Tidak</td><td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4" value="Tidak"/>Tidak</td><td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5" value="Tidak"/>Tidak</td><td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6" value="Tidak"/>Tidak</td><td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7" value="Tidak"/>Tidak</td><td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8" value="Tidak"/>Tidak</td><td><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak"/>Tidak</td><td><input type="radio" name="4,2" value="Ada" checked/>Ada<br/><input type="radio" name="4,2" value="Tidak"/>Tidak</td><td><input type="radio" name="4,3" value="Ada" checked/>Ada<br/><input type="radio" name="4,3" value="Tidak"/>Tidak</td><td><input type="radio" name="4,4" value="Ada" checked/>Ada<br/><input type="radio" name="4,4" value="Tidak"/>Tidak</td><td><input type="radio" name="4,5" value="Ada" checked/>Ada<br/><input type="radio" name="4,5" value="Tidak"/>Tidak</td><td><input type="radio" name="4,6" value="Ada" checked/>Ada<br/><input type="radio" name="4,6" value="Tidak"/>Tidak</td><td><input type="radio" name="4,7" value="Ada" checked/>Ada<br/><input type="radio" name="4,7" value="Tidak"/>Tidak</td><td><input type="radio" name="4,8" value="Ada" checked/>Ada<br/><input type="radio" name="4,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>5</td><td>Label</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
        </table>
    </div>
                                                ';
                                            } elseif ($_GET['type'] == "drum") {
                                                $jd = "pd";
                                                echo '
                                                <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Drum</h4>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-row mb-4">
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Warna Drum</td><td><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td><td><input type="radio" name="1,2" value="OK" checked/>OK<br/><input type="radio" name="1,2" value="NG"/>NG</td><td><input type="radio" name="1,3" value="OK" checked/>OK<br/><input type="radio" name="1,3" value="NG"/>NG</td><td><input type="radio" name="1,4" value="OK" checked/>OK<br/><input type="radio" name="1,4" value="NG"/>NG</td><td><input type="radio" name="1,5" value="OK" checked/>OK<br/><input type="radio" name="1,5" value="NG"/>NG</td><td><input type="radio" name="1,6" value="OK" checked/>OK<br/><input type="radio" name="1,6" value="NG"/>NG</td><td><input type="radio" name="1,7" value="OK" checked/>OK<br/><input type="radio" name="1,7" value="NG"/>NG</td><td><input type="radio" name="1,8" value="OK" checked/>OK<br/><input type="radio" name="1,8" value="NG"/>NG</td><</tr>
            <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak"/>Tidak</td><td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak"/>Tidak</td><td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak"/>Tidak</td><td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak"/>Tidak</td><td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak"/>Tidak</td><td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak"/>Tidak</td><td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak"/>Tidak</td><td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak"/>Tidak</td><td><input type="radio" name="2,1" value="Ada" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak"/>Tidak</td><td><input type="radio" name="2,2" value="Ada" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak"/>Tidak</td><td><input type="radio" name="2,3" value="Ada" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak"/>Tidak</td><td><input type="radio" name="2,4" value="Ada" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak"/>Tidak</td><td><input type="radio" name="2,5" value="Ada" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak"/>Tidak</td><td><input type="radio" name="2,6" value="Ada" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak"/>Tidak</td><td><input type="radio" name="2,7" value="Ada" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak"/>Tidak</td><td><input type="radio" name="2,8" value="Ada" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Kondisi Seal</td><td><input type="radio" name="4,1" value="OK" checked/>OK<br/><input type="radio" name="4,1" value="NG"/>NG</td><td><input type="radio" name="4,2" value="OK" checked/>OK<br/><input type="radio" name="4,2" value="NG"/>NG</td><td><input type="radio" name="4,3" value="OK" checked/>OK<br/><input type="radio" name="4,3" value="NG"/>NG</td><td><input type="radio" name="4,4" value="OK" checked/>OK<br/><input type="radio" name="4,4" value="NG"/>NG</td><td><input type="radio" name="4,5" value="OK" checked/>OK<br/><input type="radio" name="4,5" value="NG"/>NG</td><td><input type="radio" name="4,6" value="OK" checked/>OK<br/><input type="radio" name="4,6" value="NG"/>NG</td><td><input type="radio" name="4,7" value="OK" checked/>OK<br/><input type="radio" name="4,7" value="NG"/>NG</td><td><input type="radio" name="4,8" value="OK" checked/>OK<br/><input type="radio" name="4,8" value="NG"/>NG</td><</tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td><td><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td><td><input type="radio" name="5,2" value="Ada" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak"/>Tidak</td><td><input type="radio" name="5,3" value="Ada" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak"/>Tidak</td><td><input type="radio" name="5,4" value="Ada" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak"/>Tidak</td><td><input type="radio" name="5,5" value="Ada" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak"/>Tidak</td><td><input type="radio" name="5,6" value="Ada" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak"/>Tidak</td><td><input type="radio" name="5,7" value="Ada" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak"/>Tidak</td><td><input type="radio" name="5,8" value="Ada" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>2</td><td>Karat</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td><td><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td><td><input type="radio" name="6,2" value="Ada" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak"/>Tidak</td><td><input type="radio" name="6,3" value="Ada" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak"/>Tidak</td><td><input type="radio" name="6,4" value="Ada" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak"/>Tidak</td><td><input type="radio" name="6,5" value="Ada" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak"/>Tidak</td><td><input type="radio" name="6,6" value="Ada" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak"/>Tidak</td><td><input type="radio" name="6,7" value="Ada" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak"/>Tidak</td><td><input type="radio" name="6,8" value="Ada" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td><td><input type="radio" name="3,1" value="Ada" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak"/>Tidak</td><td><input type="radio" name="3,2" value="Ada" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak"/>Tidak</td><td><input type="radio" name="3,3" value="Ada" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak"/>Tidak</td><td><input type="radio" name="3,4" value="Ada" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak"/>Tidak</td><td><input type="radio" name="3,5" value="Ada" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak"/>Tidak</td><td><input type="radio" name="3,6" value="Ada" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak"/>Tidak</td><td><input type="radio" name="3,7" value="Ada" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak"/>Tidak</td><td><input type="radio" name="3,8" value="Ada" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>3</td><td>Benda Asing</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td><td><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td><td><input type="radio" name="7,2" value="Ada" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak"/>Tidak</td><td><input type="radio" name="7,3" value="Ada" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak"/>Tidak</td><td><input type="radio" name="7,4" value="Ada" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak"/>Tidak</td><td><input type="radio" name="7,5" value="Ada" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak"/>Tidak</td><td><input type="radio" name="7,6" value="Ada" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak"/>Tidak</td><td><input type="radio" name="7,7" value="Ada" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak"/>Tidak</td><td><input type="radio" name="7,8" value="Ada" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak"/>Tidak</td></tr>
            <tr><td>4</td><td>Bau yang tidak biasa</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td><td><input type="radio" name="8,1" value="Ada" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak"/>Tidak</td><td><input type="radio" name="8,2" value="Ada" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak"/>Tidak</td><td><input type="radio" name="8,3" value="Ada" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak"/>Tidak</td><td><input type="radio" name="8,4" value="Ada" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak"/>Tidak</td><td><input type="radio" name="8,5" value="Ada" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak"/>Tidak</td><td><input type="radio" name="8,6" value="Ada" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak"/>Tidak</td><td><input type="radio" name="8,7" value="Ada" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak"/>Tidak</td><td><input type="radio" name="8,8" value="Ada" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak"/>Tidak</td></tr>
        </table>
    </div>
                                                ';
                                            } elseif ($_GET['type'] == "add") {
                                                $jd = "add";
                                                echo '
    <style>
    #topLabel {
    display: none;
    }
    </style>
    <div class="form-group mb-4">
    <label for="namaProduct">Additive</label>
    <h4>'. $dE_buffer[1] .'</h4>
    </div>
    <div class="form-group mb-4">
    <label for="itemCode">Lot Number</label>
    <h4>'. $dE_buffer[2] .'</h4>
    </div>
                                        
    <div class="form-group mb-4">
    <label for="tglIn">Tanggal Item Masuk</label><br/>
    <p id="tglIn" style="font-size: medium">'.$dE_buffer[4].'</p>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>
    
    <div class="form-group mb-4">
        <label for="item_check">Item Check</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="item_check" name="item_check" value="baseOil" checked/>Base Oil</td><td style="padding:10px;"><input id="item_check" type="radio" name="item_check" value="additive"/>Additive</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="namaProduct">Nama Product</label>
        <input type="text" class="form-control" id="namaProduct" name="namaProduct" placeholder="Nama Product">
    </div>
    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <p id="jumlahProduct" style="font-size: medium">'.$dE_buffer[5].'</p>
    </div>
    
    <div class="form-group mb-4">
    <label for="tglEdit">Tanggal Pengecekan</label>
    <input type="text" class="form-control" id="tanggal" name="tgl_cek" placeholder="Tanggal-Bulan-Tahun">
    </div>

    <div class="form-row mb-4">
        <label for="check_form">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
                        <tr><td>No</td><td style="width: 430px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">Result</td></tr>
                        <tr><td colspan="2">Visual</td></tr>
                        <tr><td>1</td><td>Nama Produk sesuai dengan dokumen</td><td style="text-align: center"><input type="radio" name="1,1" value="OK" checked/>OK<br/><input type="radio" name="1,1" value="NG"/>NG</td></tr>
                        <tr><td>2</td><td>Berat Produk sesuai dengan packing list</td><td style="text-align: center"><input type="radio" name="2,1" value="OK" checked/>OK<br/><input type="radio" name="2,1" value="NG"/>NG</td></tr>
                        <tr><td>3</td><td>Seal terpasang dengan baik</td><td style="text-align: center"><input type="radio" name="3,1" value="OK" checked/>OK<br/><input type="radio" name="3,1" value="NG"/>NG</td></tr>
                        <tr><td>4</td><td>Bocor /lubang</td><td style="text-align: center"><input type="radio" name="4,1" value="Ada" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak"/>Tidak</td></tr>
                        <tr><td>5</td><td>Kotoran / Benda asing</td><td style="text-align: center"><input type="radio" name="5,1" value="Ada" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak"/>Tidak</td></tr>
                        <tr><td>6</td><td>Penyok</td><td style="text-align: center"><input type="radio" name="6,1" value="Ada" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak"/>Tidak</td></tr>
                        <tr><td>7</td><td>Karat</td><td style="text-align: center"><input type="radio" name="7,1" value="Ada" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak"/>Tidak</td></tr>
                    </table>
    </div>
                                                ';
                                            } else {
                                                echo '<br><h4>Data edit tidak tersedia karena type barang tidak sesuai aturan!</h4>';
                                                echo '
                                                <style>
                                                    #tombolSR {
                                                    display: none;
                                                    }
                                                    #topLabel {
                                                    display: none;
                                                    }
                                                </style>
                                                ';
                                            }
                                        } else {
                                            echo 'none';
                                            echo '
                                                <style>
                                                    #tombolSR {
                                                    display: none;
                                                    }
                                                    #topLabel {
                                                    display: none;
                                                    }
                                                </style>
                                                ';
                                        }
                                        ?>
                                        <div class="form-group mb-4" id="tombolSR">
                                            <form action="../dashboard/throw_data.php" method="POST"><button type="submit" name="jenisData" value="<?php echo ($jd.'#'.$dE_buffer[3]) ?>" class="btn btn-primary mt-4 ">Submit</button></form>
                                            <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<?php
