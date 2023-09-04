<?php

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
$api = $json->data;
?>
<h5>Halaman Data SPP.</h5>
<a href="?url=tambah-spp" class="btn btn-primary">Tambah SPP</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Tahun</td>
        <td>Nominal</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    $no = 1;
    foreach ($api as $data) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->tahun ?></td>
            <td><?= $data->nominal ?></td>
            <td>
                <a href="?url=edit-spp&id_spp=<?= $data->id_spp ?>" class="btn btn-warning">EDIT</a>
            </td>
            <td>
                <a href="?url=hapus-spp&id_spp=<?= $data->id_spp ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')">HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>