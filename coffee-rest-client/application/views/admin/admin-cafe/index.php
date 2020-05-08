<!-- Content -->
<?php
if ($this->session->flashdata('flash')) {
    ?>
    <div class="flash-data" data-flashdatacafe="<?= $this->session->flashdata('flash'); ?>"></div>
<?php } else if ($this->session->flashdata('error')) {
    ?>  
    <div class="flash-data" data-flashdatacafeerror="<?= $this->session->flashdata('error'); ?>"></div>
<?php
}
?>

<h1 class="mt-4">Konfigurasi Cafe</h1>
<div class="col-sm-4" style="float:right;">
    <a style="float:right;" href="<?= base_url(); ?>admin/showInsertCafeForm" class="btn btn-primary"><b>+</b> Tambah
        Data Cafe</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID Cafe</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor WA</th>
            <th scope="col">Sisa Kursi</th>
            <th scope="col">Status Sewa</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cafe['data'] as $data) : ?>
            <tr>
                <th scope="row"><?= $data['id_cafe']; ?></th>
                <td><a href="<?= base_url(); ?>admin/detailUser/<?= $data['id_cafe']; ?>" style="color: inherit;"><?= $data['nm_cafe']; ?></a></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['no_wa']; ?></td>
                <td><?= $data['kursi_sisa']; ?> / <?= $data['kursi_max']; ?></td>
                <?php foreach ($sewa['data'] as $dataSewa) : 
                    if($dataSewa['id_status'] == $data['id_status_sewa']){
                    ?>
                <td><?= $dataSewa['nm_status']; ?></td>
                    <?php
                    }
                endforeach;
                    ?>
                <td>
                    <button class="btn btn-success" type="button" onclick="location.href='<?php echo base_url(); ?>admin/detailCafe/<?= $data['id_cafe']; ?>'" name="id_cafe" value="<?= $data['id_cafe']; ?>">Update</button>
                    <button class="btn btn-danger" type="submit" name="id_cafe" value="<?= $data['id_cafe']; ?>" onclick="goDelete(confirm_delete('<?= $data['nm_cafe']; ?>'), '<?= $data['id_cafe']; ?>' )"> Delete</button>

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
            location.href = '<?php echo base_url(); ?>admin/deleteCafe/' + id;
        }
    }
</script>