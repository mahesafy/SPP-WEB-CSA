<?php
//panggil file conn.php untuk menghubung ke server
include('../config/koneksi.php');
$id_siswa = $_GET['nisn'];
$query = mysqli_query($conn, "DELETE FROM siswa WHERE nisn='$id_siswa'");
if ($query) {
    echo "<script>
	alert('Data Siswa berhasil dihapus');
	document.location.href = 'data-semua-siswa.php?pesan=hapus-siswa-berhasil';
	</script>";
} else {
        echo mysqli_error($conn);
    }
