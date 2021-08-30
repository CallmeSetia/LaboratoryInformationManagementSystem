<?php
require_once '../koneksi/koneksi.php';
session_start();

$koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

if ($koneksi->connect_errno) {
    echo "Connection Error: " . $koneksi->connect_error;
}

$FLAG_UPDATE = 0;

//updated

if (isset($_POST['updated'])) {
    // AMBIL DATA USER INPUT
    //    print_r($_POST);
    $idUtama = $_POST['idUtama'];

    $docNumber = $_POST['docNumber'];
    $issuedDate = $_POST['issuedDate'];
    $receiveTime = $_POST['receiveTime'];

//    $itemCode = $_POST['itemCode'];
    $itemType = $_POST['itemType'];
    $itemId = $_POST['itemId'];
    $productName = $_POST['productName'];

    $Quantity = $_POST['Quantity'];
    $PackagingCondition = $_POST['PackagingCondition'];

    $status = $_POST['status'];
    $remark = $_POST['remark'];

    $Submitted = $_POST['Submitted'];
    $Received = $_POST['Received'];

    $sql_update = "UPDATE `tbl_utama_pkg` SET `id_utama`='$idUtama',`doc_no`='$docNumber',`date`='$issuedDate',`receive_time`='$receiveTime',
                           `id_item_pkg`='$itemId',`item_check`='$itemType',`quantity`='$Quantity',`packaging_condition`='$PackagingCondition',`status`='$status',
                           `remark`='$remark',`submitted`='$Submitted',`received`='$Received' WHERE `id_utama` = $idUtama";

    $hasilUpdate = $koneksi -> query($sql_update);

    if ($hasilUpdate) {
        $FLAG_UPDATE = 1;
        header("Location: index.php?page=packaging");
    }
    else {
        $FLAG_UPDATE = -1;
    }

}