<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/pembangunan')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

<div class="row col-xs-12">
    <div>
        <h4 class="text text-bold text-success">
        Total Pembayaran : Rp.<?php echo number_format($total_dana->jumlah,'0',',','.') ?>
        </h4>
        <h4 class="text text-bold text-warning">
        Sisa Pembayaran : Rp.<?php echo number_format($sisa_pmb->jumlah,'0',',','.') ?>
        </h4>
    </div>
</div>

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
            <th>TANGGAL BAYAR</th>
            <th>TAHUN AJARAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($siswa as $siswa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>Rp.<?php echo number_format($siswa->jumlah_bayar,'0',',','.') ?></td>
            <td><?php echo $siswa->tanggal ?></td>
            <td><?php echo $siswa->tahun_ajaran ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/pembangunan/cetak/'.$siswa->nis) ?>" class="btn btn-success btn-xs" target="_blank">
                <i class="fa fa-print"></i> Cetak</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>