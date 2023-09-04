<?php
$id_petugas = $_SESSION['id_petugas'];
$nisn = $_POST['nisn'];
$tgl_bayar = $_POST['tgl_bayar'];
$bulan_bayar = $_POST['bulan_bayar'];
$tahun_dibayar = $_POST['tahun_dibayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_spp/phprestapi.php?function=insert_pembayaran',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_POSTFIELDS => "id_petugas=$id_petugas&nisn=$nisn&tgl_bayar=$tgl_bayar&bulan_dibayar=$bulan_bayar&tahun_dibayar=$tahun_dibayar&id_spp=$id_spp&jumlah_bayar=$jumlah_bayar",
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
header('location:?url=pembayaran');