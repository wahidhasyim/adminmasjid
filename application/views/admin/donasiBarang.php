<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card border-left-success shadow h-100 py-2 mb-4 col-md-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Barang</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_format($total_barang['jumlah_barang']) ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fw fa-box fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

  

    <div class="row">

        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#addNewBarang"><i class="fas fa-fw fa-plus"></i> Tambah Barang</a>
            <a href="<?php echo base_url('export/exportBarang'); ?>" class="btn btn-success mb-3 ml-2"><i class="fas fa-fw fa-file-excel"></i> Export Excel</a>

            <div class="card-body">
            <form id="formprofil" action="<?php echo base_url(); ?>admin/printbarang" method="POST" target="_blank">
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
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Nama Penyumbang</th>
                                <th scope="col">Lokasi Penyimpanan</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($barang as $d) :
                                // $date = date_create($d['date_trx']);
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $d['nama_barang'] ?></td>
                                    <td><?= $d['jumlah_barang'] ?></td>
                                    <td><?= $d['nama_penyumbang'] ?></td>
                                    <td><?= $d['lokasi_penyimpanan'] ?></td>
                                    <td><?= $d['tanggal_masuk'] ?></td>

                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#updateBarang<?= $d['id_barang'] ?>" class="badge badge-info">Edit</a>
                                        <a href="#" data-toggle="modal" data-target="#deleteBarang<?= $d['id_barang'] ?>" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>

                                <!--delete barang-->
                                <div class="modal fade" id="deleteBarang<?= $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Donasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus Donatur a/n <?= $d['nama_penyumbang'] ?></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('admin/deleteBarang?id=') ?><?= $d['id_barang'] ?>" class="btn btn-primary">Hapus</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit Barang -->
                                <div class="modal fade" id="updateBarang<?= $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonasiLabel">Edit Pemasukan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('admin/updateBarang') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" value="<?= $d['id_barang'] ?>">
                                                        <input class="form-control" type="text" id="namabarang" name="namabarang" placeholder="Nama Barang" value="<?= $d['nama_barang'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="text" id="penyumbang" name="penyumbang" placeholder="Nama Penyumbang" value="<?= $d['nama_penyumbang'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="jumlah" name="jumlah" placeholder="Jumlah Barang" value="<?= $d['jumlah_barang'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $d['tanggal_masuk'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <textarea class="form-control" type="text" id="lokasi" name="lokasi" rows="3" placeholder="Lokasi Penyimpanan"><?= $d['lokasi_penyimpanan'] ?></textarea>
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
                            <?php $i++;
                            endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--modal-->
<!-- Button trigger modal -->

<!-- Modal Input Pemasukan -->
<div class="modal fade" id="addNewBarang" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonasiLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/donasiBarang') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" id="namabarang" name="namabarang" placeholder="Nama Barang">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" id="penyumbang" name="penyumbang" placeholder="Nama Penyumbang">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="number" id="jumlah" name="jumlah" placeholder="Jumlah Barang">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="date" id="tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" type="text" id="lokasi" name="lokasi" rows="3" placeholder="Lokasi Penyimpanan"></textarea>
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

<!-- Logout Modal-->
<div class="modal fade" id="deleteNewDonasi" tabindex="-1" role="dialog" aria-labelledby="deleteNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNewDonasiLabel">Are you sure to delete ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/delete') ?>">Delete</a>
            </div>
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
    });
</script>
<script>
    $(table).ready(function() {
        $("#dataTable").DataTable();
    });
</script>