<?php

session_start();

//cek apakah user sudah login 
if(!isset($_SESSION["login"])){
    //jika belum maka kembalikan user ke login
    header("Location: login.php");
    exit;
}

require 'function.php';

//konfigurasi pagination
//jumlah data per halaman disimpan kedalam variabel
$jumlahdataperhalaman = 5;
//jumlah data di dalam tabel dimasukkan kedalam variabel dangan cara mengcounter isi table dengan mengquery
$jumlahdata = count(query("SELECT * FROM identitas 
INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
INNER JOIN akunbank ON alamat.idbank=akunbank.idbank"));
//jumlah data perhalaman = jumlah data dibagi jumlah data perhalaman dan di bulatkan keatas
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
//jika pertama masuk maka langsung ke halaman 1
$halaman = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
//data awal = jumlah data per halaman dikali halaman dikurangi jumlah data perhalaman
$awaldata = ($jumlahdataperhalaman * $halaman) - $jumlahdataperhalaman;

//memanggil data dalam setiap tabel menggunakan perintah sql dan disimpan ke dalam veriabel dapodik
//diakhir ditambahkan batasan menampilkan data per halaman
$dapodik = query("SELECT * FROM identitas 
INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
LIMIT $awaldata, $jumlahdataperhalaman");

if(isset($_POST["cari"])){
    $dapodik = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dapodik</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1 align="center">Admin Dapodik</h1>
    <form align="center" action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Masukkan Pencarian">
        <button type="submit" name="cari">Cari</button><br>
    </form>
    <p align="center"><a href="tambah.php">Tambah Data</a></p>
    
    <!--navigasi-->
    <?php if($halaman > 1): ?>
        <a href="?halaman=<?= $halaman - 1 ?>">&laquo</a>
    <?php endif; ?>
    
    <?php for($i = 1; $i <= $jumlahhalaman; $i++) : ?>
        <?php if($i == $halaman) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight:bold;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if($halaman < $jumlahhalaman): ?>
        <a href="?halaman=<?= $halaman + 1 ?>">&raquo</a>
    <?php endif; ?>

    <table align="center" border="1" cellpadding="8" cellspacing="0">
        <?php foreach($dapodik as $row) : ?>
        <tr>
            <th colspan="3">1. Identitas Sekolah</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Nama</td>
            <td><?= $row["nama"]; ?></td>
        </tr>
        </tr>
            <td>2</td>
            <td>NPSN</td>
            <td><?= $row["NPSN"]; ?></td>
        </tr>
        </tr>
            <td>3</td>
            <td>Jenjang</td>
            <td><?= $row["jenjang"]; ?></td>
        </tr>
        </tr>
            <td>4</td>
            <td>Status</td>
            <td><?= $row["status"]; ?></td>
        </tr>
        </tr>
            <td>5</td>
            <td>Akreditasi</td>
            <td><?= $row["akreditasi"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">2. Alamat Sekolah</th>
        </tr>
        <tr>
            <td>6</td>
            <td>Alamat</td>
            <td><?= $row["alamat"]; ?></td>
        </tr>
        </tr>
            <td>7</td>
            <td>RT/RW</td>
            <td><?= $row["RT"]; ?> / <?= $row["RW"]; ?></td>
            
        </tr>
        </tr>
            <td>8</td>
            <td>Kode Pos</td>
            <td><?= $row["kdpos"]; ?></td>
        </tr>
        </tr>
            <td>9</td>
            <td>Kelurahan</td>
            <td><?= $row["kelurahan"]; ?></td>
        </tr>
        </tr>
            <td>10</td>
            <td>Kecamatan</td>
            <td><?= $row["kecamatan"]; ?></td>
        </tr>
        </tr>
            <td>11</td>
            <td>Kabupaten</td>
            <td><?= $row["kabupaten"]; ?></td>
        </tr>
        </tr>
            <td>12</td>
            <td>Provisi</td>
            <td><?= $row["provinsi"]; ?></td>
        </tr>
        </tr>
            <td>13</td>
            <td>Negara</td>
            <td><?= $row["negara"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">3. Data Pelengkap</th>
        </tr>
        <tr>
            <td>14</td>
            <td>SK Pendirian Sekolah</td>
            <td><?= $row["skpendirian"]; ?></td>
        </tr>
        </tr>
            <td>15</td>
            <td>Tanggal SK Pendirian</td>
            <td><?= $row["sktanggal"]; ?></td>
            
        </tr>
        </tr>
            <td>16</td>
            <td>Status Kepemilikan</td>
            <td><?= $row["kepemilikan"]; ?></td>
        </tr>
        </tr>
            <td>17</td>
            <td>SK Izin Operasional</td>
            <td><?= $row["skoperasional"]; ?></td>
        </tr>
        </tr>
            <td>18</td>
            <td>Tanggal Izin Operasional</td>
            <td><?= $row["tglskoperasi"]; ?></td>
        </tr>
        </tr>
            <td>19</td>
            <td>Kebutuhan Khusus Dilayani</td>
            <td><?= $row["kebkusus"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">4. Akun Bank</th>
        </tr>
        <tr>
            <td>20</td>
            <td>Nomor Rekening</td>
            <td><?= $row["norek"]; ?></td>
        </tr>
        </tr>
            <td>21</td>
            <td>Nama Bank</td>
            <td><?= $row["nmbank"]; ?></td>           
        </tr>
        </tr>
            <td>22</td>
            <td>Cabang KCP/Unit</td>
            <td><?= $row["cabang"]; ?></td>
        </tr>
        </tr>
            <td>23</td>
            <td>Rekening Atas Nama</td>
            <td><?= $row["anrek"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">5. Manajemen Sekolah</th>
        </tr>
        <tr>
            <td>24</td>
            <td>MBS</td>
            <td><?= $row["MBS"]; ?></td>
        </tr>
        </tr>
            <td>24</td>
            <td>Nama Wajib Pajak</td>
            <td><?= $row["nmwp"]; ?></td>
        </tr>
        </tr>
            <td>25</td>
            <td>NPWP</td>
            <td><?= $row["npwp"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">6. Kontak Sekolah</th>
        </tr>
        <tr>
            <td>26</td>
            <td>Nomor Telepon</td>
            <td><?= $row["notlp"]; ?></td>
        </tr>
        </tr>
            <td>27</td>
            <td>Nomor Fax</td>
            <td><?= $row["nofax"]; ?></td>
        </tr>
        </tr>
            <td>28</td>
            <td>Email</td>
            <td><?= $row["email"]; ?></td>
        </tr>
        </tr>
            <td>29</td>
            <td>Website</td>
            <td><?= $row["web"]; ?></td>
        </tr>
        <tr>
            <th colspan="3">7. Data Periodik</th>
        </tr>
        <tr>
            <td>30</td>
            <td>Kurikulum</td>
            <td><?= $row["kurikulum"]; ?></td>
        </tr>
        <tr>
            <td>31</td>
            <td>Waktu Penyelenggaraan</td>
            <td><?= $row["wtpny"]; ?></td>
        </tr>
        </tr>
            <td>32</td>
            <td>Bersedia Menerima BOS?</td>
            <td><?= $row["bos"]; ?></td>
        </tr>
        </tr>
            <td>33</td>
            <td>Sertifikasi ISO</td>
            <td><?= $row["iso"]; ?></td>
        </tr>
        </tr>
            <td>34</td>
            <td>Sumber Listrik</td>
            <td><?= $row["sblistrik"]; ?></td>
        </tr>
        </tr>
            <td>34</td>
            <td>Daya Listrik (watt)</td>
            <td><?= $row["dylistrik"]; ?></td>
        </tr>
        </tr>
            <td>35</td>
            <td>Akses Internet</td>
            <td><?= $row["internet"]; ?></td>
        </tr>
        </tr>
            <td>36</td>
            <td>Akses Internet Lainya</td>
            <td><?= $row["internetln"]; ?></td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <a href="ubah.php?ididentitas=<?= $row["ididentitas"]; ?>"?ididentitas=>Ubah Data</a>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <a href="hapus.php?ididentitas=<?= $row["ididentitas"]; ?>"?ididentitas=>Hapus Data</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>