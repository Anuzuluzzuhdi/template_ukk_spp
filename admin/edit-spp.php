<?php
$id_spp = $_GET['id_spp'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_spp_id&id_spp=$id_spp",
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

<h5>Halaman Tambah Data SPP.</h5>
<a href="?url=spp" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-edit-spp&id_spp=<?= $id_spp; ?>" method="post">
    <?php foreach ($api as $data) { ?>
        <div class="form-group mb-2">
            <label>Tahun</label>
            <input value="<?= $data->tahun ?>" type="number" name="tahun" maxlength="4" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Nominal</label>
            <input value="<?= $data->nominal ?>" type="number" name="nominal" maxlength="13" class="form-control" required>
        </div>
    <?php } ?>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
        <button type="reset" class="btn btn-warning">KOSONGKAN</button>
    </div>
</form>