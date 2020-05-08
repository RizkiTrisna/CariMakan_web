<!-- Content -->

<h1 class="mt-4">Insert User</h1>   
<br>
<form method="post" action="<?= base_url(); ?>admin/insertUser">
    <div class="form-group row">
        <label for="id_user" class="col-sm-2 col-form-label">ID User</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="id_user" name="id_user" placeholder="ID User">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" placeholder="Example@gmail.com">
        </div>
    </div>
    <div class="form-group row">
        <label for="nohp" class="col-sm-2 col-form-label">Nomor HP(+62)</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
        </div>
    </div>
    <div class="form-group row">
        <label for="no_ktp" class="col-sm-2 col-form-label">Nomor KTP</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor KTP">
        </div>
    </div>
    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
        <div class="col-sm-8">
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="id_level" class="col-sm-2 col-form-label">Level User</label>
        <div class="col-sm-8">
            <div class="form-group">
                <select class="form-control" id="id_level" name="id_level">

                    <?php foreach ($resultLevel as $dataLevel) : ?>

                        <option value="<?= $dataLevel['id_level']; ?>"><?= $dataLevel['nm_level']; ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="id_cafe" class="col-sm-2 col-form-label">Afiliasi dengan Cafe </label>
        <div class="col-sm-8">
            <div class="form-group">

                <select class="form-control" id="id_cafe" selected="0" name="id_cafe">
                    <option value="0" selected="selected">Tidak Ada</option>
                    <?php foreach ($resultCafe as $dataCafe) : ?>
                        <option value="<?= $dataCafe['id_cafe']; ?>"><?= $dataCafe['nm_cafe']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password </label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="col-sm-10">
        <button class="btn btn-success" type="submit" style="float:right;">Tambah User</button>
    </div>
</form>


<!-- End Content -->