<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<a class="btn btn-primary" href="<?php echo base_url('agenda/tambah'); ?>">Tambah Agenda</a><br><br>
<table class="table table-bordered <?php echo (count($data) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($data) > 0) ? "table-1" : ""; ?>">
    <thead>
      <tr>
        <th>No. </th>
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>Deskripsi</th>
        <th style="text-align: center;">Aksi</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->jenis_agenda; ?></td>
                    <td><?php
                    $datetime = new DateTime($v->tanggal_agenda);

                    $date = $datetime->format('Y-m-d');
                    $time = $datetime->format('H:i:s');

                     echo tanggal_indo($date,TRUE).'<br> Jam: '.$time; 


                     ?></td>
                    <td><?php echo $v->isi_agenda; ?></td>
                    <td class="td-actions" style="text-align: center;">
                        <a href="<?php echo base_url('agenda/edit/'.$v->id_agenda); ?>" class="btn btn-success btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk ubah Agenda"><i class="entypo-pencil"></i></a>
                        <a href="<?php echo base_url('agenda/hapus/'.$v->id_agenda); ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk hapus Agenda" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Agenda Ini ?');"><i class="entypo-trash"></i></a>

                    </td>
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>
</table>