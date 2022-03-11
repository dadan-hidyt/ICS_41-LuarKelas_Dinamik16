<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- ================ [vendor css block] ================-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-4.0.0/css/bootstrap.min.css">
  <!--================= [Css] ========================-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/roadmapstyle.css">

  <!-- ================ [vendor Js block] ================-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=none">
  <!-- ================ [font] =============================-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <!-- ================= [icon] ==========================-->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- Fontawesome -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css">
  <!-- toast -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/aos-master/dist/aos.css">

  <link href="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.js"></script>
  <title>LuarKelas | Cari Peta</title>
  <style>
    #to-top {
      position: fixed;
      outline: none;
      border: none;
      bottom: 0;
      right: 0;
      z-index: 100000000000;
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
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>"><img width="40px" src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class='bx bx-menu-alt-right'></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">


        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="index.php">Beranda</a>
          <a class="nav-item nav-link" href="<?= base_url() ?>forum">Forum</a>
          <a class="nav-item nav-link" href="<?= base_url() ?>roadmap">Cari Peta</a>
          <a class="nav-item nav-link" href="<?= base_url() ?>#faqs">Tentang</a>
          <?php
          session_start();
          if (!isset($_SESSION['logedin'])) {
          ?> <a class="nav-item  btn mb-0" href="<?= base_url() ?>auth">Masuk</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </nav>


  <!-- jumbotron -->
  <section id="jumbotron">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row banner">
          <div class="col-md-6 banner-info">
            <h4 class="display-4">
              Selamat Datang di LuarKelas
            </h4>
            <p>Ikutan diskusi di forum Tanya Aja dan cari alur pembelajaranmu menuju mimpi yang kamu idamkan di fitur Cari Peta</p>
            <div class="search-box">
              <input type="text " id='tetsearch' placeholder="Cari Mimpi mu...">
              <a href="javascript:void(0)" onclick="caris()" class="btn"><i class='bx bx-search-alt'></i></a>
            </div>
          </div>
          <div class="col-md-6 jumbotron-img">
            <img src="<?= base_url() ?>assets/img/img/road1.svg" alt="">
          </div>
        </div>
      </div>

    </div>

  </section>



  <section id="roadmap">

    <div class="container">
      <h3 class="title-roadmaps">
        Roadmaps Pembelajaran
      </h3>
      <div id="roadmap-content" class="row">


      </div>
    </div>

    <div class="col-md-12 text-center">
      <div class="button-load">
        <button style="cursor: pointer;" id="ShowMore"><span>Buka lagi</span></button>
      </div>
    </div>



  </section>

  <!--  footer  -->


  <section id="footer">
    <div class="container text-center">
      <div class="row info-footer">
        <div class="col-md-3 sponsored">
          <h6>Bagian Dari : </h6>
          <div class="sponsor">
            <img src="<?= base_url() ?>assets/img/logo-sekolah.png" width="50px" alt="">
            <img src="<?= base_url() ?>assets/img/1637911290247.png" width="60px" alt="">

          </div>

        </div>
        <div class="col-md-8 detail-footer">

          <div class="list-footer text-left">
            <ul><span class="head">Produk</span>
              <li><a href="<?= base_url() ?>forum">Tanya Aja</a></li>
              <li><a href="<?= base_url() ?>roadmap">Cari Peta</a></li>
            </ul>
            <ul><span class="head">Aplikasi</span>
              <li><a href="#fitur">About</a></li>
              <li><a href="#faq">FAQS</a></li>
            </ul>
            <ul class><span class="head">Hubungi Kami</span>
              <li>luarkelas@gmail.com</li>
              <li><i class='bx bxl-facebook'></i>
                <i class='bx bxl-instagram'></i>
                <i class='bx bxl-linkedin-square'></i>
                <i class='bx bxl-twitter'></i>
              </li>
            </ul>
          </div>

        </div>

      </div>
      <div class="copy">
        <span>SMP INFORMATIKA SUMEDANG</span><br>
        <small>Copyright 2021 Luar Kelas, All Rights Reserved.</small><br>
        <small>Made With TEAM ICS41</small>
      </div>
    </div>


  </section>
  <script>
    var box = document.querySelector("#roadmap-content");

    function caris(s) {
      var ser = document.querySelector("#tetsearch");
      xhr = new XMLHttpRequest();
      var data = new FormData();
      data.append('keywords', ser.value);
      xhr.open("POST", 'roadmap_search');
      xhr.send(data);
      xhr.onload = function(e) {
        box.innerHTML = e.target.responseText;
      }
    }
    window.onload = function() {
      xhr = new XMLHttpRequest();
      xhr.open("GET", 'roadmap_getdata');
      xhr.send(null);
      xhr.onload = function(e) {
        box.innerHTML = e.target.responseText;
      }
    }
  </script>