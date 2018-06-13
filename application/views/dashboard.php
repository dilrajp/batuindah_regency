<link rel="stylesheet" href="<?php echo base_url('assets/jadwal/css/eventCalendar.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/jadwal/css/eventCalendar_theme_responsive.css');?>">


<div class="row">
	<div class="col-md-12">
    <?php if(ucwords($nama_role) != 'RT'){?>
		<div class="alert alert-success">
        	<center><strong>Selamat Datang!</strong> <b><?php echo ucwords($username);?></b> di halaman pengguna <b><?php echo ucwords($nama_role);?></b> Aplikasi Manajemen Penghuni Perumahan di Batu Indah Regency.</center>
	    </div>
	    <div class="alert alert-info">
	        <center><strong>Petunjuk!</strong> Silahkan menggunakan menu yang sudah tersedia.</center>
	    </div>
	</div>
<?php }else {    ?>
    <div class="col-md-12">
    
        <div class="panel panel-info" data-collapsed="1">
            
            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Daftar Pengajuan Surat Terbaru</div>
                
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                </div>
            </div>
            
            <!-- panel body -->
            <div class="panel-body">
                
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
                
            </div>
            
        </div>
    
    </div>

<?php } ?>
        <div class="col-md-12" id="sidebar" >
            <div id="eventCalendarHumanDate" ></div>
        </div><!--/.sidebar-offcanvas-->

</div>

 <script src="<?php echo base_url('assets/jadwal/js/jquery.eventCalendar.min.js'); ?>" type="text/javascript"></script>
     <script>
        $(document).ready(function() {
            $("#eventCalendarHumanDate").eventCalendar({
                eventsjson: '/batuindah_regency/Dashboard/getAgenda/',
                showDescription: 'true',
                jsonDateFormat: 'human',
                 eventsScrollable: false  // 'YYYY-MM-DD HH:MM:SS'
                
            });
        });
    </script>