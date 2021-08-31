<?php
require_once '../assets/functions.php';
require_once '../koneksi/koneksi.php';
session_start();
//print_r($_SESSION);


function tampilTombolTambahData() {
    if (strtolower((string) $_SESSION['role']) == "siteman") {
        echo '<a href="tambah_data_pkg.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
    }
}

if (isset( $_POST['data_edit'])) {
    $data_edit = $_POST['data_edit'];
    $dE_buffer = explode('#', $data_edit);

}
function formShow(){
   if (isset( $_POST['data_edit'])) {
       $data_edit = $_POST['data_edit'];
       $dE_buffer = explode('#', $data_edit);
   }
    // ANALYST
    if (isset($_POST['data_edit'])) {
        if (strtolower((string) $dE_buffer[0]) == "drum") {
            echo file_get_contents('../dashboard/edit_form/ps_pd.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "pail") {
            echo file_get_contents('../dashboard/edit_form/ps_p.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "cap") {
            echo file_get_contents('../dashboard/edit_form/ps_pc.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "cartonbox") {
            echo file_get_contents('../dashboard/edit_form/ps_pcb.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "material") {
            echo file_get_contents('../dashboard/edit_form/p_pm.php');
        } elseif (strtolower((string) $dE_buffer[0]) == "ibc") {
            echo file_get_contents('../dashboard/edit_form/ps_ibc.php');
        } else {
            echo ('Type item dalam database tidak valid');
        }
    }



    // SITEMAN
    else if (isset($_POST['id_utama'])){
        if ($_POST['id_utama'] != NULL && $_POST['id_utama'] > -1 && $_POST['id_utama'] != ""){
            echo include('../dashboard/edit_form/data_utama_edit.php');
        }
        else {
            echo "1";
        }
    }
    else {
        echo "0";
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
                                    <?php if (isset($_GET['asdsad'])){
                                        if ($_GET['asdsad'] == "test") {
                                        echo 'ya muncul'; ?>
                                         <div class="form-group mb-4">
                                            <label for="namaProduct">Nama Product</label>
                                            <h4><?php echo ($dE_buffer[1]) ?></h4>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="itemCode">Item Code</label>
                                            <h4><?php echo ($dE_buffer[2]) ?></h4>
                                        </div>
                                   <?php }} ?>

                                        <?php formShow() ?>
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
