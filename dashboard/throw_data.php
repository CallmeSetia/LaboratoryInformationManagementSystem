<?php
require_once '../assets/functions.php';
require_once  '../koneksi/koneksi.php';
session_start();

$incoming_data = $_POST['jenisData'];
$inD_buffer = explode('#', $incoming_data);

function throwData() {
    function grabData($tabData, $idData) {
        error_reporting(0);
        $incoming_data = $_POST['jenisData'];
        $DB_HOST = "127.0.0.1";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_DATABASE = "lims";
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
        $hasilQ = $conn->query("SELECT id_". $tabData ." FROM tbl_detail_pkg_". $tabData . " WHERE id_". $tabData . " = " . $idData);
        $rowD = $hasilQ->fetch_assoc();
        //print_r($hasilQ);
        //echo "<br>";
        //print_r($rowD);
        //echo "<br>";
        //return $rowD;
        //echo strtolower($rowD[0]);
        if (null !== $rowD['id_'.$tabData]) {
            return($rowD['id_'.$tabData]);
        } else {
            return "404 Not Found";
        }
    }
    function grabDataAdd($tabData, $idData) {
        error_reporting(0);
        $incoming_data = $_POST['jenisData'];
        $DB_HOST = "127.0.0.1";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_DATABASE = "lims";
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
        $hasilQ = $conn->query("SELECT id_add FROM tbl_detail_add WHERE id_add = " . $idData);
        $rowD = $hasilQ->fetch_assoc();
        //print_r($hasilQ);
        //echo "<br>";
        //print_r($rowD);
        //echo "<br>";
        //return $rowD;
        //echo strtolower($rowD[0]);
        if (null !== $rowD['id_'.$tabData]) {
            return($rowD['id_'.$tabData]);
        } else {
            return "404 Not Found";
        }
    }
    $incoming_data = $_POST['jenisData'];
    $inD_buffer = explode('#', $incoming_data);
    $DB_HOST = "127.0.0.1";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_DATABASE = "lims";
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);
    if (strtolower((string) $inD_buffer[0]) == "pc") {
        if (grabData("pc", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pc SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_cap = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', kotoran = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', goresan_pc = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', cacat_pc = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', lubang = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', kondisi_seal = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', terdapat_bami = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."' WHERE id_pc=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("pc", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pc, tgl_cek, approval, jml_produk, cek_sampel, warna_cap, kotoran, goresan_pc, cacat_pc, lubang, kondisi_seal, terdapat_bami) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "ibc") {
        if (grabData("ibc", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_ibc SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', kondisi_vn = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', kotoran = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', air_oli = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."' WHERE id_ibc=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("ibc", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_ibc, tgl_cek, approval, jml_produk, cek_sampel, kondisi_vn, terdapat_lk, kotoran, air_oli) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "p") {
        if (grabData("p", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_p SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_pail = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', terdapat_lpb = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', kondisi_seal = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', kotoran = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', karat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', benda_asing = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', kotoran_ytb = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."' WHERE id_p=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("p", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_p, tgl_cek, approval, jml_produk, cek_sampel, warna_pail, terdapat_lk, terdapat_lpb, kondisi_seal, kotoran, karat, benda_asing, kotoran_ytb) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '".$_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8']."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pd") {
        if (grabData("pd", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pd SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_drum = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', terdapat_lk = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', terdapat_lpb = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', kondisi_seal = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', kotoran = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', karat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', benda_asing = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', bau_ytb = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."' WHERE id_pd=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("pd", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pd, tgl_cek, approval, jml_produk, cek_sampel, warna_drum, terdapat_lk, terdapat_lpb, kondisi_seal, kotoran, karat, benda_asing, bau_ytb) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '".$_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8']."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pm") {
        if (grabData("pm", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pm SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', warna_botol = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', kondisi_screw = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', tempat_lubang = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', label_depan = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', label_belakang = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', cacat = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', posisi_ldb = '". $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] ."', kotoran = '". $_POST['8,1']."#".$_POST['8,2']."#".$_POST['8,3']."#".$_POST['8,4']."#".$_POST['8,5']."#".$_POST['8,6']."#".$_POST['8,7']."#".$_POST['8,8'] ."', benda_asing = '". $_POST['9,1']."#".$_POST['9,2']."#".$_POST['9,3']."#".$_POST['9,4']."#".$_POST['9,5']."#".$_POST['9,6']."#".$_POST['9,7']."#".$_POST['9,8'] ."', npt = '". $_POST['NPT'] ."' WHERE id_pm=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("pm", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pm, tgl_cek, approval, jml_produk, cek_sampel, warna_botol, kondisi_screw, tempat_lubang, label_depan, label_belakang, cacat, posisi_ldb, kotoran, benda_asing, npt) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '" . $_POST['7,1'] . "#" . $_POST['7,2'] . "#" . $_POST['7,3'] . "#" . $_POST['7,4'] . "#" . $_POST['7,5'] . "#" . $_POST['7,6'] . "#" . $_POST['7,7'] . "#" . $_POST['7,8'] . "', '" . $_POST['8,1'] . "#" . $_POST['8,2'] . "#" . $_POST['8,3'] . "#" . $_POST['8,4'] . "#" . $_POST['8,5'] . "#" . $_POST['8,6'] . "#" . $_POST['8,7'] . "#" . $_POST['8,8'] . "', '" . $_POST['9,1'] . "#" . $_POST['9,2'] . "#" . $_POST['9,3'] . "#" . $_POST['9,4'] . "#" . $_POST['9,5'] . "#" . $_POST['9,6'] . "#" . $_POST['9,7'] . "#" . $_POST['9,8'] . "', '" . $_POST['NPT'] . "')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "pcb") {
        if (grabData("pcb", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_pkg_pcb SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', cek_sampel = '". $_POST['cekSampel'] ."', kondisi_cart = '". $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] ."', warna_cart = '". $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] ."', kotoran_l = '". $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] ."', gambar = '". $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] ."', label = '". $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] ."', kotoran_d = '". $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] ."', coa = '". $_POST['COA'] ."' WHERE id_pcb=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabData("pcb", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_pkg_" . $inD_buffer[0] . " (id_pcb, tgl_cek, approval, jml_produk, cek_sampel, kondisi_cart, warna_cart, kotoran_l, gambar, label, kotoran_d, coa) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['cekSampel'] . "' ,'" . $_POST['1,1'] . "#" . $_POST['1,2'] . "#" . $_POST['1,3'] . "#" . $_POST['1,4'] . "#" . $_POST['1,5'] . "#" . $_POST['1,6'] . "#" . $_POST['1,7'] . "#" . $_POST['1,8'] . "', '" . $_POST['2,1'] . "#" . $_POST['2,2'] . "#" . $_POST['2,3'] . "#" . $_POST['2,4'] . "#" . $_POST['2,5'] . "#" . $_POST['2,6'] . "#" . $_POST['2,7'] . "#" . $_POST['2,8'] . "', '" . $_POST['3,1'] . "#" . $_POST['3,2'] . "#" . $_POST['3,3'] . "#" . $_POST['3,4'] . "#" . $_POST['3,5'] . "#" . $_POST['3,6'] . "#" . $_POST['3,7'] . "#" . $_POST['3,8'] . "', '" . $_POST['4,1'] . "#" . $_POST['4,2'] . "#" . $_POST['4,3'] . "#" . $_POST['4,4'] . "#" . $_POST['4,5'] . "#" . $_POST['4,6'] . "#" . $_POST['4,7'] . "#" . $_POST['4,8'] . "', '" . $_POST['5,1'] . "#" . $_POST['5,2'] . "#" . $_POST['5,3'] . "#" . $_POST['5,4'] . "#" . $_POST['5,5'] . "#" . $_POST['5,6'] . "#" . $_POST['5,7'] . "#" . $_POST['5,8'] . "', '" . $_POST['6,1'] . "#" . $_POST['6,2'] . "#" . $_POST['6,3'] . "#" . $_POST['6,4'] . "#" . $_POST['6,5'] . "#" . $_POST['6,6'] . "#" . $_POST['6,7'] . "#" . $_POST['6,8'] . "', '". $_POST['COA'] ."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        }
    } elseif (strtolower((string) $inD_buffer[0]) == "add") {
        if (grabDataAdd("add", $inD_buffer[1]) == $inD_buffer[1]) {
            $sql_update = "UPDATE tbl_detail_add SET tgl_cek='" . $_POST['tgl_cek'] . "', approval = '". $_POST['approval'] . "', jml_produk = '". $_POST['jumlahProduct'] . "', item_check = '". $_POST['item_check'] . "', nama_produk = '". $_POST['namaProduct'] . "', nama_psdd = '". $_POST['1,1'] . "', berat_psdpl = '". $_POST['2,1'] . "', seal_tdb = '". $_POST['3,1'] . "', bocorl = '". $_POST['4,1'] . "', kotoranba = '". $_POST['5,1'] . "', penyok = '". $_POST['6,1'] . "', karat = '". $_POST['7,1'] ."' WHERE id_add=" . $inD_buffer[1];
            if ($conn->query($sql_update) === TRUE) {
                echo "Data telah diperbarui!";
            } else {
                echo "Data gagal diperbarui!";
            }
        } elseif (grabDataAdd("pcb", $inD_buffer[1]) != $inD_buffer[1]) {
            $sql_insert = "INSERT INTO tbl_detail_add (id_add, item_check, approval, jml_produk, tgl_cek, nama_produk, nama_psdd, berat_psdpl, seal_tdb, bocorl, kotoranba, penyok, karat) VALUES ('" . $inD_buffer[1] . "', '" . $_POST['item_check'] . "', '" . $_POST['approval'] . "', '" . $_POST['jumlahProduct'] . "', '" . $_POST['tgl_cek'] . "', '" . $_POST['namaProduct'] . "' ,'" . $_POST['1,1'] . "' ,'" . $_POST['2,1'] . "' ,'" . $_POST['3,1'] . "' ,'" . $_POST['4,1'] . "' ,'" . $_POST['5,1'] . "' ,'" . $_POST['6,1'] . "' ,'" . $_POST['7,1'] ."')";
            if ($conn->query($sql_insert) === TRUE) {
                echo "Data telah tersimpan!";
            } else {
                echo "Data gagal disimpan!";
            }
        } else {
            echo("galat");
        }
    } else {
        echo '<br><h4>Data tidak dikenali!</h4>';
    }
}

function tampilTombolTambahData() {
    if (strtolower((string) $_SESSION['role']) == "siteman") {
        echo '<a href="tambah_data.php"><button class="btn btn-primary mb-2 " >+ Tambah Data</button></a>';
    }
}

function dataEditStatus(){

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
                        <span>Hallo, <?php echo (string) $_SESSION['username'];  ?> </span>
                    </div>
                </li>

                <li class="menu">
                    <a href="" aria-expanded="false" onClick="window.location.reload();" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                            <span>MENU</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="<?php echo "index.php?role=".$_SESSION['role']."" ?>" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                            <span>MENU</span>
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
                    <div class="bio-skill-box box box-shadow text-left">
                        <h2>Status Data</h2>

                        <div class="row mt-5">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <!-- <div id="grafik-FULL-PID" class=""> -->
                                <?php throwData() ?>
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