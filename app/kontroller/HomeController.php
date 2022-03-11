<?php
defined("PATH") or die("Akses di larang");
class HomeController extends controller{
    function __construct(){
      session_start();
    }
    #fungsi header dengan navbar
    function headerwithnavbar($title){
      $this->lib("level");
      $this->lib("session");
      $session = new Session();
      $this->view("template/header",['title'=>$title]);
      $this->view("home/navbar",['session'=>$session]);
    }
    //fungsi halaman utama
    function index(){
      global $konfig;
      $namaaplikasi = $konfig['namaaplikasi'];
      $this->headerwithnavbar($namaaplikasi);
      $this->view("home/jumbroton");
      //memanggil landing page
      $this->view('home/landing');
      $this->view('template/footer');
    }
   
}
