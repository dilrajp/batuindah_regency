<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<table class="table table-bordered <?php echo (count($data) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($data) > 0) ? "table-1" : ""; ?>">
    <thead>
      <tr>
        <th>No. </th>
        <th>Nama Penghuni</th>
        <th>Status Penghuni</th>
        <th>Blok </th>
        <th>Alamat Rumah</th>
        <th>Jml. Anggota Keluarga</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->nama_penghuni; ?></td>
                    <td><?php echo $v->status_penghuni; ?></td>
                    <td><?php echo $v->nama_blok; ?></td>
                    <td><?php echo $v->alamat_lengkap; ?></td>
                    <td><?php echo jmlanggota($v->id_penghuni); ?></td>
               
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>