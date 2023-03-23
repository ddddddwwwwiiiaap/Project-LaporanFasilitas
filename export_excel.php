<?php
//import koneksi ke database
include "inc/koneksi.php";

?>
<html>
<head>
  <title>Data Aduan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Data Aduan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
					<table id="mauexport" class="text-center">

						
						<thead class="text-capitalize">
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>No Telpon</th>
								<th>Foto</th>
								<th>Status</th>
								<th>Alamat</th>
								<th>Keterangan</th>
								<th>Jenis</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							if (isset($_GET['kode'])) {
								$sql_cek = "select a.id_pengaduan, a.judul,a.no_telpon, a.foto, a.status,a.alamat, a.keterangan, j.id_jenis, j.jenis 
								  from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where id_pengaduan='" . $_GET['kode'] . "'";
								$query_cek = mysqli_query($koneksi, $sql_cek);
								while ($data_cek = mysqli_fetch_array($query_cek)) {
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data_cek['judul']; ?></td>
										<td><?php echo $data_cek['no_telpon']; ?></td>
										<td><img src="foto/<?php echo $data_cek['foto']; ?>" width="100px" onClick="window.open(this.src)" role="button" tabIndex="0"></td>
										<td><?php echo $data_cek['status']; ?></td>
										<td><?php echo $data_cek['alamat']; ?></td>
										<td><?php echo $data_cek['keterangan']; ?></td>
										<td><?php echo $data_cek['jenis']; ?></td>
									</tr>
							<?php
									$no++;
								}
							}
							?>
						</tbody>
					</table>

</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

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

	

</body>

</html>