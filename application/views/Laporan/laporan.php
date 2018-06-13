<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>


<div class="row">
    <div class="col-md-12">
        
        <div class="panel panel-primary">
            
            <div class="panel-heading">
                <div class="panel-title">Laporan Batu Indah Regency</div>
        
                <div class="panel-options">
                  
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                  
                </div>
            </div>
    

            
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="33%">
                            <strong>Persebaran Data Penduduk</strong>
                            <br />
                            <div id="chart5" style="height: 250px"></div>
                        </td>
                        <td width="33%">
                            <strong>Persebaran Data Rumah per Blok</strong>
                            <br />
                            <div id="chart6" style="height: 250px"></div>
                        </td>
                        <td>
                                <div class="tile-stats tile-aqua">
                                    <div class="icon"><i class="entypo-home"></i></div>
                                    <div class="num" data-start="0" data-end="<?php echo $this->db->query("SELECT count(*) as total FROM rumah WHERE is_aktif='1'")->row('total') ?>" data-prefix=" " data-postfix=" Rumah" data-duration="1500" data-delay="0">0 &pound;</div>
                                    
                                    <h3>Jumlah Rumah </h3>
                                    <p>Batuindah Regency</p>
                                </div>
                                
                                <div class="tile-stats tile-red">
                                    <div class="icon"><i class="entypo-user"></i></div>
                                    <div class="num" data-start="0" data-end="<?php echo $this->db->query("select count(*) + (SELECT count(*) from penghuni where penghuni.jeniskelamin = x.jeniskelamin and penghuni.is_aktif ='1') as pup FROM anggota_keluarga x join penghuni y using(id_penghuni) where y.is_aktif = '1'")->row('pup'); ?>" data-prefix=" " data-postfix=" Penghuni" data-duration="1500" data-delay="0">0 &pound;</div>
                                    
                                    <h3>Jumlah Total Penghuni </h3>
                                    <p>Batuindah Regency</p>
                                </div>
                   
                        </td>
                        </tr>
                </tbody>
            </table>



        </div>
    
    </div>
</div>

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <strong>Laporan Jumlah Pengajuan Surat per Bulan</strong>
                            <br />
                            <div id="chart8" style="height: 300px"></div>
                        </td>
                    </tr>
                </tbody>
            </table>
         <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <strong>Laporan Jumlah Agenda per Bulan</strong>
                            <br />
                            <div id="chart3" style="height: 300px"></div>
                        </td>
                    </tr>
                </tbody>
         </table>



<div class="row">
</div>




    <link rel="stylesheet" href="<?php echo base_url('assets/templates/backend/assets/js/rickshaw/rickshaw.min.css')?>">
    <script src="<?php echo base_url('assets/templates/backend/assets/js/rickshaw/vendor/d3.v3.js')?>"></script>
    <script src="<?php echo base_url('assets/templates/backend/assets/js/rickshaw/rickshaw.min.js')?>"></script>
    <script src="<?php echo base_url('assets/templates/backend/assets/js/raphael-min.js')?>"></script>
    <script src="<?php echo base_url('assets/templates/backend/assets/js/morris.min.js')?>"></script>
<script type="text/javascript">
/**
 *  Neon Charts Scripts
 *
 *  Developed by Arlind Nushi - www.laborator.co
 */

;(function($, window, undefined)
{
    "use strict";
    
    $(document).ready(function()
    {
        

       var barsatu = [ <?php $data_pa = $this->db->query("select nama_blok as nama, (SELECT count(*) FROM rumah join blok using(id_blok) where rumah.id_blok = x.id_blok) as tot FROM blok x GROUP BY nama ")->result();
                                    $i = 1;
                                    foreach($data_pa as $r){
                                        if($i < count($data_pa)){
                                         echo "{label:'".$r->nama."', value:'".$r->tot."'},";
                                         $i++;
                                        }else{
                                         echo "{label:'".$r->nama."', value:'".$r->tot."'}";   
                                        }
                                    }
                                    ?> ];

         var bardua = [ <?php $data_pa = $this->db->query("select x.jeniskelamin,count(*) + (SELECT count(*) from penghuni where penghuni.jeniskelamin = x.jeniskelamin and penghuni.is_aktif ='1') as pup FROM anggota_keluarga x join penghuni y using(id_penghuni) where y.is_aktif = '1' GROUP BY x.jeniskelamin")->result();
                                $i = 1;
                                foreach($data_pa as $r){
                                    if($i < count($data_pa)){
                                     echo "{label:'".$r->jeniskelamin."', value:'".$r->pup."'},";
                                     $i++;
                                    }else{
                                     echo "{label:'".$r->jeniskelamin."', value:'".$r->pup."'}";   
                                    }
                                }
                                ?> ];
        var bartiga = [ <?php $data_pa = $this->db->query("SELECT DATE_FORMAT(tanggal_surat, '%M') as bulan ,count(*) as jum FROM `pengajuan_surat` GROUP BY bulan")->result();
                                $i = 1;
                                foreach($data_pa as $r){
                                    if($i < count($data_pa)){
                                     echo "{elapsed:'".$r->bulan."', value:'".$r->jum."'},";
                                     $i++;
                                    }else{
                                     echo "{elapsed:'".$r->bulan."', value:'".$r->jum."'}";   
                                    }
                                }
                                ?> ];
                                //console.log(bartiga);
   var barempat = [ <?php $data_pa = $this->db->query(" SELECT  DATE_FORMAT(tanggal_agenda, '%M') as bulan ,count(*) as jum FROM `agenda` GROUP BY bulan")->result();
                                $i = 1;
                                foreach($data_pa as $r){
                                    if($i < count($data_pa)){
                                     echo "{x:'".$r->bulan."', y:'".$r->jum."'},";
                                     $i++;
                                    }else{
                                     echo "{x:'".$r->bulan."', y:'".$r->jum."'}";   
                                    }
                                }
                                ?> ];
                        
                             
        // Morris.js Graphs
        if(typeof Morris != 'undefined')
        {

     

            // Donut
            Morris.Donut({
                element: 'chart5',
                data: bardua,
                colors: ['#707f9b', '#455064', '#242d3c','#455064', '#242d3c', '#707f9b',]
            });
            
            // Donut Colors
            Morris.Donut({
                element: 'chart6',
                data: barsatu,
                labelColor: '#303641',
                colors: ['#f26c4f', '#00a651', '#00bff3', '#0072bc','#076e4e','#d2691e','#5199a8','#95818c','#e9b704','#596b53']
            });

              // Line Chart
            Morris.Line({
                element: 'chart8',
                data: bartiga,
                xkey: 'elapsed',
                ykeys: ['value'],
                labels: ['value'],
                parseTime: false,
                lineColors: ['#242d3c']
            });
            
            
            Morris.Bar({
                element: 'chart3',
                axes: true,
                data: barempat,
                xkey: 'x',
                ykeys: ['y',],
                labels: ['Jumlah Agenda'],
                barColors: ['#707f9b', '#455064', '#242d3c']
            });
            
            

            

        
            

        }
        
        

        
        
    });
    
})(jQuery, window);


            
function data(offset) {
    var ret = [];
    for (var x = 0; x <= 360; x += 10) {
        var v = (offset + x) % 360;
        ret.push({
            x: x,
            y: Math.sin(Math.PI * v / 180).toFixed(4),
            z: Math.cos(Math.PI * v / 180).toFixed(4),
        });
    }
    return ret;
}
 
 
function getRandomInt(min, max) 
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
</script>



