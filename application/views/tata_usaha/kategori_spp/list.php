<p>
    <a href="<?php echo base_url('tata_usaha/kategori_spp/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>JENIS PEMBAYARAN</th>
            <th>JUMLAH</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kategori as $kategori) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $kategori->jenis_bayar ?></td>
            <td>Rp<?php echo number_format($kategori->jumlah,'0',',','.') ?></td>
            <td>
                <a href="<?php echo base_url('tata_usaha/kategori_spp/edit/'.$kategori->kode_bayar) ?>" class="btn btn-warning btn-xs">
                <i class="fa fa-edit"></i> Edit</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>