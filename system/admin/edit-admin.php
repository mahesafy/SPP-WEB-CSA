<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>EDIT DATA ADMIN </title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


//mendapatkan informasi untuk mengedit data
$id_user = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
$data = mysqli_fetch_array($query);
?>
<br>
<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Edit Data Admin</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form-horizontal">
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />

                        <div class="form-group row">
                            <label class="col-sm-2" for="username">Username </i></label>
                            <div class="col-sm-10">
                                <input name="username" value="<?php echo $data['username']; ?>" id="username" type="text" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="password">Password </i></label>
                            <div class="col-sm-10">
                                <input name="password" value="<?php echo $data['password']; ?>" id="password" type="password" autocomplete="off" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama_user">Nama user</label>
                            <div class="col-sm-10">
                                <input name="nama_user" value="<?php echo $data['nama_user']; ?>" id="nama_user" type="" autocomplete="off" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="level">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level">
                                    <option value="Admin" <?php echo ($data['level'] == 'Admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="Pimpinan" <?php echo ($data['level'] == 'Pimpinan') ? 'selected' : '' ?>>Pimpinan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" onClick="return confirm('Yakin Edit Data Admin?');">

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
    $id_user = $_POST['id_user'];
    $pass = $_POST['password'];
    $pass = md5($pass);
    $nama = $_POST['nama_user'];
    $user = $_POST['username'];
    $level = $_POST['level'];
    // $foto = $_FILES["foto"]["name"];
    // $lokasi = $_FILES['foto']['tmp_name'];
    // $upload = move_uploaded_file($lokasi, "system/images/" . $foto);


    $sql = mysqli_query($conn, "UPDATE user SET username='$user', password='$pass', nama_user='$nama', level='$level' where id_user='$id_user'") or die(mysqli_errno($conn));
    if ($sql) { ?>

        <script>
            alert("Data Berhasil di Ubah!");
            window.location.href = "data-admin.php?pesan=edit-admin-berhasil";
        </script>
<?php
    } else {
        echo mysqli_error($conn);
    }
}
require '../view/footer.php'; ?>