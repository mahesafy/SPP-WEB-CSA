<?php
//panggil file conn.php untuk menghubung ke server
include('../config/koneksi.php');
$id_kelas = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
if ($query) {
    echo "<script>
	alert('Data Kelas berhasil dihapus');
	document.location.href = 'data-kelas.php?pesan=hapus-kelas-berhasil';
	</script>";
} else {
        echo mysqli_error($conn);
    }
