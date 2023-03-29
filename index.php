<?php

session_start();
if (isset($_SESSION['ses_nama']) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_level = $_SESSION["ses_level"];
	$data_grup = $_SESSION["ses_grup"];
}

include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>LAPORAN FASILITAS</title>
	<link rel="icon" href="https://ppid.dephub.go.id/informasi_serta_merta.png" type="image/icon type">
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<link rel="stylesheet" href="dist/css/select2.min.css" />

	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<style>
		.swal2-popup {
			font-size: 1.6rem !important;
		}
	</style>

</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; background-color: #014a94">
			<div class="navbar-header" style="height: 100; background-color: #014a94">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse" style="margin-top: 1px;">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="dashboard.php" class="navbar-brand" style="font-size: 20px; background-color: #014a94">
					<i class="glyphicon glyphicon-send"></i>LAPORAN</a>
			</div>
			<div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 14px;">
				<?= $data_nama; ?>|
				<?= $data_level; ?>
				<a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar dari aplikasi ini ?')" class="btn btn-danger square-btn-adjust">Keluar</a>
			</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center">
						<img src="https://ppid.dephub.go.id/informasi_serta_merta.png" class="user-image img-responsive" width="50%" />
					</li>

					<!-- Level  -->
					<?php
					if ($data_level == "Administrator") {
					?>

						<li>
							<a href="?page=admin-def" style="padding: 10px 5px;">
								<i class="fa fa-dashboard fa-2x"></i> DASHBOARD</a>
						</li>

						<li>
							<a href="#" style="padding: 10px 5px;">
								<i class="fa fa-file fa-2x" ></i> MASTER DATA
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="?page=pengadu_view">DATA PENGADU</a>
								</li>
								<li>
									<a href="?page=jenis_view">JENIS PENGADUAN</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#"style="padding: 10px 5px;">
								<i class="fa fa-bell fa-2x"></i> PENGADUAN
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="?page=aduan_admin">MENUNGGU</a>
								</li>
								<li>
									<a href="?page=aduan_admin_tanggap">DITANGGAPI</a>
								</li>
								<li>
									<a href="?page=aduan_admin_selesai">SELESAI</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="?page=laporan" style="padding: 10px 5px;">
								<i class="fa fa-print fa-2x"></i> LAPORAN
							</a>
						</li>

						<li>
							<a href="?page=telegram" style="padding: 10px 5px;">
								<i class="fa fa-comments-o fa-2x"></i> TELEGRAM</a>
						</li>

						<li>
							<a href="?page=user_data" style="padding: 10px 5px;">
								<i class="fa fa-user fa-2x"></i> PENGGUNA</a>
						</li>

						</li>

					<?php
					} elseif ($data_level == "Petugas") {
					?>
						<li>
							<a href="?page=petugas-def" style="padding: 10px 5px;">
								<i class="fa fa-dashboard fa-2x"></i>DASHBOARD</a>
						</li>
						<li>
							<a href="#"style="padding: 10px 5px;">
								<i class="fa fa-bell fa-2x"></i> PENGADUAN
								<span class="fa arrow"></span>
							</a>
							<ul class="nav nav-second-level">
								<li>
									<a href="?page=aduan_admin">MENUNGGU</a>
								</li>
								<li>
									<a href="?page=aduan_admin_tanggap">DITANGGAPU</a>
								</li>
								<li>
									<a href="?page=aduan_admin_selesai">SSELESAI</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="?page=laporan" style="padding: 10px 5px;">
								<i class="fa fa-print fa-2x"></i> LAPORAN
							</a>
						</li>

					<?php
					} elseif ($data_level == "Pengadu") {
					?>

						<li>
							<a href="?page=pengadu" style="padding: 10px 5px;">
								<i class="fa fa-dashboard fa-2x"></i> DASHBOARD</a>
						</li>


						<li>
							<a href="?page=aduan_view" style="padding: 10px 5px;">
								<i class="fa fa-bell fa-2x"></i> PENGADUAN
							</a>
						</li>

				</ul>

			<?php
					}
			?>
			</div>
		</nav>
		<!-- /. PAGE WRAPPER  -->
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<marquee>
							<b>- SISTEM INFORMASI LAPORAN FASILITAS BERBASIS WEBSITE | FITUR TAMBAHAN YANG ADA PADA APLIKASI INI MENGGUNAKAN
								REALTIME NOTIFIKASI TELEGRAM -
							</b>
						</marquee>
						<!-- Menjadikan page web dinamis, 
                dengan menjadikan page lain yang dipanggil sebagai sebuah konten dari dashboard.php-->
						<?php
						if (isset($_GET['page'])) {
							$hal = $_GET['page'];

							switch ($hal) {
                case 'admin-def':
                  include "default/admin.php";
                  break;
                case 'petugas-def':
                  include "default/tugas.php";
                  break;
                case 'pengadu':
                  include "default/pengadu.php";
                  break;

									//User
                  case 'user_data':
                    include "admin/pengguna/pengguna_tampil.php";
                    break;
                  case 'pengguna_tambah':
                    include "admin/pengguna/pengguna_tambah.php";
                    break;
                  case 'pengguna_ubah':
                    include "admin/pengguna/pengguna_ubah.php";
                    break;
                  case 'pedu_ubah':
                    include "admin/pengguna/pedu_ubah.php";
                    break;
                  case 'pengguna_hapus':
                    include "admin/pengguna/pengguna_hapus.php";
                    break;

									//jenis
                  case 'jenis_view':
                    include "admin/jenis/jenis_tampil.php";
                    break;
                  case 'jenis_tambah':
                    include "admin/jenis/jenis_tambah.php";
                    break;
                  case 'jenis_ubah':
                    include "admin/jenis/jenis_ubah.php";
                    break;
                  case 'jenis_hapus':
                    include "admin/jenis/jenis_hapus.php";
                    break;
  

									//pengadu
                  case 'pengadu_view':
                    include "admin/pengadu/pengadu_tampil.php";
                    break;
                  case 'pengadu_tambah':
                    include "admin/pengadu/pengadu_tambah.php";
                    break;
                  case 'pengadu_ubah':
                    include "admin/pengadu/pengadu_ubah.php";
                    break;
                  case 'pengadu_hapus':
                    include "admin/pengadu/pengadu_hapus.php";
                    break;

									//aduan admin
                  case 'aduan_admin':
                    include "admin/aduan/adu_tampil.php";
                    break;
                  case 'aduan_admin_tanggap':
                    include "admin/aduan/adu_tanggap.php";
                    break;
                  case 'aduan_admin_selesai':
                    include "admin/aduan/adu_selesai.php";
                    break;
                  case 'aduan_kelola':
                    include "admin/aduan/adu_ubah.php";
                    break;


									//telegram
                  case 'telegram':
                    include "admin/telegram/telegram.php";
                    break;
  
                  case 'laporan':
                    include "admin/laporan/laporan.php";
                    break;
                    //logout
                  case 'logout':
                    include "logout.php";
                    break;

					//laporan
					case 'laporan':
						include "admin/laporan/laporan.php";
						break;

									//aduan
                  case 'aduan_view':
                    include "pengadu/aduan/adu_tampil.php";
                    break;
                  case 'aduan_tambah':
                    include "pengadu/aduan/adu_tambah.php";
                    break;
                  case 'aduan_ubah':
                    include "pengadu/aduan/adu_ubah.php";
                    break;
                  case 'aduan_hapus':
                    include "pengadu/aduan/adu_hapus.php";
                    break;


									//default
								default:
									echo "<center><h1> ERROR !</h1></center>";
									break;
							}
						} else {
							if ($data_level == "Administrator") {
								include "default/admin.php";
							} elseif ($data_level == "Petugas") {
								include "default/tugas.php";
							} elseif ($data_level == "Pengadu") {
								include "default/pengadu.php";
							}
						}
						?>
					</div>
				</div>
				<!-- /. WRAPPER  -->
				<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
				<!-- JQUERY SCRIPTS -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS -->
				<script src="assets/js/bootstrap.min.js"></script>
				<!-- METISMENU SCRIPTS -->
				<script src="assets/js/jquery.metisMenu.js"></script>
				<!-- CUSTOM SCRIPTS -->

				<script src="assets/js/dataTables/jquery.dataTables.js"></script>
				<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
				<script>
					$(document).ready(function() {
						$('#dataTables-example').dataTable();
					});
				</script>

				<script src="dist/js/select2.min.js"></script>
				<script>
					$(document).ready(function() {
						$("#no_pdd").select2({
							placeholder: "-- Pilih Penduduk --"
						});
						$("#no_kk").select2({
							placeholder: "-- Pilih No.KK --"
						});
					});
				</script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

				<!-- CUSTOM SCRIPTS -->
				<script src="assets/js/custom.js"></script>

</body>

</html>