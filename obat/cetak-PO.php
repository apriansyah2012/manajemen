
<?php
/***
* SIMRS Khanza Farmasi from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : aancentos
* Email : aancentos@gmail.com
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
    	<div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
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
                              <?php $sql = 'select a.tanggal, a.no_pemesanan, a.status, a.kode_suplier, b.nama, d.keterangan from surat_pemesanan_medis=a join petugas =b join datasuplier=c join pengajuan_barang_medis=d where a.nip=b.nip and a.no_pengajuan=d.no_pengajuan and a.kode_suplier=c.kode_suplier and a.no_pemesanan="'.$ni.'"';
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
                                :  <?php 
								echo $cetak['no_pemesanan'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tgl Pemesanan : <?php echo tanggal_indo($cetak['tanggal']);?>
                              </div>
                            </div>
                            <div class="row clearfix">
                              
                              
                                <thead>
                                    <tr>
                                        <th><center>No.</center></th>
                                        <th><center>Kode Barang</center></th>
                                        <th><center>Nama Barang</center></th>
                                        <th><center>Satuan</center></th>
                                        <th><center>Jml</center></th>
                                        <th><center>Harga (Rp.)</center></th>
                                        <th><center>Disc</center></th>
                                        <th><center>Sub Total</center></th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $ni=$_GET['ni'];
                                $sql = 'select a. no_pemesanan, a.no_pengajuan, a.kode_suplier, a.nip, b.kode_brng, b.jumlah,b.h_pengajuan,c.nama_brng,c.kode_sat,b.total from surat_pemesanan_medis=a join detail_pengajuan_barang_medis= b left join databarang=c on b.kode_brng=c.kode_brng join pengajuan_barang_medis=d WHERE a.no_pengajuan=b.no_pengajuan and a.no_pengajuan=d.no_pengajuan and d.status ="Disetujui" and  a.no_pemesanan ="'.$ni.'" ';
								$sql .= "ORDER By nama_brng ASC";
								$result = query($sql);
                                $no = 1;
                                $saldo=0;
                                while($row = fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td align='right'><?php echo "$no." ?></td>
                                        <td><?php echo $row['4']; ?></td>
                                        <td><?php echo $row['7']; ?></td>
                                        <td align='center'><?php echo $row['8']; ?></td>
                                        <td align='center'><?php echo $row['5']; ?></td>
                                        <td align='right'><?php echo rupiah($row['6']); ?></td>
                                        <td align='center'><?php echo "0" ?></td>
                                        <td align='right'><?php echo rupiah($row['9']); ?></td>

                                        
                                    </tr>
                                    
                                <?php
                                $saldo=$saldo+$row['9'];
                                $ppn=$saldo*0.1;
                                $totalfix=$saldo+$ppn;
                                $no++;

                                }
                                ?>

                                </tbody>
                                <td></td><td></td><td align='right'>Total Sebelum PPN 10% </td>
                                <td></td><td></td><td></td><td></td>
                                <td align='right'><?php echo rupiah($saldo) ?></td>
                                <tr>
                                  <td></td><td></td><td>PPn (10%) </td><td></td><td></td><td></td><td></td><td align='right'><?php echo rupiah($ppn) ?></td>
                                </tr>
                                <tr>
                                  <td></td><td></td><td><B>Total + PPn 10% </td><td></td><td></td><td></td><td></td><td align='right'><B><?php echo rupiah($totalfix); ?></B</td>

                                    
                                </tr>
                                
                            </table>
                          
                        </div>
            
                      </div>
              </div>

                          </div>
              <div style="margin-left : 52px;">
                          <div style="margin-top : 50px;">
               <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penyusun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apoteker</h6>
               </div>
               </div>
              <div style="margin-left : 52px;">
              <div style="margin-top : 50px;">
           <h6><B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kurnia Ayu Wulandari</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>Andi Nurzakiah Amal, M.Farm. Apt</B></h6>
           <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Koordinator Gudang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h7>No. 503/4930/30/SIPA/V/BPMPT/2016</h7></h6>
           </div> 
           </div> 
      <div style="margin-left : 160px;">
              <div style="margin-top : 50px;">
               <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyetujui,</h6>
               </div>
               </div>
      <div style="margin-left : 150px;">
            <div style="margin-top : 50px;">

               <h6><B>dr. Iis Dwiyatiningsih Karya, MARS</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>dr. Pundi Ferianto, MARS</B></h6>
                       <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wadir. Pelayanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Direktur RS. Karya Husada</h6>
      </div> 
      <div style="margin-top : 50px;">
      <td><center><?php if($totalfix > 10000000){
          print "<br>";
          
          print "Direktur PT. Karya Husada Bersatu<br>";
          print "<br>";
          print "<br>";
          print "<br>";
          print "<B>SURYADI, SE<B><br>";
      

      } ?></center></td>   
       </div>
      </div>
                            
            </div>
                </div>
            </div>
        </div>
        <script>
    window.print();
  </script>
    </section>
  <script>
    window.print();
  </script>
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