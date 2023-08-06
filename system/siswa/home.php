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
                $siswa = query("SELECT * FROM siswa WHERE nisn = '" . $_SESSION['nisn'] . "'");
                $pembayaran = query("SELECT * FROM pembayaran WHERE nisn = '" . $_SESSION['nisn'] . "'");

                ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4 class="float-left font-weight-bold text-dark pt-2">
                            Histori Pembayaran
                        </h4>
                        <a href="../siswa/profile.php">
                            <i class="fa fa-user fa-2x text-dark ml-4 mt-2"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    $data = mysqli_query($conn, "SELECT * FROM pembayaran WHERE nisn = '$nisn'");

                                    if (mysqli_num_rows($data) > 0) {
                                        while ($p = mysqli_fetch_array($data)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $nomor++; ?></td>
                                                <td><?php echo $p["bulan"]; ?></td>
                                                <?php if ($p["tanggal_bayar"] === null) : ?>
                                                    <td>Belum Melakukan Pembayaran</td>
                                                <?php else : ?>
                                                    <td><?php echo $p["tanggal_bayar"]; ?></td>
                                                <?php endif; ?>
                                                <?php if ($p["status"] === 'Belum-Lunas') : ?>
                                                    <td><a href="kirimBukti.php?id_pembayaran=<?php echo $p["id_pembayaran"] ?>" class="btn btn-dark text-white">Kirim Bukti</a></td>
                                                <?php elseif ($p["status"] === 'Menunggu-Konfirmasi') : ?>
                                                    <td>Menunggu Konfirmasi</td>
                                                <?php else : ?>
                                                    <td><a href="cetak.php?id_pembayaran=<?php echo $p["id_pembayaran"] ?>&nisn=<?php echo $p["nisn"]; ?>" target="_blank" class="btn btn-primary text-light"><i class="fa fa-print"></i> Cetak</a>
                                                        <a href="kwitansi.php?id_pembayaran=<?php echo $p["id_pembayaran"] ?>&nisn=<?php echo $p["nisn"]; ?>" target="_blank" class="btn btn-success text-light"><i class="fa fa-eye"></i> Kwitansi</a>
                                                    <?php endif; ?>
                                                    </td>
                                            </tr>
                                    <?php }
                                    } ?>
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