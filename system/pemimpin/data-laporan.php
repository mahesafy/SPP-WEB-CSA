<?php
require '../config/functions.php';
require '../view/session-pemimpin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>LAPORAN PEMBAYARAN</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-pemimpin.php untuk menghubungkan navigasi pemimpin ke konten
require '../view/nav-pemimpin.php';

$nis = query("SELECT * FROM siswa");


?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mb-5 mt-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="float-left font-weight-bold text-dark pt-2">Laporan Pembayaran Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="content row mt-3 mb-3">

                        <div>
                            <form method="GET" action="laporan_pembayaran.php">
                                Mulai Tanggal <input class="search" type="date" name="tgl1" value="<?php echo date('Y-m-d'); ?>" />
                                Sampai Tanggal <input class="search" type="date" name="tgl2" value="<?php echo date('Y-m-d'); ?>" />
                                <input class="btn btn-dark" type="submit" value="Cetak">
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