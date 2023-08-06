<?php
require '../config/koneksi.php';
session_start();
//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>KIRIM BUKTI BAYAR</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-siswa.php untuk menghubungkan navigasi siswa ke konten
require '../view/nav-siswa.php';


//mendapatkan informasi untuk mengedit data
$id_pembayaran = $_GET['id_pembayaran'];
$query = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
$data = mysqli_fetch_array($query);
?>
<?php

$query = mysqli_query($conn, "SELECT max(kode_bayar) as kdTerbesar FROM bukti_bayar");
$data = mysqli_fetch_array($query);
$kdBukti = $data['kdTerbesar'];

$urutan = (int) substr($kdBukti, 3, 3);

$urutan++;

$angka = "230";
$kdBukti = $angka . sprintf("%03s", $urutan);
?>
<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">Kirim Bukti</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" type="hidden">
                        <div class="form-group row">
                            <label class="col-sm-2">Kode Bayar</i></label>
                            <div class="col-sm-10">
                                <input name="kode_bayar" value="<?php echo $kdBukti ?>" class="form-control form-warning" readonly type="number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Foto Bukti</i></label>
                            <div class="col-sm-10">
                                <input name="foto_bukti" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" value="Kirim" onClick="return confirm('Yakin Kirim?');">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../view/footer.php';
    ?>
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
        alert('Bukti Berhasil Terkirim.');
        window.location='home.php';
      </script>";
    }


    function upload()
    {

        $namaFile = $_FILES['foto_bukti']['name'];
        $ukuranFile = $_FILES['foto_bukti']['size'];
        $aduh_error = $_FILES['foto_bukti']['aduh_error'];
        $tmpName = $_FILES['foto_bukti']['tmp_name'];

        if ($aduh_error === 4) {
            echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!');
        window.location='kirimBukti.php';
      </script>";

            return false;
        }
        //cek apakah yang di upload adalah gambar
        $ekstensiImageValid = ['jpg', 'jpeg', 'png'];
        $ekstensiImage = explode('.', $namaFile);
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