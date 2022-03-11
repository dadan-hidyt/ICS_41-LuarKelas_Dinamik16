<?php
class RoadmapController extends controller
{
	function index()
	{
		$this->view("roadmap/index");
		$this->view("template/footer");
	}
	function roadmap_getdata()
	{
		$d = konek()->query("SELECT * FROM roadmap ORDER BY id DESC");
		if ($d) {
			if ($d->num_rows > 0) {
				while ($e = $d->fetch_object()) {
?>
					<div data-aos="fade-up" class="col-md-4 road-box">
						<div class="road-content">
							<div class="img-container">
								<img alt="">
							</div>
							<div class="roadDeskripsi">
								<h4><?= $e->judul ?></h4>
								<p>
									<?= substr($e->deskripsi, 0, 125) . "..."; ?>
								</p>

								<a href="<?= base_url() ?>roadmap/detail/<?= $e->id ?>" class="btn btn-sm" style="background-color:#f5a352;color:#fff;">Lihat detail</a>
							</div>
						</div>
					</div>

				<?php
				}
			} else {
				echo '<br><p class="alert alert-warning">Tidak ada data adpapun disini</p>';
			}
		}
	}
	function roadmap_search()
	{
		$e = isset($_POST['keywords']) ? $_POST['keywords'] : '';
		$d = konek()->query("SELECT * FROM roadmap WHERE judul LIKE '%" . $e . "%' OR kategori LIKE '%" . $e . "%' ORDER BY id DESC");
		if ($d) {
			if ($d->num_rows > 0) {
				while ($e = $d->fetch_object()) {
				?>
					<div data-aos="fade-up" class="col-md-4 road-box">
						<div class="road-content">
							<div class="img-container">
								<img alt="">
							</div>
							<div class="roadDeskripsi">
								<h4><?= $e->judul ?></h4>
								<p>
									<?= substr($e->deskripsi, 0, 125) . "..."; ?>
								</p>

								<a href="<?= base_url() ?>roadmap/detail/<?= $e->id ?>" class="btn btn-sm" style="background-color:#f5a352;color:#fff;">Lihat detail</a>
							</div>
						</div>
					</div>

				<?php
				}
			} else {
				konek()->query("INSERT INTO roadmap_request (permintaan) VALUES ('$e')");
				?>
				<br>
				<p class="alert alert-warning">
					Tidak ada data dengan keywords itu,, Keywords tersebut akan kami jadikan sebagai fedback
				</p>
<?php
			}
		}
	}
	function details($id)
	{

		$this->view("roadmap/detail", ['id' => $id, 'title' => "Luar Kelas | Cari Peta Detail"]);
		$this->view("template/footer");
	}
	function tambahroadmap()
	{
	}
}
