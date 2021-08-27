<?php
require_once  dirname(__FILE__).DIRECTORY_SEPARATOR.'koneksi'.DIRECTORY_SEPARATOR.'koneksi.php';
$flag = 0;
//$array[] = '';

if (($open = fopen("databases.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
        $array[] = $data;

    }

    fclose($open);
    $flag = 1;
}

if ($flag == 1) {
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }

    $sizeCSV = (int) sizeof($array) - 1;

    for ($i = 0; $i < $sizeCSV+1; $i++) {
        $item_code = (string) $array[$i][0];
        $packaging_name = (string)  $array[$i][1];
        $supplier_name = (string)  $array[$i][2];


        $sqlInsertData = "INSERT INTO `tbl_data_item_botol`(`id_item`, `item_code`, `packaging_name`, `supplier_name`) VALUES ('NULL', '$item_code', '$packaging_name', '$supplier_name' )";
        $hasil = $koneksi -> query($sqlInsertData);

        if (!$hasil) {
            echo $i." GAGAL INSERT";
            break;
        }
    }
}

?>