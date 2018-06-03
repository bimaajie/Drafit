<?php
$link_list='?hal=pengetahuan';
$link_update='?hal=update_pengetahuan';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$id_gejala=$_POST['gejala'];
	$y_gejala=$_POST['gejala_yes'];
	$n_gejala=$_POST['gejala_no'];
	$y_diagnosa=$_POST['diagnosa_yes'];
	$n_diagnosa=$_POST['diagnosa_no'];

	if(!empty($id_gejala) and (!empty($y_gejala) or !empty($y_diagnosa)) and  (!empty($n_gejala) or !empty($n_diagnosa))){
		if($action=='add'){
			if(mysqli_num_rows(mysqli_query($connect,"select * from pengetahuan where id_gejala='".$id_gejala."'"))>0){
				$error='<strong>Error !</strong> Gejala IF sudah terdaftar sebelumnya. Silahkan gunakan gejala yang lain.';
			}else{
				if($y_diagnosa!=''){$y_gejala='';}
				if($n_diagnosa!=''){$n_gejala='';}
				$q="insert into pengetahuan(id_gejala, y_gejala, n_gejala, y_diagnosa, n_diagnosa) values('".$id_gejala."', '".$y_gejala."', '".$n_gejala."', '".$y_diagnosa."', '".$n_diagnosa."')";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id."'");
			$h=mysqli_fetch_array($q);
			$id_gejala_tmp=$h['id_gejala'];
			if(mysqli_num_rows(mysqli_query($connect,"select * from pengetahuan where id_gejala='".$id_gejala."' and id_gejala<>'".$id_gejala_tmp."'"))>0){
				$error='<strong>Error !</strong> Gejala IF sudah terdaftar sebelumnya. Silahkan gunakan gejala yang lain.';
			}else{
				if($y_diagnosa!=''){$y_gejala='';}
				if($n_diagnosa!=''){$n_gejala='';}
				$q="update pengetahuan set id_gejala='".$id_gejala."', y_gejala='".$y_gejala."', n_gejala='".$n_gejala."', y_diagnosa='".$y_diagnosa."', n_diagnosa='".$n_diagnosa."' where id_pengetahuan='".$id."'";
				mysqli_query($connect,$q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
	}else{
		$error='<strong>Error !</strong> Lengkapi JIKA, salah satu dari MAKA, salah satu dari JIKA TIDAK MAKA pada form di bawah ini.';

	}
}else{
	$id_gejala='';$y_gejala='';$n_gejala='';$y_diagnosa='';$n_diagnosa='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id."'");
		$h=mysqli_fetch_array($q);
		$id_gejala=$h['id_gejala'];
		$y_gejala=$h['y_gejala'];
		$n_gejala=$h['n_gejala'];
		$y_diagnosa=$h['y_diagnosa'];
		$n_diagnosa=$h['n_diagnosa'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysqli_query($connect,"delete from pengetahuan where id_pengetahuan='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}

$list_diagnosa='<option value=""></option>';
$list_diagnosa_yes='<option value=""></option>';
$list_diagnosa_no='<option value=""></option>';
$q=mysqli_query($connect,"select * from diagnosa order by kode");
while($h=mysqli_fetch_array($q)){
	if($h['id_diagnosa']==$y_diagnosa){$s='selected';$y_gejala='';}else{$s='';}
	$list_diagnosa_yes.='<option value="'.$h['id_diagnosa'].'" '.$s.'>Diagnosa: '.$h['kode'].' - '.$h['nama'].'</option>';

	if($h['id_diagnosa']==$n_diagnosa){$s='selected';$n_gejala='';}else{$s='';}
	$list_diagnosa_no.='<option value="'.$h['id_diagnosa'].'" '.$s.'>Diagnosa: '.$h['kode'].' - '.$h['nama'].'</option>';
}

$list_gejala='<option value=""></option>';
$list_gejala_yes='<option value=""></option>';
$list_gejala_no='<option value=""></option>';
$q=mysqli_query($connect,"select * from gejala order by kode");
while($h=mysqli_fetch_array($q)){
	if($h['id_gejala']==$id_gejala){$s='selected';}else{$s='';}
	$list_gejala.='<option value="'.$h['id_gejala'].'" '.$s.'>'.$h['kode'].' - '.$h['nama'].'</option>';

	if($h['id_gejala']==$y_gejala){$s='selected';}else{$s='';}
	$list_gejala_yes.='<option value="'.$h['id_gejala'].'" '.$s.'>Tanya: '.$h['kode'].' - '.$h['pertanyaan'].'</option>';

	if($h['id_gejala']==$n_gejala){$s='selected';}else{$s='';}
	$list_gejala_no.='<option value="'.$h['id_gejala'].'" '.$s.'>Tanya: '.$h['kode'].' - '.$h['pertanyaan'].'</option>';
}


?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">UPDATE DATA BASIS PENGETAHUAN</h3>
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
	<label for="kode">JIKA</label>
	<select name="gejala" class="form-control"><?php echo $list_gejala;?></select>
</div>
<div class="form-group">
	<label for="nama">MAKA</label>
	<div class="row">
	<div class="col-md-6">
	<select name="gejala_yes" class="form-control"><?php echo $list_gejala_yes;?></select>
	</div>
	<div class="col-md-6">
	<select name="diagnosa_yes" class="form-control"><?php echo $list_diagnosa_yes;?></select>
	</div>
	</div>
</div>
<div class="form-group">
	<label for="nama">JIKA TIDAK MAKA</label>
	<div class="row">
	<div class="col-md-6">
	<select name="gejala_no" class="form-control"><?php echo $list_gejala_no;?></select>
	</div>
	<div class="col-md-6">
	<select name="diagnosa_no" class="form-control"><?php echo $list_diagnosa_no;?></select>
	</div>
	</div>
</div>
<button name="save" type="submit" class="btn btn-primary">Simpan</button>
<button type="button" class="btn btn-default" onClick="location.href='<?php echo $link_list;?>';">Batal</button>

</form>
