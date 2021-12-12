<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN RUJUKAN PASIEN BPJS RJ TANPA IGD';
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
                                DATA KUNJUNGAN RUJUKAN PASIEN BPJS RJ TANPA IGD
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO RAWAT</th>
                                        <th>KLINIK/PKM</th>
                                        <th>NO. RM</th>
                                        <th>NAMA PASIEN</th>                                        
                                        <th>NAMA DOKTER</th>
                                        <th>NAMA POLI</th>
                                        <th>NAMA RUANGAN</th>
                                        <th>NO SEP</th>
                                        <th>NO RUJUKAN</th>
                                        <th>CARA BAYAR</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select a.no_rawat,a.perujuk,c.no_rkm_medis,d.nm_pasien, c.kd_dokter, h.nm_dokter,  e.nm_poli, i.no_sep, i.no_rujukan, j.png_jawab from rujuk_masuk a  join kamar_inap b  join reg_periksa c  join pasien d 
									join poliklinik e 
									join kamar f
									join bangsal g
									join dokter h
									JOIN bridging_sep i
									join penjab j
									where a.no_rawat =b.no_rawat  AND b.no_rawat=c.no_rawat and c.no_rkm_medis =d.no_rkm_medis and c.kd_poli=e.kd_poli and b.kd_kamar=f.kd_kamar
									and c.kd_dokter = h.kd_dokter
									and f.kd_bangsal=g.kd_bangsal
									and a.no_rawat=i.no_rawat
									and c.kd_pj=j.kd_pj AND c.kd_pj ='A52' AND e.nm_poli <> 'IGD' AND e.nm_poli <> 'IGD - VK'
									  ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND b.tgl_masuk BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND b.tgl_masuk = '$date'";
                                }
                                $sql .= " GROUP BY a.no_rawat";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['no_rawat']; ?></td>
                                        <td><?php echo $row['perujuk']; ?></td>
                                        <td><?php echo $row['no_rkm_medis']; ?></td>
                                        <td><?php echo $row['nm_pasien']; ?></td>                                        
                                        <td><?php echo $row['nm_dokter']; ?></td>
                                        <td><?php echo $row['nm_poli']; ?></td>
                                        <td><?php echo $row['nm_bangsal']; ?></td>
                                        <td><?php echo $row['no_sep']; ?></td>
                                        <td><?php echo $row['no_rujukan']; ?></td>
										 <td><?php echo $row['png_jawab']; ?></td>
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
