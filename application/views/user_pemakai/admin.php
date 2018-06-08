<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<a class="btn btn-primary" href="<?php echo base_url('userPemakai/tambah'); ?>">Tambah User Pemakai</a><br><br>
<table class="table table-bordered <?php echo (count($data) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($data) > 0) ? "table-1" : ""; ?>">
    <thead>
      <tr>
        <th>No. </th>
        <th>Nama Role</th>
        <th>Username</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->nama_role; ?></td>
                    <td><?php echo $v->username; ?></td>
                    <td><?php echo ($v->is_aktif == 1) ? "Aktif" : "Tidak Aktif"; ?></td>
                    <td class="td-actions">
                        <a href="<?php echo base_url('userPemakai/edit/'.$v->id_user_pemakai); ?>" class="btn btn-success btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk ubah User Pemakai"><i class="entypo-pencil"></i></a>
                        <?php
                            if($v->is_aktif == 1){
                        ?>
                            <a href="<?php echo base_url('userPemakai/block_aktif/'.$v->id_user_pemakai.'?aksi=block'); ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk blokir Data userPemakai" onclick="return confirm('Apakah anda yakin akan memblokir Data User Pemakai ini ?')"><i class="entypo-cancel"></i></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('userPemakai/block_aktif/'.$v->id_user_pemakai.'?aksi=aktif'); ?>" class="btn btn-info btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk aktifkan Data userPemakai" onclick="return confirm('Apakah anda yakin akan mengaktifkan Data User Pemakai ini ?')"><i class="entypo-check"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>