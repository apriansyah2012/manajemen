<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN PASIEN  IGD PER DOKTER';
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
                                DATA KUNJUNGAN PASIEN  IGD PER DOKTER
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Klinik</th>
                                        <th>Dokter</th>
                                        <th>Baru</th>
                                        <th>Lama</th>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>RJ</th>
                                        <th>RI</th>
                                        <th>Rujuk</th>
                                        <th>Meninggal</th>
                                        <th>Umum</th>
                                        <th>PT</th>
                                        <th>Asuransi</th>
                                        <th>BPJS</th>
                                        <th>KAR-SEH</th>
										<th>KemKes</th>
                                        <th>Gratis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select a.kd_poli, b.nm_poli,a.kd_dokter,c.nm_dokter, sum(a.status_poli ='Lama') as lama, sum(a.status_poli ='Baru') as baru, sum(e.kategori='TUNAI') as umum, sum(e.kategori IN ('PERUSAHAAN')) as pj, sum(e.kategori IN ('ASURANSI')) as asuransi,sum(e.kategori ='BPJS') as bpjs,sum(a.kd_pj ='A55') as karseh,sum(e.kategori ='KEMKES') as kemkes,sum(a.status_lanjut ='Ralan') as rj,sum(a.status_lanjut ='Ranap') as ri, a.no_rkm_medis, sum(d.jk ='L') as Laki,sum(d.jk ='P') as Perempuan, sum(a.stts='Dirujuk') as rujuk, sum(a.stts='Meninggal') as doa from reg_periksa a join poliklinik b join dokter c join pasien d join penjab e where a.kd_poli=b.kd_poli and a.kd_dokter=c.kd_dokter and a.kd_poli ='IGDK' AND a.kd_pj=e.kd_pj and a.no_rkm_medis =d.no_rkm_medis";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tgl_registrasi BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tgl_registrasi = '$date'";
                                }
                                $sql .= " GROUP BY c.nm_dokter";
                                $query = query($sql);
                                $no = 1;
								$persen=0;
                                while($row = fetch_array($query)) {
									
                                ?>
								
                                    <tr>
                                        
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        <td><?php echo $row['baru']; ?></td>
                                        <td><?php echo $row['lama']; ?></td>
                                        <td><?php echo $row['Laki']; ?></td>
                                        <td><?php echo $row['Perempuan']; ?></td>
                                        <td><?php echo $row['rj']; ?></td>
                                        <td><?php echo $row['ri']; ?></td>
                                        <td><?php echo $row['rujuk']; ?></td>
                                        <td><?php echo $row['doa']; ?></td>
                                        <td><?php echo $row['umum']; ?></td>
                                        <td><?php echo $row['pj']; ?></td>
                                        <td><?php echo $row['asuransi']; ?></td>
                                        <td><?php echo $row['bpjs']; ?></td>
                                        <td><?php echo $row['karseh']; ?></td>
										<td><?php echo $row['kemkes']; ?></td>
                                        <td><?php echo '0' ?></td>
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
