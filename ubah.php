<?php

session_start();

//cek apakah user sudah login 
if(!isset($_SESSION["login"])){
    //jika belum maka kembalikan user ke login
    header("Location: login.php");
    exit;
}

require 'function.php';

$ididentitas = $_GET["ididentitas"];

//memanggil data dalam setiap tabel menggunakan perintah sql dan disimpan dalam variabel dapodik
$dapodik=query("SELECT * FROM identitas
INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
WHERE ididentitas=$ididentitas")[0];

//cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(ubah($_POST)>0){
        echo " 
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href='admin.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Data Gagal Diubah!');
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
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data</h1>
    <form action="" method="post">
        <input type="hidden" name ="ididentitas" value="<?=$dapodik["ididentitas"];?>">
        <ul>
            <p>1. Identitas Sekolah</p>
            <li>
                <label for="nama">Nama : </label><br>
                <input type="text" name="nama" id="nama" value="<?=$dapodik["nama"];?>" required>
            </li>
            <li>
                <label for="NPSN">NPSN : </label><br>
                <input type="text" name="NPSN" id="NPSN" value="<?=$dapodik["NPSN"];?>" required>
            </li>
            <li>
                <label for="jenjang">Jenjang : </label><br>
                <input type="text" name="jenjang" id="jenjang" value="<?=$dapodik["jenjang"];?>" required>
            </li>
            <li>
                <label for="status">Status : </label><br>
                <input type="text" name="status" id="status" value="<?=$dapodik["status"];?>" required>
            </li>
            <li>
                <label for="akreditasi">Akreditasi : </label><br>
                <input type="text" name="akreditasi" id="akreditasi" value="<?=$dapodik["akreditasi"];?>" required>
            </li>
            <p>2. Alamat Sekolah</p>
            <li>
                <label for="alamat">Alamat : </label><br>
                <input type="text" name="alamat" id="alamat" value="<?=$dapodik["alamat"];?>" required>
            </li>
            <li>
                <label for="RT">RT : </label><br>
                <input type="text" name="RT" id="RT" value="<?=$dapodik["RT"];?>" required>
            </li>
            <li>
                <label for="RW">RW : </label><br>
                <input type="text" name="RW" id="RW" value="<?=$dapodik["RW"];?>" required>
            </li>
            <li>
                <label for="kdpos">Kode Pos : </label><br>
                <input type="text" name="kdpos" id="kdpos" value="<?=$dapodik["kdpos"];?>" required>
            </li>
            <li>
                <label for="kelurahan">Kelurahan : </label><br>
                <input type="text" name="kelurahan" id="kelurahan" value="<?=$dapodik["kelurahan"];?>" required>
            </li>
            <li>
                <label for="kecamatan">Kecamatan : </label><br>
                <input type="text" name="kecamatan" id="kecamatan" value="<?=$dapodik["kecamatan"];?>" required>
            </li>
            <li>
                <label for="kabupaten">Kabupaten : </label><br>
                <input type="text" name="kabupaten" id="kabupaten" value="<?=$dapodik["kabupaten"];?>" required>
            </li>
            <li>
                <label for="provinsi">Provinsi : </label><br>
                <input type="text" name="provinsi" id="provinsi" value="<?=$dapodik["provinsi"];?>" required>
            </li>
            <li>
                <label for="negara">Negara : </label><br>
                <input type="text" name="negara" id="negara" value="<?=$dapodik["negara"];?>" required>
            </li>
            <p>3. Data Pelengkap</p>
            <li>
                <label for="skpendirian"> SK Pendirian Sekolah : </label><br>
                <input type="text" name="skpendirian" id="skpendirian" value="<?=$dapodik["skpendirian"];?>" required>
            </li>
            <li>
                <label for="sktanggal">Tanggal SK Pendirian : </label><br>
                <input type="text" name="sktanggal" id="sktanggal" value="<?=$dapodik["sktanggal"];?>" required>
            </li>
            <li>
                <label for="kepemilikan">Status Kepemilikan : </label><br>
                <input type="text" name="kepemilikan" id="kepemilikan" value="<?=$dapodik["kepemilikan"];?>" required>
            </li>
            <li>
                <label for="skoperasional">SK Izin Operasi : </label><br>
                <input type="text" name="skoperasional" id="skoperasional" value="<?=$dapodik["skoperasional"];?>" required>
            </li>
            <li>
                <label for="tglskoperasi">Tanggal Izin Operasional : </label><br>
                <input type="text" name="tglskoperasi" id="tglskoperasi" value="<?=$dapodik["tglskoperasi"];?>" required>
            </li>
            <li>
                <label for="kebkusus">Kebutuhan Khusus Dilayani : </label><br>
                <input type="text" name="kebkusus" id="kebkusus" value="<?=$dapodik["kebkusus"];?>" required>
            </li>
            <p>4. Akun Bank</p>
            <li>
                <label for="norek"> Nomor Rekening : </label><br>
                <input type="text" name="norek" id="norek" value="<?=$dapodik["norek"];?>" required>
            </li>
            <li>
                <label for="nmbank">Nama Bank : </label><br>
                <input type="text" name="nmbank" id="nmbank" value="<?=$dapodik["nmbank"];?>" required>
            </li>
            <li>
                <label for="cabang">Cabang KCP/Unit : </label><br>
                <input type="text" name="cabang" id="cabang" value="<?=$dapodik["cabang"];?>" required>
            </li>
            <li>
                <label for="anrek">Rekening Atas Nama : </label><br>
                <input type="text" name="anrek" id="anrek" value="<?=$dapodik["anrek"];?>" required>
            </li>
            <p>5. Manajemen Sekolah</p>
            <li>
                <label for="MBS">MBS : </label><br>
                <input type="text" name="MBS" id="MBS" value="<?=$dapodik["MBS"];?>">
            </li>
            <li>
                <label for="nmwp">Nama Wajib Pajak : </label><br>
                <input type="text" name="nmwp" id="nmwp" value="<?=$dapodik["nmwp"];?>" required>
            </li>
            <li>
                <label for="npwp"> NPWP : </label><br>
                <input type="text" name="npwp" id="npwp" value="<?=$dapodik["npwp"];?>" required>
            </li>
            <p>6. Kontak Sekolah</p>
            <li>
                <label for="notlp">Nomor Telepon : </label><br>
                <input type="text" name="notlp" id="notlp" value="<?=$dapodik["notlp"];?>" required>
            </li>
            <li>
                <label for="nofax">Nomor Fax : </label><br>
                <input type="text" name="nofax" id="nofax" value="<?=$dapodik["nofax"];?>" required>
            </li>
            <li>
                <label for="email">Email : </label><br>
                <input type="text" name="email" id="email" value="<?=$dapodik["email"];?>" required>
            </li>
            <li>
                <label for="web"> Website : </label><br>
                <input type="text" name="web" id="web" value="<?=$dapodik["web"];?>">
            </li>
            <p>7. Data Periodik</p>
            <li>
                <label for="kurikulum">Kurikulum : </label><br>
                <input type="text" name="kurikulum" id="kurikulum" value="<?=$dapodik["kurikulum"];?>" required>
            </li>
            <li>
                <label for="wtpny">Waktu Penyelenggaraan : </label><br>
                <input type="text" name="wtpny" id="wtpny" value="<?=$dapodik["wtpny"];?>" required>
            </li>
            <li>
                <label for="bos">Bersedia Menerima BOS? : </label><br>
                <input type="text" name="bos" id="bos" value="<?=$dapodik["bos"];?>">
            </li>
            <li>
                <label for="iso"> Sertifikasi ISO : </label><br>
                <input type="text" name="iso" id="iso" value="<?=$dapodik["iso"];?>" required>
            </li>
            <li>
                <label for="sblistrik">Sumber Listrik : </label><br>
                <input type="text" name="sblistrik" id="sblistrik" value="<?=$dapodik["sblistrik"];?>" required>
            </li>
            <li>
                <label for="dylistrik">Daya Listrik (watt) : </label><br>
                <input type="text" name="dylistrik" id="dylistrik" value="<?=$dapodik["dylistrik"];?>" required>
            </li>
            <li>
                <label for="internet">Akses Internet : </label><br>
                <input type="text" name="internet" id="internet" value="<?=$dapodik["internet"];?>">
            </li>
            <li>
                <label for="internetln"> Akses Internet Lainya : </label><br>
                <input type="text" name="internetln" id="internetln" value="<?=$dapodik["internetln"];?>">
            </li>
            <br>
            <button type="submit" name="submit">Ubah Data</button>
        </ul>
    </form>
</body>
</html>