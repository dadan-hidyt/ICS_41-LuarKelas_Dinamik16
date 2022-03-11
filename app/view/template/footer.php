<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
	window.onscroll = function() {
		if (document.body.scrollTop > 180 || document.documentElement.scrollTop > 180) {
			document.querySelector(".to-top").style.display = 'block';
		} else {
			document.querySelector(".to-top").style.display = 'none';

		}
	}
</script>

<script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.slim.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/popper/popper.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/vendor/aos-master/dist/aos.js"></script>

<script>
	AOS.init();
</script>
</body>

</html>