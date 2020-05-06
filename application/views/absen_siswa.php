<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
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
            background-color: rgba(255, 255, 255, 0.5);
            min-height: 575px;
            width: 100%;
            padding: 10px;
            margin: 20px;
        }

        video{
            width: 600px;
        }

        .title {
            font-size: 32pt;
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="jam" id="jam">
                    12 : 00 : 00
                </div>
                <div class="tgl" id="tgl">
                    02 Juli 2019
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="title text-center">
                            <a text-align="center" class="mx-auto">SCANNER VIEW</a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <video id="preview">

                        </video>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="panel">
                        <img src="" id="foto">
                        <h3 id="nis">-</h3>
                        <h3 id="nama">-</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scannerdetection/1.2.0/jquery.scannerdetection.min.js" crossorigin="anonymous"></script>
    <script src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>

    <script>
        $(document).ready(function() {
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('jam').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

            var date = new Date();

            var day = date.getDate();

            var month = date.getMonth();

            var thisDay = date.getDay(),

                thisDay = myDays[thisDay];

            var yy = date.getYear();

            var year = (yy < 1000) ? yy + 1900 : yy;

            document.getElementById('tgl').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

            startTime();
            let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
            scanner.addListener('scan', function (content) {
                // alert(content);
                $.ajax({
                    url: content,
                    type: 'GET',
                    success: function(data) {
                        if(data == 'gagal'){
                            alert('gagal');
                        }else if(data == 'QR CODE Sudah Kadaluarsa'){
                            alert('QR CODE Sudah Kadaluarsa');
                        }else{
                            console.log(data);
                            var datasiswa = JSON.parse(data);
                            $("#nis").html(datasiswa.nis);
                            $("#nama").html(datasiswa.nama_siswa);
                        }
                        
                    },
                    error: function(request, error) {
                        alert('Error');
                    }
                });
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                scanner.start(cameras[0]);
                } else {
                console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });
    </script>
</body>
<footer class="main-footer">
    <div class="d-block hijau">
        <marquee><strong><h2 style="letter-spacing: 10px; color:white;">SELAMAT DATANG DI SMK LABOR FKIP BINAAN FKIP UNRI PEKANBARU | SILAHKAN ABSEN</h2></strong></marquee>
   </div>
</footer>
</html>