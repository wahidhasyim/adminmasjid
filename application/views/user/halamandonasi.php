<!DOCTYPE html>
<html lang="en">

<head>
	<title>Donasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/donasi/images/icons/donasi.svg" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/donasi/css/main.css">
	<!--===============================================================================================-->
</head>

<body>


	<div class="container-contact100">
		<div class="wrap-metode100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Halaman Donasi
				</span>


				<label class="label-input100" for="nominal">Masukkan Nominal Donasi</label>
				<div class="wrap-input100 validate-input" data-validate="Masukkan Nominal Donasi!">
					<input id="nominal" class="input100" type="number" name="nominal" placeholder="Rp                                                                              0">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Nama Anda</label>
				<div class="wrap-input100 validate-input" data-validate="Masukkan Nama Anda!">
					<input id="phone" class="input100" type="text" name="phone" placeholder="">
					<span class="focus-input100"></span>

				</div>
				<div>
					<ul class="radioButtons">
						<input>
						<p> &nbsp; <input type='radio' name='tampilkan' value='Tampilkan Nama' /> &nbsp; Tampilkan Nama </p>
					</ul>
				</div>
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" onclick="window.location.href='<?= base_url('user/metode') ?>'">
						Pilih Metode Pembayaran
					</button>
				</div>

			</form>


		</div>
	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>/assets/donasi/js/main.js"></script>
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
</body>

</html>