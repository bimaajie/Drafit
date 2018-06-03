<?php
$page='';
if(isset($_GET['hal'])){
	$page=$_GET['hal'];
}
$current_page=$page;
switch($page){
	case 'login':
		$page="include 'includes/p_login.php';";
		break;
	case 'gejala':
		$page="include 'admin/p_gejala.php';";
		break;
	case 'update_gejala':
		$page="include 'admin/p_gejala_update.php';";
		break;
	case 'diagnosa':
		$page="include 'admin/p_diagnosa.php';";
		break;
	case 'update_diagnosa':
		$page="include 'admin/p_diagnosa_update.php';";
		break;
	case 'pengetahuan':
		$page="include 'admin/p_pengetahuan.php';";
		break;
	case 'update_pengetahuan':
		$page="include 'admin/p_pengetahuan_update.php';";
		break;
	case 'cara_penggunaan':
		$page="include 'includes/p_cara_penggunaan.php';";
		break;
	case 'konsultasi':
		$page="include 'includes/p_konsultasi.php';";
		break;
	case 'tips':
		$page="include 'includes/p_tips.php';";
		break;
	case 'ubah_password':
		$page="include 'admin/p_ubah_password.php';";
		break;
		
	default:
		$page="include 'includes/p_home.php';";
		break;
}
$content=$page;

?>