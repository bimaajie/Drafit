          <div class="list-group-mine list-group-item">
            <a href="./" class="list-group-item <?php if($current_page==''){echo 'active';}?>">Home</a>
            <a href="?hal=gejala" class="list-group-item <?php if($current_page=='gejala' or $current_page=='update_gejala'){echo 'active';}?>">Data Identifikasi</a>
            <a href="?hal=diagnosa" class="list-group-item <?php if($current_page=='diagnosa' or $current_page=='update_diagnosa'){echo 'active';}?>">Data Diagnosis</a>
            <a href="?hal=pengetahuan" class="list-group-item <?php if($current_page=='pengetahuan' or $current_page=='update_pengetahuan'){echo 'active';}?>">Basis Pengetahuan</a>
            <a href="?hal=ubah_password" class="list-group-item <?php if($current_page=='ubah_password'){echo 'active';}?>">Ubah Password</a>
            <a href="logout.php" class="list-group-item">Logout</a>
          </div>
          <div class="list-group-mine list-group-item">
            <a href="?hal=konsultasi" class="list-group-item <?php if($current_page=='konsultasi'){echo 'active';}?>">Testing Space</a>
          </div>
		
