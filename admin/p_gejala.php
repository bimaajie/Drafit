<?php
$link_list='?hal=gejala';
$link_update='?hal=update_gejala';

$no=0;$daftar='';
$q="select * from gejala";
$q=mysqli_query($connect,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$daftar.='
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td>'.$h['kode'].'</td>
			<td>'.$h['nama'].'</td>
			<td>'.$h['pertanyaan'].'</td>
			<td><img  width=150px height=150px src="images/'.$h['gambar'].'"></td>
			<td style="text-align:center;">
			<a href="'.$link_update.'&amp;id='.$h['id_gejala'].'&amp;action=edit" class="btn btn-xs btn-default">Edit</a>
			<a href="#"  onclick="DeleteConfirm(\''.$link_update.'&id='.$h['id_gejala'].'&action=delete\');return(false);" class="btn btn-xs btn-danger">Hapus</a>
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
	  <h3 class="panel-title">DATA IDENTIFIKASI</h3>
	</div>
</div>
		<div align="right" style="margin-bottom:10px;"><a href="<?php echo $link_update;?>" class="btn btn-sm btn-default">Input Identifikasi Baru</a></div>
		<table class="table table-striped table-hover table-bordered">
		  <thead>
		  <tr>
			<th style="text-align:center;" width="40">NO</th>
			<th style="text-align:center;" width="80">KODE</th>
			<th style="text-align:center;">NAMA IDENTIFIKASI</th>
			<th style="text-align:center;">PERTANYAAN</th>
			<th style="text-align:center;">GAMBAR</th>
			<th style="text-align:center;" width="110">&nbsp;</thd>
		  </tr>
		  </thead>
		  <tbody>
		  <?php echo $daftar;?>
		  </tbody>
		</table>
