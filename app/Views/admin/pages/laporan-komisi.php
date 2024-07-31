<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Agent dan Komisi</title>
    <style>
        /* table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        } */

        table.blueTable {
          border: 1px solid #1C6EA4;
          background-color: #EEEEEE;
          width: 100%;
          text-align: left;
          border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
          border: 1px solid #AAAAAA;
          padding: 3px 2px;
        }
        table.blueTable tbody td {
          font-size: 13px;
        }
        table.blueTable tr:nth-child(even) {
          background: #D0E4F5;
        }
        table.blueTable thead {
          background: #1C6EA4;
          background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
          background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
          background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
          border-bottom: 2px solid #444444;
        }
        table.blueTable thead th {
          font-size: 15px;
          font-weight: bold;
          color: #FFFFFF;
          border-left: 2px solid #D0E4F5;
        }
        table.blueTable thead th:first-child {
          border-left: none;
        }

        table.blueTable tfoot {
          font-size: 14px;
          font-weight: bold;
          color: #FFFFFF;
          background: #D0E4F5;
          background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
          background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
          background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
          border-top: 2px solid #444444;
        }
        table.blueTable tfoot td {
          font-size: 14px;
        }
        table.blueTable tfoot .links {
          text-align: right;
        }
        table.blueTable tfoot .links a{
          display: inline-block;
          background: #1C6EA4;
          color: #FFFFFF;
          padding: 2px 8px;
          border-radius: 5px;
        }
    </style>
</head>
<body>
  <?php if(!empty($agent)) :?>
    <?php foreach ($agent as $agen) :?>
      <table>
        <tbody>
            <!-- <tr>
              <td colspan=2><center><b>Data Agent</b></center></td>
            </tr> -->
            <tr>
              <td style="width: 100px">Nama Agent</td>
              <td style="width: 300px">: <?= $agen['agent']['nama_agent']?></td>
              <td style="width: 100px">Nama Bank</td>
              <td style="width: 300px">: <?= $agen['agent']['bank_rekening']?></td>
            </tr>
            <tr>
              <td>No. WA</td>
              <td>: <?= $agen['agent']['no_wa']?></td>
              <td>No. Rekening</td>
              <td>: <?= $agen['agent']['no_rekening']?></td>
            </tr>
            <tr>
              <td>Tipe Agent</td>
              <td>: <?= $agen['agent']['tipe_agent']?></td>
              <td>Total Komisi</td>
              <td>: <?= intToRupiah($agen['total_komisi'])?></td>
            </tr>
            <tr>
                <td>Leader Agent</td>
                <td>: <?= $agen['agent']['leader_agent']?></td>
            </tr>
        </tbody>
      </table>


      <table class="blueTable" style='margin-bottom: 20px'>
      <thead>
        <tr>
          <th style="color: black">No</th>
          <th style="color: black">Nama Customer</th>
          <th style="color: black">Nama Produk</th>
          <th style="color: black">Harga Produk</th>
          <th style="color: black">Komisi</th>
          <th style="color: black">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $no = 1;
          foreach ($agen['komisi_produk'] as $komisi) :?>
          <tr>
            <td><center><?= $no?></center></td>
            <td><?= $komisi['nama_customer']?></td>
            <td><?= $komisi['nama_produk']?></td>
            <td><?= intToRupiah($komisi['harga_produk'])?></td>
            <td><?= intToRupiah($komisi['nominal'])?></td>
            <td><?= $komisi['keterangan']?></td>
          </tr>
        <?php 
          $no++;
          endforeach;?>
          <?php 
            foreach ($agen['komisi_produk_travel'] as $komisi) :?>
            <tr>
              <td><center><?= $no?></center></td>
              <td><?= $komisi['nama_customer']?></td>
              <td><?= $komisi['nama_produk']?></td>
              <td><?= intToRupiah($komisi['harga_produk'])?></td>
              <td><?= intToRupiah($komisi['nominal'])?></td>
              <td><?= $komisi['keterangan']?></td>
            </tr>
          <?php 
            
            $no++;
            endforeach;?>
      </table>
      <hr>
    <?php endforeach;?>
  <?php else :?>
    <h4>Data Kosong</h4>
  <?php endif;?>
</body>
</html>
