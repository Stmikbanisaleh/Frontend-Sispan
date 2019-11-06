<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <h5 class="title-v4">Panduan</h5>
        <!-- Main Content -->
        <div class="col-lg-10">
            <?php foreach ($dokpanduan as $dp) { ?>
                <hr class="hr-xl">
                <h2><?= $dp['NAMA'] ?></h2>
                <object data="<?= base_url() ?>assets/document/panduan/<?= $dp['NAMA_FILE'] ?>" type="application/pdf" width="100%" height="800px">
                </object>
                <hr class="hr-xl">
            <?php } ?>
        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->