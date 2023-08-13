<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>HOME ADMIN</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

?>

<!-- card -->
<section>
    <div class="container-fluid">
        <div class="row mb-5 mt-5 pt-2">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto mt-5">
                <h2 class="text-center">Dashboard</h2>

                <div class="row pt-md-5 mt-md-3 mb-5 ml-5">
                    <div class="col-xl-3 col-sm-6 p-2 mr-5" style="margin-left: 0px;">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fa fa-user-graduate fa-2x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Jumlah Siswa</h5>
                                        <h3>
                                            <?php
                                            // Query data jumlah siswa
                                            $sql = $conn->query("SELECT COUNT(nis) AS siswa FROM siswa");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['siswa'];
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fa fa-sync mr-3"></i>
                                <span>Informasi Terbaru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 p-2 mr-5">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fa fa-university fa-2x text-warning"></i>
                                    <div class="text-right text-secondary">

                                        <h5>Jumlah Kelas</h5>
                                        <h3>
                                            <?php
                                            // Query data jumlah kelas
                                            $sql = $conn->query("SELECT COUNT(nama_kelas) AS kelas FROM kelas");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['kelas'];
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fa fa-sync mr-3"></i>
                                <span>Informasi Terbaru</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 p-2 mr-5">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fa fa-users fa-2x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Jumlah User</h5>
                                        <h3>
                                            <?php
                                            // Query data jumlah user
                                            $sql = $conn->query("SELECT COUNT(nama_user) AS user FROM user");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['user'];
                                            }
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary">
                                <i class="fa fa-sync mr-3"></i>
                                <span>Informasi Terbaru</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan elemen canvas untuk grafik -->
                <!-- <canvas id="barChart" width="50" height="25"></canvas> -->
            </div>
        </div>
    </div>

</section>
<!-- 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen canvas grafik
        var ctx = document.getElementById("barChart").getContext("2d");

        // Data yang akan ditampilkan dalam grafik
        var data = {
            labels: ["Jumlah Siswa", "Jumlah Kelas", "Jumlah User"],
            datasets: [{
                label: "Jumlah",
                backgroundColor: ["rgba(255, 206, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)"],
                borderColor: ["rgba(255, 206, 86, 1)", "rgba(75, 192, 192, 1)", "rgba(54, 162, 235, 1)"],
                borderWidth: 1,
                data: [
                    <?php
                    // Query data jumlah siswa, kelas, dan user seperti sebelumnya
                    $sql = $conn->query("SELECT COUNT(nis) AS siswa FROM siswa");
                    while ($data = $sql->fetch_assoc()) {
                        echo $data['siswa'] . ",";
                    }

                    $sql = $conn->query("SELECT COUNT(nama_kelas) AS kelas FROM kelas");
                    while ($data = $sql->fetch_assoc()) {
                        echo $data['kelas'] . ",";
                    }

                    $sql = $conn->query("SELECT COUNT(nama_user) AS user FROM user");
                    while ($data = $sql->fetch_assoc()) {
                        echo $data['user'] . ",";
                    }
                    ?>
                ],
            }, ],
        };

        // Konfigurasi opsi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        };

        // Inisialisasi grafik bar dengan data dan opsi yang telah disediakan
        var barChart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options,
        });
    });
</script> -->
<!-- 
<div class="container-fluid">
    <br>
    <div class=" row mb-5 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4><a class=" float-left font-weight-bold text-dark pt-2">INFORMASI SMK BINA ESSA</a></h4>
                </div>
                <div class="card-body">
                    <center>
                        <img src="../../assets/img/smk.jpg" alt="sekolah" width="600px" height="300px">
                        <p class="mt-3 mb-3 display-5">SMK BINA ESSA</p>
                        <img src="../../assets/img/prestasi.jpg" class="mb-4" alt="sekolah" width="600px" height="300px">
                        <img src="../../assets/img/bines.jpg" alt="sekolah" width="600px" height="300px">
                        <p class="mt-3 display-5">Siswa Siswi Berprestasi</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->

</section>
<!-- akhir card -->


<?php
include '../view/footer.php';
?>