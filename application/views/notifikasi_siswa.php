<?php
    if(count($isi_notifikasi) > 0){
        foreach($isi_notifikasi as $i=>$data){
?>
        <li class="unread notification-success">
            <a href="#notifikasi" data-toggle="modal" onclick="setNotifikasi(<?php echo $data->id; ?>)">
                <i class="entypo-bell pull-right"></i>
                <span class="line">
                    <strong>Judul : <?php echo $data->judul_notifikasi; ?></strong>
                </span>
                <span class="line small">
                    <?php echo date('d M Y H:i:s',strtotime($data->tanggal)); ?>
                </span>
            </a>
        </li>
<?php 
        } 
    }
?>