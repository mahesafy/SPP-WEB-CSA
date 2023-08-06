<?php
session_start();

include "../../system/config/koneksi.php";
$id_pembayaran = $_GET['id_pembayaran'];
$cetak_bukti = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '" . $_GET['id_pembayaran'] . "'");
$cb_siswa = mysqli_fetch_array($cetak_bukti);

?>

<!DOCTYPE html>
<html>

<head>
    <title>KWITANSI SISWA</title>
    <link href="../../fontawesome/css/all.min.css" rel="stylesheet">

</head>
<style>
    .fr {
        float: right;
        flex-direction: column;
    }
</style>

<body>
    <?php

    $sub_total = 0;
    $data = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN user ON user.id_user = pembayaran.id_user INNER JOIN siswa ON siswa.nisn = pembayaran.nisn INNER JOIN spp ON spp.id_spp = pembayaran.id_spp WHERE id_pembayaran='$id_pembayaran'");

    if (mysqli_num_rows($data) > 0) {
        while ($cb_siswa = mysqli_fetch_array($data)) {
    ?>
            <br>
            <h3 style="float: left;">SMK BINA ESSA</h3>
            <div class="fr">
                <p>Tanggal Bayar : <?php echo $cb_siswa['tanggal_bayar']; ?></p>
                <p>Kode Bayar : <?php echo $cb_siswa['kode_bayar']; ?></p>
            </div>
            <p style="margin-top: 60px;">Jl. Cihanjuang Km. 2,45<br>Kec. Parongpong, Kab. Bandung Barat</p>
            <h2 align="center">KWITANSI</h2>
            <hr />
            <br>
            <center>
                <table border="0" cellspacing="0" cellpadding="4">
                    <tr>
                        <td style="padding-left: 100px; padding-right: 100px;">Nama Siswa</td>
                        <td>:</td>
                        <td style="padding-left: 100px; padding-right: 100px;"><?php echo $cb_siswa['nama']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 100px; padding-right: 100px;">Nisn</td>
                        <td>:</td>
                        <td style="padding-left: 100px; padding-right: 100px;"><?php echo $cb_siswa['nisn']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 100px; padding-right: 100px;">Bulan</td>
                        <td>:</td>
                        <td style="padding-left: 100px; padding-right: 100px;"><?php echo $cb_siswa['bulan']; ?></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 100px; padding-right: 100px;">Total Bayar</td>
                        <td>:</td>
                        <td style="padding-left: 100px; padding-right: 100px;">Rp. <?php echo number_format($cb_siswa["nominal"], 0, ',', '.'); ?></td>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 100px; padding-right: 100px;">Status Bayar</td>
                        <td>:</td>
                        <td style="padding-left: 100px; padding-right: 100px;"><?php echo $cb_siswa['status']; ?></td>
                    </tr>
                    </tr>

                </table>
            </center>

            <br>
            <br>
            <br>
            <h4 class="m-0 font-weight-bold text-primary" align="right">Cimahi, <?php echo date('d - m - Y'); ?></h4>
            <h4 class="m-0 font-weight-bold text-primary" align="right">Admin,</h4>
            <br>
            <h4 align="right" style="text-transform: capitalize;"><?php echo $cb_siswa['nama_user']; ?></h4>

    <?php }
    } ?>
    <h3><a class="no-print" href="home.php" style="margin-right: 3%;"><i class="fa fa-sign-out"></i></a>
        <script>
            window.print();
        </script>
</body>

</html>
<style type="text/css">
    @media print {
        .no-print {
            display: none;
        }
    }
</style>