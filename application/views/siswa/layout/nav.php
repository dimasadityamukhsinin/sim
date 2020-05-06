<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!-- MENU DASHBOARD SISWA -->
            <li><a href="<?php echo base_url('siswa/dashboard') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>DASHBOARD</span></a></li>

            <!-- MENU QR CODE -->
            <li><a href="<?php echo base_url('siswa/qrcode') ?>"><i class="fa fa-qrcode text-aqua"></i> <span>QR CODE</span></a></li>

            <!-- MENU QR CODE -->
            <li><a href="<?php echo base_url('siswa/absensi') ?>"><i class="ion ion-person text-aqua"></i> <span>ABSENSI</span></a></li>

            <!-- MENU KEUANGAN -->
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money"></i> <span>KEUANGAN</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('siswa/spp') ?>"><i class="fa fa-angle-right"></i> <span>SPP</span></a></li>
                <li><a href="<?php echo base_url('siswa/pembangunan') ?>"><i class="fa fa-angle-right"></i> <span>Pembangunan</span></a></li>
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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">