<?php
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/api_spp/phprestapi.php?function=insert_spp',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'id_spp=&tahun=' . $tahun . '&nominal=' . $nominal . '',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));
$response = curl_exec($curl); 

curl_close($curl);
header('location:?url=spp');
