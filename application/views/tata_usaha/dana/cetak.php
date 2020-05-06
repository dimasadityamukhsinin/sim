<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="print">
    </style>
</head>
<body onload="print()">
    <center>
        <center>
            <img src="<?php echo base_url('assets/upload/image/smklabor.png')?>" class="img img-responsive img-thumbnail" width="13%">
            <font face="verdana">
                <h3>YAYASAN UNIVERSITAS RIAU
                <br>SEKOLAH MENENGAH KEJURUAN (SMK) LABOR BINAAN FKIP UNRI
                <br>PEKANBARU
                </h3>
            </font>
        <center><table  class="table table-bordered">
            <tr>
                <th>
                    <b>NO</b>
                </th>
                <th>
                    <b>KETERANGAN</b>
                </th>
                <th>
                    <b>JUMLAH</b>
                </th>
                <th>
                    <b>TANGGAL</b>
                </th>
                <th>
                    <b>JENIS</b>
                </th>
            </tr>
            <?php $no=1; foreach($dana as $dana) { ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $dana->keterangan ?>
                </td>
                <td>
                    Rp<?php echo number_format($dana->jumlah_dana,'0',',','.') ?>
                </td>
                <td>
                    <?php echo $dana->tanggal ?>
                </td>
                <td>
                    <?php echo $dana->jenis ?>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="4">
                    <center><h4 class="text-bold">TOTAL DANA MASUK</h4></center>
                </td>
                <td>
                    <center><h4 class="text-bold">Rp.<?php echo number_format($dana_masuk->jumlah_dana,'0',',','.') ?></h4></center>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <center><h4 class="text-bold">TOTAL DANA KELUAR</h4></center>
                </td>
                <td>
                    <center><h4 class="text-bold">Rp.<?php echo number_format($dana_keluar->jumlah_dana,'0',',','.') ?></h4></center>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <center><h4 class="text-bold">SISA DANA</h4></center>
                </td>
                <td>
                    <center><h4 class="text-bold">Rp<?php echo number_format($dana_masuk->jumlah_dana - $dana_keluar->jumlah_dana,'0',',','.') ?></h4></center>
                </td>
            </tr>s
        </table>
        <div style="text-align: right">
            <p>
                <div style=" margin-top: 5px; ">Pekanbaru, <?php echo $dana->tanggal ?> </div>
                <br><div style=" margin-top: -25px">Staf Keuangan</div>
                <br>
                <br>
                <br><div style=" margin-top: -15px"><u><?php echo $this->session->userdata('nama_administrasi') ?></u></div>
            </p>
        </div>
    </center>
</body>
</html>