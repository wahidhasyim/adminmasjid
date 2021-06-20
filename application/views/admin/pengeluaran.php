<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card border-left-danger shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Pengeluaran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pengeluaran['nominal']) ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

   

    <div class="row">

        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#addNewPengeluaran"><i class="fas fa-fw fa-plus"></i> Tambah Pengeluaran</a>
            <a href="<?php echo base_url('export/exportPengeluaran'); ?>" class="btn btn-success mb-3 ml-2"><i class="fas fa-fw fa-file-excel"></i> Export Excel</a>
         
            <div class="col-lg">
                <div class="card-body">
                <form id="formprofil" action="<?php echo base_url(); ?>admin/printpengeluaran" method="POST" target="_blank">
      <input name="valnilai" type="hidden">

      <input type="hidden" name="nilaifilter" value="1">
      <div class="input-group">
        <select name="bulan" id="bulan" class="form-control form-control-user" title="Pilih Bulan">
<option value="01">Januari</option>
<option value="02">Februari</option>
<option value="03">Maret</option>
<option value="04">April</option>
<option value="05">Mei</option>
<option value="06">Juni</option>
<option value="07">Juli</option>
<option value="08">Agustus</option>
<option value="09">September</option>
<option value="10">Oktober</option>
<option value="12">November</option>
<option value="12">Desember</option>
</select>
<select name="tahun" id="tahun" class="form-control form-control-user" title="Pilih Tahun">
<?php
$mulai= date('Y') - 50;
for($i = $mulai;$i<$mulai + 100;$i++){
    $sel = $i == date('Y') ? ' selected="selected"' : '';
    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
}
?>
</select>
<div class="input-group-append">
          <button name="submit" value ="1" type="submit" class="btn btn-outline-secondary" type="button" ><i class="fa fa-search"></i> Search</button>
        </div>

        <div class="input-group-append">
          <button name="submit" value ="2" type="submit" class="btn btn-outline-secondary" type="button" ><i class="fa fa-print"></i> Print</button>
        </div>
      </form>
    </div>
    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jenis Pengeluaran</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pengeluaran as $d) :
                                    // $date = date_create($d['date_trx']);

                                ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $d['ket_pengeluaran'] ?></td>
                                        <td>Rp <?= number_format($d['nominal']) ?></td>
                                        <td><?= $d['tanggal'] ?></td>
                                        <td><?= $d['jenis_pengeluaran'] ?></td>
                                        <td><?= $d['nama_payment'] ?></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#updatePengeluaran<?= $d['id_pengeluaran'] ?>" class="badge badge-info">Edit</a>
                                            <a href="#" data-toggle="modal" data-target="#deletePengeluaran<?= $d['id_pengeluaran'] ?>" class="badge badge-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Pengeluaran-->
                                    <div class="modal fade" id="updatePengeluaran<?= $d['id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewPengeluaranLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewPengeluaranLabel">Edit Pengeluaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/updatePengeluaran') ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="hidden" name="id" id="id" value="<?= $d['id_pengeluaran'] ?>">
                                                            <input type="hidden" name="payment" id="payment" value="<?= $d['nama_payment'] ?>">
                                                            <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= $d['ket_pengeluaran'] ?>">
                                                        </div>

                                                        <div class="input-group" style="margin-bottom: 15px;">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="addon-wrapping">Rp</span>
                                                            </div>
                                                            <input type="text/number" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal" aria-label="Nominal" value="<?= $d['nominal'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $d['tanggal'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <select class="form-control" id="jenispengeluaran" name="jenispengeluaran">
                                                                <option value="<?= $d['jenis_pengeluaran'] ?>">- Jenis Pengeluaran -</option>
                                                                <?php foreach ($jenispengeluaran as $a) : ?>
                                                                    <option value="<?= $a['jenis_pengeluaran'] ?>"> <?= $a['jenis_pengeluaran'] ?> </option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                        <select class="form-control" id="payment" name="payment">
                                                            <option value="<?= $d['nama_payment'] ?>">- Jenis Payment -</option>
                                                            <?php foreach ($payment as $a) : ?>
                                                                <option value="<?= $a['nama_payment'] ?>"><?= $a['nama_payment'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    
                                <div class="modal fade" id="deletePengeluaran<?= $d['id_pengeluaran'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Pengeluaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus Pengeluaran  <?= $d['ket_pengeluaran'] ?></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('admin/deletePengeluaran?id=') ?><?= $d['id_pengeluaran'] ?>" class="btn btn-primary">Hapus</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php $i++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!--modal-->
<!-- Button trigger modal -->

<!-- Modal Add Pengeluaran -->
<div class="modal fade" id="addNewPengeluaran" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonasiLabel">Tambah pengeluaran baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pengeluaran') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addJenisPengeluaran">Tambah Jenis Pengeluaran</a>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </div>

                    <div class="input-group" style="margin-bottom: 15px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Rp</span>
                        </div>
                        <input type="text/number" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal" aria-label="Nominal">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="date" id="tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="jenispengeluaran" name="jenispengeluaran">
                            <option value="">- Jenis Pengeluaran -</option>
                            <?php foreach ($jenispengeluaran as $a) : ?>
                                <option value="<?= $a['jenis_pengeluaran'] ?>"> <?= $a['jenis_pengeluaran'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="payment" name="payment">
                            <option value="">- Jenis Payment -</option>
                            <?php foreach ($payment as $a) : ?>
                                <option value="<?= $a['nama_payment'] ?>"><?= $a['nama_payment'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Jenis Pengeluaran -->
<div class="modal fade" id="addJenisPengeluaran" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJenisPengeluaran">Tambah Jenis Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addJenisPengeluaran') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Pengeluaran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.mask.js"></script>
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