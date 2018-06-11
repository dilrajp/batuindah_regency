<link rel="stylesheet" href="<?php echo base_url('assets/jadwal/css/eventCalendar.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/jadwal/css/eventCalendar_theme_responsive.css');?>">


<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success">
        	<center><strong>Selamat Datang!</strong> <b><?php echo ucwords($username);?></b> di halaman <b><?php echo ucwords($nama_role);?></b> Aplikasi Manajemen Penghuni Perumahan di Batu Indah Regency.</center>
	    </div>
	    <div class="alert alert-info">
	        <center><strong>Petunjuk!</strong> Silahkan menggunakan menu yang sudah tersedia.</center>
	    </div>
	</div>

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