<p>
    <a href="<?php echo base_url('tata_usaha/siswa/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>NAMA</th>
            <th>NIS</th>
            <th>PASSWORD</th>
            <th>NAMA</th>
            <th>NO TELPON</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($siswa as $siswa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$siswa->foto)?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $siswa->nis ?></td>
            <td><?php echo $siswa->password ?></td>
            <td><?php echo $siswa->nama_siswa ?></td>
            <td><?php echo $siswa->no_telpon ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/kelas_siswa/tambah/'.$siswa->kode_siswa) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-home"></i> Kelas</a>
                <a href="<?php echo base_url('tata_usaha/siswa/detail/'.$siswa->kode_siswa) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-eye"></i> Detail</a>
                <a href="<?php echo base_url('tata_usaha/siswa/edit/'.$siswa->kode_siswa) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>