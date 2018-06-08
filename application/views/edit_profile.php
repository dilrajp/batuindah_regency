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
            <?php echo form_open_multipart('dashboard/edit_profile_proses',array('accept-charset'=>"utf-8",'class'=>'form-horizontal form-groups-bordered','role'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Username</label>                    
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id" id="id" placeholder="ID" value="<?php echo isset($editdata->id) ? $editdata->id : null; ?>" />
                        <input type="hidden" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama" value="<?php echo isset($editdata->password) ? $editdata->password : null; ?>" />
                        <input type="hidden" class="form-control" name="photo_lama" id="photo_lama" placeholder="Photo Lama" value="<?php echo isset($editdata->photo) ? $editdata->photo : null; ?>" />
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo isset($editdata->username) ? $editdata->username : null; ?>"  readonly=true required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Password Baru</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Ulangi Password Baru</label>                    
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="ulangi_password_baru" id="ulangi_password_baru" placeholder="Ulangi Password Baru" onblur="cekPassword(this);" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Photo</label>                    
                    <div class="col-sm-5">
                        <?php if($editdata->photo == ''){ ?>
                            <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" width="100px" height="100px">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'data/images/user/'.$editdata->photo; ?>" width="100px" height="100px">
                        <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Ubah Photo</label>                    
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="photo" id="photo" placholder="Photo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('dashboard'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>
<script type="text/javascript">
    function cekUsername(obj){
        var username = obj.value;

        var data = {
            username: username
        }

        $.ajax({
            url     : "<?php echo base_url('admin/home/cekUsername'); ?>",
            type    : "POST",
            data    : data,
            dataType: 'json',
            success : function (data) {
                if(data.pesan != ''){
                    alert(data.pesan);
                    return false;    
                }                
            }
        });
    }

    function cekPassword(obj){
        var password = $('#password_baru').val();
        var ulangi_password = obj.value;

        if(ulangi_password != password){
            alert('Ulangi password baru tidak sesuai!');
            obj.value = '';
            obj.focus();
            return false;
        }
    }

    $(document).ready(function(){
        var id_role = '<?php echo $editdata->id_role; ?>';
        if(id_role != ''){
            $('#id_role').val(id_role);
        }
    });
</script>