<?php
require 'function.php';

//memanggil data dalam setiap tabel menggunakan perintah sql dan disimpan ke dalam veriabel dapodik
$dapodik = query("SELECT * FROM identitas 
INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
INNER JOIN akunbank ON alamat.idbank=akunbank.idbank"
);

if(isset($_POST["cari"])){
    $dapodik = cari($_POST["keyword"]);
}
if(isset($_POST["fltrjenjang"])){
    $dapodik = fltrjenjang($_POST["jenjang"]);
}
if(isset($_POST["fltrstatus"])){
    $dapodik = fltrstatus($_POST["status"]);
}
if(isset($_POST["fltrakreditasi"])){
    $dapodik = fltrakreditasi($_POST["akreditasi"]);
}
if(isset($_POST["fltrkelurahan"])){
    $dapodik = fltrkelurahan($_POST["kelurahan"]);
}
if(isset($_POST["fltrkecamatan"])){
    $dapodik = fltrkecamatan($_POST["kecamatan"]);
}
if(isset($_POST["fltrkabupaten"])){
    $dapodik = fltrkabupaten($_POST["kabupaten"]);
}
if(isset($_POST["fltrkepemilikan"])){
    $dapodik = fltrkepemilikan($_POST["kepemilikan"]);
}
if(isset($_POST["fltrkurikulum"])){
    $dapodik = fltrkurikulum($_POST["kurikulum"]);
}
if(isset($_POST["fltrwtpny"])){
    $dapodik = fltrwtpny($_POST["wtpny"]);
}
if(isset($_POST["fltriso"])){
    $dapodik = fltriso($_POST["iso"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dapodik Yogyakarta</title>
</head>
<body>
<div class="topnav">
    <h1 align="center">Dapodik Yogyakarta</h1>
</div>
<div class="row">
    <div class="left" style="background-color:#bbb;">
        <form align="left" action="" method="post">
            <h2>Cari</h2>
            <input type="text" name="keyword" size="40" placeholder="Masukkan Pencarian">
            <button type="submit" name="cari">Cari</button>
            <br>
            
            <h2>Filter</h2>
            <label for="jenjang">Jenjang Sekolah: </label><br>
            <select name="jenjang" id="jenjang">
                <option>SD</option>
                <option>SMP</option>
                <option>SMA</option>
                <option>SMK</option>
            </select>
            <button type="submit" name="fltrjenjang">Filter</button>
            <br><br>

            <label for="status">Status Sekolah: </label><br>
            <select name="status" id="status">
                <option>Negeri</option>
                <option>Swasta</option>
            </select>
            <button type="submit" name="fltrstatus">Filter</button>
            <br><br>

            <label for="akreditasi">Akreditasi: </label><br>
            <select name="akreditasi" id="akreditasi">
                <option>A</option>
                <option>B</option>
                <option>Belum Terakreditasi</option>
            </select>
            <button type="submit" name="fltrakreditasi">Filter</button>
            <br><br>

            <label for="kelurahan">Kelurahan: </label><br>
            <select name="kelurahan" id="kelurahan">
                <option>Sukoharjo</option>
                <option>Donokerto</option>
                <option>Karangwaru</option>
                <option>Pangungharjo</option>
                <option>Pakembinangun</option>
                <option>Caturtunggal</option>
                <option>Plembutan</option>
                <option>Kebonrejo</option>
                <option>Cokrodiningratan</option>
            </select>
            <button type="submit" name="fltrkelurahan">Filter</button>
            <br><br>

            <label for="kecamatan">Kecamatan Sekolah: </label><br>
            <select name="kecamatan" id="kecamatan">
                <option>Ngaglik</option>
                <option>Turi</option>
                <option>Tegalrejo</option>
                <option>Sewon</option>
                <option>Pakem</option>
                <option>Depok</option>
                <option>Playen</option>
                <option>Temon</option>
                <option>Jetis</option>
            </select>
            <button type="submit" name="fltrkecamatan">Filter</button>
            <br><br>

            <label for="kabupaten">Kabupaten Sekolah: </label><br>
            <select name="kabupaten" id="kabupaten">
                <option>Sleman</option>
                <option>Yogyakarta</option>
                <option>Bantul</option>
                <option>Gunungkidul</option>
                <option>Kulonprogo</option>
            </select>
            <button type="submit" name="fltrkabupaten">Filter</button>
            <br><br>

            <label for="kepemilikan">Status Kepemilikan: </label><br>
            <select name="kepemilikan" id="kepemilikan">
                <option>Pemerintah Daerah</option>
                <option>Pemerintah Pusat</option>
                <option>Yayasan</option>
            </select>
            <button type="submit" name="fltrkepemilikan">Filter</button>
            <br><br>

            <label for="kurikulum">Kurikulum: </label><br>
            <select name="kurikulum" id="kurikulum">
                <option>Kurikulum 2013</option>
                <option>Kurikulum 2006</option>
            </select>
            <button type="submit" name="fltrkurikulum">Filter</button>
            <br><br>

            <label for="wtpny">Waktu Penyelengggaraan: </label><br>
            <select name="wtpny" id="wtpny">
                <option>Sehari penuh (5h/m)</option>
                <option>Pagi</option>
            </select>
            <button type="submit" name="fltrwtpny">Filter</button>
            <br><br>

            <label for="iso">Sertifikasi ISO: </label><br>
            <select name="iso" id="iso">
                <option>9000:2018</option>
                <option>Belum Bersertifikat</option>
            </select>
            <button type="submit" name="fltriso">Filter</button>
            <br><br>
        </form>
    </div>
    <div class="right" style="background-color:#ddd;">
        <table align="center" border="0" cellpadding="8" cellspacing="0">
            <?php $i=1;?>
            <?php foreach($dapodik as $row) : ?>
            </tr>
                <th colspan="2"><?=$i;?></th>
            </tr>
            <tr>
                <th colspan="2">Identitas Sekolah</th>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= $row["nama"]; ?></td>
            </tr>
            </tr>
                <td>NPSN</td>
                <td><?= $row["NPSN"]; ?></td>
            </tr>
            </tr>
                <td>Jenjang</td>
                <td><?= $row["jenjang"]; ?></td>
            </tr>
            </tr>
                <td>Status</td>
                <td><?= $row["status"]; ?></td>
            </tr>
            </tr>
                <td>Akreditasi</td>
                <td><?= $row["akreditasi"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Alamat Sekolah</th>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $row["alamat"]; ?></td>
            </tr>
            </tr>
                <td>RT/RW</td>
                <td><?= $row["RT"]; ?> / <?= $row["RW"]; ?></td>
            </tr>
            </tr>
                <td>Kode Pos</td>
                <td><?= $row["kdpos"]; ?></td>
            </tr>
            </tr>
                <td>Kelurahan</td>
                <td><?= $row["kelurahan"]; ?></td>
            </tr>
            </tr>
                <td>Kecamatan</td>
                <td><?= $row["kecamatan"]; ?></td>
            </tr>
            </tr>
                <td>Kabupaten</td>
                <td><?= $row["kabupaten"]; ?></td>
            </tr>
            </tr>
                <td>Provisi</td>
                <td><?= $row["provinsi"]; ?></td>
            </tr>
            </tr>
                <td>Negara</td>
                <td><?= $row["negara"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Data Pelengkap</th>
            </tr>
            <tr>
                <td>SK Pendirian Sekolah</td>
                <td><?= $row["skpendirian"]; ?></td>
            </tr>
            </tr>
                <td>Tanggal SK Pendirian</td>
                <td><?= $row["sktanggal"]; ?></td>
            </tr>
            </tr>
                <td>Status Kepemilikan</td>
                <td><?= $row["kepemilikan"]; ?></td>
            </tr>
            </tr>
                <td>SK Izin Operasional</td>
                <td><?= $row["skoperasional"]; ?></td>
            </tr>
            </tr>
                <td>Tanggal Izin Operasional</td>
                <td><?= $row["tglskoperasi"]; ?></td>
            </tr>
            </tr>
                <td>Kebutuhan Khusus Dilayani</td>
                <td><?= $row["kebkusus"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Akun Bank</th>
            </tr>
            <tr>
                <td>Nomor Rekening</td>
                <td><?= $row["norek"]; ?></td>
            </tr>
            </tr>
                <td>Nama Bank</td>
                <td><?= $row["nmbank"]; ?></td>           
            </tr>
            </tr>
                <td>Cabang KCP/Unit</td>
                <td><?= $row["cabang"]; ?></td>
            </tr>
            </tr>
                <td>Rekening Atas Nama</td>
                <td><?= $row["anrek"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Manajemen Sekolah</th>
            </tr>
            <tr>
                <td>MBS</td>
                <td><?= $row["MBS"]; ?></td>
            </tr>
            </tr>
                <td>Nama Wajib Pajak</td>
                <td><?= $row["nmwp"]; ?></td>
            </tr>
            </tr>
                <td>NPWP</td>
                <td><?= $row["npwp"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Kontak Sekolah</th>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><?= $row["notlp"]; ?></td>
            </tr>
            </tr>
                <td>Nomor Fax</td>
                <td><?= $row["nofax"]; ?></td>
            </tr>
            </tr>
                <td>Email</td>
                <td><?= $row["email"]; ?></td>
            </tr>
            </tr>
                <td>Website</td>
                <td><?= $row["web"]; ?></td>
            </tr>
            <tr>
                <th colspan="2">Data Periodik</th>
            </tr>
            <tr>
                <td>Kurikulum</td>
                <td><?= $row["kurikulum"]; ?></td>
            </tr>
            <tr>
                <td>Waktu Penyelenggaraan</td>
                <td><?= $row["wtpny"]; ?></td>
            </tr>
            </tr>
                <td>Bersedia Menerima BOS?</td>
                <td><?= $row["bos"]; ?></td>
            </tr>
            </tr>
                <td>Sertifikasi ISO</td>
                <td><?= $row["iso"]; ?></td>
            </tr>
            </tr>
                <td>Sumber Listrik</td>
                <td><?= $row["sblistrik"]; ?></td>
            </tr>
            </tr>
                <td>Daya Listrik (watt)</td>
                <td><?= $row["dylistrik"]; ?></td>
            </tr>
            </tr>
                <td>Akses Internet</td>
                <td><?= $row["internet"]; ?></td>
            </tr>
            </tr>
                <td>Akses Internet Lainya</td>
                <td><?= $row["internetln"]; ?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach ?>
        </table>
    </div>
</div>
</body>
</html>