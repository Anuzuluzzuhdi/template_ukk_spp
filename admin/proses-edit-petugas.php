<?php
$id_petugas = $_GET['id_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST['level'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=update_petugas&id_petugas=$id_petugas",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => "id_petugas=$id_petugas&username=$username&password=$password&nama_petugas=$nama_petugas&level=$level",
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

header('location:?url=petugas');
