<?php

if(isset($_POST['save'])){
	if(empty($_POST['passwordlama']) OR empty($_POST['password']) OR empty($_POST['password1'])){
		$error='<strong>Error !</strong> Lengkapi password saat ini dan password baru pada form di bawah ini.';
	}else{
		if($_POST['password']!=$_POST['password1']){
			$error='<strong>Error !</strong> Password baru tidak sama.';
		}else{
			if(mysqli_num_rows(mysqli_query($connect,"select * from user where id_user='".$_SESSION['LOGIN_ID']."' and password='".md5($_POST['passwordlama'])."'"))>0){
				mysqli_query($connect,"update user set password='".md5($_POST['password'])."' where id_user='".$_SESSION['LOGIN_ID']."'");
				/*exit("<script>location.href='?hal=ubah_password';</script>");*/
				$success='<strong>Sukses !</strong> Password baru berhasil disimpan.';
			}else{
				$error='<strong>Error !</strong> Password anda tidak sesuai.';
			}

		}
	}
}


?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">UBAH PASSWORD</h3>
	</div>
</div>

<form action="" name="" method="post">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-danger ">
		  '.$error.'
	   </div>
	';
}
if(!empty($success)){
	echo '
	   <div class="alert alert-success ">
		  '.$success.'
	   </div>
	';
}
?>
<div class="form-group">
	<label for="passwordlama">Password Saat Ini</label>
	<div class="row"><div class="col-xs-6"><input name="passwordlama" type="password" class="form-control" id="passwordlama" placeholder=""></div></div>
</div>
<div class="form-group">
	<label for="password">Password Baru</label>
	<div class="row"><div class="col-xs-6"><input name="password" type="password" class="form-control" id="password" placeholder=""></div></div>
</div>
<div class="form-group">
	<label for="password1">Ulangi</label>
	<div class="row"><div class="col-xs-6"><input name="password1" type="password" class="form-control" id="password1" placeholder=""></div></div>
</div>
<button name="save" type="submit" class="btn btn-abs">Simpan</button>

</form>
