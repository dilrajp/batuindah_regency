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
            <?php echo form_open('rumah/insert',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Blok</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="id_blok" id="id_blok" required>
                            <option value="">-Pilih Blok-</option>
                            <?php foreach ($blok as $i => $val) { ?>
                                <option value="<?php echo $val->id_blok; ?>"><?php echo $val->nama_blok; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Pemilik</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. Rumah</label>                    
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="no_rumah" id="no_rumah" placeholder="No. Rumah" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Alamat Lengkap</label>                    
                    <div class="col-sm-5">
                        <textarea class="form-control" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" required/></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Rumah</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_rumah" id="status_rumah" required>
                            <option value="">-Pilih Status Rumah-</option>
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Kontrak">Kontrak</option>
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