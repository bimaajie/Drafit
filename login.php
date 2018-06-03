<?php
session_start();
include 'config.php';

if(isset($_POST["submit"])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		exit("<script>window.alert('Lengkapi username dan password.');window.history.back();</script>");
	}
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$q=mysqli_query($connect,"SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
	if(mysqli_num_rows($q)==0){
		exit("<script>window.alert('Username dan password yang anda masukkan salah');window.history.back();</script>");
	}
	$h=mysqli_fetch_array($q);
	$_SESSION['LOGIN_ID']=$h['id_user'];
	exit("<script>window.location='".$www."';</script>");
}

?>