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
    <title>CETAK BUKTI BAYAR</title>
    <link href="../../fontawesome/css/all.min.css" rel="stylesheet">

</head>

<body>
    <br>
    <img style="float: left;" src="../../assets/img/logo-bines.jpg" alt="logo" width="90" height="90">
    <h3 align="center" style="color: #000;">SMK BINA ESSA<br>Jl. Cihanjuang Km. 2,45<br>Kec. Parongpong, Kab. Bandung Barat</h3>
    <br>
    <hr />
    <br>
    <h3 align="center" style="color: #000;">BUKTI PEMBAYARAN</h3>
    <table width="100%" border="1" cellspacing="0" cellpadding="4">
        <tr align="center" style="text-transform: capitalize;">
            <th>Nama</th>
            <th>Nisn</th>
            <th>Bulan</th>
            <th>Tanggal Bayar</th>
            <th>Kode Bayar</th>
            <th>Total Bayar</th>
            <th>Status</th>
        </tr>
        <?php

        $sub_total = 0;
        $data = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN siswa ON siswa.nisn = pembayaran.nisn INNER JOIN spp ON spp.id_spp = pembayaran.id_spp WHERE id_pembayaran='$id_pembayaran'");

        if (mysqli_num_rows($data) > 0) {
            while ($cb_siswa = mysqli_fetch_array($data)) {
        ?>
                <tr align="center">
                    <td><?php echo $cb_siswa['nama']; ?></td>
                    <td><?php echo $cb_siswa['nisn']; ?></td>
                    <td><?php echo $cb_siswa['bulan']; ?></td>
                    <td><?php echo $cb_siswa['tanggal_bayar']; ?></td>
                    <td><?php echo $cb_siswa['kode_bayar'] ?></td>
                    <td>Rp. <?php echo number_format($cb_siswa["nominal"], 0, ',', '.'); ?></td>
                    <td><?php echo $cb_siswa['status'] ?></td>

                </tr>
                </tr>
        <?php
            }
        } ?>
    </table>

    <script>
        window.print();
    </script>
    <br>
    <?php

    $sub_total = 0;
    $data = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN user ON user.id_user = pembayaran.id_user INNER JOIN siswa ON siswa.nisn = pembayaran.nisn INNER JOIN spp ON spp.id_spp = pembayaran.id_spp WHERE id_pembayaran='$id_pembayaran'");

    if (mysqli_num_rows($data) > 0) {
        while ($cb_siswa = mysqli_fetch_array($data)) {
    ?>
            <br>
            <div style="float: left;">
                <h4 class="m-0 font-weight-bold text-primary" align="left">Cimahi, <?php echo date('d - m - Y'); ?></h4>
                <h4 class="m-0 font-weight-bold text-primary" align="left">Admin,</h4>
                <br>
                <h4 align="left" style="text-transform: capitalize;"><?php echo $cb_siswa['nama_user']; ?></h4>

            </div>
    <?php }
    } ?>
    <h4 class="m-0 font-weight-bold text-primary" align="right">Cimahi, <?php echo date('d - m - Y'); ?></h4>
    <h4 class="m-0 font-weight-bold text-primary" align="right">Siswa,</h4>
    <br>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$_SESSION[nisn]' ");
    $data = mysqli_fetch_array($query); ?>
    <h4 align="right"><?php echo $data['nama']; ?></h4>

    <br>
    <h3><a class="no-print" href="home.php" style="margin-right: 3%;"><i class="fa fa-sign-out"></i></a>
</body>

</html>
<style type="text/css">
    @media print {
        .no-print {
            display: none;
        }
    }
</style>