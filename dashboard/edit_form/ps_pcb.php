<form action="../dashboard/throw_data.php" method="POST">
    <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Carton Box</h4>
    </div>

    <div class="form-group mb-4">
        <label for="approval">Approval</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="approval" name="approval" value="1" checked/>Approve</td><td style="padding:10px;"><input id="approval" type="radio" name="approval" value="0"/>Decline</td></tr></table>
    </div>

    <div class="form-group mb-4">
        <label for="namaProduct">Nama Product</label>
        <input type="text" class="form-control" id="namaProduct" name="namaProduct" placeholder="Nama Product">
    </div>
    <div class="form-group mb-4">
        <label for="jumlahProduct">Jumlah Product</label>
        <input type="text" class="form-control" id="jumlahProduct" name="jumlahProduct" placeholder="Jumlah Product">
    </div>

    <div class="form-group mb-4">
        <label for="cekSampel">Cek Sampel</label>
        <input type="text" class="form-control" id="cekSampel" name="cekSampel" placeholder="Cek Sampel">
    </div>

    <div class="form-group mb-4">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
    </div>

    <div class="form-group mb-4">
        <label for="COA">COA</label><br/>
        <table style="font-size: medium"><tr><td style="padding:10px;"><input type="radio" id="COA" name="COA" value="Ada" checked/>Ada</td><td style="padding:10px;"><input id="COA" type="radio" name="COA" value="Tidak"/>Tidak</td></tr></table>
    </div>

    <div class="form-row mb-4">
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
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Kondisi Carton</td><td><input type="radio" name="1,1" value="OK1,1" checked/>OK<br/><input type="radio" name="1,1" value="NG1,1"/>NG</td><td><input type="radio" name="1,2" value="OK1,2" checked/>OK<br/><input type="radio" name="1,2" value="NG1,2"/>NG</td><td><input type="radio" name="1,3" value="OK1,3" checked/>OK<br/><input type="radio" name="1,3" value="NG1,3"/>NG</td><td><input type="radio" name="1,4" value="OK1,4" checked/>OK<br/><input type="radio" name="1,4" value="NG1,4"/>NG</td><td><input type="radio" name="1,5" value="OK1,5" checked/>OK<br/><input type="radio" name="1,5" value="NG1,5"/>NG</td><td><input type="radio" name="1,6" value="OK1,6" checked/>OK<br/><input type="radio" name="1,6" value="NG1,6"/>NG</td><td><input type="radio" name="1,7" value="OK1,7" checked/>OK<br/><input type="radio" name="1,7" value="NG1,7"/>NG</td><td><input type="radio" name="1,8" value="OK1,8" checked/>OK<br/><input type="radio" name="1,8" value="NG1,8"/>NG</td></tr>
            <tr><td>2</td><td>Warna Carton</td><td><input type="radio" name="2,1" value="OK2,1" checked/>OK<br/><input type="radio" name="2,1" value="NG2,1"/>NG</td><td><input type="radio" name="2,2" value="OK2,2" checked/>OK<br/><input type="radio" name="2,2" value="NG2,2"/>NG</td><td><input type="radio" name="2,3" value="OK2,3" checked/>OK<br/><input type="radio" name="2,3" value="NG2,3"/>NG</td><td><input type="radio" name="2,4" value="OK2,4" checked/>OK<br/><input type="radio" name="2,4" value="NG2,4"/>NG</td><td><input type="radio" name="2,5" value="OK2,5" checked/>OK<br/><input type="radio" name="2,5" value="NG2,5"/>NG</td><td><input type="radio" name="2,6" value="OK2,6" checked/>OK<br/><input type="radio" name="2,6" value="NG2,6"/>NG</td><td><input type="radio" name="2,7" value="OK2,7" checked/>OK<br/><input type="radio" name="2,7" value="NG2,7"/>NG</td><td><input type="radio" name="2,8" value="OK2,8" checked/>OK<br/><input type="radio" name="2,8" value="NG2,8"/>NG</td></tr>
            <tr><td>3</td><td>Kotoran</td><td><input type="radio" name="3,1" value="Ada3,1" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak3,1"/>Tidak</td><td><input type="radio" name="3,2" value="Ada3,2" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak3,2"/>Tidak</td><td><input type="radio" name="3,3" value="Ada3,3" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak3,3"/>Tidak</td><td><input type="radio" name="3,4" value="Ada3,4" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak3,4"/>Tidak</td><td><input type="radio" name="3,5" value="Ada3,5" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak3,5"/>Tidak</td><td><input type="radio" name="3,6" value="Ada3,6" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak3,6"/>Tidak</td><td><input type="radio" name="3,7" value="Ada3,7" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak3,7"/>Tidak</td><td><input type="radio" name="3,8" value="Ada3,8" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak3,8"/>Tidak</td></tr>
            <tr><td>4</td><td>Gambar</td><td><input type="radio" name="4,1" value="Ada4,1" checked/>Ada<br/><input type="radio" name="4,1" value="Tidak4,1"/>Tidak</td><td><input type="radio" name="4,2" value="Ada4,2" checked/>Ada<br/><input type="radio" name="4,2" value="Tidak4,2"/>Tidak</td><td><input type="radio" name="4,3" value="Ada4,3" checked/>Ada<br/><input type="radio" name="4,3" value="Tidak4,3"/>Tidak</td><td><input type="radio" name="4,4" value="Ada4,4" checked/>Ada<br/><input type="radio" name="4,4" value="Tidak4,4"/>Tidak</td><td><input type="radio" name="4,5" value="Ada4,5" checked/>Ada<br/><input type="radio" name="4,5" value="Tidak4,5"/>Tidak</td><td><input type="radio" name="4,6" value="Ada4,6" checked/>Ada<br/><input type="radio" name="4,6" value="Tidak4,6"/>Tidak</td><td><input type="radio" name="4,7" value="Ada4,7" checked/>Ada<br/><input type="radio" name="4,7" value="Tidak4,7"/>Tidak</td><td><input type="radio" name="4,8" value="Ada4,8" checked/>Ada<br/><input type="radio" name="4,8" value="Tidak4,8"/>Tidak</td></tr>
            <tr><td>5</td><td>Label</td><td><input type="radio" name="5,1" value="Ada5,1" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak5,1"/>Tidak</td><td><input type="radio" name="5,2" value="Ada5,2" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak5,2"/>Tidak</td><td><input type="radio" name="5,3" value="Ada5,3" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak5,3"/>Tidak</td><td><input type="radio" name="5,4" value="Ada5,4" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak5,4"/>Tidak</td><td><input type="radio" name="5,5" value="Ada5,5" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak5,5"/>Tidak</td><td><input type="radio" name="5,6" value="Ada5,6" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak5,6"/>Tidak</td><td><input type="radio" name="5,7" value="Ada5,7" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak5,7"/>Tidak</td><td><input type="radio" name="5,8" value="Ada5,8" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak5,8"/>Tidak</td></tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="6,1" value="Ada6,1" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak6,1"/>Tidak</td><td><input type="radio" name="6,2" value="Ada6,2" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak6,2"/>Tidak</td><td><input type="radio" name="6,3" value="Ada6,3" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak6,3"/>Tidak</td><td><input type="radio" name="6,4" value="Ada6,4" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak6,4"/>Tidak</td><td><input type="radio" name="6,5" value="Ada6,5" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak6,5"/>Tidak</td><td><input type="radio" name="6,6" value="Ada6,6" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak6,6"/>Tidak</td><td><input type="radio" name="6,7" value="Ada6,7" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak6,7"/>Tidak</td><td><input type="radio" name="6,8" value="Ada6,8" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak6,8"/>Tidak</td></tr>
        </table>
    </div>

    <div class="form-group mb-4">
        <form action="../dashboard/throw_data.php" method="POST"><button type="submit" name="jenisData" value="pcb" class="btn btn-primary mt-4 ">Submit</button></form>
        <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
    </div>
</form>