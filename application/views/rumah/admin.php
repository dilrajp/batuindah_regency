<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        var table = $("#table-3").dataTable({
            "sPaginationType": "bootstrap",
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "bStateSave": true
        });
        
        table.columnFilter({
            "sPlaceHolder" : "head:after"
        });
    });
</script>
<a class="btn btn-primary" href="<?php echo base_url('rumah/tambah'); ?>">Tambah Rumah</a><br><br>
<table class="table table-bordered <?php echo (count($data) > 0) ? "datatable" : ""; ?>" id="table-3">
    <thead>
       <tr class="replace-inputs">
        <th>No. </th>
        <th>Nama Blok</th>
        <th>Nama Pemilik</th>
        <th>No. Rumah</th>
        <th>Alamat Lengkap</th>
        <th>Status Rumah</th>
        <th>Status</th>
        <th>Aksi</th>
        </tr> 
      <tr>
        <th>No. </th>
        <th>Nama Blok</th>
        <th>Nama Pemilik</th>
        <th>No. Rumah</th>
        <th>Alamat Lengkap</th>
        <th>Status Rumah</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->nama_blok; ?></td>
                    <td><?php echo $v->nama_pemilik; ?></td>
                    <td><?php echo $v->no_rumah; ?></td>
                    <td><?php echo $v->alamat_lengkap; ?></td>
                    <td><?php echo $v->status_rumah; ?></td>
                    <td><?php echo ($v->is_aktif == 1) ? "Aktif" : "Tidak Aktif"; ?></td>
                    <td class="td-actions">
                        <a href="<?php echo base_url('rumah/edit/'.$v->id_rumah); ?>" class="btn btn-success btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk ubah Rumah"><i class="entypo-pencil"></i></a>
                        <?php
                            if($v->is_aktif == 1){
                        ?>
                            <a href="<?php echo base_url('rumah/block_aktif/'.$v->id_rumah.'?aksi=block'); ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk rumahir Data Rumah" onclick="return confirm('Apakah anda yakin akan memblokir Data Rumah ini ?')"><i class="entypo-cancel"></i></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('rumah/block_aktif/'.$v->id_rumah.'?aksi=aktif'); ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk aktifkan Data Rumah" onclick="return confirm('Apakah anda yakin akan mengaktifkan Data Rumah ini ?')"><i class="entypo-check"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>