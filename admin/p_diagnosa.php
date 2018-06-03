<?php
$link_list='?hal=diagnosa';
$link_update='?hal=update_diagnosa';

$no=0;
$daftar='';
$q="select * from diagnosa";
$q=mysqli_query($connect,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$daftar.='
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td>'.$h['kode'].'</td>
				<td>'.$h['penyakit'].'</td>
			<td>'.$h['nama'].'</td>
			<td style="text-align:center;">
			<a href="'.$link_update.'&amp;id='.$h['id_diagnosa'].'&amp;action=edit" class="btn btn-xs btn-default">Edit</a>
			<a href="#"  onclick="DeleteConfirm(\''.$link_update.'&id='.$h['id_diagnosa'].'&action=delete\');return(false);" class="btn btn-xs btn-danger">Hapus</a>
			</td>
		  </tr>
		';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Apakah anda yakin ingin menghapus ?")){
		window.location.href=url;
	}
}
</script>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">DATA DIAGNOSA</h3>
	</div>
</div>
<div align="right" style="margin-bottom:10px;"><a href="<?php echo $link_update;?>" class="btn btn-sm btn-default">Input Diagnosa Baru</a></div>
<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th style="text-align:center;" width="40">NO</th>
			<th style="text-align:center;" width="80">KODE</th>
			<th style="text-align:center;" width="80">PENYAKIT</th>
			<th style="text-align:center;">SOLUSI</th>
			<th style="text-align:center;" width="110">&nbsp;</thd>
		</tr>
	</thead>
	<tbody>
	<?php echo $daftar;?>
	</tbody>
</table>
