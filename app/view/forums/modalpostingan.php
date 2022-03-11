<?php

if (isset($_SESSION['logedin'])) {
?>

  <!-- begin:modal postingan -->
  <div class="col-md-3 sidebar">

    <div class="container buat-postingan">
      <!-- Button trigger modal -->
      <button type="button" style="background-color: #f5a352;color:white;" class="btn  btns modal-button " data-toggle="modal" data-target="#exampleModal">
        Tanya sesuatu
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div style="border-bottom: transparent;" class="modal-header">
              <!-- <h5 class="modal-title" id="exampleModalLabel">Ragu dengan Jawabamu?</h5> -->

              <h4>Ajukan Pertanyaan</h4>
            </div>

            <div class="modal-body">
              <!-- form postingan -->
              <form id="form-post" method="POST" action="<?= base_url() ?>forum/posting">
                <div class="box-textarea" style="background-color:#ebf2f7; width:100%;
                padding:1vw; border-radius:10px;">
                  <textarea style="border:none; background-color:transparent;" class="textarea" placeholder="Tanya aja.." name="isi" maxlength="255"></textarea>
                </div>

                <div class="boxs-option">
                  <label for="" class="bungkus">
                    <select style="padding: 0px;color:black;outline:none;border:none;background:transparent;" name=" poin" id="">
                      <option style="color:white;" value="-">-Point-</option>
                      <?php

                      for ($i = 0; $i <= 50; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                      }

                      ?>
                    </select>
                  </label>
                  &nbsp;&nbsp;&nbsp;
                  <label for="kategori" class=" bungkus kategori">
                    <select style="padding: 0px;color:black;outline:none;border:none;background:transparent;" name="kategoripost" id="kategori-pembahasan">
                      <option value="">-Pilih kategori--</option>
                      <?php
                      //mengambil kategori
                      $ak = mysqli_query(konek(), "SELECT * FROM forums_kategori");
                      if ($ak) {
                        if (mysqli_num_rows($ak) > 0) {
                          while ($ass = mysqli_fetch_assoc($ak)) {
                      ?>
                            <option value="<?= $ass['kategory_name'] ?>"><?= $ass['kategory_name'] ?></option>

                      <?php
                          }
                          echo '</select>';
                        }
                      }

                      ?>
                  </label>
                </div>
              </form>
            </div>
            <div style="border-top: transparent;" class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" onclick="posting(this)" class="btn btn-post">Posting</button>
            </div>
          </div>
        </div>
        <!-- fungsi untuk mempost -->
        <script>
          function posting(ev) {
            var form = document.querySelector("#form-post");
            var data = new FormData(form);
            var ajax = new XMLHttpRequest();
            ajax.open(form.method, form.action);
            ajax.responseType = "json"
            ajax.send(data)
            ajax.onprogress = function() {
              ev.innnerText = "plase wait...";
            }
            ajax.onload = function(e) {
              if (e.target.response.status == true) {
                ev.innerHTML = "suksess..."
                location.reload()
              } else {
                swal('Kesalahan', e.target.response.message);
              }
            }
          }
        </script>

      </div>
    </div>


  <?php
} else {
  ?>
    <!-- begin:modal postingan -->
    <div class="col-md-3 sidebar">

      <div class="container buat-postingan">
        <!-- Button trigger modal -->
        <button onclick="alert('Silahkan login dulu untuk menggunakan fitur ini')" type="button" style="background-color: #f5a352;" class="btn btns btn-primary modal-button " data-toggle="modal" data-target="#exampleModal">
          Tanya sesuatu
        </button>

        <!-- Modal -->


      <?php
    }


      ?>