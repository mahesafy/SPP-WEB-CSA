<?php
// menghubungkan php dengan koneksi database
require_once 'system/config/koneksi.php';

// mengaktifkan session pada php
session_start();

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "SELECT * FROM user where username='$username' and password='$password'") or die(mysqli_error($conn));

if (mysqli_num_rows($login) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan username dan level dengan isi nama user yang login
	$row = mysqli_fetch_array($login);
	$_SESSION['id_user'] = $row['id_user'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['nama'] = $row['nama_user'];
	$_SESSION['level'] = $row['level'];
	$_SESSION['status'] = 'login';

	if ($row['level'] == "Admin") {
		//redirect ke halaman admin
		header('location:system/admin/home.php?login=berhasil');
	} else if ($row['level'] == "Pimpinan") {
		//redirect kehalaman pemimpin
		header('location:system/pemimpin/home.php?login=berhasil');
	}
} else {
	//kalau username ataupun password tidak terdaftar di database
	echo "<script>
    alert('Login gagal!  Masukkan username & password kembali');
    document.location.href = 'login-admin.php';
    </script>";
}
