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
            <th>TAHUN ANGKATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datasiswa as $datasiswa) { ?>
        <tr>
            <td><?php echo $datasiswa->kode_kelas ?></td>
            <td><?php echo $datasiswa->nama_jurusan ?></td>
            <td><?php echo $datasiswa->tingkat_kelas ?></td>
            <td><?php echo $datasiswa->tahun_ajar ?></td>
            <td><?php echo $datasiswa->tahun_angkatan ?></td>
            <td>
                <a href="<?php echo base_url('guru/data_siswa/siswa/'.$datasiswa->kode_kelas) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-eye"></i> Siswa</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>