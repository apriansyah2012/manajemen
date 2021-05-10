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
                                <small><?php if(isset($_GET['tahun'])) { $tahun = $_GET['tahun']; } else { $tahun = date("Y",strtotime($date)); };
                                  			 if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date("M",strtotime($date)); };echo "Periode ".$tahun; ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                      <td>Bulan</td>
                                      <td>No</td>
                                      <td>Jenis Kegiatan</td>
                                      <td>Jumlah</td>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                        <td><?php echo $bulan;?></td>
                                      	<td>1</td>
                                      	<td>Pengunjung Baru</td>
                                      	<td><?php $sql = fetch_array(query("SELECT COUNT(no_rawat) FROM reg_periksa WHERE status_poli = 'Baru' AND status_lanjut = 'Ralan' AND tgl_registrasi BETWEEN '{$tahun}-{$bulan}-01' AND '{$tahun}-{$bulan}-31'"));echo $sql['0'];?></td>
                                    </tr>
                                  	<tr>
                                        <td><?php echo $bulan;?></td>
                                      	<td>2</td>
                                      	<td>Pengunjung Lama</td>
                                      	<td><?php $sql = fetch_array(query("SELECT COUNT(no_rawat) FROM reg_periksa WHERE status_poli = 'Lama' AND status_lanjut = 'Ralan' AND tgl_registrasi BETWEEN '{$tahun}-{$bulan}-01' AND '{$tahun}-{$bulan}-31'"));echo $sql['0'];?></td>
                                    </tr>
                            	</tbody>
                            </table>
                          	<form method="get" action="">
                              <select name="bulan">
                                <option value="01">Januari</option>
                                <option value="02">Pebruari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                              </select>
                              <select name="tahun">
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2018">2019</option>
                                <option value="2018">2020</option>
                              </select>
                              <input type="submit" value="Submit">
                            </form>
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