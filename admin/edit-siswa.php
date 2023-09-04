<?php
$nisn = $_GET['nisn'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_siswa_id&nisn=$nisn",
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
$api_siswa = $json->data;

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
<form action="?url=proses-edit-siswa&nisn=<?= $nisn ?>" method="post">
    <?php foreach ($api_siswa as $data) { ?>
        <div class="form-group mb-2">
            <label>NISN</label>
            <input value="<?= $data->nisn ?>" name="nisn" class="form-control" readonly>
        </div>
        <div class="form-group mb-2">
            <label>NIS</label>
            <input value="<?= $data->nis ?>" type="number" name="nis" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>NAMA</label>
            <input value="<?= $data->nama ?>" type="text" name="nama" maxlength="25" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>KELAS</label>
            <select name="id_kelas" class="form-control" required>
                <option value="<?= $data->id_kelas ?>"> <?= $data->nama_kelas ?> </option>
            <?php } ?>
            <?php
            foreach ($api_kelas as $data_kelas) {
            ?>
                <option value="<?= $data_kelas->id_kelas ?>"> <?= $data_kelas->nama_kelas ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>ALAMAT</label>
            <textarea name="alamat" class="form-control" required><?= $data->alamat ?></textarea>
        </div>
        <div class="form-group mb-2">
            <label>NO TELEPON</label>
            <input value="<?= $data->no_telp ?>" type="number" name="no_telp" maxlength="13" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>SPP</label>
            <select name="id_spp" class="form-control" required>
                <option value="<?= $data->id_spp ?>"><?= $data->tahun ?> | <?= number_format($data->nominal, 2, ',', '.') ?></option>
                <?php
                foreach ($api_spp as $data_spp) {
                ?>
                    <option value="<?= $data_spp->id_spp ?>"> <?= $data_spp->tahun ?> | <?= number_format($data_spp->nominal, 2, ',', '.') ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-warning">KOSONGKAN</button>
        </div>
</form>