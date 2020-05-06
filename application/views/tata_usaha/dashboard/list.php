    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <div style="font-size: 22px; margin-top: 10px; margin-bottom: 10px;"><b>Rp.<?php echo number_format($dana_masuk->jumlah_dana - $dana_keluar->jumlah_dana,'0',',','.') ?></b></div>
                <p>Total Dana</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('tata_usaha/dana') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $hitung_siswa ?></h3>
                <p>Total Siswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('tata_usaha/siswa') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $hitung_guru ?></h3>
                <p>Total Guru</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('tata_usaha/guru') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $kelas ?></h3>
                <p>Total Kelas</p>
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="<?php echo base_url('tata_usaha/jabatan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <?php foreach($catatan as $catatan) { ?>
            <!-- The time line -->
            <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                <span class="bg-red">
                <?php echo $catatan->tanggal ?>
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-table bg-blue"></i>
                <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $catatan->jam ?></span>
                <h3 class="timeline-header"><a><?php echo $catatan->judul_catatan ?></a><?php $catatan->judul_catatan ?></h3>
                <div class="timeline-body">
                    <?php echo $catatan->isi ?>
                </div>
                <div class="timeline-footer">
                    <a href="<?php echo base_url('tata_usaha/catatan/detail/'.$catatan->kode_catatan) ?>" class="btn btn-primary btn-xs">Selengkapnya</a>
                    <a href="<?php echo base_url('tata_usaha/catatan/delete/'.$catatan->kode_catatan) ?>" class="btn btn-danger btn-xs">Hapus</a>
                </div>
                </div>
            </li>
            <?php } ?>
            <!-- END timeline item -->
            <li>
                <i class="fa fa-clock-o bg-gray"></i>
            </li>
            </ul>
        </div><!-- /.col -->
    </div><!-- /.row -->