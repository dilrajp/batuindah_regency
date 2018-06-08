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
            <?php echo form_open('rumah/update',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Blok</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="id_blok" id="id_blok" required>
                            <option value="">-Pilih Blok-</option>
                            <?php 
                                $selected = '';
                                foreach ($blok as $i => $val) { 
                                    if($editdata->id_blok == $val->id_blok){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                            ?>
                                <option value="<?php echo $val->id_blok; ?>" <?php echo $selected; ?>><?php echo $val->nama_blok; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Pemilik</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" value="<?php echo isset($editdata->nama_pemilik) ? $editdata->nama_pemilik : ""; ?>" required/>
                        <input type="hidden" class="form-control" name="id_rumah" id="id_rumah" placeholder="ID Rumah" value="<?php echo isset($editdata->id_rumah) ? $editdata->id_rumah : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. Rumah</label>                    
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="no_rumah" id="no_rumah" placeholder="No. Rumah" value="<?php echo isset($editdata->no_rumah) ? $editdata->no_rumah : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Alamat Lengkap</label>                    
                    <div class="col-sm-5">
                        <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" required/><?php echo isset($editdata->alamat_lengkap) ? $editdata->alamat_lengkap : ""; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Rumah</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_rumah" id="status_rumah" required>
                            <option value="">-Pilih Status Rumah-</option>
                            <option value="Milik Sendiri" <?php echo ($editdata->status_rumah == 'Milik Sendiri') ? 'selected' : ''; ?>>Milik Sendiri</option>
                            <option value="Kontrak" <?php echo ($editdata->status_rumah == 'Kontrak') ? 'selected' : ''; ?>>Kontrak</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('rumah'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/templates/backend/js/jquery-3.2.1.min.js');?>"></script>