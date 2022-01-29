<?php


$title = 'DATA 10 BESAR PENYAKIT RUMAH SAKIT';
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
                                DATA 10 BESAR PENYAKIT RAWAT INAP RUMAH SAKIT
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        
										<th>Kode ICD X</th>
										<th>Diagnosa</th>
										<th>Baru</th>
										<th>Lama</th>
										<th>Laki-Laki</th>
										<th>Perempuan</th>
										<th>Atas_Persetujuan_Dokter</th>
										<th>Atas_Permintaan_Sendiri</th>
										<th>APS</th>
										<th>Membaik</th>
										<th>Sehat</th>
										<th>Sembuh</th>
										<th>Meninggal</th>
										<th>Plus</th>
										<th>Rujuk</th>
										<th>Jumlah</th>
									</tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT  LEFT(a.diagnosa_akhir, 5) as kode, b.nm_penyakit,sum(e.stts_daftar='Lama') As Lama, sum(e.stts_daftar='Baru') As Baru, sum(f.jk='L') As laki, sum(f.jk='P') As perempuan, sum(a.stts_pulang IN( 'Atas Persetujuan Dokter')) As Atas_Persetujuan_Dokter,sum(a.stts_pulang IN( 'Membaik')) As Membaik,sum(a.stts_pulang IN( 'Sehat')) As Sehat, sum(a.stts_pulang IN( 'Sembuh')) As Sembuh, sum(a.stts_pulang IN( 'Atas Permintaan Sendiri')) As Atas_Permintaan_Sendiri, sum(a.stts_pulang IN( 'APS')) As APS, sum(a.stts_pulang IN( 'Meninggal')) As Meninggal, sum(a.stts_pulang IN( '+')) As plush, sum(a.stts_pulang IN( 'Rujuk')) As Rujuk,count(a.diagnosa_akhir) as jumlahnya  FROM kamar_inap a join penyakit b join kamar c join bangsal d Join reg_periksa e Join pasien f  where a.diagnosa_akhir=b.kd_penyakit AND a.kd_kamar = c.kd_kamar AND c.kd_bangsal=d.kd_bangsal AND a.no_rawat= e.no_rawat AND e.no_rkm_medis=f.no_rkm_medis  AND b.nm_penyakit <>'-'
									  ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tgl_keluar BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tgl_keluar = '$date'";
                                }
                                $sql .= " group by b.nm_penyakit  ";
                                $query = query($sql);
                                //$no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['kode']; ?></td>
                                        <td><?php echo $row['nm_penyakit']; ?></td>
										<td><?php echo $row['Baru']; ?></td>
										<td><?php echo $row['Lama']; ?></td>
										<td><?php echo $row['laki']; ?></td>
										<td><?php echo $row['perempuan']; ?></td>
										<td><?php echo $row['Atas_Persetujuan_Dokter']; ?></td>
										<td><?php echo $row['Atas_Permintaan_Sendiri']; ?></td>
										<td><?php echo $row['APS']; ?></td>
										<td><?php echo $row['Membaik']; ?></td>
										<td><?php echo $row['Sehat']; ?></td>
										<td><?php echo $row['Sembuh']; ?></td>
										<td><?php echo $row['Meninggal']; ?></td>
										<td><?php echo $row['plush']; ?></td>
										<td><?php echo $row['Rujuk']; ?></td>
										<td><?php echo $row['jumlahnya']; ?></td>
										
                                    </tr>
                                <?php

                                //$no++;
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
