<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'CASH FLOW';
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
                                LAPORAN CASH FLOW
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>A. KAS AWAL</th>
                                        <th>Rekening</th>
                                        <th>Saldo Awal</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select rekening.kd_rek, rekening.nm_rek, sum(rekeningtahun.saldo_awal)as ttlrek from rekening inner join rekeningtahun on rekening.kd_rek=rekeningtahun.kd_rek where rekening.tipe='N' and rekening.balance='D' ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND rekeningtahun.thn BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND rekeningtahun.thn = '$date'";
                                }
                                $sql .= " group by rekening.kd_rek order by rekening.kd_rek";
                                $query = query($sql);
                                $no = 1;
								$ttotal= 0;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                         <td><?php echo $no ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $ttotal=$row['ttlrek']; ?></td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
							<table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>B. KAS Masuk</th>
                                        <th>Rekening</th>
                                        <th>Kas Masuk</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select detailjurnal.kd_rek, rekening.nm_rek,(sum(detailjurnal.kredit)-sum(detailjurnal.debet)) as ttlkredit from jurnal inner join detailjurnal inner join rekening  on jurnal.no_jurnal=detailjurnal.no_jurnal  and detailjurnal.kd_rek=rekening.kd_rek  where rekening.tipe='R' and rekening.balance='K'    ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND jurnal.tgl_jurnal BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND jurnal.tgl_jurnal = '$date'";
                                }
                                $sql .= " group by detailjurnal.kd_rek order by detailjurnal.kd_rek";
                                $query = query($sql);
                                $no = 1;
								$ttotal= 0;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
									
                                         <td><?php echo $no ;?></td>
                                       <td><?php echo $ttotal=$row['1']; ?></td>
										<td><?php echo $ttotal=$row['ttlkredit']; ?></td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
							<table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>C. KAS KELUAR</th>
                                        <th>Rekening</th>
                                        <th>Kas Keluar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select detailjurnal.kd_rek, rekening.nm_rek,(sum(detailjurnal.debet)-sum(detailjurnal.kredit)) as ttldebet from jurnal inner join detailjurnal inner join rekening  on jurnal.no_jurnal=detailjurnal.no_jurnal  and detailjurnal.kd_rek=rekening.kd_rek  where rekening.tipe='R' and rekening.balance='D'   ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND jurnal.tgl_jurnal BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND jurnal.tgl_jurnal = '$date'";
                                }
                                $sql .= " group by detailjurnal.kd_rek order by detailjurnal.kd_rek";
                                $query = query($sql);
                                $no = 1;
								$ttotal= 0;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $ttotal=$row['ttldebet']; ?></td>
                                        
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
