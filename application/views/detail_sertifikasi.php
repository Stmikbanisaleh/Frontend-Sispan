<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <h5 class="title-v4">Detail Sertifikasi</h5>
        <!-- Main Content -->
        <div class="col-lg-8">
            <?php if ($sertifikasi) { ?>
                <table class="table">
                    <tr>
                        <td><b>No Sertifikasi</b></td>
                        <td><?= $sertifikasi['no_sertifikasi']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Nama Sertifikasi</b></td>
                        <td><?= $sertifikasi['nama']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Keterangan</b></td>
                        <td><?= $sertifikasi['keterangan']; ?></td>
                    </tr>
                </table>
            <?php } else { ?>
                <h3>Data tidak ditemukan!</h3> <br>
                <a href="<?= base_url('sertifikasi/cek_sertifikasi') ?>" class="btn btn-sm btn-primary">
                    <li class="fa fa-arrow-circle-left"></li>
                    Kembali
                </a> <?php } ?> </div> <!-- End Main Content -->
    </div>
</div>
<!--=== End Container Part ===-->