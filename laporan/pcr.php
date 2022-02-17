<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA PEMERIKSAAN PCR';
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
                                DATA PEMERIKSAAN PCR
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>No Rawat</th>
                                        <th>no_rkm_medis</th>
										<th>nm_pasien</th>
										<th>Tgl Lahir</th>
										<th>Tgl Periksa</th>
										<th>Nama Pemeriksaan</th>
										<th>Status</th>
										<th>Perujuk</th>
										<th>Total Bayar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT
                                         reg_periksa.no_rawat, 
                                         pasien.no_rkm_medis, 
                                         pasien.nm_pasien, 
                                         pasien.tgl_lahir, 
                                         periksa_lab.tgl_periksa, 
                                         jns_perawatan_lab.kd_jenis_prw, 
                                         jns_perawatan_lab.nm_perawatan, 
                                         reg_periksa.status_lanjut, 
                                         jns_perawatan_lab.total_byr, 
                                         reg_periksa.kd_pj, 
                                         penjab.png_jawab
                                        FROM
                                         reg_periksa
                                         INNER JOIN
                                         pasien
                                         ON 
                                          reg_periksa.no_rkm_medis = pasien.no_rkm_medis
                                         INNER JOIN
                                         periksa_lab
                                         ON 
                                          reg_periksa.no_rawat = periksa_lab.no_rawat
                                         INNER JOIN
                                         jns_perawatan_lab
                                         ON 
                                          periksa_lab.kd_jenis_prw = jns_perawatan_lab.kd_jenis_prw
                                         INNER JOIN
                                         penjab
                                         ON 
                                          reg_periksa.kd_pj = penjab.kd_pj
                                        WHERE
                                         jns_perawatan_lab.nm_perawatan LIKE '%PCR%'";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND periksa_lab.tgl_periksa  BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND periksa_lab.tgl_periksa  = '$date'";
                                }
                                $sql .= " order by no_rawat asc";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['no_rawat']; ?></td>
                                        <td><?php echo $row['no_rkm_medis']; ?></td>
                                        <td><?php echo $row['nm_pasien']; ?></td>
                                        <td><?php echo $row['tgl_lahir']; ?></td>
                                        <td><?php echo $row['tgl_periksa']; ?></td>
                                        <td><?php echo $row['nm_perawatan']; ?></td>
                                        <td><?php echo $row['status_lanjut']; ?></td>
                                        <td><?php echo $row['png_jawab']; ?></td>
                                        <td><?php echo $row['total_byr']; ?></td>
                                        
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
