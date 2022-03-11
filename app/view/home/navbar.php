<!-- === navbar === -->
<style>
  .nav-link.i:hover::after {
    display: none;

  }
</style>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container">
    <a class="navbar-brand" href=""><img width="40px" src="<?= base_url() ?>assets/img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <i class='bx bx-menu-alt-right'></i>
    </button>
    <?php
    //get data user login
    //jika user sudah login tampilkan info user
    if ($session->isLogin()) {
      $id_s = $session->sessionGet("id");
      $getuser = konek()->query("SELECT * FROM user WHERE id='$id_s'");
      $r = $getuser->fetch_object();
      if ($r->avatar == null) {
        $avatar = "nophoto.png";
      } else {
        $avatar = $r->avatar;
      }
    ?>
      <div class="profil-icon">
        <div class="dropdown show">
          <img src="<?= base_url() ?>images/useravatar/<?= $avatar ?>" style="width:60px; height: 50px; border-radius:50%;" class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
          <div class="dropdown-menu profil-info" style="margin-left: -145px !important;" aria-labelledby="dropdownMenuLink">
            <div class="profil-img mt-2 text-center" style="display: flex; flex-direction: column; align-items: center;">
              <img src="<?= base_url() ?>images/useravatar/<?= $avatar ?>" style="width:70px; height: 70px; border-radius:40px;">
              <span class="mt-3 mb-0" style="font-size: 14px;">
                <?php echo pointolevel($r->point); ?> <br><br>
                <?php echo $r->nama ?>
              </span>
              <b style="font-size: 12px; margin-bottom: -10px;">Poin : <?php echo $r->point ?></b>
            </div>
            <hr>
            <a href="javascript:void(0)" data-toggle="modal" data-target="#account" class="dropdown-item" style="margin-top: -10px; display: flex; align-items: center; font-size: 14px;"> <i class='bx bx-user mr-2'></i> Info akun</a>
            <a onclick="return confirm('apakah anda yakin ingin keluar')" href="<?= base_url() ?>logout" class="dropdown-item " style=" display: flex; align-items: center; font-size: 14px;"> <i class='bx bx-log-out mr-2 '></i> Log-out</a>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="#profil-sekolah">Tentang</a>
        <a class="nav-item nav-link" href="#tanya-aja">Forum</a>
        <a class="nav-item nav-link" href="#tanya-aja">Cari peta</a>
        <a class="nav-item nav-link" href="#faqs">Faqs</a>
        <?php
        if ($session->isLogin()) {
          $sessionid = $session->sessionGet('id');
          //mendapatkan info akun user yang sudah login
          $getUserLogin = konek()->query("SELECT * FROM user WHERE id='$sessionid'");
          $row = $getUserLogin->fetch_object();
          //jika avatar user kosong atau null gunakan avatar default
          if ($row->avatar == null) {
            $avatar = "nophoto.png";
          } else {
            $avatar = $row->avatar;
          }
        ?>
          <div class="profil-icon1">
            <div class="dropdown show">
              <img id="img-profile1" src="<?php echo base_url() ?>images/useravatar/<?php echo $avatar ?>" width="60px" height="50px" style="border-radius:100%;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <div class="dropdown-menu profil-info-desk" aria-labelledby="dropdownMenuLink">
                <div class="profil-img mt-2 text-center" style="display: flex; flex-direction: column; align-items: center;">
                  <img src="<?php echo base_url() ?>images/useravatar/<?php echo $avatar ?>" width="80px" height="70px" style="border-radius:100%;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                  <span class="mt-3 mb-0" style="font-size: 14px;">
                    <?php echo pointolevel($row->point); ?> <br><br>
                    <?php echo $row->nama ?>
                  </span>
                  <b style="font-size: 12px; margin-bottom: -10px;">Poin : <?php echo $row->point ?></b>
                </div>
                <hr>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#account" class="dropdown-item" style="margin-top: -10px; display: flex; align-items: center; font-size: 14px;"> <i class='bx bx-user mr-2'></i> Info akun</a>
                <a onclick="return confirm('apakah anda yakin ingin keluar')" href="<?= base_url() ?>logout" class="dropdown-item " style=" display: flex; align-items: center; font-size: 14px;"> <i class='bx bx-log-out mr-2 '></i> Log-out</a>
              </div>
            </div>
          </div>
      </div>
    <?php
        } else {
    ?>
      <a class="btn btn" style="background-color: #00fa9a;" href="<?= base_url() ?>auth">Login</a>
    <?php
        }
    ?>

    <!-- end dropdown user -->
    </div>
  </div>
  </div>
</nav>
<?php

if ($session->isLogin()) {
?>

  <div class="modal editakun fade col-md-3 offset-md-4 text-center" id="account" tabindex="-1" role="dialog" aria-labelledby="titel" aria-hidden="true">

    <div class="modal-dialog" role="document">
      <div style="border-radius: 2px;" class="modal-content">
        <div style="border-bottom: 0;" class="modal-header">
          <div class="modal-title" id="titel">
            <h5> Informasi Akun</h5>
          </div>
        </div>
        <div class="modal-body">
          <div class="box-info-profil">

            <div class="img-profil-info">
              <img id="img-profile2" src="<?php echo base_url() ?>images/useravatar/<?php echo $avatar ?>" width="120px" style="border-radius:100%;object-fit:cover;" class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
              <br>
              <form action="<?php echo base_url(); ?>edit/user_edit" onsubmit="updateprofilephoto(this)" method="post" enctype="multipart/form-data" id="formkuupdate">
                <label for="input-foto">
                  <span class="btn btn-link">Ubah foto profil</span>
                  <input type="file" style="display:none;" name="foto-profile" onchange='previews(event)' id="input-foto">
                </label>
                <script>
                  //preview images
                  function previews(e) {
                    var as1 = document.querySelector("#img-profile1");
                    var as2 = document.querySelector("#img-profile2");

                    as1.src = URL.createObjectURL(e.target.files[0]);
                    as2.src = URL.createObjectURL(e.target.files[0]);

                  }
                </script>
            </div>
            <div class="ganti-info-akun">
              <label for="nama">
                <input id="input-ubah-nama" placeholder="Ubah nama" type="text" name="nama" style="outline:none;font-size:14px;border:none;padding:6px;border-radius: 5px; background-color: rgba(64, 224, 208, 0.191);">
              </label>
              <br>
              <label for="nama">
            </div>
            <div class="save-info-akun">
              <a href="#" class="btn btn-tutup btn-sm" data-dismiss="modal" style="color:#fff;background-color:#f5a352;"> Close</a>
              <button type="submit" name="submit" class="posting-pertanyaan  btn btn-sm" style="color:#fff;
              background-color: #00fa9a;">Simpan Perubahan</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}


?>