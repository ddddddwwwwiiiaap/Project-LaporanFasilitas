<?php
require 'koneksi.php';
//memanggil data tb_pengaduan berdasarkan tb_jenis dan export ke pdf
if (isset($_POST['cetak'])) {
    $jenis = $_POST['jenis'];
    $sql = $koneksi->query("select a.id_pengaduan, a.judul, a.alamat, a.foto, a.status, j.jenis
from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where a.jenis='$jenis'");
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
                            from tb_pengaduan a join tb_jenis j on a.jenis=j.id_jenis where a.jenis='$jenis'");
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
                                        <a href="?page=detail_pengaduan&id=<?php echo $data['id_pengaduan']; ?>" title="Detail" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-list"></i></a>
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
    $content = ob_get_clean();
    // conversion HTML => PDF
    require_once 'html2pdf/html2pdf.class.php';
    try {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('laporan.pdf');
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
?>
