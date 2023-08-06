<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>BELUM DI KONFIRMASI</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';


?>

<div class="container-fluid">
    <div class=" row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="float-left font-weight-bold text-dark pt-2">BELUM DIKONFIRMASI</h4>
                    <a href="transaksi.php" class=" p-2 btn btn-sm  btn-dark text-white float-right">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Bulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn = pembayaran.nisn WHERE status='Menunggu-Konfirmasi'");
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?php echo $data['nama']; ?></td>
                                        <td class="text-center"><?php echo $data['nis']; ?></td>
                                        <td class="text-center"><?php echo $data['bulan']; ?></td>
                                    </tr>

                                <?php $no++;
                                }
                                ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>