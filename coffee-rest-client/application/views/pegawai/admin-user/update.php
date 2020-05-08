<!-- Content -->

<h1 class="mt-4">Detail User</h1>
<br>

<form method="post" action="<?= base_url(); ?>admin/updateUser">
    <?php foreach ($resultUser['data'] as $data) : ?>

        <div class="form-group row">
            <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user']; ?>" placeholder="ID User">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>" placeholder="Nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" placeholder="Example@gmail.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="nohp" class="col-sm-2 col-form-label">Nomor HP(+62)</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $data['nohp']; ?>" placeholder="Nomor HP">
            </div>
        </div>
        <div class="form-group row">
            <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="no_ktp" name="no_ktp" value="<?= $data['no_ktp']; ?>" placeholder="Nomor KTP">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">ALamat </label>
            <div class="col-sm-8">
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"><?= $data['alamat']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_level" class="col-sm-2 col-form-label">Level User</label>
            <div class="col-sm-8">
                <div class="form-group">
                    <select class="form-control" id="id_level" name="id_level">

                        <?php foreach ($resultLevel['data'] as $dataLevel) :
                                if ($dataLevel['id_level'] == $data['id_level']) { ?>
                                <option value="<?= $dataLevel['id_level']; ?>" selected="selected"><?= $dataLevel['nm_level']; ?></option>
                            <?php } else { ?>

                                <option value="<?= $dataLevel['id_level']; ?>"><?= $dataLevel['nm_level']; ?></option>

                        <?php }
                            endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="id_cafe" class="col-sm-2 col-form-label">Afiliasi dengan Cafe </label>
            <div class="col-sm-8">
                <div class="form-group">
                    <?php if ($data['id_cafe'] === null) {
                            ?>
                        <select class="form-control" id="id_cafe" selected="0" name="id_cafe">
                            <option value="0" selected="selected">Tidak Ada</option>
                            <?php foreach ($resultCafe['data'] as $dataCafe) :
                                        if ($dataCafe['id_cafe'] == $data['id_cafe']) { ?>
                                    <option value="<?= $dataCafe['id_cafe']; ?>" selected="selected"><?= $dataCafe['nm_cafe']; ?></option>
                                <?php } else { ?>

                                    <option value="<?= $dataCafe['id_cafe']; ?>"><?= $dataCafe['nm_cafe']; ?></option>

                            <?php }
                                    endforeach; ?>
                        <?php
                            } else {
                                ?>
                            <select class="form-control" id="id_cafe" selected=" <?= $data['id_cafe']; ?>" name="id_cafe">
                            
                            <option value="0" selected="selected">Tidak Ada</option>
                                <?php foreach ($resultCafe['data'] as $dataCafe) :
                                            if ($dataCafe['id_cafe'] == $data['id_cafe']) { ?>
                                        <option value="<?= $dataCafe['id_cafe']; ?>" selected="selected"><?= $dataCafe['nm_cafe']; ?></option>
                                    <?php } else { ?>

                                        <option value="<?= $dataCafe['id_cafe']; ?>"><?= $dataCafe['nm_cafe']; ?></option>

                                <?php }
                                        endforeach; ?>
                            <?php
                                } ?>

                            </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="password" name="password" value="<?= $data['password']; ?>" placeholder="Password">
            </div>
        </div>
        <div class="col-sm-10">
            <button class="btn btn-success" type="submit" style="float:right;">Update</button>
        </div>
    <?php endforeach; ?>
</form>


<!-- End Content -->