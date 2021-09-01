<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Print</title>
    <link rel="stylesheet" href="../template_table/template/table-styling.css">
</head>
<body onload="window.print()">
<!-- <body onload="window.print()"> -->
<div class="wrapper">
    <?php
    require_once '../assets/functions.php';
    include  '../koneksi/koneksi.php';
    session_start();
    //print_r($_SESSION);

    if (isset( $_POST['data_print'])){
        $data_print = $_POST['data_print'];
        $dP_buffer = explode('+', $data_print);
        if($dP_buffer[4] == '1') $appr =  "Approved"; else $appr =  "Declined";
        /*if ($data_print[1] == "pm"){
            $wB_buffer = explode('+', )
        }*/
    }

    $jd = '';
    if (isset($_GET['data'])){
        if ($_GET['data'] == "pm") {
            $wB_buffer = explode("#", $dP_buffer[6]);
            $kS_buffer = explode("#", $dP_buffer[7]);
            $tL_buffer = explode("#", $dP_buffer[8]);
            $lD_buffer = explode("#", $dP_buffer[9]);
            $lB_buffer = explode("#", $dP_buffer[10]);
            $c_buffer = explode("#", $dP_buffer[11]);
            $pLDB_buffer = explode("#", $dP_buffer[12]);
            $k_buffer = explode("#", $dP_buffer[13]);
            $bA_buffer = explode("#", $dP_buffer[14]);
            echo '
        <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Packaging Material</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[16] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Bottle</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                            <tr><td>NPT</td><td>:</td><td>'. $dP_buffer[15] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Botol</td><td>'. $wB_buffer[0] .'</td><td>'. $wB_buffer[1] .'</td><td>'. $wB_buffer[2] .'</td><td>'. $wB_buffer[3] .'</td><td>'. $wB_buffer[4] .'</td><td>'. $wB_buffer[5] .'</td><td>'. $wB_buffer[6] .'</td><td>'. $wB_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Kondisi Screw *</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Tempat lubang</td><td>'. $tL_buffer[0] .'</td><td>'. $tL_buffer[1] .'</td><td>'. $tL_buffer[2] .'</td><td>'. $tL_buffer[3] .'</td><td>'. $tL_buffer[4] .'</td><td>'. $tL_buffer[5] .'</td><td>'. $tL_buffer[6] .'</td><td>'. $tL_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Label Depan</td><td>'. $lD_buffer[0] .'</td><td>'. $lD_buffer[1] .'</td><td>'. $lD_buffer[2] .'</td><td>'. $lD_buffer[3] .'</td><td>'. $lD_buffer[4] .'</td><td>'. $lD_buffer[5] .'</td><td>'. $lD_buffer[6] .'</td><td>'. $lD_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Label Belakang</td><td>'. $lB_buffer[0] .'</td><td>'. $lB_buffer[1] .'</td><td>'. $lB_buffer[2] .'</td><td>'. $lB_buffer[3] .'</td><td>'. $lB_buffer[4] .'</td><td>'. $lB_buffer[5] .'</td><td>'. $lB_buffer[6] .'</td><td>'. $lB_buffer[7] .'</td></tr>
                        <tr><td>6</td><td>Cacat</td><td>'. $c_buffer[0] .'</td><td>'. $c_buffer[1] .'</td><td>'. $c_buffer[2] .'</td><td>'. $c_buffer[3] .'</td><td>'. $c_buffer[4] .'</td><td>'. $c_buffer[5] .'</td><td>'. $c_buffer[6] .'</td><td>'. $c_buffer[7] .'</td></tr>
                        <tr><td>7</td><td>Posisi Label Depan dan Belakang</td><td>'. $pLDB_buffer[0] .'</td><td>'. $pLDB_buffer[1] .'</td><td>'. $pLDB_buffer[2] .'</td><td>'. $pLDB_buffer[3] .'</td><td>'. $pLDB_buffer[4] .'</td><td>'. $pLDB_buffer[5] .'</td><td>'. $pLDB_buffer[6] .'</td><td>'. $pLDB_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Benda Asing</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table><p style="width: 810px; margin: 0 auto">* Pengecekan dilakukan apabila diperlukan</p>


    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto;margin-top: 5px; margin-bottom: 5px"/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Packaging Material</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[16] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Bottle</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                            <tr><td>NPT</td><td>:</td><td>'. $dP_buffer[15] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Botol</td><td>'. $wB_buffer[0] .'</td><td>'. $wB_buffer[1] .'</td><td>'. $wB_buffer[2] .'</td><td>'. $wB_buffer[3] .'</td><td>'. $wB_buffer[4] .'</td><td>'. $wB_buffer[5] .'</td><td>'. $wB_buffer[6] .'</td><td>'. $wB_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Kondisi Screw *</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Tempat lubang</td><td>'. $tL_buffer[0] .'</td><td>'. $tL_buffer[1] .'</td><td>'. $tL_buffer[2] .'</td><td>'. $tL_buffer[3] .'</td><td>'. $tL_buffer[4] .'</td><td>'. $tL_buffer[5] .'</td><td>'. $tL_buffer[6] .'</td><td>'. $tL_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Label Depan</td><td>'. $lD_buffer[0] .'</td><td>'. $lD_buffer[1] .'</td><td>'. $lD_buffer[2] .'</td><td>'. $lD_buffer[3] .'</td><td>'. $lD_buffer[4] .'</td><td>'. $lD_buffer[5] .'</td><td>'. $lD_buffer[6] .'</td><td>'. $lD_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Label Belakang</td><td>'. $lB_buffer[0] .'</td><td>'. $lB_buffer[1] .'</td><td>'. $lB_buffer[2] .'</td><td>'. $lB_buffer[3] .'</td><td>'. $lB_buffer[4] .'</td><td>'. $lB_buffer[5] .'</td><td>'. $lB_buffer[6] .'</td><td>'. $lB_buffer[7] .'</td></tr>
                        <tr><td>6</td><td>Cacat</td><td>'. $c_buffer[0] .'</td><td>'. $c_buffer[1] .'</td><td>'. $c_buffer[2] .'</td><td>'. $c_buffer[3] .'</td><td>'. $c_buffer[4] .'</td><td>'. $c_buffer[5] .'</td><td>'. $c_buffer[6] .'</td><td>'. $c_buffer[7] .'</td></tr>
                        <tr><td>7</td><td>Posisi Label Depan dan Belakang</td><td>'. $pLDB_buffer[0] .'</td><td>'. $pLDB_buffer[1] .'</td><td>'. $pLDB_buffer[2] .'</td><td>'. $pLDB_buffer[3] .'</td><td>'. $pLDB_buffer[4] .'</td><td>'. $pLDB_buffer[5] .'</td><td>'. $pLDB_buffer[6] .'</td><td>'. $pLDB_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Benda Asing</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table><p style="width: 810px; margin: 0 auto">* Pengecekan dilakukan apabila diperlukan</p>
        ';
        } elseif ($_GET['data'] == "ibc") {
            $kVN_buffer = explode("#", $dP_buffer[6]);
            $tLK_buffer = explode("#", $dP_buffer[7]);
            $k_buffer = explode("#", $dP_buffer[8]);
            $aO_buffer = explode("#", $dP_buffer[9]);
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample IBC</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[10] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>IBC</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Kondisi Valve Nozzle</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td></tr>
                        <tr><td>2</td></td><td>Air / Oli</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample IBC</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[10] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>IBC</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Kondisi Valve Nozzle</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td></tr>
                        <tr><td>2</td></td><td>Air / Oli</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    
    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample IBC</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[10] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayyy = new Date();
        const monthNamesss = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayyy.getDate()+"-"+monthNamesss[todayyy.getMonth()]+"-"+todayyy.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>IBC</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Kondisi Valve Nozzle</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td><td>'. $kVN_buffer[0] .'</td><td>'. $kVN_buffer[1] .'</td><td>'. $kVN_buffer[2] .'</td><td>'. $kVN_buffer[3] .'</td><td>'. $kVN_buffer[4] .'</td><td>'. $kVN_buffer[5] .'</td><td>'. $kVN_buffer[6] .'</td><td>'. $kVN_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td><td>'. $k_buffer[0] .'</td><td>'. $k_buffer[1] .'</td><td>'. $k_buffer[2] .'</td><td>'. $k_buffer[3] .'</td><td>'. $k_buffer[4] .'</td><td>'. $k_buffer[5] .'</td><td>'. $k_buffer[6] .'</td><td>'. $k_buffer[7] .'</td></tr>
                        <tr><td>2</td></td><td>Air / Oli</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td><td>'. $aO_buffer[0] .'</td><td>'. $aO_buffer[1] .'</td><td>'. $aO_buffer[2] .'</td><td>'. $aO_buffer[3] .'</td><td>'. $aO_buffer[4] .'</td><td>'. $aO_buffer[5] .'</td><td>'. $aO_buffer[6] .'</td><td>'. $aO_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } elseif ($_GET['data'] == "p") {
            $wP_buffer = explode("#", $dP_buffer[6]);
            $tLK_buffer = explode("#", $dP_buffer[7]);
            $tLPB_buffer = explode("#", $dP_buffer[8]);
            $kS_buffer = explode("#", $dP_buffer[9]);
            $ko_buffer = explode("#", $dP_buffer[10]);
            $ka_buffer = explode("#", $dP_buffer[11]);
            $bA_buffer = explode("#", $dP_buffer[12]);
            $kYTB_buffer = explode("#", $dP_buffer[13]);
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Pail</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[14] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Pail</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Pail</td><td>'. $wP_buffer[0] .'</td><td>'. $wP_buffer[1] .'</td><td>'. $wP_buffer[2] .'</td><td>'. $wP_buffer[3] .'</td><td>'. $wP_buffer[4] .'</td><td>'. $wP_buffer[5] .'</td><td>'. $wP_buffer[6] .'</td><td>'. $wP_buffer[7] .'</td><td>'. $wP_buffer[0] .'</td><td>'. $wP_buffer[1] .'</td><td>'. $wP_buffer[2] .'</td><td>'. $wP_buffer[3] .'</td><td>'. $wP_buffer[4] .'</td><td>'. $wP_buffer[5] .'</td><td>'. $wP_buffer[6] .'</td><td>'. $wP_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Kondisi seal</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td></tr>
                        <tr><td>2</td></td><td>Karat</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Benda Asing</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Bau yang tidak biasa</td><td>'. $kYTB_buffer[0] .'</td><td>'. $kYTB_buffer[1] .'</td><td>'. $kYTB_buffer[2] .'</td><td>'. $kYTB_buffer[3] .'</td><td>'. $kYTB_buffer[4] .'</td><td>'. $kYTB_buffer[5] .'</td><td>'. $kYTB_buffer[6] .'</td><td>'. $kYTB_buffer[7] .'</td><td>'. $kYTB_buffer[0] .'</td><td>'. $kYTB_buffer[1] .'</td><td>'. $kYTB_buffer[2] .'</td><td>'. $kYTB_buffer[3] .'</td><td>'. $kYTB_buffer[4] .'</td><td>'. $kYTB_buffer[5] .'</td><td>'. $kYTB_buffer[6] .'</td><td>'. $kYTB_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } elseif ($_GET['data'] == "pc") {
            $wC_buffer = explode("#", $dP_buffer[6]);
            $ko_buffer = explode("#", $dP_buffer[7]);
            $gPC_buffer = explode("#", $dP_buffer[8]);
            $cPC_buffer = explode("#", $dP_buffer[9]);
            $l_buffer = explode("#", $dP_buffer[10]);
            $kS_buffer = explode("#", $dP_buffer[11]);
            $tBAMI_buffer = explode("#", $dP_buffer[12]);
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Cap</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[13] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Cap</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td style="height: 40px">No</td><td style="width: 240px" >Item Pengecekan</td><td style="width: 50px; text-align: center">1</td><td style="width: 50px; text-align: center">2</td><td style="width: 50px; text-align: center">3</td><td style="width: 50px; text-align: center">4</td><td style="width: 50px; text-align: center">5</td><td style="width: 50px; text-align: center">6</td><td style="width: 50px; text-align: center">7</td><td style="width: 50px; text-align: center">8</td></tr>
                        <tr><td>1</td><td>Warna Cap</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Kotoran</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Goresan pada cap</td><td>'. $gPC_buffer[0] .'</td><td>'. $gPC_buffer[1] .'</td><td>'. $gPC_buffer[2] .'</td><td>'. $gPC_buffer[3] .'</td><td>'. $gPC_buffer[4] .'</td><td>'. $gPC_buffer[5] .'</td><td>'. $gPC_buffer[6] .'</td><td>'. $gPC_buffer[7] .'</td><td>'. $gPC_buffer[0] .'</td><td>'. $gPC_buffer[1] .'</td><td>'. $gPC_buffer[2] .'</td><td>'. $gPC_buffer[3] .'</td><td>'. $gPC_buffer[4] .'</td><td>'. $gPC_buffer[5] .'</td><td>'. $gPC_buffer[6] .'</td><td>'. $gPC_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Cacat pada cap</td><td>'. $cPC_buffer[0] .'</td><td>'. $cPC_buffer[1] .'</td><td>'. $cPC_buffer[2] .'</td><td>'. $cPC_buffer[3] .'</td><td>'. $cPC_buffer[4] .'</td><td>'. $cPC_buffer[5] .'</td><td>'. $cPC_buffer[6] .'</td><td>'. $cPC_buffer[7] .'</td><td>'. $cPC_buffer[0] .'</td><td>'. $cPC_buffer[1] .'</td><td>'. $cPC_buffer[2] .'</td><td>'. $cPC_buffer[3] .'</td><td>'. $cPC_buffer[4] .'</td><td>'. $cPC_buffer[5] .'</td><td>'. $cPC_buffer[6] .'</td><td>'. $cPC_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Lubang</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td></tr>
                        <tr><td>6</td><td>Kondisi Seal</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td>7</td><td>Terdapat Bari atau Mata ikan</td><td>'. $tBAMI_buffer[0] .'</td><td>'. $tBAMI_buffer[1] .'</td><td>'. $tBAMI_buffer[2] .'</td><td>'. $tBAMI_buffer[3] .'</td><td>'. $tBAMI_buffer[4] .'</td><td>'. $tBAMI_buffer[5] .'</td><td>'. $tBAMI_buffer[6] .'</td><td>'. $tBAMI_buffer[7] .'</td><td>'. $tBAMI_buffer[0] .'</td><td>'. $tBAMI_buffer[1] .'</td><td>'. $tBAMI_buffer[2] .'</td><td>'. $tBAMI_buffer[3] .'</td><td>'. $tBAMI_buffer[4] .'</td><td>'. $tBAMI_buffer[5] .'</td><td>'. $tBAMI_buffer[6] .'</td><td>'. $tBAMI_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Cap</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[13] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Cap</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td style="height: 40px">No</td><td style="width: 240px" >Item Pengecekan</td><td style="width: 50px; text-align: center">1</td><td style="width: 50px; text-align: center">2</td><td style="width: 50px; text-align: center">3</td><td style="width: 50px; text-align: center">4</td><td style="width: 50px; text-align: center">5</td><td style="width: 50px; text-align: center">6</td><td style="width: 50px; text-align: center">7</td><td style="width: 50px; text-align: center">8</td></tr>
                        <tr><td>1</td><td>Warna Cap</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Kotoran</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Goresan pada cap</td><td>'. $gPC_buffer[0] .'</td><td>'. $gPC_buffer[1] .'</td><td>'. $gPC_buffer[2] .'</td><td>'. $gPC_buffer[3] .'</td><td>'. $gPC_buffer[4] .'</td><td>'. $gPC_buffer[5] .'</td><td>'. $gPC_buffer[6] .'</td><td>'. $gPC_buffer[7] .'</td><td>'. $gPC_buffer[0] .'</td><td>'. $gPC_buffer[1] .'</td><td>'. $gPC_buffer[2] .'</td><td>'. $gPC_buffer[3] .'</td><td>'. $gPC_buffer[4] .'</td><td>'. $gPC_buffer[5] .'</td><td>'. $gPC_buffer[6] .'</td><td>'. $gPC_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Cacat pada cap</td><td>'. $cPC_buffer[0] .'</td><td>'. $cPC_buffer[1] .'</td><td>'. $cPC_buffer[2] .'</td><td>'. $cPC_buffer[3] .'</td><td>'. $cPC_buffer[4] .'</td><td>'. $cPC_buffer[5] .'</td><td>'. $cPC_buffer[6] .'</td><td>'. $cPC_buffer[7] .'</td><td>'. $cPC_buffer[0] .'</td><td>'. $cPC_buffer[1] .'</td><td>'. $cPC_buffer[2] .'</td><td>'. $cPC_buffer[3] .'</td><td>'. $cPC_buffer[4] .'</td><td>'. $cPC_buffer[5] .'</td><td>'. $cPC_buffer[6] .'</td><td>'. $cPC_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Lubang</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td></tr>
                        <tr><td>6</td><td>Kondisi Seal</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td>7</td><td>Terdapat Bari atau Mata ikan</td><td>'. $tBAMI_buffer[0] .'</td><td>'. $tBAMI_buffer[1] .'</td><td>'. $tBAMI_buffer[2] .'</td><td>'. $tBAMI_buffer[3] .'</td><td>'. $tBAMI_buffer[4] .'</td><td>'. $tBAMI_buffer[5] .'</td><td>'. $tBAMI_buffer[6] .'</td><td>'. $tBAMI_buffer[7] .'</td><td>'. $tBAMI_buffer[0] .'</td><td>'. $tBAMI_buffer[1] .'</td><td>'. $tBAMI_buffer[2] .'</td><td>'. $tBAMI_buffer[3] .'</td><td>'. $tBAMI_buffer[4] .'</td><td>'. $tBAMI_buffer[5] .'</td><td>'. $tBAMI_buffer[6] .'</td><td>'. $tBAMI_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } elseif ($_GET['data'] == "pcb") {
            $kC_buffer = explode("#", $dP_buffer[6]);
            $wC_buffer = explode("#", $dP_buffer[7]);
            $kL_buffer = explode("#", $dP_buffer[8]);
            $g_buffer = explode("#", $dP_buffer[9]);
            $l_buffer = explode("#", $dP_buffer[10]);
            $kD_buffer = explode("#", $dP_buffer[11]);
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Carton Box</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[13] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Carton Box</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                            <tr><td>COA</td><td>:</td><td>'. $dP_buffer[12] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Kondisi Carton</td><td>'. $kC_buffer[0] .'</td><td>'. $kC_buffer[1] .'</td><td>'. $kC_buffer[2] .'</td><td>'. $kC_buffer[3] .'</td><td>'. $kC_buffer[4] .'</td><td>'. $kC_buffer[5] .'</td><td>'. $kC_buffer[6] .'</td><td>'. $kC_buffer[7] .'</td><td>'. $kC_buffer[0] .'</td><td>'. $kC_buffer[1] .'</td><td>'. $kC_buffer[2] .'</td><td>'. $kC_buffer[3] .'</td><td>'. $kC_buffer[4] .'</td><td>'. $kC_buffer[5] .'</td><td>'. $kC_buffer[6] .'</td><td>'. $kC_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Warna Carton</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Kotoran</td><td>'. $kL_buffer[0] .'</td><td>'. $kL_buffer[1] .'</td><td>'. $kL_buffer[2] .'</td><td>'. $kL_buffer[3] .'</td><td>'. $kL_buffer[4] .'</td><td>'. $kL_buffer[5] .'</td><td>'. $kL_buffer[6] .'</td><td>'. $kL_buffer[7] .'</td><td>'. $kL_buffer[0] .'</td><td>'. $kL_buffer[1] .'</td><td>'. $kL_buffer[2] .'</td><td>'. $kL_buffer[3] .'</td><td>'. $kL_buffer[4] .'</td><td>'. $kL_buffer[5] .'</td><td>'. $kL_buffer[6] .'</td><td>'. $kL_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Gambar</td><td>'. $g_buffer[0] .'</td><td>'. $g_buffer[1] .'</td><td>'. $g_buffer[2] .'</td><td>'. $g_buffer[3] .'</td><td>'. $g_buffer[4] .'</td><td>'. $g_buffer[5] .'</td><td>'. $g_buffer[6] .'</td><td>'. $g_buffer[7] .'</td><td>'. $g_buffer[0] .'</td><td>'. $g_buffer[1] .'</td><td>'. $g_buffer[2] .'</td><td>'. $g_buffer[3] .'</td><td>'. $g_buffer[4] .'</td><td>'. $g_buffer[5] .'</td><td>'. $g_buffer[6] .'</td><td>'. $g_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Label</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $kD_buffer[0] .'</td><td>'. $kD_buffer[1] .'</td><td>'. $kD_buffer[2] .'</td><td>'. $kD_buffer[3] .'</td><td>'. $kD_buffer[4] .'</td><td>'. $kD_buffer[5] .'</td><td>'. $kD_buffer[6] .'</td><td>'. $kD_buffer[7] .'</td><td>'. $kD_buffer[0] .'</td><td>'. $kD_buffer[1] .'</td><td>'. $kD_buffer[2] .'</td><td>'. $kD_buffer[3] .'</td><td>'. $kD_buffer[4] .'</td><td>'. $kD_buffer[5] .'</td><td>'. $kD_buffer[6] .'</td><td>'. $kD_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Carton Box</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[13] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Carton Box</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                            <tr><td>COA</td><td>:</td><td>'. $dP_buffer[12] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Kondisi Carton</td><td>'. $kC_buffer[0] .'</td><td>'. $kC_buffer[1] .'</td><td>'. $kC_buffer[2] .'</td><td>'. $kC_buffer[3] .'</td><td>'. $kC_buffer[4] .'</td><td>'. $kC_buffer[5] .'</td><td>'. $kC_buffer[6] .'</td><td>'. $kC_buffer[7] .'</td><td>'. $kC_buffer[0] .'</td><td>'. $kC_buffer[1] .'</td><td>'. $kC_buffer[2] .'</td><td>'. $kC_buffer[3] .'</td><td>'. $kC_buffer[4] .'</td><td>'. $kC_buffer[5] .'</td><td>'. $kC_buffer[6] .'</td><td>'. $kC_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Warna Carton</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td><td>'. $wC_buffer[0] .'</td><td>'. $wC_buffer[1] .'</td><td>'. $wC_buffer[2] .'</td><td>'. $wC_buffer[3] .'</td><td>'. $wC_buffer[4] .'</td><td>'. $wC_buffer[5] .'</td><td>'. $wC_buffer[6] .'</td><td>'. $wC_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Kotoran</td><td>'. $kL_buffer[0] .'</td><td>'. $kL_buffer[1] .'</td><td>'. $kL_buffer[2] .'</td><td>'. $kL_buffer[3] .'</td><td>'. $kL_buffer[4] .'</td><td>'. $kL_buffer[5] .'</td><td>'. $kL_buffer[6] .'</td><td>'. $kL_buffer[7] .'</td><td>'. $kL_buffer[0] .'</td><td>'. $kL_buffer[1] .'</td><td>'. $kL_buffer[2] .'</td><td>'. $kL_buffer[3] .'</td><td>'. $kL_buffer[4] .'</td><td>'. $kL_buffer[5] .'</td><td>'. $kL_buffer[6] .'</td><td>'. $kL_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Gambar</td><td>'. $g_buffer[0] .'</td><td>'. $g_buffer[1] .'</td><td>'. $g_buffer[2] .'</td><td>'. $g_buffer[3] .'</td><td>'. $g_buffer[4] .'</td><td>'. $g_buffer[5] .'</td><td>'. $g_buffer[6] .'</td><td>'. $g_buffer[7] .'</td><td>'. $g_buffer[0] .'</td><td>'. $g_buffer[1] .'</td><td>'. $g_buffer[2] .'</td><td>'. $g_buffer[3] .'</td><td>'. $g_buffer[4] .'</td><td>'. $g_buffer[5] .'</td><td>'. $g_buffer[6] .'</td><td>'. $g_buffer[7] .'</td></tr>
                        <tr><td>5</td><td>Label</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td><td>'. $l_buffer[0] .'</td><td>'. $l_buffer[1] .'</td><td>'. $l_buffer[2] .'</td><td>'. $l_buffer[3] .'</td><td>'. $l_buffer[4] .'</td><td>'. $l_buffer[5] .'</td><td>'. $l_buffer[6] .'</td><td>'. $l_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $kD_buffer[0] .'</td><td>'. $kD_buffer[1] .'</td><td>'. $kD_buffer[2] .'</td><td>'. $kD_buffer[3] .'</td><td>'. $kD_buffer[4] .'</td><td>'. $kD_buffer[5] .'</td><td>'. $kD_buffer[6] .'</td><td>'. $kD_buffer[7] .'</td><td>'. $kD_buffer[0] .'</td><td>'. $kD_buffer[1] .'</td><td>'. $kD_buffer[2] .'</td><td>'. $kD_buffer[3] .'</td><td>'. $kD_buffer[4] .'</td><td>'. $kD_buffer[5] .'</td><td>'. $kD_buffer[6] .'</td><td>'. $kD_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } elseif ($_GET['data'] == "pd") {
            $wD_buffer = explode("#", $dP_buffer[6]);
            $tLK_buffer = explode("#", $dP_buffer[7]);
            $tLPB_buffer = explode("#", $dP_buffer[8]);
            $kS_buffer = explode("#", $dP_buffer[9]);
            $ko_buffer = explode("#", $dP_buffer[10]);
            $ka_buffer = explode("#", $dP_buffer[11]);
            $bA_buffer = explode("#", $dP_buffer[12]);
            $bYTB_buffer = explode("#", $dP_buffer[13]);
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Drum</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[14] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Drum</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Drum</td><td>'. $wD_buffer[0] .'</td><td>'. $wD_buffer[1] .'</td><td>'. $wD_buffer[2] .'</td><td>'. $wD_buffer[3] .'</td><td>'. $wD_buffer[4] .'</td><td>'. $wD_buffer[5] .'</td><td>'. $wD_buffer[6] .'</td><td>'. $wD_buffer[7] .'</td><td>'. $wD_buffer[0] .'</td><td>'. $wD_buffer[1] .'</td><td>'. $wD_buffer[2] .'</td><td>'. $wD_buffer[3] .'</td><td>'. $wD_buffer[4] .'</td><td>'. $wD_buffer[5] .'</td><td>'. $wD_buffer[6] .'</td><td>'. $wD_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Kondisi seal</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Karat</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Benda Asing</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td></tr>
                        <tr><td>4</td></td><td>Bau yang tidak biasa</td><td>'. $bYTB_buffer[0] .'</td><td>'. $bYTB_buffer[1] .'</td><td>'. $bYTB_buffer[2] .'</td><td>'. $bYTB_buffer[3] .'</td><td>'. $bYTB_buffer[4] .'</td><td>'. $bYTB_buffer[5] .'</td><td>'. $bYTB_buffer[6] .'</td><td>'. $bYTB_buffer[7] .'</td><td>'. $bYTB_buffer[0] .'</td><td>'. $bYTB_buffer[1] .'</td><td>'. $bYTB_buffer[2] .'</td><td>'. $bYTB_buffer[3] .'</td><td>'. $bYTB_buffer[4] .'</td><td>'. $bYTB_buffer[5] .'</td><td>'. $bYTB_buffer[6] .'</td><td>'. $bYTB_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Drum</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[14] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>00</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td>Drum</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td>'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td>'. $dP_buffer[1] .'</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td>'. $dP_buffer[5] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td>'. $dP_buffer[3] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $appr .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -85px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Drum</td><td>'. $wD_buffer[0] .'</td><td>'. $wD_buffer[1] .'</td><td>'. $wD_buffer[2] .'</td><td>'. $wD_buffer[3] .'</td><td>'. $wD_buffer[4] .'</td><td>'. $wD_buffer[5] .'</td><td>'. $wD_buffer[6] .'</td><td>'. $wD_buffer[7] .'</td><td>'. $wD_buffer[0] .'</td><td>'. $wD_buffer[1] .'</td><td>'. $wD_buffer[2] .'</td><td>'. $wD_buffer[3] .'</td><td>'. $wD_buffer[4] .'</td><td>'. $wD_buffer[5] .'</td><td>'. $wD_buffer[6] .'</td><td>'. $wD_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td><td>'. $tLK_buffer[0] .'</td><td>'. $tLK_buffer[1] .'</td><td>'. $tLK_buffer[2] .'</td><td>'. $tLK_buffer[3] .'</td><td>'. $tLK_buffer[4] .'</td><td>'. $tLK_buffer[5] .'</td><td>'. $tLK_buffer[6] .'</td><td>'. $tLK_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td><td>'. $tLPB_buffer[0] .'</td><td>'. $tLPB_buffer[1] .'</td><td>'. $tLPB_buffer[2] .'</td><td>'. $tLPB_buffer[3] .'</td><td>'. $tLPB_buffer[4] .'</td><td>'. $tLPB_buffer[5] .'</td><td>'. $tLPB_buffer[6] .'</td><td>'. $tLPB_buffer[7] .'</td></tr>
                        <tr><td>4</td><td>Kondisi seal</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td><td>'. $kS_buffer[0] .'</td><td>'. $kS_buffer[1] .'</td><td>'. $kS_buffer[2] .'</td><td>'. $kS_buffer[3] .'</td><td>'. $kS_buffer[4] .'</td><td>'. $kS_buffer[5] .'</td><td>'. $kS_buffer[6] .'</td><td>'. $kS_buffer[7] .'</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td><td>'. $ko_buffer[0] .'</td><td>'. $ko_buffer[1] .'</td><td>'. $ko_buffer[2] .'</td><td>'. $ko_buffer[3] .'</td><td>'. $ko_buffer[4] .'</td><td>'. $ko_buffer[5] .'</td><td>'. $ko_buffer[6] .'</td><td>'. $ko_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Karat</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td><td>'. $ka_buffer[0] .'</td><td>'. $ka_buffer[1] .'</td><td>'. $ka_buffer[2] .'</td><td>'. $ka_buffer[3] .'</td><td>'. $ka_buffer[4] .'</td><td>'. $ka_buffer[5] .'</td><td>'. $ka_buffer[6] .'</td><td>'. $ka_buffer[7] .'</td></tr>
                        <tr><td>3</td><td>Benda Asing</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td><td>'. $bA_buffer[0] .'</td><td>'. $bA_buffer[1] .'</td><td>'. $bA_buffer[2] .'</td><td>'. $bA_buffer[3] .'</td><td>'. $bA_buffer[4] .'</td><td>'. $bA_buffer[5] .'</td><td>'. $bA_buffer[6] .'</td><td>'. $bA_buffer[7] .'</td></tr>
                        <tr><td>4</td></td><td>Bau yang tidak biasa</td><td>'. $bYTB_buffer[0] .'</td><td>'. $bYTB_buffer[1] .'</td><td>'. $bYTB_buffer[2] .'</td><td>'. $bYTB_buffer[3] .'</td><td>'. $bYTB_buffer[4] .'</td><td>'. $bYTB_buffer[5] .'</td><td>'. $bYTB_buffer[6] .'</td><td>'. $bYTB_buffer[7] .'</td><td>'. $bYTB_buffer[0] .'</td><td>'. $bYTB_buffer[1] .'</td><td>'. $bYTB_buffer[2] .'</td><td>'. $bYTB_buffer[3] .'</td><td>'. $bYTB_buffer[4] .'</td><td>'. $bYTB_buffer[5] .'</td><td>'. $bYTB_buffer[6] .'</td><td>'. $bYTB_buffer[7] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } elseif ($_GET['data'] == "add") {
            if($dP_buffer[5] == '1') $apprA =  "Approved"; else $apprA =  "Declined";
            if($dP_buffer[1] == 'baseOil') $iC =  "Base Oil"; else $iC =  "Additive";
            echo '
            <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Raw Material Non Bulk</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[14] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var today = new Date();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(today.getDate()+"-"+monthNames[today.getMonth()]+"-"+today.getFullYear());
    </script>
</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td colspan="3">'. $iC .'</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td colspan="3">'. $dP_buffer[3] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td colspan="3">'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td colspan="3">'. $dP_buffer[4] .'</td></tr>
                            <tr><td>Lot Number</td><td>:</td><td colspan="3">'. $dP_buffer[6] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $apprA .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center"> </td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 430px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">Result</td></tr>
                        <tr><td colspan="2">Visual</td></tr>
                        <tr><td>1</td><td>Nama Produk sesuai dengan dokumen</td><td style="text-align: center">'. $dP_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Berat Produk sesuai dengan packing list</td><td style="text-align: center">'. $dP_buffer[8] .'</td></tr>
                        <tr><td>3</td><td>Seal terpasang dengan baik</td><td style="text-align: center">'. $dP_buffer[9] .'</td></tr>
                        <tr><td>4</td><td>Bocor /lubang</td><td style="text-align: center">'. $dP_buffer[10] .'</td></tr>
                        <tr><td>5</td><td>Kotoran / Benda asing</td><td style="text-align: center">'. $dP_buffer[11] .'</td></tr>
                        <tr><td>6</td><td>Penyok</td><td style="text-align: center">'. $dP_buffer[12] .'</td></tr>
                        <tr><td>7</td><td>Karat</td><td style="text-align: center">'. $dP_buffer[13] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <br/>
    <hr style="border-top: 3px dotted black; width: 810px; margin: 0 auto;margin-top: 5px; margin-bottom: 5px"/>
    <br/>
    
    <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Raw Material Non Bulk</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>'. $dP_buffer[14] .'</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>
                    <script>
        var todayy = new Date();
        const monthNamess = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];
        document.write(todayy.getDate()+"-"+monthNamess[todayy.getMonth()]+"-"+todayy.getFullYear());
    </script>

</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td colspan="3">'. $iC .'</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td colspan="3">'. $dP_buffer[3] .'</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td colspan="3">'. $dP_buffer[2] .'</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td colspan="3">'. $dP_buffer[4] .'</td></tr>
                            <tr><td>Lot Number</td><td>:</td><td colspan="3">'. $dP_buffer[6] .'</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td style="width: 80px; text-align: center">'. $apprA .'</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center"> </td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 430px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">Result</td></tr>
                        <tr><td colspan="2">Visual</td></tr>
                        <tr><td>1</td><td>Nama Produk sesuai dengan dokumen</td><td style="text-align: center">'. $dP_buffer[7] .'</td></tr>
                        <tr><td>2</td><td>Berat Produk sesuai dengan packing list</td><td style="text-align: center">'. $dP_buffer[8] .'</td></tr>
                        <tr><td>3</td><td>Seal terpasang dengan baik</td><td style="text-align: center">'. $dP_buffer[9] .'</td></tr>
                        <tr><td>4</td><td>Bocor /lubang</td><td style="text-align: center">'. $dP_buffer[10] .'</td></tr>
                        <tr><td>5</td><td>Kotoran / Benda asing</td><td style="text-align: center">'. $dP_buffer[11] .'</td></tr>
                        <tr><td>6</td><td>Penyok</td><td style="text-align: center">'. $dP_buffer[12] .'</td></tr>
                        <tr><td>7</td><td>Karat</td><td style="text-align: center">'. $dP_buffer[13] .'</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
            ';
        } else {
            echo '<br><h4>Data tabel tidak tersedia karena type barang tidak sesuai aturan!</h4>';
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
</div>
</body>
</html>