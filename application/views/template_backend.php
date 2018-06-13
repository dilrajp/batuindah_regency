<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<title>Batu Indah Regency </title>
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/css/font-icons/entypo/css/entypo.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/css/fonts.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/css/neon.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/css/custom.css');?>">
	<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery-1.10.2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/extensions/Chart/Chart.bundle.js');?>"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="page-body  page-fade" data-url="http://neon.dev">
<div class="page-container">
	<div class="sidebar-menu">
		<header class="logo-env">			
			<div class="logo">
				<a href="index.html">
					<h3 style="color:white;" >BATU INDAH REGENCY</h3>
				</a>
			</div>				
		</header>
				
		<ul id="main-menu" class="">
			<?php echo $_menu; ?>
		</ul>
				
	</div>	
	<div class="main-content">		
		<div class="row">
			<div class="col-md-6 col-sm-8 clearfix">		
				<ul class="user-info pull-left pull-none-xsm">
					<li class="profile-info dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                <?php if($photo == ''){ ?>
		                        <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" class="img-circle" width="44" alt="">
		                    <?php }else{ ?>
		                        <img src="<?php echo base_url().'data/images/user/'.$photo; ?>" class="img-circle" width="44" alt="">
		                    <?php } ?>
							<?php echo ucwords($username); ?>
						</a>

						<ul class="dropdown-menu">
							<li class="caret"></li>
							<li>
								<a href="<?php echo base_url('dashboard/edit_profile/'.$id_user); ?>">
									<i class="entypo-user"></i>
									Edit Profile
								</a>
							</li>
						</ul>
					</li>				
				</ul>
				<script type="text/javascript">
				
				</script>
			<ul class="user-info pull-left pull-right-xs pull-none-xsm">			
					<li class="notifications dropdown"  >
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" id="deleteNotif">
							<i class="entypo-bell"></i>
							<div id="total"></div>
						</a>

						<ul class="dropdown-menu" id="daftarpemberitahuan">
							
						</ul>
					</li>
	<?php if(($this->session->userdata('id_role')) == '1') { ?>
						<!-- Task Notifications -->
					<li class="notifications dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="entypo-user"> </i>
							<span class="badge-info"><b><?= ucwords($this->session->userdata('nama_role')) ?></b></span>
						</a>
						
						<ul class="dropdown-menu">
								<li class="top">
									<p>Hak Akses</p>
								</li>

							<li>
								<ul class="dropdown-menu-list scroller">
								
										<li>
											<a href="<?php echo base_url('dashboard/penghunitort'); ?>">
												<span class="task">
													<span class="desc"><b>RT</b></span>
												</span>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url('dashboard/rttopenghuni'); ?>">
												<span class="task">
													<span class="desc"><b>Penghuni</b></span>
												</span>
											</a>
										</li>
								
								</ul>
							</li>
					</ul>
						
					</li>

				</ul>
				<?php } ?>
			</div>

			<div class="col-md-6 col-sm-4 clearfix hidden-xs">				
				<ul class="list-inline links-list pull-right">								
					<li>
						<a href="<?php echo base_url('dashboard/keluar'); ?>">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>		
			</div>			
		</div>
		<hr>
		<ol class="breadcrumb bc-3">
			<li>
				<a href="<?php echo base_url('dashboard'); ?>"><i class="entypo-gauge"></i>Beranda</a>
			</li>
			<?php if($hirarki_menu == 'dashboard'){ ?>

			<?php }else{ ?>
			<li>
				<a ><?php
                        $hirarki_menu = explode('_',$hirarki_menu);
                        $get_hirarki_menu = '';
                        if(count($hirarki_menu) > 0){
                            foreach($hirarki_menu as $i=>$get_hirarki){
                                $get_hirarki_menu .= $get_hirarki." ";
                            }
                        }
                    ?>
                  	<?php echo ucwords($get_hirarki_menu); ?></a>
			</li>
			<?php } ?>
			<li class="active">
				<strong><?php
                        $menu = explode('_',$menu);
                        $get_menu = '';
                        if(count($menu) > 0){
                            foreach($menu as $i=>$get){
                                $get_menu .= $get." ";
                            }
                        }
                    ?>
                  	<?php echo ucwords($get_menu); ?></strong>
			</li>
		</ol>
			<?php echo $_content; ?> 
		<footer class="main">
			&copy; <?php echo date('Y'); ?> <strong>Batu Indah Regency</strong>
		</footer>	
	</div>
	

	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/js/datatables/responsive/css/datatables.responsive.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/js/select2/select2-bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/js/select2/select2.css');?>">
	<!-- Bottom Scripts -->
	<script src="<?php echo base_url('assets/templates/backend/assets/js/gsap/main-gsap.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/joinable.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/resizeable.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/neon-api.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/datatables/TableTools.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/dataTables.bootstrap.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/datatables/jquery.dataTables.columnFilter.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/datatables/lodash.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/datatables/responsive/js/datatables.responsive.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/select2/select2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/toastr.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/neon-chat.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/neon-custom.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/neon-demo.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/bootstrap-datepicker.js');?>"></script>
	<script src="<?php echo base_url('assets/templates/backend/assets/js/bootstrap-timepicker.min.js');?>"></script>
</body>
</html>
<script type="text/javascript">

$('.datepicker').datepicker({
    autoclose: true,
    format:'dd-mm-yyyy',
    //startDate: "dateToday"
});
$('.datepicker2').datepicker({
    autoclose: true,
    format:'yyyy-mm-dd',
    startDate: "dateToday"
});
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>

<!-- Dialog -->
<div class="modal fade" id="notifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Notifikasi</h4>
      </div>
      <div class="modal-body">
        <div id="notif">

        </div>
      </div>
  </div>
</div>
</div>
<!-- End Dialog -->
<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
<script type="text/javascript">
    function setNotifikasi(id){
        var data = {
          id:id
        }

        $.ajax({
            url     : "<?php echo base_url('Dashboard/showNotifikasi'); ?>",
            type    : "POST",
            data    : data,
            dataType: 'json',
            success: function(result) {
                $('#notif').html(result);       
            }
        });
    }
</script>

	<script type="text/javascript">

		loadnotification();

		function loadnotification(){
			$.ajax({
			    url: "<?php echo base_url('Dashboard/notifikasiAgenda'); ?>",
			    async: true,
			    type: "POST",
			    dataType: "json",
			    success: function(data) {
			        var bulan 	= ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
			        var hari	= ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];

			        if (data.jumlah > 0) {
			        	$("#daftarpemberitahuan").empty();
			        	$('#total').html('	<span class="badge badge-info">'+data.jumlah+'</span>');
			        	$('#daftarpemberitahuan').append('<li class="top"><p class="small">Anda memiliki <strong>'+data.jumlah+'</strong> Agenda Kegiatan.</p></li>');
			        	//console.log(data.jumlah);
			        	for (var i = 0; i < data.jumlah; i++) {
			        	var waktuunggah	= new Date(data.agenda[i].tanggal_agenda);
			  			var teks = 	$('<li>\
						  				<ul class="dropdown-menu-list scroller">\
												<li class="unread notification-info">\
												<a href="<?php echo base_url('Agenda/daftarAgenda'); ?>">\
																<span class="line">\
																<strong>'+data.agenda[i].jenis_agenda+'</strong>\
															</span>\
															<span class="line small">\
																Agenda kegiatan pada Hari '+hari[waktuunggah.getDay()]+", "+waktuunggah.getDate()+" "+bulan[waktuunggah.getMonth()]+" "+waktuunggah.getFullYear()+'.\
															</span>\
												</a>\
													</li>\
												</ul>\
											</li>');
			  		//	console.log(teks);
				        $("#daftarpemberitahuan").append(teks);
				    }
			        } else {
			        	$("#daftarpemberitahuan").empty();
			        	$('#total').html('<span class="badge badge-white"></span>');
			        	
			        	var teks = 	$('<li>\
			  				<ul class="dropdown-menu-list scroller">\
									<li class="unread notification-info">\
											<a href="<?php echo base_url('Agenda/daftarAgenda'); ?>">\
												<span class="line"> Tidak Ada Agenda Baru\
												</span>\
											</a>\
										</li>\
									</ul>\
								</li>');

			        	$("#daftarpemberitahuan").append(teks);
			        	
			        }

			    }
		    });
		}

		setInterval(function(){ loadnotification(); }, 5000);
		var clicks = 0;
		var cek = 0;
		$("#deleteNotif").click(function(e) {
			//e.preventDefault();

			if (clicks == 0){
				
        	// first click
        	cek = 1;
        	//alert(cek);
			} else{
				if(cek == 1){
					//alert("test");
					 $.ajax({
				      type: "POST",
				      url: "<?php echo base_url()?>Dashboard/clearNotif",
				      cache: false,
				      data: {}, // since, you need to delete post of particular id
				      success: function(reaksi) {
				         if (reaksi){
				           // alert("Success");
				          loadnotification();
				         } else {
				             //alert("ERROR");
				          loadnotification();
				         }
				       }
				       });
				    // second click
				    clicks = -1;
				    cek = 0;
				}else{
					cek = 1;
				}
			}
    		++clicks;

		});

		$(window).click(function(e) {
			//e.preventDefault();
			if (clicks == 0){
        	// first click
			} else{
				if(cek == 1){
				//alert("test");
				 $.ajax({
			      type: "POST",
			      url: "<?php echo base_url()?>Dashboard/clearNotif",
			      cache: false,
			      data: {}, // since, you need to delete post of particular id
			      success: function(reaksi) {
			         if (reaksi){
			           // alert("Success");
			           loadnotification();
			         } else {
			             //alert("ERROR");
			             loadnotification();
			         }
			       }
			       });
			    // second click
			    clicks = -1;
			     cek = 0;
				}
			}
    		++clicks;
		});
	</script>