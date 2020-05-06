<p>
    <a href="<?php echo base_url('tata_usaha/guru/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p>

<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>FOTO</th>
            <th>NIP</th>
            <th>PASSWORD</th>
            <th>NAMA</th>
            <th>NO TELPON</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($guru as $guru) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$guru->foto)?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $guru->nip ?></td>
            <td><?php echo $guru->password ?></td>
            <td><?php echo $guru->nama_guru ?></td>
            <td><?php echo $guru->no_telpon ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/guru/detail/'.$guru->kode_guru) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-eye"></i> Detail</a>
                <br><a href="<?php echo base_url('tata_usaha/guru/edit/'.$guru->kode_guru) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <br><?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>