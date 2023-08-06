<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>Admin </title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

?>
<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Tambah SPP</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal">

                        <div class="form-group row">
                            <label class="col-sm-2" for="nominal">Nominal </i></label>
                            <div class="col-sm-10">
                                <input name="nominal" id="nominal" type="number" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2" for="tahun">Tahun Ajaran </i></label>
                            <div class="col-sm-10">
                                <input name="tahun" id="tahun" type="text" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">Pilih Status</label>
                            <div class="col-sm-10 ">
                                <select name="status_spp" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak aktif</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" onClick="return confirm('Yakin Tambah Data SPP?');">

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
    $id_spp = $_POST['id_kelas'];
    $nom = $_POST['nominal'];
    $tahun = $_POST['tahun'];
    $status_spp = $_POST['status_spp'];

    $sql = mysqli_query($conn, "INSERT INTO spp (id_spp,nominal,tahun,status_spp) values('$id_spp','$nom','$tahun','$status_spp')") or die(mysqli_error($conn));
    if ($sql) { ?>

        <script>
            alert("Data Berhasil Disimpan");
            window.location.href = "data-spp.php?message=insert-success";
        </script>
<?php
    }
}
require '../view/footer.php'; ?>