<?php


$title = 'DATA 10 BESAR PENYAKIT PER KAMAR';
include_once('../config.php');
include_once('../layout/header.php');
include_once('../layout/sidebar.php');
?>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA 10 BESAR PENYAKIT PER KAMAR
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Kamar</th>
										<th>Kode ICD X</th>
										<th>Diagnosa</th>
										<th>Jumlah</th>
									</tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT a.kd_kamar,c.kd_bangsal,d.nm_bangsal, count(a.diagnosa_akhir) as jumlahnya ,LEFT(a.diagnosa_akhir, 5)as kode,b.nm_penyakit FROM kamar_inap a join penyakit b join kamar c join bangsal d where a.diagnosa_akhir=b.kd_penyakit AND a.kd_kamar = c.kd_kamar AND c.kd_bangsal=d.kd_bangsal AND stts_pulang = 'Atas Persetujuan Dokter' AND b.nm_penyakit <>'-'";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tgl_keluar BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tgl_keluar = '$date'";
                                }
                                $sql .= " group by d.nm_bangsal";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['nm_bangsal']; ?></td>
                                        <td><?php echo $row['kode']; ?></td>
										<td><?php echo $row['nm_penyakit']; ?></td>
										<td><?php echo $row['jumlahnya']; ?></td>
										
										
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_awal" class="datepicker form-control" placeholder="Pilih tanggal awal...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_akhir" class="datepicker form-control" placeholder="Pilih tanggal akhir...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="submit" class="btn bg-blue btn-block btn-lg waves-effect">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('../layout/footer.php');
?>
