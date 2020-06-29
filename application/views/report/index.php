<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    	<h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    	<a href="<?= $url_cetak; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print Laporan</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    	<div class="card-header py-3">
    		<div class="col-sm-3"><h6 class="m-0 font-weight-bold text-gray-800"><?= $ket; ?></h6></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Konsumen</th>
                            <th>Pegawai</th>
                            <th>Mobil</th>
                            <th>Tanggal</th>
                            <th>Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$total1 = 0;
                        foreach ($transaksi as $t) : 
                        	$number = $t['harga'];
							$number = number_format($number, 2, ',', '.');
                        	$total1 += $t['harga'];
                        ?>
                            <tr>
                                <td><?= $t['idTransaksi']; ?></td>
                                <td><?= $t['namaKons']; ?></td>
                                <td><?= $t['namaPegawai']; ?></td>
                                <td><?= $t['namaMerk'].' '.$t['model']; ?></td>
                                <td><?= $t['tanggal']; ?></td>
                                <td align="right"><?= $number; ?></td>
                            </tr>	
                        <?php endforeach;
							$num1 = number_format($total1, 2, ',', '.');
                        ?>
                    <tfoot>
                        <tr>
                        	<th colspan="5">Total Pendapatan Penjualan</th>
                        	<th style="text-align: right;"><?= $num1; ?></th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transaksi</th>
                            <th>Mobil</th>
                            <th>Tanggal Terima</th>
                            <th>Tanggal Kembali</th>
                            <th>Servis</th>
                            <th>Part</th>
                            <th>Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$total2 = 0;
                        foreach ($jasaservis as $js) : 
                        	$number = $js['hargaTotal'];
							$number = number_format($number, 2, ',', '.');
                        	$total2 += $js['hargaTotal'];
                        ?>
                            <tr>
                                <td><?= $js['idJasaServis']; ?></td>
                                <td><?= $js['idTransaksi'].' ('.$js['tanggal'].')'; ?></td>
                                <td><?= $js['namaMerk'].' '.$js['model']; ?></td>
                                <td><?= $js['tanggalDiterima']; ?></td>
                                <td><?= $js['tanggalDikembalikan']; ?></td>
                                <td><?= $js['namaPart']; ?></td>
                                <td><?= $js['namaServis']; ?></td>
                                <td align="right"><?= $number; ?></td>
                            </tr>	
                        <?php endforeach;
							$num2 = number_format($total2, 2, ',', '.');
                        ?>
                    <tfoot>
                        <tr>
                        	<th colspan="7">Total Pendapatan Servis</th>
                        	<th style="text-align: right;"><?= $num2; ?></th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Transaksi</th>
                            <th>Pendapatan Per Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pendapatan Penjualan</td>
                            <td align="right"><?= $num1; ?></td>
                        </tr>
                        <tr>
                            <td>Pendapatan Servis</td>
                            <td align="right"><?= $num2; ?></td>
                        </tr>
                    <tfoot>
                        <tr>
                        	<th>Total Pendapatan</th>
                        	<th style="text-align: right;"><?= number_format($total1+$total2, 2, ',', '.'); ?></th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->