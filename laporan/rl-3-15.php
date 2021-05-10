9l<?php
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
                              LAPORAN RL 3.15 (Cara Bayar) 
                                <small><?php if(isset($_GET['tahun'])) { $tahun = $_GET['tahun']; } else { $tahun = date("Y",strtotime($date)); }; echo "Periode ".$tahun; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="rl-3-15.php?tahun=2016">2016</a></li>
                                        <li><a href="rl-3-15.php?tahun=2017">2017</a></li>
                                        <li><a href="rl-3-15.php?tahun=2018">2018</a></li>
                                        <li><a href="rl-3-15.php?tahun=2019">2019</a></li>
                                    </ul>
                                </li>
                            </ul>                          
                        </div>
                        <div class="body">
                          <p><font size ='3' face = 'Arial'><strong>Kode RS	: <?php echo KODERS;?></strong></font></p>
                          <p><font size ='3' face = 'Arial'><strong>Nama RS		: <?php $bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0'];?></strong></font></p>
                          <p><font size ='3' face = 'Arial'><strong>Tahun	: <?php echo $tahun;?></strong></font></p>
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover table-responsive display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <!--<th>Kode RS</th>
                                      	<th>Kode<br>Propinsi</th>
                                      	<th>Kab/Kota</th>
                                      	<th>Nama RS</th>
                                      	<th>Tahun</th>-->
                                      	<th>No</th>
                                        <th>Cara Pembayaran</th>
                                      	<th>Pasien<br> Rawat Inap<br>Jumlah <br>Pasien Keluar</th>
                                      	<th>Pasien<br> Rawat Inap<br>Jumlah <br>Lama Dirawat</th>
                                      	<th>Jumlah<br> Pasien<br> Rawat<br> Jalan</th>
                                      	<th>Jumlah<br> Pasien<br> Rawat<br> Jalan Lab</th>
                                      	<th>Jumlah<br> Pasien<br> Rawat<br> Jalan Rad</th>
                                      	<th>Jumlah<br> Pasien<br> Rawat<br> Jalan <br>Lain lain</th>
                                    </tr>
                               	</thead>
                                <tbody>
                                	<tr>
                                        <!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>1</td>
                                        <td>UMUM</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0022' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj = 'A00'"));echo $ll[0];?></td>
                              		</tr>
                                  	<tr>
                                        <!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>2</td>
                                        <td>BPJS Kesehatan</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0022' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A52')"));echo $ll[0];?></td>
                              		</tr>
									<tr>
					<!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>3</td>
                                        <td>JAMKESDA</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0022' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A55')"));echo $ll[0];?></td>
                              		</tr>
									<tr>

                                        <!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>4</td>
                                        <td>BPJS TK</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0022' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('A53')"));echo $ll[0];?></td>
                              		</tr>
                                  	<tr>
                                        <!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>5</td>
                                        <td>ASURANSI</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0022' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('104','A05','A06','A07','A08','A09','A10','A11','A12','A13','A14','A15','A16','A17','A18','A19','A20','C02','A69','A21','A22','A23','A24','A25','A26','A27','A28','A29','A29','A30','A31','A32','A33','A34','A35','A36','A37','INH','101','A38','A39','A40','A41','A71','A44','C01','A45','A46','A47','A48','A49','A50','A51')"));echo $ll[0];?></td>
                              		</tr>
                                  	<tr>
                                        <!--<td><?php echo KODERS;?></td>
                                      	<td><?php echo KODEPROP;?></td>
                                      	<td><?php 
                                  		$nm_its = fetch_array(query("SELECT setting.kabupaten FROM setting"));echo $nm_its['0']; ?></td>
                                      	<td><?php 
                                  		$bpt = fetch_array(query("SELECT setting.nama_instansi FROM setting"));echo $bpt['0']; ?></td>
                                        <td><?php echo $tahun; ?></td>-->
                                        <td>6</td>
                                        <td>PERUSAHAAN</td>
                                      	<td><?php $jpk = fetch_array(query("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $jpk[0];?></td>
                                     	<td><?php $jld = fetch_array(query("SELECT SUM(kamar_inap.lama) FROM kamar_inap , reg_periksa WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.tgl_keluar BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $jld[0];?></td>
                                      	<td><?php $rln = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa , poliklinik WHERE reg_periksa.kd_poli = poliklinik.kd_poli AND reg_periksa.status_lanjut = 'Ralan' AND poliklinik.nm_poli LIKE '%poli%' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $rln[0];?></td>
                                      	<td><?php $lab = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0023' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $lab[0];?></td>
                                      	<td><?php $rad = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0024' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $rad[0];?></td>
                                      	<td><?php $ll = fetch_array(query("SELECT COUNT(reg_periksa.no_rawat) FROM reg_periksa WHERE reg_periksa.status_lanjut = 'Ralan' AND reg_periksa.kd_poli = 'U0033' AND reg_periksa.tgl_registrasi BETWEEN '{$tahun}-01-01' AND '{$tahun}-12-31' AND reg_periksa.kd_pj IN ('B01','B02','B71','B03','B04','B05','B06','103','B07','B08','B09','B10','B11','B12','B13','B14','B15','B16','B17','B18','B19','B20','B21','B22','B23','DEA','B24','B25','B26','B27','B28','B29','B30','B31','B32','B33','B34','005','B42','C04','C03','B35','B36','B37','B38','B39','B40','B41','B43','001','B44','B45','B46','B47','B48','B49','B50','B51','B52','105','B53','MDI','B54','B55','B56','B57','B58','B59','B60','B61','B62','B63','B64','B65','007','102','B66','B67','B68','B69','B70','B72','B73','B74','B75','B76','B77','B78','B79','B80','B81','B82','B83','B84','B85','002','B86','B87','004','B88','B89','B90','B91','006','B92','B93','B94','B95','B96')"));echo $ll[0];?></td>
                              		</tr>
                              </tbody>
                            </table>
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