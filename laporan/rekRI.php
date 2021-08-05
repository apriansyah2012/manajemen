<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN PASIEN RAWAT INAP PER RUANG PERAWATAN DAN PER CARA BAYAR';
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
                                DATA KUNJUNGAN PASIEN RAWAT INAP PER RUANG PERAWATAN DAN PER CARA BAYAR
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Ruangan</th>
										<th>BED</th>
                                        <th>Kelas</th>
                                        <th>Baru</th>
                                        <th>Lama</th>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>Umum</th>
                                        <th>PT</th>
                                        <th>Asuransi</th>
                                        <th>BPJS</th>
                                        <th>KAR-SEH</th>
					<th>KemKes</th>
					<th>Lain-Lain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select a.no_rawat, a.kd_kamar, a.tgl_masuk,a.tgl_keluar, b.kd_bangsal, c.nm_bangsal,b.kelas, sum(d.status_poli ='Baru') as baru,sum(d.status_poli ='Lama') as lama,d.no_rkm_medis, sum(e.jk='L') as Laki,sum(e.jk='P') as Perempuan,sum(f.kategori ='TUNAI') as umum, sum(f.kategori IN ('PERUSAHAAN'
)) as pj, sum(f.kategori IN ('ASURANSI')) as asuransi,sum(f.kategori ='BPJS') as bpjs,sum(d.kd_pj ='A55') as karseh, sum(f.kategori ='KEMKES') as kemkes,sum(f.kategori ='DLL') as dll from kamar_inap a join kamar b join bangsal c join reg_periksa  d join pasien e join penjab f WHERE  a.kd_kamar =b.kd_kamar and b.kd_bangsal=c.kd_bangsal and a.no_rawat = d.no_rawat and d.no_rkm_medis = e.no_rkm_medis and c.status ='1' and b.statusdata='1' and  d.kd_pj=f.kd_pj";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tgl_keluar BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tgl_keluar = '$date'";
                                }
                                $sql .= " GROUP BY a.kd_kamar";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['5']; ?></td>
										<td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['6']; ?></td>
                                        <td><?php echo $row['baru']; ?></td>
                                        <td><?php echo $row['lama']; ?></td>
                                        <td><?php echo $row['Laki']; ?></td>
                                        <td><?php echo $row['Perempuan']; ?></td>
                                        <td><?php echo $row['umum']; ?></td>
                                        <td><?php echo $row['pj']; ?></td>
                                        <td><?php echo $row['asuransi']; ?></td>
                                        <td><?php echo $row['bpjs']; ?></td>
                                        <td><?php echo $row['karseh']; ?></td>
					<td><?php echo $row['kemkes']; ?></td>
					<td><?php echo $row['dll']; ?></td>

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
