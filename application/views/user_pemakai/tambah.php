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
   
    <script>
    function yesnoCheck(that) {
        if (that.value != "xx") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
    </script>
        
        <div class="panel-body">            
            <?php echo form_open('userPemakai/insert',array('class'=>'form-horizontal form-groups-bordered','role'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Role</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="id_role" id="id_role" required onchange="yesnoCheck(this);">
                            <option value="xx">-Pilih Role-</option>
                            <?php foreach ($role as $i => $val) { ?>
                                <option value="<?php echo $val->id_role; ?>"><?php echo $val->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group"  id="ifYes" style="display: none;">
                    <label for="field-1" class="col-sm-3 control-label">Penghuni</label>                    
                    <div class="col-sm-5" >
                        <select class="form-control select2" name="id_penghuni" id="id_penghuni" data-allow-clear="true" data-placeholder="Pilih Penghuni">
                            <option></option>
                            <?php foreach ($peng as $i => $val) { ?>
                                <option value="<?php echo $val->id_penghuni; ?>"><?php echo $val->nama_penghuni; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Username</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Password</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Ulangi Password</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="ulangi_password" id="ulangi_password" placeholder="Ulangi Password" onblur="cekPassword(this);" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('userPemakai'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/templates/backend/js/jquery-3.2.1.min.js');?>"></script>
<script type="text/javascript">
    function cekPassword(obj){
        var ulangi_password = obj.value;
        var password = $('#password').val();

        if(ulangi_password != password){
            alert('Ulangi Password tidak cocok dengan password sebelumnya!');
            $('#ulangi_password').val('');
        }
    }
</script>