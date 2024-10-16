  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true" style="z-index:9999;">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Keluar Sekarang?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Apakah Anda ingin meninggalkan sesi ini? Klik "Logout" untuk keluar.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-danger" href="<?= base_url(); ?>Auth/logout">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!--================ Start footer Area  =================-->
  <footer class="footer">
      <div class="footer-area">
          <div class="container">
              <div class="row section_gap">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="single-footer-widget tp_widgets">
                          <h4 class="footer_title large_title">Our Mission</h4>
                          <p>
                              So seed seed green that winged cattle in. Gathering thing made fly you're no
                              divided deep moved us lan Gathering thing us land years living.
                          </p>
                          <p>
                              So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep
                              moved
                          </p>
                      </div>
                  </div>
                  <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                      <div class="single-footer-widget tp_widgets">
                          <h4 class="footer_title">Quick Links</h4>
                          <ul class="list">
                              <li><a href="#">Home</a></li>
                              <li><a href="#">Shop</a></li>
                              <li><a href="#">Blog</a></li>
                              <li><a href="#">Product</a></li>
                              <li><a href="#">Brand</a></li>
                              <li><a href="#">Contact</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6">
                      <div class="single-footer-widget instafeed">
                          <h4 class="footer_title">Gallery</h4>
                          <ul class="list instafeed d-flex flex-wrap">
                              <li><img src="img/gallery/r1.jpg" alt=""></li>
                              <li><img src="img/gallery/r2.jpg" alt=""></li>
                              <li><img src="img/gallery/r3.jpg" alt=""></li>
                              <li><img src="img/gallery/r5.jpg" alt=""></li>
                              <li><img src="img/gallery/r7.jpg" alt=""></li>
                              <li><img src="img/gallery/r8.jpg" alt=""></li>
                          </ul>
                      </div>
                  </div>
                  <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                      <div class="single-footer-widget tp_widgets">
                          <h4 class="footer_title">Contact Us</h4>
                          <div class="ml-40">
                              <p class="sm-head">
                                  <span class="fa fa-location-arrow"></span>
                                  Head Office
                              </p>
                              <p>123, Main Street, Your City</p>

                              <p class="sm-head">
                                  <span class="fa fa-phone"></span>
                                  Phone Number
                              </p>
                              <p>
                                  +123 456 7890 <br>
                                  +123 456 7890
                              </p>

                              <p class="sm-head">
                                  <span class="fa fa-envelope"></span>
                                  Email
                              </p>
                              <p>
                                  free@infoexample.com <br>
                                  www.infoexample.com
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="footer-bottom">
          <div class="container">
              <div class="row d-flex">
                  <p class="col-lg-12 footer-text text-center">
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>
                      document.write(new Date().getFullYear());
                      </script> All rights reserved | This template is made with <i class="fa fa-heart"
                          aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
              </div>
          </div>
      </div>
  </footer>
  <!--================ End footer Area  =================-->



  <script src="<?= base_url('assets'); ?>/home/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/skrollr.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="<?= base_url('assets'); ?>/home/vendors/mail-script.js"></script>
  <script src="<?= base_url('assets'); ?>/home/js/main.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
$(document).ready(function() {
    $('#example1').DataTable({
        "paging": true, // Mengaktifkan fitur pagination
        "searching": true, // Mengaktifkan fitur pencarian
        "ordering": true, // Mengaktifkan fitur pengurutan kolom
        "info": true, // Menampilkan informasi tentang jumlah baris
        "lengthChange": true, // Pengguna dapat memilih jumlah baris yang ingin ditampilkan
        "autoWidth": false, // Tabel tidak menyesuaikan lebar kolom secara otomatis
        "responsive": true // Tabel akan menyesuaikan secara responsif pada ukuran layar
    });
});
  </script>

  <!-- Hapus Data Confirm -->
  <script>
function deleteConfirmation(url) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        window.location.href = url;
    }
}
  </script>

  <!-- Ekko Lightbox JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

  <script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
  </script>

  <!-- Onchange -->
  <script>
function updateFileName() {
    // Ambil input elemen file
    var fileInput = document.getElementById('bukti_bayar');
    // Ambil label elemen
    var fileLabel = document.querySelector('.custom-file-label');
    // Ambil nama file yang dipilih
    var fileName = fileInput.files[0].name;
    // Update teks label dengan nama file
    fileLabel.textContent = fileName;
}
  </script>
  <!-- Tambah Kurang jumlah pesanan -->
  <script>
document.getElementById('tambah').addEventListener('click', function() {
    var jmlPesanan = document.getElementById('jml_pesanan');
    var currentValue = parseInt(jmlPesanan.value);
    if (currentValue < parseInt(jmlPesanan.max)) {
        jmlPesanan.value = currentValue + 1;
    }
});

document.getElementById('kurang').addEventListener('click', function() {
    var jmlPesanan = document.getElementById('jml_pesanan');
    var currentValue = parseInt(jmlPesanan.value);
    if (currentValue > parseInt(jmlPesanan.min)) {
        jmlPesanan.value = currentValue - 1;
    }
});
  </script>
  <!-- Nama input file upload -->
  <script>
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    var fileName = document.getElementById("bukti_bayar").files[0].name; // Ambil nama file
    var nextSibling = e.target.nextElementSibling; // Ambil elemen label berikutnya
    nextSibling.innerText = fileName; // Ubah teks label menjadi nama file
});
  </script>
  </body>

  </html>