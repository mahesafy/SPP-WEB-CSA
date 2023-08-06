<?php
require '../config/functions.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>TRANSAKSI PEMBAYARAN</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

?>
<style>
    .lonceng {
        font-size: 15px;
        text-decoration: none;
        padding: 3px 7px;
        font-weight: 600;
        background-color: red;
        border-radius: 50%;
    }

    .lonceng:hover {
        text-decoration: none;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Pembayaran SPP</h4>
                    <i class="fa fa-bell fa-2x text-dark ml-4 mt-2"></i>
                    <a href="../admin/belum-konfirmasi.php" class="text-light lonceng">
                        <?php
                        $sql = $conn->query("select count(status) as pembayaran from pembayaran where status='Menunggu-Konfirmasi'");
                        while ($data = $sql->fetch_assoc()) {
                            echo $data['pembayaran'];
                        }
                        ?>
                    </a>
                </div>
                <div class="card-body">
                    <div class="content row mt-3 mb-3">
                        <div class="col-md-3">
                            <h5>Nomor Induk Siswa</h5>
                        </div>
                        <div class="col-md-8">
                            <form action="" method="POST" class="form-horizontal" autocomplete="off">
                                <input class="search" name="nis" type="text" placeholder="Cari..." required>
                                <button class="btn btn-dark text-light" name="cari" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($_POST["nis"]) : ?>
                <?php
                $nis = $_POST["nis"];
                $siswa = query("SELECT * FROM siswa INNER JOIN spp ON spp.id_spp = siswa.id_spp INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas WHERE nis = '$nis'")[0];
                $nisn = $siswa["nisn"];
                $pembayaran = query("SELECT * FROM pembayaran INNER JOIN bukti_bayar ON bukti_bayar.kode_bayar = pembayaran.kode_bayar WHERE nisn = '$nisn'");
                ?>


                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h5 class="float-left font-weight-bold text-secondary pt-2">BIODATA SISWA</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>NIS</td>
                                <td><?php echo $siswa["nis"]; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td><?php echo $siswa["nama"] ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td><?php echo $siswa["nama_kelas"] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td><?php echo $siswa["tahun"] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h5 class="float-left font-weight-bold text-secondary pt-2">Data Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="content row mt-3 mb-3">
                            <h5 class="ml-3">Nomor Induk Siswa : <?php echo $siswa["nis"]; ?></h5>
                            <div class="col-md-12 mt-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Tagihan</th>
                                            <th>Keterangan / Tanggal</th>
                                            <th>Bukti Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>

                                        <?php foreach ($pembayaran as $data) : ?>
                                            <tr>
                                                <td><?php echo $nomor++ ?></td>

                                                <td><?php echo $data["bulan"]; ?></td>
                                                <td>Rp. <?php echo number_format($siswa["nominal"], 0, ',', '.'); ?></td>
                                                <td>
                                                    <?php if ($data["status"] === 'Belum-Lunas') : ?>
                                                        Belum Bayar
                                                    <?php elseif ($data["status"] === 'Menunggu-Konfirmasi') : ?>
                                                        Menunggu Konfirmasi
                                                    <?php else : ?>
                                                        <?php echo $data["tanggal_bayar"]; ?></td>
                                            <?php endif; ?>
                                            <td> <?php if ($data["status"] === 'Belum-Lunas') : ?>
                                                    Belum Bayar
                                                <?php elseif ($data["status"] === 'Menunggu-Konfirmasi') : ?>
                                                    <!-- <button data-id_pembayaran="" class="fotoinfo btn btn-dark">Lihat Bukti</button> -->
                                                    <a href="" id="lihat" class="btn btn-dark" data-toggle="modal" data-target="#modal<?php echo $data["id_pembayaran"] ?>" data-id="<?php echo $data["id_pembayaran"] ?>"><i class="fa fa-eye"></i> Bukti</a>
                                                    <!-- <img src="../../assets/foto_bukti/< echo $data['foto_bukti'] ?>" width="150px" height="100px"> -->
                                                <?php else : ?>
                                                    Lunas
                                            </td>

                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php if ($data["status"] === 'Belum-Lunas') : ?>
                                                Belum Kirim Bukti
                                            <?php elseif ($data["status"] === 'Menunggu-Konfirmasi') : ?>
                                                <!-- <a href="batalPembayaran.php?id_pembayaran=< echo $p["id_pembayaran"] ?>&id_user=< echo $_SESSION["id_user"] ?>" class="btn btn-danger" onclick="confirm('Apakah anda yakin?')">Tolak</a> -->
                                                <a href="kirimPembayaran.php?id_pembayaran=<?php echo $data["id_pembayaran"] ?>&id_user=<?php echo $_SESSION["id_user"] ?>" class="btn btn-dark text-white" onClick="return confirm('Yakin Konfirmasi ?');">Konfirmasi</a>

                                            <?php else : ?>
                                                <a href="cetak-laporan.php?id_pembayaran=<?php echo $data["id_pembayaran"] ?>&nis=<?php echo $siswa["nis"]; ?>" target="_blank" class="btn btn-primary text-light"><i class="fa fa-print"></i> Cetak</a>
                                            <?php endif; ?>
                                        </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <section class="modal fade" role="dialog" id="modal<?php echo $data["id_pembayaran"] ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Bukti Pembayaran</h4>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <h4 class="modal-title">Nisn Siswa : <?php echo $data['nisn'] ?></h4>

                                        <th class="text-center"><img src="../../assets/foto_bukti/<?PHP echo $data['foto_bukti'] ?>" width="350px" height="400px"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
</div>
</div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#lihat', function() {
            var fotobukti = $(this).data('foto_bukti');
            $('#fotobukti');
        });
    })
</script> -->
</div>
<!-- End of Main Content -->



</div>
</div>
</div>
</div>

</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>