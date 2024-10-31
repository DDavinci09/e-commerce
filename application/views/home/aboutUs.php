	<!-- ================ contact section start ================= -->
	<section class="section-margin--small mt-0">
	    <div class="container">
	        <div class="card">
	            <div class="card-header text-center">
	                <h3>Profile</h3>
	            </div>
	            <div class="card-body">
	                <div class="row">
	                    <div class="col-md-6">
	                        <!-- Gambar Profil -->
	                        <img src="<?= base_url('assets/upload/profile/' . $profil['gambar_profil']); ?>"
	                            class="img-fluid rounded" alt="Gambar Profil">
	                    </div>
	                    <div class="col-md-6">
	                        <h3><?= $profil['nama_profil']; ?></h3>
	                        <p><?= nl2br(htmlspecialchars($profil['isi_profil'])); ?></p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- ================ contact section end ================= -->