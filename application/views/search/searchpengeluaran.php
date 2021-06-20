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


  <div class="card-body">
  <a href="pengeluaran"  type="button"  class="btn btn-danger">Back</a>
  <br>
  <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Nominal</th>

                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php
                            $i = 1;
                            foreach ($datafilter as $d) :
                                // $date = date_create($d['date_trx']);

                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $d->ket_pengeluaran ?></td>
                                    <td><?= $d->jenis_pengeluaran ?></td>
                                    <td><?= $d->tanggal ?></td>
                                    <td><?= $d->nama_payment ?></td>
                                    <td>Rp <?= number_format($d->nominal) ?></td>

                                </tr>

    <?php $i++ ; endforeach ?>

  </tbody>
</table>
                            </div>
                            </div>
<!-- Page level plugins -->
<script src="<?php echo base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>/assets/js/demo/datatables-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // Format mata uang.
        $('.uang').mask('0.000.000.000', {
            reverse: true
        });

        // Format nomor HP.
        $('.no_hp').mask('0000−0000−0000');

        // Format tahun pelajaran.
        $('.tapel').mask('0000/0000');
    })
</script>
</body>
</html>


