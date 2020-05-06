<p class="pull-left">
    <div class="btn-group">
        <a href="<?php echo base_url('tata_usaha/dana')?>" title="Kembali" class="btn btn-info btn-md">
            <i class="fa fa-backward"></i> Kembali
        </a>
    </div>
</p>

<?php
//Error Upload
if(isset($error)){
    echo'<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('tata_usaha/dana/tambah'), 'class="form-horizontal"');
?>
<a href="javascript:void(0);" class="addCF label label-default"><i class="fa fa-plus"></i></a>
<div class="container" id="customFields">
</div>
<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</div>

<?php echo form_close(); ?>

<!-- jQuery 3.4.1 -->
<script src="<?php echo base_url() ?>assets/admin/jquery/jquery-3.4.1.min.js"></script>

<script>
$(document).ready(function(){
    var i = 1;
    $(".addCF").click(function() {
        $("#customFields").append(
            '<div class="form-group">' +
                '<h3>Data Ke '+ i++ +'</h3>' +
                '<div class="form-group">' +
                    '<label class="col-md-2 control-label">Keterangan</label>' +
                    '<div class="col-md-5">' +
                        '<input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" value="<?php echo set_value('keterangan') ?>" required>' +
                    '</div>' +
                '</div>' +

                '<div class="form-group">' +
                    '<label class="col-md-2 control-label">Jumlah</label>' +
                    '<div class="col-md-5">' +
                        '<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="<?php echo set_value('jumlah') ?>" required>' +
                    '</div>' +
                '</div>' +

                '<div class="form-group">' +
                    '<label class="col-md-2 control-label">Tanggal</label>' +
                    '<div class="col-md-5">' +
                        '<input type="date" name="tanggal[]" class="form-control" placeholder="Tanggal" value="<?php echo set_value('tanggal') ?>" required>' +
                    '</div>' +
                '</div>' +

                '<div class="form-group">' +
                    '<label for="inputEmail3" class="col-md-2 control-label">Jenis</label>' +
                    '<div class="col-md-5">' +
                        '<select name="jenis[]" class="form-control">' +
                            '<option value="masuk">' +
                                'Masuk' +
                            '</option>' +
                            '<option value="keluar">' +
                                'Keluar' +
                            '</option>' +
                        '</select>' +
                    '</div>' +
                '</div>' +
                '<hr>' + 
                '<div class="col-lg-7">' +
                '<a href="javascript:void(0);" class="remCF pull-right btn btn-danger"><i class="fa fa-times"></i></a></div>' +
                '</div>' +
            '</div>'
        );
    });
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
        counter--;
    });
});
</script>