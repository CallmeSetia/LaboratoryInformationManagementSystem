<?php
require_once '../assets/functions.php';
require_once '../koneksi/koneksi.php';
session_start();
//print_r($_SESSION);

$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}
$FLAG_HAPUS = 0;
//print_r($_SESSION);
if (isset($_POST['id_utama'])) {
    $id_utama = $_POST['id_utama'];
    $mode = $_POST['mode'];
    $id_pkg = $_POST['id_pkg'];

    if ($mode == "packaging") {
        $jenis = strtolower((string) $_POST['jenis']);
        $jenisData = "";
        print_r($_POST);
        if (strtolower( $jenis) == "drum") {
            $jenisData = "pd";
        } elseif (strtolower((string)$jenis) == "pail") {
            $jenisData = "p";
        } elseif (strtolower((string) $jenis) == "cap") {
            $jenisData = "pc";
        } elseif (strtolower((string)$jenis) == "cartonbox") {
            $jenisData = "pcb";
        } elseif (strtolower((string) $jenis) == "material") {
            $jenisData = "pm";
        } elseif (strtolower((string) $jenis) == "ibc") {
            $jenisData = "ibc";
        }elseif (strtolower((string) $jenis) == "lbl") {
            $jenisData = "ibc";
        }
        else {
            $jenisData = "x";
        }
        echo "PE";
        if ($jenisData != "x") { // VALID
            echo "PE";
            $sql_deleteUtama = "DELETE FROM `tbl_utama_pkg` WHERE `id_utama` = '$id_utama' ";
            $sqlSelectDetail = "SELECT * FROM tbl_detail_pkg_" . $jenisData . " WHERE id_".$jenisData." = '$id_pkg'";

            echo "$sqlSelectDetail";

            $hasilDelete = $koneksi->query($sql_deleteUtama);
            $hasilSelectDetail = $koneksi->query($sqlSelectDetail);

            if ($num_rows = $hasilSelectDetail->num_rows > 0) {
                echo "HAI";
                $sql_deleteDetail = "DELETE FROM tbl_detail_pkg_".$jenisData." WHERE id_".$jenisData." = '$id_pkg' ";
                $hasilDeleteDetail = $koneksi->query($sql_deleteDetail);
                echo "$sql_deleteDetail";
                echo "HAII";
                if ($hasilDeleteDetail) {
                    echo "x1";
                    $FLAG_HAPUS = 1;
                } else {
                    echo "x0";
                    $FLAG_HAPUS = -1;
                }
            } else {
                if ($hasilDelete) {
                    $FLAG_HAPUS = 1;
                } else {
                    $FLAG_HAPUS = -1;
                }
            }
        }
        else {
            $FLAG_HAPUS = -1;
        }

    }
    elseif ($mode == "additive") {

        $sql_deleteUtama = "DELETE FROM `tbl_utama_add` WHERE `id_utama` = '$id_utama' ";
        $sqlSelectDetail = "SELECT * FROM `tbl_detail_add` WHERW `id_utama` = '$id_utama'";

        $hasilDelete = $koneksi->query($sql_deleteUtama);
        $hasilSelectDetail = $koneksi->query($sqlSelectDetail);

        if ($num_rows = $hasilSelectDetail->num_rows > 0) {
            $sql_deleteDetail = "DELETE FROM tbl_detail_add WHERE `id_utama` = '$id_utama' ";
            $hasilDeleteDetail = $koneksi->query($sql_deleteDetail);

            if ($hasilDeleteDetail) {
                $FLAG_HAPUS = 1;
            } else {
                $FLAG_HAPUS = -1;
            }
        } else {
            if ($hasilDelete) {
                $FLAG_HAPUS = 1;
            } else {
                $FLAG_HAPUS = -1;
            }
        }

    }

}

if ($FLAG_HAPUS == 1) {
    $mode = $_POST['mode'];
    if ($mode == "packaging") {
        header("Location: index.php?page=packaging");
    } else if ($mode == "additive") {
        header("Location: index.php?page=additive");
    }
}
else if ($FLAG_HAPUS == -1) {
    $mode = $_POST['mode'];
    if ($mode == "packaging") {
        header("Location: index.php?page=packaging");
    } else if ($mode == "additive") {
        header("Location: index.php?page=additive");
    }
}
else {
    $mode = $_POST['mode'];
    if ($mode == "packaging") {
        header("Location: index.php?page=packaging");
    } else if ($mode == "additive") {
        header("Location: index.php?page=additive");
    }
}


?>


