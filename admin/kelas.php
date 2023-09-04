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
$api = $json->data;
?>
<h5>Halaman Data Kelas.</h5>
<a href="?url=tambah-kelas" class="btn btn-primary">Tambah Kelas</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Kompetensi Keahlian</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    $no = 1;
    foreach ($api as $data) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->nama_kelas ?></td>
            <td><?= $data->kompetensi_keahlian ?></td>
            <td>
                <a href="?url=edit-kelas&id_kelas=<?= $data->id_kelas ?>" class="btn btn-warning">EDIT</a>
            </td>
            <td>
                <a href="?url=hapus-kelas&id_kelas=<?= $data->id_kelas ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')">HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>