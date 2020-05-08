<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nim">NRP</label>
                            <input type="text" name="nim" class="form-control" id="nim">
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Teknik Pangan">Teknik Pangan</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Planologi">Teknik Planologi</option>
                                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- Content -->

<h1 class="mt-4">Detail User</h1>
<br>
<form method="post" action="include/admin-user-update.inc.php">
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
            <label for="id_cafe" class="col-sm-2 col-form-label" >Afiliasi dengan Cafe </label>
            <div class="col-sm-8">
                <div class="form-group">

                    <select class="form-control" id="id_cafe" selected=" <?= $data['id_cafe']; ?>" name="id_cafe">
                    <?php foreach ($resultCafe['data'] as $dataCafe) :
                                if ($dataCafe['id_cafe'] == $data['id_cafe']) { ?>
                                <option value="<?= $dataCafe['id_cafe']; ?>" selected="selected"><?= $dataCafe['nm_cafe']; ?></option>
                            <?php } else { ?>

                                <option value="<?= $dataCafe['id_cafe']; ?>"><?= $dataCafe['nm_cafe']; ?></option>

                        <?php }
                            endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="password" name="password" value="<?= $data['password'];?>" placeholder="Password">
            </div>
        </div>
        <div class="col-sm-10">
            <button class="btn btn-success" type="submit" style="float:right;">Update</button>
        </div>
    <?php endforeach; ?>
</form>