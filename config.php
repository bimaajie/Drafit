<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'drafit';

$www = 'http://localhost/drafit/';

$connect = new mysqli($db_host,$db_user,$db_password,$db_name);
if ($connect->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
   die('Maaf koneksi gagal: '. $connect->connect_error);
}
?>