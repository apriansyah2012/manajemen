<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'LAPORAN RESEP RACIKAN DI RAWAT JALAN';
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
                                LAPORAN RESEP RACIKAN DI RAWAT JALAN
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
								
								<th>TANGGAL RESEP</th>
								<th>UMUM</th>
								<th>PERUSAHAAN</th>
								<th>ASURANSI</th>
								<th>BPJS</th>
								<th>JAMSOS</th>
								<th>KEMKES</th>
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
									$query = "select a.tgl_perawatan, sum(b.status_poli ='Lama') as lama, sum(b.status_poli ='Baru') as baru, sum(d.kategori='TUNAI') as umum, sum(d.kategori IN ('PERUSAHAAN')) as pj, sum(d.kategori IN ('ASURANSI')) as asuransi,sum(d.kategori ='BPJS') as bpjs,sum(b.kd_pj ='A55') as karseh,sum(d.kategori ='JAMSOS') as kemkes, sum(c.jk ='L') as Laki,sum(c.jk ='P') as Perempuan, sum(b.stts='Dirujuk') as rujuk, sum(b.stts='Meninggal') as doa from obat_racikan a Join reg_periksa b  join pasien c join penjab d where a.no_rawat=b.no_rawat and b.no_rkm_medis=c.no_rkm_medis and b.status_lanjut ='Ralan' AND b.kd_pj=d.kd_pj  AND a.tgl_perawatan between  '$tgl_awal' AND '$tgl_akhir'  
													GROUP BY
													a.tgl_perawatan"; 	
													
									$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											  <tr>
												  <td><?php echo $row['tgl_perawatan'] ;?></td>
												  <td><?php echo $row['umum'];?></td>
												  <td><?php echo $row['pj'];?></td>
												  <td><?php echo $row['asuransi'];?></td> 
												  <td><?php echo $row['bpjs'];?></td>
												  <td><?php echo $row['karseh'];?></td>
												  <td><?php echo $row['kemkes'];?></td>
												  <td><?php echo '0';?></td>
												  
											  </tr>
									<?php			
										}	
									}else{
									$query = "select a.tgl_perawatan, sum(b.status_poli ='Lama') as lama, sum(b.status_poli ='Baru') as baru, sum(d.kategori='TUNAI') as umum, sum(d.kategori IN ('PERUSAHAAN')) as pj, sum(d.kategori IN ('ASURANSI')) as asuransi,sum(d.kategori ='BPJS') as bpjs,sum(b.kd_pj ='A55') as karseh,sum(d.kategori ='JAMSOS') as kemkes, sum(c.jk ='L') as Laki,sum(c.jk ='P') as Perempuan, sum(b.stts='Dirujuk') as rujuk, sum(b.stts='Meninggal') as doa from obat_racikan a Join reg_periksa b  join pasien c join penjab d where a.no_rawat=b.no_rawat and b.no_rkm_medis=c.no_rkm_medis and b.status_lanjut ='Ralan' AND b.kd_pj=d.kd_pj  AND a.tgl_perawatan between  '$tgl_awal' AND '$tgl_akhir'  
													GROUP BY
													a.tgl_perawatan "; 
										$execute=query($query); 
											while ($row = fetch_array($execute)){
											?>
											  <tr>
												  <td><?php echo $row['tgl_perawatan'] ;?></td>
												  <td><?php echo $row['umum'];?></td>
												  <td><?php echo $row['pj'];?></td>
												  <td><?php echo $row['asuransi'];?></td> 
												  <td><?php echo $row['bpjs'];?></td>
												  <td><?php echo $row['karseh'];?></td>
												  <td><?php echo $row['kemkes'];?></td>
												  <td><?php echo '0';?></td>
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
