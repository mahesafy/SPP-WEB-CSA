<?php
require '../config/koneksi.php';
require '../view/session-admin.php';

//panggil file header.php untuk menghubungkan konten bagian atas
require '../view/header.php';
//memberi judul halaman
echo '<title>Admin </title>';
//panggil file css.php untuk desain atau tema
require '../view/css.php';
//panggil file navi-admin.php untuk menghubungkan navigasi admin ke konten
require '../view/nav-admin.php';

?>
<!-- Begin Page Content -->``
<br>
<div class="container-fluid">
    <div class="row mb-5 mt-4 pt-2">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <!-- DataTales Example -->
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="float-left font-weight-bold text-dark pt-2">DATA SPP SMK BINA ESSA</h5>
                    <a href="tambah-spp.php" class=" p-2 btn btn-sm btn-dark text-white float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTables" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM spp  ORDER BY tahun ASC") or die(mysqli_error($conn));
                                while ($data = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?php echo $data['tahun']; ?></td>
                                        <td class="text-center">Rp. <?php echo number_format($data["nominal"], 0, ',', '.'); ?></td>
                                        <td align="center">
                                            <?php echo ($data['status_spp'] == 'Tidak Aktif') ? 'Tidak Aktif' : 'Aktif' ?>
                                        </td>
                                        <td align="center">
                                            <div class="btn-group btn-group-md" role="group" aria-label="Basic example">
                                                <a href="edit-spp.php?id=<?php echo $data['id_spp']; ?>" class="btn btn-primary text-white" data-toggle="tooltip" data-placement="top" title="Edit?"><i class="fa fa-pencil"></i></a>
                                        <td class="text-center">
                                            <a href="hapus-spp.php?id=<?php echo $data['id_spp']; ?>" onClick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Hapus?"><i class="fa fa-trash"></i></a>
                                        </td>
                    </div>
                    </td>
                    </tr>
                <?php $no++;
                                }
                ?>
                </tbody>

                </table>
                <a href="report-spp.php" class=" p-2 btn btn-sm btn-dark text-white float-right">Cetak</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require '../view/footer.php'; ?>