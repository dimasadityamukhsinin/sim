<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!-- MENU DASHBOARD TATA USAHA -->
            <li><a href="<?php echo base_url('tata_usaha/dashboard') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

            <!-- MENU CATATAN -->
            <li><a href="<?php echo base_url('tata_usaha/catatan') ?>"><i class="fa fa-table text-aqua"></i> <span>CATATAN</span></a></li>

            <!-- MENU QR CODE -->
            <li><a href="<?php echo base_url('tata_usaha/qrcode') ?>"><i class="fa fa-qrcode text-aqua"></i> <span>QR CODE</span></a></li>

            <!-- MENU TAHUN AJARAN -->
            <li><a href="<?php echo base_url('tata_usaha/tahun_ajaran') ?>"><i class="fa fa-table text-aqua"></i> <span>TAHUN AJARAN</span></a></li>
            
            <!-- MENU MASTER ABSEN -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-eye"></i> <span>MASTER ABSEN</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('tata_usaha/absen_administrasi') ?>"><i class="fa fa-angle-right"></i> <span>Absen Administrasi</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/absen_siswa') ?>"><i class="fa fa-angle-right"></i> <span>Absen Siswa</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/absen_guru') ?>"><i class="fa fa-angle-right"></i> <span>Absen Guru</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/absen_administrasi/laporan')?>"><i class="fa fa-angle-right"></i> Laporan Absen Administrasi</a></li>
                <li><a href="<?php echo base_url('tata_usaha/absen_siswa/laporan')?>"><i class="fa fa-angle-right"></i> Laporan Absen Siswa</a></li>
                <li><a href="<?php echo base_url('tata_usaha/absen_guru/laporan')?>"><i class="fa fa-angle-right"></i> Laporan Absen Guru</a></li>
              </ul>
            </li>
            
            <!-- MENU MASTER DATA -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>MASTER DATA</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('tata_usaha/guru') ?>"><i class="fa fa-angle-right"></i> <span>Guru</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/siswa') ?>"><i class="fa fa-angle-right"></i> <span>Siswa</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/kelas_siswa') ?>"><i class="fa fa-angle-right"></i> <span>Kelas</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/jabatan')?>"><i class="fa fa-angle-right"></i> Jabatan Guru</a></li>
                <li><a href="<?php echo base_url('tata_usaha/jurusan')?>"><i class="fa fa-angle-right"></i> Kategori Jurusan</a></li>
              </ul>
            </li>
            
            <!-- MENU KEUANGAN -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i> <span>KEUANGAN</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('tata_usaha/spp') ?>"><i class="fa fa-angle-right"></i> <span>SPP</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/pembangunan') ?>"><i class="fa fa-angle-right"></i> <span>Pembangunan</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/kategori_spp') ?>"><i class="fa fa-angle-right"></i> <span>Kategori SPP</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/kategori_pmb') ?>"><i class="fa fa-angle-right"></i> <span>Kategori Pembangunan</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/dana')?>"><i class="fa fa-angle-right"></i> Dana</a></li>
              </ul>
            </li>

            <!-- MENU KONFIGURASI -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>KONFIGURASI</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('tata_usaha/konfigurasi') ?>"><i class="fa fa-angle-right"></i> <span>Konfigurasi Umum</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/konfigurasi/gambar') ?>"><i class="fa fa-angle-right"></i> <span>Konfigurasi Gambar</span></a></li>
                <li><a href="<?php echo base_url('tata_usaha/konfigurasi/icon') ?>"><i class="fa fa-angle-right"></i> <span>Konfigurasi Icon</span></a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('tata_usaha/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">