<!DOCTYPE html>
<html lang="en">

<head>
	<title>Metode Pembayaran</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/kontak/images/icons/metode.svg" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/kontak/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->

	<!--===============================================================================================-->
</head>

<body>
	<div style="background-color:#ffffff; align-items:center; justify-content: center; text-align: center;">
		<form>
			<br>
			<br>
			<br>

			<span class="contact100-form-title">
				<b>Pilih Metode Pembayaran</b>
			</span>

			<div class="row">
				<?php
				$i = 1;
				foreach ($barcode as $d) :

				?>

					<div class="container-contact100-form-btn"> 
						<button type="button" class="btn btn-outline-dark btn-lg " style="padding: 15px 300px;" data-toggle="modal" data-target="#myModal<?= $d['id_barcode'] ?>">
							<div class="text">
								<?= $d['nama_barcode'] ?>
							</div>
						</button>
					</div>

					<div class="modal fade" id="myModal<?= $d['id_barcode'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="addNewDonaturLabel">Silahkan Scan Barcode Berikut</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body centered">
									<img src="<?php echo base_url() ?>/images/<?= $d['barcode'] ?>" width="400px" height="400px">
								</div>
								<p></p>
								<h4> <?= $d['nama_barcode'] ?> </h4>
								<p></p>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>

							</div>
						</div>
					</div>


				<?php $i++;
				endforeach ?>

			</div>

			<!-- Ovo -->
			<!-- <div class="container-contact100-form-btn">
				<button type="button" class="metode100-form-btn" data-toggle="modal" data-target="#myModalOvo">
					<img src="<?php echo base_url() ?>/assets/kontak/images/ovo.png" width="75px" height="20px">
				</button>
			</div> -->

			<!-- Dana -->
			<!-- <div class="container-contact100-form-btn">
				<button type="button" class="metode100-form-btn" data-toggle="modal" data-target="#myModalDana">
					<img src="<?php echo base_url() ?>/assets/kontak/images/dana.png" width="90px" height="90px">
				</button>
			</div> -->

			<!-- <div class="container-contact100-form-btn">
				<div class="pembungkus"> -->
			<!-- <h6> <strong>ATAU MELALUI REKENING</strong></h6> -->
			<!-- </div> -->
			<!-- </div>
                 <div class="container-contact100-form-btn">
					<button class="metode100-form-btn">
                    <img src="<?php echo base_url() ?>/assets/kontak/images/bri.png" width="90px" height="20px">
					</button>
				</div>
                <div class="container-contact100-form-btn">
					<button class="metode100-form-btn">
                    <img src="<?php echo base_url() ?>/assets/kontak/images/bca.svg" width="90px" height="20px">
					</button>
				</div>
                <div class="container-contact100-form-btn">
					<button class="metode100-form-btn">
                    <img src="<?php echo base_url() ?>/assets/kontak/images/mandiri.svg" width="100px" height="25px">
					</button>
                </div> -->

		</form>
	</div>
	</div>

	<!-- <div class="modal fade" id="myModalGopay" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addNewDonaturLabel">Silahkan Scan Barcode Berikut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body centered">
					<img src="<?php echo base_url() ?>/images/" width="400px" height="400px">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="myModalOvo" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addNewDonaturLabel">Silahkan Scan Barcode Berikut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img src="<?php echo base_url() ?>/assets/kontak/images/ovo.png" width="150px" height="100px">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	<div class="modal fade" id="myModalDana" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addNewDonaturLabel">Silahkan Scan Barcode Berikut</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img src="<?php echo base_url() ?>/assets/kontak/images/dana.png" width="150px" height="100px">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div> -->


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/kontak/js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script language="javascript">
		$('body').on('hidden.bs.modal', '.modal', function() {
			$(this).removeData('bs.modal');
		});
	</script>
</body>

</html>