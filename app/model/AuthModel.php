<?php
class AuthModel{
  public function __construct(){
  }
  //proses atau cek login
  function ceklogin($username,$password){
   $konek = konek();
   $password = md5($password);
   $username = $konek->escape_string($username);
   if($ceklogin = $konek->query("SELECT * FROM user WHERE username='$username' AND password='$password'")){
    if($ceklogin->num_rows == 1){
      return $ceklogin;
    }
   }
  }
  //proses memasukan data ke database
  function proses_daftar($fullname,$username,$password){
    $konek = konek();
    $fullname = strip_tags(htmlspecialchars(htmlentities($fullname,ENT_QUOTES,'utf-8')));
    $username = strip_tags(htmlspecialchars(htmlentities($username,ENT_QUOTES,'utf-8')));
    $password = md5($password);
    if($konek->query("INSERT INTO user (nama,username,password) VALUES ('$fullname','$username','$password')")){
      return true;
    }else{
      return false;
    }
  }
  //cek apakah usenrame yang di ketikan ada di database
  function cekusername($usename){
    $konek = konek();
    if($cekuser = $konek->query("SELECT * FROM user WHERE username='$usename'")){
      if($cekuser->num_rows == 1){
          return false;
      }else{
          return true;
      }
    }
  }
}


 ?>
