<?php
defined("PATH") or die("Tidak ada akses kesini ngab");
class AuthController extends controller
{
  function __construct()
  {
    session_start();
  }
  /*
  * Fungsi halaman autentikasi
  */
  function auth()
  {
    global $konfig;
    //menmanggil library session
    $this->lib('session');
    //membuat objek session
    $session = new Session();
    //cek apakah user sudah login
    //jika sudah alihkan ke halaman index
    if ($session->isLogin()) {
      header('location:' . base_url() . 'index');
      exit;
    }

    $data = array(
      'title' => 'Login | ' . $konfig['namaaplikasi'],
    );
    $this->lib("level");
    //memanggil file header
    $this->view("template/header", $data);
    //memanggil template login
    $this->view('auth/navbar');
    $this->view("auth/auth");
    //memeanggil file footer
    $this->view("template/footer");
  }
  //fungsi cek login
  function cek_login()
  {
    //jika request method nya post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //simpan data yang di kirim ke dalam sebuah variabel
      $username = $_POST['username'];
      $password = $_POST['password'];
    } else {
      //jika requestnya bukan post
      //alihkan ke halaman 404
      http_response_code(404);
      return;
    }
    //cek user dan password yang ada di database
    if ($data = $this->model("AuthModel")->ceklogin($username, $password)) {
      $row = $data->fetch_object();
      //buat session jika user berhasil login
      $_SESSION['logedin'] = true;
      $_SESSION['id'] = $row->id;
      $_SESSION['nama'] = $row->nama;
      print json_encode(['error' => 0, 'message' => 'login berhasil', 'link' => base_url() . 'index']);
    } else {
      print json_encode(['error' => 1, 'message' => 'login gagal uername dan password salah']);
    }
  }
  //proses daftar akun
  function proses_daftar()
  {
    //menampung error
    $error = array();
    //mem
    $AuthModel = $this->model('AuthModel');
    if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $nama_lengkap = $_POST['fullname'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password2 = $_POST['password2'];
      if ($password == $password2) {
        $panjangpass = strlen($password);
        if ($panjangpass > 4) {
          //cek apakah username sudah di gunakan oleh orang lain apa belum
          if ($AuthModel->cekusername($username)) {
            //jika belum lanjutkan ke proses penyimpanan data
            if ($AuthModel->proses_daftar($nama_lengkap, $username, $password)) {
              $error = ['error' => 0, 'message' => 'Pendaftaran akun berhasil...', 'link' => base_url() . 'auth'];
            } else {
              $error = ['error' => 0, 'message' => 'Kesalahan saat mendaftarrkan akun', 'link' => base_url() . 'auth'];
            }
          } else {
            //jika username sudah di daftarkan oleh orang lain tampilkan pesan
            $error = ['error' => 1, 'message' => 'Usesrname sudah di gunakan oleh orang lain'];
          }
        } else {
          $error = ['error' => 1, 'message' => 'Password harus memiliki panjang minimal 6 karakter'];
        }
      } else {
        $error = ['error' => 1, 'message' => 'Password yang anda ketikan tidak cocok dengan yang sebelumnya'];
      }
    } else {
      http_response_code(404);
      return;
    }
    print json_encode($error);
  }
  //fungsi logout user
  function logout()
  {
    session_unset();
    session_destroy();
    unset($_SESSION['logedin']);
    unset($_SESSION['id']);
    header('location:' . base_url() . 'index');
  }
}
