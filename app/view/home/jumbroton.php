<!-- jumbotron -->
<section id="jumbotron">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <div class="row banner">
        <div class="col-md-6 info-banner">
          <h4 class="display-4">
            Selamat Datang <?= ucwords(strtolower(isset($_SESSION['nama']) ? $_SESSION['nama'] : '')) ?> di LuarKelas
          </h4>
          <p>Ikutan diskusi di forum <b>Tanya Aja</b> dan cari alur pembelajaranmu menuju mimpi yang kamu idamkan di fitur <b>Cari Peta</b></p>

          <?php
          if (isset($_SESSION['logedin'])) {
            ?> <a style="background-color: #00fa9a;color:#fff;" href="<?= base_url() ?>forum" class="btn">Mulai diskusi</a>
            <?php
          } else {
            ?>
            <div class="join-box">
              <input type="text" style="cursor: pointer;" readonly placeholder="Bergabung Sekarang">
              <a style="background-color: #00fa9a;color:#fff;" href="<?= base_url() ?>auth" class="btn">Daftar</a>
            </div>
            <?php
          }
          ?>
        </div>
        <div class="col-md-6 jumbotron-img">
          <img src="assets/img/1.svg">
        </div>
      </div>
    </div>
    <?php 

    if(isset($_SESSION['nama'])){
      ?>
      <svg xmlns="http://www.w3.org/2000/svg" class="wave loged" viewBox="0 0 1440 320">
        <path fill="#f5f5f5" fill-opacity="1" d="M0,128L48,133.3C96,139,192,149,288,133.3C384,117,480,75,576,48C672,21,768,11,864,16C960,21,1056,43,1152,42.7C1248,43,1344,21,1392,10.7L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
      <?php
    }else{
      ?>
      <svg xmlns="http://www.w3.org/2000/svg" class="wave" viewBox="0 0 1440 320">
        <path fill="#f5f5f5" fill-opacity="1" d="M0,128L48,133.3C96,139,192,149,288,133.3C384,117,480,75,576,48C672,21,768,11,864,16C960,21,1056,43,1152,42.7C1248,43,1344,21,1392,10.7L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
      <?php
    }

    ?>
  </div>
</section>