<!-- section fitur -->

<section id="fitur">
  <div class="container">
    <div class="row fitur">
      <div class="col-md-5 fitur-img">
        <img src="<?= base_url() ?>assets/img/why.svg" alt="">
      </div>
      <div class="col-md-1"></div>
      <div style="color: #333;" class="col-md-5 fitur-info">
        <h4 data-aos="fade-right" class="text-left text-mengapa">
          <b>Mengapa Harus luar kelas?</b>
        </h4>
        <div class="white-box">
          <div data-aos="fade-right" class="card">
            <div class="card-body">
              <h5>Mudah di gunakan</h5>
              <p>Bisa di gunakan di semua device dan memudahkan para user dalam berdiskusi</p>
            </div>
          </div>
          <div data-aos="fade-right" class="card">
            <div class="card-body">
              <h5>Gapai mimpi lebih mungkin</h5>
              <p>Dengan fitur cari peta para user akan mendapatkan alur pembelajaran menuju mimpinya,jadi pembelajaran terstruktur</p>
            </div>
          </div>
          <div data-aos="fade-right" class="card">
            <div class="card-body">
              <h5>Konsep Gamifikasi</h5>
              <p>Dapatkan badge badge menarik yang akan meningkatkan branding mu sebagai user di LuarKelas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</section>


<!-- product knowladge -->

<section id="produk">

  <div class="tanya-aja" id="tanya-aja">
    <div class="container">
      <div class="row">
        <div class="col-md-6 img-product">
          <img src="<?= base_url() ?>assets/img/2.svg">
        </div>
        <div data-aos="fade-up" class="col-md-6 deskripsi-product">
          <h4><b>Apa itu Tanya Aja?</b></h4>
          <p class="deskripsi">
            Merupakan forum diskusi online yang akan memudahkan para user untuk saling berkomunikasi satu sama lain dalam menyelesaikan persoalan tugas mereka masing masing.<b>Apa yang menarik?</b>Setiap user akan terus naik tingkat ketika user membantu menjawab pertanyaan user lain
          </p>
          <a href="<?= base_url() ?>forum" class="btn">Diskusi Sekarang</a>
        </div>
      </div>
    </div>
  </div>
  <div class="cari-peta" id="cari-peta">
    <div class="container">
      <div class="row">
        <div data-aos="fade-up" class="col-md-6 deskripsi-product text-right">
          <h4><b>Apa itu Cari Peta?</b></h4>
          <p class="deskripsi">
            Merupakan fitur untuk memudahkan para user dalam mencari alur pembelajarannya untuk mencapai mimpi yang mereka idamkan serta para user akan di beri arahan dengan referensi-referensi pembelajaran
          </p>
          <a href="<?= base_url() ?>roadmap" class="btn">Coba Sekarang</a>
        </div>
        <div class="col-md-6 img-product">
          <img src="<?= base_url() ?>assets/img/3.svg">
        </div>

      </div>
    </div>
  </div>


</section>



<section id="faqs">

  <div class="container">
    <div class="row faqs">
      <div class="col-md-6 faq-content">
        <h4><b>FAQ's</b></h4>
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Apa itu LuarKelas?
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                LuarKelas adalah sebuah aplikasi berbasis web yang di dalamnya berisi forum diskusi yang akan memudahkan para user untuk saling berinteraksi satu sama lain dan di luar kelas juga para user bisa mencari alur pembelajaran untuk mencapai mimpinya.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Bagaimana cara melakukan <br> Pendaftaran akun?
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Cari button daftar atau bisa juga dengan klik button masuk untuk di arahkan ke login page dan di situ di harap user memasukan data datanya untuk mendaftar di Aplikasi LuarKelas ini.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Bagaimana cara mengajukan <br> pertanyaan di forum?
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Untuk mengajukan pertanyaan di harapkan para user telah login terlebih dahulu dan setelah user berhasil login,user bisa langsung mengunjungi forum diskusi.Dalam forum diskusi tersebut terdapat button buat postingan untuk mengajukan pertanyaan.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                  Bagaimana caranya menjawab <br> pertanyaan?
                </button>
              </h5>
            </div>
            <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
              <div class="card-body">
                Untuk menjawab pertanyaan di forum para user di harapkan telah login terlebih dahulu dan setelah login Para user bisa masuk ke forum page untuk mencari pertanyaan yang ingin di jawab.Terdapat button jawab dalam postingan untuk menjawab pertanyaan user lain.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                  Bagaimana cara mencari <br> Roadmaps?
                </button>
              </h5>
            </div>
            <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
              <div class="card-body">
                Untuk mencari alur pembelajaran,di harapkan user telah berhasil login dan setelah berhasil login user bisa mengunjungi page CARI PETA dan mencari di mesin pencarian yang telah di sediakan dalam page tersebut.setelah menemukan tujuan pebelajarannya user akan di arahkan menuju alur pembelajarannya.
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="col-md-6 faq-img">
        <img src="<?= base_url() ?>assets/img/faq.svg" alt="">
      </div>
    </div>
  </div>






</section>


<!-- Profil -->


<!-- profil Sekolah -->
<section id="profil-sekolah">
  <div class="container profil-sekolah">
    <h4 data-aos="fade-right">Profil Sekolah</h4>
    <p data-aos="fade-down">SMK INFORMATIKA SUMEDANG merupakan sekolah kejuruan yang letaknya di daerah Sumedang,Jawa Barat.Beralamat lengkap : Jl. Angkrek Situ No.19, Situ, Kec. Sumedang Utara, Kabupaten Sumedang, Jawa Barat 45621</p>
    <a data-aos="fade-up" href="https://www.smkifsu.sch.id/hal-profil-lengkap-smk-informatika-sumedang.html" class="btn" style="background-color:#00fa9a;color:#fff; " target="blank">Info Lebih lanjut</a>
  </div>
</section>

<!-- profil developer -->
<section id="profil-dev">
  <div class="container">
    <h4>Our team</h4>
    <div class="row">
      <div class="col-md-4 profil-dev">
        <img data-aos="zoom-in" width="150px" style="border-radius: 50%;" src="<?= base_url() ?>assets/img/ahmad.jpg">
        <div class="mb-2"></div>
        <span class=" head-info">
          Ahmad Hidayat
        </span>
        <small>Web Analytics</small>
        <a target="_blank" href="https://instagram.com/ahid.yt?utm_medium=copy_link" class="btn btn-sm"> Contact Me</a>
      </div>
      <div class="col-md-4 profil-dev">
        <img data-aos="zoom-in" width="150px" style="border-radius: 50%;" src="<?= base_url() ?>assets/img/rafly.jpg">
        <div class="mb-2"></div>
        <span class="head-info">
          Rafly Firmansyah
        </span>
        <small>Web Design</small>
        <a target="_blank" href="https://instagram.com/rflyfrmnsyh__?utm_medium=copy_link" class="btn btn-sm"> Contact Me</a>
      </div>
      <div class="col-md-4 profil-dev">
        <img data-aos="zoom-in" width="150px" height="150px" style="border-radius: 50%;" src="<?= base_url() ?>assets/img/dadan.jpg">
        <div class="mb-2"></div>
        <span class="head-info">
          Dadan Hidayat
        </span>
        <small>Web Programmer</small>
        <a target="_blank" href="https://instagram.com/dadan.hidyt?utm_medium=copy_link" class="btn btn-sm"> Contact Me</a>
      </div>

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
      <div class="col-md-9 detail-footer">

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
      <span>SMK INFORMATIKA SUMEDANG</span><br>
      <small>Copyright 2021 LuarKelas, All Right Reserved.</small><br>
      <small>Made With TEAM ICS41</small>
    </div>
  </div>


</section>