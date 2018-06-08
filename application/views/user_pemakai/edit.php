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
            <?php echo form_open('userPemakai/update',array('class'=>'form-horizontal form-groups-bordered','role'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Role</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="id_role" id="id_role" required>
                            <option value="">-Pilih Role-</option>
                            <?php 
                                $selected = '';
                                foreach ($role as $i => $val) { 
                                    if($editdata->id_role == $val->id_role){
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                            ?>
                                <option value="<?php echo $val->id_role; ?>" <?php echo $selected; ?>><?php echo $val->nama; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Username</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo isset($editdata->username) ? $editdata->username : ""; ?>" required/>
                        <input type="hidden" class="form-control" name="id_user_pemakai" id="id_user_pemakai" placeholder="ID" value="<?php echo isset($editdata->id_user_pemakai) ? $editdata->id_user_pemakai : ""; ?>" required/>
                        <input type="hidden" class="form-control" name="password" id="password" placeholder="ID" value="<?php echo isset($editdata->password) ? $editdata->password : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Password Baru</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Ulangi Password Baru</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="ulangi_password" id="ulangi_password" placeholder="Ulangi Password Baru" onblur="cekPassword(this);" required/>
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
        var password = $('#password_baru').val();

        if(ulangi_password != password){
            alert('Ulangi Password tidak cocok dengan password sebelumnya!');
            $('#ulangi_password').val('');
        }
    }
</script>