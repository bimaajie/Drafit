<?php
$link_list='?hal=pengetahuan';
$link_update='?hal=update_pengetahuan';

$no=0;$daftar='';
$q="select * from pengetahuan";
$q=mysqli_query($connect,$q);
if(mysqli_num_rows($q) > 0){
	while($h=mysqli_fetch_array($q)){
		$no++;
		$gejala='';$y_gejala='';$n_gejala='';$y_diagnosa='';$n_diagnosa='';
		
		$qq=mysqli_query($connect,"select * from gejala where id_gejala='".$h['id_gejala']."'");
		$hh=mysqli_fetch_array($qq);
		$gejala=$hh['nama'];
		if($h['y_gejala']!=0){
			$qq=mysqli_query($connect,"select * from gejala where id_gejala='".$h['y_gejala']."'");
			$hh=mysqli_fetch_array($qq);
			$next_y='Tanya: '.$hh['pertanyaan'];
		}
		if($h['n_gejala']!=0){
			$qq=mysqli_query($connect,"select * from gejala where id_gejala='".$h['n_gejala']."'");
			$hh=mysqli_fetch_array($qq);
			$next_n='Tanya: '.$hh['pertanyaan'];
		}
		if($h['y_diagnosa']!=0){
			$qq=mysqli_query($connect,"select * from diagnosa where id_diagnosa='".$h['y_diagnosa']."'");
			$hh=mysqli_fetch_array($qq);
			$next_y='Diagnosa: '.$hh['nama'];
		}
		if($h['n_diagnosa']!=0){
			$qq=mysqli_query($connect,"select * from diagnosa where id_diagnosa='".$h['n_diagnosa']."'");
			$hh=mysqli_fetch_array($qq);
			$next_n='Diagnosa: '.$hh['nama'];
		}
		
		$daftar.='
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td><strong>JIKA</strong> '.$gejala.' <br /><strong>MAKA</strong> '.$next_y.'<br /><strong>JIKA TIDAK MAKA</strong> '.$next_n.'</td>
			<td style="text-align:center;">
			<a href="'.$link_update.'&amp;id='.$h['id_pengetahuan'].'&amp;action=edit" class="btn btn-xs btn-default">Edit</a>
			<a href="#"  onclick="DeleteConfirm(\''.$link_update.'&id='.$h['id_pengetahuan'].'&action=delete\');return(false);" class="btn btn-xs btn-danger">Hapus</a> 
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
	  <h3 class="panel-title">DATA BASIS PENGETAHUAN</h3>
	</div>
</div>
		<div align="right" style="margin-bottom:10px;"><a href="<?php echo $link_update;?>" class="btn btn-sm btn-default">Input Basis Pengetahuan Baru</a></div>
		<table class="table table-striped table-hover table-bordered">
		  <thead>
		  <tr>
			<th style="text-align:center;" width="40">NO</th>
			<th style="text-align:center;">BASIS PENGETAHUAN</th>
			<th style="text-align:center;" width="110">&nbsp;</thd>
		  </tr>
		  </thead>
		  <tbody>
		  <?php echo $daftar;?>
		  </tbody>
		</table>
