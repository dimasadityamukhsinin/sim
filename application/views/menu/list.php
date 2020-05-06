<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
    <style>
        body{
            max-width: 100%;
            overflow: hidden;
            background: url(<?php echo base_url('assets/upload/image/labschool.jpg')?>);
            background-size: cover;
        }

        #jam{
            padding: 20px;
            font-size: 50pt;
            color: white;
            font-weight: bold;
            padding-bottom: 0px;
        }

        #tgl{
            font-size: 35pt;
            padding-left: 20px;
            margin-top: -30px;
            font-weight: 500;
            color: #d9a114;
        }

        .panel{
            background-color: rgba(255, 255, 255, 0.6);
            height: 150px;
            width: 600px;
            margin-top: 300px;
            margin-left: 400px;
        }

        video{
            width: 600px;
        }

        .title {
            font-size: 25pt;
            font-weight: bold;
            color: #d9a114;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #ffffff;
        }
        .hijau{
            background-color:rgb(54, 187, 17, 0.5);
        }
    </style>
</head>
<body>
        <div class="panel">
            <div class="login-logo">
                    <img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>"  width="100px;" style="margin-top: -250px; margin-left : -725px;" >
                    <h4 class="title" style="margin-top: -185px; margin-right : -45px;" >SMK LABOR BINAAN FKIP UNIVERSITAS RIAU<br>LABSCHOOL PEKANBARU</h4>
                    <img src="<?php echo base_url('assets/upload/image/unri.png') ?>"  width="100px;" style="margin-top: -165px; margin-left : -950px;" >
            </div>

                    <img src="<?php echo base_url('assets/upload/image/tutwurihandayani.png') ?>"  width="100px;" style="margin-top: -285px; margin-left : 655px;" >
            <div class="row">
                <div class="login-logo">
                    <a href="<?php echo base_url('siswa/login') ?>">
                        <img src="<?php echo base_url('assets/upload/image/loginsiswa.png') ?>"  width="100px;" style="margin-top: -40px; margin-left: 100px; margin-right: 50px;" >
                        <h4 style="margin-left: 50px;"><b>SISWA</b></h4>
                    </a>
                </div>
                <div class="login-logo">
                    <a href="<?php echo base_url('guru/login') ?>">
                        <img src="<?php echo base_url('assets/upload/image/loginguru.png') ?>"  width="110px;" style="margin-top: -40px; ">
                        <h4 style="margin-top: -10px;"><b>GURU</b></h4>
                    </a>
                </div>
                <div class="login-logo">
                    <a href="<?php echo base_url('tata_usaha/login') ?>">
                        <img src="<?php echo base_url('assets/upload/image/logintatausaha.png') ?>"  width="90px;" style="margin-top: -30px; margin-left: 40px;">
                        <h4 style="margin-top: px; margin-left: 40px;"><b>TATA USAHA</b></h4>
                    </a>
                </div>
            </div>
        </div>
</body>
<footer style="margin-top: 175px;">
        <div class="d-block hijau text-center">
            <marquee><h3 style="letter-spacing: 10px; color:white;"><b>SELAMAT DATANG DI SMK LABOR FKIP BINAAN FKIP UNRI PEKANBARU | SILAHKAN ABSEN</b></h3></marquee>
        </div>
</footer>
</html>