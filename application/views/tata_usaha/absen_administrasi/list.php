<p>
    <a href="<?php echo base_url('absen_administrasi') ?>" class="btn btn-success btn-lg" target="_blank">
        <i class="fa fa-eye"></i> Absen
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
            <th>Nama</th>
            <th>NIP</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($administrasi as $administrasi) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $administrasi->nama_administrasi ?></td>
            <td><?php echo $administrasi->nip ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/absen_administrasi/tambah/'.$administrasi->nip) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-plus"></i> Tambah</a>
                <a href="<?php echo base_url('tata_usaha/absen_administrasi/riwayat/'.$administrasi->nip) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-eye"></i> Riwayat</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>