<?php
//panggil file conn.php untuk menghubung ke server
include('../config/koneksi.php');
$id_user = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM user WHERE id_user='$id_user'") or die(mysqli_error($conn));
if ($query) {
	echo "<script>
	alert('Data Admin berhasil dihapus');
	document.location.href = 'data-admin.php?pesan=hapus-admin-berhasil';
	</script>";
}
