<?php
require '../config/koneksi.php';
require '../view/session-pemimpin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>HOME PIMPINAN</title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-pemimpin.php';

?>

<!-- card -->
<section>
    <div class="container-fluid">
        <div class=" row mb-5 mt-5 pt-2">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto mt-5">
                <h2 class="text-center">Dashboard</h2>
                <div class="row pt-md-5 mt-md-3 mb-5 ml-5">
                    <div class="col-xl-3 col-sm-6 p-2 mr-5" style="margin-left: 50px;">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fa fa-graduation-cap fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Jumlah Siswa</h5>
                                        <h3><?php
                                            $sql = $conn->query("select count(nis) as siswa from siswa ");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['siswa'];
                                            }
                                            ?></h3>
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
                                    <i class="fa fa-university fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">

                                        <h5>Jumlah Kelas</h5>
                                        <h3><?php
                                            $sql = $conn->query("select count(nama_kelas) as kelas from kelas ");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['kelas'];
                                            }
                                            ?></h3>
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
                                    <i class="fa fa-users fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5> Jumlah Admin</h5>
                                        <h3><?php
                                            $sql = $conn->query("select count(nama_user) as user from user ");
                                            while ($data = $sql->fetch_assoc()) {
                                                echo $data['user'];
                                            }
                                            ?></h3>
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
            </div>
        </div>
    </div>
</section>
<!-- akhir card -->

<?php
include '../view/footer.php';
?>