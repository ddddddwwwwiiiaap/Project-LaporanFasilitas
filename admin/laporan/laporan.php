<?php $author = $data_id ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<i class="glyphicon glyphicon-print"></i>
		<b>Kelola Laporan</b>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label>Jenis Aduan</label>
						<select name="jenis" class="form-control">
							<option value="">- Pilih -</option>
							<?php
							// ambil data dari database
							$query = "select * from tb_jenis";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
							?>
								<option value="<?php echo $row['id_jenis'] ?>">
									<?php echo $row['jenis'];  ?>
								</option>
							<?php
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label>Tgl Awal</label>
						<input type="date" class="form-control" name="tgl_1" required />
					</div>

					<div class="form-group">
						<label>Tgl Akhir</label>
						<input type="date" class="form-control" name="tgl_2" required />
					</div>


					<div>
						<input type="submit" name="cetak" value="Cetak" class="btn btn-primary">
					</div>
			</div>
			</form>
		</div>
	</div>
</div>

<?php
//memanggil data tb_pengaduan berdasarkan tb_jenis dan berdasarkan tanggal
if (isset($_POST['cetak'])) {
	$jenis = $_POST['jenis'];
	$tgl_1 = $_POST['tgl_1'];
	$tgl_2 = $_POST['tgl_2'];
	$sql = $koneksi->query("select a.id_pengaduan, a.judul, a.alamat, a.foto, a.status, j.jenis
from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where a.jenis='$jenis' and a.waktu_aduan between '$tgl_1' and '$tgl_2'");
	$data = $sql->fetch_assoc();
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<i class="glyphicon glyphicon-book"></i>
			<b>Data Aduan</b>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Alamat</th>
							<th>Foto</th>
							<th>status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = $koneksi->query("select a.id_pengaduan, a.judul, a.alamat, a.foto, a.status, j.jenis
						from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where a.jenis='$jenis' and a.waktu_aduan between '$tgl_1' and '$tgl_2'");
						while ($data = $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['judul']; ?>
								</td>
								<td>
									<?php echo $data['jenis']; ?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
								</td>
								<td>
									<img src="images/<?php echo $data['foto']; ?>" width="100" height="100">
								</td>
								<td>
									<?php echo $data['status']; ?>
								</td>
								<td>
									
									<a href="export_excel.php?id=<?php echo $data['id_pengaduan']; ?>" type="submit" name="cetak" value="Cetak" class="btn btn-primary">Cetak</a>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
}
?>