<?php
$link_list='?hal=diagnosa';
$link_update='?hal=update_diagnosa';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$kode=$_POST['kode'];
	$penyakit=$_POST['penyakit'];
	$nama=$_POST['nama'];

	if(empty($kode) or empty($nama)){
		$error='<strong>Error !</strong> Lengkapi kode, dan nama diagnosa pada form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysqli_num_rows(mysqli_query($connect,"select * from diagnosa where kode='".$kode."'"))>0){
				$error='<strong>Error !</strong> Kode sudah terdaftar sebelumnya. Silahkan gunakan kode yang lain.';
			}else{
				$q="insert into diagnosa(kode,penyakit, nama) values('".$kode."','".$penyakit."', '".$nama."')";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysqli_query($connect,"select * from diagnosa where id_diagnosa='".$id."'");
			$h=mysqli_fetch_array($q);
			$kode_tmp=$h['kode'];
			if(mysqli_num_rows(mysqli_query($connect,"select * from gejala where kode='".$kode."' and kode<>'".$kode_tmp."'"))>0){
				$error='<strong>Error !</strong> Kode sudah terdaftar sebelumnya. Silahkan gunakan kode yang lain.';
			}else{
				$q="update diagnosa set kode='".$kode."', penyakit='".$penyakit."',nama='".$nama."' where id_diagnosa='".$id."'";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}

	}
}else{
	$kode='';$nama='';$penyakit='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($connect,"select * from diagnosa where id_diagnosa='".$id."'");
		$h=mysqli_fetch_array($q);
		$kode=$h['kode'];
		$nama=$h['nama'];
		$penyakit=$h['penyakit'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($connect,"delete from diagnosa where id_diagnosa='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}

?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">UPDATE DATA DIAGNOSA</h3>
	</div>
</div>

<form action="" name="" method="post">
<input name="action" type="hidden" value="<?php echo $action;?>">
<input name="id" type="hidden" value="<?php echo $id;?>">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-danger ">
		  '.$error.'
	   </div>
	';
}
?>
<div class="form-group">
	<label for="kode">Kode</label>
	<div class="row"><div class="col-xs-6"><input name="kode" class="form-control" id="kode" placeholder="" value="<?php echo $kode;?>"></div></div>
</div>
<div class="form-group">
	<label for="kode">Penyakit</label>
	<div class="row"><div class="col-xs-6"><input name="penyakit" class="form-control" id="kode" placeholder="" value="<?php echo $penyakit;?>"></div></div>
</div>
<div class="form-group">
	<label for="nama">Solusi</label>
	<textarea name="nama" class="form-control" id="nama" placeholder="" value="<?php echo $nama;?>"></textarea>
</div>
<button name="save" type="submit" class="btn btn-primary">Simpan</button>
<button type="button" class="btn btn-default" onClick="location.href='<?php echo $link_list;?>';">Batal</button>

</form>
