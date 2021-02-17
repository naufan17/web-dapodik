<?php

require 'function.php';

if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo " 
            <script>
                alert('User Baru Berhasil Ditambahkan!');
                document.location.href='login.php';
            </script>
        ";
    } else{
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password:</label><br>
                <input type="password" name="password2" id="password2" required>
            </li>
            <br>
            <button type="submit" name="register">Register</button>
        </ul>
    </form>
</body>
</html>