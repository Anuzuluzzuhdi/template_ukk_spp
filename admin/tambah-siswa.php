<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_spp/phprestapi.php?function=get_kelas',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
$json = json_decode($response);
$api_kelas = $json->data;


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_spp/phprestapi.php?function=get_spp',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
curl_close($curl);
$json = json_decode($response);
$api_spp = $json->data;
?>
<h5>Halaman Tambah Data Siswa.</h5>
<a href="?url=siswa" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-tambah-siswa" method="post">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="text" name="nisn" maxlength="11" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" name="nis" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NAMA</label>
        <input type="text" name="nama" maxlength="25" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>KELAS</label>
        <select name="id_kelas" class="form-select" required>
            <option value="">Pilih Kelas</option>
            <?php
            foreach ($api_kelas as $data_kelas) {
            ?>
                <option value="<?= $data_kelas->id_kelas ?>"> <?= $data_kelas->nama_kelas ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>ALAMAT</label>
        <textarea name="alamat" class="form-control"></textarea>
    </div>
    <div class="form-group mb-2">
        <label>NO TELEPON</label>
        <input type="number" name="no_telp" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-select" required>
            <option value="">Pilih SPP</option>
            <?php
            foreach ($api_spp as $data_spp) {
            ?>
                <option value="<?= $data_spp->id_spp ?>"><?= $data_spp->tahun . ' | ' . number_format($data_spp->nominal, 2, ',', '.') ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
        <button type="reset" class="btn btn-warning">KOSONGKAN</button>
    </div>
</form>