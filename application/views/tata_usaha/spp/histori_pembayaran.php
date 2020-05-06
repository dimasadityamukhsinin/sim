<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/spp')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
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
            <th>JUMLAH</th>
            <th>BULAN</th>
            <th>TANGGAL BAYAR</th>
            <th>TAHUN AJARAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($siswa as $siswa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>Rp.<?php echo number_format($siswa->jumlah,'0',',','.') ?></td>
            <td><?php echo $siswa->nama_bulan ?></td>
            <td><?php echo $siswa->tanggal ?></td>
            <td><?php echo $siswa->tahun_ajar ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/spp/cetak/'.$siswa->nis) ?>" title="Cetak" target="_blank" class="btn btn-success btn-xs">
                <i class="fa fa-print"></i> Cetak</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>