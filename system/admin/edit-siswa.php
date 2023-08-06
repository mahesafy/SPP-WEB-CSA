<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>EDIT DATA SISWA </title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


//mendapatkan informasi untuk mengedit data
$id_siswa = $_GET['nisn'];
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$id_siswa'");
$data = mysqli_fetch_array($query);
?>
<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">Edit Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" />

                        <div class="form-group row">
                            <label class="col-sm-2" for="nis">Nisn </i></label>
                            <div class="col-sm-10">
                                <input name="nisn" value="<?php echo $data['nisn']; ?>" id="nis" type="text" autocomplete="off" class="form-control form-control-warning" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nis">Nis </i></label>
                            <div class="col-sm-10">
                                <input name="nis" value="<?php echo $data['nis']; ?>" id="nis" type="text" autocomplete="off" class="form-control form-control-warning" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama">Nama</label>
                            <div class="col-sm-10">
                                <input name="nama" value="<?php echo $data['nama']; ?>" id="nama" type="text" autocomplete="off" class="form-control form-control-success" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="password">Password</label>
                            <div class="col-sm-10">
                                <input name="password" value="<?php echo $data['password']; ?>" id="password" type="password" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">Kelas</label>
                            <div class="col-sm-10 ">
                                <select name="id_kelas" class="form-control">
                                    <?php
                                    $sqlKelas = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                    while ($kelas = mysqli_fetch_array($sqlKelas)) {

                                        if ($kelas['id_kelas'] == $data['id_kelas']) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }

                                    ?>
                                        <option value="<?php echo $kelas['id_kelas']; ?>" <?php echo $selected; ?>><?php echo $kelas['nama_kelas']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class=" form-group row">
                            <label class="col-sm-2" for="alamat">Alamat</label>
                            <div class="col-sm-10">
                                <input name="alamat" value="<?php echo $data['alamat']; ?>" id="alamat" type="texalamat" autocomplete="off" class="form-control form-control-success" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="tlp">Telepon</label>
                            <div class="col-sm-10">
                                <input name="no_tlp" value="<?php echo $data['no_tlp']; ?>" id="tlp" type="number" autocomplete="off" class="form-control form-control-success" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 ">Tahun Ajaran</label>
                            <div class="col-sm-10 ">
                                <select name="id_spp" class="form-control">
                                    <?php
                                    $data2 = mysqli_query($conn, "SELECT * FROM spp WHERE status_spp='Aktif'");
                                    while ($row2 = mysqli_fetch_assoc($data2)) {
                                        if ($row2['id_spp'] == $row2['id_spp']) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                        echo "<option value='$row2[id_spp]' $selected>$row2[tahun] - $row2[nominal]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" value="Save" onClick="return confirm('Yakin Edit Data Siswa?');">
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

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $nm_kelas = $_POST['id_kelas'];
    // $jns_kel = $_POST['jk'];
    // $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['no_tlp'];
    $id_spp = $_POST['id_spp'];
    // $pass = $_POST['password'];
    // $pass = sha1($pass);

    $sql = mysqli_query($conn, "UPDATE siswa SET  nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$nm_kelas', alamat='$alamat', no_tlp='$tlp',id_spp='$id_spp' WHERE nisn='$id_siswa'");

    if ($sql) { ?>

        <script>
            alert("Data Berhasil di Ubah!");
            <?php
            $query = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
            while ($row = mysqli_fetch_assoc($query)) { ?>
                window.location.href = "data-semua-siswa.php";
            <?php
            } ?>
        </script>
<?php
    } else {
        echo mysqli_error($conn);
    }
}
require '../view/footer.php'; ?>