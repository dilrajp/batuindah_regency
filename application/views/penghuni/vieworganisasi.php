<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>
<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-gradient" data-collapsed="0">
        
            <div class="panel-heading">
                <div class="panel-title">
                     Informasi RT
                </div>
                
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered">
                    <?php if(count($rt) > 0){ ?>
                        <?php foreach($rt as $key => $v): ?>    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Nama </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->nama_penghuni ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">No KTP </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_ktp ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Telp </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_telepon ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Pekerjaan </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->pekerjaan ?>" disabled>
                        </div>
                    </div>

                    </div>
                    
                    <div class="col-md-6">
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">No Rumah</label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_rumah ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Alamat </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->alamat_lengkap ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Status </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->status_rumah ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Blok </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->nama_blok ?>" disabled>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                    Data tidak ditemukan.
                    <?php } ?>
            </form>
                
            </div>
        
        </div>
    
    </div>

        <div class="col-md-12">
        
        <div class="panel panel-gradient" data-collapsed="0">
        
            <div class="panel-heading">
                <div class="panel-title">
                     Informasi RW
                </div>
                
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered">
                    <?php if(count($rw) > 0){ ?>
                        <?php foreach($rw as $key => $v): ?>    
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Nama </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->nama_penghuni ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">No KTP </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_ktp ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Telp </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_telepon ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Pekerjaan </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->pekerjaan ?>" disabled>
                        </div>
                    </div>

                    </div>
                    
                    <div class="col-md-6">
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">No Rumah</label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->no_rumah ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Alamat </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->alamat_lengkap ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Status </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->status_rumah ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Blok </label>
                        
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="field-1" value="<?= $v->nama_blok ?>" disabled>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                    Data tidak ditemukan.
                    <?php } ?>
            </form>
                
            </div>
        
        </div>
    
    </div>
</div>



