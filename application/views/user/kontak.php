<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/kontak/images/icons/kontak.svg" />
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


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="<?= base_url('user/submitkontak') ?>" method="post">
				<span class="contact100-form-title">
					Hubungi Kami
				</span>
				<?= $this->session->flashdata('message') ?>
				<!--				<label class="label-input100" for="first-name">Tell us your name *</label> -->
				<div class="wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" id="nama" name="nama" placeholder="Nama">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-contact100">
					<br>
				</div>

				<!--				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label> -->


				<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" id="email" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-contact100">
					<br>
				</div>

				<!--				 <label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
				</div>
-->
				<!-- <label class="label-input100" for="message">Message *</label> -->
				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<textarea id="message" class="input100" id="message" name="message" placeholder="Pesan"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button type="submit" class="contact100-form-btn">
						Send
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('<?php echo base_url() ?>/assets/kontak/images/mosque.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-home"></span>
					</div>

					<div class="flex-col size2">
					<?php
                    foreach ($datamasjid as $d) :

                    ?>
						<span class="txt1 p-b-20">
							Alamat
						</span>

						<span class="txt2">
						<td><?= $d['alamat'] ?></td>
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Telp
						</span>

						<span class="txt2">
						<td><?= $d['telp'] ?></td>
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Email
						</span>

						<span class="txt2">
						<td><?= $d['email'] ?></td>
						</span>
					</div>
				</div>
				<?php 
                    endforeach ?>
			</div>
		</div>
	</div>



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
</body>

</html>