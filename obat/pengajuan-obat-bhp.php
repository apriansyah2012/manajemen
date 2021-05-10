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
                                PENGAJUAN OBAT/BHP
								VALIDASI PENGAJUAN BARANG MEDIS
								<small><?php 
								$nomor="PBM".date("Y").date("m").date("d");
								$sgl="select max(no_pemesanan) as nopesan from surat_pemesanan_medis where month(tanggal)='$month'";
								$sresult = query($sgl);
								$no = 1;
                                $kode=sprintf("%03s", $no);
                                while($rows = fetch_array($sresult)) {
                                ?>
                                    <tr>
                                        
                                        
                                        
                                    </tr>
                                    
                                <?php
                                
                                $no++;

                                }
                                ?>
								</small>
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
										<th>Action</th>
										
                                    </tr>
                                </thead>
                                <tbody>
								
								
                                <?php 
								
                                $bangsal = isset($_POST['bangsal'])?$_POST['bangsal']:null;

                                { echo "  No. Pengajuan = " .$nomor.$kode; } 
								             $sql = 'select a.no_pengajuan,a.jumlah, b.nama_brng,a.kode_sat, a.kode_brng, a.h_pengajuan,c.stok_akhir, max(c.tanggal) from detail_pengajuan_barang_medis=a join databarang = b LEFT JOIN riwayat_barang_medis =c on b.kode_brng= c.kode_brng where a.kode_brng=b.kode_brng ';
                                  if($bangsal) {
									                 $sql .= " AND c.kd_bangsal = '$bangsal'";
                                }
								                $sql .= " GROUP BY c.kode_brng";
								                $result = query($sql);
                                $no = 1;
                                while($row = fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><input type="text" width ="2px" value="0"></input></td>
                                        <td><?php echo $row['3']; ?></td>
                                        <td><?php echo $row['4']; ?></td>
                                        <td><?php echo $row['2']; ?></td>                  										
                                        <td><?php echo rupiah($row['5']); ?></td>                  										
                                        <td><?php echo $row['6']; ?></td>                 										
                                        <td><?php echo $row['7']; ?></td>               										
                                        
                                    </tr>
                                <?php
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
                                            <input type="submit" class="btn bg-blue btn-block btn-lg waves-effect"> </input>
											  
                                        </div>
                                    </div>
                                </div>
								  <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
										<tr>
											<td><input type="submit" name="Submit" class="btn bg-blue btn-block btn-lg waves-effect" value="Simpan" ></input></td>
										</tr>
                                        </div>
                                    </div>
                                
					            <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                          <a href="index.php" class="btn bg-blue btn-block btn-lg waves-effect" >Kembali</a>
										                        </div>
                                    </div>
                                </div>
                                </form>
			
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
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