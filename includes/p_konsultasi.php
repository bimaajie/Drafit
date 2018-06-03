<?php
$link_list='?hal=konsultasi';

$pertanyaan='';
$id_diagnosa='';

if(isset($_SESSION['KONSULTASI_ID'])){

	$id_konsultasi=$_SESSION['KONSULTASI_ID'];
	
	if(mysqli_num_rows($q=mysqli_query($connect,"select * from konsultasi where id_konsultasi='".$id_konsultasi."' and id_diagnosa>0"))>0){
		$h=mysqli_fetch_array($q);
		$id_diagnosa=$h['id_diagnosa'];
		$q=mysqli_query($connect,"select * from diagnosa where id_diagnosa='".$id_diagnosa."'");
		$h=mysqli_fetch_array($q);
		$nama_diagnosa=$h['nama'];
		$nama_penyakit=$h['penyakit'];
		$no=0;
		$daftar_konsultasi='';
		$q=mysqli_query($connect,"select * from konsultasi_detail where id_konsultasi='".$id_konsultasi."' order by id_konsultasi_detail");
		while($h=mysqli_fetch_array($q)){
			$no++;
			$id_pengetahuan=$h['id_pengetahuan'];
			$jawaban=$h['jawaban'];
			$qq=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id_pengetahuan."'");
			$hh=mysqli_fetch_array($qq);
			$id_gejala=$hh['id_gejala'];
			$qq=mysqli_query($connect,"select * from gejala where id_gejala='".$id_gejala."'");
			$hh=mysqli_fetch_array($qq);
			$pertanyaan=$hh['pertanyaan'];
			$gambar=$hh['gambar'];
			if($jawaban=='Y'){$jawaban='YA';}else{$jawaban='TIDAK';}
			$daftar_konsultasi.='<li class="list-group-item">'.$no.'. '.$pertanyaan.' <strong>'.$jawaban.'</strong></li>';
		}

	}else{
		$q=mysqli_query($connect,"select * from konsultasi_detail where id_konsultasi='".$id_konsultasi."' order by id_konsultasi_detail desc limit 0,1");
		if(mysqli_num_rows($q)>0){
			$h=mysqli_fetch_array($q);
			$id_pengetahuan=$h['id_pengetahuan'];
			$jawaban=$h['jawaban'];
			$q=mysqli_query($connect,"select * from pengetahuan where id_pengetahuan='".$id_pengetahuan."'");
			$h=mysqli_fetch_array($q);
			if($jawaban=='Y'){
				$id_gejala=$h['y_gejala'];
			}else{
				$id_gejala=$h['n_gejala'];
			}
			$q=mysqli_query($connect,"select * from gejala where id_gejala='".$id_gejala."'");
			$h=mysqli_fetch_array($q);
			$pertanyaan=$h['pertanyaan'];
			$gambar=$h['gambar'];
			$id_pengetahuan=0;
			$q=mysqli_query($connect,"select * from pengetahuan where id_gejala='".$id_gejala."'");
			if(mysqli_num_rows($q)>0){
				$h=mysqli_fetch_array($q);
				$id_pengetahuan=$h['id_pengetahuan'];
			}
		}else{
			$q=mysqli_query($connect,"select * from pengetahuan order by id_pengetahuan limit 0,1");
			$h=mysqli_fetch_array($q);
			$id_pengetahuan=$h['id_pengetahuan'];
			$id_gejala=$h['id_gejala'];
			$q=mysqli_query($connect,"select * from gejala where id_gejala='".$id_gejala."'");
			$h=mysqli_fetch_array($q);
			$pertanyaan=$h['pertanyaan'];
			$gambar=$h['gambar'];
		}
	}
}

?>
<?php if(!isset($_SESSION['KONSULTASI_ID'])){ ?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">Masukkan nama untuk memulai konsultasi</h3>
	</div>
</div>
<form action="konsultasi.php" id="form" method="post">
<input name="action" type="hidden" value="add">
<?php
if(!empty($error)){
	echo '<div class="alert alert-danger ">'.$error.'</div>';
}
?>
<div class="alert alert-danger" style="display:none;" id="alert"></div>

<div class="form-group">
	<label for="nama">Nama User</label>
	<div class="row">
	<div class="col-md-6">
	<input name="nama" class="form-control" id="nama" placeholder="" value="">
	</div>
	</div>
</div>
<button name="save" id="btn_save" type="submit" class="btn btn-mulai">Mulai &raquo;</button>
</form>
<script type="text/javascript">
jQuery(document).ready(function() {
	$('#form').submit(function () {
		if($.trim($('#nama').val())==''){
			$('#alert').html('<strong>Error !</strong> Lengkapi nama user pada form di bawah ini.');
			$('#alert').show();
			return false;
		}
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			beforeSend: function(data) {
				$('#btn_save').html('Loading...');
			},
			error: function(data) {
				$('#alert').html('<strong>Error !</strong> Permintaan data gagal.');
				$('#alert').show();
				$('#btn_save').html('Mulai &raquo;');
			},
			success: function(data) {
				window.location='<?php echo $link_list;?>';
			}
		});
		return false;
	});

});
</script>

<?php }else{ ?>
<?php if($id_diagnosa==0){ ?>
<form action="konsultasi.php" id="form_konsultasi" method="post">
<input name="action" type="hidden" value="konsultasi">
<input name="id" type="hidden" value="<?php echo $id_pengetahuan;?>">
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">Jawablah pertanyaan berikut ini</h3>
	</div>
	<div class="panel-body">
	  	<?php
		if($id_pengetahuan==0){
			echo '<div class="alert alert-danger "><strong>Error !</strong> Basis data tidak ditemukan.</div><br /><br /><button name="new" type="submit" class="btn btn-warning">BATAL</button>';
		}else{
		?>
		<h3><?php echo $pertanyaan;?></h3><br /><br />
		<center><img height="150px"width="150px"src="images/<?php echo $gambar;?>"></center>
		<button name="yes" type="submit" class="btn btn-abs">YA</button>
		<button name="no" type="submit" class="btn btn-default">TIDAK</button>
		<button name="new" type="submit" class="btn btn-danger" style="float:right">BATAL</button>
	  	<?php } ?>
	</div>
</div>
</form>
<?php }else{ ?>
<form action="konsultasi.php" id="form_konsultasi" method="post">
<input name="action" type="hidden" value="new">
<div class="panel panel-default">
	<div class="panel-heading panel-heading-custom">
	  <h3 class="panel-title">HASIL KONSULTASI</h3>
	</div>
	<div class="panel-body">
		<center><h4> Penyakit: <?php echo $nama_penyakit;?></h4><br />
	  <center>Solusi terhadap penyakit: <h3><?php echo $nama_diagnosa;?></h3><br />
	  	<a href="#" onclick="myFunction()" class="btnhasil">Download Hasil</a> <br> </br>
		<button name="new" type="submit" class="btn btn-konsul">KONSULTASI LAGI</button></center>
		<script>
function myFunction() {
    window.print();
}
</script>

	</div>
</div>
</form>
      <div class="page-header">
        <h1>Riwayat Pertanyaan</h1>
      </div>
<div class="row">
<div class="col-sm-12">
  <ul class="list-group">
	<?php echo $daftar_konsultasi;?>
  </ul>
</div>
</div>
<?php } ?>
<?php } ?>
