<!DOCTYPE html>
<html>
<head>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse; 
    }
  </style>

  <div id="content-wrapper"  style="margin-top:50px">
   <div class="container-fluid">
    <div class="card-header">
      <center>
        <b>
          <h3><?php echo $title ?> <br></h3>
        </b>
      </center>
    </div>
  </head>
  <body onload="window.print()">

    <table style="width:100%;">
      <thead>
        <tr>
         <th>Nomor</th>
         <th>Keterangan</th>
         <th>Jenis</th>
         <th>Tanggal</th>
         <th>Payment</th>
         <th>Nominal</th>
       </tr>
     </thead>
     <tbody>
      <?php $no=1; foreach ($datafilter as $value): ?>
      <tr>

        <td><?= $no++; ?></td>
        <td><?= $value->ket_pengeluaran; ?></td>
        <td><?= $value->jenis_pengeluaran; ?></td>
        <td><?= $value->tanggal; ?></td>
        <td><?= $value->nama_payment; ?></td>
        <td><?= $value->nominal; ?></td>

      </tr>
    <?php endforeach ?>

  </tbody>
</table>

</body>
</html>


