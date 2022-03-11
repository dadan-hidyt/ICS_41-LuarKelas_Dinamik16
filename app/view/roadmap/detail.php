<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- ================ [vendor css block] ================-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-4.0.0/css/bootstrap.min.css">
	<!--================= [Css] ========================-->
	<!-- ================ [vendor Js block] ================-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=none">
	<!-- ================ [font] =============================-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<!-- ================= [icon] ==========================-->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css">
	<!-- toast -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/aos-master/dist/aos.css">

	<link href="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.css" rel="stylesheet">
	<script src="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.js"></script>
	<title><?= isset($title) ? $title : '' ?></title>
	<style>
		* {
			font-family: 'Poppins', sans-serif;
			margin: 0;
			padding: 0;
			list-style: none;
			overflow: none;
		}

		:root {
			--warna-utama: #00fa9a;
			--warna-bg: #f5f5f5;
			--warna-contras: #f5a352;
		}

		html {
			scroll-behavior: smooth;
		}

		body {
			overflow-x: hidden;
			background-color: var(--warna-bg);
		}

		nav {
			background-color: var(--warna-utama);

		}

		.navbar-brand {
			font-size: 28px;
			color: #fff !important;
		}

		.nav-link {
			font-size: 18px;
			margin-right: 10px;
			color: #fff !important;
		}

		/* btn */
		.btn:focus {
			outline: none;
			border: none;
		}

		/* button hamburger */
		.navbar-toggler {
			border: none;
		}

		.navbar-toggler:focus {
			border: none;
			outline: none;
		}

		.navbar-toggler i {
			font-size: 36px;
			color: #f5a352 !important;
		}

		.navbar-nav .btn {
			background-color: var(--warna-contras);
			color: #fff;
			outline: none;
			margin-left: 10px;
			align-items: center;

		}

		.navbar-nav .btn:focus {
			outline: none;
			border: none;
		}

		#detail-page {
			margin-top: 20px;
		}

		.nav-box a i {
			font-size: 32px;
			border: 2px solid var(--warna-contras);
			border-radius: 50%;
			color: var(--warna-contras);
		}

		.nav-box a i:hover {
			background-color: var(--warna-contras);
			color: #fff;

		}

		#detail {
			margin-top: 20px;
		}

		#detail-page .preview {
			width: 100%;
			box-shadow: 0px 0px 8px #dedede;
			border: none;
			padding: 0;
			margin: 0;
			height: 560px;
		}

		#detail-page .preview iframe {
			border: none;
			border-radius: 10px;

		}

		.detail-act .btn {
			background-color: var(--warna-contras);
			color: #fff;
		}

		.detail-act .btn:focus {
			outline: none;
			border: none;
		}

		.detail-act .btn:hover {
			opacity: .9;
		}

		/* footer */
		#footer {
			background-color: #333;
			color: #e4dada;
			padding: 6vw;
			width: 100%;
			height: auto;
			margin-top: 40px;
		}


		p {
			font-size: 16px;
		}

		.copy {
			margin-top: 40px;
			margin-bottom: 10px;
		}


		#footer a {
			text-decoration: none;
			color: #e7e7e7aa;

		}

		.list-footer .head {
			margin-bottom: 10px;

			font-size: 18px;
			line-height: 40px;
		}

		.list-footer ul li {
			margin-bottom: 4px;
		}






		/* tablet version */
		@media (min-width: 577px) {
			nav {
				background-color: var(--warna-bg);
				border-bottom: 3px solid var(--warna-contras);
			}

			.navbar-brand {
				color: #333 !important;
			}

			.navbar-nav .nav-link {
				color: #333 !important;
			}

			.navbar-nav .nav-link:hover {
				color: var(--warna-utama) !important;
			}

			.navbar-toggler i {
				color: #333;
			}

			/* footer */
			.info-footer {
				flex-direction: column;
			}

			.info-footer .detail-footer {
				margin-left: 20px;
				margin-top: 10px;
			}
		}






		/* mobile version */
		@media (max-width: 576px) {
			nav {
				background-color: var(--warna-bg);
				border-bottom: 3px solid var(--warna-contras);
			}

			.navbar-brand {
				color: #333 !important;
			}

			.navbar-nav .nav-link {
				color: #333 !important;
			}

			.navbar-nav .nav-link:hover {
				color: var(--warna-utama) !important;
			}

			.navbar-toggler i {
				color: #333;
			}

			#detail-page .preview {
				width: 90%;
				margin: 0 auto;
			}

			.nav-box {
				margin-bottom: 20px;
			}

			#detail-page .info-detail {
				margin-top: 40px !important;
				margin: 0 auto;
				width: 90%;
			}

			/* footer */
			#footer {
				height: 100%;
			}

			#footer a {
				text-decoration: none;
				color: #e7e7e7aa;

			}
		}







		/* desktop version */
		@media (min-width: 992px) {
			nav {
				background-color: var(--warna-utama);
			}

			.navbar-brand {
				color: #fff !important;
			}

			.navbar-nav .nav-link {
				color: #666666 !important;
			}

			.navbar-toggler i {
				color: #fff;
			}

			.navbar-nav .nav-link:hover {
				color: #f5a352 !important;
				opacity: .8;
			}

			.nav-link:hover::after {
				content: '';
				background-color: var(--warna-contras);
				display: block;
				height: 3px;
				width: 10px;
				margin: 0 auto;
				margin-bottom: -14px;
				color: #f5f5f5;

			}

			#footer {
				background-color: #333;
				color: #fff;
				width: 100%;
				height: auto;
			}

			#footer .container {
				margin: 0 auto;

			}

			#footer .info-footer {
				flex-direction: row;
			}

			#footer .info-footer .detail-footer {
				margin-left: -45px;
				margin-top: -10px;

			}

			.list-footer {
				display: flex;
				justify-content: space-evenly;
			}

			.copy {
				margin-bottom: -40px;
			}
		}
	</style>
	<style>
		#to-top {
			position: fixed;
			outline: none;
			border: none;
			bottom: 0;
			right: 0;
			z-index: 100000000000;
			padding: 6px;
			cursor: pointer;
			background-color: #00fa9a;
			color: #fff;
			border-radius: 4px;
			margin-bottom: 60px;
			margin-right: 21px;
		}

		#to-top span {
			margin-right: 6px;
			margin-left: 6px;
			font-size: 14px;

		}
	</style>
</head>

<body>
	<div style="display: none;" class="to-top" onclick="window.scrollTo({top:'0',left:'0',behaviour:'smooth'})">
		<button id="to-top"><span> <i class="bx bxs-up-arrow"></i></span></button>
	</div>
	<nav style="background-color: #f5f5f5;" class="navbar navbar-expand-lg navbar-light ">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>"><img width="40px" src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<i class='bx bx-menu-alt-right'></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">


				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link" href="<?= base_url() ?>">Beranda</a>
					<a class="nav-item nav-link" href="<?= base_url() ?>forum">Forum</a>
					<a class="nav-item nav-link" href="<?= base_url() ?>roadmap">Cari Peta</a>
					<a class="nav-item nav-link" href="<?= base_url() ?>#faqs">Tentang</a>
					<?php
					if (!isset($_SESSION['logedin'])) {
					?> <a class="nav-item  btn mb-0" href="<?= base_url() ?>auth">Masuk</a>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</nav>

	<br>

	<!-- content -->
	<section id="detail-page">
		<div class="container">

			<div class="row" id="detail">
				<div class="col-md-1 nav-box">

					<a href="<?= base_url() ?>/roadmap"><i class='bx bx-chevron-left'></i></a>

				</div>

				<?php

				$ll = konek()->query("SELECT * FROM roadmap WHERE id='$id'");
				if ($ll->num_rows > 0) {
					$e = $ll->fetch_object();
				?>
					<div class="col-md-7 preview">
						<?php

						if ($e->file == "") {
							echo 'tidak ada file untuk konten ini';
						} else {
						?>
							<iframe src="<?= base_url() ?>/files/pdf/<?= $e->file ?>" width="100%" height="100%" style="border:1px solid #dededes;"></iframe>
						<?php
						}

						?>
					</div>
					<div class="col-md-1"></div>

					<div class="col-md-3 info-detail">
						<div class="detail-act">
							<a href="<?= base_url() . "zona-download/" . $e->file ?>" class="btn">Download <i class='bx bx-download'></i></a>
						</div>
						<hr>
						<div class="detail-info">
							<h6><?= $e->judul ?></h6>
							<small><i class="bx bx-bookmark"></i> <?= $e->kategori ?></small><br>
							<small><i class="bx bx-download"> </i> <?= $e->jumlah_download ?> kali di downlad</small>

							<hr>
							<p style="width:100%">
								<?php
								if ($e->deskripsi != "") {
									$pattern = '~[a-z]+://\S+~';
									echo preg_replace($pattern, '<a href="$0" target="_black">$0</a>', $e->deskripsi);
								}

								?>
							</p>

						</div>
					</div>
				<?php
				} else {
					echo 'Tidak ada data dengan id tersebut';
				}


				?>
			</div>
			<div class="col-md-12 text-center mt-5">
				<span>-- Selamat Berjuang --</span>
			</div>
		</div>
	</section>


	<!--  footer  -->


	<section id="footer">
		<div class="container text-center">
			<div class="row info-footer">
				<div class="col-md-3 sponsored">
					<h6>Bagian Dari : </h6>
					<div class="sponsor">
						<img src="<?= base_url() ?>assets/img/logo-sekolah.png" width="50px" alt="">
						<img src="<?= base_url() ?>assets/img/1637911290247.png" width="60px" alt="">

					</div>


				</div>
				<div class="col-md-9 detail-footer">

					<div class="list-footer text-left">
						<ul><span class="head">Produk</span>
							<li><a href="<?= base_url() ?>forum">TanyaAja</a></li>
							<li><a href="<?= base_url() ?>roadmap">cari peta</a></li>
						</ul>
						<ul><span class="head">Aplikasi</span>
							<li><a href="#fitur">About</a></li>
							<li><a href="#faq">Faq</a></li>
						</ul>
						<ul class><span class="head">Hubungi Kami</span>
							<li>luarkelas@gmail.com</li>
							<li><i class='bx bxl-facebook'></i>
								<i class='bx bxl-instagram'></i>
								<i class='bx bxl-linkedin-square'></i>
								<i class='bx bxl-twitter'></i>
							</li>
						</ul>
					</div>

				</div>

			</div>
			<div class="copy">
				<span>SMP INFORMATIKA SUMEDANG</span><br>
				<small>Copyright 2021 luar kelas.All right reserved</small><br>
				<small>Made With TEAM ICS41</small>
			</div>
		</div>


	</section>