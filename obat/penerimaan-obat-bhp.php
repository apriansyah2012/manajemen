<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'PENERIMAAN';
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
                                PENERIMAAN OBAT/BHP
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
                                
                          </table>
                          
                          <div class="row clearfix">
                                <form method="post" action="">
                                <div class="col-sm-4">
                                      <div class="form-group">
                                          <div class="form-line">PILIH LOKASI STOK
                                            <select name="bangsal" class="form-control show-tick">
                                                <option value="">Semua Lokasi</option>
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
                                          <a href="../index.php" class="btn bg-blue btn-block btn-lg waves-effect">Kembali</a>
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