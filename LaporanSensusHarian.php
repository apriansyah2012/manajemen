<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Blank';
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
                                SENSUS RAWAT INAP
                                <html>
  <style>
    .srts {
      margin-bottom:20px;
    }
    table {
      font-family: Arial;
      font-size:13px;
    }
  </style>
	<body>

    <?php
    reportsqlinjection();
        $tanggal1      = $_GET['tanggal1'];
        $tanggal2      = $_GET['tanggal2'];
        $kamar         = $_GET['kamar'];
      	$ytr 		   = date('Y-m-d',strtotime($_GET['tanggal1']."-1 days"));
      	$month 		   = date('Y-m-d',strtotime($_GET['tanggal1']."+29 days"));
      	$date		   = date('Y-m-d');
	?>
		<strong>RS. KARYA HUSADA<br>KAB. KARAWANG<br></strong>
      	<font size='5' face='Arial'><p align = center><u><strong>SENSUS HARIAN PASIEN RAWAT INAP</strong></u></p></font>
          	<!--MASUK-->

                	<p align = right>Unit Perawatan : <?php echo $kamar;?></p>
          			<p align = right>Tanggal : <?php echo $tanggal1;?></p>

							<table width='100%' border='1' cellpadding='0' cellspacing='0' class='srts'>
                          		<caption><center><font color='000000' size='4' face='Arial'><strong>PASIEN MASUK</strong></font></center></caption>
								<tr>
                          	 		<td width='5%'><center><font color='000000' size='2' face='Arial'>No</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>No.RM</font></center></td>
                             		<td width='15%'><center><font color='000000' size='2' face='Arial'>Nama Pasien</font></center></td>
                             		<td width='15%'><center><font color='000000' size='2' face='Arial'>Alamat</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Umur</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>L/P</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>Kelas</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Rujukan</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Cara Bayar</font></center></td>
                             		<td width='20%'><center><font color='000000' size='2' face='Arial'>Dokter yang<br>Merawat</font></center></td>
								</tr>
                          		<?php
                          		$_sql = "SELECT kamar_inap.no_rawat , reg_periksa.no_rkm_medis , pasien.nm_pasien , pasien.alamat , pasien.umur , pasien.jk , kamar_inap.tgl_masuk , kamar_inap.stts_pulang , penjab.png_jawab , dokter.nm_dokter , kamar.kelas
                          			FROM kamar_inap JOIN kamar JOIN bangsal JOIN reg_periksa JOIN pasien JOIN penjab JOIN dokter
                                    ON reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal
                                    AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND reg_periksa.kd_pj = penjab.kd_pj AND dokter.kd_dokter = reg_periksa.kd_dokter
                                    WHERE kamar_inap.tgl_masuk BETWEEN '$tanggal1' AND '$tanggal2' AND bangsal.nm_bangsal LIKE '%$kamar%' GROUP BY kamar_inap.no_rawat HAVING COUNT(kamar_inap.no_rawat) = 1";
                          		$hasil=bukaquery($_sql);
      					  		$no = 1;
                          		while($masuk = mysqli_fetch_array($hasil)) { 	?>

								<tr>
									<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $no;?></font></center></td>
									<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["no_rkm_medis"];?></font></center></td>
									<td width='15%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["nm_pasien"];?></font></center></td>
                                    <td width='15%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["alamat"];?></font></center></td>
                                    <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["umur"];?></font></center></td>
                                    <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["jk"];?></font></center></td>
                                    <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["kelas"];?></font></center></td>
									<td width='10%'><center><font color='000000' size='2' face='Arial'></font></center></td>
									<td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $masuk["png_jawab"];?></font></center></td>
									<td width='20%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT dokter.nm_dokter FROM dokter , kamar_inap , dpjp_ranap WHERE kamar_inap.no_rawat = dpjp_ranap.no_rawat AND dpjp_ranap.kd_dokter = dokter.kd_dokter AND kamar_inap.no_rawat = '{$masuk["no_rawat"]}' Order By dokter.nm_dokter ASC"));echo $dr["nm_dokter"];?></font></center></td>
								</tr>
                          		<?php
                          		$no++;
						  		}?>
							</table>

      		<!--PULANG-->

                      		<table width='100%' border='1' cellpadding='0' cellspacing='0' class='srts'>
                          		<caption><center><font color='000000' size='4' face='Arial'><strong>PASIEN PULANG / KELUAR / PINDAH KE RS LAIN</strong></font></center></caption>
                          		<tr>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>No</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>No.RM</font></center></td>
                             		<td width='15%'><center><font color='000000' size='2' face='Arial'>Nama Pasien</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Umur</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>L/P</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Tanggal Masuk</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>APS/RJ/Sembuh</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>Cara Bayar</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Dirujuk Ke</font></center></td>
                             		<td width='10%'><center><font color='000000' size='2' face='Arial'>Diagnosa Utama</font></center></td>
                             		<td width='5%'><center><font color='000000' size='2' face='Arial'>Kode ICD X</font></center></td>
                             		<td width='20%'><center><font color='000000' size='2' face='Arial'>Dokter yang Merawat</font></center></td>
								</tr>
                          		<?php
                          		$_sql = "SELECT reg_periksa.no_rkm_medis , kamar_inap.no_rawat , pasien.nm_pasien , pasien.umur , pasien.jk , kamar_inap.tgl_masuk , kamar_inap.stts_pulang , penjab.png_jawab , dokter.nm_dokter , kamar_inap.diagnosa_akhir
                          			FROM kamar_inap JOIN kamar JOIN bangsal JOIN reg_periksa JOIN pasien JOIN penjab JOIN dokter
                                    ON reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal
                                    AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND reg_periksa.kd_pj = penjab.kd_pj AND dokter.kd_dokter = reg_periksa.kd_dokter
                                    WHERE kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2' AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang NOT IN ('Pindah Kamar','Meninggal')";
                          		$hasil=bukaquery($_sql);
     					  		$no = 1;
                          		while($baris = mysqli_fetch_array($hasil)) { ?>
								<tr>
									<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $no;?></font></center></td>
									<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["no_rkm_medis"];?></font></center></td>
									<td width='15%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["nm_pasien"];?></font></center></td>
                                    <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["umur"];?></font></center></td>
                                    <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["jk"];?></font></center></td>
                                    <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["tgl_masuk"];?></font></center></td>
									<td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["stts_pulang"];?></font></center></td>
                                    <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["png_jawab"];?></font></center></td>
									<td width='10%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT rujuk.rujuk_ke FROM rujuk WHERE rujuk.no_rawat = '{$baris["no_rawat"]}'"));echo $dr["rujuk_ke"];?></font></center></td>
                                    <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["diagnosa_akhir"];?></font></center></td>
                                    <td width='5%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT kd_penyakit FROM diagnosa_pasien WHERE diagnosa_pasien.no_rawat = '{$baris["no_rawat"]}'"));echo $dr["kd_penyakit"];?></font></center></td>
                                    <td width='20%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT dokter.nm_dokter FROM dokter , kamar_inap , dpjp_ranap WHERE kamar_inap.no_rawat = dpjp_ranap.no_rawat AND dpjp_ranap.kd_dokter = dokter.kd_dokter AND kamar_inap.no_rawat = '{$baris["no_rawat"]}' Order By dokter.nm_dokter ASC"));echo $dr["nm_dokter"];?></font></center></td>
								</tr>
								<?php
								$no++;
                                }?>
						</table>

      		<!--PINDAH DARI-->

						<table width='50%' border='1' align='left' cellpadding='0' cellspacing='0' class='srts'>
							<caption><center><font color='000000' size='4' face='Arial'><strong>PASIEN PINDAHAN DARI RUANGAN LAIN</strong></font></center></caption>
							<tr>
								<td width='5%'><center><font color='000000' size='2' face='Arial'>No</font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'>No.RM</font></center></td>
								<td width='15%'><center><font color='000000' size='2' face='Arial'>Nama Pasien</font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'>L/P</font></center></td>
								<td width='10%'><center><font color='000000' size='2' face='Arial'>Cara Bayar</font></center></td>
								<td width='20%'><center><font color='000000' size='2' face='Arial'>Dokter yang<br>Merawat</font></center></td>
								<td width='20%'><center><font color='000000' size='2' face='Arial'>Pindahan Dari</font></center></td>
							</tr>
                          	<?php
                          	$_sql1 = "SELECT kamar_inap.no_rawat
                          			FROM kamar_inap , kamar , bangsal
                                    WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal
                                    AND kamar_inap.stts_pulang NOT IN ('Membaik','Pulang Paksa','Meninggal','APS','Sembuh','Status Belum Lengkap','Atas Permintaan Sendiri','-')
                                    AND bangsal.nm_bangsal LIKE '%$kamar%' AND
                                    kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2' AND kamar_inap.no_rawat > 2";
                          	$hasil=bukaquery($_sql1);
      					  	$no = 1;
                          	while($baris = mysqli_fetch_array($hasil)) { 	?>
							<tr>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $no;?></font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php $mr = mysqli_fetch_array(bukaquery("SELECT pasien.no_rkm_medis FROM reg_periksa , kamar_inap , pasien , kamar , bangsal WHERE kamar_inap.no_rawat = reg_periksa.no_rawat AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.no_rawat = '{$baris["no_rawat"]}'"));echo $mr["no_rkm_medis"];?></font></center></td>
								<td width='15%'><center><font color='000000' size='2' face='Arial'><?php $nm = mysqli_fetch_array(bukaquery("SELECT pasien.nm_pasien FROM reg_periksa , kamar_inap , pasien , kamar , bangsal WHERE kamar_inap.no_rawat = reg_periksa.no_rawat AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%'  AND kamar_inap.no_rawat = '{$baris["no_rawat"]}'"));echo $nm["nm_pasien"];?></font></center></td>
                                <td width='5%'><center><font color='000000' size='2' face='Arial'><?php $jk = mysqli_fetch_array(bukaquery("SELECT pasien.jk FROM reg_periksa , kamar_inap , pasien , kamar , bangsal WHERE kamar_inap.no_rawat = reg_periksa.no_rawat AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%'  AND kamar_inap.no_rawat = '{$baris["no_rawat"]}'"));echo $jk["jk"];?></font></center></td>
								<td width='10%'><center><font color='000000' size='2' face='Arial'><?php $pj = mysqli_fetch_array(bukaquery("SELECT penjab.png_jawab FROM reg_periksa , kamar_inap , penjab , kamar , bangsal WHERE kamar_inap.no_rawat = reg_periksa.no_rawat AND reg_periksa.kd_pj = penjab.kd_pj AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%'  AND kamar_inap.no_rawat = '{$baris["no_rawat"]}'"));echo $pj["png_jawab"];?></font></center></td>
								<td width='20%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT dokter.nm_dokter FROM dokter , kamar_inap , dpjp_ranap , kamar , bangsal WHERE kamar_inap.no_rawat = dpjp_ranap.no_rawat AND dpjp_ranap.kd_dokter = dokter.kd_dokter AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%'  AND kamar_inap.no_rawat = '{$baris["no_rawat"]}'"));echo $dr["nm_dokter"];?></font></center></td>
                              	<td width='20%'><center><font color='000000' size='2' face='Arial'><?php $ke1 = mysqli_fetch_array(bukaquery("SELECT bangsal.nm_bangsal FROM kamar_inap , bangsal , kamar WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%'  AND kamar_inap.no_rawat = '{$baris['no_rawat']}' AND kamar_inap.stts_pulang = 'Pindah Kamar'"));echo $ke1[0];?></font></center></td>
							</tr>
                          	<?php
                           	$no++;
						  	} ?>
						</table>

      		<!--PINDAH KE-->

						<table width='50%' border='1' align='right' cellpadding='0' cellspacing='0' class='srts'>
							<caption><center><font color='000000' size='4' face='Arial'><strong>PASIEN DIPINDAHKAN KE RUANGAN LAIN</strong></font></center></caption>
							<tr>
								<td width='5%'><center><font color='000000' size='2' face='Arial'>No</font></center></td>
                             	<td width='5%'><center><font color='000000' size='2' face='Arial'>No.RM</font></center></td>
                             	<td width='15%'><center><font color='000000' size='2' face='Arial'>Nama Pasien</font></center></td>
                             	<td width='5%'><center><font color='000000' size='2' face='Arial'>L/P</font></center></td>
                             	<td width='10%'><center><font color='000000' size='2' face='Arial'>Cara Bayar</font></center></td>
                             	<td width='10%'><center><font color='000000' size='2' face='Arial'>Tanggal Masuk</font></center></td>
                             	<td width='20%'><center><font color='000000' size='2' face='Arial'>Dokter yang<br>Merawat</font></center></td>
                             	<td width='10%'><center><font color='000000' size='2' face='Arial'>Pindah Ke</font></center></td>
							</tr>
                          	<?php
                          	$_sql = "SELECT reg_periksa.no_rkm_medis , kamar_inap.no_rawat , pasien.nm_pasien , pasien.umur , pasien.jk , kamar_inap.tgl_masuk , kamar_inap.stts_pulang , penjab.png_jawab , dokter.nm_dokter , kamar_inap.diagnosa_akhir
                          			FROM kamar_inap , kamar , bangsal , reg_periksa , pasien , penjab , dokter
                                    WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal
                                    AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND reg_periksa.kd_pj = penjab.kd_pj AND dokter.kd_dokter = reg_periksa.kd_dokter
									AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2' AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang = 'Pindah Kamar'";
                          	$hasil=bukaquery($_sql);
      					  	$no = 1;
                          	while($baris = mysqli_fetch_array($hasil)) { 		?>
							<tr>
                            	<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $no;?></font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["no_rkm_medis"];?></font></center></td>
								<td width='15%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["nm_pasien"];?></font></center></td>
                                <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["jk"];?></font></center></td>
								<td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["png_jawab"];?></font></center></td>
                                <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["tgl_masuk"];?></font></center></td>
								<td width='20%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT dokter.nm_dokter FROM dokter , kamar_inap , dpjp_ranap WHERE kamar_inap.no_rawat = dpjp_ranap.no_rawat AND dpjp_ranap.kd_dokter = dokter.kd_dokter AND kamar_inap.no_rawat = '{$baris["no_rawat"]}' Order By dokter.nm_dokter ASC"));echo $dr["nm_dokter"];?></font></center></td>
                                <td width='20%'><center><font color='000000' size='2' face='Arial'><?php $ke = mysqli_fetch_array(bukaquery("SELECT bangsal.nm_bangsal FROM kamar_inap , bangsal , kamar WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND kamar_inap.no_rawat = '{$baris['no_rawat']}' AND kamar_inap.stts_pulang IN ('APS','Membaik','Meninggal','Rujuk','-','Pulang Paksa')"));echo $ke[0];?></font></center></td>
							</tr>
                          	<?php
							$no++;
							} ?>
						</table>

      		<!--MENINGGAL-->

						<table width='100%' border='1' cellpadding='0' cellspacing='0' class='srts'>
                        	<caption><center><font color='000000' size='4' face='Arial'><strong>PASIEN MENINGGAL</strong></font></center></caption>
							<tr>
                            	<td width='5%' rowspan='2'><center><font color='000000' size='2' face='Arial'>No</font></center></td>
                            	<td width='5%' rowspan='2'><center><font color='000000' size='2' face='Arial'>No.RM</font></center></td>
                            	<td width='10%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Nama Pasien</font></center></td>
                            	<td width='10%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Umur</font></center></td>
                            	<td width='5%' rowspan='2'><center><font color='000000' size='2' face='Arial'>L/P</font></center></td>
                            	<td width='10%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Tanggal Masuk</font></center></td>
                            	<td width='10%' colspan='2'><center><font color='000000' size='2' face='Arial'>Meninggal</font></center></td>
                            	<td width='5%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Cara Bayar</font></center></td>
                            	<td width='10%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Penyebab Kematian</font></center></td>
                            	<td width='10%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Kode ICD X</font></center></td>
                            	<td width='20%' rowspan='2'><center><font color='000000' size='2' face='Arial'>Dokter yang Merawat</font></center></td>
							</tr>
                          	<tr>
                          		<td width='10%'><center><font color='000000' size='2' face='Arial'> Krg 48 Jam</font></center></td>
                            	<td width='10%'><center><font color='000000' size='2' face='Arial'> Lbh 48 Jam</font></center></td>
                           	</tr>
                          	<?php
                          	$_sql = "SELECT reg_periksa.no_rkm_medis , kamar_inap.no_rawat , pasien.nm_pasien , pasien.umur , pasien.jk , kamar_inap.tgl_masuk , kamar_inap.stts_pulang , penjab.png_jawab , dokter.nm_dokter , kamar_inap.diagnosa_akhir
                          			FROM kamar_inap , kamar , bangsal , reg_periksa , pasien , penjab , dokter
                                    WHERE reg_periksa.no_rawat = kamar_inap.no_rawat AND kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal
                                    AND reg_periksa.no_rkm_medis = pasien.no_rkm_medis AND reg_periksa.kd_pj = penjab.kd_pj AND dokter.kd_dokter = reg_periksa.kd_dokter
									AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2' AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang = 'Meninggal'";
                          	$hasil=bukaquery($_sql);
     					  	$no = 1;
                          	while($baris = mysqli_fetch_array($hasil)) {
                          	 $ya="&nbsp;";
							 $tdk="&nbsp;";
                          		if(getOne("select kamar_inap.lama from kamar_inap where no_rawat='".$baris["no_rawat"]."'")>2){
								  $ya="Ya";
							  	}else{
								  $tdk="Tdk";
							  	}?>
							<tr>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $no;?></font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["no_rkm_medis"];?></font></center></td>
								<td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["nm_pasien"];?></font></center></td>
                                <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["umur"];?></font></center></td>
                                <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["jk"];?></font></center></td>
                                <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["tgl_masuk"];?></font></center></td>
								<td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $tdk;?></font></center></td>
                                <td width='5%'><center><font color='000000' size='2' face='Arial'><?php echo $ya;?></font></center></td>
								<td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["png_jawab"];?></font></center></td>
                                <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["diagnosa_akhir"];?></font></center></td>
                                <td width='10%'><center><font color='000000' size='2' face='Arial'><?php echo $baris["kd_penyakit"];?></font></center></td>
                                <td width='20%'><center><font color='000000' size='2' face='Arial'><?php $dr = mysqli_fetch_array(bukaquery("SELECT dokter.nm_dokter FROM dokter , kamar_inap , dpjp_ranap WHERE kamar_inap.no_rawat = dpjp_ranap.no_rawat AND dpjp_ranap.kd_dokter = dokter.kd_dokter AND kamar_inap.no_rawat = '{$baris["no_rawat"]}' Order By dokter.nm_dokter ASC"));echo $dr["nm_dokter"];?></font></center></td>
							</tr>
                         	<?php
                         	$no++;
						  	} ?>
						</table>
      		<!--END-->
      <?php $kls1ada = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar , kamar_inap , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.kelas = 'Kelas 1' AND kamar_inap.stts_pulang = '-'"));
      		$kls2ada = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar , kamar_inap , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.kelas = 'Kelas 2' AND kamar_inap.stts_pulang = '-'"));
      		$kls3ada = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar , kamar_inap , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.kelas = 'Kelas 3' AND kamar_inap.stts_pulang = '-'"));?>
   <table width='100%'>
     <tr>
       <td valign='top'  width='25%'>
    <table>Tempat Kosong&nbsp;:
	  <tr>
      	<td>Kelas I</td><td>:</td><td><?php $kls1 = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar.status) FROM kamar , bangsal WHERE kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.status = 'Kosong' AND kamar.statusdata = '1' AND kamar.kelas = 'Kelas 1'"));echo $kls1[0];?></td>
      </tr>
      <tr>
      	<td>Kelas II</td><td>:</td><td><?php $kls2 = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar.status) FROM kamar , bangsal WHERE kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.status = 'Kosong' AND kamar.statusdata = '1' AND kamar.kelas = 'Kelas 2'"));echo $kls2[0];?></td>
      </tr>
       <tr>
      	<td>Kelas III</td><td>:</td><td><?php $kls3 = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar.status) FROM kamar , bangsal WHERE kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar.status = 'Kosong' AND kamar.statusdata = '1' AND kamar.kelas = 'Kelas 3'"));echo $kls3[0];?></td>
      </tr>
      <tr>
        <td>Jumlah</td><td>:</td><td><?php $jml = $kls1[0] + $kls2[0] + $kls3[0]; echo $jml;?></td>
      </tr>
    </table>
   	   </td>
       <td  width='30%'>
	<table>Iktisar 24 Jam
      <tr>
        <td>A.</td><td>Sisa Pasien Kemarin</td><td>:</td><td>&nbsp;&nbsp;<?php $smlm = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.tgl_masuk Between '$tanggal1' AND '$tanggal2' AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$month'"));$out = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2'"));$hsl = $smlm[0] - $out[0];$sen = $hsl + $hsl;echo $sen;?></td>
      </tr>
      <tr>
      	<td></td><td>Pasien Masuk</td><td>:</td><td>&nbsp;&nbsp;<?php $msk = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.tgl_masuk BETWEEN '$tanggal1' AND '$tanggal2'"));echo $msk[0];?></td>
      </tr>
       <tr>
      	<td></td><td>Pasien Pindahan</td><td>:</td><td>&nbsp;&nbsp;<?php $msk1 = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND kamar_inap.stts_pulang = 'Pindah Kamar' AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.tgl_masuk BETWEEN '$tanggal1' AND '$tanggal2'"));echo $msk1[0];?></td><td>=</td><td><?php $jml1 = $ss + $msk[0] + $msk1[0];echo $jml1;?></td><td>Org</td>
      </tr>
      <tr></tr>
      <tr>
        <td>B.</td><td>Keluar/Pulang/Rujuk</td><td>:</td><td>&nbsp;&nbsp;<?php $klr = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang NOT IN ('Pindah Kamar','Meninggal') AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2'"));echo $klr[0];?></td>
      </tr>
      <tr>
      	<td></td><td>Meninggal</td><td>:</td><td>&nbsp;&nbsp;<?php $mt = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang = 'Meninggal' AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2'"));echo $mt[0];?></td>
      </tr>
       <tr>
      	<td></td><td>Dipindahkan</td><td>:</td><td>&nbsp;&nbsp;<?php $pdh = mysqli_fetch_array(bukaquery("SELECT COUNT(kamar_inap.no_rawat) FROM kamar_inap , kamar , bangsal WHERE kamar_inap.kd_kamar = kamar.kd_kamar AND kamar.kd_bangsal = bangsal.kd_bangsal AND bangsal.nm_bangsal LIKE '%$kamar%' AND kamar_inap.stts_pulang = 'Pindah Kamar' AND kamar_inap.tgl_keluar BETWEEN '$tanggal1' AND '$tanggal2'"));echo $pdh[0];?></td><td>=</td><td><?php $jml2 = $klr[0] + $mt[0] + $pdh[0];echo $jml2;?></td><td>Org</td>
      </tr>
      <tr>
        <td>C.</td><td>Pasien yang masih dirawat</td><td>:</td><td></td><td></td><td><?php $ttl = $sen + $jml1 - $jml2;echo $ttl;?></td>
      </tr>
    </table>
       </td>
       <td valign='bottom' width='35%'>
    <table>
	  <tr>
        <td>- &nbsp;Kelas I</td><td>:&nbsp;</td><td><?php echo $kls1ada[0];?></td><td>&nbsp;Orang</td>
      </tr>
      <tr>
      	<td>- &nbsp;Kelas II</td><td>:&nbsp;</td><td><?php echo $kls2ada[0];?></td><td>&nbsp;Orang</td>
      </tr>
       <tr>
      	<td>- &nbsp;Kelas III</td><td>:&nbsp;</td><td><?php echo $kls3ada[0];?></td><td>&nbsp;Orang</td>
      </tr>
    </table>
   	   </td>
     </tr>
   </table>
      <table width='100%'>
        <tr>
          <td width='80%'>
            <table>
              <tr>
                <td>Keterangan &nbsp; :</td>
              </tr>
              <tr>
                <td>&nbsp; - &nbsp; Sensus ini berlaku mulai jam 00.00 s/d jam 24.00 setiap hari</td>
              </tr>
              <tr>
                <td>&nbsp; - &nbsp; Diisi oleh perawat bangsal jam 24.00 dan diserahkan ke Bagian RM</td>
              </tr>
              <tr>
                <td>&nbsp; - &nbsp; Cara Pembayaran mohon diisi (Umum/Askes/KS/Gratis/Dispensasi/Lain..)</td>
              </tr>
            </table>
            </td>
            <td>
            <table>
              <tr>
                <td>Yang Membuat Laporan</td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td>(</td><td></td><td>)</td>
              </tr>
              <tr>
                <td>NIP.</td><td></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
	</body>
</html>
                            </h2>
                        </div>
                        <div class="body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once('layout/footer.php');
?>
