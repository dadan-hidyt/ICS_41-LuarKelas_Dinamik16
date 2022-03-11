<?php
//fungsi koneksi ke database
function konek(){
  global $konfig;
  $hostname = $konfig['hostname'];
  $username = $konfig['username'];
  $password = $konfig['password'];
  $database = $konfig['namaadb'];

  try{
    @$konek = new mysqli($hostname,$username,$password,$database);
    if($konek->connect_errno){
      throw new Exception("<b>Ada Error ngab:</b> ".$konek->connect_error);
    }
  }catch(Exception $e){
    die($e->getMessage());
  }
  return $konek;
}
//fungsi close connect
function closekonek(){
  return $konek->close();
}

 ?>
