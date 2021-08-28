<form action="../dashboard/throw_data.php" method="POST">
    <div class="form-group mb-4">
        <label for="itemCheck">Item Check</label><br/>
        <h4 id="itemCheck">Pail</h4>
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

    <div class="form-row mb-4">
        <style>
            .check_form {
                margin: 5px;
            }
            .check_form, tr {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .check_form, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 8px;
            }
        </style>
        <label for="pengecekan">Pengecekan</label><br/>
        <table class="check_form" id="pengecekan">
            <tr><td>No</td><td style="width: 400px">Item Pengecekan</td><td rowspan="2" style="width: 80px; text-align: center">1</td><td rowspan="2" style="width: 80px; text-align: center">2</td><td rowspan="2" style="width: 80px; text-align: center">3</td><td rowspan="2" style="width: 80px; text-align: center">4</td><td rowspan="2" style="width: 80px; text-align: center">5</td><td rowspan="2" style="width: 80px; text-align: center">6</td><td rowspan="2" style="width: 80px; text-align: center">7</td><td rowspan="2" style="width: 80px; text-align: center">8</td></tr>
            <tr><td colspan="2">Kondisi Luar</td></tr>
            <tr><td>1</td><td>Warna Pail</td><td><input type="radio" name="1,1" value="OK1,1" checked/>OK<br/><input type="radio" name="1,1" value="NG1,1"/>NG</td><td><input type="radio" name="1,2" value="OK1,2" checked/>OK<br/><input type="radio" name="1,2" value="NG1,2"/>NG</td><td><input type="radio" name="1,3" value="OK1,3" checked/>OK<br/><input type="radio" name="1,3" value="NG1,3"/>NG</td><td><input type="radio" name="1,4" value="OK1,4" checked/>OK<br/><input type="radio" name="1,4" value="NG1,4"/>NG</td><td><input type="radio" name="1,5" value="OK1,5" checked/>OK<br/><input type="radio" name="1,5" value="NG1,5"/>NG</td><td><input type="radio" name="1,6" value="OK1,6" checked/>OK<br/><input type="radio" name="1,6" value="NG1,6"/>NG</td><td><input type="radio" name="1,7" value="OK1,7" checked/>OK<br/><input type="radio" name="1,7" value="NG1,7"/>NG</td><td><input type="radio" name="1,8" value="OK1,8" checked/>OK<br/><input type="radio" name="1,8" value="NG1,8"/>NG</td></tr>
            <tr><td>2</td><td>Terdapat lubang/kebocoran</td><td><input type="radio" name="2,1" value="Ada2,1" checked/>Ada<br/><input type="radio" name="2,1" value="Tidak2,1"/>Tidak</td><td><input type="radio" name="2,2" value="Ada2,2" checked/>Ada<br/><input type="radio" name="2,2" value="Tidak2,2"/>Tidak</td><td><input type="radio" name="2,3" value="Ada2,3" checked/>Ada<br/><input type="radio" name="2,3" value="Tidak2,3"/>Tidak</td><td><input type="radio" name="2,4" value="Ada2,4" checked/>Ada<br/><input type="radio" name="2,4" value="Tidak2,4"/>Tidak</td><td><input type="radio" name="2,5" value="Ada2,5" checked/>Ada<br/><input type="radio" name="2,5" value="Tidak2,5"/>Tidak</td><td><input type="radio" name="2,6" value="Ada2,6" checked/>Ada<br/><input type="radio" name="2,6" value="Tidak2,6"/>Tidak</td><td><input type="radio" name="2,7" value="Ada2,7" checked/>Ada<br/><input type="radio" name="2,7" value="Tidak2,7"/>Tidak</td><td><input type="radio" name="2,8" value="Ada2,8" checked/>Ada<br/><input type="radio" name="2,8" value="Tidak2,8"/>Tidak</td></tr>
            <tr><td>3</td><td>Terdapat lekukan pada bodi</td><td><input type="radio" name="3,1" value="Ada3,1" checked/>Ada<br/><input type="radio" name="3,1" value="Tidak3,1"/>Tidak</td><td><input type="radio" name="3,2" value="Ada3,2" checked/>Ada<br/><input type="radio" name="3,2" value="Tidak3,2"/>Tidak</td><td><input type="radio" name="3,3" value="Ada3,3" checked/>Ada<br/><input type="radio" name="3,3" value="Tidak3,3"/>Tidak</td><td><input type="radio" name="3,4" value="Ada3,4" checked/>Ada<br/><input type="radio" name="3,4" value="Tidak3,4"/>Tidak</td><td><input type="radio" name="3,5" value="Ada3,5" checked/>Ada<br/><input type="radio" name="3,5" value="Tidak3,5"/>Tidak</td><td><input type="radio" name="3,6" value="Ada3,6" checked/>Ada<br/><input type="radio" name="3,6" value="Tidak3,6"/>Tidak</td><td><input type="radio" name="3,7" value="Ada3,7" checked/>Ada<br/><input type="radio" name="3,7" value="Tidak3,7"/>Tidak</td><td><input type="radio" name="3,8" value="Ada3,8" checked/>Ada<br/><input type="radio" name="3,8" value="Tidak3,8"/>Tidak</td></tr>
            <tr><td>4</td><td>Kondisi Seal</td><td><input type="radio" name="4,1" value="OK4,1" checked/>OK<br/><input type="radio" name="4,1" value="NG4,1"/>NG</td><td><input type="radio" name="4,2" value="OK4,2" checked/>OK<br/><input type="radio" name="4,2" value="NG4,2"/>NG</td><td><input type="radio" name="4,3" value="OK4,3" checked/>OK<br/><input type="radio" name="4,3" value="NG4,3"/>NG</td><td><input type="radio" name="4,4" value="OK4,4" checked/>OK<br/><input type="radio" name="4,4" value="NG4,4"/>NG</td><td><input type="radio" name="4,5" value="OK4,5" checked/>OK<br/><input type="radio" name="4,5" value="NG4,5"/>NG</td><td><input type="radio" name="4,6" value="OK4,6" checked/>OK<br/><input type="radio" name="4,6" value="NG4,6"/>NG</td><td><input type="radio" name="4,7" value="OK4,7" checked/>OK<br/><input type="radio" name="4,7" value="NG4,7"/>NG</td><td><input type="radio" name="4,8" value="OK4,8" checked/>OK<br/><input type="radio" name="4,8" value="NG4,8"/>NG</td></tr>
            <tr><td colspan="10">Kondisi Dalam</td></tr>
            <tr><td>1</td><td>Kotoran</td><td><input type="radio" name="5,1" value="Ada5,1" checked/>Ada<br/><input type="radio" name="5,1" value="Tidak5,1"/>Tidak</td><td><input type="radio" name="5,2" value="Ada5,2" checked/>Ada<br/><input type="radio" name="5,2" value="Tidak5,2"/>Tidak</td><td><input type="radio" name="5,3" value="Ada5,3" checked/>Ada<br/><input type="radio" name="5,3" value="Tidak5,3"/>Tidak</td><td><input type="radio" name="5,4" value="Ada5,4" checked/>Ada<br/><input type="radio" name="5,4" value="Tidak5,4"/>Tidak</td><td><input type="radio" name="5,5" value="Ada5,5" checked/>Ada<br/><input type="radio" name="5,5" value="Tidak5,5"/>Tidak</td><td><input type="radio" name="5,6" value="Ada5,6" checked/>Ada<br/><input type="radio" name="5,6" value="Tidak5,6"/>Tidak</td><td><input type="radio" name="5,7" value="Ada5,7" checked/>Ada<br/><input type="radio" name="5,7" value="Tidak5,7"/>Tidak</td><td><input type="radio" name="5,8" value="Ada5,8" checked/>Ada<br/><input type="radio" name="5,8" value="Tidak5,8"/>Tidak</td></tr>
            <tr><td>2</td><td>Karat</td><td><input type="radio" name="6,1" value="Ada6,1" checked/>Ada<br/><input type="radio" name="6,1" value="Tidak6,1"/>Tidak</td><td><input type="radio" name="6,2" value="Ada6,2" checked/>Ada<br/><input type="radio" name="6,2" value="Tidak6,2"/>Tidak</td><td><input type="radio" name="6,3" value="Ada6,3" checked/>Ada<br/><input type="radio" name="6,3" value="Tidak6,3"/>Tidak</td><td><input type="radio" name="6,4" value="Ada6,4" checked/>Ada<br/><input type="radio" name="6,4" value="Tidak6,4"/>Tidak</td><td><input type="radio" name="6,5" value="Ada6,5" checked/>Ada<br/><input type="radio" name="6,5" value="Tidak6,5"/>Tidak</td><td><input type="radio" name="6,6" value="Ada6,6" checked/>Ada<br/><input type="radio" name="6,6" value="Tidak6,6"/>Tidak</td><td><input type="radio" name="6,7" value="Ada6,7" checked/>Ada<br/><input type="radio" name="6,7" value="Tidak6,7"/>Tidak</td><td><input type="radio" name="6,8" value="Ada6,8" checked/>Ada<br/><input type="radio" name="6,8" value="Tidak6,8"/>Tidak</td></tr>
            <tr><td>3</td><td>Benda Asing</td><td><input type="radio" name="7,1" value="Ada7,1" checked/>Ada<br/><input type="radio" name="7,1" value="Tidak7,1"/>Tidak</td><td><input type="radio" name="7,2" value="Ada7,2" checked/>Ada<br/><input type="radio" name="7,2" value="Tidak7,2"/>Tidak</td><td><input type="radio" name="7,3" value="Ada7,3" checked/>Ada<br/><input type="radio" name="7,3" value="Tidak7,3"/>Tidak</td><td><input type="radio" name="7,4" value="Ada7,4" checked/>Ada<br/><input type="radio" name="7,4" value="Tidak7,4"/>Tidak</td><td><input type="radio" name="7,5" value="Ada7,5" checked/>Ada<br/><input type="radio" name="7,5" value="Tidak7,5"/>Tidak</td><td><input type="radio" name="7,6" value="Ada7,6" checked/>Ada<br/><input type="radio" name="7,6" value="Tidak7,6"/>Tidak</td><td><input type="radio" name="7,7" value="Ada7,7" checked/>Ada<br/><input type="radio" name="7,7" value="Tidak7,7"/>Tidak</td><td><input type="radio" name="7,8" value="Ada7,8" checked/>Ada<br/><input type="radio" name="7,8" value="Tidak7,8"/>Tidak</td></tr>
            <tr><td>4</td><td>Bau yang tidak biasa</td><td><input type="radio" name="8,1" value="Ada8,1" checked/>Ada<br/><input type="radio" name="8,1" value="Tidak8,1"/>Tidak</td><td><input type="radio" name="8,2" value="Ada8,2" checked/>Ada<br/><input type="radio" name="8,2" value="Tidak8,2"/>Tidak</td><td><input type="radio" name="8,3" value="Ada8,3" checked/>Ada<br/><input type="radio" name="8,3" value="Tidak8,3"/>Tidak</td><td><input type="radio" name="8,4" value="Ada8,4" checked/>Ada<br/><input type="radio" name="8,4" value="Tidak8,4"/>Tidak</td><td><input type="radio" name="8,5" value="Ada8,5" checked/>Ada<br/><input type="radio" name="8,5" value="Tidak8,5"/>Tidak</td><td><input type="radio" name="8,6" value="Ada8,6" checked/>Ada<br/><input type="radio" name="8,6" value="Tidak8,6"/>Tidak</td><td><input type="radio" name="8,7" value="Ada8,7" checked/>Ada<br/><input type="radio" name="8,7" value="Tidak8,7"/>Tidak</td><td><input type="radio" name="8,8" value="Ada8,8" checked/>Ada<br/><input type="radio" name="8,8" value="Tidak8,8"/>Tidak</td></tr>
        </table>
    </div>

    <div class="form-group mb-4">
        <form action="../dashboard/throw_data.php" method="POST"><button type="submit" name="jenisData" value="p" class="btn btn-primary mt-4 ">Submit</button></form>
        <button type="reset" class="btn btn-outline-danger mt-4">Reset</button>
    </div>
</form>