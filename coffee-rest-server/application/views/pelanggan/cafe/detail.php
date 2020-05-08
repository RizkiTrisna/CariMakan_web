<?php foreach ($cafe as $dataCafe) : ?>
    <!-- ##### Breadcumb Area Start ##### -->
    <!-- <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>css/pelanggan/img/bg-img/bg-cafe.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Kenali Cafe-nya Lebih Dekat</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>upload/product/<?= $dataCafe['gambar']; ?>">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2><?= $dataCafe['nm_cafe']; ?></h2>
                        <p>“Jika kamu hanya ingin sekedar singgah, beri aku kopi, jangan beri aku hati.” —Unkown</p>
                        <!-- <a href="" class="btn delicious-btn">Discover all the receipies</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <div class="receipe-post-area section-padding-80">

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">

                        <h2><?= $dataCafe['nm_cafe']; ?></h2>
                        <hr>
                        <h6><?= $dataCafe['alamat']; ?></h6>
                        <h6><i class="fa fa-whatsapp" aria-hidden="true"></i><a onclick="window.open('https://wa.me/<?= $dataCafe['no_wa']; ?>');" href="#"><?= $dataCafe['no_wa']; ?></a></h6>
                        <h6>Buka mulai <?= $dataCafe['jam_buka']; ?>.00 - <?= $dataCafe['jam_tutup']; ?>.00 WIB</h6>
                        <h6>Booking tempat mulai Rp. <?= $dataCafe['harga_sewa_per_kursi']; ?> - Rp. <?= $dataCafe['harga_sewa_cafe']; ?></h6>

                    </div>

                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <div class="receipe-duration">
                                <h6>Fasilitas</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                            <p><?= nl2br($dataCafe['fasilitas']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <div class="receipe-duration">
                                <h6>Daftar Menu</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                            <p><?= nl2br($dataCafe['daftar_menu']); ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <div class="receipe-duration">
                                <h6>Kursi Tersedia</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                            <p>Sisa Kursi : <?= nl2br($dataCafe['kursi_sisa']); ?> dari <?= nl2br($dataCafe['kursi_max']); ?> </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <button type="button" onclick="window.open('https://wa.me/<?= $dataCafe['no_wa']; ?>');" class="btn btn-primary btn-lg btn-block">
                        <img src="<?= base_url(); ?>css/pelanggan/img/core-img/wa-icon-48.png" alt="">Hubungi CP <?= $dataCafe['nm_cafe']; ?></button>

                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>