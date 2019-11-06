<!--=== Container Part ===-->
<div class="container margin-bottom-40 margin-top-20">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-6">
            <form class="sky-form">
                <header>Tentang Kami</header>

                <fieldset>
                    <div class="row">
                        <h3>
                            Visi
                        </h3>
                    </div>

                    <div class="row">
                        <h5>
                            PUSAT UNGULAN PENERBANGAN DAN ANTARIKSA UNTUK MEWUJUDKAN INDONESIA YANG MAJU DAN MANDIRI
                        </h5>
                    </div>

                    <div class="row">
                        <h3>
                            Misi
                        </h3>
                    </div>

                    <div class="row">
                        <h5>
                            Meningkatkan kualitas litbang penerbangan dan antariksa bertaraf internasional.<br>
                            Meningkatkan kualitas produk teknologi dan informasi di bidang penerbangan dan antariksa dalam memecahkan permasalahan nasional.<br>
                            Melaksanakan dan mengatur penyelenggaraan keantariksaan untuk kepentingan nasional.
                        </h5>
                    </div>
                    <div class="margin-top-20">
                        <div class="row ">
                            <h5>
                                <li class="fa fa-building"></li>
                                Jalan Pemuda Persil No.1
                                Rawamangun, Jakarta 13220
                            </h5>
                        </div>
                        <div class="row">
                            <h5>
                                <li class="fa fa-phone-square"></li>
                                +62-21 489 2802
                            </h5>
                        </div>
                        <div class="row">
                            <h5>
                                <li class="fa fa-envelope"></li>
                                pusispan@lapan.go.id
                            </h5>
                        </div>
                    </div>

                </fieldset>

            </form>
        </div>
        <div class="col-md-6">

            <!-- Contacts -->
            <form action="<?= base_url('tentang/save_message'); ?>" method="post" class="sky-form">
                <header>Hubungi Kami</header>

                <fieldset>

                    <div class="row">
                        <?= $this->session->flashdata('message'); ?>
                        <section class="col col-6">
                            <label class="label">Nama</label>
                            <label class="input">
                                <i class="icon-append fa fa-user"></i>
                                <input type="text" name="name" id="name" value="<?= set_value('name'); ?>">
                            </label>
                            <small class="form-text text-danger"><?= form_error('name'); ?></small>
                        </section>
                        <section class="col col-6">
                            <label class="label">E-mail</label>
                            <label class="input">
                                <i class="icon-append fa fa-envelope-o"></i>
                                <input type="email" name="email" id="email" value="<?= set_value('email'); ?>">
                            </label>
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </section>
                    </div>

                    <section>
                        <label class="label">Subjek</label>
                        <label class="input">
                            <i class="icon-append fa fa-tag"></i>
                            <input type="text" name="subject" id="subject" value="<?= set_value('subject'); ?>">
                        </label>
                    </section>

                    <section>
                        <label class="label">Isi Pesan</label>
                        <label class="textarea">
                            <i class="icon-append fa fa-comment"></i>
                            <textarea rows="4" name="message" id="message"><?= set_value('message'); ?></textarea>
                        </label>
                        <small class="form-text text-danger"><?= form_error('message'); ?></small>
                    </section>
                </fieldset>

                <footer>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </footer>

                <div class="message">
                    <i class="rounded-x fa fa-check"></i>
                    <p>Your message was successfully sent!</p>
                </div>
            </form>
            <!-- Contacts -->
        </div>
        <!-- End Main Content -->

    </div>
</div>
<!--=== End Container Part ===-->