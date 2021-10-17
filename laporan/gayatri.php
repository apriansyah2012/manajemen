<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'DATA KUNJUNGAN PASIEN  RAWAT JALAN PER DOKTER';
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
                                DATA KUNJUNGAN PASIEN  GAYATRI RAWAT JALAN PER DOKTER
                                <small><?php if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) { echo "Periode ".date("d-m-Y",strtotime($_POST['tgl_awal']))." s/d ".date("d-m-Y",strtotime($_POST['tgl_akhir'])); } ?></small>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Klinik</th>
                                        <th>Dokter</th>
										<th>Usia</th>
                                        <th>Baru</th>
                                        <th>Lama</th>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>RJ</th>
                                        <th>RI</th>
                                        <th>Umum</th>
                                        <th>PT</th>
                                        <th>Asuransi</th>
                                        <th>BPJS</th>
                                        <th>KAR-SEH</th>
                                        <th>Gratis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "select a.kd_poli, b.nm_poli,a.kd_dokter,sum(a.umurdaftar>=54) as umur,c.nm_dokter, sum(a.stts_daftar ='Lama') as lama, sum(a.status_poli ='Baru') as baru, sum(a.kd_pj='A00') as umum, sum(a.kd_pj IN ('B01',
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
'B99')) as pj, sum(a.kd_pj IN ('-',
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
'A65'

)) as asuransi,sum(a.kd_pj ='A52') as bpjs,sum(a.kd_pj ='A55') as karseh,sum(a.status_lanjut ='Ralan') as rj,sum(a.status_lanjut ='Ranap') as ri, a.no_rkm_medis, sum(d.jk ='L') as Laki,sum(d.jk ='P') as Perempuan from reg_periksa a join poliklinik b join dokter c join pasien d where a.kd_poli=b.kd_poli and a.kd_dokter=c.kd_dokter and a.kd_poli IN ('U0001','U0002','U0003','U0004','U0005','U0006','U0007','U0008','U0009','U0011','U0012','U0013','U0018','U0019','U0020','U0024','U0026')and a.no_rkm_medis =d.no_rkm_medis ";
                                if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])) {
                                  $sql .= " AND a.tgl_registrasi BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]'";
                                } else {
                                    $sql .= " AND a.tgl_registrasi = '$date'";
                                }
                                $sql .= " GROUP BY c.kd_dokter";
                                $query = query($sql);
                                $no = 1;
                                while($row = fetch_array($query)) {
                                ?>
                                    <tr>
                                        
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['nm_dokter']; ?></td>
										<td><?php echo $row['umur']; ?></td>
                                        <td><?php echo $row['baru']; ?></td>
                                        <td><?php echo $row['lama']; ?></td>
                                        <td><?php echo $row['Laki']; ?></td>
                                        <td><?php echo $row['Perempuan']; ?></td>
                                        <td><?php echo $row['rj']; ?></td>
                                        <td><?php echo $row['ri']; ?></td>
                                        <td><?php echo $row['umum']; ?></td>
                                        <td><?php echo $row['pj']; ?></td>
                                        <td><?php echo $row['asuransi']; ?></td>
                                        <td><?php echo $row['bpjs']; ?></td>
                                        <td><?php echo $row['karseh']; ?></td>
                                        <td><?php echo '0'; ?></td>
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
