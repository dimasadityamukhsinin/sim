<?php
// Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

$date = date("Y-m-d");
?>

<div class="box-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" onclick="generateqr()" style="margin-bottom: 30px">Generate QR Code </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <div id="qrcode">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QR CODE -->
<script src="<?php echo base_url() ?>assets/qrcode/qrcode.js"></script>
<!-- QR CODE -->
<script src="<?php echo base_url() ?>assets/qrcode/qrcode.min.js"></script>

<script type="text/javascript">
    var _0x21d8=["","\x68\x74\x6D\x6C","\x71\x72\x63\x6F\x64\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x68\x74\x74\x70\x3A\x2F\x2F\x6C\x6F\x63\x61\x6C\x68\x6F\x73\x74\x2F\x73\x69\x6D\x2F\x73\x63\x61\x6E\x5F\x61\x62\x73\x65\x6E\x5F\x73\x69\x73\x77\x61\x2F\x61\x62\x73\x65\x6E\x2F<?php echo $siswa->nis ?>/<?php echo $date ?>","\x23\x30\x30\x30\x30\x30\x30","\x23\x66\x66\x66\x66\x66\x66","\x48","\x43\x6F\x72\x72\x65\x63\x74\x4C\x65\x76\x65\x6C","\x23\x71\x72\x63\x6F\x64\x65","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x69\x6D\x67","\x74\x69\x74\x6C\x65","\x51\x52\x20\x43\x6F\x64\x65"];var isGenerated=false;function generateqr(){if(isGenerated== true){return false};isGenerated= true;$(_0x21d8[2])[_0x21d8[1]](_0x21d8[0]);var _0xcd50x3= new QRCode(document[_0x21d8[3]](_0x21d8[2]),{text:_0x21d8[4],width:280,height:280,colorDark:_0x21d8[5],colorLight:_0x21d8[6],correctLevel:QRCode[_0x21d8[8]][_0x21d8[7]]});var _0xcd50x4=document[_0x21d8[10]](_0x21d8[9]);var _0xcd50x5=_0xcd50x4[_0x21d8[10]](_0x21d8[11]);_0xcd50x5[_0x21d8[12]]= _0x21d8[13]}
</script>

<?php 
/*
    ISI JAVASCRIPT QR CODE ASLI

    var isGenerated = false;    
    function generateqr() {
        if(isGenerated == true) {
            return false;
        }
        isGenerated = true;

        $("qrcode").html("");
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "http://localhost/sim/scan_absen_siswa/absen/",
            width: 280,
            height: 280,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        var qrcodeElement = document.querySelector("#qrcode");
        var qrcodeImageElement = qrcodeElement.querySelector('img');
        qrcodeImageElement.title="QR Code";
    }
 */ 
?>