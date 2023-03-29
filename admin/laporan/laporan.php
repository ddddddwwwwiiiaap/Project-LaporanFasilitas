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

					<div class="form-group">
						<label>Status</label>
						<select name="status" class="form-control">
							<option value="">- Pilih -</option>
							<option value="Proses">Proses</option>
							<option value="Tanggapi">Tanggapi</option>
							<option value="Selesai">Selesai</option>
						</select>
					</div>

					<div>
						<input type="submit" name="cetak" value="Cetak" class="btn btn-primary">
					</div>
			</div>
			</form>
		</div>
	</div>
</div>



<div class="panel panel-info">
	<div class="panel-heading">
		<i class="glyphicon glyphicon-book"></i>
		<b>Data Aduan</b>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<table id="mauexport" class="text-center">
					<thead class="text-capitalize">
						<tr>
							<th>
								<center>
									No
								</center>
							</th>
							<th>
								<center>
									Nama
								</center>
							</th>
							<th>
								<center>
									Jenis
								</center>
							</th>
							<th>
								<center>
									Alamat
								</center>
							</th>
							<th>
								<center>
									Tanggal
								</center>
							</th>
							<th>
								<center>
									Pesan
								</center>
							</th>
							<th>
								<center>
									Foto
								</center>
							</th>
							<th>
								<center>
									Status
								</center>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						//buat perulangan if else jika belum klik cetak maka ada text kosong jika sudah klik cetak maka akan muncul data
						if (isset($_POST['cetak'])) {
							$jenis = $_POST['jenis'];
							$tgl_1 = $_POST['tgl_1'];
							$tgl_2 = $_POST['tgl_2'];
							$status = $_POST['status'];
							$sql = $koneksi->query("select a.id_pengaduan, a.judul, a.alamat, a.waktu_aduan, a.keterangan, a.foto, a.status, j.jenis from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where a.jenis='$jenis' and a.waktu_aduan between '$tgl_1' and '$tgl_2' and a.status='$status'");
						} else {
							$sql = $koneksi->query("select a.id_pengaduan, a.judul, a.alamat, a.waktu_aduan, a.keterangan, a.foto, a.status, j.jenis from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis");
						}
						while ($data = $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<center>
										<?php echo $no++; ?>
									</center>
								</td>
								<td>
									<center>
										<?php echo $data['judul']; ?>
									</center>
								</td>
								<td>
									<center>
										<?php echo $data['jenis']; ?>
									</center>
								</td>
								<td>
									<center>
										<?php echo $data['alamat']; ?>
									</center>
								</td>
								<td>
									<center>
										<?php echo $data['waktu_aduan']; ?>
									</center>
								</td>
								<td>
									<center>
										<!--jika text kepanjangan akan ke enter-->
										<?php echo substr($data['keterangan'], 0, 30); ?>
									</center>
								</td>
								<td>
									<center>
										<img src="foto/<?php echo $data['foto']; ?>" width="100px" onClick="window.open(this.src)" role="button" tabIndex="0" />
									</center>
								</td>
								<td>
									<center>
										<?php echo $data['status']; ?>
									</center>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#mauexport').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'excel', 'pdf'
			]
		});
	});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
