<?php 
class AccountController extends controller{
	//fungsi halaman login
	function index(){
		//mengaktifkan session
		session_start();
		//memeanggil library yang di butuhkan
		$this->lib('session');
		$this->lib('level');
		//membuat instance session
		$session = new session();
		//cek apakah user sudah login
		if($session->isLogin()){
			//ambil session user yang sudah login
			$id = $session->sessionGet("id");
			//mengambil 
			$data = konek()->query("SELECT * FROM user WHERE id='$id'");
			if($data){
				//fetch user data
				$datauser = $data->fetch_object();

				var_dump($datauser);
			}

		}else{
			//jika user belum login arahkan user ke halaman login
			header('location:'.base_url());
			exit();
		}
	}
}

 ?>