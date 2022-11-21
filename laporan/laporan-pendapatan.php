<?php


$title = 'Data Periksa Lab';
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
                                Laporan Tagihan Rumah Sakit
                            </h2>
                        </div>
                        <div class="body">
						<div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
						  <?php 
							  $action = isset($_GET['action'])?$_GET['action']:null;
							  if(!$action){
							?>
							<form method="POST" action="" enctype="multipart/form-data">
							<div class="form-group form-float">							
								<select name="jenis_bayar" style="width:100%" class="form-control kd_tdk">
									<option value="%%" selected="selected" >SEMUA JENIS BAYAR</option>
									<option value="TUNAI">TUNAI</option>
									<option value="BPJS">BPJS</option>
									<option value="ASURANSI">ASURANSI</option>
									<option value="PERUSAHAAN">PERUSAHAAN</option>					
								</select>	
							</div>
							
							<div class="form-group form-float">							
								<select name="jenis_rawat" style="width:100%" class="form-control kd_tdk">
									<option value="%%" selected="selected" >RAJAL & RANAP</option>
									<option value="Ralan">RAWAT JALAN</option>
									<option value="Ranap">RAWAT INAP</option>
								</select>	
							</div>
							
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Tanggal Awal</label>
									<input type="text" name="tanggal_awal" class="datepicker form-control" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<label class="form-label">Tanggal Akhir</label>
									<input type="text" name="tanggal_akhir" class="datepicker form-control" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>	
							<button type="submit" class='btn btn-block btn-lg btn-info waves-effect'> 
								CARI DATA
							</button>
							</form> <br><br>
							<div class="form-line"></div>
							<table id="datatable" class="table responsive table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
							<thead>
							<tr>
								<th>Tgl Registrasi</th>
								<th>No. RM</th>
								<th>Nama Pasien</th>
								<th>Status</th>
								<th>Jenis Bayar</th>								
								<th>Tgl Closing Kasir</th>								
								<th>Total Biaya</th>  
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
								if (isset($_POST['jenis_rawat'])){
									$jenis_rawat = $_POST['jenis_rawat'];
									}
								if (isset($_POST['jenis_bayar'])){
									$jenis_bayar = $_POST['jenis_bayar'];									
									
									if ($jenis_bayar == "%%"){
									$query = "SELECT 
											reg_periksa.tgl_registrasi, reg_periksa.no_rkm_medis, pasien.nm_pasien, reg_periksa.status_lanjut, penjab.png_jawab, total_billing.tgl_byr, format(total_billing.TotalBiaya,2, 'de-DE') as 'TotalBiaya'

											FROM reg_periksa 
											
											left join (SELECT 
											no_rawat, tgl_byr, Sum(totalbiaya) AS TotalBiaya
											FROM         billing											
											GROUP BY no_rawat	
											) as total_billing
											on reg_periksa.no_rawat = total_billing.no_rawat


											join pasien
											on reg_periksa.no_rkm_medis = pasien.no_rkm_medis

											join penjab
											on reg_periksa.kd_pj = penjab.kd_pj

										WHERE 
											reg_periksa.status_bayar not like '%batal%' 
											and reg_periksa.status_bayar LIKE '%sudah%' 
											and reg_periksa.status_lanjut LIKE '$jenis_rawat' 												
											AND total_billing.tgl_byr >='$tgl_awal' AND total_billing.tgl_byr<='$tgl_akhir'  
											GROUP BY
											reg_periksa.no_rawat"; 	
													
									$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											  <tr>
												  <td><?php echo $row['tgl_registrasi'];?></td>
												  <td><?php echo $row['no_rkm_medis'];?></td>
												  <td><?php echo $row['nm_pasien'];?></td>
												  <td><?php echo $row['status_lanjut'];?></td>
												  <td><?php echo $row['png_jawab'];?></td>
												  <td><?php echo $row['tgl_byr'];?></td>
												  <td><?php echo $row['TotalBiaya'];?></td> 
											  </tr>
											 
											  
											
																						  
									<?php			
										}	
									}else{
									$query = "SELECT 
											reg_periksa.tgl_registrasi, reg_periksa.no_rkm_medis, pasien.nm_pasien, reg_periksa.status_lanjut, penjab.png_jawab, total_billing.tgl_byr, format(total_billing.TotalBiaya,2, 'de-DE') as 'TotalBiaya'

											FROM reg_periksa 
											
											left join (SELECT 
											no_rawat, tgl_byr, Sum(totalbiaya) AS TotalBiaya
											FROM         billing											
											GROUP BY no_rawat	
											) as total_billing
											on reg_periksa.no_rawat = total_billing.no_rawat


											join pasien
											on reg_periksa.no_rkm_medis = pasien.no_rkm_medis

											join penjab
											on reg_periksa.kd_pj = penjab.kd_pj

										WHERE 
											reg_periksa.status_bayar not like '%batal%' 
											and reg_periksa.status_bayar LIKE '%sudah%'
											and penjab.kategori LIKE '$jenis_bayar'	
											and reg_periksa.status_lanjut LIKE '$jenis_rawat' 																						
											AND total_billing.tgl_byr >='$tgl_awal' AND total_billing.tgl_byr<='$tgl_akhir'  
											GROUP BY
											reg_periksa.no_rawat"; 	
										$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											   <tr>
												  <td><?php echo $row['tgl_registrasi'];?></td>
												  <td><?php echo $row['no_rkm_medis'];?></td>
												  <td><?php echo $row['nm_pasien'];?></td>
												  <td><?php echo $row['status_lanjut'];?></td>
												  <td><?php echo $row['png_jawab'];?></td>
												  <td><?php echo $row['tgl_byr'];?></td>
												  <td><?php echo $row['TotalBiaya'];?></td> 
											  </tr>
										<?php
										}
									}
								}
							?>								
							
							
<!--==================================================================================================================-->
									
							
											  


							</tbody>
						</table>					
							<?php  
							}  
						  ?>	


 <!--==================================================================================================================-->
											
											<?php
											  $querytotal = "
														SELECT 
														billing.tgl_byr, 
														FORMAT(SUM(billing.totalbiaya),2, 'de_DE') as 'pendapatan_ranap'
														
														FROM reg_periksa 

														join billing
														on reg_periksa.no_rawat = billing.no_rawat

														join penjab
														on reg_periksa.kd_pj = penjab.kd_pj

														WHERE 
														reg_periksa.status_bayar not like '%batal%' 
														and reg_periksa.status_bayar LIKE '%sudah%' 
														and penjab.kategori LIKE '$jenis_bayar'	
														and reg_periksa.status_lanjut LIKE '$jenis_rawat' 															
														AND billing.tgl_byr >='$tgl_awal' AND billing.tgl_byr<='$tgl_akhir'  
														
											"; 	
													
									$executes=query($querytotal); 
											while ($rowtotals = fetch_array($executes)){
											  ?>
											  <table class="table responsive table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
											  <tr>
													<td style="text-align:right; font-weight: bold;">
														<h3 style="color: green; border: 4px solid green; letter-spacing: 5px; padding: 10px;">
															--> TOTAL : Rp. <?php echo $rowtotals['pendapatan_ranap']; ?>															
														</h3>
													</td>
											 
											  </tr>
											  </table>
											  <?php 
											}?>
											
<!--==================================================================================================================-->						  
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
		
    </section>

<?php
include_once('layout/footer.php');
?>
