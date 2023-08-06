<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>EDIT DATA KELAS</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


//mendapatkan informasi untuk mengedit data
$id_kelas = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
$data = mysqli_fetch_array($query);
?>
<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Edit Data Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label class="col-sm-2" for="id_kelas">ID Kelas </i></label>
                            <div class="col-sm-10">
                                <input type="text" name="id_kelas" value="<?php echo $id_kelas; ?>" id="id_kelas" type="text" autocomplete="off" class="form-control form-control-warning" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama_kelas">Nama Kelas </i></label>
                            <div class="col-sm-10">
                                <input name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" id="nama_kelas" type="text" autocomplete="off" class="form-control form-control-warning" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="jurusan">Jurusan </i></label>
                            <div class="col-sm-10">
                                <input name="jurusan" value="<?php echo $data['jurusan']; ?>" id="jurusan" type="text" autocomplete="off" class="form-control form-control-warning" required>
                            </div>
                        </div>





                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn-dark text-white" onClick="return confirm('Yakin Edit Data Kelas?');">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /.container-fluid -->


<?php
if (isset($_POST["submit"])) {

    $kelas = $_POST['nama_kelas'];
    $jur = $_POST['jurusan'];

    $sql = mysqli_query($conn, "UPDATE kelas SET  nama_kelas='$kelas', jurusan='$jur' WHERE id_kelas='$id_kelas'");

    if ($sql) { ?>

        <script>
            alert("Data Berhasil di Ubah!");
            window.location.href = "data-kelas.php?pesan=edit-kelas-berhasil";
        </script>
<?php
    } else {
        echo mysqli_error($conn);
    }
}
require '../view/footer.php'; ?>