<?php
session_start();
if (!empty($_SESSION['status']) and $_SESSION['status'] == "login") {
    header('location: harus-logout.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/css_login/style.css">
</head>

<body id="bg-login">

    <div class="kotak_login">
        <h2 align="center">SILAHKAN LOGIN</h2>
        <center><img src="./assets/img/logo-bines.jpg" alt="logo" class="logo" width="130" height="130"></center>
        <br>
        <form action="proses-login.php" method="POST" autocomplete="off">
            <input type="text" class="form_login" name="username" placeholder="Masukkan Username" required>
            <input id="TeguhInput" type="password" class="form_login" name="password" placeholder="Masukkan Password" required>
            <input type="checkbox" onclick="myFunction()">Lihat
            <input type="submit" class="tombol_login" name="submit" value="LOGIN">

        </form>

        <script>
            function myFunction() {
                var x = document.getElementById("TeguhInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </div>

</body>

</html>