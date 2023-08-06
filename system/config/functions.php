<?php
require 'koneksi.php';

//untuk memudahkan query mengambil data dari tabel database
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambahSiswa($data)
{
	global $conn;
	$nisn   	 = $data['nisn'];
	$nis   		 = $data['nis'];
	$nama 	 	 = $data['nama'];
	$password 	 	 = $data['password'];
	$password = md5($password);
	$id_kelas 	 = $data['id_kelas'];
	$id_spp 	 = $data['id_spp'];
	$awaltempo	 = $data['jatuh_tempo'];
	$alamat		 = $data['alamat'];
	$no_tlp 	 = $data['no_tlp'];


	$bulanIndo = [
		'01' => 'januari',
		'02' => 'Februari',
		'03' => 'Maret',
		'04' => 'April',
		'05' => 'Mei',
		'06' => 'Juni',
		'07' => 'Juli',
		'08' => 'Agustus',
		'09' => 'September',
		'10' => 'Oktober',
		'11' => 'November',
		'12' => 'Desember',
	];

	$simpan = mysqli_query($conn, "INSERT INTO siswa VALUES('$nisn','$nis','$nama','$password','$id_kelas','$alamat','$no_tlp','$id_spp')");

	if (!$simpan) {

		echo mysqli_error($conn);
	} else {
		// ambil data id terakhir
		$ds = mysqli_fetch_array(mysqli_query($conn, "SELECT nisn FROM siswa ORDER BY nisn DESC LIMIT 1"));
		$bs = mysqli_fetch_array(mysqli_query($conn, "SELECT id_spp FROM spp ORDER BY id_spp DESC LIMIT 1"));
		$nisn = $ds['nisn'];
		$id_spp = $bs["id_spp"];
		// var_dump($idsiswa); die;
		// taggihan dan simpan di tabel spp
		for ($i = 0; $i < 12; $i++) {
			// tanggal jatuh tempo setiap tanggal 10
			$jatuh_tempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

			$bulan     = $bulanIndo[date('m', strtotime($jatuh_tempo))] . "  " . date('Y', strtotime($jatuh_tempo));
			// simpan data
			$add = mysqli_query($conn, "INSERT INTO pembayaran VALUES ('','$nisn',null,'$jatuh_tempo','$bulan',null,'$id_spp',null,'Belum-lunas')");
		}
	}

	// $nisn = $data["nisn"];
	// $nis = $data["nis"];
	// $nama = $data["nama"];
	// $id_kelas = $data["id_kelas"];
	// $alamat = $data["alamat"];
	// $no_telp = $data["no_telp"];
	// $id_spp = $data["id_spp"];

	// mysqli_query($conn,"INSERT INTO siswa VALUES('','$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')");
	return mysqli_affected_rows($conn);
}

function ubahSiswa($data)
{
	global $conn;

	$id_siswa = $data["id_siswa"];
	$nisn = $data["nisn"];
	$nis = $data["nis"];
	$nama = $data["nama"];
	$password = $data["password"];
	$password = md5($password);
	$id_kelas = $data["id_kelas"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$id_spp = $data["id_spp"];

	mysqli_query($conn, "UPDATE siswa SET
					nisn = '$nisn',
					nis = '$nis',
					nama = '$nama',
					password = '$password',
					id_kelas = '$id_kelas',
					alamat = '$alamat',
					no_telp = '$no_telp',
					id_spp = '$id_spp'
					WHERE id_siswa = '$id_siswa' 
				");
	return mysqli_affected_rows($conn);
}

// function tambahSPP($data)
// {
// 	global $conn;
// 	$tahun = $data["tahun"];
// 	$nominal = $data["nominal"];

// 	mysqli_query($conn, "INSERT INTO spp VALUES ('','$tahun','$nominal')");
// 	return mysqli_affected_rows($conn);
// }

// function updateSPP($data)
// {
// 	global $conn;
// 	$tahun = $data["tahun"];
// 	$nominal = $data["nominal"];
// 	$id_spp = $data["id_spp"];

// 	mysqli_query($conn, "UPDATE spp SET 
// 			tahun = '$tahun',
// 			nominal = '$nominal'
// 			WHERE id_spp = '$id_spp'
// 		");
// 	return mysqli_affected_rows($conn);
// }
