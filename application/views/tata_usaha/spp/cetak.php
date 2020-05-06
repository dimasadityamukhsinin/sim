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
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
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
    <div style=" border: 3px solid;">
        <center>
            <h3><b>
                BUKTI PEMBAYARAN DANA PENDIDIKAN
                <br><?php echo $konfigurasi->nama_sekolah ?>
                <br><center><?php  echo $siswa->tahun_ajar ?></center>
                </b>
            </h3>
        </center>
        <br>
        <div style="padding-left: 150px;">
            <p>
                <table>
                    <tr>
                        <td>Diterima dari</td>
                        <td>: <?php echo $siswa->nama_siswa ?></td>
                    </tr>
                    <tr>
                        <td>Uang Sejumlah</td>
                        <td>: Rp.<?php echo number_format($siswa->jumlah,'0',',','.') ?></td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Untuk Pembayaran : </td>
                    </tr>
                    <tr>
                        <td>- SPP</td>
                        <td>: Rp.<?php echo number_format($siswa->jumlah,'0',',','.') ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="text-align: right">
                                <p>
                                    <div style="margin-right: -400px; margin-top: -20px">Pekanbaru, <?php echo $siswa->tanggal ?> </div>
                                    <br><div style="margin-right: -350px; margin-top: -20px">Staf Keuangan</div>
                                    <br>
                                    <br>
                                    <br><div style="margin-right: -397px; margin-top: -30px"><u><?php echo $this->session->userdata('nama_administrasi') ?></u></div>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </p>
        </div>
    </div>    
</body>
</html>