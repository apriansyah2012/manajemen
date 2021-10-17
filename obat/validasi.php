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
								
			                      </h2>
                        </div>
                        <div class="body">
						
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
							
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Jml</th>
                                        <th>Satuan</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                    					<th>Harga (Rp.)</th>
										<th>Stok Akhir</th>
										<th>TGL. Update</th>
										
										
                                    </tr>
                                </thead>
                                <tbody>
								
								
                                <?php $ni=$_GET['ni'];
								
                                $bangsal = isset($_POST['bangsal'])?$_POST['bangsal']:null;

                                { echo "  No. Pengajuan = ".$_GET['ni'];  } 
								                $sql = 'select a.no_pengajuan,a.jumlah, b.nama_brng,a.kode_sat, a.kode_brng, a.h_pengajuan,e.stok, max(c.tanggal) from detail_pengajuan_barang_medis=a join gudangbarang=e join databarang = b LEFT JOIN riwayat_barang_medis =c on b.kode_brng= c.kode_brng where a.kode_brng=b.kode_brng and a.kd_brng=e.kd_brng and a.no_pengajuan ="'.$ni.'"';
                                  if($bangsal) {
									                 $sql .= " AND e.kd_bangsal = '$bangsal'";
                                }
								                $sql .= " GROUP BY e.kode_brng";
								                $result = query($sql);
                                $no = 1;
                                while($row = fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        <td><?php echo $row['4']; ?></td>
                                        <td><?php echo $row['2']; ?></td>                  										
                                        <td><?php echo rupiah($row['5']); ?></td>                  										
                                        <td><?php echo $row['6']; ?></td>                 										
                                        <td><?php echo $row['7']; ?></td>               										
                                        
                                    </tr>
                                <?php
								$noajuan=$_GET['ni'];
								$nopem=substr($noajuan,3);
								$nopemesanan1="SPM".$nopem;
								$jumlah=$row['1'];
								$satuan=$row['3'];
								$kdobat=$row['4'];
								
                                $no++;
                                }
								
                                ?>
								
                                </tbody>
                          </table>
                          
                          <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-4">
                                      <div class="form-group">
                                          <div class="form-line">PILIH LOKASI STOK 
                                            <select name="bangsal" class="form-control show-tick">
                                                
                                                <option value="B0045">Gudang</option>
                                                <option value="AP">Farmasi Bawah</option>
                                                <option value="B0047">Farmasi Atas</option>
                                                
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
									<td>No Pemesanan : <B><?php echo $nopemesanan1;?></B></td>
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
								$simpanku="Insert INTO surat_pemesanan_medis SET no_pemesanan='$nopemesanan',no_pengajuan='$noajuan',kode_suplier='$kodesupplier',nip='$nip', tanggal='$tanggal',total1='$total1',potongan='$potongan',total2='$total2', ppn='$ppn', meterai='$materai', status='$status'";
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