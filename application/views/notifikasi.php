<table>
	<tr>
		<td>Tanggal Notifikasi</td>
		<td>:</td>
		<td><?php echo isset($datanotifikasi->tanggal) ? date('d M Y',strtotime($datanotifikasi->tanggal)) : ""; ?></td>
	</tr>
	<tr>
		<td>Judul Notifikasi</td>
		<td>:</td>
		<td><?php echo isset($datanotifikasi->judul_notifikasi) ? ($datanotifikasi->judul_notifikasi) : ""; ?></td>
	</tr>
	<tr>
		<td>Isi Notifikasi</td>
		<td>:</td>
		<td><?php echo isset($datanotifikasi->isi_notifikasi) ? ($datanotifikasi->isi_notifikasi) : ""; ?></td>
	</tr>
</table>