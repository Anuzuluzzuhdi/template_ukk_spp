<?php
$id_kelas = $_GET['id_kelas'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_kelas_id&id_kelas=$id_kelas",
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
$api = $json->data;
?>

<h5>Halaman Tambah Data Kelas.</h5>
<a href="?url=kelas" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-edit-kelas&id_kelas=<?= $id_kelas; ?>" method="post">
    <?php
    foreach ($api as $data) {
    ?>
    <div class="form-group mb-2">
        <label>Nama kelas</label>
        <input value="<?= $data->nama_kelas ?>" type="text" name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kompetensi Keahlian</label>
        <input value="<?= $data->kompetensi_keahlian ?>" type="text" name="kompetensi_keahlian" class="form-control" required>
    </div>
    <?php } ?>
    <div class="form-group">
        <button type="submit" class="btn btn-success">SIMPAN</button>
        <button type="reset" class="btn btn-warning">KOSONGKAN</button>
    </div>
</form>