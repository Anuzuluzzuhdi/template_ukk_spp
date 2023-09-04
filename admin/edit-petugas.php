<?php
$id_petugas = $_GET['id_petugas'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_petugas_id&id_petugas=$id_petugas",
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

<h5>Halaman Tambah Data Petugas.</h5>
<a href="?url=petugas" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-edit-petugas&id_petugas=<?= $id_petugas; ?>" method="post">
    <?php foreach ($api as $data) { ?>
        <div class="form-group mb-2">
            <label>Username</label>
            <input value="<?= $data->username ?>" type="text" name="username" maxlength="25" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Password</label>
            <input value="<?= $data->password ?>" type="text" name="password" maxlength="32" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Nama Petugas</label>
            <input value="<?= $data->nama_petugas ?>" type="text" name="nama_petugas" maxlength="35" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Level</label>
            <select name="level" class="form-control" required>
                <option value="<?= $data->level ?>"><?= $data->level ?></option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        <?php } ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
            <button type="reset" class="btn btn-warning">KOSONGKAN</button>
        </div>
</form>