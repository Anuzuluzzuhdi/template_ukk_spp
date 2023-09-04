<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_spp/phprestapi.php?function=get_siswa',
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
<h5>Halaman Data Siswa.</h5>
<a href="?url=tambah-siswa" class="btn btn-primary">Tambah Siswa</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>NIS</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Alamat</td>
        <td>No Telepon</td>
        <td>SPP</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    $no = 1;
    foreach ($api as $data) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->nisn ?></td>
            <td><?= $data->nis ?></td>
            <td><?= $data->nama ?></td>
            <td><?= $data->nama_kelas ?></td>
            <td><?= $data->alamat ?></td>
            <td><?= $data->no_telp ?></td>
            <td><?= $data->tahun ?> - <?= number_format($data->nominal, 2, ',', '.'); ?></td>
            <td>
                <a href="?url=edit-siswa&nisn=<?= $data->nisn ?>" class="btn btn-warning">EDIT</a>
            </td>
            <td>
                <a href="?url=hapus-siswa&nisn=<?= $data->nisn ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')">HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>