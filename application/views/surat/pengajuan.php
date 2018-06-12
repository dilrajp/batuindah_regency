<?php if(validation_errors()){ ?>
<div class="alert alert-warning">
    <strong><?php echo validation_errors(); ?></strong>
</div>              
<?php } ?>  
<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<div class="col-md-12">        
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                <?php echo $judulHeader; ?>
            </div>
        </div>

    <script>
    function yesnoCheck(that) {
        if (that.value == "Anggota") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
    </script>
        <div class="panel-body">            
            <?php echo form_open('Surat/insert',array('class'=>'form-horizontal form-groups-bordered','role'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Pengajuan Untuk</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="subjek" id="subjek" required onchange="yesnoCheck(this);">
                            <option value="">-Pilih Subjek-</option>
                                <option value="Penghuni">Penghuni</option>
                                <option value="Anggota">Anggota Keluarga</option>
                        </select>
                    </div>
                </div>

                <div class="form-group"  id="ifYes" style="display: none;">
                    <label for="field-1" class="col-sm-3 control-label">Anggota Keluarga</label>                    
                    <div class="col-sm-5" >
                        <select class="form-control select2" name="anggota" id="anggota" data-allow-clear="true" data-placeholder="Pilih Anggota Keluarga">
                            <option></option>
                            <?php foreach ($peng as $i => $val) { ?>
                                <option value="<?php echo $val->id_anggota; ?>"><?php echo $val->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Isi Surat</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="isi" id="isi" placeholder="Isi Surat" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Keterangan Lainnya</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan (Kosongkan jika tidak ada)" required/>
                    </div>
                </div>

          
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('Surat/Pengajuan'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>