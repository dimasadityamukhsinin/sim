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
            <th>FOTO</th>
            <th>NIS</th>
            <th>NAMA</th>
            <th>NO TELPON</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kelas as $kelas) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$kelas->foto)?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $kelas->nis ?></td>
            <td><?php echo $kelas->nama_siswa ?></td>
            <td><?php echo $kelas->no_telpon ?></td>
            <td>
                <a href="<?php echo base_url('guru/data_siswa/spp/'.$kelas->nis) ?>" class="btn btn-success btn-xs">
                <i class="fa fa-money"></i> SPP</a>
                <a href="<?php echo base_url('guru/data_siswa/pembangunan/'.$kelas->nis) ?>" class="btn btn-info btn-xs">
                <i class="fa fa-money"></i> Pembangunan</a>
                <a href="<?php echo base_url('guru/data_siswa/edit/'.$kelas->kode_siswa) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('guru/data_siswa/detail/'.$kelas->kode_siswa) ?>" class="btn btn-info btn-xs">
                <i class="fa fa-eye"></i> Detail</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>