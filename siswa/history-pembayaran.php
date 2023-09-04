<?php
$nisn = $_SESSION['nisn'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_history_pembayaran&nisn=$nisn",
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
<h5>History Pembayaran.</h5>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Tahun SPP</td>
        <td>Nominal Dibayar</td>
        <td>Sudah Dibayar</td>
        <td>Tanggal Bayar</td>
        <td>Petugas</td>
    </tr>
    <?php
    $no = 1;
    foreach ($api as $data) {
        $date = date_create($data->tgl_bayar);
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data->nisn ?></td>
            <td><?= $data->nama ?></td>
            <td><?= $data->nama_kelas ?></td>
            <td><?= $data->tahun ?></td>
            <td><?= number_format($data->nominal, 2, ',', '.'); ?></td>
            <td><?= number_format($data->jumlah_bayar, 2, ',', '.'); ?></td>
            <td><?= date_format($date, "d-m-Y") ?></td>
            <td><?= $data->nama_petugas ?></td>
        </tr>
    <?php } ?>
</table>