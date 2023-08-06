<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>TAMBAH DATA ADMIN </title>';
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
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">Tambah Data Admin / Pimpinan</a></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="" autocomplete="off" class="form-horizontal">
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />

                        <div class="form-group row">
                            <label class="col-sm-2" for="username">Username </i></label>
                            <div class="col-sm-10">
                                <input name="username" required="required" id="username" type="text" class="form-control form-control-warning">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="password">Password </i></label>
                            <div class="col-sm-10">
                                <input name="password" required="required" id="TeguhInput" type="password" class="form-control form-control-warning">
                                <input class="mt-3" type="checkbox" onclick="myFunction()"> Lihat
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="nama_user">Nama</label>
                            <div class="col-sm-10">
                                <input name="nama_user" required="required" id="nama_user" type="text" class="form-control form-control-success">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2" for="level">Level</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="level" required>
                                    <option value="" disabled selected>-- Pilih --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-2">
                                <input type="submit" name="submit" class="btn btn-dark text-white" onClick="return confirm('Yakin Tambah Data Admin?');">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("TeguhInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<!-- /.container-fluid -->


<?php
if (isset($_POST["submit"])) {
    $id_user = $_POST['id_user'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $pass = md5($pass);
    $nama = $_POST['nama_user'];
    $level = $_POST['level'];

    $sql = mysqli_query($conn, "INSERT INTO user (username,password,nama_user,level) VALUES ('$user','$pass','$nama','$level')") or die(mysqli_errno($conn));
    if ($sql) { ?>

        <script>
            alert("Data Berhasil DiTambah");
            window.location.href = "data-admin.php";
        </script>
<?php
    } else {
        echo mysqli_error($conn);
    }
}
require '../view/footer.php'; ?>