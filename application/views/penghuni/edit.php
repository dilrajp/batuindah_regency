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
            <?php echo form_open('penghuni/update',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Data Rumah Penghuni <a href="#data_rumah" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah">  <i class="entypo-search"></i></a></label>
                    <div class="col-sm-5">
                        <input type="hidden" name="id_rumah" id="id_rumah" placholder="ID Rumah" value="<?php echo isset($data_rumah->id_rumah) ? $data_rumah->id_rumah : ''; ?>">
                        <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" placeholder="Nama Pemilik" value="<?php echo isset($data_rumah->nama_pemilik) ? $data_rumah->nama_pemilik : ''; ?>" readonly=true required>
                        <br>
                        <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap" readonly=true required><?php echo isset($data_rumah->alamat_lengkap) ? $data_rumah->alamat_lengkap : ''; ?></textarea>
                        <p class="help-block" style="font-size:12px;">Pilih Data Rumah Penghuni</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Penghuni</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_penghuni" id="nama_penghuni" placeholder="Nama Penghuni" value="<?php echo isset($editdata->nama_penghuni) ? $editdata->nama_penghuni : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. KTP</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control numbers-only" name="no_ktp" id="no_ktp" placeholder="No. KTP" value="<?php echo isset($editdata->no_ktp) ? $editdata->no_ktp : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Penghuni</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_penghuni" id="status_penghuni" required>
                            <option value="">-Pilih Status Penghuni-</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Penyewa">Penyewa</option>
                            <option value="Kerabat">Kerabat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Pekerjaan</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo isset($editdata->pekerjaan) ? $editdata->pekerjaan : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. Telepon</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control numbers-only" name="no_telepon" id="no_telepon" placeholder="No. Telepon" value="<?php echo isset($editdata->no_telepon) ? $editdata->no_telepon : ""; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jml. Anggota Keluarga</label>                    
                    <div class="col-sm-3">
                        <input type="text" class="form-control numbers-only" name="jml_anggota_keluarga" id="jml_anggota_keluarga" placeholder="contoh: 1" onchange="showDaftarKeluarga(this);" value="<?php echo isset($editdata->jml_anggota_keluarga) ? $editdata->jml_anggota_keluarga : ""; ?>" required/>
                    </div>
                    <div class="col-sm-2" style="margin-left:-20px;margin-top:5px;">
                        <span>Orang</span>
                    </div>
                </div>

                 <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jenis Kelamin</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="jeniskelamin" id="jeniskelamin" required>
                            <option value="">-Pilih Jenis Kelamin-</option>
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                    </div>
                </div>  

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Keluarga</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_dikeluarga" id="status_dikeluarga" required>
                            <option value="">-Pilih Status Keluarga-</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Anak">Anak</option>
                        </select>
                    </div>
                </div>  
                <br>
                <div id="anggota_keluarga">
                    <legend>Daftar Anggota Keluarga</legend>
                    <table class="table table-bordered" id="tabel-keluarga">
                        <thead>
                            <tr>
                                <th style="width:20%;">Nama Anggota Kel.</th>
                                <th style="width:15%;">No. KTP</th>
                                <th style="width:16%">Jenis Kelamin</th>
                                <th style="width:12%">Tempat Lahir</th>
                                <th style="width:12%">Tanggal Lahir</th>
                                <th style="width:20%">Status</th>
                                <th style="width:5%">Aksi</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php
                                if(count($detail_anggota) > 0){
                                    foreach($detail_anggota as $key=>$detail){
                            ?>
                            <tr>
                                <td style="width:20%;">
                                    <input id="anggota_<?php echo $key; ?>_id_anggota" name="anggota[<?php echo $key; ?>][id_anggota]" type="hidden" class="form-control" value="<?php echo isset($detail->id_anggota) ? $detail->id_anggota : null; ?>">
                                    <input id="anggota_<?php echo $key; ?>_nama" name="anggota[<?php echo $key; ?>][nama]" type="text" class="form-control" value="<?php echo isset($detail->nama) ? $detail->nama : null; ?>" required>
                                </td>
                                <td style="width:15%;">
                                    <input id="anggota_<?php echo $key; ?>_no_ktp"  name="anggota[<?php echo $key; ?>][no_ktp]" type="text" class="form-control value="<?php echo isset($detail->no_ktp) ? $detail->no_ktp : null; ?>" numbers-only">
                                </td>
                                <td style="width:18%">
                                    <select id="anggota_<?php echo $key; ?>_jeniskelamin" name="anggota[<?php echo $key; ?>][jeniskelamin]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="LAKI-LAKI" <?php echo ($detail->jeniskelamin == 'LAKI-LAKI') ? "selected" : ''; ?>>LAKI-LAKI</option>
                                        <option value="PEREMPUAN" <?php echo ($detail->jeniskelamin == 'PEREMPUAN') ? "selected" : ''; ?>>PEREMPUAN</option>
                                    </select>
                                </td>
                                <td style="width:12%">
                                    <textarea id="anggota_<?php echo $key; ?>_tempat_lahir" name="anggota[<?php echo $key; ?>][tempat_lahir]" class="form-control"><?php echo isset($detail->tempat_lahir) ? $detail->tempat_lahir : null; ?></textarea>
                                </td>
                                <td style="width:12%">
                                    <input id="anggota_<?php echo $key; ?>_tanggal_lahir" name="anggota[<?php echo $key; ?>][tanggal_lahir]" type="text" class="form-control datepicker" value="<?php echo isset($detail->tanggal_lahir) ? date('d-m-Y',strtotime($detail->tanggal_lahir)) : null; ?>">
                                </td>
                                <td style="width:20%">
                                    <select id="anggota_<?php echo $key; ?>_status" name="anggota[<?php echo $key; ?>][status]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Ibu Rumah Tangga" <?php echo ($detail->status == 'Ibu Rumah Tangga') ? "selected" : ""; ?>>Ibu Rumah Tangga</option>
                                        <option value="Anak" <?php echo ($detail->status == 'Anak') ? "selected" : ""; ?>>Anak</option>
                                        <option value="Kerabat" <?php echo ($detail->status == 'Kerabat') ? "selected" : ""; ?>>Kerabat</option>
                                    </select>
                                </td>
                                <td class="td-actions" style="width:5%">
                                    <a href="#" class="btn btn-small btn-success" onclick="tambahKeluarga();"><i class="entypo-plus"> </i></a>
                                    <a href="#" class="btn btn-small btn-danger" onclick="hapusKeluargaDb(<?php echo $detail->id_anggota; ?>);"><i class="entypo-trash"> </i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                            <tr>
                                <td style="width:20%;">
                                    <input id="anggota_0_nama" name="anggota[0][nama]" type="text" class="form-control" required>
                                </td>
                                <td style="width:15%;">
                                    <input id="anggota_0_no_ktp"  name="anggota[0][no_ktp]" type="text" class="form-control numbers-only">
                                </td>
                                <td style="width:18%">
                                    <select id="anggota_0_jeniskelamin" name="anggota[0][jeniskelamin]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </td>
                                <td style="width:12%">
                                    <textarea id="anggota_0_tempat_lahir" name="anggota[0][tempat_lahir]" class="form-control"></textarea>
                                </td>
                                <td style="width:12%">
                                    <input id="anggota_0_tanggal_lahir" name="anggota[0][tanggal_lahir]" type="text" class="form-control datepicker">
                                </td>
                                <td style="width:20%">
                                    <select id="anggota_0_status" name="anggota[0][status]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Kerabat">Kerabat</option>
                                    </select>
                                </td>
                                <td class="td-actions" style="width:5%">
                                    <a href="#" class="btn btn-small btn-success" onclick="tambahKeluarga();"><i class="entypo-plus"> </i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('penghuni'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>          
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/templates/backend/js/jquery-3.2.1.min.js');?>"></script>
<!-- Dialog Rumah Penghuni -->
<div class="modal fade" id="data_rumah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Data Rumah Penghuni</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered <?php echo (count($rumah) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($rumah) > 0) ? "table-1" : ""; ?>">
            <thead>
              <tr>
                <th>Pilih Rumah</th>
                <th>No. </th>
                <th>No. Blok</th>
                <th>Nama Pemilik</th>
                <th>No. Rumah</th>
                <th>Alamat Lengkap</th>
                <th>Status Rumah</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                <?php if(count($rumah) > 0){ ?>
                    <?php foreach($rumah as $key => $v): ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah Penghuni" onclick="setDataRumahPenghuni('<?php echo $v->id_rumah; ?>','<?php echo $v->nama_pemilik; ?>','<?php echo $v->alamat_lengkap; ?>',);">  <i class="entypo-check"></i></a>
                            </td>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $v->nama_blok; ?></td>
                            <td><?php echo $v->nama_pemilik; ?></td>
                            <td><?php echo $v->no_rumah; ?></td>
                            <td><?php echo $v->alamat_lengkap; ?></td>
                            <td><?php echo $v->status_rumah; ?></td>
                            <td><?php echo ($v->is_aktif == 1) ? "Aktif" : "Tidak Aktif"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                    <tr><td colspan="9">Data tidak ditemukan.</td></tr>
                    <?php } ?>
            </tbody>
        </table>
      </div>
  </div>
</div>
</div>
<!-- End Dialog Rumah Penghuni -->
<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
<script type="text/javascript">
    function setDataRumahPenghuni(id,nama,alamat){
        $('#id_rumah').val(id);
        $('#nama_pemilik').val(nama);
        $('#alamat_lengkap').val(alamat);
        $('#data_rumah').modal('hide');
    }

    function showDaftarKeluarga(obj){
        var jml_anggota = obj.value;

    }
    function tambahKeluarga(){
        var data = {
            tambah_berkas    : 'ya'
        }

        $.ajax({
            url     : "<?php echo base_url('penghuni/setFormKeluarga'); ?>",
            type    : "POST",
            data    : data,
            dataType: 'json',
            success : function (data) {
                $('#tabel-keluarga tbody').append(data.tr);
                renameInputKeluarga();
                setNumber();
            }
        });                          
    }

    function hapusKeluarga(obj){
        $(obj).parents("tr").fadeOut();
        $(obj).parents("tr").remove();
    }

    function renameInputKeluarga(){
        var row = 0;
        $('#tabel-keluarga tbody tr').each(function(){   
            $(this).find('input,select,textarea').each(function(){ //element <input>
                var old_name = $(this).attr("name").replace(/]/g,"");
                var old_name_arr = old_name.split("[");
                if(old_name_arr.length == 3){
                    $(this).attr("id",old_name_arr[0]+"_"+row+"_"+old_name_arr[2]);
                    $(this).attr("name",old_name_arr[0]+"["+row+"]["+old_name_arr[2]+"]");
                }
            });
            $(this).find('.datepicker').each(function(){ //element <input>
                $(this).datepicker({
                    autoclose: true,
                    format:'dd-mm-yyyy',
                });   
            });
            row++;
        });        
    }


    function setNumber(){
      $('.numbers-only').keyup(function() {
        var d = $(this).attr('numeric');
        var value = $(this).val();
        var orignalValue = value;
        value = value.replace(/[0-9]*/g, "");
        var msg = "Only Integer Values allowed.";

        if (d == 'decimal') {
        value = value.replace(/\./, "");
        msg = "Only Numeric Values allowed.";
        }

        if (value != '') {
          orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
          $(this).val(orignalValue);
        }
      });
    }

    $(document).ready(function(){
        var jeniskelamin = '<?php echo isset($editdata->jeniskelamin) ? $editdata->jeniskelamin : ""; ?>';
        var status_dikeluarga = '<?php echo isset($editdata->status_dikeluarga) ? $editdata->status_dikeluarga : ""; ?>';
        var status_penghuni = '<?php echo isset($editdata->status_penghuni) ? $editdata->status_penghuni : ""; ?>';

        if(jeniskelamin != ''){
            $('#jeniskelamin').val(jeniskelamin);
        }

        if(status_dikeluarga != ''){
            $('#status_dikeluarga').val(status_dikeluarga);
        }

        if(status_penghuni != ''){
            $('#status_penghuni').val(status_penghuni);
        }
        setNumber();
    });
</script>