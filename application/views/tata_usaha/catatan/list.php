<p>
    <a href="<?php echo base_url('tata_usaha/catatan/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>JUDUL</th>
            <th>TANGGAL</th>
            <th>JAM</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($catatan as $catatan) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $catatan->judul_catatan ?></td>
            <td><?php echo $catatan->tanggal ?></td>
            <td><?php echo $catatan->jam ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/catatan/detail/'.$catatan->kode_catatan) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-eye"></i> Detail</a>
                <a href="<?php echo base_url('tata_usaha/catatan/edit/'.$catatan->kode_catatan) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>