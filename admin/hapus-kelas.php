<?php
$id_kelas = $_GET['id_kelas'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=delete_kelas&id_kelas=$id_kelas",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'DELETE',
));

$response = curl_exec($curl);

curl_close($curl);

header('location:?url=kelas');
