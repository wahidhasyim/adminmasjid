<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '
          </div>') ?>
    <?= $this->session->flashdata('message') ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addNewPayment"><i class="fas fa-fw fa-plus"></i> Tambah Metode Pembayaran</a>

    <div class="row">

        <div class="col-lg">
            <div class="card-body" >
                <div class="table-responsive" style="height:100%">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Payment</th>
                                <th scope="col">Nomor Payment</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($payment as $d) :
                                // $date = date_create($d['date_trx']);

                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $d['nama_payment'] ?></td>
                                    <td><?= $d['no_payment'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#updatePayment<?= $d['id_payment'] ?>" class="badge badge-info">Edit</a>
                                        <a href="#" data-toggle="modal" data-target="#deletePayment<?= $d['id_payment'] ?>" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>

                                <!--delete Payment-->
                                <div class="modal fade" id="deletePayment<?= $d['id_payment'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Metode Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus Metode Pembayaran melalui <?= $d['nama_payment'] ?></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('admin/deletePayment?id=') ?><?= $d['id_payment'] ?>" class="btn btn-primary">Hapus</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--Modal Update Payment-->
                                <div class="modal fade" id="updatePayment<?= $d['id_payment'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewFaqLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="addNewFaqLabel">Edit Metode Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/updatePayment') ?>" method="post">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="<?= $d['id_payment'] ?>">
                                                <input class="form-control" type="text" id="nama_payment" name="nama_payment" value="<?= $d['nama_payment'] ?>" placeholder="Nomor Payment">

                                            </div>

                                            <div class="form-group">
                                                <input class="form-control" type="text" id="no_payment" name="no_payment" value="<?= $d['no_payment'] ?>" placeholder="Nama Payment">

                                            </div>
                                            

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="submit" name="submit" class="btn btn-primary">
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>
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
<div class="modal fade" id="addNewPayment" tabindex="-1" role="dialog" aria-labelledby="addNewPayment" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                        <div class="modal-header">
                                         <h5 class="modal-title" id="addNewPayment">Tambah Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addNewPayment') ?>" method="post">
                <div class="modal-body">
                <div class="form-group">
                        <input type="text" class="form-control" id="nama_payment" name="nama_payment" placeholder="Nama Payment">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_payment" name="no_payment" placeholder="Nomor Payment">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
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