<?php

$title = 'Dashboard';
include_once('config.php');
include_once('layout/header.php');
include_once('layout/sidebar.php');

?>
<?php
    if(isset($_GET['tahun'])) { $tahun = $_GET['tahun']; } else { $tahun = date("Y"); };
    if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date("m"); };
?>
<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                   <div class="header">
					<div class="block-header">
						<p class="col-orange font-24 font-uppercase"><?php echo $title; ?></p>
					</div>
            <!-- Widgets -->
						<div class="row clearfix">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="info-box bg-pink hover-expand-effect">
									<div class="icon">
										<i class="material-icons">enhanced_encryption</i>
									</div>
									<div class="content">
										<div class="text">TOTAL PASIEN</div>
										<div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM pasien"));?>" data-speed="5000" data-fresh-interval="20"></div>
									</div>
								</div>
							</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="info-box bg-blue  hover-expand-effect">
								<div class="icon">
									<i class="material-icons">airline_seat_recline_normal</i>
								</div>
								<div class="content">
									<div class="text">RAWAT JALAN</div>
									<div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' "));?>" data-speed="2000" data-fresh-interval="20"></div>
								</div>
							</div>
						</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT stts_pulang FROM kamar_inap WHERE stts_pulang = '-' "));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">PASIEN BULAN INI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rawat FROM reg_periksa WHERE tgl_registrasi LIKE '%$month%'"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				 </div>
				 </div>
				  </div>
				   </div>
				   </div>
				   
     
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>

                        <div class="content">
                            <div class="text">PASIEN IGD REG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD DIRAWAT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Dirawat' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD BATAL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Batal' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD BELUM PERIKSA</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Belum' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>


               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD DIRUJUK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Dirujuk' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD PULANG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND status_bayar='Sudah Bayar' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN BATAL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND stts ='Batal'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN BPJS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj ='A52'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN TUNAI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj ='A00'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN ASURANSI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT a.no_rkm_medis FROM reg_periksa a join penjab b WHERE a.kd_pj=b.kd_pj and a.tgl_registrasi LIKE '%$date%' AND a.status_lanjut = 'Ralan' AND b.kategori IN ('ASURANSI')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN PT </div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT a.no_rkm_medis FROM reg_periksa a join penjab b WHERE a.kd_pj=b.kd_pj and a.tgl_registrasi LIKE '%$date%' AND a.status_lanjut = 'Ralan' AND b.kategori IN ('PERUSAHAAN')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>

                        <div class="content">
                            <div class="text">RANAP MASUK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT tgl_masuk FROM kamar_inap WHERE tgl_masuk LIKE '%$date%' and stts_pulang='-' "));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
<div class="content">
                            <div class="text">RAWAT INAP PULANG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT tgl_keluar FROM kamar_inap WHERE tgl_keluar LIKE '%$date%'   "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP BPJS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ranap' AND kd_pj ='A52'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP TUNAI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ranap' AND kd_pj ='A00'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP ASURANSI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT a.no_rkm_medis FROM reg_periksa a join penjab b WHERE a.kd_pj=b.kd_pj and a.tgl_registrasi LIKE '%$date%' AND a.status_lanjut = 'Ranap' AND b.kategori IN ('ASURANSI')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP PERUSAHAAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT a.no_rkm_medis FROM reg_periksa a join penjab b WHERE a.kd_pj=b.kd_pj and a.tgl_registrasi LIKE '%$date%' AND a.status_lanjut = 'Ranap' AND b.kategori IN ('PERUSAHAAN')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">PASIEN BARU RALAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE status_poli ='Baru' AND status_lanjut='Ralan' AND tgl_registrasi LIKE '%$date%' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
			
            <!-- Bar chartjs -->
            <div class="card">
                <div class="header">
                    <h2>GRAFIK PERBANDINGAN KUNJUNGAN  <?php echo "PERIODE TAHUN ".$year. " TERHADAP PERIODE TAHUN ".$last_year; ?></h2>
                </div>
                <div class="body">
                    <canvas id="bar_chart" height="150"></canvas>
                </div>
            </div>
			
            <!-- #End# Bar chartjs -->
			<!-- Bar chartjs -->
            <div class="card">
                <div class="header">
                    <h2>POLIKLINIK HARI INI</h2>
                </div>
                <div class="body">
                    <canvas id="line_chart" height="150"></canvas>
                </div>
            </div>
			 <div class="card">
                <div class="header">
                    <h2>10 BESAR PENGGUNAAN BARANG FARMASI TERBANYAK </h2>
                </div>
                <div class="body">
                    <canvas id="lines_chart" height="150"></canvas>
                </div>
            </div>
			<div class="card">
                <div class="header ">
                    <h2>10 BESAR KUNJUNGAN VIA PENDAFTARAN ONLINE </h2>
                </div>
                <div class="body">
                    <canvas id="linesi_chart"  height="150"></canvas>
                </div>
            </div>
            <!-- #End# Bar chartjs -->
			
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BARBER JHONSON <?php echo "Periode Bulan ".$bulan; ?>
                            </h2>
                          <small><?php 
						  if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date('Y-m'); };  
						  
						  ?></small>
                          <ul class="header-dropdown m-r--5">
                        	<li class="dropdown">
                            	<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                	<i class="material-icons">arrow_drop_down_circle</i>
                                </a> 
                                    <ul class="dropdown-menu pull-right">
										
                                        <li><a href="index.php?bulan=January">Januari</a></li>
                                        <li><a href="index.php?bulan=Februari">Februari</a></li>
                                        <li><a href="index.php?bulan=Maret">Maret</a></li>
                                    </ul>
                          	</li>
                        </ul>
                        </div>
                      	<div class="body">
                          <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                          <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                              <thead>
                                  <tr>
                                      
                                      <th>BOR Per Hari</th>
									  <th>BOR RS / BULAN</th>
                                      <th>ALOS</th>
                                      <th>BTO</th>
                                      <th>TOI</th>
                                      <th>NDR</th>
                                      <th>GDR</th>
                                      <th>Rata Kunjungan</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      
                                      <td><?php 
												
												$kamar = "SELECT count(kd_kamar) as total FROM kamar WHERE statusdata = '1'"; 
												$result3=query($kamar);
												$bor1="select ((count(no_rawat)/(SELECT COUNT(kd_kamar) as total FROM kamar WHERE statusdata = '1'))*100) as hasil from kamar_inap where stts_pulang ='-'";
												$ss=query($bor1);
												while($row = fetch_array($ss)) {
												?>
												<?php echo number_format($row['hasil'],2);?> %
												<?php
												}
												?></td>
									  <td><?php 
												
												$kalender = CAL_GREGORIAN;
												$bulan1 = date('m');
												$tahun1 = date('Y');
												$hari1 = cal_days_in_month($kalender, $bulan1, $tahun1);
												
												$kamar = "SELECT COUNT(kd_kamar) as total FROM kamar WHERE statusdata = '1'"; $result1 = fetch_array(query($kamar));
                                        		$hari = "SELECT SUM(lama) as lama FROM kamar_inap WHERE tgl_keluar LIKE '%{$bulan}%'"; $result2 = fetch_array(query($hari)); 
                                        		$bor = $result2['lama']/($result1['total']*$hari1); echo number_format($bor*100,2)."%";?></td>
                                      <td><?php $jml = "SELECT COUNT(no_rawat) as jml FROM kamar_inap WHERE tgl_keluar LIKE '%{$bulan}%'"; $jmlpsn = fetch_array(query($jml));
                                        		$alos = $result2['lama']/$jmlpsn['jml']; echo number_format($alos,2)." Hari";?></td>
                                      <td><?php $bto = $jmlpsn['jml']/$result1['total']; echo number_format($bto,2)." Kali";?></td>
                                      <td><?php $toi = (($result1['total']*$hari1)-$result2['lama'])/$jmlpsn['jml']; echo number_format($toi,2)." Hari";?></td>
                                      <td><?php $mati = "SELECT COUNT(no_rawat) as mati FROM kamar_inap WHERE stts_pulang = 'Meninggal' AND lama > 2 AND tgl_keluar LIKE '%{$tahun}%'"; $death = fetch_array(query($mati)); $ndr = ($death['mati']/$jmlpsn['jml'])*1000; echo number_format($ndr,2)." Permil";?></td>
                                      <td><?php $die = "SELECT COUNT(no_rawat) as mati FROM kamar_inap WHERE stts_pulang = 'Meninggal' AND tgl_keluar LIKE '%{$bulan}%'"; $shi = fetch_array(query($die));$gdr = ($shi['mati']/$jmlpsn['jml'])*1000;echo number_format($gdr,2)." Permil";?></td>
                                      <td><?php $avg = $jmlpsn['jml']/$hari1; echo number_format($avg,2);?></td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
						
                    </div>
                </div>
            </div>
			<!-- #AWAL# Bar HARI chartjs -->
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BOR (Bed Occupancy Ratio) <?php echo "Periode Tanggal ".date('d-m-Y')." Pukul ".date('H:i:s'); ?>
                            </h2>
                          <small><?php 
						  if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date('Y-m'); };  
						  
						  ?></small>
                          <ul class="header-dropdown m-r--5">
                        	<li class="dropdown">
                            	<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                	<i class="material-icons">arrow_drop_down_circle</i>
                                </a> 
                                    <ul class="dropdown-menu pull-right">
										
                                        <li><a href="index.php?bulan=January">Januari</a></li>
                                        <li><a href="index.php?bulan=Februari">Februari</a></li>
                                        <li><a href="index.php?bulan=Maret">Maret</a></li>
                                    </ul>
                          	</li>
                        </ul>
                        </div>
                      	<div class="body">
                          <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                          <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                              <thead>
                                  <tr>
                                      
                                      <th>RUANGAN</th>
									  <th>TT</th>
                                      <th>JML PASIEN</th>
                                      <th>BOR</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      
                                      <td>PAVILIUN LANTAI III</td>
									  <td><?php
											
											$kamar3 = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'P3%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar3['jumlah']; 
											?></b> <small>BED</small></span>
									  </td>
									  <td><?php
											$pas3 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P3%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas3['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BOR3 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P3%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($pas3['Status']/$kamar3['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
                                      
                                      
                                  </tr>
								  <tr>
								   <td>PAVILIUN LANTAI II</td>
									  <td><?php
											$kamar2 = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'P2%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar2['jumlah']; 
											?></b> <small>BED</small></span>
										</td>
									  <td><?php
											$pas2 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P2%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas2['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BOR2 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P2%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($pas2['Status']/$kamar2['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PAVILIUN LANTAI I</td>
									  <td><?php
											$kamar1 = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'P1%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar1['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$pas1 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P1%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas1['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BOR1 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'P1%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($pas1['Status']/$kamar1['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>ANGGREK dan COVID</td>
									  <td><?php
											$kamarANG = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'ANG%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarANG['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$pasANG = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'ANG%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pasANG['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORANG = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'ANG%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($pasANG['Status']/$kamarANG['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>MELATI</td>
									  <td><?php
											$kamarMEL = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'MEL%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarMEL['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$mel3 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'MEL%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $mel3['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORmel = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'MEL%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($mel3['Status']/$kamarMEL['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>FLAMBOYAN</td>
									  <td><?php
											$kamarFLM = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'FLM%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarFLM['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$flam3 = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'FLM%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $flam3['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td>
											<span class="pull-midle"><b>
											<?php echo ROUND(($flam3['Status']/$kamarFLM['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  
								  <td>MAWAR</td>
									  <td><?php
											$kamarMWR = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'MWR%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarMWR['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$MWR = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'MWR%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $MWR['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORMWR = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'MWR%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($MWR['Status']/$kamarMWR['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PERINATALOGI BABY TERM</td>
									  <td><?php
											$kamarPERT = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'Babyterm%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERT['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERT = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'Babyterm%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERT['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORPERT = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'Babyterm%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PERT['Status']/$kamarPERT['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PERINATALOGI BABY BOX</td>
									  <td><?php
											$kamarPERB = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'Box%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERB['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERB = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'Box%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERB['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORPERB = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'Box%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PERB['Status']/$kamarPERB['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PERINATALOGI INCUBATOR</td>
									  <td><?php
											$kamarPERI = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'incu%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERI['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERI = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'incu%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERI['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORPERI = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'incu%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PERI['Status']/$kamarPERI['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								   <tr>
								  <td>ICU</td>
									  <td><?php
											$kamarICU = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'IC%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarICU['jumlah']; 
											?></b> <small>BED</small></span>
								     </td>
									  <td><?php
											$PASICU = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'IC%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PASICU['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORICU = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'IC%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PASICU['Status']/$kamarICU['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									 </td>
								  </tr>
								  <tr>
								  <td>NICU</td>
									  <td><?php
											$kamarNICU = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'NI%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarNICU['jumlah']; 
											?></b> <small>BED</small></span>
								     </td>
									  <td><?php
											$PASNICU = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'NI%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PASNICU['Status']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORNICU = fetch_assoc(query("select count(status)as Status from kamar where kd_kamar LIKE 'NI%' AND statusdata='1' AND status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PASNICU['Status']/$kamarNICU['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									 </td>
								  </tr>
								  <tr>
								  <td><b>TOTAL</b></td>
									  <td><?php
											$kamarTOT = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarTOT['jumlah']-3; 
											?></b> <small>BED</small></span>
								     </td>
									  <td><?php
											$PASTOT = fetch_assoc(query("SELECT count(stts_pulang) as pulang FROM kamar_inap WHERE stts_pulang = '-'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PASTOT['pulang']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$BORTOT = fetch_assoc(query("select count(status)as Status from kamar where  status='ISI'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo ROUND(($PASTOT['pulang']/$kamarTOT['jumlah'])*100,2); 
											?></b> <small>%</small></span>
									 </td>
								  </tr>
                             </tbody>
                          </table>
                        </div>
						 </div>
                    </div>
                </div>
			 <!-- #END# Bar HARI chartjs -->
			 <!-- #AWAL# Bar BULAN chartjs -->
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BARBER JHONSON <?php echo "Periode Bulan ".$bulan; ?>
                            </h2>
                          <small><?php 
						  if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date('Y-m'); };  
						  
						  ?></small>
                          <ul class="header-dropdown m-r--5">
                        	<li class="dropdown">
                            	<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                	<i class="material-icons">arrow_drop_down_circle</i>
                                </a> 
                                    <ul class="dropdown-menu pull-right">
										
                                        <li><a href="index.php?bulan=01">Januari</a></li>
                                        <li><a href="index.php?bulan=02">Februari</a></li>
                                        <li><a href="index.php?bulan=03">Maret</a></li>
										<li><a href="index.php?bulan=04">April</a></li>
										<li><a href="index.php?bulan=05">Mei</a></li>
										<li><a href="index.php?bulan=06">Juni</a></li>
										<li><a href="index.php?bulan=07">Juli</a></li>
										<li><a href="index.php?bulan=08">Agustus</a></li>
										<li><a href="index.php?bulan=09">September</a></li>
										<li><a href="index.php?bulan=10">Oktober</a></li>
										<li><a href="index.php?bulan=11">November</a></li>
										<li><a href="index.php?bulan=12">Desember</a></li>
                                    </ul>
                          	</li>
                        </ul>
                        </div>
                      	<div class="body">
                          <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                          <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                              <thead>
                                  <tr>
                                      
                                      <th>RUANGAN</th>
									  <th>TT</th>
                                      <th>JML PASIEN</th>
									  <TH>Jumlah Hari Rawatan RS</TH>
                                      <th>Maksimal</th>
									  <th>Minimal</th>
									  <th>Rata-Rata</th>
									  <th>PERSEN</th>
									  
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      
                                      <td>PAVILIUN LANTAI III</td>
									  <td><?php
											$kalender = CAL_GREGORIAN;
											$bulan1 = date('m');
											$tahun1 = date('Y');
											$hari1 = cal_days_in_month($kalender, $bulan1, $tahun1);
											$kamar3 = fetch_assoc(query("SELECT stts_pulang FROM kamar_inap WHERE stts_pulang = '-' AND kd_kamar LIKE 'P3%' "));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar3['jumlah']; 
											?></b> <small>BED</small></span>
									  </td>
									  <td><?php
											$pas3 = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas3['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lama3 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lama3['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  
									  <td><?php
											$MAXq3 = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXq3['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINq3 = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINq3['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGq3 = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGq3['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
                                      <td><?php
											$BORq3 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P3%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $bors3=($kamar3['jumlah']*$hari1 /100); 
													echo ROUND($lama3['LAMA_INAP_Sebulan']/$bors3,2)
											?></b> <small>%</small></span>
									  </td>
                                      
                                  </tr>
								  <tr>
								   <td>PAVILIUN LANTAI II</td>
									  <td><?php
											$kamar2 = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'P2%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar2['jumlah']; 
											?></b> <small>BED</small></span>
										</td>
									  <td><?php
											$pas2 = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas2['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lama2 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lama2['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXq2 = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXq2['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINq2 = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINq2['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGq2 = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGq2['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORq2 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P2%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $bors2=($kamar2['jumlah']*$hari1 /100); 
													echo ROUND($lama2['LAMA_INAP_Sebulan']/$bors2,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PAVILIUN LANTAI I</td>
									  <td><?php
											$kamar1 = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'P1%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamar1['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$pas1 = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $pas1['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lama1 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lama1['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXq1 = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXq1['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINq1 = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINq1['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGq2 = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGq2['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORq1 = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'P1%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $bors1=($kamar1['jumlah']*$hari1 /100); 
													echo ROUND($lama1['LAMA_INAP_Sebulan']/$bors1,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>ANGGREK dan COVID</td>
									  <td><?php
											$kamarANG = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'ANG%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarANG['jumlah']; 
											?></b> <small>BED</small></span>
									</td>
									  <td><?php
											$ANG1 = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $ANG1['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaANG = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaANG['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqANG = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqANG['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqANG = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqANG['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqANG = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqANG['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqANG = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'ANG%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsANG=($kamarANG['jumlah']*$hari1 /100); 
													echo ROUND($lamaANG['LAMA_INAP_Sebulan']/$borsANG,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>MELATI</td>
									  <td><?php
											$kamarMEL = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'MEL%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarMEL['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$MEL = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $MEL['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaMEL = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaMEL['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqMEL = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqMEL['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqMEL = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqMEL['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqMEL = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqMEL['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqMEL = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'MEL%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsMEL=($kamarMEL['jumlah']*$hari1 /100); 
													echo ROUND($lamaMEL['LAMA_INAP_Sebulan']/$borsMEL,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>FLAMBOYAN</td>
									  <td><?php
											$kamarFLM = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'FLM%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarFLM['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$FLM = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $FLM['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaFLM = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaFLM['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqFLM = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqFLM['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqFLM = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqFLM['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqFLM = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqFLM['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqFLM = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'FLM%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsFLM=($kamarFLM['jumlah']*$hari1 /100); 
													echo ROUND($lamaMEL['LAMA_INAP_Sebulan']/$borsFLM,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  
								  <tr>
								  <td>MAWAR</td>
									  <td><?php
											$kamarMWR = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'MWR%' AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarMWR['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$MWR = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $MWR['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaMWR = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaMWR['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqMWR = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqMWR['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqMWR = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqMWR['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqMWR = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqMWR['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqMWR = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'MWR%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsMWR=($kamarMWR['jumlah']*$hari1 /100); 
													echo ROUND($lamaMWR['LAMA_INAP_Sebulan']/$borsMWR,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PERINATALOGI BABY TERM</td>
									  <td><?php
											$kamarPERT = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'Babyterm%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERT['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERT = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERT['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaPERT = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaPERT['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqPERT = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqPERT['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqPERT = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqPERT['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqPERT = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqPERT['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqPERT = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'Babyterm%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsPERT=($kamarPERT['jumlah']*$hari1 /100); 
													echo ROUND($lamaPERT['LAMA_INAP_Sebulan']/$borsPERT,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td>PERINATALOGI BABY BOX</td>
									  <td><?php
											$kamarPERB = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'Box%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERB['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERB = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERB['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaPERB = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaPERB['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqPERB = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqPERB['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqPERB = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqPERB['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqPERB = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqPERB['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqPERB = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'Box%' AND tgl_keluar ='%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsPERB=($kamarPERB['jumlah']*$hari1 /100); 
													echo ROUND($lamaPERB['LAMA_INAP_Sebulan']/$borsPERB,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								   <td>PERINATALOGI INCUBATOR</td>
									  <td><?php
											$kamarPERI = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'incu%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarPERI['jumlah']; 
											?></b> <small>BED</small></span>
								  </td>
									  <td><?php
											$PERI = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $PERI['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaPERI = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaPERI['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqPERI = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqPERI['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqPERI = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqPERI['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqPERI = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqPERI['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqPERI = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'incu%' AND tgl_keluar ='%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsPERI=($kamarPERI['jumlah']*$hari1 /100); 
													echo ROUND($lamaPERI['LAMA_INAP_Sebulan']/$borsPERI,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  
								   <tr>
								  <td>ICU</td>
									  <td><?php
											$kamarICU = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'IC%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarICU['jumlah']; 
											?></b> <small>BED</small></span>
								     </td>
									   <td><?php
											$ICU = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $ICU['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaICU = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaICU['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqICU = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqICU['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqICU = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqICU['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqICU = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqICU['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqICU = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'IC%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsICU=($kamarICU['jumlah']*$hari1 /100); 
													echo ROUND($lamaICU['LAMA_INAP_Sebulan']/$borsICU,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>

								  <tr>
								  <td>NICU</td>
									  <td><?php
											$kamarNICU = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where kd_kamar LIKE 'NI%'  AND statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarNICU['jumlah']; 
											?></b> <small>BED</small></span>
								     </td>
									   <td><?php
											$NICU = fetch_assoc(query("select count(no_rawat)as rawat from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $NICU['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaNICU = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaNICU['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqNICU = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqNICU['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqNICU = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqNICU['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqNICU = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqICU['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqNICU = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where kd_kamar LIKE 'NI%' AND tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsNICU=($kamarNICU['jumlah']*$hari1 /100); 
													echo ROUND($lamaNICU['LAMA_INAP_Sebulan']/$borsNICU,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
								  <tr>
								  <td><b>TOTAL</b></td>
									  <td><?php
											$kamarTOT = fetch_assoc(query("select count(kd_kamar)AS jumlah from kamar where statusdata='1'"));
											?>
											<span class="pull-midle"><b>
											<?php echo $kamarTOT['jumlah']-3; 
											?></b> <small>BED</small></span>
								     </td>
									   <td><?php
											$TOT = fetch_assoc(query("SELECT count(stts_pulang) as rawat from kamar_inap where  tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $TOT['rawat']; 
											?></b> <small>Orang</small></span>
									  </td>
									  <td><?php
											$lamaTOT = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where   tgl_keluar = '%{$bulan}%'"));
											
											?>
											<span class="pull-midle"><b>
											<?php echo $lamaTOT['LAMA_INAP_Sebulan']; 
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MAXqTOT = fetch_assoc(query("select MAX(lama)AS LAMA_INAP_max from kamar_inap where tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MAXqTOT['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$MINqTOT = fetch_assoc(query("select MIN(lama)AS LAMA_INAP_max from kamar_inap where  tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo $MINqTOT['LAMA_INAP_max']; 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$AVGqTOT = fetch_assoc(query("select AVG(lama)AS LAMA_INAP_max from kamar_inap where  tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php echo ROUND($AVGqTOT['LAMA_INAP_max']); 
													
											?></b> <small>Hari</small></span>
									  </td>
									  <td><?php
											$BORqICU = fetch_assoc(query("select sum(lama)AS LAMA_INAP_Sebulan from kamar_inap where   tgl_keluar = '%{$bulan}%'"));
											
											?>
											
											<span class="pull-midle"><b>
											<?php $borsICU=($kamarICU['jumlah']*$hari1 /100); 
													echo ROUND($lamaICU['LAMA_INAP_Sebulan']/$borsICU,2)
											?></b> <small>%</small></span>
									  </td>
								  </tr>
                              </tbody>
                          </table>
                        </div>
						
                    </div>
                </div>
			 <!-- #END# Bar BULAN chartjs -->
			
            <!-- Summary -->
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                 <?php
                                     $sql_grafik_ranap = query("SELECT count(*) AS jumlah
                                         FROM reg_periksa
                                         WHERE MONTH(tgl_registrasi)
                                         AND status_lanjut = 'Ranap'
                                         
                                         AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '2019'
                                         GROUP BY EXTRACT(MONTH FROM tgl_registrasi)");
                                     while ($data = fetch_array ($sql_grafik_ranap)){
                                         echo $data['jumlah'].', ';
                                     }
                                 ?>
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    PASIEN RANAP TAHUN INI
                                    <?php
                                    $ranap_th_ini = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    
                                    AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $last_year"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $ranap_th_ini['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    PASIEN RANAP BULAN INI
                                    <?php
                                    $ranap_bln_ini = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    
                                    AND MONTH(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $curr_month
                                    AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $year"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $ranap_bln_ini['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
				<!-- Latest Social Trends -->
                
                <!-- #END# Latest Social Trends -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">KELAS KAMAR PASIEN RANAP</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    KAMAR KELAS 1
                                    <?php
                                    $kmr_kls_1 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 1'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_1['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR KELAS 2
                                    <?php
                                    $kmr_kls_2 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 2'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_2['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR KELAS 3
                                    <?php
                                    $kmr_kls_3 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 3'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_3['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR VIP
                                    <?php
                                    $kmr_kls_vip = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas VIP'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_vip['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR VVIP
                                    <?php
                                    $kmr_kls_vvip = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas VVIP'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_vvip['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">SUMMARY ADMISSION</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    PASIEN IGD
                                    <?php
                                    $pasien_igd = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE kd_poli = 'IGDK'
                                    AND tgl_registrasi = '{$date}'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $pasien_igd['jumlah']; ?></b> <small>Orang</small></span>
                                </li>
                                <li>
                                    PASIEN RANAP
                                    <?php
                                    $pasien_ranap = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM kamar_inap
                                    WHERE stts_pulang = '-'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $pasien_ranap['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    BED TERISI
                                    <?php
                                    $bed_terisi = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $bed_terisi['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                                <li>
                                    BED KOSONG
                                    <?php
                                    $bed_kosong = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE statusdata='1'
                                    AND status='KOSONG'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $bed_kosong['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                                <li>
                                    TOTAL KAPASITAS BED
                                    <span class="pull-right"><b><?php echo $bed_terisi['jumlah']+$bed_kosong['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>
            <!-- #End# Summary -->
            <?php
            if (isset($_SESSION['jenis_poli']) && $_SESSION['jenis_poli'] !=="" && $_SESSION['role'] !=="Paramedis_Ranap") {
            ?>
            <?php
            // Get jenis poli
            $jenispoli=isset($_SESSION['jenis_poli'])?$_SESSION['jenis_poli']:NULL;
            $query_poli = query("SELECT * from poliklinik WHERE kd_poli = '".$jenispoli."'");
            $data_poli = fetch_array($query_poli);
            if ($jenispoli == $data_poli['0']) {
                $nmpoli = $data_poli['1'];
            }
            ?>
            <div class="row clearfix">
                <!-- Pasien Paling Aktif -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Pasien <?php echo ucwords(strtolower($nmpoli)); ?> Paling Aktif</h2>
                        </div>
                        <div class="body">
                            <table id="antrian_pasien" class="table table-bordered table-striped table-hover display nowrap dashboard-task-infos" width="100%">
	                             <thead>
		                               <tr>
		                                   <th>No</th>
		                                   <th>Nama Lengkap</th>
		                                   <th>Kunj</th>
		                               </tr>
	                             </thead>
	                             <tbody>
	                             <?php
		                           $sql = query("SELECT no_rkm_medis, count(no_rkm_medis) jumlah FROM reg_periksa WHERE kd_dokter = '{$_SESSION['username']}' GROUP BY no_rkm_medis ORDER BY jumlah DESC LIMIT 10");
		                           $no=1;
		                           while($row = fetch_array($sql)){
		                               $getNama = fetch_assoc(query("SELECT nm_pasien FROM pasien WHERE no_rkm_medis = '{$row['no_rkm_medis']}'"));
		                               echo '<tr>';
		                               echo '<td>'.$no.'</td>';
		                               echo '<td>'.ucwords(strtolower($getNama['nm_pasien'])).'</td>';
		                               echo '<td>'.$row['jumlah'].'</td>';
		                               echo '</tr>';
		                               $no++;
	                             }
	                             ?>
	                             </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Pasien Paling Aktif -->
                <!-- Antrian Pasien -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Antrian 10 Pasien Terakhir <?php echo ucwords(strtolower($nmpoli)); ?></h2>
                        </div>
                        <div class="body">
                            <table id="antrian_pasien" class="table table-bordered table-striped table-hover display nowrap dashboard-task-infos" width="100%">
                               <thead>
                                  <tr>
        		                          <th>No</th>
                                      <th>Nama Lengkap</th>
                                      <th>Status</th>
                                  </tr>
                               </thead>
                               <tbody>
                               <?php
                               $sql = query("SELECT a.no_rawat, b.no_rkm_medis, b.nm_pasien, a.stts FROM reg_periksa a, pasien b WHERE a.kd_poli = '{$_SESSION['jenis_poli']}' AND a.no_rkm_medis = b.no_rkm_medis AND a.tgl_registrasi = '$date' ORDER BY a.jam_reg ASC LIMIT 10");
		                           $no=1;
                               while($row = fetch_array($sql)){
                                  echo '<tr>';
        		                      echo '<td>'.$no.'</td>';
                                  echo '<td>';
                                  echo '<a href="pasien-ralan.php?action=view&no_rawat='.$row['0'].'" class="title">'.ucwords(strtolower($row['2'])).'</a>';
                                  echo '</td>';
                                  echo '<td>'.$row['3'].'</td>';
                                  echo '</tr>';
		                              $no++;
                               }
                               ?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Antrian Pasien -->
            </div>
          <?php } ?>
        </div>
    </section>

<?php
include_once('layout/footer.php');

?>

    <?php if(!$getmodule) { ?>
    <script>
          $(function () {
              new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
			  new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
			  new Chart(document.getElementById("lines_chart").getContext("2d"), getChartJs('lines'));
			  new Chart(document.getElementById("linesi_chart").getContext("2d"), getChartJs('linesi'));
              initSparkline();
          });
          function getChartJs(type) {
              var config = null;
              if (type === 'bar') {
                  config = {
                      type: 'bar',
                      data: {
                          labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Sepetember", "Oktober", "November", "Desember"],
                          //labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                          datasets: [{
                              label: "Tahun <?php echo $last_year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$last_year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba( 0, 128, 0, 0.5 )'
                          }, {
                              label: "Tahun <?php echo $year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba( 255, 215, 0, 1 )'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
			  if (type === 'line') {
                  config = {
                      type: 'line',
                      data: {
                          labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Sepetember", "Oktober", "November", "Desember"],
                          //labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                          datasets: [{
                              label: "Tahun <?php echo $last_year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$last_year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba( 0, 128, 0, 0.5 )'
                          }, {
                              label: "Tahun <?php echo $year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba( 255, 215, 0, 1 )'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
              if (type === 'line') {
                  config = {
                      type: 'line',
                      data: {
                          labels: [
                            <?php
                                $sql_poli = "SELECT a.nm_poli AS nm_poli FROM poliklinik a, reg_periksa b WHERE a.kd_poli = b.kd_poli AND b.tgl_registrasi = '{$date}' GROUP BY b.kd_poli";
                                $hasil_poli = query($sql_poli);
                                    while ($data = fetch_array ($hasil_poli)){
                                        $get_poli = '"'.$data['nm_poli'].'", ';
                                        echo $get_poli;
                                    }
                            ?>
                          ],
                          datasets: [{
                              label: "Tahun <?php echo $year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE tgl_registrasi = '{$date}'
                                        GROUP BY kd_poli";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba( 184, 136, 169, 0.75 )'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
			  if (type === 'lines') {
                  config = {
                      type: 'bar',
                      data: {
                          labels: [
                            <?php
                                $sql_poli1 = "SELECT  (b.nama_brng) as nama, count(a.kode_brng) as jumlaha FROM  detail_pemberian_obat a inner join databarang b on a.kode_brng=b.kode_brng  WHERE tgl_perawatan ='{$date}' group by b.nama_brng order by jumlaha desc limit 10";
                                $hasil_poli1 = query($sql_poli1);
                                    while ($data1 = fetch_array ($hasil_poli1)){
                                        $get_poli1 = '"'.$data1['nama'].'", ';
                                        echo $get_poli1;
                                    }
                            ?>
                          ],
                          datasets: [{
                              label: "Tanggal <?php echo $date; ?>",
                              data: [
                                <?php
                                    $sql1 = "SELECT count(a.kode_brng) as jumlaha FROM  detail_pemberian_obat a inner join databarang b on a.kode_brng=b.kode_brng  WHERE tgl_perawatan ='{$date}' group by b.nama_brng order by jumlaha desc limit 10";
                                    $hasil1=query($sql1);
                                    while ($data1 = fetch_array ($hasil1)){
                                        $jumlah1 = $data1['jumlaha'].', ';
                                        echo $jumlah1;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba(34, 139, 34, 1.0)'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
			  if (type === 'linesi') {
                  config = {
                      type: 'line',
                      data: {
                          labels: [
                            <?php
                                $sql_poli11 = "select  a.kd_poli, b.nm_poli as nmpoli1,(a.no_rkm_medis)as total from booking_registrasi a join poliklinik b on a.kd_poli=b.kd_poli where a.limit_reg='1' and a.tanggal_periksa ='{$date}' group by b.nm_poli ORDER BY total DESC  Limit 10";
                                $hasil_poli11 = query($sql_poli11);
                                    while ($data11 = fetch_array ($hasil_poli11)){
                                        $get_poli11 = '"'.$data11['nmpoli1'].'", ';
                                        echo $get_poli11;
                                    }
                            ?>
                          ],
                          datasets: [{
                              label: "Tanggal <?php echo $date; ?>",
                              data: [
                                <?php
                                    $sql11 = "select count(a.no_rkm_medis)as total , a.kd_poli, b.nm_poli from booking_registrasi a join poliklinik b on a.kd_poli=b.kd_poli where a.limit_reg='1' and a.tanggal_periksa ='{$date}' group by b.nm_poli ORDER BY total DESC  Limit 10";
                                    $hasil11=query($sql11);
                                    while ($data11 = fetch_array ($hasil11)){
                                        $jumlah11 = $data11['total'].', ';
                                        echo $jumlah11;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba(255, 215, 0, 1)'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: true
                      }
                  }
              }
              return config;
          }
		  
          function initSparkline() {
              $(".sparkline").each(function () {
                  var $this = $(this);
                  $this.sparkline('html', $this.data());
              });
          }
    </script>
<?php } ?>
