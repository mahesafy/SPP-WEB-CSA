<?php
require '../config/functions.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>TAMBAH DATA SISWA</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


$kelas = query("SELECT * FROM kelas");
$spp = query("SELECT * FROM spp where status_spp = 'Aktif'");

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahSiswa($_POST) > 0) { ?>
        <script type='text/javascript'>
            alert("Data Berhasil Disimpan");
            window.location.href = "data-semua-siswa.php";
        </script>;
<?php
    } else {
        echo mysqli_error($conn);
    }
}

?>
<?php

$query = mysqli_query($conn, "SELECT max(nisn) as nisnTerbesar FROM siswa");
$data = mysqli_fetch_array($query);
$nisnOtmts = $data['nisnTerbesar'];

$urutan = (int) substr($nisnOtmts, 4, 4);

$urutan++;

$angka = "2109";
$nisnOtmts = $angka . sprintf("%03s", $urutan);
?>
<div class="container-fluid">
    <br>
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class="float-left font-weight-bold text-dark pt-2">Tambah Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" autocomplete="off" required class="form-horizontal">

                        <div class="form-group row">
                            <label class="col-sm-2" for="nisn">Nisn </i></label>
                            <div class="col-sm-10">
                                <input name="nisn" id="nisn" value="<?php echo $nisnOtmts ?>" type="number" readonly class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nis">Nis </i></label>
                            <div class="col-sm-10">
                                <input name="nis" id="nis" type="text" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama">Nama</label>
                            <div class="col-sm-10">
                                <input name="nama" id="nama" type="text" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="password">Password</label>
                            <div class="col-sm-10">
                                <input name="password" id="password" type="password" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">Kelas</label>
                            <div class="col-sm-10 ">
                                <select name="id_kelas" class="form-control">
                                    <option>Pilih Kelas</option>
                                    <?php foreach ($kelas as $k) : ?>
                                        <option value="<?php echo $k["id_kelas"]; ?>"><?php echo $k["nama_kelas"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                <input name="alamat" id="alamat" type="texalamat" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="no_tlp">Telepon</label>
                            <div class="col-sm-10">
                                <input name="no_tlp" id="no_tlp" type="number" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">SPP</label>
                            <div class="col-sm-10 ">
                                <select name="id_spp" class="form-control">
                                    <option>Pilih SPP</option>
                                    <?php foreach ($spp as $k) : ?>
                                        <option value="<?php echo $k["id_spp"]; ?>"><?php echo $k["tahun"] ?> - <?php echo $k["nominal"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">Tagihan Awal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="jatuh_tempo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" onClick="return confirm('Yakin Tambah Data Siswa?');" value="Save">
                                <input type="reset" name="submit" class="btn btn-danger text-white" value="Reset">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?php require '../view/footer.php'; ?>