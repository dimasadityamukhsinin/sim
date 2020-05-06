<h3 class="text text-bold text-success">
Dana Masuk : Rp.<?php echo number_format($dana_masuk->jumlah_dana,'0',',','.') ?>
</h3>
<h3 class="text text-bold text-danger">
Dana Keluar : Rp.<?php echo number_format($dana_keluar->jumlah_dana,'0',',','.') ?>
</h3>

<h3 class="text text-bold text-info">
Total Dana : Rp.<?php echo number_format($dana_masuk->jumlah_dana - $dana_keluar->jumlah_dana,'0',',','.') ?>
</h3>

<p class="pull-right">
    <div class="btn-group pull-right">
        <a href="<?php echo base_url('tata_usaha/dana/cetak/')?>" title="Cetak" target="_blank" class="btn btn-success btn-md">
            <i class="fa fa-print"></i> Cetak
        </a>
    </div>
</p>

<p>
    <a href="<?php echo base_url('tata_usaha/dana/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>KETERANGAN</th>
            <th>JUMLAH</th>
            <th>TANGGAL</th>
            <th>JENIS</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($dana as $dana) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $dana->keterangan ?></td>
            <td><?php echo number_format($dana->jumlah_dana,'0',',','.') ?></td>
            <td><?php echo $dana->tanggal ?></td>
            <td><?php echo $dana->jenis ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/dana/detail/'.$dana->kode_dana) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-eye"></i> Detail</a>
                <a href="<?php echo base_url('tata_usaha/dana/edit/'.$dana->kode_dana) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>