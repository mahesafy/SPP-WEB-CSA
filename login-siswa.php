<?php
session_start();
if (!empty($_SESSION['status']) and $_SESSION['status'] == "login") {
    header('location: system/siswa/home.php?harus-logout');
}
?>
<?php
require 'system/config/functions.php';
if (isset($_POST["login"])) {

    $nis = $_POST["nis"];
    $password = $_POST["password"];
    $password = md5($password);

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis' AND password = '$password'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        // // set session
        $_SESSION['nisn'] = $row['nisn'];
        $_SESSION['nisn'] = $row['nisn'];
        $_SESSION['nis'] = $row['nis'];
        $_SESSION["siswa"] = $row;
        $_SESSION['status'] = 'login';

        echo "<script>
    document.location.href = 'system/siswa/home.php?login=berhasil';
</script>";
    } else {
        echo "<script>
            alert('Login gagal!  Masukkan NIS & Password kembali');
            document.location.href = 'login-siswa.php';
            </script>";
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN SISWA</title>


    <link href="assets/css_login/style.css" rel="stylesheet">

</head>

<body>

    <div class="kotak_login">
        <h2>
            <p class="tulisan_login">LOGIN SISWA</p>
        </h2>
        <center><img src="./assets/img/logo-bines.jpg" alt="logo" class="logo" width="130" height="130">
        </center>
        <br>

        <form action="" id="form-masuk" autocomplete="off" method="POST">
            <div class="form-group">
                <input type="number" name="nis" class="form_login" placeholder="Masukkan NIS" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form_login" placeholder="Masukkan Password" required="required">
            </div>

            <div class="form-group">
                <input type="submit" class="tombol_login " value="LOGIN" name="login" />
            </div>
            <br />

        </form>
    </div>
</body>

</html>