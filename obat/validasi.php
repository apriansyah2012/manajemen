<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Validasi';
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
                                VALIDASI PENGAJUAN BARANG MEDIS
								<small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
			                      </h2>
                        </div>
						
                        <div class="body">
						<?php
						$noajuan=$_GET['ni'];
						$nopem=substr($noajuan,3);
						$nopemesanan1="SPM".$nopem;
						?>
						<td>No. Pemesanan = <B><?php echo $nopemesanan1;?></B></td>
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
							
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
										<th>Kode Obat</th>
                                        <th>Nama Obat</th>
										<th>Jml</th>
                                        <th>Satuan</th>
                                        <th>Harga (Rp.)</th>
										<th>Sub Total(Rp.)</th>
										<th>Stok Akhir</th>
										<th>PO</th>
										
										<th>Perbarui</th>
									</tr>
                                </thead>
                                <tbody>
								
								
                                <?php $ni=$_GET['ni'];
								$tanggal = isset($_POST['tanggal'])?$_POST['tanggal']:null;
                                $bangsal = isset($_POST['bangsal'])?$_POST['bangsal']:null;

                                { echo "  No. Pengajuan   = ".$_GET['ni'];  } 
								                $sql = 'select a.jumlah,a.no_pengajuan, a.kode_brng, a.kode_sat, b.nama_brng, b.h_beli,c.stok,count(d.kode_brng)as move from detail_pengajuan_barang_medis a join databarang b join gudangbarang c  join riwayat_barang_medis d WHERE a.kode_brng= b.kode_brng and a.kode_brng=c.kode_brng and c.kode_brng= d.kode_brng and a.no_pengajuan ="'.$ni.'"';
                                  if($tanggal) {
                                    $sql .= " AND c.tanggal = '$tanggal' AND c.jam = (SELECT MAX(jam) FROM riwayat_barang_medis GROUP BY kode_brng LIMIT 1)";
                                }
                                  if($bangsal) {
									                 $sql .= " AND c.kd_bangsal = '$bangsal'";
                                }
								                $sql .= " GROUP BY c.kode_brng";
								                $result = query($sql);
                                $no = 1;
                                while($row = fetch_array($result)) {
									$noajuan=$ni;
									$kode_obat=$row['2'];
									$nama_obat=$row['4'];
									$jml=$row['0'];
									$Satuan=$row['3'];
									$harga=rupiah($row['5']);
									$stok=$row['6'];
									$sql1 = "select a.kode_brng,c.nama_brng, count(a.kode_brng) as jumlaha, sum(a.jumlah)as total ,(sum(a.jumlah)/(count(a.kode_brng))), MIN(a.jumlah), MAX(a.jumlah) from detail_pengajuan_barang_medis a join pengajuan_barang_medis b  join databarang c  WHERE a.no_pengajuan = b.no_pengajuan AND a.kode_brng =c.kode_brng AND b.status='Disetujui' AND a.kode_brng='$kode_obat'  ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
	                                	$sql1 .= "AND b.tanggal BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
	                                } else {
	                                  	$sql1 .= "  AND b.tanggal like '$date' ";
	                                }
	                                	$sql1 .= " group by a.kode_brng order by jumlaha desc ";
										$result1= query($sql1 );
									while($row1 = fetch_array($result1)) {
										$isi=$row1['jumlaha'];
									}
									$subtotal=$row['0']*$row['5'];
									$total=$total+$subtotal;
                                ?>
								
                                    <tr>
                                        <td><?php echo $no; ?>.</td>
										<td><?php echo $kode_obat; ?></td>
                                        <td><?php echo $nama_obat; ?></td>
										<td><?php echo $jml; ?></td>
                                        <td><?php echo $Satuan; ?></td>
                                        <td><?php echo $harga; ?></td> 
										<td><?php echo rupiah($subtotal); ?> </td> 										
                                        <td><?php echo $stok; ?></td>  
										<td><?php echo $isi ; ?> Kali</td>   										
										
                                          <td> <a href="edit-validasi.php?qq=<?php echo "$noajuan" ?>&yy=<?php echo "$kode_obat" ?>">
											<button  class="btn btn-success btn-sm"> Edit Jml Pengajuan</button>
											</a>        </td>    										
                                        
                                    </tr>
									
                                <?php
								
								$noajuan=$_GET['ni'];
								$nopem=substr($noajuan,3);
								
								$jumlah=$row['1'];
								$satuan=$row['3'];
								$kdobat=$row['4'];
								
                                $no++;
                                }
								
                                ?>

								
                                </tbody>
								<tr>
								<td></td><td></td><td><B>Total Pengajuan Barang Medis = </B></td><td></td><td></td><td><td><B><?php echo rupiah($total); ?></B></td>
								</tr>
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
                          <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-4">
                                      <div class="form-group">
                                          <div class="form-line">PILIH LOKASI STOK 
                                            <select name="bangsal" class="form-control show-tick">
                                                
                                                <option value="B0045">Gudang</option>
                                                <option value="B0047">Farmasi Bawah</option>
                                                <option value="AP">Farmasi Atas</option>
                                                
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
								  <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
										<tr>
											<td><input type="submit" name="simpan" class="btn bg-blue btn-block btn-lg waves-effect" value="Disetujui"></td>
										</tr>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                      <div class="form-line">
											                   <a href="#" class="btn bg-blue btn-block btn-lg waves-effect">Ditolak</a>
											                </div>
                                    </div>
                                </div>
								                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <a href="data-validasi.php" class="btn bg-blue btn-block btn-lg waves-effect">Kembali</a>
										                        </div>
                                    </div>
									
                                </div>
                                
                                </form>
							
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
				<?php 
				 if(isset($_POST['simpan'])) {
								$nopemesanan=$nopemesanan1;
								$noajuan=$_GET['ni'];
								$kodesupplier="S0007";
								$nip="0504272";
								$tanggal=date('Ymd');;
								$total1="0";
								$potongan="0";
								$total2="0";
								$ppn="0";
								$materai="0";
								$tagihan="0";
								$status="Proses Pesan";
								$simpanku="Insert INTO surat_pemesanan_medis SET no_pemesanan='$nopemesanan',no_pengajuan='$noajuan',kode_suplier='$kodesupplier',nip='$nip',
								tanggal='$tanggal',total1='$total1',potongan='$potongan',total2='$total2',ppn='$ppn',meterai='$materai',status='$status'";
								 $updateku="update pengajuan_barang_medis SET status ='Disetujui' where no_pengajuan='$noajuan'";
								 $result = query($simpanku);
								 $result = query($updateku);

								echo "<script>window.alert('DATA SUDAH DISETUJUI')
									window.location='data-validasi.php'</script>";
								
								
				 }
				?>
                        </div>

    </section>


								
<?php
include_once('../layout/footer.php');
?>
<?php
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
 

?>