<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<h3>Data Blok</h3>
<table class="table table-bordered <?php echo (count($lihat_blok) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($lihat_blok) > 0) ? "table-1" : ""; ?>">
    <tr>
        <td><b>Nama Blok</b></td>
        <td><?php echo isset($lihat_blok) ? $lihat_blok->nama_blok : ""; ?></td>

        <td><b>Status</b></td>
        <td><?php echo ($lihat_blok->is_aktif == true) ? "Data Aktif" : "Data Tidak Aktif"; ?></td>
    </tr>
</table>
<h3>Daftar Rumah sesuai dengan <b><?php echo isset($lihat_blok) ? $lihat_blok->nama_blok : ""; ?></b></h3>
<br>
<div class="row">
<?php if(count($lihat_rumah) > 0){ ?>
<?php 
    foreach($lihat_rumah as $i=>$rumah){ 
    $warna = 'red';
    if($i%2 == 0){
        $warna = 'green';
    }else if($i%3 == 0){
       $warna = 'blue';
    }else{
        $warna = 'red';
    }
?>
<a href="#modal-<?= $rumah->id_penghuni ?>" role="button" data-toggle="modal" rel="tooltip" title="Klik Data Anggota Keluarga">
<div class="col-sm-3" >
    <div class="tile-stats tile-<?php echo $warna; ?>">
        <div class="icon"><i class="entypo-home"></i></div>
        <h2 style="color:white;"><?php echo isset($rumah) ? $rumah->nama_pemilik : ""; ?></h2>
        
        <h6 style="color:white;"><?php echo isset($rumah) ? $rumah->alamat_lengkap : ""; ?></h6>
        <p><?php echo isset($rumah) ? $rumah->status_rumah : ""; ?></p>
    </div>
</div>
</a>
<?php } ?>
<?php } ?>
</div>
<a class="btn btn-in    fo" href="<?php echo base_url('blok/index'); ?>">Kembali</a><br><br>
<style type="text/css">
.modal-backdrop {
  z-index: -1;
}</style>
<!-- Modal 1 (Basic)-->
<?php if(count($lihat_rumah) > 0){
    foreach($lihat_rumah as $i=>$rumah){  ?>
<div class="modal fade" id="modal-<?= $rumah->id_penghuni ?>" >
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Basic Modal</h4>
            </div>
            <?php
             $idp = $rumah->id_penghuni;
             $daftar_anggota = $this->db->query("SELECT * FROM anggota_keluarga WHERE id_penghuni = '$idp'")->result(); 
             $x = 1;         
             ?>
            <div class="modal-body">
                
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                     <?php foreach($daftar_anggota as $row){ ?>
                            <tr>
                                <td><?= $x++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->status ?></td>
                            </tr>
                        <?php } ?>  
                          
                        </tbody>
                    </table>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>
<!-- end modal-->
