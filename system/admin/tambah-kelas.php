<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>TAMBAH DATA KELAS</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


?>



<div class="container-fluid">
    <br>
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">Tambah Data Kelas</a></h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal">

                        <div class="form-group row">
                            <label class="col-sm-2" for="id_kelas">Kode Kelas </i></label>
                            <div class="col-sm-10">
                                <input name="id_kelas" id="id_kelas" type="text" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama_kelas">Kelas </i></label>
                            <div class="col-sm-10">
                                <input name="nama_kelas" id="nama_kelas" type="text" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="jurusan">Jurusan </i></label>
                            <div class="col-sm-10">
                                <input name="jurusan" id="jurusan" type="text" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" onClick="return confirm('Yakin Tambah Data Kelas?');">

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
//tangkap data dari form
if (isset($_POST["submit"])) {
    $id_kelas = $_POST['id_kelas'];
    $nm_kelas = $_POST['nama_kelas'];
    $jur = $_POST['jurusan'];

    if (empty($id_kelas) || empty($nm_kelas) || empty($jur)) {
        echo "<script>
    alert('Form belum lengkap, Silahkan isi kembali.');
    document.location.href = 'tambah-kelas.php';
    </script>";
    } else {
        $sql = mysqli_query($conn, "INSERT INTO kelas (id_kelas,nama_kelas,jurusan) values('$id_kelas','$nm_kelas','$jur')") or die(mysqli_error($conn));
    }
    if ($sql) { ?>

        <script>
            alert("Data Berhasil Disimpan");
            window.location.href = "data-kelas.php?pesan=tambah-kelas-berhasil";
        </script>
<?php
    }
}
require '../view/footer.php'; ?>