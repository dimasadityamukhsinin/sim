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
            <th>JURUSAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($siswa as $siswa) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $siswa->nis ?></td>
            <td><?php echo $siswa->nama_siswa ?></td>
            <td><?php echo $siswa->nama_jurusan ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/spp/tambah/'.$siswa->nis) ?>" class="btn btn-success btn-sm">
                <i class="fa fa-plus"></i> Tambah</a>
                <a href="<?php echo base_url('tata_usaha/spp/histori_pembayaran/'.$siswa->nis) ?>" class="btn btn-info btn-sm">
                <i class="fa fa-eye"></i> Riwayat</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>