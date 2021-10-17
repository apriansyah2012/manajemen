<?php

$title = 'Dashboard';
include_once('config.php');
include_once('layout/header.php');
include_once('layout/sidebar.php');

?>
<?php
            if(isset($_GET['tahun'])) { $tahun = $_GET['tahun']; } else { $tahun = date("Y"); };
              if(isset($_GET['bulan'])) { $bulan = $_GET['bulan']; } else { $bulan = date("m"); };
        ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <p class="col-orange font-24 font-uppercase"><?php echo $title; ?></p>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">enhanced_encryption</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL PASIEN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM pasien"));?>" data-speed="5000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-Green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>

                        <div class="content">
                            <div class="text">PASIEN IGD REG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD DIRAWAT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Dirawat' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD BATAL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Batal' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD BELUM PERIKSA</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Belum' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>


               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD DIRUJUK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND stts='Dirujuk' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">IGD PULANG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND kd_poli='IGDK' AND status_bayar='Sudah Bayar' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN BATAL</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND stts ='Batal'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN BPJS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj ='A52'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN TUNAI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj ='A00'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN ASURANSI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj IN ('-',
'A5',
'104',
'A05',
'A06',
'A07',
'A08',
'A09',
'A10',
'A11',
'A12',
'A13',
'A14',
'A15',
'A16',
'A17',
'A18',
'A19',
'A20',
'C02',
'A69',
'A21',
'A22',
'A23',
'A25',
'A72',
'A26',
'A27',
'A28',
'A29',
'A30',
'A31',
'A32',
'A33',
'A34',
'A35',
'A36',
'A37',
'INH',
'A73',
'101',
'A38',
'A39',
'A40',
'A41',
'A42',
'A43',
'A71',
'A44',
'C01',
'A45',
'A46',
'A47',
'A48',
'A49',
'A50',
'A51',
'A53',
'A54',
'A56',
'100',
'A70',
'A59',
'A60',
'A61',
'A62',
'A63',
'A01',
'A04',
'MAN',
'A64',
'A03',
'A02',
'A65')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN PT </div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ralan' AND kd_pj IN ('B01',
'B02',
'B71',
'B03',
'B04',
'B05',
'B06',
'103',
'B07',
'B08',
'B09',
'B10',
'B11',
'B12',
'B13',
'B14',
'B17',
'B18',
'B19',
'B20',
'B21',
'B22',
'DEA',
'B23',
'B24',
'B25',
'B26',
'B27',
'B28',
'B29',
'B30',
'B31',
'B32',
'B33',
'B34',
'005',
'B42',
'C04',
'A85',
'C03',
'B35',
'B36',
'B38',
'B39',
'B40',
'B41',
'B43',
'INT',
'001',
'B44',
'B45',
'B46',
'B47',
'PTK',
'A58',
'B48',
'B49',
'B50',
'B51',
'B52',
'105',
'B53',
'MDI',
'B56',
'B57',
'B58',
'B60',
'B61',
'B62',
'B63',
'B64',
'B65',
'007',
'102',
'B66',
'B67',
'B68',
'B69',
'B97',
'B72',
'B73',
'B74',
'B77',
'B78',
'B79',
'B80',
'B81',
'B82',
'B83',
'B84',
'B85',
'B86',
'B87',
'B88',
'A90',
'B89',
'B90',
'B91',
'B92',
'B93',
'B94',
'B95',
'B96',
'A66',
'RSD',
'B99')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-Green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>

                        <div class="content">
                            <div class="text">RANAP MASUK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT tgl_masuk FROM kamar_inap WHERE tgl_masuk LIKE '%$date%' and stts_pulang='-' "));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
<div class="content">
                            <div class="text">RAWAT INAP PULANG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT tgl_keluar FROM kamar_inap WHERE tgl_keluar LIKE '%$date%'   "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP BPJS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ranap' AND kd_pj ='A52'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP TUNAI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ranap' AND kd_pj ='A00'"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP ASURANSI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' AND status_lanjut = 'Ranap' AND  kd_pj IN ('-',
'A5',
'104',
'A05',
'A06',
'A07',
'A08',
'A09',
'A10',
'A11',
'A12',
'A13',
'A14',
'A15',
'A16',
'A17',
'A18',
'A19',
'A20',
'C02',
'A69',
'A21',
'A22',
'A23',
'A25',
'A72',
'A26',
'A27',
'A28',
'A29',
'A30',
'A31',
'A32',
'A33',
'A34',
'A35',
'A36',
'A37',
'INH',
'A73',
'101',
'A38',
'A39',
'A40',
'A41',
'A42',
'A43',
'A71',
'A44',
'C01',
'A45',
'A46',
'A47',
'A48',
'A49',
'A50',
'A51',
'A53',
'A54',
'A56',
'100',
'A70',
'A59',
'A60',
'A61',
'A62',
'A63',
'A01',
'A04',
'MAN',
'A64',
'A03',
'A02',
'A65')"));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red  hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">airline_seat_recline_normal</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT JALAN</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rkm_medis FROM reg_periksa WHERE tgl_registrasi LIKE '%$date%' "));?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">local_hotel</i>
                        </div>
                        <div class="content">
                            <div class="text">RAWAT INAP</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT stts_pulang FROM kamar_inap WHERE stts_pulang = '-' "));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">PASIEN BULAN INI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo num_rows(query("SELECT no_rawat FROM reg_periksa WHERE tgl_registrasi LIKE '%$month%'"));?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->

            <!-- Bar chartjs -->
            <div class="card">
                <div class="header">
                    <h2>GRAFIK KUNJUNGAN Per TAHUN </h2>
                </div>
                <div class="body">
                    <canvas id="bar_chart" height="150"></canvas>
                </div>
            </div>
			
            <!-- #End# Bar chartjs -->
            <!-- Bar chartjs -->
            <div class="card">
                <div class="header">
                    <h2>POLIKLINIK HARI INI</h2>
                </div>
                <div class="body">
                    <canvas id="line_chart" height="150"></canvas>
                </div>
            </div>
            <!-- #End# Bar chartjs -->
            <!-- Summary -->
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                                 data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                                 data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                                 data-fill-Color="rgba(0, 188, 212, 0)">
                                 <?php
                                     $sql_grafik_ranap = query("SELECT count(*) AS jumlah
                                         FROM reg_periksa
                                         WHERE MONTH(tgl_registrasi)
                                         AND status_lanjut = 'Ranap'
                                         
                                         AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '2019'
                                         GROUP BY EXTRACT(MONTH FROM tgl_registrasi)");
                                     while ($data = fetch_array ($sql_grafik_ranap)){
                                         echo $data['jumlah'].', ';
                                     }
                                 ?>
                            </div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    PASIEN RANAP TAHUN INI
                                    <?php
                                    $ranap_th_ini = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    
                                    AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $last_year"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $ranap_th_ini['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    PASIEN RANAP BULAN INI
                                    <?php
                                    $ranap_bln_ini = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    
                                    AND MONTH(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $curr_month
                                    AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = $year"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $ranap_bln_ini['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">KELAS KAMAR PASIEN RANAP</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    KAMAR KELAS 1
                                    <?php
                                    $kmr_kls_1 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 1'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_1['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR KELAS 2
                                    <?php
                                    $kmr_kls_2 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 2'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_2['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR KELAS 3
                                    <?php
                                    $kmr_kls_3 = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas 3'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_3['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR VIP
                                    <?php
                                    $kmr_kls_vip = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas VIP'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_vip['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    KAMAR VVIP
                                    <?php
                                    $kmr_kls_vvip = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE kelas = 'Kelas VVIP'
                                    AND statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $kmr_kls_vvip['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">SUMMARY ADMISSION</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    PASIEN IGD
                                    <?php
                                    $pasien_igd = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE kd_poli = 'IGDK'
                                    AND tgl_registrasi = '{$date}'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $pasien_igd['jumlah']; ?></b> <small>Orang</small></span>
                                </li>
                                <li>
                                    PASIEN RANAP
                                    <?php
                                    $pasien_ranap = fetch_assoc(query("SELECT count(*) AS jumlah
                                    FROM reg_periksa
                                    WHERE status_lanjut = 'Ranap'
                                    AND kd_poli != 'U0027'
                                    AND status_bayar = 'Belum Bayar'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $pasien_ranap['jumlah']; ?></b> <small>ORANG</small></span>
                                </li>
                                <li>
                                    BED TERISI
                                    <?php
                                    $bed_terisi = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE statusdata='1'
                                    AND status='ISI'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $bed_terisi['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                                <li>
                                    BED KOSONG
                                    <?php
                                    $bed_kosong = fetch_assoc(query("SELECT COUNT(*) AS jumlah
                                    FROM kamar
                                    WHERE statusdata='1'
                                    AND status='KOSONG'"));
                                    ?>
                                    <span class="pull-right"><b><?php echo $bed_kosong['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                                <li>
                                    TOTAL KAPASITAS BED
                                    <span class="pull-right"><b><?php echo $bed_terisi['jumlah']+$bed_kosong['jumlah']; ?></b> <small>TEMPAT TIDUR</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>
            <!-- #End# Summary -->
            <?php
            if (isset($_SESSION['jenis_poli']) && $_SESSION['jenis_poli'] !=="" && $_SESSION['role'] !=="Paramedis_Ranap") {
            ?>
            <?php
            // Get jenis poli
            $jenispoli=isset($_SESSION['jenis_poli'])?$_SESSION['jenis_poli']:NULL;
            $query_poli = query("SELECT * from poliklinik WHERE kd_poli = '".$jenispoli."'");
            $data_poli = fetch_array($query_poli);
            if ($jenispoli == $data_poli['0']) {
                $nmpoli = $data_poli['1'];
            }
            ?>
            <div class="row clearfix">
                <!-- Pasien Paling Aktif -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Pasien <?php echo ucwords(strtolower($nmpoli)); ?> Paling Aktif</h2>
                        </div>
                        <div class="body">
                            <table id="antrian_pasien" class="table table-bordered table-striped table-hover display nowrap dashboard-task-infos" width="100%">
	                             <thead>
		                               <tr>
		                                   <th>No</th>
		                                   <th>Nama Lengkap</th>
		                                   <th>Kunj</th>
		                               </tr>
	                             </thead>
	                             <tbody>
	                             <?php
		                           $sql = query("SELECT no_rkm_medis, count(no_rkm_medis) jumlah FROM reg_periksa WHERE kd_dokter = '{$_SESSION['username']}' GROUP BY no_rkm_medis ORDER BY jumlah DESC LIMIT 10");
		                           $no=1;
		                           while($row = fetch_array($sql)){
		                               $getNama = fetch_assoc(query("SELECT nm_pasien FROM pasien WHERE no_rkm_medis = '{$row['no_rkm_medis']}'"));
		                               echo '<tr>';
		                               echo '<td>'.$no.'</td>';
		                               echo '<td>'.ucwords(strtolower($getNama['nm_pasien'])).'</td>';
		                               echo '<td>'.$row['jumlah'].'</td>';
		                               echo '</tr>';
		                               $no++;
	                             }
	                             ?>
	                             </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Pasien Paling Aktif -->
                <!-- Antrian Pasien -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>Antrian 10 Pasien Terakhir <?php echo ucwords(strtolower($nmpoli)); ?></h2>
                        </div>
                        <div class="body">
                            <table id="antrian_pasien" class="table table-bordered table-striped table-hover display nowrap dashboard-task-infos" width="100%">
                               <thead>
                                  <tr>
        		                          <th>No</th>
                                      <th>Nama Lengkap</th>
                                      <th>Status</th>
                                  </tr>
                               </thead>
                               <tbody>
                               <?php
                               $sql = query("SELECT a.no_rawat, b.no_rkm_medis, b.nm_pasien, a.stts FROM reg_periksa a, pasien b WHERE a.kd_poli = '{$_SESSION['jenis_poli']}' AND a.no_rkm_medis = b.no_rkm_medis AND a.tgl_registrasi = '$date' ORDER BY a.jam_reg ASC LIMIT 10");
		                           $no=1;
                               while($row = fetch_array($sql)){
                                  echo '<tr>';
        		                      echo '<td>'.$no.'</td>';
                                  echo '<td>';
                                  echo '<a href="pasien-ralan.php?action=view&no_rawat='.$row['0'].'" class="title">'.ucwords(strtolower($row['2'])).'</a>';
                                  echo '</td>';
                                  echo '<td>'.$row['3'].'</td>';
                                  echo '</tr>';
		                              $no++;
                               }
                               ?>
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- #END# Antrian Pasien -->
            </div>
          <?php } ?>
        </div>
    </section>

<?php
include_once('layout/footer.php');

?>

   
    <script>
          $(function () {
              new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
              new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
              initSparkline();
          });
          function getChartJs(type) {
              var config = null;
              if (type === 'bar') {
                  config = {
                      type: 'bar',
                      data: {
                          //labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "Sepetember", "Oktober", "November", "Desember"],
                          labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                          datasets: [{
                              label: "Tahun <?php echo $last_year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$last_year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba(0, 188, 212, 0.8)'
                          }, {
                              label: "Tahun <?php echo $year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE MONTH(tgl_registrasi)
                                        AND YEAR(STR_TO_DATE(tgl_registrasi,'%Y-%m-%d')) = '$year'
                                        GROUP BY EXTRACT(MONTH FROM tgl_registrasi)";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba(233, 30, 99, 0.8)'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
              if (type === 'line') {
                  config = {
                      type: 'bar',
                      data: {
                          labels: [
                            <?php
                                $sql_poli = "SELECT a.nm_poli AS nm_poli FROM poliklinik a, reg_periksa b WHERE a.kd_poli = b.kd_poli AND b.tgl_registrasi = '{$date}' GROUP BY b.kd_poli";
                                $hasil_poli = query($sql_poli);
                                    while ($data = fetch_array ($hasil_poli)){
                                        $get_poli = '"'.$data['nm_poli'].'", ';
                                        echo $get_poli;
                                    }
                            ?>
                          ],
                          datasets: [{
                              label: "Tahun <?php echo $year; ?>",
                              data: [
                                <?php
                                    $sql = "SELECT count(*) AS jumlah
                                        FROM reg_periksa
                                        WHERE tgl_registrasi = '{$date}'
                                        GROUP BY kd_poli";
                                    $hasil=query($sql);
                                    while ($data = fetch_array ($hasil)){
                                        $jumlah = $data['jumlah'].', ';
                                        echo $jumlah;
                                    }
                                ?>
                              ],
                              backgroundColor: 'rgba(9, 31, 146, 1)'
                              }]
                      },
                      options: {
                          responsive: true,
                          maintainAspectRatio: false,
                          legend: false
                      }
                  }
              }
              return config;
          }
          function initSparkline() {
              $(".sparkline").each(function () {
                  var $this = $(this);
                  $this.sparkline('html', $this.data());
              });
          }
    </script>
