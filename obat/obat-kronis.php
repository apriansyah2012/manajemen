<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Penggunaan Obat Kronis BPJS';
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
                                Penggunaan Obat Kronis BPJS
								<small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
			                      </h2>
                        </div>
						
                       
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>NO</th>
										<th>TANGGAL</th>
										<th>KODE DEPO</th>
										<th>NAMA DEPO</th>
										<th>KODE BARANG</th>
										<th>NAMA BARANG</th>
                                        <th>JUMLAH</th>
										<th>KETERANGAN</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT b.kd_bangsal,f.nm_bangsal, b.no_rkm_medis, d.nm_pasien, b.tgl_jual,a.kode_brng, c.nama_brng, count(a.kode_brng)as kode, b.keterangan, b.jns_jual, b.nip, e.nama from detailjual a join penjualan b join databarang c join pasien d join petugas e join bangsal f where a.nota_jual = b.nota_jual AND a.kode_brng=c.kode_brng AND b.keterangan='OBAT KRONIS'  and b.jns_jual='Utama/BPJS' AND b.no_rkm_medis=d.no_rkm_medis AND b.nip=e.nip AND  b.kd_bangsal=f.kd_bangsal";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
	                                	$sql .= " AND b.tgl_jual BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
	                                } else {
	                                  	$sql .= "  AND b.tgl_jual like '$date' ";
	                                }
	                                	$sql .= "group by a.kode_brng  ORDER BY kode desc";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
										<td><?php echo tanggal_indo($row['4']); ?></td>
										<td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['5']; ?></td>
										<td><?php echo $row['6']; ?></td>
										<td><?php echo $row['kode']; ?></td>
										<td><?php echo $row['8']; ?></td>
                                      
                                    </tr>
                                 <?php
                                $no++;
                                }
                                ?>
                                
                                </tbody>
								
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