<?php
/***
* SIMRS Khanza Lite from version 0.1 Beta
* About : Porting of SIMRS Khanza by Windiarto a.k.a Mas Elkhanza as web and mobile app.
* Last modified: 02 Pebruari 2018
* Author : drg. Faisol Basoro
* Email : drg.faisol@basoro.org
* Licence under GPL
***/

$title = 'Data Obat';
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
                                DATA OBAT
                            </h2>
                        </div>
                        <div class="body">
                            <div id="buttons" class="align-center m-l-10 m-b-15 export-hidden"></div>
                            <table id="datatable" class="table table-bordered table-striped table-hover display nowrap js-exportable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama Obat</th>
                                        <th>Kode Obat</th>
                                        <th>Stok Akhir</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = query("SELECT a.nama_brng, b.kode_brng, b.real, MAX(b.tanggal) AS tgl_update FROM databarang a, opname b WHERE a.kode_brng = b.kode_brng AND b.kd_bangsal = 'B0002' GROUP BY b.kode_brng ORDER BY b.tanggal ASC");
                                $no = 1;
                                while($row = fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['0']; ?></td>
                                        <td><?php echo $row['1']; ?></td>
                                        <td><?php echo $row['2']; ?></td>
                                        <td><?php echo $row['3']; ?></td>
                                    </tr>
                                <?php
                                $no++;
                                }
                                ?>
                                </tbody>
                            </table>
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

