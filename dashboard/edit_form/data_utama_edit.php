<?php
include  '../koneksi/koneksi.php';
    // ==== KONEKSI DATABASE
    $koneksi = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE);

    if ($koneksi->connect_errno) {
        echo "Connection Error: " . $koneksi->connect_error;
    }
    // ===== END
    $id_utama = (int)  $_POST['id_utama'];
    $sql_select = "SELECT * FROM `tbl_utama_pkg` LEFT JOIN tbl_data_item_pkg ON tbl_data_item_pkg.id_item_pkg = tbl_utama_pkg.id_item_pkg WHERE id_utama = $id_utama";

    $hasilQuery = $koneksi->query($sql_select);
    $row = $hasilQuery->fetch_assoc();

//    print_r($row);
?>

<form  action="../dashboard/throw_update_utama.php" method="POST">

    <input type="hidden" name="idUtama" value="<?= $id_utama?>">
    
    <div class="form-group mb-4">
        <label for="docNumber">Document No.</label>
        <input type="text" class="form-control" id="docNumber" name="docNumber" value="<?=$row['doc_no']; ?>" placeholder="Doc No">
    </div>
    <div class="form-group mb-4">
        <label for="issuedDate">Issued Date</label>
        <input type="text" class="form-control" id="issuedDate" name="issuedDate"  value="<?=$row['date']; ?>" placeholder="Issued Date">
    </div>

    <div class="form-group mb-4">
        <label for="issuedDate">Receive Time</label>
        <input type="text" class="form-control" id="receiveTime" name="receiveTime" value="<?=$row['receive_time']; ?>" placeholder="Receive Time">
    </div>

    <div class="form-row mb-4">
        <div class="form-group col-md-4">
            <label for="itemCode">Item Code</label> <br>

            <select class="selectpicker" id="itemCode" name="itemCode" data-live-search="true">
                <option value="<?=$row['item_code']; ?>" selected disabled hidden><?=$row['item_code']; ?></option>
                <?php
                $sqlSelectItem = "SELECT * FROM `tbl_data_item_pkg`";
                $hasilQuery = $koneksi->query($sqlSelectItem);

                while($rows = $hasilQuery->fetch_array() ) {?>
                    <option value="<?php echo $rows[0]."+%".$rows[2]?>"><?php echo strtoupper($rows[1]); ?></option>
                <?php }?>
            </select>
            <!--  <span id="prints">asdsd</span>-->
            <input type="hidden" name="itemType" id="prints" value="<?=$row['item_check']; ?>" >
            <input type="hidden" name="itemId" id="itemId" value="<?=$row['id_item_pkg']; ?>" >
        </div>

        <div class="form-group col-md-5">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" value="<?=$row['packaging_name']; ?>" name="productName" placeholder="Product Name">
        </div>

    </div>

    <div class="form-group mb-4">
        <label for="Quantity">Quantity</label>
        <input type="text" class="form-control" id="Quantity" value="<?=$row['quantity']; ?>" name="Quantity" placeholder="Quantity">
    </div>

    <div class="form-group mb-4">
        <label for="PackagingCondition">Packaging Condition</label>
        <input type="text" class="form-control" id="PackagingCondition" value="<?=$row['packaging_condition']; ?>" name="PackagingCondition" placeholder="Packaging Condition">
    </div>

    <div class="form-group mb-4">
        <label for="status">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="<?=$row['status']; ?>"  placeholder="Status" required>
    </div>

    <div class="form-group mb-4">
        <label for="remark">Remark</label>
        <input type="text" class="form-control" id="remark"  name="remark" value="<?=$row['remark']; ?>"  placeholder="Remark">
    </div>

    <div class="form-group mb-4">
        <label for="Submitted">Submitted Name</label>
        <input type="text" class="form-control" id="Submitted" name="Submitted" value="<?=$row['submitted']; ?>" placeholder="Submitted Name">
    </div>

    <div class="form-group mb-4">
        <label for="Received">Received Name</label>
        <input type="text" class="form-control" id="Received" name="Received" value="<?=$row['received']; ?>" placeholder="Received Name">
    </div>
    
    
    <input type="hidden" name="updated" value="update" />
    <div class="form-group mb-4">
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
        <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            //$('#productName').val("<?//=$row['packaging_name']; ?>//");
            $("#itemCode").change(function () {
                // $("#prints").text($(this).find('option:selected').text());
                var buff = $("#productName").val($(this).val());
                var splitText = $(this).val().split("+%"); // splitText[0] - id

                $("#productName").val(splitText[1]);
                $("#itemId").val(splitText[0]); // idItem
                // console.log($(this).val().split("+%"));



                var selectedItemCode = $(this).find('option:selected').text();
                var arr =  selectedItemCode.split("-");
                var typeItem = arr[0].split("P");

                console.log(typeItem);
                console.log(arr);

                // PARSING ITME CODE to Product Type

                if (typeItem[1] == 08 || typeItem[1] == "08" ) { // PAIL
                    $("#prints").val("PAIL");
                    console.log("PAIL");
                }
            else if (typeItem[1] == 01 || typeItem[1] == "01" ) { // BOTOL
                    if (arr[1] > 252 && arr[1] < 256) {
                        $("#prints").val("TUBE");
                        console.log("TUBE");
                    }
                    else {
                        $("#prints").val("BOTOL");
                        console.log("BOTOL");
                    }
                }
                else if (typeItem[1] == 04 || typeItem[1] == "04" ) { // DRUM
                    $("#prints").val("DRUM");
                    console.log("DRUM");
                }

                else if (typeItem[1] == 05 || typeItem[1] == "05" ) { // LABEL
                    $("#prints").val("LABEL");
                    console.log("LABEL");
                }

                else if (typeItem[1] == 03 || typeItem[1] == "03" ) { // CARTON
                    $("#prints").val("CARTON");
                    console.log("CARTON");
                }

                else if (typeItem[1] == 02 || typeItem[1] == "02" ) { // CAP
                    if (arr[1] == 26) {
                        $("#prints").val("COVER CAP");
                        console.log("COVER CAP");
                    }
                    else {
                        $("#prints").val("CAP");
                        console.log("CAP");
                    }

                }
                else { // DRUM
                    $("#prints").val("DRUM");
                    console.log("DRUM");
                }

            });
        });
    </script>
</form>