<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Print</title>
    <link rel="stylesheet" href="../template_table/template/table-styling.css">
</head>
<body>
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
        print_r($dP_buffer);
        /*if ($data_print[1] == "pm"){
            $wB_buffer = explode('+', )
        }*/
    }

    $jd = '';
    if (isset($_GET['data'])){
        if ($_GET['data'] == "pm") {
            $jd = "pm";
            echo '
        <table class="content">
        <tr style="padding: 0px; overflow: hidden;">
            <td style="padding: 0px" style="width: 180px"><img src="../template_table/logo/logo.png" alt="logo" style="width: 150px; padding-left: 5px; padding-right: 5px"/></td>
            <td style="padding: 0px"><h1 style="text-align: center">Pengecekan Sample Packaging Material</h1></td>
            <td style="width: 250px; padding: 0px">
                <table class="content-0">
                    <tr><td>Doc No</td><td>:</td><td>DN-PC-F-034</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>Date</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td colspan="3">Bottle</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td colspan="3">Nama produk</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td colspan="3">Jumlah produk</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td colspan="3">8</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td colspan="3">Tanggal</td></tr>
                            <tr><td>NPT</td><td>:</td><td>Valid</td><td>/</td><td>Expired</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td>appr</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Botol</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>2</td><td>Kondisi Screw *</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>3</td><td>Tempat lubang</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>4</td><td>Label Depan</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>5</td><td>Label Belakang</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>6</td><td>Cacat</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>7</td><td>Posisi Label Depan dan Belakang</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>2</td><td>Benda Asing</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
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
                    <tr><td>Doc No</td><td>:</td><td>DN-PC-F-034</td></tr>
                    <tr><td>Revision</td><td>:</td><td>02</td></tr>
                    <tr><td>Issued Date</td><td>:</td><td>Date</td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="width:780px;height: 200px;">
                    <div style="float: left">
                        <table class="content-1a">
                            <tr><td>Item Check</td><td>:</td><td colspan="3">Bottle</td></tr>
                            <tr><td>Nama Product</td><td>:</td><td colspan="3">Nama produk</td></tr>
                            <tr><td>Jumlah Product</td><td>:</td><td colspan="3">Jumlah produk</td></tr>
                            <tr><td>Cek Sampel</td><td>:</td><td colspan="3">8</td></tr>
                            <tr><td>Tanggal</td><td>:</td><td colspan="3">Tanggal</td></tr>
                            <tr><td>NPT</td><td>:</td><td>Valid</td><td>/</td><td>Expired</td></tr>
                        </table>
                    </div>
                    <div style="float: right">
                        <table class="content-1b">
                            <tr><td style="width: 80px; text-align: center">Acknowledge</td><td style="width: 80px; text-align: center">Approved</td><td style="width: 80px; text-align: center">Inspector</td></tr>
                            <tr style="height: 50px"><td>ack</td><td>appr</td><td>ins</td></tr>
                            <tr><td style="text-align: center">PC</td><td style="text-align: center">QC</td><td style="text-align: center">QC</td></tr>
                        </table>
                    </div>
                </div>
                <div style="width:780px;margin-top: -65px;">
                    <table class="content-2">
                        <tr><td>No</td><td style="width: 240px">Item Pengecekan</td><td rowspan="2" style="width: 50px; text-align: center">1</td><td rowspan="2" style="width: 50px; text-align: center">2</td><td rowspan="2" style="width: 50px; text-align: center">3</td><td rowspan="2" style="width: 50px; text-align: center">4</td><td rowspan="2" style="width: 50px; text-align: center">5</td><td rowspan="2" style="width: 50px; text-align: center">6</td><td rowspan="2" style="width: 50px; text-align: center">7</td><td rowspan="2" style="width: 50px; text-align: center">8</td></tr>
                        <tr><td colspan="2">Kondisi Luar</td></tr>
                        <tr><td>1</td><td>Warna Botol</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>2</td><td>Kondisi Screw *</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>3</td><td>Tempat lubang</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>4</td><td>Label Depan</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>5</td><td>Label Belakang</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td>6</td><td>Cacat</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>7</td><td>Posisi Label Depan dan Belakang</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td><td>OK</td></tr>
                        <tr><td colspan="10">Kondisi Dalam</td></tr>
                        <tr><td>1</td><td>Kotoran</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                        <tr><td>2</td><td>Benda Asing</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td><td>Ada</td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table><p style="width: 810px; margin: 0 auto">* Pengecekan dilakukan apabila diperlukan</p>
        ';
        } elseif ($_GET['data'] == "ibc") {
            $jd = "ibc";
            echo '';
        } elseif ($_GET['data'] == "p") {
            $jd = "p";
            echo '';
        } elseif ($_GET['data'] == "pc") {
            $jd = "pc";
            echo '';
        } elseif ($_GET['data'] == "pcb") {
            $jd = "pcb";
            echo '';
        } elseif ($_GET['data'] == "pd") {
            $jd = "pd";
            echo '';
        } elseif ($_GET['data'] == "add") {
            $jd = "add";
            echo '';
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