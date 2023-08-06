<?php
require '../config/functions.php';
 session_start();
// if (!isset($_SESSION["siswa"])) {
//     echo "<script>
//     alert('Anda harus login');
//     document.location.href = '../../login-siswa.php';
//     </script>";
// }

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>HALAMAN SISWA</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-siswa.php';

?>

<!-- card -->
<br>
<section>
    <div class="container-fluid">
        <div class="content row mt-5 py-2">

            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto ">
                <?php
                // session_start();
                $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '" . $_SESSION['nisn'] . "'");
                $cek = mysqli_fetch_assoc($query);
                $nisn = $cek['nisn'];

                // if ($_SESSION['nisn'] != true) {
                //     echo '<script>window.location="../../login-siswa.php"</script>';
                // }

                ?>
                <?php
                session_start();
                $nisn = $_SESSION["siswa"]["nisn"];
                // $siswa = query("SELECT * FROM siswa WHERE nisn = '" . $_SESSION['nisn'] . "'");
                // while ($profile = mysqli_fetch_array($siswa)) :
                ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="float-left font-weight-bold text-dark pt-2">
                            Profile Siswa
                        </h4>
                        <a href="../siswa/home.php" class="btn btn-dark float-right">
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $_SESSION["siswa"]["nama"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>:</td>
                                        <td><?php echo $_SESSION["siswa"]["nisn"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIS</td>
                                        <td>:</td>
                                        <td><?php echo $_SESSION["siswa"]["nis"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>:</td>
                                        <td>*******</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?php echo $_SESSION["siswa"]["alamat"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor HP</td>
                                        <td>:</td>
                                        <td><?php echo $_SESSION["siswa"]["no_tlp"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><a href="ubah-profile.php?nisn=<?php echo $_SESSION["siswa"]["nisn"] ?>" class="btn btn-dark">Ubah Profile</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../view/footer.php';
    ?>