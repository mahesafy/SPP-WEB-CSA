<?php
require '../config/functions.php';
require '../view/session-admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link href="../../fontawesome/css/all.min.css" rel="stylesheet">

</head>

<body>

</body>

</html>
<!-- card -->
<br>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <img style="float: left;" src="../../assets/img/logo-bines.jpg" alt="logo" width="90" height="90">
                        <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">SMK BINA ESSA <br> Jl. Cihanjuang Km. 2,45<br>Kec. Parongpong, Kab. Bandung Barat</h3>
                        <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;"></h3>
                        <br>
                        <hr />

                        <br>
                        <H4 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">Laporan Pembayaran Siswa</H4>
                        <a class="kembali" href="data-laporan.php" style="text-decoration: none;"><b class="no-print"><i class="fa fa-sign-out"></i></b></a>
                        <br><br>
                        <div class="card-body">
                            <table border="1" width="100%" cellspacing="0" cellpadding="4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nis</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Pembayaran Bulan</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <?php
                                $nis = $_POST["nis"];
                                $siswa = query("SELECT * FROM siswa INNER JOIN spp ON spp.id_spp = siswa.id_spp INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
                                    INNER JOIN pembayaran ON pembayaran.nisn = siswa.nisn WHERE tanggal_bayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]' 
                                    ORDER BY tanggal_bayar ASC");
                                ?>
                                <?php $nomor = 1;
                                $total = 0; ?>
                                <?php foreach ($siswa as $p) : ?>
                                    <tr align="center">
                                        <td><?php echo $nomor++ ?></td>
                                        <td><?php echo $p["nis"]; ?></td>
                                        <td><?php echo $p["nama"]; ?></td>
                                        <td><?php echo $p["nama_kelas"]; ?></td>
                                        <td><?php echo $p["bulan"] ?></td>
                                        <td>Rp. <?php echo number_format($p["nominal"], 0, ',', '.'); ?></td>
                                        <td><?php echo $p["status"]; ?></td>

                                    <?php $total += $p['nominal'];
                                endforeach; ?>
                                    <tr>
                                        <td colspan="5" align="right">Total</td>
                                        <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
                                        <td></td>
                                    </tr>
                            </table>

                            <br>
                            <br>

                            <style type="text/css">
                                .cetak {
                                    padding: 6px 20px;
                                    margin: 5px;
                                    background-color: #4169e1;
                                    text-align: center;
                                    color: white;

                                }

                                .kembali {
                                    padding: 6px 20px;
                                    margin: 5px;
                                    background-color: #4169e1;
                                    text-align: center;
                                    color: white;

                                }
                            </style>
                            <h4 class="m-0 font-weight-bold text-primary" align="right">Cimahi, <?php echo date('d - m - Y'); ?></h4>
                            <h4 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;" align="right"><?php echo $_SESSION['username']; ?>,</h6>
                                <br>

                                <h4 class="m-0 font-weight-bold text-primary" style="text-transform: capitalize;" align="right"><?php echo $_SESSION['nama']; ?></h4>

                                <span>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    @media print {
                        .no-print {
                            display: none;
                        }
                    }
                </style>
                <script>
                    window.print();
                </script>
                <?php
                include '../view/footer.php';
                ?>