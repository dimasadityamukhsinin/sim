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
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($siswa as $siswa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>Rp.<?php echo number_format($siswa->jumlah_bayar,'0',',','.') ?></td>
            <td><?php echo $siswa->tanggal ?></td>
            <td><?php echo $siswa->tahun_ajaran ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>