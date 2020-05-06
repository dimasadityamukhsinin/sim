        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <div style="font-size: 22px; margin-top: 10px; margin-bottom: 10px;"><b><?php echo $jabatan ?></b></div>
                <p>Total Jabatan</p>
            </div>
            <div class="icon">
                <i class="ion ion-home"></i>
            </div>
            <a href="<?php echo base_url('guru/data_siswa') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

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