<!-- tab content -->
<div class="tab-content" id="pills-tabContent">
  <!-- home -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- box postingan -->
    <div id="boxpostingan" class="potingan">

    </div>
  </div>

  <!-- postingan saya -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

    <div id="postingansaya" class="postingan">

    </div>
  </div>

</div>

</div>
</div>

<!-- script postingan -->
<script type="application/javascript">
  //delete post function
  function hapuspostingan(e) {
    var c = confirm("apakah anda yakin ingin menghapus postingan ini?")
    if (c == true) {
      var datapost = e.getAttribute('data-post');
      var xhr = new XMLHttpRequest();
      var data_a = new FormData();
      data_a.append('id_post', datapost);
      xhr.open('POST', 'forum/delete');
      xhr.responseType = "json"
      xhr.send(data_a);
      xhr.onprogress = function(es) {
        e.innerHTML = "Memproses..."
      }
      xhr.onload = function(ee) {
        if (ee.target.response.success == true) {
          alert("Pertanyaan berhasil di hapus")
          document.location.reload();
        } else {
          alert("data gagal dihapus")
        }
      }

    } else {
      return false;
    }
  }
  //fungsi live search
  function caripostingan(values) {

    var xhr = new XMLHttpRequest();
    let fd = new FormData();
    fd.append('keywords', values.value);
    var boxposts = document.querySelector('#boxpostingan');
    xhr.open('POST', 'forum/livesearch');
    xhr.send(fd);
    xhr.onprogress = function() {
      boxposts.innerHTML = "mencari...."
    }
    xhr.onload = function(e) {
      boxposts.innerHTML = e.target.responseText;
    }
  }

  //fungsi mendapatkan semua postingan
  function dapatkanpostingan() {
    var boxpost = document.querySelector('#boxpostingan');
    boxpost.innerHTML = "Memuat postingan...";
    ajax = new XMLHttpRequest();
    ajax.open("GET", 'forum/getpost');
    ajax.send();
    ajax.onload = function(e) {
      boxpost.innerHTML = e.target.responseText;
    }
    ajax.onprogress = function(e) {
      boxpost.innerHTML = "Memuat postingan...."
    }
  }
  //fungsi mendapatkan postingan saya
  function dapatkanpostingansaya() {
    var boxpost = document.querySelector('#postingansaya');
    boxpost.innerHTML = "Memuat postingan...";
    ajax = new XMLHttpRequest();
    ajax.open("GET", 'forum/postingansaya');
    ajax.send();
    ajax.onload = function(e) {
      boxpost.innerHTML = e.target.responseText;
    }
    ajax.onprogress = function(e) {
      boxpost.innerHTML = "Memuat postingan...."
    }
  }
  //jika halaman di load tampilkan postingan 
  //dan postingan saya
  window.onload = function() {
    dapatkanpostingan();
    dapatkanpostingansaya();

  }
</script>