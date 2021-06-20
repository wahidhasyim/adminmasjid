<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        
        <!-- Saldo (Total) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Saldo</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pemasukan['nominal'] - $total_pengeluaran['nominal']) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Saldo (Harian) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Neraca Hari Ini</div>
                            <?php $i=1; foreach ($pemasukanharian as $d) : ?>
                            <?php number_format($d->PemasukanHarian) ?>
                            <?php $totalpemharian += $d->PemasukanHarian; ?>
                            <?php $i++; endforeach; ?>
                            <?php $i=1; foreach ($pengeluaranharian as $d) : ?>
                            <?php number_format($d->PengeluaranHarian) ?>
                            <?php $totalpenharian += $d->PengeluaranHarian; ?>
                            <?php $i++; endforeach; ?>
                            <?php $saldoharian = $totalpemharian-$totalpenharian; ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($saldoharian) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pemasukan (Tahun Ini) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Tahun Ini</div>
                            <?php $i=1; foreach ($pemasukantahunini as $d) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($d->PemasukanTahunIni) ?></div>
                            <?php $i++; endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Pengeluaran (Tahun Ini) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Tahun Ini</div>
                            <?php $i=1; foreach ($pengeluarantahunini as $d) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($d->PengeluaranTahunIni) ?></div>
                            <?php $i++; endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Total Barang Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_barang['jumlah_barang']) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa fa-box fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Saldo (Bulan Lalu) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo Bulan Lalu</div>
                            <?php $i=1; foreach ($pemasukanbulanlalu as $d) : ?>
                            <?php number_format($d->PemasukanBulanLalu) ?>
                            <?php $totalpembulanlalu += $d->PemasukanBulanLalu; ?>
                            <?php $i++; endforeach; ?>
                            <?php $i=1; foreach ($pengeluaranbulanlalu as $d) : ?>
                            <?php number_format($d->PengeluaranBulanLalu) ?>
                            <?php $totalpenbulanlalu += $d->PengeluaranBulanLalu; ?>
                            <?php $i++; endforeach; ?>
                            <?php $saldobulanlalu = $totalpembulanlalu-$totalpenbulanlalu; ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($saldobulanlalu) ?></div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pemasukan (Bulan Ini) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Bulan Ini</div>
                            <?php $i=1; foreach ($pemasukanbulanini as $d) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($d->PemasukanBulanIni) ?></div>
                            <?php $i++; endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengeluaran (Bulan Ini) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Bulan Ini</div>
                            <?php $i=1; foreach ($pengeluaranbulanini as $d) : ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($d->PengeluaranBulanIni) ?></div>
                            <?php $i++; endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($total_pemasukan['nominal']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-hand-holding-usd fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengeluaran</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($total_pengeluaran['nominal']) ?></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        
    </div>

    <h1 class="h3 mb-4 text-gray-800">Grafik Pemasukan Perbulan</h1>

    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas mr-1"></i>
                    Grafik Perbulan
                </div>
                <div class="card-body p-4">

                    <canvas id="myChartPemasukan" width="50%" height="25%"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartPemasukan').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {

                                labels: [<?php foreach ($total_pemasukan_bulanan as $key) {
                                                echo $key['bulan'] . ",";
                                            }  ?>],

                                datasets: [{
                                    label: 'Pemasukan (Bulan)',
                                    data: [<?php foreach ($total_pemasukan_bulanan as $key) {
                                                echo  $key['jumlah_bulanan'] . ",";
                                            }  ?>],
                                    backgroundColor: [
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    <i style="font-size: 10px;">Keterangan : Nomor diatas merupakan nomor bulan (1 : Januari dst)</i>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas mr-1"></i>
                    Grafik Jenis Pemasukan
                </div>
                <div class="card-body pr-4 pl-4 pb-2">

                    <canvas id="myChartJenisPemasukan" width="50%" height="25%"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartJenisPemasukan').getContext('2d');
                        var myChartPie = new Chart(ctx, {
                            type: 'bar',
                            data: {

                                labels: [<?php foreach ($jenis_pemasukan as $key) {
                                                echo  $key['jenis_pemasukan'] . ",";
                                            }  ?>],

                                datasets: [{
                                    label: 'Pemasukan (Bulan)',
                                    data: [<?php foreach ($jenis_pemasukan as $key) {
                                                echo  $key['jumlah'] . ",";
                                            }  ?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    <div class="form-group">
                        <select class="form-control pr-1" id="lihatjenispemasukan" name="lihatjenispemasukan">
                            <option value="">Keterangan Grafik</option>
                            <?php foreach ($jenispemasukan as $a) : ?>
                                <option value=""><?= $a['jenis_pemasukan'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <h1 class="h3 mb-4 text-gray-800">Grafik Pengeluaran Perbulan</h1>

    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas mr-1"></i>
                    Grafik Perbulan
                </div>
                <div class="card-body p-4">

                    <canvas id="myChartPengeluaran" width="50%" height="25%"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartPengeluaran').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {

                                labels: [<?php foreach ($total_pengeluaran_bulanan as $key) {
                                                echo $key['bulan'] . ",";
                                            }  ?>],

                                datasets: [{
                                    label: 'Pengeluaran (Bulan)',
                                    data: [<?php foreach ($total_pengeluaran_bulanan as $key) {
                                                echo  $key['jumlah_bulanan'] . ",";
                                            }  ?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    <i style="font-size: 10px;">Keterangan : Nomor diatas merupakan nomor bulan (1 : Januari dst)</i>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow">
                <div class="card-header">
                    <i class="fas mr-1"></i>
                    Grafik Jenis Pengeluaran
                </div>
                <div class="card-body pr-4 pl-4 pb-2">

                    <canvas id="myChartJenisPengeluaran" width="50%" height="25%"></canvas>
                    <script>
                        var ctx = document.getElementById('myChartJenisPengeluaran').getContext('2d');
                        var myChartPie = new Chart(ctx, {
                            type: 'bar',
                            data: {

                                labels: [<?php foreach ($jenis_pengeluaran as $key) {
                                                echo  $key['jenis_pengeluaran'] . ",";
                                            }  ?>],

                                datasets: [{
                                    label: 'Jenis Pengeluaran',
                                    data: [<?php foreach ($jenis_pengeluaran as $key) {
                                                echo  $key['jumlah'] . ",";
                                            }  ?>],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    <div class="form-group">
                        <select class="form-control pr-1" id="lihatjenispemasukan" name="lihatjenispengeluaran">
                            <option value="">Keterangan Grafik</option>
                            <?php foreach ($jenispengeluaran as $a) : ?>
                                <option value=""><?= $a['jenis_pengeluaran'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
        </div> -->
    </div>




    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->