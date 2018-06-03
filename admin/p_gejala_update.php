<?php
$link_list='?hal=gejala';
$link_update='?hal=update_gejala';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$pertanyaan=$_POST['pertanyaan'];
	$gambar = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$gambarbaru = date('dmYHis').$gambar;
	$path = "images/".$gambarbaru;

	if(empty($kode) or empty($nama) or empty($pertanyaan)){
		$error='<strong>Error !</strong> Lengkapi kode, nama gejala, dan pertanyaan pada form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysqli_num_rows(mysqli_query($connect,"select * from gejala where kode='".$kode."'"))>0){
				$error='<strong>Error !</strong> Kode sudah terdaftar sebelumnya. Silahkan gunakan kode yang lain.';
			}else{
				move_uploaded_file($tmp, 'images/'.$gambarbaru);
				$q="insert into gejala(kode, nama, pertanyaan,gambar) values('".$kode."', '".$nama."', '".$pertanyaan."','".$gambarbaru."')";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysqli_query($connect,"select * from gejala where id_gejala='".$id."'");
			$h=mysqli_fetch_array($q);
			$kode_tmp=$h['kode'];
			if(mysqli_num_rows(mysqli_query($connect,"select * from gejala where kode='".$kode."' and kode<>'".$kode_tmp."'"))>0){
				$error='<strong>Error !</strong> Kode sudah terdaftar sebelumnya. Silahkan gunakan kode yang lain.';
			}else{
				move_uploaded_file($tmp, 'images/'.$gambarbaru);
				$q="update gejala set kode='".$kode."', nama='".$nama."', pertanyaan='".$pertanyaan."',gambar='".$gambarbaru."' where id_gejala='".$id."'";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}

	}
}else{
	$kode='';$nama='';$pertanyaan='';$gambar='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($connect,"select * from gejala where id_gejala='".$id."'");
		$h=mysqli_fetch_array($q);
		$kode=$h['kode'];
		$nama=$h['nama'];
		$pertanyaan=$h['pertanyaan'];
		$gambar=$h['gambar'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		$q=mysqli_query($connect,"select * from gejala where id_gejala='".$id."'");
		$h=mysqli_fetch_array($q);
		unlink('images/'.$h['gambar']);
		mysqli_query($connect,"delete from gejala where id_gejala='".$id."'");


		exit("<script>location.href='".$link_list."';</script>");
	}
}

?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">UPDATE DATA IDENTIFIKASI</h3>
	</div>
</div>

<form action="" name="" method="post" enctype="multipart/form-data">
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
	<label for="nama">Nama Identifikasi</label>
	<input name="nama" class="form-control" id="nama" placeholder="" value="<?php echo $nama;?>">
</div>
<div class="form-group">
	<label for="gambar">Gambar</label>
	<input type="file"name="gambar" class="form-control" id="gambar" placeholder="" value="<?php echo $gambar;?>">
</div>

<div class="form-group">
	<label for="pertanyaan">Pertanyaan</label>
	<input name="pertanyaan" class="form-control" id="pertanyaan" placeholder="" value="<?php echo $pertanyaan;?>">
</div>
<button name="save" type="submit" class="btn btn-primary">Simpan</button>
<button type="button" class="btn btn-default" onClick="location.href='<?php echo $link_list;?>';">Batal</button>

</form>
