<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Laporan';
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
                              LAPORAN RL 5.1 (Rawat Inap) 
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                      
                                      <td>No</td>
                                      <td>Jenis Kegiatan</td>
                                      <td>Jumlah</td>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                       
                                      	<td>1</td>
                                      	<td>Pengunjung Baru</td>
                                      	<td><?php 
										$tgl_awal = isset($_POST['tgl_awal'])?$_POST['tgl_awal']:null;
										$tgl_akhir = isset($_POST['tgl_akhir'])?$_POST['tgl_akhir']:null;
												$sql = fetch_array(query("SELECT COUNT(no_rawat) FROM reg_periksa WHERE stts_daftar = 'Baru' AND status_lanjut = 'Ralan' AND tgl_registrasi BETWEEN '$tgl_awal' AND '$tgl_akhir'"));echo $sql['0'];?></td>
                                    </tr>
                                  	<tr>
                                        
                                      	<td>2</td>
                                      	<td>Pengunjung Lama</td>
                                      	<td><?php $sql = fetch_array(query("SELECT COUNT(no_rawat) FROM reg_periksa WHERE stts_daftar = 'Lama' AND status_lanjut = 'Ralan' AND tgl_registrasi BETWEEN '$tgl_awal' AND '$tgl_akhir'"));echo $sql['0'];?></td>
                                    </tr>
                            	</tbody>
                            </table>
                          	<div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_awal" class="datepicker form-control" placeholder="Pilih tanggal awal...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tgl_akhir" class="datepicker form-control" placeholder="Pilih tanggal akhir...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <select name="kd_pj" class="form-control show-tick">
                                              <option value="">Semua</option>
                                              <option value="A01">Umum</option>
                                              <option value="A02">BPJS</option>
                                          </select>
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
                            <!--       
                            <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tahun" class="tahun form-control" placeholder="Pilih tahun...">
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
							-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('../layout/footer.php');
?>