<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/absen_administrasi')?>" title="Kembali" class="btn btn-info btn-md">
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
            <th>JAM</th>
            <th>TANGGAL</th>
            <th>METODE</th>
            <th>STATUS KEHADIRAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($absen as $absen) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $absen->jam ?></td>
            <td><?php echo $absen->tanggal ?></td>
            <td><?php echo $absen->isi_metode ?></td>
            <td><?php echo $absen->status_kehadiran ?></td>
            <td>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>