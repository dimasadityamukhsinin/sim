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
            <th>TAHUN AJARAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($tahun_ajaran as $tahun_ajaran) { ?>
        <tr>
            <td><?php echo $tahun_ajaran->tahun_ajar ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/laporan/lihat/'.$tahun_ajaran->tahun_ajar) ?>" class="btn btn-info btn-md">
                <i class="fa fa-eye"></i> Lihat</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>