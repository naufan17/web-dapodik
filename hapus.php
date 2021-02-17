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

if(hapus($ididentitas)>0)
{
    echo " 
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href='admin.php';
        </script>
    ";
} else{
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href='admin.php';
        </script>
    ";
}
?>