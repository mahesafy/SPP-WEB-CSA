<?php
require '../config/functions.php';
require '../view/session-admin.php';
?>
<!-- card -->
<br>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <img style="float: left;" src="../../assets/img/logo-cimahi.png" alt="logo" width="90" height="90">
            <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">SMK BINA ESSA <br>JL. Cihanjuang No.69 Kel. Citereup Kec. Cimahi Utara <br>Email : smkbines@yahoo.com Kota Cimahi 40512</h3>
            <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;"></h3>
            <br>
            <hr />

            <br>
            <H4 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">Slip Pembayaran SPP</H4>
            <br>
            <div class="card-body">
              <table width="100%" border="1" cellspacing="0" cellpadding="4">
                <tr align="center">
                  <th>No</th>
                  <th>Nominal</th>
                  <th>Tanggal Bayar</th>
                  <th>Keterangan</th>
                </tr>

                <?php
                require '../config/koneksi.php';
                $pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN spp ON spp.id_spp = pembayaran.id_spp  INNER JOIN user ON user.id_user = pembayaran.id_user WHERE id_pembayaran ='$_GET[id_pembayaran]'");
                $p = mysqli_fetch_array($pembayaran);

                ?>
                <tr align="center">
                  <td><?php echo $no; ?></td>
                  <td><?php echo number_format($p['nominal'], '0', ',', '.') ?></td>
                  <td><?php echo $p["tanggal_bayar"]; ?></td>
                  <td><?php echo $p["status"]; ?></td>
                </tr>
                <?php
                $no++;

                ?>
              </table>

              <br>
              <br>
              <h4 class="m-0 font-weight-bold text-primary" align="right">Cimahi, <?php echo date('d - m - Y'); ?></h4>
              <h4 class="m-0 font-weight-bold text-primary" align="right"><?php echo $_SESSION['username']; ?>,</h6>
                <br>

                <h4 class="m-0 font-weight-bold text-primary" align="right"><?php echo $_SESSION['nama']; ?></h4>

                <span>
                  <a href="" onclick="window.print();"><i class="no-print">Cetak</i></a>
                  <a href="transaksi.php"><i class="no-print">Kembali</i></a>

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

        <?php
        include '../view/footer.php';
        ?>

        <?php
        session_start();
        require '../config/koneksi.php';
        ?>