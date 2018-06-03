      <div class="container">
        <div class="navbar-header navbar-custom">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($current_page==''){echo 'class="active"';}?>><a href="./">Home</a></li>
			<li <?php if($current_page=='cara_penggunaan'){echo 'class="active"';}?>><a href="?hal=cara_penggunaan">Cara Penggunaan</a></li>
            <li <?php if($current_page=='konsultasi'){echo 'class="active"';}?>><a href="?hal=konsultasi">Konsultasi Baru</a></li>
            <li <?php if($current_page=='tips'){echo 'class="active"';}?>><a href="?hal=tips">Drafit Tips</a></li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
            <?php if(!isset($_SESSION['LOGIN_ID'])){ ?>
			<li <?php if($current_page=='login'){echo 'class="active"';}?>><a href="?hal=login">Login Administrator</a></li>
			<?php }else{ ?>
			<li><a href="logout.php">Logout</a></li>
			<?php } ?>
          </ul>
        </div>
      </div>
