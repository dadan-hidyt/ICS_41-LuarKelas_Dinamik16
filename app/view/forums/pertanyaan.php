<?php
//mendapatkan data postingan berdasarkan postingan
$g = konek()->query("SELECT * FROM forums_postingan INNER JOIN user ON forums_postingan.author = user.id WHERE forums_postingan.id_post = '$id'");
if ($g) {
  $row = $g->fetch_object();
}
//mendapatkan komentar
$idp = $row->id_post;

konek()->close();

$k = konek()->query("SELECT * FROM forums_jawaban INNER JOIN user ON user.id = forums_jawaban.dijawab_oleh WHERE forums_jawaban.post_id='$idp'");


?>
<div class="mt-4 container">
  <button class="btn mb-4 bx bx-left-arrow-alt" style="background-color:#f5a352; color:#fff; font-size:20px;" onclick="window.history.back()"></button>
  <div class="row">
    <div class="col-md-5 mb-3">
      <div class="card" style="border:none;">
        <div class="card-body" style="border:none;">
          <?= isset($_SESSION['id']) ? ($_SESSION['id'] == $row->author ? '<b>Pertanyaan Saya</b>' : '<b>Pertanyaan dari&nbsp;:</b> ' . $row->username) : '' ?>
          <hr>

          <?= $row->isi ?>
        </div>
        <div class="container mb-4">
          <?php

          if ($k->num_rows > 0) {
            echo '<span class="badge badge-success">Sudah Terjawab</span>';
          } else {
            echo '<span class="badge badge-warning">Belum Terjawab</span>';
          }

          ?>
        </div>
      </div>
    </div>
    <?php


    if ($k) {
      if ($k->num_rows > 0) {
        $rowk = $k->fetch_object();

    ?>
        <!-- bagian jawaban -->
        <div class="col-md-7 mb-2">
          <div class="card card-body" style="border:none;">
            <div class="head-post">
              <img height="40px" style="border:1px solid #dedede" src="<?= base_url() ?>images/useravatar/<?= $rowk->avatar == null ? 'nophoto.png' : $rowk->avatar ?>">
              <div class="user-info">
                <span><?= $rowk->username ?></span>
                <small><sup> &nbsp;<?= pointolevel($rowk->point) ?></sup></small>
                <div class="waktu" style="position: relative;top: -5px;">
                  <small style="font-size:11px;">
                    <?php
                    //cek apakah yang komen adalah user yang login
                    if (isset($_SESSION['logedin'])) {
                      $sessionid = $_SESSION['id'];
                      if ($rowk->dijawab_oleh == $sessionid) {
                        echo '<span> | Dijawab oleh saya ' . waktu($rowk->tanggal) . '</span>';
                      } else {
                        echo '<span> | Dijawab oleh ' . $rowk->username . waktu($rowk->tanggal) . '</span>';
                      }
                    } else {
                      echo '<span> | Dijawab oleh ' . $rowk->username . waktu($rowk->tanggal) . '</span>';
                    }

                    ?>
                  </small>
                </div>
              </div>

            </div>
            <hr>
            <div class="body-post">
              <p>
                <?=

                $rowk->isi_jawaban;

                ?>
              </p>
            </div>
            <div class="footer-post">
              <span class="badge badge-success">
                Pertanyaan sudah terjawab
              </span>
            </div>
          </div>
          <?php

        } else {
          if (isset($_SESSION) && isset($_SESSION['id'])) {
            if ($_SESSION['id'] == $row->author) {
          ?>
              <div class="col-md-7 mb-2">
                <div class="card card-body">
                  <p>
                  <p class="alert alert-warning">
                    Kamu tidak bisa mejawab postingan kamu sendiri 😰
                  </p>
                  <p class="alert alert-success">
                    Selamat Belajar dan jangan lupa pakai masker 😷
                  </p>
                  </p>
                </div>
              </div>
            <?php
            } else {


            ?>
              <!-- bagian bantu jawaban -->
              <div class="col-md-7 mb-2">
                <div class="card card-body" style="border:none;">
                  <div class="head-post">
                    <img height="40px" style="border:1px solid" src="<?= base_url() ?>images/useravatar/nophoto.png">
                    <div class="user-info">
                      <span>Akun saya</span>
                      <small><sup> &nbsp;<span class="badge badge-danger">Master</span></sup></small>
                      <div class="waktu" style="position: relative;top: -5px;">
                        <small class="waktu-post" style="font-size:11px;">
                          &nbsp;<span class="badge badge-primary">Di jawab oleh saya</span></span>
                        </small>
                      </div>
                    </div>

                  </div>
                  <div class="body-post mt-3">
                    <form id="form_jawab" action="<?= base_url() ?>forum/jawab_postingan" method="post">
                      <input type="hidden" name="postid" value="<?= $row->id_post; ?>">
                      <textarea placeholder="Jawab pertanyaan dari (<?= $row->username ?> ) dan dapatkan <?= $row->poin ?> Poin" name="isi_jawaban" id="" cols="30" rows="4" class="form-control" style="min-height:200px;max-height:200px; font-size:14px;"></textarea>
                    </form>
                  </div>
                  <div class="footer-post">
                    <button type="button" style="background-color:#f5a352;color:#fff;" onclick="jawabpostingan(this)" class="btn  btn-sm mt-4 mb-3">Jawab</button> &nbsp;
                  </div>
                </div>
                <script>
                  function jawabpostingan(ee) {
                    var formss = document.querySelector("#form_jawab")
                    var ajax = new XMLHttpRequest();
                    var data = new FormData(formss);
                    ajax.open(formss.method, formss.action);
                    ajax.responseType = "json";
                    ajax.send(data);
                    ajax.onprogress = function(s) {
                      ee.innerHTML = "Memproses...";
                    }
                    ajax.onload = function(es) {
                      if (es.target.response.status == true) {
                        window.location.reload();
                      }
                    }
                    ajax.onerror = function(ess) {
                      if (ess.target.status == 0) {
                        alert("tidak ada internet");
                      }
                    }
                  }
                </script>
        <?php
            }
          }
        }
      }



        ?>


        <!-- end jawaban -->
              </div>

        </div>
  </div>