<div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <div style="font-size: 22px; margin-top: 10px; margin-bottom: 10px;"><b>Rp.<?php echo number_format($total_pmb->jumlah,'0',',','.') ?></b></div>
                <p>Total Pembangunan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('siswa/pembangunan') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $total_kehadiran ?></h3>
                <p>Total Kehadiran</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url('siswa/absensi') ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
</div>