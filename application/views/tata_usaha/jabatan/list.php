<p>
    <a href="<?php echo base_url('tata_usaha/jabatan/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>KODE KELAS</th>
            <th>JURUSAN</th>
            <th>TINGKAT KELAS</th>
            <th>TAHUN AJAR</th>
            <th>NAMA GURU</th>
            <th>TAHUN ANGKATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($jabatan as $jabatan) { ?>
        <tr>
            <td><?php echo $jabatan->kode_kelas ?></td>
            <td><?php echo $jabatan->nama_jurusan ?></td>
            <td><?php echo $jabatan->tingkat_kelas ?></td>
            <td><?php echo $jabatan->tahun_ajar ?></td>
            <td><?php echo $jabatan->nama_guru ?></td>
            <td><?php echo $jabatan->tahun_angkatan ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/jabatan/edit/'.$jabatan->kode_kelas) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>