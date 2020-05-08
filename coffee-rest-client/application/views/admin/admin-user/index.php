<!-- Content -->
<?php
if ($this->session->flashdata('flash')) {
    ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php } else if ($this->session->flashdata('error')) {
    ?>  
    <div class="flash-data" data-flashdatae="<?= $this->session->flashdata('error'); ?>"></div>
<?php
}
?>

<h1 class="mt-4">Konfigurasi User</h1>
<div class="col-sm-4" style="float:right;">
    <a style="float:right;" href="<?= base_url(); ?>admin/insertUser" class="btn btn-primary"><b>+</b> Tambah
        Data User</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Nomor KTP</th>
            <th scope="col">Level</th>
            <th scope="col">Afiliasi <br>dengan Cafe</th>
            <th scope="col">Password</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user['data'] as $data) : ?>
            <tr>
                <th scope="row"><?= $data['id_user']; ?></th>
                <td><a href="<?= base_url(); ?>admin/detailUser/<?= $data['id_user']; ?>" style="color: inherit;"><?= $data['nama']; ?></a></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['nohp']; ?></td>
                <td><?= $data['no_ktp']; ?></td>
                <td><?= $data['id_level']; ?></td>
                <td><?= $data['id_cafe']; ?></td>
                <td><?= $data['password']; ?></td>
                <td>
                    <button class="btn btn-success" type="button" onclick="location.href='<?php echo base_url(); ?>admin/detailUser/<?= $data['id_user']; ?>'" name="id_user" value="<?= $data['id_user']; ?>">Update</button>
                    <button class="btn btn-danger" type="submit" name="id_user" value="<?= $data['id_user']; ?>" onclick="goDelete(confirm_delete('<?= $data['nama']; ?>'), '<?= $data['id_user']; ?>' )"> Delete</button>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- End Content -->

<script type="text/javascript">
    function confirm_delete(nama) {
        return confirm('Yakin ingin menghapus data ' + nama + ' ini?');
    }

    function goDelete(param, id) {
        if (param) {
            location.href = '<?php echo base_url(); ?>admin/deleteUser/' + id;
        }
    }
</script>