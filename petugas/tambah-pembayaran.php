<?php
$nisn = $_GET['nisn'];
$kekurangan = $_GET['kekurangan'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://localhost/api_spp/phprestapi.php?function=get_siswa_id&nisn=$nisn",
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

<h5>Halaman Pembayaran SPP.</h5>
<a href="?url=pembayaran" class="btn btn-primary">KEMBALI</a>
<hr>
<form action="?url=proses-tambah-pembayaran&nisn=<?= $nisn ?>" method="post">
    <?php
    foreach ($api as $data) {
    ?>
        <input value="<?= $data->id_spp ?>" type="text" class="form-control" name="id_spp" hidden required>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" class="form-control" disabled required>
        </div>
        <div class="form-group mb-2">
            <label>NISN</label>
            <input value="<?= $data->nisn ?>" type="text" class="form-control" name="nisn" readonly required>
        </div>
        <div class="form-group mb-2">
            <label>Nama Siswa</label>
            <input value="<?= $data->nama ?>" type="text" class="form-control" disabled required>
        </div>
    <?php } ?>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Bulan Bayar</label>
        <select name="bulan_bayar" class="form-select" required>
            <option value="">Pilih Bulan Dibayar</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
        <div class="form-group mb-2">
            <label>Tahun Bayar</label>
            <select name="tahun_dibayar" class="form-control" required>
                <option value=""></option>
                <?php 
                for($i=2010; $i<=date('Y'); $i++){
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    <div class="form-group mb-2">
        <label>Jumlah Bayar (Jumlah yang harus dibayar adalah <b><?= number_format($kekurangan,2,',','.')?></b>)</label>
        <input type="number" name="jumlah_bayar" max="<?= $kekurangan; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">SIMPAN</button>
        <button type="reset" class="btn btn-warning">KOSONGKAN</button>
    </div>
</form>