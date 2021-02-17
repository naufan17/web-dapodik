<?php

$conn = mysqli_connect("localhost", "root", "", "dapodik");

//fungsi mengambil data di dalam tabel
function query($query){
    global $conn;
    //mengambil data dari database disimpan ke dalam variabel result
    $result = mysqli_query($conn, $query);
    $rows = [];
    //memasukkan data variabel result dari database menggunakan array associative dan disimpan ke dalam variabel row  
    while($row = mysqli_fetch_assoc($result)){
        //menyimpan data dari variabel row ke dalam variabel array rows
        $rows[] = $row;
    }
    return $rows;
}

//fungsi untuk menambahkan data
function tambah($data){
    global $conn;
    //menyimpan input data ke dalam variabel
    $ididentitas = $data["ididentitas"];
    $nama = htmlspecialchars($data["nama"]);
    $NPSN = htmlspecialchars($data["NPSN"]);
    $jenjang = htmlspecialchars($data["jenjang"]);
    $status = htmlspecialchars($data["status"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $RT = htmlspecialchars($data["RT"]);
    $RW = htmlspecialchars($data["RW"]);
    $kdpos = htmlspecialchars($data["kdpos"]);
    $kelurahan = htmlspecialchars($data["kelurahan"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $negara = htmlspecialchars($data["negara"]);
    $skpendirian = htmlspecialchars($data["skpendirian"]);
    $sktanggal = htmlspecialchars($data["sktanggal"]);
    $kepemilikan = htmlspecialchars($data["kepemilikan"]);
    $skoperasional = htmlspecialchars($data["skoperasional"]);
    $tglskoperasi = htmlspecialchars($data["tglskoperasi"]);
    $kebkusus = htmlspecialchars($data["kebkusus"]);
    $norek = htmlspecialchars($data["norek"]);
    $nmbank = htmlspecialchars($data["nmbank"]);
    $cabang = htmlspecialchars($data["cabang"]);
    $anrek = htmlspecialchars($data["anrek"]);
    $MBS = htmlspecialchars($data["MBS"]);
    $nmwp = htmlspecialchars($data["nmwp"]);
    $npwp = htmlspecialchars($data["npwp"]);
    $notlp = htmlspecialchars($data["notlp"]);
    $nofax = htmlspecialchars($data["nofax"]);
    $email = htmlspecialchars($data["email"]);
    $web = htmlspecialchars($data["web"]);
    $kurikulum = htmlspecialchars($data["kurikulum"]);
    $wtpny = htmlspecialchars($data["wtpny"]);
    $bos = htmlspecialchars($data["bos"]);
    $iso = htmlspecialchars($data["iso"]);
    $sblistrik = htmlspecialchars($data["sblistrik"]);
    $dylistrik = htmlspecialchars($data["dylistrik"]);
    $internet = htmlspecialchars($data["internet"]);
    $internetln = htmlspecialchars($data["internetln"]);

    //memasukkan data input ke dalam perintah insert sql dan disimpan ke dalam setiap variabel query
    $query = "INSERT INTO kontak VALUES('','$notlp','$nofax','$email','$web')";
    $query1 = "INSERT INTO akunbank VALUES('','$norek','$nmbank','$cabang','$anrek')";
    $query2 = "INSERT INTO alamat VALUES('','$alamat','$RT','$RW','$kdpos','$kelurahan','$kecamatan','$kabupaten','$provinsi','$negara',
    (SELECT MAX(idbank) FROM akunbank), (SELECT MAX(idkontak) FROM kontak))";
    $query3 = "INSERT INTO manajemen VALUES('','$MBS','$nmwp','$npwp')";
    $query4 = "INSERT INTO dtperiodik VALUES('', '$kurikulum','$wtpny','$bos','$iso','$sblistrik','$dylistrik','$internet','$internetln',
    (SELECT MAX(idmanajemen) FROM manajemen))";
    $query5 = "INSERT INTO pelengkap VALUES('','$skpendirian','$sktanggal','$kepemilikan','$skoperasional','$tglskoperasi','$kebkusus')";
    $query6 = "INSERT INTO identitas VALUES('','$nama','$NPSN','$jenjang','$status','$akreditasi', 
    (SELECT MAX(idpelengkap) FROM pelengkap), (SELECT MAX(idalamat) FROM alamat), (SELECT MAX(iddtperiodik) FROM dtperiodik))";

    mysqli_query($conn, $query);
    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query3);
    mysqli_query($conn, $query4);
    mysqli_query($conn, $query5);
    mysqli_query($conn, $query6);

    return mysqli_affected_rows($conn);  
}

//fungsi untuk menghapus data
function hapus($ididentitas){
    global $conn;
    //menghapus semua isi tabel sesuai NPSN menggunakan perintah sql dan disimpan kedalam variabel query
    $query = "DELETE identitas, alamat, dtperiodik, pelengkap, manajemen, kontak, akunbank 
    FROM identitas
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE ididentitas=$ididentitas";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data
function ubah($data){
    global $conn;
    //menyimpan input data ke dalam variabel
    $ididentitas = $data["ididentitas"];
    $nama = htmlspecialchars($data["nama"]);
    $NPSN = htmlspecialchars($data["NPSN"]);
    $jenjang = htmlspecialchars($data["jenjang"]);
    $status = htmlspecialchars($data["status"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $RT = htmlspecialchars($data["RT"]);
    $RW = htmlspecialchars($data["RW"]);
    $kdpos = htmlspecialchars($data["kdpos"]);
    $kelurahan = htmlspecialchars($data["kelurahan"]);
    $kecamatan = htmlspecialchars($data["kecamatan"]);
    $kabupaten = htmlspecialchars($data["kabupaten"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $negara = htmlspecialchars($data["negara"]);
    $skpendirian = htmlspecialchars($data["skpendirian"]);
    $sktanggal = htmlspecialchars($data["sktanggal"]);
    $kepemilikan = htmlspecialchars($data["kepemilikan"]);
    $skoperasional = htmlspecialchars($data["skoperasional"]);
    $tglskoperasi = htmlspecialchars($data["tglskoperasi"]);
    $kebkusus = htmlspecialchars($data["kebkusus"]);
    $norek = htmlspecialchars($data["norek"]);
    $nmbank = htmlspecialchars($data["nmbank"]);
    $cabang = htmlspecialchars($data["cabang"]);
    $anrek = htmlspecialchars($data["anrek"]);
    $MBS = htmlspecialchars($data["MBS"]);
    $nmwp = htmlspecialchars($data["nmwp"]);
    $npwp = htmlspecialchars($data["npwp"]);
    $notlp = htmlspecialchars($data["notlp"]);
    $nofax = htmlspecialchars($data["nofax"]);
    $email = htmlspecialchars($data["email"]);
    $web = htmlspecialchars($data["web"]);
    $kurikulum = htmlspecialchars($data["kurikulum"]);
    $wtpny = htmlspecialchars($data["wtpny"]);
    $bos = htmlspecialchars($data["bos"]);
    $iso = htmlspecialchars($data["iso"]);
    $sblistrik = htmlspecialchars($data["sblistrik"]);
    $dylistrik = htmlspecialchars($data["dylistrik"]);
    $internet = htmlspecialchars($data["internet"]);
    $internetln = htmlspecialchars($data["internetln"]);

    //memasukkan data input ke dalam perintah update sql dan disimpan ke dalam variabel query
    //data yang baru menimpa data yang lama
    $query = "UPDATE identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    SET nama='$nama', NPSN='$NPSN', jenjang='$jenjang', status='$status', akreditasi='$akreditasi', alamat='$alamat', RT='$RT', RW='$RW', 
    kdpos='$kdpos', kelurahan='$kelurahan', kecamatan='$kecamatan', kabupaten='$kabupaten', provinsi='$provinsi', negara='$negara', 
    skpendirian='$skpendirian', sktanggal='$sktanggal', kepemilikan='$kepemilikan', skoperasional='$skoperasional', tglskoperasi='$tglskoperasi', 
    kebkusus='$kebkusus', norek='$norek', nmbank='$nmbank', cabang='$cabang', anrek='$anrek', MBS='$MBS', nmwp='$nmwp', npwp='$npwp', 
    notlp='$notlp', nofax='$nofax', email='$email', web='$web', kurikulum='$kurikulum', wtpny='$wtpny', bos='$bos', iso='$iso', 
    sblistrik='$sblistrik', dylistrik='$dylistrik', internet='$internet', internetln='$internetln'
    WHERE ididentitas=$ididentitas";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);  
}

//fungsi untuk mencari
function cari($keyword){
    //mencari keyword yang masuk menggunakan perintah sql dan disimpan kedalam variabel query
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE nama LIKE '%$keyword%' OR NPSN LIKE '%$keyword%' OR jenjang LIKE '%$keyword%' OR status LIKE '%$keyword%' OR akreditasi LIKE '%$keyword%'
    OR alamat LIKE '%$keyword%' OR RT LIKE '%$keyword%' OR RW LIKE '%$keyword%' OR kdpos LIKE '%$keyword%' OR kelurahan LIKE '%$keyword%' 
    OR kecamatan LIKE '%$keyword%' OR kabupaten LIKE '%$keyword%' OR provinsi LIKE '%$keyword%' OR negara LIKE '%$keyword%' 
    OR skpendirian LIKE '%$keyword%' OR sktanggal LIKE '%$keyword%' OR kepemilikan LIKE '%$keyword%' OR skoperasional LIKE '%$keyword%' 
    OR tglskoperasi LIKE '%$keyword%' OR kebkusus LIKE '%$keyword%' OR norek LIKE '%$keyword%' OR nmbank LIKE '%$keyword%' 
    OR cabang LIKE '%$keyword%' OR anrek LIKE '%$keyword%' OR MBS LIKE '%$keyword%' OR nmwp LIKE '%$keyword%' OR npwp LIKE '%$keyword%' 
    OR notlp LIKE '%$keyword%' OR nofax LIKE '%$keyword%' OR email LIKE '%$keyword%' OR web LIKE '%$keyword%' OR kurikulum LIKE '%$keyword%' 
    OR wtpny LIKE '%$keyword%' OR bos LIKE '%$keyword%' OR iso LIKE '%$keyword%' OR sblistrik LIKE '%$keyword%' OR dylistrik LIKE '%$keyword%' 
    OR internet LIKE '%$keyword%' OR internetln LIKE '%$keyword%'";

    return query($query);
}

//fungsi untuk filter jenjang
function fltrjenjang($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE jenjang LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter status
function fltrstatus($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE status LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter akreditasi
function fltrakreditasi($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE akreditasi LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter kelurahan
function fltrkelurahan($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE kelurahan LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter kecamatan
function fltrkecamatan($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE kecamatan LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter kabupaten
function fltrkabupaten($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE kabupaten LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter kepemilikan
function fltrkepemilkan($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE kepemilkan LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter kurikulum
function fltrkurikulum($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE kurikulum LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter waktu penyelenggaraan
function fltrwtpny($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE wtpny LIKE '%$keyword%'";
    return query($query);
}
//fungsi untuk filter iso
function fltriso($keyword){
    $query = "SELECT * FROM identitas 
    INNER JOIN alamat ON identitas.idalamat=alamat.idalamat
    INNER JOIN dtperiodik ON identitas.iddtperiodik=dtperiodik.iddtperiodik
    INNER JOIN pelengkap ON identitas.idpelengkap=pelengkap.idpelengkap
    INNER JOIN manajemen ON dtperiodik.idmanajemen=manajemen.idmanajemen
    INNER JOIN kontak ON alamat.idkontak=kontak.idkontak
    INNER JOIN akunbank ON alamat.idbank=akunbank.idbank 
    WHERE iso LIKE '%$keyword%'";
    return query($query);
}

//fungsi untuk registrasi
function registrasi($data){
    global $conn;
    //menyimpan input dedalam variabel
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    //cek username ada apa belum
    //panggil username di dalam tabel user yang usernamenya sama dengan variabel username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        //jika sama maka tampilkan
        echo "
            <script>
                alert('Usename Yang Dilipih Sudah Terdaftar!');
            </script>";
            return false;
    }

    //cek konfirmasi password
    if($password!==$password2){
        echo "<script>
                alert('Konfirmasi Password Tidak Sesuai!');
            </script>";
            return false;
    }
    
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT); 

    //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);
}

?>