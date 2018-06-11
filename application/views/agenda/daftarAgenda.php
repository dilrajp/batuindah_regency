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
        <th>Jenis</th>
        <th>Tanggal</th>
        <th>Deskripsi</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr><?php   $datetime = new DateTime($v->tanggal_agenda);

                    $date = $datetime->format('Y-m-d');
                    $time = $datetime->format('H:i:s');

?>                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->jenis_agenda; ?></td>
                    <td><?php  echo tanggal_indo($date,TRUE).'<br> Jam: '.$time; ?></td>
                    <td><?php echo $v->isi_agenda; ?></td>
                   
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>
</table>