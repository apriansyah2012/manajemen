<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Daftar Pengajuan';
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
                                DAFTAR PENGAJUAN BARANG MEDIS 
								<small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>

                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tgl. Pengajuan</th>
                                        <th>No. Pengajuan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
										<th>Action</th>
										
                                    </tr>
                                </thead>
                                
                                <?php
	                                $tanggal = isset($_POST['tanggal'])?$_POST['tanggal']:null;
	                                $bangsal = isset($_POST['bangsal'])?$_POST['bangsal']:null;
	                                $sql = "select a.tanggal, a.no_pengajuan, a.status, a.keterangan, b.nama from pengajuan_barang_medis=a join petugas =b where a.nip=b.nip ";
	                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
	                                	$sql .= " AND a.tanggal BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
	                                } else {
	                                  	$sql .= " AND a.tanggal= '$date'";
	                                }
	                                	$sql .= " GROUP BY a.no_pengajuan";
	                                
	                                $result = query($sql);
	                                $no = 1;
	                                while($row = fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        
										<td  input type="submit" class="btn btn-warning"><a href="validasi.php?ni=<?php echo $row['no_pengajuan'];?>" title="Detail Pengajuan">Detail</a></td>
										<td class="btn btn-danger"><a href="cetakPO.php?ni=<?php echo $row['no_pengajuan'];?>" title="Cetak PO">Cetak PO</a></td>
									</tr>
                                <?php
                                $no++;
                                }
                                ?>
                                
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
