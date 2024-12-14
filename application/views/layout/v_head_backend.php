<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Luxora Interiors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">


  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>template/dist/js/demo.js"></script>
</head>
<style>
  * {
    font-family: serif;
  }

  .container-1 {
    padding: 10px 50px 100px;
  }

  .container-2 {
    padding: 10px 25px 100px;
  }

  .sidebar-custom {
    background: linear-gradient(180deg, rgba(13, 106, 94, 1) 0%, rgba(67, 153, 142, 1) 47%, rgba(67, 153, 142, 1) 56%, rgba(11, 84, 75, 1) 100%);
  }

  .logo-brand {
    opacity: 1;
    width: 13rem;
    margin: 0 10px 0 10px;
    margin-bottom: 10px;
  }

  .sidebar .nav-link.active {
    background-color: rgba(255, 255, 255, 0.1) !important;
    color: white !important;
  }

  .sidebar .nav-treeview .nav-link.active {
    background-color: rgba(255, 255, 255, 0.1) !important;
    color: white !important;
  }


  .bg-selamat {
    background: linear-gradient(180deg, rgba(4, 140, 123, 1) 0%, rgba(192, 227, 223, 1) 100%);
    border-left: 2px solid #0b544b;
    border-right: 2px solid #0b544b;
    border-radius: 10px;
  }

  .img-selamat {
    float: right;
    width: 110px;
    position: absolute;
    margin-top: 25px;
  }

  .nav-dp {
    color: rgba(4, 140, 123, 0.4) !important;
  }

  .nav-dp:hover {
    color: #0b544b !important;
  }

  .nav-tabs .nav-link.active {
    border-top: 4px solid #0b544b !important;
    color: #0b544b !important;
    border-radius: 8px 8px 0 0;
  }

  .nav-tabs .nav-link {
    color: black;
  }

  .nav-tabs {
    background-color: rgba(4, 140, 123, 0.2);
    border-radius: 10px 10px 0 0;
  }

  .btn-add {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-add:hover {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-cek-bukti {
    color: white;
    background-color: #790000;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    margin-bottom: 5px;
  }

  .btn-cek-bukti:hover {
    color: white;
    background-color: #790000;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-proses {
    color: black;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-proses:hover {
    color: black;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-kirim {
    color: white;
    background-color: #12389f;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-kirim:hover {
    color: white;
    background-color: #12389f;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-detail-pesanan {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-detail-pesanan:hover {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-edit {
    color: black;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-edit:hover {
    color: black;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-hapus {
    color: white;
    background-color: #790000;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-hapus:hover {
    color: white;
    background-color: #790000;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-close-modal {
    color: white;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-close-modal:hover {
    color: white;
    background-color: orange;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-simpan-modal {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-simpan-modal:hover {
    color: white;
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
  }

  .btn-edit-profile {
    background: #0b544b;
    color: white;
    padding: 10px 30px;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.5);
    border-radius: 5px;
  }

  .btn-edit-profile:hover {
    background: #f9cd26;
    color: black;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.5);
  }

  .btn-ubah-profile {
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    color: white;
  }

  .btn-ubah-profile:hover {
    background-color: #0b544b;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    color: white;
  }

  .btn-batal-profile {
    background-color: #f9cd26;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    color: black;
  }

  .btn-batal-profile:hover {
    background-color: #f9cd26;
    box-shadow: inset -3px -3px rgba(0, 0, 0, 0.4);
    color: black;
  }

  .dropdown-profile:active {
    background-color: #0b544b;
  }

  .dropdown-logout:active {
    background-color: #0b544b;
  }
</style>