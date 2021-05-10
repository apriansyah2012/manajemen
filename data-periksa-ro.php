<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN RADIOLOGI';
include_once('config.php');
include_once('layout/header.php');
include_once('layout/sidebar.php');
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KUNJUNGAN RADIOLOGI
                            </h2>
                        </div>
                        <div class="body">
						<div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
						  <?php 
							  $action = isset($_GET['action'])?$_GET['action']:null;
							  if(!$action){
							?>
							
							<div class="form-line"></div>
							<table id="datatable" class="table responsive table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
							<thead>
							<tr>
								
								<th>TANGGAL PERIKSA</th>
								<th>RJ</th>
								<th>RI</th>
								<th>UMUM</th>
								<th>PERUSAHAAN</th>
								<th>ASURANSI</th>
								<th>BPJS</th>
								<th>KARSEH</th>
								<th>GRATIS</th>
								
								
							</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST['tanggal_awal'])){
									$tgl_awal = $_POST['tanggal_awal'];
									}
								if (isset($_POST['tanggal_akhir'])){
									$tgl_akhir = $_POST['tanggal_akhir'];
									}
								if (isset($_POST['jenis_bayar'])){
									$jenis_bayar = $_POST['jenis_bayar'];
									if ($jenis_bayar == "semua"){
									$query = "SELECT
													a.tgl_periksa,d.png_jawab,sum(d.kd_pj='A00') as umum,
													sum(d.kd_pj IN ('B01',
'B02',
'B71',
'B03',
'B04',
'B05',
'B06',
'103',
'B07',
'B08',
'B09',
'B10',
'B11',
'B12',
'B13',
'B14',
'B17',
'B18',
'B19',
'B20',
'B21',
'B22',
'DEA',
'B23',
'B24',
'B25',
'B26',
'B27',
'B28',
'B29',
'B30',
'B31',
'B32',
'B33',
'B34',
'005',
'B42',
'C04',
'A85',
'C03',
'B35',
'B36',
'B38',
'B39',
'B40',
'B41',
'B43',
'INT',
'001',
'B44',
'B45',
'B46',
'B47',
'PTK',
'A58',
'B48',
'B49',
'B50',
'B51',
'B52',
'105',
'B53',
'MDI',
'B56',
'B57',
'B58',
'B60',
'B61',
'B62',
'B63',
'B64',
'B65',
'007',
'102',
'B66',
'B67',
'B68',
'B69',
'B97',
'B72',
'B73',
'B74',
'B77',
'B78',
'B79',
'B80',
'B81',
'B82',
'B83',
'B84',
'B85',
'B86',
'B87',
'B88',
'A90',
'B89',
'B90',
'B91',
'B92',
'B93',
'B94',
'B95',
'B96',
'A66',
'RSD',
'B99',
'WMI',
'B98',
'CHG',
'HLS',
'C05',
'B37'
)) as pj, sum(d.kd_pj IN ('-',
'A5',
'104',
'A05',
'A06',
'A07',
'A08',
'A09',
'A10',
'A11',
'A12',
'A13',
'A14',
'A15',
'A16',
'A17',
'A18',
'A19',
'A20',
'C02',
'A69',
'A21',
'A22',
'A23',
'A25',
'A72',
'A26',
'A27',
'A28',
'A29',
'A30',
'A31',
'A32',
'A33',
'A34',
'A35',
'A36',
'A37',
'INH',
'A73',
'101',
'A38',
'A39',
'A40',
'A41',
'A42',
'A43',
'A71',
'A44',
'C01',
'A45',
'A46',
'A47',
'A48',
'A49',
'A50',
'A51',
'A53',
'A54',
'A56',
'100',
'A70',
'A59',
'A60',
'A61',
'A62',
'A63',
'A01',
'A04',
'MAN',
'A64',
'A03',
'A02',
'A24',
'A65',
'B15'

)) as asuransi,sum(d.kd_pj ='A52') as bpjs,sum(d.kd_pj ='A55') as karseh,sum(a.status ='Ralan') as rj,sum(a.status ='Ranap') as ri
												FROM 
													periksa_radiologi as a,
													reg_periksa as b,
													pasien as c,
													penjab as d
												WHERE
													a.no_rawat=b.no_rawat
													AND
													b.no_rkm_medis=c.no_rkm_medis
													AND
													b.kd_pj=d.kd_pj
													AND
													tgl_periksa>='$tgl_awal' AND tgl_periksa<='$tgl_akhir'  
													GROUP BY
													a.tgl_periksa"; 	
													
									$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											  <tr>
												  <td><?php echo date("d-M-Y",strtotime($row['tgl_periksa']));?></td>
												  <td><?php echo $row['rj'];?></td>
												  <td><?php echo $row['ri'];?></td>
												  <td><?php echo $row['umum'];?></td>
												  <td><?php echo $row['pj'];?></td>
												  <td><?php echo $row['asuransi'];?></td> 
												  <td><?php echo $row['bpjs'];?></td>
												  <td><?php echo $row['karseh'];?></td>
												  <td><?php echo '0';?></td>
												  
											  </tr>
									<?php			
										}	
									}else{
									$query = "SELECT
													a.tgl_periksa,d.png_jawab,sum(d.kd_pj='A00') as umum,
													sum(d.kd_pj IN ('B01',
'B02',
'B71',
'B03',
'B04',
'B05',
'B06',
'103',
'B07',
'B08',
'B09',
'B10',
'B11',
'B12',
'B13',
'B14',
'B17',
'B18',
'B19',
'B20',
'B21',
'B22',
'DEA',
'B23',
'B24',
'B25',
'B26',
'B27',
'B28',
'B29',
'B30',
'B31',
'B32',
'B33',
'B34',
'005',
'B42',
'C04',
'A85',
'C03',
'B35',
'B36',
'B38',
'B39',
'B40',
'B41',
'B43',
'INT',
'001',
'B44',
'B45',
'B46',
'B47',
'PTK',
'A58',
'B48',
'B49',
'B50',
'B51',
'B52',
'105',
'B53',
'MDI',
'B56',
'B57',
'B58',
'B60',
'B61',
'B62',
'B63',
'B64',
'B65',
'007',
'102',
'B66',
'B67',
'B68',
'B69',
'B97',
'B72',
'B73',
'B74',
'B77',
'B78',
'B79',
'B80',
'B81',
'B82',
'B83',
'B84',
'B85',
'B86',
'B87',
'B88',
'A90',
'B89',
'B90',
'B91',
'B92',
'B93',
'B94',
'B95',
'B96',
'A66',
'RSD',
'B99',
'WMI',
'B98',
'CHG',
'HLS',
'C05',
'B37'
)) as pj, sum(d.kd_pj IN ('-',
'A5',
'104',
'A05',
'A06',
'A07',
'A08',
'A09',
'A10',
'A11',
'A12',
'A13',
'A14',
'A15',
'A16',
'A17',
'A18',
'A19',
'A20',
'C02',
'A69',
'A21',
'A22',
'A23',
'A25',
'A72',
'A26',
'A27',
'A28',
'A29',
'A30',
'A31',
'A32',
'A33',
'A34',
'A35',
'A36',
'A37',
'INH',
'A73',
'101',
'A38',
'A39',
'A40',
'A41',
'A42',
'A43',
'A71',
'A44',
'C01',
'A45',
'A46',
'A47',
'A48',
'A49',
'A50',
'A51',
'A53',
'A54',
'A56',
'100',
'A70',
'A59',
'A60',
'A61',
'A62',
'A63',
'A01',
'A04',
'MAN',
'A64',
'A03',
'A02',
'A24',
'A65',
'B15'

)) as asuransi,sum(d.kd_pj ='A52') as bpjs,sum(d.kd_pj ='A55') as karseh ,sum(a.status_lanjut ='Ralan') as rj,sum(a.status_lanjut ='Ranap') as ri WHERE
													a.no_rawat=b.no_rawat
													AND
													b.no_rkm_medis=c.no_rkm_medis
													AND
													b.kd_pj=d.kd_pj
													AND
													tgl_periksa>='$tgl_awal' AND tgl_periksa<='$tgl_akhir'  
													GROUP BY
													a.tgl_periksa "; 
										$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											  <tr>
											  
												  <td><?php echo date("d-m-Y",strtotime($row['tgl_periksa']));?></td>
												  <td><?php echo $row['rj'];?></td>
												  <td><?php echo $row['ri'];?></td>
												  <td><?php echo $row['tgl_periksa'] ;?></td>
												  <td><?php echo $row['umum'];?></td>
												  <td><?php echo $row['pj'];?></td>
												  <td><?php echo $row['asuransi'];?></td> 
												  <td><?php echo $row['bpjs'];?></td>
												  <td><?php echo $row['karseh'];?></td>
												  <td><?php echo $row['0'];?></td>
											  </tr>
										<?php
										}
									}
								}
							?>				
							</tbody>
						</table>					
							<?php  
							}  
						  ?>
						  <form method="POST" action="" enctype="multipart/form-data">
						  <div class="col-sm-5">
							<div class="form-group form-float">					
								<select name="jenis_bayar" style="width:100%" class="form-control kd_tdk">
									<option value="semua" selected="selected" >SEMUA JENIS BAYAR</option>
									
					
								</select>	
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Tanggal Awal</label>
									<input type="text" name="tanggal_awal" class="datepicker form-control" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Tanggal Akhir</label>
									<input type="text" name="tanggal_akhir" class="datepicker form-control" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>	
							</div>
							
							<button type="submit" class='btn btn-block btn-lg btn-info waves-effect'> 
								CARI DATA
							</button>
							
							</form> <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('layout/footer.php');
?>
