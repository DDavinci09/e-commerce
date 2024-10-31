	<!-- ================ contact section start ================= -->
	<section class="section-margin--small mt-0">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-6">
	                <div class="card card-secondary">
	                    <div class="card-header">
	                        <h3 class="card-title">Contact Information</h3>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-12 text-center mb-4">
	                                <p><i class="fas fa-map-marker-alt fa-2x"></i></p>
	                                <h5><?= $contact['alamat'] ?></h5>
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="col-12 col-md-4 text-center mb-4">
	                                <p><i class="fas fa-envelope fa-2x"></i></p>
	                                <h5>Email</h5>
	                                <p><a href="mailto:<?= $contact['email'] ?>"
	                                        class="text-decoration-none"><?= $contact['email'] ?></a></p>
	                            </div>
	                            <div class="col-12 col-md-4 text-center mb-4">
	                                <p><i class="fab fa-whatsapp fa-2x"></i></p>
	                                <h5>WhatsApp</h5>
	                                <p><a href="https://wa.me/<?= $contact['whatsapp'] ?>"
	                                        class="text-decoration-none"><?= $contact['whatsapp'] ?></a></p>
	                            </div>
	                            <div class="col-12 col-md-4 text-center mb-4">
	                                <p><i class="fab fa-instagram fa-2x"></i></p>
	                                <h5>Instagram</h5>
	                                <p><a href="https://www.instagram.com/<?= $contact['instagram'] ?>"
	                                        class="text-decoration-none"><?= $contact['instagram'] ?></a></p>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-12 col-md-6 col-lg-4 text-center mb-4">
	                                <p><i class="fab fa-tiktok fa-2x"></i></p>
	                                <h5>TikTok</h5>
	                                <p><a href="https://www.tiktok.com/<?= $contact['tiktok'] ?>"
	                                        class="text-decoration-none"><?= $contact['tiktok'] ?></a></p>
	                            </div>
	                            <div class="col-12 col-md-6 col-lg-4 text-center mb-4">
	                                <p><i class="fab fa-youtube fa-2x"></i></p>
	                                <h5>YouTube</h5>
	                                <p><a href="https://www.youtube.com/channel/<?= $contact['youtube'] ?>"
	                                        class="text-decoration-none"><?= $contact['youtube'] ?></a></p>
	                            </div>
	                        </div>

	                    </div>
	                    <!-- /.card-body -->
	                </div>
	                <!-- /.card -->
	            </div>
	            <!-- ./col -->
	            <div class="col-md-6">
	                <div class="card card-primary">
	                    <div class="card-header">
	                        <h3 class="card-title">Contact Us</h3>
	                    </div>
	                    <div class="card-body">
	                        <form>
	                            <div class="form-group">
	                                <label for="name">Name</label>
	                                <input type="text" id="name" class="form-control" placeholder="Enter your name"
	                                    required>
	                            </div>
	                            <div class="form-group">
	                                <label for="email">Email</label>
	                                <input type="email" id="email" class="form-control" placeholder="Enter your email"
	                                    required>
	                            </div>
	                            <div class="form-group">
	                                <label for="message">Message</label>
	                                <textarea id="message" class="form-control" rows="4"
	                                    placeholder="Type your message here..." required></textarea>
	                            </div>
	                            <div class="form-group">
	                                <button type="submit" class="btn btn-primary">Submit</button>
	                            </div>
	                        </form>
	                    </div>
	                    <!-- /.card-body -->
	                </div>
	                <!-- /.card -->
	            </div>
	            <!-- ./col -->
	        </div>

	        <!-- /.row -->
	    </div>
	</section>
	<!-- ================ contact section end ================= -->