    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Review Cafe</h3>
                    </div>
                </div>
            </div>
            <?php
            $countSingleReceipt = 0;
            foreach ($review['data'] as $dataReview) : ?>
                <div class="row">

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-8">
                        <div class="single-small-receipe-area d-flex">

                            <div class="receipe-content">




                                <?php foreach ($cafe['data'] as $dataCafe) :
                                        if ($dataCafe['id_cafe'] == $dataReview['id_cafe']) {
                                            ?>
                                        <h5> <?= $dataCafe['nm_cafe']; ?> - <?= $dataReview['judul']; ?></h5>

                                        <p>Dari: <?= $dataReview['nama'] ?> </p>
                                        <p>Cafe Direview: <?= $dataCafe['nm_cafe']; ?></p>

                                <?php }
                                    endforeach; ?>
                                <p>Komentar: <?= $dataReview['review']; ?></p>

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

    <!-- ##### Top Catagory Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">


            <div class="row">
                <div class="section-heading text-left">
                    <h3>Berikan Penilaianmu Terhadap Cafe yang Lain</h3>
                </div>
            </div>

            <div class="row">
                <div class="contact-form-area">
                    <form action="<?= base_url(); ?>pelanggan/insertReview" method="post">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <input type="text" class="form-control" name="nama" id="name" placeholder="Name">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">

                                    <select class="form-control" id="id_cafe" selected="0" name="id_cafe">
                                        <option value="0" selected="selected">Tidak Ada</option>
                                        <?php foreach ($cafe['data'] as $dataCafe) : ?>
                                            <option value="<?= $dataCafe['id_cafe']; ?>"><?= $dataCafe['nm_cafe']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" id="subject" name="judul" placeholder="Subject">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" id="message" name="review" cols="30" rows="10" placeholder="Review"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <!-- ##### Top Catagory Area End ##### -->