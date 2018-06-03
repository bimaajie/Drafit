<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Drafit</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/theme.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<?php include 'header.php';?>
    </div>

    <div class="container">
	<?php
	if(!isset($_SESSION['LOGIN_ID'])){
		 eval($content);
	}else{
	?>
	  <div class="row">
		<div class="col-sm-3">
			<?php include 'sidebar.php';?>
        </div>
		<div class="col-sm-9">
			<?php eval($content);?>
		</div>
      </div>

	<?php
	}
	?>
	<?php //include 'sidebar.php';?>
	<?php //eval($content);?>

    </div>
	<div class="footer">
      <div class="container">
        <p class="text-muted">2018 &copy; Sistem Pakar Diagnosis Penyakit Buah Naga</p>
      </div>
    </div>

  </body>

</html>
