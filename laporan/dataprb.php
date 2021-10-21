<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN RUJUKAN PPK TK I PRB (PASIEN BPJS)';
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
                                DATA KUNJUNGAN RUJUKAN PPK TK I PRB (PASIEN BPJS)
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO RAWAT</th>
                                        <th>No SEP</th>
                                        <th>NO. RM</th>
                                        <th>NAMA PASIEN</th>  
										<th>Dokter</th>
										<th>Nama PPK TK I</th>
                                        <th>Tgl SEP</th>
                                        <th>PRB</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select a.no_rawat,a.no_sep, b.no_rkm_medis,c.nm_pasien, d.prb, a.kdpolitujuan,a.nmpolitujuan,a.nmdpdjp, a.tglsep,a.nmppkrujukan  from bridging_sep a join reg_periksa b  join pasien c on b.no_rkm_medis = c.no_rkm_medis join bpjs_prb d   where a.no_rawat=b.no_rawat and a.no_sep = d.no_sep
									  ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tglsep BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tglsep = '$date'";
                                }
                                $sql .= " group by d.no_sep";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['no_rawat']; ?></td>
                                        <td><?php echo $row['no_sep']; ?></td>
                                        <td><?php echo $row['no_rkm_medis']; ?></td>
                                        <td><?php echo $row['nm_pasien']; ?></td> 
										<td><?php echo $row['nmdpdjp']; ?></td> 
										<td><?php echo $row['nmppkrujukan']; ?></td> 
										<td><?php echo $row['tglsep']; ?></td>
                                        <td><?php echo $row['prb']; ?></td>
                                        
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
