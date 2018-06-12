<html>
<body onload="window.print()">

<table align="center" width="650PX" border="0">


  <tr>
    <td rowspan="7"><img src="<?php echo base_url("assets/logo.png"); ?>" alt="Italian Trulli"></td>
   
  </tr>
  <tr >
    <td colspan="2" align="center"><h2 style="padding-top:30px;margin-bottom:-10px">RT.002 / RW.003</h2></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><h3 style="margin-bottom:0px">KEL.KUJANGSARI - KEC. BANDUNG KIDU0L</h3></td>
  </tr>
  <tr>
     <td colspan="2" align="center"><h4 style="margin-bottom:-30px">KOTA BANDUNG - JAWA BARAT</h3></td>
  </tr>
  <tr>
   <td colspan="2" align="center"><U style="margin-top:0px;margin-bottom:0px;">______________________________________________________</U></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span style="margin-bottom:10px;font-size: 12px">Sekertariat: Kujangsari, Bandung Kidul, Kota Bandung 40287 &nbsp;&nbsp; E-Mail: rt_r2@gmail.com</span></td>
  </tr>
	<tr>
    <td></td>
    <td></td>
  </tr>
	<tr>
    <td></td>
    <td></td>
  </tr>

</table>

<table align="center" width="650PX" border="0" style="margin-top:40px">
 

	<tr >
    <td colspan="5" align="center"><u style="margin-top:30px;margin-bottom:-5px;font-weight: bold;font-size:25px">SURAT PENGANTAR</u></td>
    </tr>
    <tr >
    <td colspan="5" align="center"><b>No. :......../RT.002/..../......</b><br><br><br></td>
    </tr>
	
    <tr >
    <td colspan="5">Dengan ini kami menerangkan bahwa :</td>
  	</tr>
  	
    <?php foreach($data as $r){ 
      if($r->id_anggota == NULL){
      ?>
  	<tr >
    <td style="width:200px">Nama </td>
    <td style="width:10px"> : </td>
    <td colspan="3"><?= $r->nama_penghuni?></td>
      
  	</tr>

  	<tr >
    <td style="width:200px">Jenis Kelamin </td>
    <td style="width:10px"> : </td>
    <td colspan="3"><?= $r->jeniskelamin?> </td>
    </tr>

  	<tr >
    <td style="width:200px">No KTP / NIK </td>
    <td style="width:10px"> : </td>
    <td colspan="3"> <?= $r->no_ktp?></td>
    </tr>

	<tr >
    <td style="width:200px">Alamat <br><br></td>
    <td style="width:10px"> : <br><br></td>
    <td colspan="3"> <?= $r->alamat_lengkap ?><br><br></td>
    </tr>

    <tr >
    <td colspan="5">Adalah benar yang bersangkutan adalah warga RT.002/RW.003 Kel. Kujangsari dalam hal ini memerlukan Surat Pengantar untuk keperluan <b><?= $r->isi_surat ?></b> 	</td>
  	</tr>
  
    <tr >
    <td style="width:200px">Keterangan lain   <br><br></td>
    <td style="width:10px"> :   <br><br></td>
    <td colspan="3"> <?= $r->keterangan ?>   	<br><br></td>
  	</tr>
    <?php  }else { ?>
      <tr >
    <td style="width:200px">Nama </td>
    <td style="width:10px"> : </td>
    <td colspan="3"><?= $r->nama?></td>
      
    </tr>
    <tr >
    <td style="width:200px">Tempat / Tanggal Lahir </td>
    <td style="width:10px"> : </td>
    <td colspan="3"> <?php echo $r->tempat_lahir.', '.tanggal_indo($r->tanggal_lahir)?></td>
    </tr>

    <tr >
    <td style="width:200px">Jenis Kelamin </td>
    <td style="width:10px"> : </td>
    <td colspan="3"> <?= $r->jeniskelamin?></td>
    </tr>

    <tr >
    <td style="width:200px">No KTP / NIK </td>
    <td style="width:10px"> : </td>
    <td colspan="3"> <?= $r->no_ktp?></td>
    </tr>

  <tr >
    <td style="width:200px">Alamat  <br><br></td>
    <td style="width:10px"> :  <br><br></td>
    <td colspan="3"><?= $r->alamat_lengkap?>  <br><br></td>
    </tr>

    <tr >
    <td colspan="5">Adalah benar yang bersangkutan adalah warga RT.002/RW.003 Kel. Kujangsari dalam hal ini memerlukan Surat Pengantar untuk keperluan <b> <?= $r->isi_surat ?></b></td>
    </tr>
  
    <tr >
    <td style="width:200px">Keterangan lain <br><br> </td>
    <td style="width:10px"> :  <br><br></td>
    <td colspan="3"> <?= $r->keterangan ?>  <br><br></td>
    </tr>
    <?php } 
    //print_r($data);
  }
    ?>
   	<tr >
  	 <td colspan="5">Demikian surat pengantar ini dibuat dengan semestinya untuk dipergunakan sebagaimana 	<br><br><br></td>
  	</tr>
  	<tr >
  	 <td colspan="3">Mengetahui: 	<br><br></td>
  	 <td colspan="2" align="right">Bandung,_______________	<br><br></td>
  	</tr>

	<tr>
    <td>Ketua RW.003 Sekertariat <br><br><br><br><br><br></td>
    <td></td>
    <td></td>
    <td></td>
    <td align="right">Ketua RT.002/RW.003 <br><br><br><br><br><br></td>
   
  	</tr>
  	<td>(..............................)</td>
    <td></td>
    <td></td>
    <td></td>
    <td align="right">(..............................)</td>
   
  	</tr>

</table>

</body>
</html>