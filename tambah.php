<?php

session_start();

//cek apakah user sudah login 
if(!isset($_SESSION["login"])){
    //jika belum maka kembalikan user ke login
    header("Location: login.php");
    exit;
}

require 'function.php';

//cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(tambah($_POST)>0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='admin.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href='admin.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="" method="post">
        <ul>
            <p>1. Identitas Sekolah</p>
            <li>
                <label for="nama" >Nama : </label><br>
                <input type="text" name="nama" id="nama" size="40" required>
            </li>
            <li>
                <label for="NPSN">NPSN : </label><br>
                <input type="text" name="NPSN" id="NPSN" required>
            </li>
            <li>
                <label for="jenjang">Jenjang : </label><br>
                <input type="text" name="jenjang" id="jenjang" required>
            </li>
            <li>
                <label for="status">Status : </label><br>
                <input type="text" name="status" id="status" required>
            </li>
            <li>
                <label for="akreditasi">Akreditasi : </label><br>
                <input type="text" name="akreditasi" id="akreditasi" required>
            </li>
            <p>2. Alamat Sekolah</p>
            <li>
                <label for="alamat">Alamat : </label><br>
                <input type="text" name="alamat" id="alamat" size="30" required>
            </li>
            <li>
                <label for="RT">RT : </label><br>
                <input type="text" name="RT" id="RT" required>
            </li>
            <li>
                <label for="RW">RW : </label><br>
                <input type="text" name="RW" id="RW" required>
            </li>
            <li>
                <label for="kdpos">Kode Pos : </label><br>
                <input type="text" name="kdpos" id="kdpos" required>
            </li>
            <li>
                <label for="kelurahan">Kelurahan : </label><br>
                <input type="text" name="kelurahan" id="kelurahan" required>
            </li>
            <li>
                <label for="kecamatan">Kecamatan : </label><br>
                <input type="text" name="kecamatan" id="kecamatan" required>
            </li>
            <li>
                <label for="kabupaten">Kabupaten : </label><br>
                <input type="text" name="kabupaten" id="kabupaten" required>
            </li>
            <li>
                <label for="provinsi">Provinsi : </label><br>
                <input type="text" name="provinsi" id="provinsi" required>
            </li>
            <li>
                <label for="negara">Negara : </label><br>
                <input type="text" name="negara" id="negara" required>
            </li>
            <p>3. Data Pelengkap</p>
            <li>
                <label for="skpendirian"> SK Pendirian Sekolah : </label><br>
                <input type="text" name="skpendirian" id="skpendirian" required>
            </li>
            <li>
                <label for="sktanggal">Tanggal SK Pendirian : </label><br>
                <input type="text" name="sktanggal" id="sktanggal" required>
            </li>
            <li>
                <label for="kepemilikan">Status Kepemilikan : </label><br>
                <input type="text" name="kepemilikan" id="kepemilikan" required>
            </li>
            <li>
                <label for="skoperasional">SK Izin Operasi : </label><br>
                <input type="text" name="skoperasional" id="skoperasional" required>
            </li>
            <li>
                <label for="tglskoperasi">Tanggal Izin Operasional : </label><br>
                <input type="text" name="tglskoperasi" id="tglskoperasi" required>
            </li>
            <li>
                <label for="kebkusus">Kebutuhan Khusus Dilayani : </label><br>
                <input type="text" name="kebkusus" id="kebkusus" required>
            </li>
            <p>4. Akun Bank</p>
            <li>
                <label for="norek"> Nomor Rekening : </label><br>
                <input type="text" name="norek" id="norek" required>
            </li>
            <li>
                <label for="nmbank">Nama Bank : </label><br>
                <input type="text" name="nmbank" id="nmbank" size="30" required>
            </li>
            <li>
                <label for="cabang">Cabang KCP/Unit : </label><br>
                <input type="text" name="cabang" id="cabang" size="30" required>
            </li>
            <li>
                <label for="anrek">Rekening Atas Nama : </label><br>
                <input type="text" name="anrek" id="anrek" size="30" required>
            </li>
            <p>5. Manajemen Sekolah</p>
            <li>
                <label for="MBS">MBS : </label><br>
                <input type="text" name="MBS" id="MBS" require>
            </li>
            <li>
                <label for="nmwp">Nama Wajib Pajak : </label><br>
                <input type="text" name="nmwp" id="nmwp" size="30" required>
            </li>
            <li>
                <label for="npwp"> NPWP : </label><br>
                <input type="text" name="npwp" id="npwp" required>
            </li>
            <p>6. Kontak Sekolah</p>
            <li>
                <label for="notlp">Nomor Telepon : </label><br>
                <input type="text" name="notlp" id="notlp" required>
            </li>
            <li>
                <label for="nofax">Nomor Fax : </label><br>
                <input type="text" name="nofax" id="nofax" required>
            </li>
            <li>
                <label for="email">Email : </label><br>
                <input type="text" name="email" id="email" size="30" required>
            </li>
            <li>
                <label for="web"> Website : </label><br>
                <input type="text" name="web" id="web" size="30">
            </li>
            <p>7. Data Periodik</p>
            <li>
                <label for="kurikulum">Kurikulum : </label><br>
                <input type="text" name="kurikulum" id="kurikulum" required>
            </li>
            <li>
                <label for="wtpny">Waktu Penyelenggaraan : </label><br>
                <input type="text" name="wtpny" id="wtpny" required>
            </li>
            <li>
                <label for="bos">Bersedia Menerima BOS? : </label><br>
                <input type="text" name="bos" id="bos" required>
            </li>
            <li>
                <label for="iso"> Sertifikasi ISO : </label><br>
                <input type="text" name="iso" id="iso" required>
            </li>
            <li>
                <label for="sblistrik">Sumber Listrik : </label><br>
                <input type="text" name="sblistrik" id="sblistrik" required>
            </li>
            <li>
                <label for="dylistrik">Daya Listrik (watt) : </label><br>
                <input type="text" name="dylistrik" id="dylistrik" required>
            </li>
            <li>
                <label for="internet">Akses Internet : </label><br>
                <input type="text" name="internet" id="internet" required>
            </li>
            <li>
                <label for="internetln"> Akses Internet Lainya : </label><br>
                <input type="text" name="internetln" id="internetln">
            </li>
            <br>
            <button type="submit" name="submit">Tambah Data</button><br>
        </ul>
    </form>
</body>
</html>