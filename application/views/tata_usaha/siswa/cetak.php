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
        <table border="1">
            <tr>
                <td>
                    <center>
                        <h3>
                        <img src="<?php echo base_url('assets/upload/image/thumbs/'.$konfigurasi->gambar)?>" class="img img-responsive img-thumbnail" width="100">
                        <br><?php echo $konfigurasi->nama_sekolah ?>
                        </h3>
                    <center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="container">
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                    FOTO
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <img src="<?php echo base_url('assets/upload/image/thumbs/'.$siswa->foto)?>" class="img img-responsive img-thumbnail" >
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                NIS
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->nis ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                NAMA
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->nama_siswa ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                KELAMIN
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->kelamin ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                AGAMA
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->agama ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                ALAMAT
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->alamat ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                NO TELPON
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->no_telpon ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                TEMPAT LAHIR
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->tempat_lahir ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-xs-10">
                            <div class="col-xs-3">
                                <h4 class="text-bold">
                                TANGGAL LAHIR
                                </h4>
                            </div>
                            <div>
                                <h4>
                                    : <?php echo $siswa->tanggal_lahir ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>