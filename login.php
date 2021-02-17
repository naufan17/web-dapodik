<?php

session_start();
require 'function.php';

//set cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    //simpan dalam variabel
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username yang iduser = variabel id dan disimpan kedalam variable result
    $result = mysqli_query($conn, "SELECT username from user WHERE iduser = '$id'");
    //masukkan isi result kedalam variabel row
    $row = mysqli_fetch_assoc($result);

    //cek isi variabel key cookie dan username yang telah dienkripsi
    if($key === hash('sha256', $row['username'])){
        //jika sama maka session  login true
        $_SESSION['login'] = true;
    }
}

//cek apakah user sudah login 
if(isset($_SESSION["login"])){
    //jika sudah maka kembalikan user ke halaman admin
    header("Location: admin.php");
    exit;
}

//set session
if(isset($_POST["login"])){
    //simpan username dan password kedalam variabel
    $username = $_POST["username"];
    $password = $_POST["password"];

    //panggil isi tabel user dan simpan dalam variabel result
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    
    //cek isi variabel result jika ada isinya maka true
    if(mysqli_num_rows($result) === 1){
        //masukkan isi variabel result ke dalam row
        $row = mysqli_fetch_assoc($result);
        //jika isi variabel password dan isi hasil query password sama, maka true
        if (password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;
            //set remember me
            if(isset($_POST['remember'])){
                // buat cookie
                setcookie('id', $row['iduser'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }
            header("Location: admin.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <!--peringatan passwoed salah-->
    <?php if(isset($error)) : ?>
        <p>Username Atau Password Salah!</p>
    <?php endif; ?>
    
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label><br><br>
            <button type="submit" name="login">Login</button><br><br>
            <a href="registrasi.php">Registrasi</a>
        </ul>
    </form>
</body>
</html>