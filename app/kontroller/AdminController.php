<?php
class AdminController extends controller
{
	function __construct()
	{
	}
	//fungsi memanggil navbar dengan header
	function navbarwithheader()
	{
		$this->view("admin/template/header");
		$this->view("admin/template/nav");
	}
	//fungsi index dari halaman admin jika admin sudah di akses
	function index()
	{
		session_start();
		if (!isset($_SESSION['adminlogin'])) {
			header('location:' . base_url() . 'admin/login');
		}
		$this->navbarwithheader();
		$this->lib('level');
		$this->view("admin/index");
		$this->view("admin/template/footer");
	}
	//halaman roadmap
	function roadmap()
	{
		session_start();
		if (!isset($_SESSION['adminlogin'])) {
			header('location:' . base_url() . 'admin/login');
		}
		$this->navbarwithheader();
		$this->lib('level');
		$this->view("admin/roadmap");
		$this->view("admin/template/footer");
	}
	//halaman fedback roadmap
	function fedback_roadmap()
	{
		session_start();
		if (!isset($_SESSION['adminlogin'])) {
			header('location:' . base_url() . 'admin/login');
		}
		$this->navbarwithheader();
		$this->lib('level');
		$this->view("admin/fedbackview");
		$this->view("admin/template/footer");
	}
	//fungsi logout admin
	function logout()
	{
		session_start();
		session_destroy();
		session_unset();
		unset($_SESSION['adminlogin']);
		header("location:" . base_url() . "admin/login");
	}
	//fungsi untuk mendambahkan roadmap
	function roadmap_add()
	{
		session_start();
		if (!isset($_SESSION['adminlogin'])) {
			header('location:' . base_url() . 'admin/login');
		}
		if (isset($_POST['tambahroadmap']) && $_SERVER['REQUEST_METHOD'] == "POST") {
			$judul = $_POST['judul'];
			$kategori = $_POST['kategori'];
			$deskripsi = $_POST['deskripsi'];
			$path = $_FILES['filepdf'];
			$filenamenew = $path['name'];
			$ext = strtolower(pathinfo($filenamenew, PATHINFO_EXTENSION));
			$filealowed = ['pdf'];
			$fn = "roadmap-" . str_replace(' ', '-', $kategori) . '-' . md5(uniqid()) . "." . $ext;
			if ($filenamenew == "") {
				echo '<script>alert("Silahkan pilih file dulu");window.location.href="' . base_url() . 'admin/roadmap";</script>';
			} elseif ($judul == "") {
				echo '<script>alert("Silahkan isi judul dulu");window.location.href="' . base_url() . 'admin/roadmap";</script>';
			} elseif ($deskripsi == "") {
				echo '<script>alert("Silahkan pilih deskripsi dulu");window.location.href="' . base_url() . 'admin/roadmap";</script>';
			} else {
				if (in_array($ext, $filealowed)) {
					if (konek()->query("INSERT INTO roadmap (judul,file,deskripsi,kategori) VALUES ('$judul','$fn','$deskripsi','$kategori')")) {
						$dir = "files/pdf";
						if (move_uploaded_file($path['tmp_name'], $dir . '/' . $fn)) {
							echo '<script>alert("Roadmap berhasil di tambahkan");window.location.href="' . base_url() . 'admin/roadmap";</script>';
						}
					} else {
						print json_encode(['success' => false,"error"=>konek()->error]);
					}
				}
			}
		}
	}

	//fungsi untuk menghapus roadmap
	function roadmap_delete($id)
	{
		session_start();
		if (!isset($_SESSION['adminlogin'])) {
			header('location:' . base_url() . 'admin/login');
			exit();
		}
		$gr = konek()->query("SELECT * FROM roadmap WHERE id='$id'");
		$f = $gr->fetch_object();
		$filename = $f->file;
		if (file_exists('files/pdf/' . $filename)) {
			unlink('files/pdf/' . $filename);
			if (konek()->query("DELETE FROM roadmap WHERE id='$id'")) {

				echo '<script>alert("Roadmap berhasil di hapus dari database");window.location.href="' . base_url() . 'admin/roadmap";</script>';
			}
		} else {
			if (konek()->query("DELETE FROM roadmap WHERE id='$id'")) {

				echo '<script>alert("Roadmap berhasil di hapus dari database");window.location.href="' . base_url() . 'admin/roadmap";</script>';
			}
		}
	}
	//fungsi untuk halaman login
	function login()
	{
		$this->view("admin/login");
	}
}
