<p>
    <a href="<?php echo base_url('tata_usaha/jurusan/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>NAMA JURUSAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($jurusan as $jurusan) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $jurusan->nama_jurusan ?></td>
            <td>Rp<?php echo number_format($jurusan->jumlah,'0',',','.') ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/jurusan/edit/'.$jurusan->kode_jurusan) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>