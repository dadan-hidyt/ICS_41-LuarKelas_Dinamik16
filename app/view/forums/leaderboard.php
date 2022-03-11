<!-- Start:leadboard -->
<div class="leaderboard">
	<hr>
	<h4 class="head-lead">
		Top User
	</h4>
	<hr>
	<?php
	if (count((array)$leaderboarddata) > 0) {
		foreach ($leaderboarddata as $value) {

	?>
			<div style="display: flex;justify-content: space-between;" class="user-lead">
				<img style="border-radius: 100%;border:2px solid #dedede;" class="img-responsive" width="30px" height="30px" src="<?= base_url() ?>images/useravatar/<?= $value->avatar == null ? 'nophoto.png' :  $value->avatar ?>">
				<div class="lead-info">
					<span><?= $value->username ?></span>
					<span><?= $value->point ?>&nbsp;<sup><?= pointolevel($value->point) ?></sup></span>
				</div>
			</div>
	<?php
		}
	} else {
		echo 'Belum ada user';
	}
	?>
	<hr>
</div>
<!-- end:leaderboard -->





</div>
</div>
</div>
</div>
</section>