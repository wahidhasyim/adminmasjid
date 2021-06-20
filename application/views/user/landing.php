<!doctype html>
<html lang="en">
<!-- Header -->
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      var btn = $('#button');

      $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
          btn.addClass('show');
        } else {
          btn.removeClass('show');
        }
      });

      btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, '300');
      });
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/kontak/css/util.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/kontak/css/main.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <?php foreach ($datamasjid as $d) :?>
  <title><?= $d['nama'] ?></title>
                <?php endforeach ?>

  <style>
    .tombol {
      font: bold 11px Arial;
      text-decoration: none;
      background-color: #EEEEEE;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 1px solid #333333;
      border-bottom: 1px solid #333333;
      border-left: 1px solid #CCCCCC;
    }


    #button {
      display: inline-block;
      background-color: #B89762;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s,
        opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }

    #button::after {
      content: "\f077";
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      font-size: 2em;
      line-height: 50px;
      color: #fff;
    }

    #button:hover {
      cursor: pointer;
      background-color: #333;
    }

    #button:active {
      background-color: #555;
    }

    #button.show {
      opacity: 1;
      visibility: visible;
    }

    .custom-shape-divider-bottom-1599124443 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
      transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1599124443 svg {
      position: relative;
      display: block;
      width: calc(100% + 1.3px);
      height: 144px;
    }

    .custom-shape-divider-bottom-1599124443 .shape-fill {
      fill: #FFFFFF;
    }

    .bg-image-welcome {
      background: url("<?php echo base_url() ?>/assets/img/br6.jpg");
      background-size: cover;
      background-position: initial;
    }
  </style>

</head>

<body class="main" style="height: 100vh;">
  <a name="top"></a>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-nav" style="background-color: #002F57; height:7%;font-family: 'poppins', sans-serif;">
    <div class="container-fluid col-md-10">
      <a class="navbar-brand text-white" href="<?= base_url('admin') ?>">WEKAMA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/metode') ?>">Donasi</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/faq') ?>">FAQ</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/kontak') ?>">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

</html>
<header class="masthead bg-image-welcome" style="height: 93%;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
            <?php foreach ($datamasjid as $d) :?>
                <h1 class="text-uppercase text-white text-center font-weight-bold"><?= $d['nama'] ?></h1>
            </div>
            <div class="col-lg-6 align-self-baseline">
            
                <h6 class="text-white font-weight-medium mb-4"><b> <?= $d['alamat'] ?></b></h6>
                <?php endforeach ?>
                <button class="btn btn-lg btn-block text-white" style="margin-top: 10px; background-color: #B89762;" onclick="window.location.href='<?= base_url('user/metode') ?>'"><b>DONASI SEKARANG!</b></button>
                
                <div class=" row" style="margin-top: 25px;">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 63px;"  href="#pemasukanharian">
                            <pre></pre>Laporan Pemasukan Harian</a>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 75px; "  href="#pemasukanmingguan">
                            <pre></pre>Laporan Pemasukan Mingguan</a>
                    </div>

                    <div class="col-md-4 col-sm-6 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 63px; "  href="#pengeluaranharian">
                            <pre></pre>Laporan Pengeluaran Harian</a>
                    </div>
                    
                </div>

                <div class=" row" style="margin-top: 20px;">
                    <div class="col-md-4 col-sm-12 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 75px;  "  href="#totalpemasukan">
                            <pre></pre>Laporan Pemasukan Bulanan</a>
                    </div>
                
                    <div class="col-md-4 col-sm-6 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 63px; "  href="#neracakeuangan">
                            <pre></pre>Laporan Neraca Keuangan Tahunan</a>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 mb-3">
                        <a class="text-light" style="font-size: 14.5px; height: 75px; "  href="#totalpengeluaran">
                            <pre></pre>Laporan Pengeluaran Bulanan</a>
                    </div>
                    
                </div>
                <!-- <p class="text-white-75 font-weight-medium mb-5" style="margin-top: 5%; color:black;  " ><b>"Don't Forget to Say Alhamdulillah" - <i>Wekama Team</i></b></p> -->
            </div>
        </div>
    </div>
</header>

<body>

<?php date_default_timezone_set('Asia/Jakarta'); ?>   

<br>
<br>
<div class="card-body" style="background-color:#FFFFFF">
        <a id=""></a>
        <br>
        <h2 class="text-black text-center font-weight-bold" > Rekap Keuangan Minggu Lalu</h2>
        <br>
        <div class="table-responsive">
        <?php $i=1; foreach ($saldominggulalu as $d) : ?>
            <?php number_format($d->total) ?>
            <?php $saldolalu+=$d->total ?>
        <?php $i++; endforeach; ?>
        <?php $i=1; foreach ($kreditminggulalu as $d) : ?>
            <?php number_format($d->total) ?>
            <?php $kreditlalu+=$d->total ?>
        <?php $i++; endforeach; ?>
            
            <?php $i=1; foreach ($pemasukanminggulalu as $d) : ?>
                            <?php $pemasukanlalu+=$d->total ?>
                        <?php $i++; endforeach; ?>
                        <?php $i=1; foreach ($pengeluaranminggulalu as $d) : ?>
                            <?php $pengeluaranlalu+=$d->total ?>
                            <?php $i++; endforeach; ?>
                            <?php $saldosebelum = $saldolalu-$kreditlalu+$pengeluaranlalu-$pemasukanlalu; ?>

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                        <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pemasukan Hari Ini</h5>
                        </th>
                         </tr>
                         <tr>
                            <td colspan="3" style='text-align:center'>Saldo Minggu Lalu</td>
                            <td>Rp <?= number_format($saldosebelum) ?></td>

                        </tr>
                        <tr>
                        <?php $i=1; foreach ($pemasukanminggulalu as $d) : ?>
                            <td colspan="3" style='text-align:center'>Pemasukan Minggu Lalu</td>
                            <td>Rp <?= number_format($d->total) ?></td>
                            <?php $pemasukanlalu=$d->total ?>
                        <?php $i++; endforeach; ?>
                        </tr>
                        <tr>
                        <?php $i=1; foreach ($pengeluaranminggulalu as $d) : ?>
                            <td colspan="3" style='text-align:center'>Pengeluaran Minggu Lalu</td>
                            <td>Rp <?= number_format($d->total) ?></td>
                            <?php $pengeluaranlalu=$d->total ?>
                            <?php $i++; endforeach; ?>
                            
                        </tr>
                        <?php $saldototal=$saldosebelum + $pemasukanlalu - $pengeluaranlalu?>
                        <tr>
                            <th colspan="3" style='text-align:center'>Saldo Awal Minggu Ini</th>
                            <th>Rp <?= number_format($saldototal) ?></th>

                        </tr>
              </tbody>

            </table>
        </div>
    </div>
 

    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="pemasukanharian"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold" > Pemasukan Hari ini</h2>
        <br>
        <div class="table-responsive" style="height: 100%">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pemasukan Hari Ini</h5>
                        </th>
                    </tr>
                <th>Nomor</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
              </thead>
              <tbody>
                <?php $i=1; foreach ($pemasukanharian as $d) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $d->ket_pemasukan; ?></td>
                  <td><?= $d->tanggal; ?></td>
                  <td>Rp. <?= number_format($d->nominal); ?></td>
                  <?php $totalpemharian += $d->nominal; ?>
                </tr>
               
                <?php $i++; endforeach; ?>
                <tr>
                            <th colspan="3" style='text-align:center'>Total</th>
                            <td>Rp <?= number_format($totalpemharian) ?></td>

                        </tr>
              </tbody>

            </table>
        </div>
    </div>

    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="pengeluaranharian"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold" > Pengeluaran Hari Ini</h2>
        <br>
        <div class="table-responsive" style="height: 100%">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pengeluaran Hari Ini</h5>
                        </th>
                    </tr>
                <th>Nomor</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
              </thead>
              <tbody>
                <?php $i=1; foreach ($pengeluaranharian as $d) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $d->ket_pengeluaran; ?></td>
                  <td><?= $d->tanggal; ?></td>
                  <td>Rp. <?= number_format($d->nominal); ?></td>
                  <?php $totalpenharian += $d->nominal; ?>
                </tr>
               
                <?php $i++; endforeach; ?>
                <tr>
                            <th colspan="3" style='text-align:center'>Total</th>
                            <td>Rp <?= number_format($totalpenharian) ?></td>

                        </tr>
              </tbody>

            </table>
        </div>
    </div>

    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="pemasukanmingguan"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold" > Pemasukan Minggu ke-<?php foreach ($mingguan as $d) : ?> <?php echo $d->Minggu . ' Tahun ' ; echo date('Y'); // Hasil: 20-01-2017 05:32:15 ?> <?php break; endforeach;  ?></h2>
        <br>
        <div class="table-responsive" style="height: 100%">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pemasukan Minggu Ini</h5>
                        </th>
                    </tr>
                <th>Nomor</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Nominal</th>
              </thead>
              <tbody>
                <?php $i=1; foreach ($mingguan as $d) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $d->ket_pemasukan; ?></td>
                  <td><?= $d->tanggal; ?></td>
                  <td>Rp. <?= number_format($d->nominal); ?></td>
                  <?php $totalmingguan += $d->nominal; ?>
                </tr>
               
                <?php $i++; endforeach; ?>
                <tr>
                            <th colspan="3" style='text-align:center'>Total</th>
                            <td>Rp <?= number_format($totalmingguan) ?></td>

                        </tr>
              </tbody>

            </table>
        </div>
    </div>

    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="totalpemasukan"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold">Pemasukan Tahun <?php ' Tahun ' ; echo date('Y'); // Hasil: 20-01-2017 05:32:15 ?></h2>
        <br>
        <div class="table-responsive" style="height: 100%">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#ffffff;">
                <thead>
                    <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Total Pemasukan Bulanan</h5>
                        </th>
                    </tr>
                    <tr>
                       
                        <th scope="col">Bulan</th>
                        <th scope="col">Pemasukan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pemasukanbulanan as $d) :
                        // $date = date_create($d['date_trx']);

                    ?>
                        <tr>
                            
                            <td><?= $d->Bulan ?></td>
                            <td>Rp <?= number_format($d->TotalPemasukan) ?></td>
                            <?php $totalpemakhir += $d->TotalPemasukan; ?>
                        </tr>
  
                        <?php $i++; endforeach; ?>
                   
                   
                   
                </tbody>
            </table>

        </div>
    </div>

    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="totalpengeluaran"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold">Pengeluaran Tahun <?php ' Tahun ' ; echo date('Y'); // Hasil: 20-01-2017 05:32:15 ?></h2>
        <br>
       
        <div class="table-responsive" style="height: 100%">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#ffffff;">
                <thead>
                    <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Total Pengeluaran Bulanan</h5>
                        </th>
                    </tr>
                    <tr>
                        
                        <th scope="col">Bulan</th>
                        <th scope="col">Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pengeluaranbulanan as $d) :
                        // $date = date_create($d['date_trx']);

                    ?>
                        <tr>
                            
                            <td><?= $d->Bulan ?></td>
                            <td>Rp <?= number_format($d->TotalPengeluaran) ?></td>
                            <?php $totalpenakhir += $d->TotalPengeluaran; ?>
                        </tr>
  
                        <?php $i++; endforeach; ?>
        
                   
                </tbody>
            </table>

        </div>
    </div>
  
    <hr color="black">
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="neracakeuangan"></a>
        <div class="table-responsive" style="height: 100%">
        <br>
        <h2 class="text-black text-center font-weight-bold">Neraca Keuangan Tahun <?php ' Tahun ' ; echo date('Y'); // Hasil: 20-01-2017 05:32:15 ?></h2>
        <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#ffffff;">
                <thead>
                    <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Neraca</h5>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"  style="text-align:center">Total Pemasukan</th>
                        <td>Rp <?= number_format($totalpemakhir) ?></td>                     
                    </tr>
                </thead>
                <tbody>
                        <tr>
                        <th scope="col" style="text-align:center">Total Pengeluaran</th>
                            <td>Rp <?= number_format($totalpenakhir) ?></td>
                        </tr>
                        
                        <tr>
                        <th scope="col"  style="text-align:center">Saldo</th>
                        <?php $neracatotal = $totalpemakhir-$totalpenakhir; ?>
                            <td>Rp <?= number_format($neracatotal) ?></td>
                        </tr>
                   
                </tbody>
            </table>

        </div>
    </div>



    <!-- <br>
    <hr color="black">
    <br>
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="laporanpemasukan"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold"> Laporan Pemasukan</h2>
        <br>
        <div class="table-responsive" style="height: 100%">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="5" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pemasukan</h5>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nominal</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pemasukan as $d) :
                        // $date = date_create($d['date_trx']);

                    ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $d['ket_pemasukan'] ?></td>
                            <td><?= $d['tanggal'] ?></td>
                            <td>Rp <?= number_format($d['nominal']) ?></td>


                        </tr>

                    <?php $i++;
                    endforeach ?>
                </tbody>
            </table>

        </div>
    </div>

    <br>
    <hr color="black">
    <br>
    <br>
    <div class="card-body" style="background-color:#FFFFFF; height:100vh">
        <a id="laporanpengeluaran"></a>
        <br>
        <h2 class="text-black text-center font-weight-bold"> Laporan Pengeluaran</h2>
        <br>
        <div class="table-responsive" style="height: 100%">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color:#ffffff;">
                <thead>
                    <tr>
                        <th colspan="4" style="background-color:#002F57">
                            <h5 class="text-white">Tabel Pengeluaran</h5>
                        </th>
                    </tr>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Tanggal</th>
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
                        </tr>
                    <?php $i++;
                    endforeach ?>
                </tbody>
            </table>

        </div>
    </div> -->
    
   
  
    </div>
    <!-- Shape Divider -->
    <div class="custom-shape-divider-bottom-1599124443">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>



    <!-- Footer -->
    
    <!-- End of Footer -->

    <!-- Optional JavaScript -->
    <script src="<?php echo base_url() ?>/assets/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">

    <!-- Back to top button -->
    <a id="button" type="button" href="#top"></a>

</body>

</html>