<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-8">

            <!-- Contacts -->
            <form action="<?= base_url('sertifikasi/detail_sertifikasi'); ?>" method="post" class="sky-form">
                <header>Pengecekan Sertifikasi</header>

                <fieldset>
                    <section>
                        <label class="label">Nomor Sertifikasi</label>
                        <label class="input">
                            <i class="icon-append fa fa-database"></i>
                            <input type="text" name="no_sertifikasi" id="no_sertifikasi" value="<?= set_value('no_sertifikasi'); ?>">
                        </label>
                        <small class="form-text text-danger"><?= form_error('no_sertifikasi'); ?></small>
                    </section>
                    <div class="text-right margin-bottom-20">
                        <button type="submit" class="btn btn-primary text-right">Cek Nomor Sertifikasi</button>
                    </div>
                </fieldset>
            </form>
            <!-- Contacts -->
        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->