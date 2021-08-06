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
				 <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					<div class="body bg-cyan">
                       <ul class="dashboard-info-box ">
							
                                <li>
                                    <H3>ANGGREK TERISI   
                                    <?php
                                    $kmr_kls_1 = fetch_assoc(query("SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, count(a.status)as ISI
									FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal 
									WHERE a.statusdata='1' and b.nm_bangsal Like 'ANGGREK R%' And a.status='isi'  "));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_1['ISI']; ?></b> <small>ORANG</small></span>
									</H3>
                                </li>
                             
                                </li>
                        </ul>
							
                    </div>
                    </div>
					<div class="card">
                        <div class="body bg-pink">
                            
                             <ul class="dashboard-info-box">
                                <li>
                                    
									<H3>ANGGREK KOSONG 
                                    <?php
                                    $kmr_kls_1 = fetch_assoc(query("SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, count(a.status)as KOSONG
									FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal 
									WHERE a.statusdata='1' and b.nm_bangsal Like 'ANGGREK R%' And a.status='KOSONG'  "));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_1['KOSONG']; ?></b> <small>ORANG</small></span>
									</H3>
                                </li>
                                
                                </li>
                            </ul>
							
                        </div>
                    </div>
					
					<div class="card">
                        <div class="body bg-green">
                            
                             <ul class="dashboard-info-box">
                                <li>
                                    
									<H3>MAWAR   T E R I S I    
                                    <?php
                                    $kmr_kls_11 = fetch_assoc(query("SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, count(a.status)as KOSONG
									FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal 
									WHERE a.statusdata='1' and b.nm_bangsal Like 'MAWAR R%' And a.status='ISI'  "));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_11['KOSONG']; ?></b> <small>ORANG</small></span>
									</H3>
                                </li>
                                
                                </li>
                            </ul>
							
                        </div>
                    </div>
					
					<div class="card">
                        <div class="body bg-teal">
                            
                             <ul class="dashboard-info-box">
                                <li>
                                    
									<H3>MAWAR KOSONG 
                                    <?php
                                    $kmr_kls_11 = fetch_assoc(query("SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, count(a.status)as KOSONG
									FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal 
									WHERE a.statusdata='1' and b.nm_bangsal Like 'MAWAR R%' And a.status='KOSONG'  "));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_11['KOSONG']; ?></b> <small>ORANG</small></span>
									</H3>
                                </li>
                                
                                </li>
                            </ul>
							
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

				
                
            </div>
            <!-- #END# Widgets -->
			
            <!-- Bar chartjs -->
            <div class="card">
                <div class="header">
                    <h2>GRAFIK KUNJUNGAN Per TAHUN </h2>
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
                                      <th>LOS</th>
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
												
												
												$bor1="select ((count(no_rawat)/133)*100) as hasil from kamar_inap where stts_pulang ='-'";
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
                                      <td><?php $toi = (($result1['total']*30)-$result2['lama'])/$jmlpsn['jml']; echo number_format($toi,2)." Hari";?></td>
                                      <td><?php $mati = "SELECT COUNT(no_rawat) as mati FROM kamar_inap WHERE stts_pulang = 'Meninggal' AND lama > 2 AND tgl_keluar LIKE '%{$tahun}%'"; $death = fetch_array(query($mati)); $ndr = ($death['mati']/$jmlpsn['jml'])*1000; echo number_format($ndr,2)." Permil";?></td>
                                      <td><?php $die = "SELECT COUNT(no_rawat) as mati FROM kamar_inap WHERE stts_pulang = 'Meninggal' AND tgl_keluar LIKE '%{$bulan}%'"; $shi = fetch_array(query($die));$gdr = ($shi['mati']/$jmlpsn['jml'])*1000;echo number_format($gdr,2)." Permil";?></td>
                                      <td><?php $avg = $jmlpsn['jml']/30; echo number_format($avg,2);?></td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
						
                    </div>
                </div>
            </div>
			
			 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INFORMASI KETERSEDIAAN BED COVID 19  
								<small><?php echo $dayList[$day].", ".date(d)." ".date(M)." ".$bulanList[$bulan]." ".date(Y)." ".$time; ?></small>
                            </h2>
							<h5>
                                RUANGAN ANGGREK
								
                            </h5>
						</div>
						<div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO</th>
										<th>KODE KAMAR</th>
                                        <th>NAMA KAMAR</th>
                                        <th>STATUS</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, a.status FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal WHERE a.statusdata='1' and b.nm_bangsal Like 'ANGGREK R%' ";
                                
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
						<div class="header">
                            
							<h5>
                                RUANGAN MELATI
								
                            </h5>
						</div>
						<div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO</th>
										<th>KODE KAMAR</th>
                                        <th>NAMA KAMAR</th>
                                        <th>STATUS</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, a.status FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal WHERE a.statusdata='1' and b.nm_bangsal Like 'MELATI 0%' ";
                                
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
					
                        <div class="header">
                            
							<h5>
                                RUANGAN MAWAR
								
                            </h5>
						</div>
						<div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO</th>
										<th>KODE KAMAR</th>
                                        <th>NAMA KAMAR</th>
                                        <th>STATUS</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT a.kd_kamar, a.kd_bangsal, b.nm_bangsal, a.status FROM kamar a inner join bangsal b on a.kd_bangsal=b.kd_bangsal WHERE a.statusdata='1' and b.nm_bangsal Like 'MAWAR R%' ";
                                
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
					</div>
				</div>
			</div>
			
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
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    AND kd_poli != 'U0027'
                                    AND status_bayar = 'Belum Bayar'"));
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
                              backgroundColor: 'rgba( 233, 30, 99, 0.5 )'
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
                              backgroundColor: 'rgba(20, 20, 146, 0.5)'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
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
