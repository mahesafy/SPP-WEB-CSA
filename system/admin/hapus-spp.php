<?php
//panggil file conn.php untuk menghubung ke server
include('../config/koneksi.php');
$id_spp = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM spp WHERE id_spp='$id_spp'");
if ($query) {
	echo "<script>
	alert('Data SPP berhasil dihapus');
	document.location.href = 'data-spp.php?pesan=hapus-spp-berhasil';
	</script>";
} else {
	echo mysqli_error($conn);
}
