<?php
require '../config/functions.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>TRANSAKSI PEMBAYARAN</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

//mendapatkan informasi untuk mengedit data
$id_pembayaran = $_GET['id_pembayaran'];
$query = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
$data = mysqli_fetch_array($query);
?>

<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">Bukti Bayar</h4>
                </div>
                <div class="card-body">
                    <a href="transaksi.php" class="btn btn-dark mb-3">Kembali</a>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Foto Bukti</th>
                            </tr>
                        </thead>
                        <tr>
                            <td><img src="../../assets/img/logo-bines.jpg" alt="" width="200" height="200"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $kode_bayar = $_POST['kode_bayar'];
        $id_pembayaran = $_POST['id_pembayaran'];
        // $data = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");
        // $bayar = mysqli_fetch_array($data);
        // $kode_bayar = $bayar['kode_bayar'];
        $foto_bukti = upload();
        if (!$foto_bukti) {
            return false;
        }

        mysqli_query($conn, "INSERT INTO bukti_bayar VALUES('$kode_bayar','$id_pembayaran','$foto_bukti')");
        mysqli_query($conn, "UPDATE pembayaran SET kode_bayar = '$kode_bayar', status = 'Menunggu-Konfirmasi' WHERE id_pembayaran = '" . $_GET['id_pembayaran'] . "' ");


        echo "<script>
        alert('Bukti Berhasil Dikirim.');
        window.location='home.php';
      </script>";
    }


    function upload()
    {

        $teguh_namaFile = $_FILES['foto_bukti']['name'];
        $ukuranFile = $_FILES['foto_bukti']['size'];
        $aduh_error = $_FILES['foto_bukti']['aduh_error'];
        $tmpName = $_FILES['foto_bukti']['tmp_name'];

        //cek apakah tidak ada gambar yang di upload
        if ($aduh_error === 4) {
            echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
        window.location='kirimBukti.php';
      </script>";

            return false;
        }
        //cek apakah yang di upload adalah gambar
        $ekstensiImageValid = ['jpg', 'jpeg', 'png'];
        $ekstensiImage = explode('.', $teguh_namaFile);
        $ekstensiImage = strtolower(end($ekstensiImage));
        if (!in_array($ekstensiImage, $ekstensiImageValid)) {
            echo "<script>
        alert('Yang Anda Upload Bukan Gambar!');
        window.location='kirimBukti.php';
      </script>";

            return false;
        }
        //cek jika ukurannya terlalu besar 
        if ($ukuranFile > 1000000) {
            echo "<script>
        alert('Ukuran Gambar Terlalu Besar!');
        window.location='kirimBukti.php';
      </script>";

            return false;
        }
        //lolos pengecekan gambar siap di upload
        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiImage;

        move_uploaded_file($tmpName, '../../assets/foto_bukti/' . $namaFileBaru);

        return $namaFileBaru;
    }
    ?>