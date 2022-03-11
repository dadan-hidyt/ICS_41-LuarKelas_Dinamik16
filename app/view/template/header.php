<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- ================ [vendor css block] ================-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-4.0.0/css/bootstrap.min.css">
	<!--================= [Css] ========================-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/forums.css">

	<!-- ================ [vendor Js block] ================-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=none">
	<!-- ================ [font] =============================-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<!-- ================= [icon] ==========================-->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- toast -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">
	<link href="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/aos-master/dist/aos.css">
	<script src=" <?= base_url() ?>assets/vendor/sweetalert/sweetalert.min.js">
	</script>

	<title><?= isset($title) ? $title : '' ?></title>
	<style>
		#to-top {
			outline: none;
			border: none;
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