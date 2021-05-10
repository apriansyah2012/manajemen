<?php
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
 

?>
<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Cetak SPM';
include_once('../config.php');
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                          <div class="container" style="margin-top : 0px;" action="cetak">
                            <div class="row clearfix">
                              <div class="col-md-1 col-sm-1">
                                <div class="form-group">
                                  <img src="<?php echo URL; ?>/images/LOGO.png" height="60" width="60">
                                </div>
                              </div>
                              <div class="col-md-10">
                                <div class="form-group">
								                  <h5><B><center>RUMAH SAKIT KARYA HUSADA</center></B></h5>
                                  <h6><center>Jl. A. Yani No. 98 Cikampek, Karawang, Jawa Barat </center></h6>
                                  <h6><center>0264 316188/318189</center></h6>
                								  <hr size="60px" width="100%" align="left">
                								  <h5><B><center>SURAT PEMESANAN BARANG</center></B></h5>
                                </div>
                              </div>
                            </div>
                			<?php $ni=$_GET['ni'];?>
                              <?php $sql = 'select a.tanggal, a.no_pengajuan, a.status, a.keterangan, b.nama from pengajuan_barang_medis=a join petugas =b where a.nip=b.nip and a.no_pengajuan ="'.$ni.'"';
                            	$assoc = query($sql);
                            	$cetak = mysqli_fetch_assoc($assoc);
                            ?>
                            <div class="row clearfix">
                              <div class="col-md-2">
                                Kepada 
                              </div>
                              <div class="col-md-4">
                                : <B><?php echo $cetak['keterangan'];?></B>
                              </div>
                            </div>
                            <div class="row clearfix">
                              <div class="col-md-2">
                                Pesanan No
                              </div>
                              <div class="col-md-10">
                                :  <?php echo $cetak['no_pengajuan'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl Pengajuan : <?php echo $cetak['tanggal'];?>
                              </div>
                            </div>
                            <div class="row clearfix">
                              
                              <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Jml</th>
                    					<th>Harga (Rp.)</th>
                    					<th>Disc</th>
                    					<th>Sub Total</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $ni=$_GET['ni'];
                                $sql = 'select a.no_pengajuan,a.jumlah, b.nama_brng,a.kode_sat, a.kode_brng, a.h_pengajuan,c.stok_akhir, max(c.tanggal),(a.jumlah*a.h_pengajuan) from detail_pengajuan_barang_medis=a join databarang = b LEFT JOIN riwayat_barang_medis =c on b.kode_brng= c.kode_brng where a.kode_brng=b.kode_brng and a.no_pengajuan ="'.$ni.'"';
   								$sql .= " GROUP BY c.kode_brng";
                				$result = query($sql);
                                $no = 1;
                                $saldo=0;
                                while($row = fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo "$no." ?></td>
                                        <td><?php echo $row['4']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                        <td><?php echo $row['1']; ?></td>
                    										<td><?php echo rupiah($row['5']); ?></td>
                                        <td><?php echo "0" ?></td>
                                        <td><?php echo rupiah($row['8']); ?></td>

                                        
                                    </tr>
                                    
                                <?php
                                $saldo=$saldo+$row['8'];
                                $ppn=$saldo*0.1;
                                $totalfix=$saldo+$ppn;
                                $no++;

                                }
                                ?>

                                </tbody>
                                <td></td><td></td><td>Total Sebelum PPN 10% </td>
                                <td></td><td></td><td></td><td></td>
                                <td><?php echo rupiah($saldo) ?></td>
                                <tr>
                                  <td></td><td></td><td>PPn (10%) </td><td></td><td></td><td></td><td></td><td><?php echo rupiah($ppn) ?></td>
                                </tr>
                                <tr>
                                  <td></td><td></td><td><B>Total + PPn 10% </td><td></td><td></td><td></td><td></td><td><?php echo rupiah($totalfix); ?></td>
                                </tr>
                                
                            </table>
                          
                        </div>
						
                      </div>
							</div>

                          </div>
						  <div style="margin-left : 52px;">
                          <div style="margin-top : 50px;">
						   <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyusun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apoteker</h6>
						   </div>
						   </div>
						  <div style="margin-left : 52px;">
              <div style="margin-top : 50px;">
				   <h6><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kurnia Ayu Wulandari</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Andi Nurzakiah Amal, M.Farm. Apt</B></h6>
    	     <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Koordinator Gudang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h7>No. 503/4930/30/SIPA/V/BPMPT/2016</h7></h6>
    		   </div>	
    		   </div>	
			<div style="margin-left : 160px;">
              <div style="margin-top : 50px;">
						   <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyetujui,</h6>
						   </div>
						   </div>
			<div style="margin-left : 150px;">
            <div style="margin-top : 50px;">

						   <h6><B>dr. Iis Dwiyatiningsih Karya, MARS</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<B>dr. Pundi Ferianto, MARS</B></h6>
               			   <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wadir. Pelayanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Direktur RS. Karya Husada</h6>
			</div>	  
			</div>
                            
            </div>
                </div>
            </div>
        </div>
    </section>
	<script>
		window.print();
	</script>
