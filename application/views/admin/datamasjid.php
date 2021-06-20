
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
    <?= $this->session->flashdata('message') ?>

    <div class="row">

<div class="col-lg">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $i = 1;
                   foreach ($datamasjid as $d) :
                        // $date = date_create($d['date_trx']);

                    ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['alamat'] ?></td>
                            <td><?= $d['telp'] ?></td>
                            <td><?= $d['email'] ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#updateDataMasjid<?= $d['id_datamasjid'] ?>" class="badge badge-info">Edit</a>
                            </td>
                        </tr>
                        <!--Modal Edit Jenis Pengeluaran-->
                        <div class="modal fade" id="updateDataMasjid<?= $d['id_datamasjid'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewFaqLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewFaqLabel">Edit Data Masjid</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/updateDataMasjid') ?>" method="post">
                                        <div class="modal-body">


                                        <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="<?= $d['id_datamasjid'] ?>">
                                                <input class="form-control" type="text" id="nama" name="nama" value="<?= $d['nama'] ?>" placeholder="Nama">

                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" id="alamat" name="alamat" value="<?= $d['alamat'] ?>" placeholder="Alamat">

                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" id="telp" name="telp" value="<?= $d['telp'] ?>" placeholder="No Telepon">

                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" id="email" name="email" value="<?= $d['email'] ?>" placeholder="Email">

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