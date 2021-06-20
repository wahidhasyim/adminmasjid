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
         <th>Nama Barang</th>
         <th>Jumlah Barang</th>
         <th>Nama Penyumbang</th>
         <th>Lokasi Penyimpanan</th>
         <th>Tanggal Masuk</th>
       </tr>
     </thead>
     <tbody>
      <?php $no=1; foreach ($datafilter as $value): ?>
      <tr>

        <td><?= $no++; ?></td>
        <td><?= $value->nama_barang; ?></td>
        <td><?= $value->jumlah_barang; ?></td>
        <td><?= $value->nama_penyumbang; ?></td>
        <td><?= $value->lokasi_penyimpanan; ?></td>
        <td><?= $value->tanggal_masuk; ?></td>

      </tr>
    <?php endforeach ?>

  </tbody>
</table>

</body>
</html>


