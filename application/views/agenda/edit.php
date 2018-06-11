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
            <?php echo form_open('agenda/update',array('class'=>'form-horizontal form-groups-bordered','role'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jenis Agenda</label>                    
                    <div class="col-sm-5">
                        <input type="hidden" class="form-control" name="id_agenda" id="id_agenda" placeholder="ID" value="<?php echo isset($editdata->id_agenda) ? $editdata->id_agenda : null; ?>" />
                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis Agenda" value="<?php echo isset($editdata->jenis_agenda) ? $editdata->jenis_agenda : null; ?>"  required/>
                    </div>
                 </div>
                 <?php   $datetime = new DateTime($editdata->tanggal_agenda);

                    $date = $datetime->format('Y-m-d');
                    $time = $datetime->format('H:i:s');
                    ?>
                   <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Tanggal Agenda</label>                    
                    <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="tanggal" class="form-control datepicker2" data-format="yyyy-mm-dd" placeholder="Tanggal Agenda" value="<?php echo isset( $date) ?  $date : null; ?>" readonly required>
                                
                                <div class="input-group-addon">
                                   <a href="#" rel="tooltip" title="Klik Input Box Untuk Memilih Tanggal"><i class="entypo-calendar"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Jam Kegiatan</label>
                        
                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="waktu" class="form-control timepicker" data-show-seconds="true" data-template="dropdown"  data-default-time="<?php echo isset( $time) ?  $time : null; ?>" data-show-meridian="true" data-minute-step="1" data-second-step="1" required readonly/>
                                
                                <div class="input-group-addon">
                                    <a href="#" rel="tooltip" title="Klik Input Box Untuk Memilih Waktu"><i class="entypo-clock"></i></a>
                                </div>
                            </div>
                        </div>
                 </div>
             <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Deskripsi Agenda</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="isi" id="isi" placeholder="Deskripsi Agenda" value="<?php echo isset($editdata->isi_agenda) ? $editdata->isi_agenda : null; ?>"  required/>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('agenda'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>            
        </div>
    </div>
</div>