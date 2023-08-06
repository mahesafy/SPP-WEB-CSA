<?php
session_start();
require '../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Report Siswa</title>
  <!-- Favicon icon -->
  <!-- Pignose Calender -->
  <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
  <!-- Chartist -->
  <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
  <!-- Custom Stylesheet -->
  <link href="css/style1.css" rel="stylesheet">
</head>

<body>
  <br>
  <br>



  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <img style="float: left;" src="../../assets/img/logo-bines.jpg" alt="logo" width="90" height="90">
            <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">SMK BINA ESSA <br>Jl. Cihanjuang Km. 2,45<br>Kec. Parongpong, Kab. Bandung Barat</h3>
            <h3 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;"></h3>
            <br>
            <hr />
            <h4 class="m-0 font-weight-bold text-secondary" align="center" style="color: #000;">Laporan Data Semua Siswa</h4>
            <a class="kembali" href="data-semua-siswa.php" style="text-decoration: none;"><b class="no-print">Kembali</b></a>
            <div class="table-responsive">
              <form action="data-semua-siswa.php" method="get" align="center">

              </form><br>

              <div class="table-responsive">
                <table width="100%" border="1" cellspacing="0" cellpadding="6">
                  <tr align="center">
                    <td><b>No</b></td>
                    <td><b>NISN</b></td>
                    <td><b>NIS</b></td>
                    <td><b>Nama</b></td>
                    <td><b>Kelas</b></td>
                    <td><b>Alamat</b></td>
                    <td><b>No Telp</b></td>

                  </tr>

                  <?php
                  require '../config/koneksi.php';
                  $sql = mysqli_query($conn, "SELECT * FROM siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas");
                  $no = 1;
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>

                    <tr align="center">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nisn']; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['alamat']; ?></td>
                      <td><?php echo $data['no_tlp']; ?></td>

                    </tr>
                  <?php
                    $no++;
                  }

                  ?>
                </table>
                <script>
                  window.print();
                </script>
                <br>
              </div>
              <br>
              <br>
              <style type="text/css">
                .cetak {
                  padding: 6px 20px;
                  margin: 5px;
                  background-color: #4169e1;
                  text-align: center;
                  color: white;
                  text-decoration: none;

                }

                .kembali {
                  padding: 6px 20px;
                  margin: 5px;
                  background-color: #4169e1;
                  text-align: center;
                  color: white;

                }
              </style>

              <h4 align="right">Cimahi, <?php echo date('d - m - Y'); ?></h4>
              <h4 style="text-transform: capitalize;" align="right"><?php echo $_SESSION['username']; ?>,</h6>
                <br>

                <h4 style="text-transform: capitalize;" align="right"><?php echo $_SESSION['nama']; ?></h4>

                <span>
                  <a style="text-transform: capitalize;" class="cetak" href="" onclick="window.print();" style="text-decoration: none;"><b class="no-print">Cetak</b></a>



                </span>

</body>

</html>
<style type="text/css">
  @media print {
    .no-print {
      display: none;
    }
  }
</style>