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
  <footer class="main-footer bg-dark text-white p-4">
      <div class="container">
          <div class="row">
              <!-- Contact Information -->
              <div class="col-md-4">
                  <h5 class="text-white">Contact Us</h5>
                  <p>
                      <i class="fas fa-map-marker-alt"></i> Address: Jl. Contoh No.123, Jakarta<br>
                      <i class="fas fa-phone-alt"></i> Phone: +62 123 456 789<br>
                      <i class="fas fa-envelope"></i> Email: info@example.com
                  </p>
              </div>
              <!-- Social Media Links -->
              <div class="col-md-4">
                  <h5 class="text-white">Follow Us</h5>
                  <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i> Facebook</a><br>
                  <a href="#" class="text-white mr-3"><i class="fab fa-twitter"></i> Twitter</a><br>
                  <a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a>
              </div>
              <!-- Newsletter Subscription -->
              <div class="col-md-4">
                  <h5 class="text-white">Subscribe to Our Newsletter</h5>
                  <form action="#" method="post">
                      <div class="input-group">
                          <input type="email" class="form-control" placeholder="Enter your email" required>
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="submit">Subscribe</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <hr class="bg-light">
          <div class="text-center">
              <p>&copy; 2024 Your Company. All Rights Reserved.</p>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Mendapatkan Kota Tujuan -->
  <script>
$(document).ready(function() {
    // Ambil data provinsi tujuan
    $.ajax({
        url: "<?php echo base_url('rajaongkir/get_provinces'); ?>", // Ganti dengan URL API yang sesuai
        method: "GET",
        success: function(response) {
            const data = JSON.parse(response);
            if (data.status === 'success') {
                // Mengisi dropdown provinsi tujuan
                data.data.forEach(function(provinsi) {
                    $('#destinationProvince').append(
                        `<option value="${provinsi.province_id}" data-nama="${provinsi.province}">${provinsi.province}</option>`
                    );
                });
            } else {
                console.error("Gagal mengambil provinsi:", data.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Request gagal:", textStatus, errorThrown);
        }
    });

    // Ambil kota tujuan berdasarkan provinsi yang dipilih
    $('#destinationProvince').change(function() {
        const provinceId = $(this).val();
        $('#destination').empty().append(
            "<option value=''>-- Pilih Kota Tujuan --</option>"); // Reset kota
        $('#namaProvinsiTujuan').val(""); // Reset nama provinsi

        if (provinceId) {
            const namaProvinsi = $(this).find(':selected').data('nama'); // Ambil nama provinsi
            $('#namaProvinsiTujuan').val(namaProvinsi); // Set nama provinsi ke input hidden

            $.ajax({
                url: "<?php echo base_url('rajaongkir/get_cities/') ?>" +
                    provinceId, // Ganti dengan URL API yang sesuai
                method: "GET",
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        // Mengisi dropdown kota tujuan
                        data.data.forEach(function(kota) {
                            $('#destination').append(
                                `<option value="${kota.city_id}" data-nama="${kota.city_name}">${kota.city_name}</option>`
                            );
                        });
                    } else {
                        console.error("Gagal mengambil kota:", data.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Request gagal:", textStatus, errorThrown);
                }
            });
        }
    });

    // Ambil nama kota tujuan ketika kota dipilih
    $('#destination').change(function() {
        const namaKota = $(this).find(':selected').data('nama'); // Ambil nama kota
        $('#namaKotaTujuan').val(namaKota); // Set nama kota ke input hidden
    });
});
  </script>

  <script>
let currentIndexes = {
    'carousel-top-products': 0,
    'carousel-latest-products': 0
};

function moveCarousel(carouselId, direction) {
    const carousel = document.getElementById(carouselId);
    const items = carousel.querySelectorAll('.carousel-item');
    let index = currentIndexes[carouselId];

    // Mengatur indeks baru dengan menambahkan direction (-1 untuk prev, +1 untuk next)
    index += direction;
    if (index >= items.length) index = 0; // Jika indeks melewati jumlah item, kembali ke awal
    if (index < 0) index = items.length - 1; // Jika indeks kurang dari nol, kembali ke akhir

    currentIndexes[carouselId] = index;

    // Update posisi carousel
    const offset = -index * 100;
    carousel.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}
  </script>

  </body>

  </html>