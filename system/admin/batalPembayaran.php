<?php

require '../config/functions.php';

$id_pembayaran = $_GET["id_pembayaran"];

mysqli_query($conn, "UPDATE pembayaran SET 
					status = 'Belum-Lunas' 
					WHERE id_pembayaran = '$id_pembayaran'");

echo "<script>
	alert('Bukti Berhasil Ditolak ');
	document.location.href = 'transaksi.php';
	</script>";
