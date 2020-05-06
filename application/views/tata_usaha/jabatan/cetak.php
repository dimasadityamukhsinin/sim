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
    <center>
        <center>
            <img src="<?php echo base_url('assets/upload/image/smklabor.png')?>" class="img img-responsive img-thumbnail" width="13%">
            <font face="verdana">
                <h3>YAYASAN UNIVERSITAS RIAU
                <br>SEKOLAH MENENGAH KEJURUAN (SMK) LABOR BINAAN FKIP UNRI
                <br>PEKANBARU
                </h3>
            </font>
        <center><table border="1">
            <tr>
                <th>
                    <b>NO</b>
                </th>
                <th>
                    <b>NIS</b>
                </th>
                <th>
                    <b>NAMA</b>
                </th>
            </tr>
            <?php $no=1; foreach($siswa as $siswa) { ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $siswa->nis ?>
                </td>
                <td>
                    <?php echo $siswa->nama_siswa ?>
                </td>
                <td>
                    <?php echo $siswa->jumlah_bayar ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </center>
</body>
</html>