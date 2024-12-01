<!------------------------- NAVBAR ------------------------->
<header class="navbar" id="navbar">
  <div class="mx-auto flex max-w-screen-xl items-center gap-4 px-4 sm:px-6 lg:px-8">
    <a href="<?= base_url() ?>">
      <img src="<?php echo base_url('img/logo/short_logo2.png'); ?>" width="60" height="60" class="logo elevation-3">
    </a>

    <div class="flex flex-1 items-center justify-end md:justify-between">
      <h2 class="brand"><span class="bg-gradient-to-r from-yellow-500 via-orange-500 to-red-700 bg-clip-text font-extrabold text-transparent">
          Luxora </span>Interiors<!-- no responsive -->
      </h2>
      <div class="flex items-center gap-4">
        <nav aria-label="Global" class="hidden md:block">
          <ul class="flex items-center gap-4 text-lg">

            <!-------------------------- Home -------------------------->
            <li>
              <a class="nav-menu <?= uri_string() === '' || uri_string() === 'home' ? 'active' : '' ?>"
                href="<?= base_url('home') ?>" href="<?= base_url() ?>"> Home </a>
            </li>
            <!-------------------------- Home -------------------------->

            <!------------------------ Category ------------------------>
            <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
            <li>
              <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
              <div x-data="{ isActive: false }" class="relative">
                <div class="inline-flex items-center overflow-hidden rounded-md">
                  <button
                    x-on:click="isActive = !isActive"
                    class="h-full p-2 ">
                    <span class="sr-only">Menu</span>
                    <a
                      href="#"
                      class="nav-menu <?= ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'kategori') || $this->uri->segment(2) === 'detail_barang' ? 'active' : '' ?>">
                      Category Products
                      <i class="fa-solid fa-caret-down"></i>
                      </svg>
                    </a>
                  </button>
                </div>

                <div
                  class="absolute end-0 z-10 mt-2 w-36 rounded-md border border-gray-100 bg-white shadow-lg"
                  role="menu"
                  x-cloak
                  x-transition
                  x-show="isActive"
                  x-on:click.away="isActive = false"
                  x-on:keydown.escape.window="isActive = false">
                  <div class="p-2">
                    <?php foreach ($kategori as $key => $value) { ?>
                      <a
                        href="<?= base_url('home/kategori/' . $value->id_kategori) ?>"
                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 <?= ($this->uri->segment(3) == $value->id_kategori) || ($this->uri->segment(2) === 'detail_barang' && $value->id_kategori == $barang->id_kategori) ? 'active' : '' ?>"
                        role="menuitem">
                        <?= $value->nama_kategori ?>
                      </a>
                    <?php  } ?>
                  </div>
                </div>
              </div>
            </li>
            <!------------------------ Category ------------------------>

            <!----------------------- Testimonial ---------------------->
            <li>
              <a class="nav-menu <?= $this->uri->segment(2) === 'testimonial' ? 'active' : '' ?>"
                href="<?= base_url('home/#testimonial') ?>">Testimonial</a>
            </li>
            <!----------------------- Testimonial ---------------------->

            <!-------------------------- FAQs -------------------------->
            <li>
              <a class="nav-menu <?= $this->uri->segment(2) === 'faqs' ? 'active' : '' ?>"
                href="<?= base_url('home/#faqs') ?>">FAQs</a>
            </li>
            <!-------------------------- FAQs -------------------------->


            <!------------------- Keranjang Belanja -------------------->
            <?php
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
              $jml_item = $jml_item + $value['qty'];
            }
            ?>
            <li class="dropdown">
              <a class="nav-menu" data-toggle="dropdown" href="#">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge badge-warning navbar-badge" style="position: absolute;"><?= $jml_item ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-top: 17px;">
                <?php if (empty($keranjang)) { ?>
                  <a href="#" class="dropdown-item">
                    <p>Keranjang Belanja Kosong</p>
                  </a>
                  <?php  } else {
                  foreach ($keranjang as $key => $value) {
                    $barang = $this->m_home->detail_barang($value['id']);
                  ?>
                    <!-- barang Start -->
                    <a href="#" class="dropdown-item">
                      <div class="media">
                        <img src="<?= base_url('img/kategori/' . $barang->gambar) ?>" alt="User Avatar" class="img-size-50 mr-3">
                        <div class="media-body">
                          <h3 class="dropdown-item-title">
                            <?= $value['name'] ?>
                          </h3>
                          <p class="text-sm"> <?= $value['qty'] ?> x IDR. <?= number_format($value['price'], 0) ?></p>
                          <p class="text-sm text-muted">
                            <i class="fa fa-calculator"></i> IDR. <?php echo number_format($value['subtotal'], 0); ?>
                          </p>
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                  <?php } ?>

                  <a href="#" class="dropdown-item">
                    <div class="media">
                      <div class="media-body">
                        <tr>
                          <td colspan="2"> </td>
                          <td class="right"><strong>Total : </strong></td>
                          <td class="right">IDR. <?= number_format($this->cart->total(), 0); ?></td>
                        </tr>
                      </div>
                    </div>
                  </a>
                  <!-- barang End -->
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">View Chart</a>
                  <a href="<?= base_url('belanja/checkout') ?>" class="dropdown-item dropdown-footer">Check Out</a>
                <?php } ?>
              </div>
            </li>
            <!------------------ Keranjang Belanja End ------------------->

            <!------------------------ Profile --------------------------->
            <li class="nav-item" style="margin-left: 5px;">
              <?php if ($this->session->userdata('email') == "") { ?>
                <a class="nav-menu <?= $this->uri->segment(2) === 'login' ? 'active' : '' ?>" href="<?= base_url('pelanggan/login') ?>" href="<?= base_url('pelanggan/login') ?>">
                  <i class="fa-solid fa-user"></i>
                </a>
              <?php } else { ?>
                <a class="nav-menu" data-toggle="dropdown" href="#">
                  <span class="d-flex align-items-center">
                    <img src="<?= base_url('img/profile/' . $this->session->userdata('foto')) ?>" alt="AdminLTE Logo" class="nav-profile-img img-circle elevation-3 ml-2" style="opacity: .8">
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="margin-right: 20px;">
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Akun Saya
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                    <i class="fas fa-shopping-cart mr-2"></i> Pesanan Saya
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                </div>
              <?php } ?>
            </li>
            <!------------------------ Profile --------------------------->

          </ul>
        </nav>
      </div>
    </div>
  </div>
  </div>
  <script>
    $(document).ready(function() {
      const cartIcon = $('.fa-shopping-cart'); // Ikon keranjang
      const viewChartLink = $('#view-chart-link'); // Link View Chart

      // Tambahkan 'active' jika URL saat ini adalah halaman belanja
      if (window.location.href.indexOf("belanja") > -1) {
        cartIcon.addClass('active'); // Aktifkan ikon keranjang
        viewChartLink.addClass('active'); // Aktifkan tombol View Chart
      }

      // Saat klik pada 'View Chart'
      viewChartLink.on('click', function() {
        cartIcon.addClass('active'); // Tambahkan active ke ikon keranjang
        viewChartLink.addClass('active'); // Tambahkan active ke tombol View Chart
      });
    });
  </script>

</header>
<!------------------------- NAVBAR ------------------------->

<!------------------------ CONTACT ------------------------->
<div class="fab-container">
  <div class="fab fab-icon-holder">
    <i class="fa fa-plus"></i>
  </div>

  <ul class="fab-options">
    <li>
      <span class="fab-label">Whatsapp</span>
      <div class="fab-icon-holder">
        <a href="https://wa.me/6285811886269?text=Halo,%20saya%20tertarik%20untuk%20mengetahui%20lebih%20lanjut%20tentang%20layanan%20cucian%20yang%20Anda%20tawarkan.%20Bisakah%20Anda%20memberikan%20informasi%20terkait harga,%20jenis%20layanan,%20dan%20waktu%20pengerjaan?%20Terimakasih."><i class="fa-brands fa-whatsapp" style="font-size: 25px; margin-top: 13px;"></i></a>
      </div>
    </li>
    <li>
      <span class="fab-label">Instagram</span>
      <div class="fab-icon-holder">
        <a href="https://www.instagram.com/laundry_bubblewash?igsh=MnRwZTZncmNlNW5o"><i class="fa-brands fa-instagram" style="font-size: 25px; margin-top: 13px;"></i></a>
      </div>
    </li>
    <li>
      <span class="fab-label">Facebook</span>
      <div class="fab-icon-holder">
        <a href="https://www.facebook.com/ubsi.kaliabang?locale=id_ID"><i class="fa-brands fa-square-facebook" style="font-size: 25px; margin-top: 13px;"></i></a>
      </div>
    </li>
    <li>
      <span class="fab-label">Tiktok</span>
      <div class="fab-icon-holder">
        <a href="https://www.tiktok.com/@ubsi_official"><i class="fa-brands fa-tiktok" style="font-size: 25px; margin-top: 13px;"></i></a>
      </div>
    </li>
    <li>
      <span class="fab-label">Telegram</span>
      <div class="fab-icon-holder">
        <a href="https://t.me/+P-eOfvujcbU0MjQ1"><i class="fa-brands fa-telegram" style="margin-top: 10px;"></i></a>
      </div>
    </li>
  </ul>
</div>
<!------------------------ CONTACT ------------------------->