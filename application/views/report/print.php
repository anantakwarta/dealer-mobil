<html>
<head>
  <title>Cetak Laporan PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
  <b><?= $ket; ?></b><br /><br />

    <table border="1" cellpadding="8" width="100%" cellspacing="0">
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
        foreach ($report as $t) : 
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
<br><br>
    <table border="1" cellpadding="8" width="100%" cellspacing="0">
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
        foreach ($report2 as $js) : 
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
<br><br>
    <table border="1" cellpadding="8" width="100%" cellspacing="0">
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
  
</body>
</html>