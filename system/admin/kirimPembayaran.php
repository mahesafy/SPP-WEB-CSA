<?php

require '../config/functions.php';

$id_pembayaran = $_GET["id_pembayaran"];
$id_user = $_GET["id_user"];
// $siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];
// $nisn = $siswa["nisn"];
$tgl_bayar = date("Y-m-d");

// $bulan_dibayar = date("m");
// $tahun_dibayar = date("Y");
// $id_spp = $siswa["id_spp"];

// $spp = query("SELECT * FROM spp WHERE id_spp = '$id_spp'")[0];
// $jumlah_dibayar = $spp["nominal"];

// mysqli_query($conn,"INSERT INTO pembayaran VALUES ('','$id_user','$nisn','$tgl_bayar','$bulan_dibayar','$tahun_dibayar','$id_spp','$jumlah_dibayar')");

mysqli_query($conn, "UPDATE pembayaran SET 
					id_user = '$id_user',
					tanggal_bayar = '$tgl_bayar',
					status = 'Lunas' 
					WHERE id_pembayaran = '$id_pembayaran'");

echo "<script>
	alert('Berhasil di Konfirmasi');
	document.location.href = 'transaksi.php';
	</script>";
