<?php
session_start();
include 'config.php';

if($_POST["action"]=='add'){
	$nama=$_POST['nama'];
	$q="insert into konsultasi(tanggal, nama) values('".date('Y-m-d')."', '".$nama."')";
	mysqli_query($connect,$q);
	$id_konsultasi=mysqli_insert_id($connect);
	$_SESSION['KONSULTASI_ID']=$id_konsultasi;
}
if(isset($_POST["new"])){
	unset($_SESSION['KONSULTASI_ID']);
	exit("<script>window.location='".$www."?hal=konsultasi';</script>");
}
if(isset($_POST["yes"])){
	$id_konsultasi=$_SESSION['KONSULTASI_ID'];
	$id_pengetahuan=$_POST['id'];
	$q="insert into konsultasi_detail(id_konsultasi, id_pengetahuan, jawaban) values('".$id_konsultasi."', '".$id_pengetahuan."','Y')";
	mysqli_query($connect,$q);
	$q=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id_pengetahuan."'");
	$h=mysqli_fetch_array($q);
	$id_diagnosa=$h['y_diagnosa'];
	if($id_diagnosa > 0){
		mysqli_query($connect,"update konsultasi set id_diagnosa='".$id_diagnosa."' where id_konsultasi='".$id_konsultasi."'");
	}
	exit("<script>window.location='".$www."?hal=konsultasi';</script>");
}
if(isset($_POST["no"])){
	$id_konsultasi=$_SESSION['KONSULTASI_ID'];
	$id_pengetahuan=$_POST['id'];
	$q="insert into konsultasi_detail(id_konsultasi, id_pengetahuan, jawaban) values('".$id_konsultasi."', '".$id_pengetahuan."','N')";
	mysqli_query($connect,$q);
	$q=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id_pengetahuan."'");
	$h=mysqli_fetch_array($q);
	$id_diagnosa=$h['n_diagnosa'];
	if($id_diagnosa > 0){
		mysqli_query($connect,"update konsultasi set id_diagnosa='".$id_diagnosa."' where id_konsultasi='".$id_konsultasi."'");
	}

	exit("<script>window.location='".$www."?hal=konsultasi';</script>");
}

?>
