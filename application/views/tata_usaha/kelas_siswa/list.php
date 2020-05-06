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
            <th>NIS</th>
            <th>NAMA</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>TAHUN ANGKATAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kelas as $kelas) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $kelas->nis ?></td>
            <td><?php echo $kelas->nama_siswa ?></td>
            <td><?php echo $kelas->tingkat_kelas ?></td>
            <td><?php echo $kelas->nama_jurusan ?></td>
            <td><?php echo $kelas->tahun_angkatan ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/kelas_siswa/edit/'.$kelas->kode_siswa) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>