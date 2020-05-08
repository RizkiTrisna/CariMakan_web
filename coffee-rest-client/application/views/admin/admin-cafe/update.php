<!-- Content -->

<h1 class="mt-4">Update Data Cafe</h1>
<br>
<?php foreach($resultCafe['data'] as $data) :?>
<form method="post" action="<?= base_url(); ?>admin/updateCafe">
    <div class="form-group row">
        <label for="id_cafe" class="col-sm-2 col-form-label">ID Cafe</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="id_cafe" name="id_cafe" value="<?=$data['id_cafe'] ?>" placeholder="ID Cafe">
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Cafe</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nm_cafe" value="<?=$data['nm_cafe'] ?>" placeholder="Nama Cafe ">
        </div>
    </div>
    <div class="form-group row">
        <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3"><?=$data['fasilitas'] ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="daftar_menu" class="col-sm-2 col-form-label">Daftar Menu</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="daftar_menu" name="daftar_menu" rows="3"><?=$data['daftar_menu'] ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="jam_buka" class="col-sm-2 col-form-label">Jam Buka</label>
        <div class="col-sm-1">
            <div class="form-group">
                <select class="form-control" id="jam_buka" name="jam_buka">

                    <?php for ($x = 1; $x <= 24; $x++) : ?>

                        <option value="<?= $x; ?>:00"><?= $x; ?>:00</option>

                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <label for="jam_tutup" class="col-sm-1 col-form-label">Jam Tutup</label>
        <div class="col-sm-1">
            <div class="form-group">
                <select class="form-control" id="jam_tutup" name="jam_tutup">

                    <?php for ($x = 1; $x <= 24; $x++) : ?>

                        <option value="<?= $x; ?>:00"><?= $x; ?>:00</option>

                    <?php endfor; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Cafe</label>
        <div class="col-sm-8">
            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?=$data['alamat'] ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="no_wa" class="col-sm-2 col-form-label">Nomor WA (+62)</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" value="<?=$data['no_wa'] ?>" id="no_wa" name="no_wa">
        </div>
    </div>

    <div class="form-group row">
        <label for="kursi_sisa" class="col-sm-2 col-form-label">Kursi Tersisa</label>
        <div class="col-sm-1">
            <div class="form-group">
                <input type="number" class="form-control" id="kursi_sisa" value="<?=$data['kursi_sisa'] ?>" name="kursi_sisa">
            </div>
        </div>

        <label for="kursi_max" class="col-sm-0 col-form-label">dari</label>
        <div class="col-sm-1">
            <div class="form-group">
                <input type="number" class="form-control" id="kursi_max" value="<?=$data['id_cafe'] ?>" name="kursi_max">
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="status_sewa" class="col-sm-2 col-form-label">Apakah cafe sedang disewa?</label>
        <div class="col-sm-8">
            <div class="form-group">

                <select class="form-control" id="status_sewa" selected="0" name="id_status_sewa">
                    <?php foreach ($resultStatus['data'] as $dataStatus) : ?>
                        <option value="<?= $dataStatus['id_status']; ?>"><?= $dataStatus['nm_status']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga_sewa_per_kursi" class="col-sm-2 col-form-label">Harga sewa/kursi (Rp)</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="harga_sewa_per_kursi" value="<?=$data['harga_sewa_per_kursi'] ?>" name="harga_sewa_per_kursi">
        </div>
    </div>

    <div class="form-group row">
        <label for="harga_sewa_cafe" class="col-sm-2 col-form-label">Harga sewa Cafe (Rp)</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="harga_sewa_cafe" value="<?=$data['harga_sewa_cafe'] ?>" name="harga_sewa_cafe">
        </div>
    </div>

    <div class="form-group row">
        <label for="gambar" class="col-sm-2 col-form-label">Upload gambar</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="gambar" value="<?=$data['gambar'] ?>" name="gambar">
        </div>
    </div>

    <div class="col-sm-10">
        <button class="btn btn-success" type="submit" style="float:right;">Update Cafe</button>
    </div>
</form>
                    <?php endforeach;?>

<!-- End Content -->