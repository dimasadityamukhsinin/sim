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
        </tr>
        <?php } ?>
    </tbody>
</table>