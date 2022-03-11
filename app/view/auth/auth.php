<!--begin:auth-->
<div class="bglogin" style="background-color: #f5a352;width:100%;position:absolute;height:100%;">
  <div class="container-auth">
    <div class="auth">
      <!--login:blok-->
      <div class="cards login">
        <div class="cards-heder">
          <h3 class="mb-2" style="text-align: center;">Diluarkelas</h3>
          <p style="text-align: center;">Selamat datang kembali</p>
        </div>
        <div class="cards-body">
          <form id="form-login" action="<?= base_url() ?>cek_login" method="post">
            <div class="form-grp">
              <input type="text" class="controls" placeholder="Ketikan username" id="login_username" value="">
            </div>
            <div class="form-grp">
              <input type="password" class="controls" placeholder="Ketikan password" id="login_password" value="">
            </div>
            <div class="form-grp">
              <button type="button" onclick="login(this)" class="buttons" name="button">Masuk</button>
            </div>
            <div>
              <span style="font-size:14px;">Belum ada akun? <a href="javascript:void(0)" onclick="tampilkanregister()">daftar</a> </span>
            </div>
          </form>
        </div>
      </div>
      <!--daftar:blok-->
      <div class="cards register">
        <div class="cards-heder">
          <div class="cards-heder">
            <h3 class="mb-3" style="text-align: left;">Diluarkelas</h3>
          </div>
        </div>
        <div class="cards-body">
          <form id="form-register" class="" action="<?= base_url() ?>proses_daftar" method="post">
            <div class="form-grp">
              <input type="text" class="controls" placeholder="Nama lengkap" id="reg_nama_lengkap" value="">
            </div>
            <div class="form-grp">
              <input type="text" class="controls" placeholder="username" id="reg_username" value="">
            </div>
            <div class="form-grp">
              <input type="password" class="controls" placeholder="Password baru" id="reg_password" value="">
            </div>
            <div class="form-grp">
              <input type="password" class="controls" placeholder="Ketikan ulang" id="reg_password2" value="">
            </div>
            <div class="form-grp">
              <button type="button" class="buttons" onclick="daftar(this)" name="button">Daftar</button>
            </div>
            <div>
              <span style="font-size:14px;">Sudah ada aku? <a href="#" onclick="tampilkanlogin()">Login</a> </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <link href="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.css" rel="stylesheet">
  <script src="<?= base_url() ?>assets/vendor/Toasty.js/dist/toasty.min.js"></script>
  <script src="<?= base_url() ?>assets/js/auth.min.js"></script>
</div>