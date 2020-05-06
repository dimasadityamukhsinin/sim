<p>
    <a href="<?php echo base_url('tata_usaha/tahun_ajaran/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah
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
            <th>TAHUN AJARAN</th>
            <th>TANGGAL MULAI</th>
            <th>TANGGAL AKHIR</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($tahun_ajaran as $tahun_ajaran) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $tahun_ajaran->tahun_ajar ?></td>
            <td><?php echo $tahun_ajaran->tgl_mulai ?></td>
            <td><?php echo $tahun_ajaran->tgl_akhir ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/tahun_ajaran/edit/'.$tahun_ajaran->kode_ajaran) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>