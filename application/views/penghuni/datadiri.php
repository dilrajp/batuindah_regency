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
        
        <div class="panel panel-primary" data-collapsed="0">
        
            <div class="panel-heading">
                <div class="panel-title">
                     Informasi Penghuni
                </div>
                
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered">
                    <?php if(count($data) > 0){ ?>
                        <?php foreach($data as $key => $v): ?>    
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

<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-primary" data-collapsed="0">
        
            <div class="panel-heading">
                <div class="panel-title">
                     Daftar Anggota Keluarga
                </div>
                
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            
            <div class="panel-body">
                
                <table class="table table-bordered <?php echo (count($anggota) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($anggota) > 0) ? "table-1" : ""; ?>">
                    <thead>
                      <tr>
                        <th># </th>
                        <th>Nama </th>
                        <th>No KTP </th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>TTL</th>
                      </tr>
                    </thead>
                     <tbody>
                        <?php if(count($anggota) > 0){ ?>
                            <?php foreach($anggota as $key => $v): ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $v->nama; ?></td>
                                    <td><?php echo $v->no_ktp; ?></td>
                                    <td><?php echo $v->status; ?></td>
                                    <td><?php echo $v->jeniskelamin; ?></td>
                                    <td><?php echo ucwords($v->tempat_lahir).', '.tanggal_indo($v->tanggal_lahir); ?></td>
                                   
                                </tr>
                            <?php endforeach; ?>
                            <?php }else{ ?>
                            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
                            <?php } ?>
                    </tbody>
                </table>
            
                
            </div>
        
        </div>
    
    </div>
</div>


