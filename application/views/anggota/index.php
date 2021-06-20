<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">

        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewAnggota"><i class="fas fa-fw fa-plus"></i> Tambah Anggota</a>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($anggota as $d) :

                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $d['name'] ?></td>
                                    <td><?= $d['username'] ?></td>
                                    <td><?= $d['role_name'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#updateAnggota<?= $d['id'] ?>" class="badge badge-info">Edit</a>
                                        <a href="#" data-toggle="modal" data-target="#deleteAnggota<?= $d['id'] ?>" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>

                                <!--Delete Anggota -->
                                <div class="modal fade" id="deleteAnggota<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteAnggotaLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteAnggotaLabel">Hapus Anggota</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus anggota a/n <?= $d['name'] ?></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('anggota/deleteAnggota?id=') ?><?= $d['id'] ?>" class="btn btn-primary">Hapus</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Edit Anggota -->
                                <div class="modal fade" id="updateAnggota<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonasiLabel">Edit Anggota</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('anggota/updateAnggota') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id" id="id" value="<?= $d['id'] ?>">
                                                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama Anggota" value ="<?= $d['name'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="username" id="username" name="username" placeholder="Username Anggota" value="<?= $d['username'] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <input class="form-control" type="password" id="password" name="password" placeholder="Password wajib diisi!" value="" >
                                                    </div>

                                                    <div class="form-group">
                                                        <select class="form-control" id="role" name="role">
                                                            <option value="<?= $d['role_id'] ?>">Role</option>
                                                            <?php foreach ($role as $a) : ?>
                                                                <option value="<?= $a['id'] ?>"> <?= $a['role'] ?> </option>
                                                            <?php endforeach ?>

                                                        
                                                        </select>
                                                    </div>

                                                    
                                                    

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Edit</button>
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


<!-- Modal Input Anggota -->
<div class="modal fade" id="addNewAnggota" tabindex="-1" role="dialog" aria-labelledby="addNewDonasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewDonasiLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-4">
                            <form method="post" action="<?= base_url('anggota/tambahAnggota') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" value="<?= set_value('name') ?>" id="name" name="name" placeholder="Nama">
                                    <?= form_error('name', '<small class="text-danger pl-3">', ' </small>') ?>

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= set_value('username') ?>" placeholder="Username">
                                    <?= form_error('username', '<small class="text-danger pl-3">', ' </small>') ?>

                                </div>

                                <div class="form-group">
                                    <select class="form-control" id="role" name="role">
                                        <option value="">Role</option>
                                        <?php foreach ($role as $a) : ?>
                                            <option value="<?= $a['id'] ?>"> <?= $a['role'] ?> </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', ' </small>') ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulang Password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    Close
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
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

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>/assets/js/demo/datatables-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.mask.js"></script>
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