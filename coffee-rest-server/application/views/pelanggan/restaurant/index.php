        <!-- ##### CTA Area Start ##### -->
        <section class="cta-area bg-img bg-overlay" style="background-image: url(<?= base_url(); ?>css/pelanggan/img/bg-img/bg4.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Cta Content -->
                        <div class="cta-content text-center">
                            <h2>Temukan Restaurant Terbaikmu</h2>
                            <p>“One cannot think well, love well, sleep well, if one has not dined well.” —Virginia Woolf</p>
                            <!-- <a href="" class="btn delicious-btn">Discover all the receipies</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### CTA Area End ##### -->
        <!-- ##### Small Receipe Area Start ##### -->
        <section class="small-receipe-area section-padding-80-0">
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Daftar Restaurant</h3>
                    </div>
                </div>
            </div>
                <?php
                $countSingleReceipt = 0;
                foreach ($restaurant as $dataRestaurant) : ?>
                    <div class="row">

                        <!-- Small Receipe Area -->
                        <div class="col-12 col-sm-6 col-lg-8">
                            <div class="single-small-receipe-area d-flex">
                                <!-- Receipe Thumb -->
                                <div class="receipe-thumb">
                                    <img src="<?= base_url(); ?>upload/product/<?= $dataRestaurant['gambar']; ?>" alt="">
                                </div>
                                <!-- Receipe Content -->
                                <div class="receipe-content">
                                    <a href="<?= base_url(); ?>pelanggan/detailRestaurant/<?=$dataRestaurant['id_restaurant'];?>">
                                        <h5><?= $dataRestaurant['nm_restaurant']; ?></h5>
                                    </a>
                                    <!-- <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div> -->
                                    <p>Buka mulai <?= $dataRestaurant['jam_buka'] . ".00 -" . $dataRestaurant['jam_tutup'] . ".00"; ?> WIB</p>
                                    <p><?= $dataRestaurant['alamat']; ?></p>
                                    <p>Harga Sewa Tempat: Rp. <?= $dataRestaurant['harga_sewa_per_kursi'] . " - Rp. " . $dataRestaurant['harga_sewa_restaurant'] . ""; ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php
                    if (++$countSingleReceipt == 9) {
                        break;
                    }
                endforeach; ?>
            </div>
        </section>
        <!-- ##### Small Receipe Area End ##### -->