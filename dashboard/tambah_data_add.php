<?php
    require_once '../assets/functions.php';
    require_once  '../koneksi/koneksi.php';
    session_start();

    // ==== KONEKSI DATABASE
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }
    // ===== END
    // === INSERT TO MYSQL
    $FLAG_INSERT = 0;





    $issueDates = formatTanggal();
    $ReceiveTime = date("h:i");

    if (isset($_POST['submited'])) {
        // AMBIL DATA USER INPUT
            print_r($_POST);

        $docNumber = $_POST['docNumber'];
        $issuedDate = $_POST['issuedDate'];
        $lotNumber = $_POST['lotNumber'];

        $itemId = $_POST['itemId'];
        $itemWeight = $_POST['itemWeight'];

        $Quantity = $_POST['Quantity'];

        // ==== KONEKSI DATABASE
        $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

        if ($koneksi->connect_errno) {
            echo "Connection Error: " . $koneksi->connect_error;
        }
        // ====== END KONEKSI

        $sql_insert = "INSERT INTO `tbl_utama_add`(`id_utama`, `doc_no`, `date`, `lot_no`, `id_item_add`, `quantity`) VALUES ('NULL','$docNumber','$issuedDate','$lotNumber','$itemId','$Quantity')";
        $hasilInsert = $koneksi->query($sql_insert);

        if ($hasilInsert) {
            $FLAG_INSERT = 1;
        }
        else {
            $FLAG_INSERT = -1;
        }

    }


    function tampilTombolTambahData() {
        if (strtolower((string) $_SESSION['role']) == "siteman") {
            echo '<a href="tambah_data.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
        }
    }


    function formatTanggal() {
        date_default_timezone_set('Asia/Jakarta');

        $tgl = date("d"); // date("Y-m-d")
        $bulan =  date("m");
        $tahun = date("Y");

        $templateNamaBulan = ["Jan", "Feb", "Mar", "Apr","May", "Jun","Jul","Aug", "Sep", "Oct", "Nov","Dec"];

        $bulan = $templateNamaBulan[((int) $bulan) - 1];

        return $tgl."-".$bulan."-".$tahun;
    }

//$item_kode = (string) $dataDariMysql;



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
                            <h2 >Tambah Data Additive</h2>
                            <?php
//                            echo $FLAG_INSERT;
                            if ($FLAG_INSERT == 1) {
                                echo '
                                    <div class="alert alert-success mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                        <strong> INSERT Success! </strong> <br> Please wait :)</button>
                                    </div> 
                                    <script>
                                         setTimeout(function(){
                                            window.location.href = "index.php?page=additive";
                                         }, 500);
                                      </script>
                                    ';
                            } else if ($FLAG_INSERT == -1) {
                                echo '
                                    <div class="alert alert-danger mb-4" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                        <strong>Login Failed!</strong> <br> Please Check Your Password :(
                                    </div>
                                    ';
                            }
                            else { // $FLAG_INSERT = 0
                                // pass
                            }
                            ?>

                            <div class="row mt-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <!-- <div id="grafik-FULL-PID" class=""> -->
                                    <form method="POST">

                                        <div class="form-group mb-4">
                                            <label for="docNumber">Document No.</label>
                                            <input type="text" class="form-control" id="docNumber" name="docNumber" placeholder="Doc No" required>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="issuedDate">Issued Date</label>
                                            <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?= $issueDates; ?>" placeholder="Issued Date">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="lotNumber">Lot Number</label>
                                            <input type="text" class="form-control" id="lotNumber" name="lotNumber" placeholder="Lot Number" required>
                                        </div>

                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <label for="itemCode">Item Code</label> <br>

                                                <select class="selectpicker"  id="additive" name="additive" data-live-search="true">
                                                    <option value="" selected disabled hidden>Additive</option>
                                                    <?php
                                                    $sqlSelectItem = "SELECT * FROM `tbl_data_item_add`";
                                                    $hasilQuery = $koneksi->query($sqlSelectItem);

                                                    while($row = $hasilQuery->fetch_array() ) {?>
                                                        <option value="<?php echo $row[0]."+%".$row[2]?>"><?php echo strtoupper($row[1]); ?></option>
                                                    <?php }?>
                                                </select>
                                                <!--  <span id="prints">asdsd</span>-->
                                                <input type="hidden" name="itemType" id="prints" value="NULL" >
                                                <input type="hidden" name="itemId" id="itemId" value="NULL" >
                                            </div>

                                            <div class="form-group col-md-5">
                                                <label for="Weight">Weight</label>
                                                <input type="text" class="form-control" id="itemWeight" name="itemWeight" placeholder="Weight" required>
                                            </div>

                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="Quantity">Quantity</label>
                                            <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                                        </div>

                                        <input type="hidden" name="submited" value="submited" />
                                        <div class="form-group mb-4">
                                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                            <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
                                        </div>

                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $("#additive").change(function () {
                                                    // $("#prints").text($(this).find('option:selected').text());
                                                    var buff = $("#itemWeight").val($(this).val());
                                                    var splitText = $(this).val().split("+%"); // splitText[0] - id

                                                    $("#itemWeight").val(splitText[1]);
                                                    $("#itemId").val(splitText[0]); // idItem
                                                    // console.log($(this).val().split("+%"));

                                                    var selectedItemCode = $(this).find('option:selected').text();
                                                    var arr =  selectedItemCode.split("-");
                                                    var typeItem = arr[0].split("P");

                                                    console.log(typeItem);
                                                    console.log(arr);

                                                    // PARSING ITME CODE to Product Type


                                                    // console.log($("#prints").val());

                                                });
                                            });
                                        </script>
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
bles.js"></script>
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
