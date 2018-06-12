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
                        <th># </th>
                        <th>Penghuni (Anggota Keluarga)</th>
                        <th>Isi Surat</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                     <tbody>
                        <?php if(count($data) > 0){ ?>
                            <?php foreach($data as $key => $v): ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    
                                    <td><?php echo check_penghuni($v->id_penghuni).' ( '; 
                                              echo !empty($v->id_anggota) ?  check_anggota($v->id_anggota).' ) ' : ' )'; ?></td>
                                    <td><?php echo $v->isi_surat; ?></td>
                                    <td><?php echo tanggal_indo($v->tanggal_surat,true); ?></td>
                                    <td>
                                    <a href="<?php echo base_url('surat/print/'.$v->id_surat); ?>" class="btn btn-success btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk ubah Agenda"><i class="entypo-print"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php }else{ ?>
                            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
                            <?php } ?>
                    </tbody>
                </table>