<div style="color:#fff !important;">
    <span><strong>FORM MASUK APLIKASI</span>
</div>
<br>
<?php echo form_open("Login/cek_login",array('id'=>'form_login')); ?>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">
            <i class="entypo-user"></i>
        </div>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">
            <i class="entypo-key"></i>
        </div>
        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Kunci" autocomplete="off" required/>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block btn-login">
        MASUK
    </button>
</div>
<?php echo form_close(); ?>