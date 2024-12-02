<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?> | Luxora Interiors</title>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="layout/style_frontend.css">
  <!-- CSS -->

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/kutty@latest/dist/kutty.min.js"></script>
  <!-- Tailwind -->

  <!-- Icon -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!-- Icon -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Google Font: Source Sans Pro -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- DataTables -->

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- SweetAlert2 -->

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <!-- Theme style -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery -->

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap 4 -->

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- DataTables  & Plugins -->

  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>template/dist/js/demo.js"></script>
  <!-- AdminLTE for demo purposes -->

</head>
<style>
  @tailwind base;
  @tailwind components;
  @tailwind utilities;

  * {
    font-family: serif;
  }

  a:hover {
    color: white;
  }

  body {
    background: linear-gradient(139deg, rgba(246, 211, 77, 1) 0%, rgba(242, 222, 149, 1) 11%, rgba(238, 233, 225, 1) 32%, rgba(238, 233, 225, 1) 42%, rgba(49, 134, 123, 1) 100%);
  }

  .container-fc {
    padding: 10px 50px 120px;
  }

  .container-about {
    padding: 10px 50px 0px;
  }

  /*---------- NAVBAR ------------------------*/
  .navbar {
    background: linear-gradient(270deg, rgba(11, 84, 75, 1) 0%, rgba(67, 153, 142, 1) 39%, rgba(67, 153, 142, 1) 59%, rgba(12, 73, 64, 1) 100%);
    background-size: cover;
    background-repeat: no-repeat;
    padding: 10px 80px;
    margin-top: 0px;
  }

  .navbar-badge {
    position: absolute;
    top: -2px;
    /* Sesuaikan nilai ini untuk vertikal */
    right: -13px;
    /* Sesuaikan nilai ini untuk horizontal */
  }

  .logo {
    border-radius: 2px;
  }

  .brand {
    color: white;
    font-size: 30px;
    margin-right: 13rem;
  }

  .brand span {
    font-weight: bold;
    font-size: 36px;
  }

  .nav-menu {
    color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
    padding-bottom: 7px;
    transition: 0.1s;
  }

  .nav-menu:hover {
    border-bottom: 1px solid white;
    color: white;
  }

  .nav-link {
    color: rgba(255, 255, 255, 0.5) !important;
    font-size: 20px !important;
    padding-bottom: 3px !important;
    transition: 0.1s !important;
  }

  .nav-link:hover {
    color: white !important;
  }

  .active {
    color: white;
    padding-bottom: 8px;
    border-bottom: 1px solid white;
    font-weight: bold;
  }

  .nav-profile-img {
    width: 40px;
  }

  .nav-btn-login {
    border: none;
    padding: 8px 16px 13px;
    width: 220px;
    border-radius: 6px;
    box-shadow: inset -4px -4px rgba(0, 0, 0, 0.4);
    cursor: pointer;
    color: white;
    -webkit-text-stroke: 1px rgba(191, 191, 191, 0.409);
    font-weight: bold;
    font-size: 18px;
    background-size: 200%;
    background-image: linear-gradient(to left, #ff4500, #f9cd26, #ff4500);
    transition: 0.6s;
  }

  .nav-btn-login:hover {
    background-position: right;
  }

  /*---------- NAVBAR ------------------------*/

  /*---------------------- CONTACT ------------------------*/
  .fab-container {
    position: fixed;
    bottom: 15px;
    right: 25px;
    z-index: 999;
    cursor: pointer;
  }

  .fab-icon-holder {
    width: 50px;
    height: 50px;
    border-radius: 100%;
    background: #0b544b;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  }

  .fab-icon-holder:hover {
    opacity: 0.8;
  }

  .fab-icon-holder i {
    justify-content: center;
    align-items: center;
    display: flex;
    margin-top: 20px;
    font-style: 150px;
    color: #F2EDDB;
  }

  .fab {
    width: 60px;
    height: 60px;
    background: #0b544b;
  }

  .fab-options {
    list-style-type: none;
    margin: 0;
    position: absolute;
    bottom: 70px;
    right: 0;
    opacity: 0;
    transition: all 0.3s ease;
    transform: scale(0);
    transform-origin: 85% bottom;
  }

  .fab:hover+.fab-options,
  .fab-options:hover {
    opacity: 1;
    transform: scale(1);
    font-size: 30px;
  }

  .fab-options li {
    display: flex;
    justify-content: flex-end;
    padding: 5px;
  }

  .fab-label {
    padding: 2px 7px;
    align-self: center;
    user-select: none;
    white-space: nowrap;
    border-radius: 5px;
    font-size: 16px;
    background: #F2EDDB;
    color: #0b544b;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    margin-right: 10px;
  }

  /*---------------------- CONTACT ------------------------*/

  /*---------- BANNER ------------------------*/
  .banner {
    background: linear-gradient(270deg, rgba(11, 84, 75, 1) 0%, rgba(67, 153, 142, 1) 39%, rgba(67, 153, 142, 1) 59%, rgba(12, 73, 64, 1) 100%);
  }

  .banner-img {
    background-size: 100%;
    animation: change 20s infinite ease-in-out;
  }

  @keyframes change {
    0% {
      background-image: url('<?= base_url('img/banner/1.png') ?>');
    }

    20% {
      background-image: url('<?= base_url('img/banner/2.png') ?>');
    }

    40% {
      background-image: url('<?= base_url('img/banner/3.png') ?>');
    }

    60% {
      background-image: url('<?= base_url('img/banner/1.png') ?>');
    }

    80% {
      background-image: url('<?= base_url('img/banner/2.png') ?>');
    }

    100% {
      background-image: url('<?= base_url('img/banner/3.png') ?>');
    }
  }



  .banner h2 {
    color: white;
    font-size: 33px;
  }

  .banner p {
    font-size: 19px;
  }

  .btn-banner {
    border: none;
    margin: 20px;
    padding: 13px 16px;
    width: 220px;
    border-radius: 6px;
    box-shadow: inset -4px -4px rgba(0, 0, 0, 0.4);
    cursor: pointer;
    color: white;
    -webkit-text-stroke: 1px rgba(191, 191, 191, 0.409);
    font-weight: bold;
    font-size: 23px;
    background-size: 200%;
    background-image: linear-gradient(to left, #ff4500, #f9cd26, #ff4500);
    transition: 0.6s;
  }

  .btn-banner:hover {
    background-position: right;
  }

  /*---------- BANNER ------------------------*/

  /*---------- TITLE -------------------------*/
  .title-left {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    margin-left: 80px;
    margin-top: 70px;
  }

  .title-left span {
    color: #c41212;
  }

  .des-title-left {
    margin-left: 81px;
    font-size: 17px;
    color: #707e7c;
  }

  /*---------- TITLE -------------------------*/

  /*---------- ABOUT -------------------------*/
  .title-about {
    color: #0b544b;
    font-size: 35px;
    font-weight: bold;
    font-family: serif;
    margin-left: 6rem;
    margin-top: 33px;
  }

  .title-about span {
    color: #c41212;
  }

  .des-title-about {
    color: #707e7c;
    font-size: 17px;
    margin-left: 6.1rem;
    margin-top: 78px;
  }

  .about {
    background-color: #f3d0d0;
  }

  .tagline-about {
    color: #0b544b;
  }

  .des-about {
    color: #0b544b;
  }

  /*---------- ABOUT -------------------------*/


  /*---------- GALLERY --------------*/
  .container-galeri {
    padding: 25px 35px 30px;
  }

  .title-galeri {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    margin-top: 30px;
    margin-left: 30px;
  }

  .title-galeri span {
    color: #c41212;
  }

  .des-title-galeri {
    font-size: 17px;
    color: #707e7c;
    margin-left: 30px;
  }

  /*---------- GALLERY --------------*/


  /*-------- TESTIMONIAL ------------*/
  blockquote {
    background-color: #F2EDDB !important;
    border-left: none !important;
    border-top: 4px solid #0b544b;
    border-bottom: 4px solid #0b544b;
    border-radius: 10px;
  }

  .title-testi {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    text-align: center;
    margin-top: 70px;
  }

  .title-testi span {
    color: #c41212;
  }

  .des-title-testi {
    font-size: 17px;
    color: #707e7c;
    text-align: center;
  }

  /*-------- TESTIMONIAL ------------*/

  /*--------------------- OUR TEAM ------------------------*/
  .title-team {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    text-align: center;
    margin-top: 30px;
  }

  .title-team span {
    color: #c41212;
  }

  .des-title-team {
    font-size: 17px;
    color: #707e7c;
    text-align: center;
  }

  .card-team:hover {
    background-color: #0b544b;
  }

  .card-team {
    background: linear-gradient(180deg, rgba(60, 118, 111, 1) 0%, rgba(147, 175, 163, 1) 66%, rgba(242, 237, 219, 1) 100%);
  }

  .nama-team {
    color: white;
  }

  .nim-team {
    color: white;
  }

  .des-team {
    color: white;
  }

  .icon-team {
    color: white;
  }

  .container-team {
    padding: 10px 70px 80px;
  }

  /*--------------------- OUR TEAM ------------------------*/

  /*---------- FAQs -------------*/
  .title-faq {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    margin-left: 60px;
  }

  .title-faq span {
    color: #c41212;
  }

  .des-title-faq {
    margin-left: 61px;
    font-size: 17px;
    color: #707e7c;
  }

  .container-faq {
    padding: 0 50px 30px;
  }

  /*---------- FAQs -------------*/

  /*-- Profil --*/
  .btn-edit-profil {
    background: #0b544b;
    color: white;
    padding: 10px 30px;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.5);
    border-radius: 5px;
    margin-left: 50px;
    margin-top: 10px;
  }

  .btn-edit-profil:hover {
    background: #F2EDDB;
    color: black;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.5);
  }

  /*--------------------- KATEGORI ------------------------*/

  .title-kategori {
    color: #0b544b;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    margin-left: 10px;
    margin-top: 30px;
  }

  .title-kategori span {
    color: #c41212;
  }

  .des-title-kategori {
    margin-left: 11px;
    font-size: 17px;
    color: #707e7c;
  }

  /* Container untuk banner dan produk */
  .main-container-kategori {
    display: flex;
    gap: 15px;
  }

  .container-3 {
    padding: 10px 30px 2rem 10px;
  }


  /* Banner vertikal */
  .banner-vertical-kategori {
    background-image: url('../../img/kategori/v-banner2.png');
    /* Sesuaikan path gambar */
    background-size: cover;
    background-position: center;
    width: 330px;
    /* Lebar banner */
    padding: 20px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    border-radius: 8px;
    margin: 20px 10px 20px 30px;
  }

  .banner-title-kategori {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .banner-text-kategori {
    font-size: 1rem;
    opacity: 0.85;
  }


  /* Styling item produk */
  .bg-grid {
    background: linear-gradient(180deg, rgba(11, 84, 75, 1) 0%, rgba(238, 233, 225, 1) 100%);
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
  }

  .bg-grid:hover {
    transform: scale(1.03);
  }

  /* Judul Produk */
  .title-produk {
    font-size: 21px;
    font-weight: 500;
    text-align: center;
    margin-bottom: 10px;
    color: white;
  }

  /* Gambar Produk */
  .img-produk {
    width: 100%;
    height: auto;
    border-radius: 8px;
    object-fit: cover;
    transition: filter 0.3s ease;
  }

  .harga-produk {
    font-size: 20px;
    margin-bottom: 10px;
    color: #c41212;
  }

  .group:hover .img-produk {
    filter: grayscale(50%);
  }

  .btn-produk-cart {
    color: white;
    background: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    margin-left: 7px;
  }

  .btn-produk-cart:hover {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4) !important;
  }

  .btn-produk-detail {
    color: #0b544b;
    background: #f9cd26;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    margin-left: 5px;
  }

  .btn-produk-detail:hover {
    color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4) !important;
  }

  .btn-merah {
    color: white;
    background-color: #c41212;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    border-radius: 5px;
  }


  /*--------------------- KATEGORI ------------------------*/

  /*---------------------- LOGIN --------------------------*/
  .btn-login {
    border: none;
    border-radius: 6px;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    padding-bottom: 10px;
    cursor: pointer;
    color: white;
    -webkit-text-stroke: 1px rgba(191, 191, 191, 0.409);
    font-weight: bold;
    font-size: 1.3rem;
    background-size: 200%;
    background-image: linear-gradient(to left, #ff4500, #f9cd26, #ff4500);
    transition: 0.6s;
  }

  .btn-login:hover {
    background-position: right;
  }

  /*---------------------- LOGIN --------------------------*/


  /*---------- CART --------------------------*/
  .card-cart {
    margin: 2rem;
    background: linear-gradient(129deg, rgba(242, 237, 219, 1) 0%, rgba(39, 122, 111, 1) 100%);
    box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(0, 0, 0, 0.4);
    border-radius: 15px;
  }

  .title-cart {
    color: #f9cd26;
    font-size: 35px;
    font-family: serif;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
  }

  .title-cart span {
    color: #c41212;
  }

  .btn-cart-update {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    font-size: 1rem;
    color: white;
    background: #0b544b;
    padding: 10px 15px !important;
    margin-right: 10px;
  }

  .btn-cart-update:hover {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4) !important;
  }

  .btn-cart-clear {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    font-size: 1rem;
    color: white;
    background: #c41212;
    padding: 10px 15px !important;
    margin-right: 10px;
    border-radius: 5px;
  }

  .btn-cart-clear:hover {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4) !important;
  }

  .btn-cart-checkout {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    font-size: 1rem;
    color: #0b544b;
    background: #f9cd26;
    padding: 10px 15px !important;
  }

  .btn-cart-checkout:hover {
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4) !important;
  }

  .view-chart:active {
    background-color: #0b544b;
  }

  .checkout:active {
    background-color: #0b544b;
  }

  /*---------- CART --------------------------*/

  /*--------------------- CHECKOUT ------------------------*/
  .container-checkout {
    margin: 30px;
  }

  .invoice {
    padding: 30px;
    /*background: linear-gradient(139deg, rgba(246, 211, 77, 1) 0%, rgba(242, 222, 149, 1) 11%, rgba(238, 233, 225, 1) 32%, rgba(238, 233, 225, 1) 42%, rgba(49, 134, 123, 1) 100%);*/
    box-shadow: inset -5px -5px rgba(0, 0, 0, 0.4);
    border: none;
    border-radius: 20px;
  }

  /*--------------------- CHECKOUT ------------------------*/

  /*------------------- PESANAN SAYA ----------------------*/
  .container-pesanan {
    margin: 30px;
  }

  /*------------------- PESANAN SAYA ----------------------*/


  /*---------------------- FOOTER -------------------------*/
  .bg-footer {
    background: linear-gradient(270deg, rgba(11, 84, 75, 1) 0%, rgba(67, 153, 142, 1) 39%, rgba(67, 153, 142, 1) 59% 100%);
  }

  .img-footer {
    width: 300px;
  }

  /*---------------------- FOOTER -------------------------*/
</style>