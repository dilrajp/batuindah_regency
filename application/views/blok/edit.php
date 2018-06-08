<?php if(validation_errors()){ ?>
<div class="alert alert-warning">
    <strong><?php echo validation_errors(); ?></strong>
</div>              
<?php } ?>  

<div class="col-md-12">        
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                <?php echo $judulHeader; ?>
            </div>
        </div>
        
        <div class="panel-body">            
            <?php echo form_open('blok/update',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Blok</label>                    
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id_blok" id="id_blok" placeholder="ID" value="<?php echo isset($editdata->id_blok) ? $editdata->id_blok : null; ?>" />
                        <input type="text" class="form-control" name="nama_blok" id="nama_blok" placeholder="Nama Blok" value="<?php echo isset($editdata->nama_blok) ? $editdata->nama_blok : null; ?>"  required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('blok'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>