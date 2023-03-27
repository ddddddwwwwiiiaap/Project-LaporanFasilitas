<?php
$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as proses  from tb_pengaduan where status='Proses'");
while ($data = $sql->fetch_assoc()) {
	$proses = $data['proses'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as tanggapi  from tb_pengaduan where status='Tanggapi'");
while ($data = $sql->fetch_assoc()) {
	$tangan = $data['tanggapi'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengaduan) as selesai  from tb_pengaduan where status='Selesai'");
while ($data = $sql->fetch_assoc()) {
	$sel = $data['selesai'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengadu) as orang  from tb_pengadu");
while ($data = $sql->fetch_assoc()) {
	$or = $data['orang'];
}
?>

<hr>
<div>
	<center>
		<h3>Selamat Datang,
			<?= $data_nama ?> -
			<?= $data_level ?>
		</h3>
	</center>
</div>
<hr>
<div class="col-md-4 col-sm-6 col-xs-6">
	<div class="panel panel-back noti-box">
		<span class="icon-box bg-color-red set-icon" style="display: block; float: left; margin: 0px 10px 10px 0px; width: 60px; height: 60px; line-height: 65px; text-align: center; font-size: 25px;">
			<i class="fa fa-bars"></i>
		</span>
		<div class="text-box">
			<h3>
				<?= $proses; ?>
			</h3>
			<p>Pengaduan Menunggu</p>
			<a href="?page=aduan_admin">Detail
			</a>
		</div>
	</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
	<div class="panel panel-back noti-box">
		<span class="icon-box bg-color-green set-icon" style="display: block; float: left; margin: 0px 10px 10px 0px; width: 60px; height: 60px; line-height: 65px; text-align: center; font-size: 25px;">
			<i class="fa fa-bars"></i>
		</span>
		<div class="text-box">
			<h3>
				<?= $tangan; ?>
			</h3>
			<p>Pengaduan Ditanggapi</p>
			<a href="?page=aduan_admin_tanggap">Detail
			</a>
		</div>
	</div>
</div>
<div class="col-md-4 col-sm-6 col-xs-6">
	<div class="panel panel-back noti-box">
		<span class="icon-box bg-color-blue set-icon" style="display: block; float: left; margin: 0px 10px 10px 0px; width: 60px; height: 60px; line-height: 65px; text-align: center; font-size: 25px;">
			<i class="fa fa-bars"></i>
		</span>
		<div class="text-box">
			<h3>
				<?= $sel; ?>
			</h3>
			<p>Pengaduan Selesai</p>
			<a href="?page=aduan_admin_selesai">Detail
			</a>
		</div>
	</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Copyrights -->
<footer>
	<div class="bg-light py-4">
		<div class="container text-center">
			<a href="" target="blank">© 2023 - Dwi Aprilya Anggoro Putry & Prizandeva Oktura Rizqy</a>
		</div>
	</div>
</footer>
<!-- End -->