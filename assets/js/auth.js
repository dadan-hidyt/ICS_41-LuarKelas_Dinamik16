var options = {
    // STRING: main class name used to styling each toast message with CSS:
    // .... IMPORTANT NOTE:
    // .... if you change this, the configuration consider that you´re
    // .... re-stylized the plug-in and default toast styles, including CSS3 transitions are lost.
    classname: "toast",
    // STRING: name of the CSS transition that will be used to show and hide all toast by default:
    transition: "pinItDown",
    // BOOLEAN: specifies the way in which the toasts will be inserted in the HTML code:
    // .... Set to BOOLEAN TRUE and the toast messages will be inserted before those already generated toasts.
    // .... Set to BOOLEAN FALSE otherwise.
    insertBefore: true,
    // INTEGER: duration that the toast will be displayed in milliseconds:
    // .... Default value is set to 4000 (4 seconds).
    // .... If it set to 0, the duration for each toast is calculated by text-message length.
    duration: 3000,
    // BOOLEAN: enable or disable toast sounds:
    // .... Set to BOOLEAN TRUE  - to enable toast sounds.
    // .... Set to BOOLEAN FALSE - otherwise.
    // NOTE: this is not supported by mobile devices.
    enableSounds: true,
    // BOOLEAN: enable or disable auto hiding on toast messages:
    // .... Set to BOOLEAN TRUE  - to enable auto hiding.
    // .... Set to BOOLEAN FALSE - disable auto hiding. Instead the user must click on toast message to close it.
    autoClose: true,
    // BOOLEAN: enable or disable the progressbar:
    // .... Set to BOOLEAN TRUE  - enable the progressbar only if the autoClose option value is set to BOOLEAN TRUE.
    // .... Set to BOOLEAN FALSE - disable the progressbar.
    progressBar: true,
    // IMPORTANT: mobile browsers does not support this feature!
    // Yep, support custom sounds for each toast message when are shown if the
    // enableSounds option value is set to BOOLEAN TRUE:
    // NOTE: the paths must point from the project's root folder.
    sounds: {
      info: "assets/vendor/Toasty.js/dist/sounds/info/1.mp3",
        // path to sound for successfull message:
        success: "assets/vendor/Toasty.js/dist/sounds/success/1.mp3",
        // path to sound for warn message:
        warning: "assets/vendor/Toasty.js/dist/sounds/warning/1.mp3",
        // path to sound for error message:
        error: "assets/vendor/Toasty.js/dist/sounds/error/1.mp3",
      },

    // callback:
    // onShow function will be fired when a toast message appears.
    onShow: function (type) {},

    // callback:
    // onHide function will be fired when a toast message disappears.
    onHide: function (type) {},

    // the placement where prepend the toast container:
    prependTo: document.body.childNodes[0]
  };

// more js code...
var toast = new Toasty(options);

function $(selector){
  return document.querySelector(selector);
}
var ajax = new XMLHttpRequest();
let form_login = $("#form-login");
let form_register = $("#form-register")
  //logika login
  function login(e){
    e.innerHTML = "loading.."
    var username = form_login.querySelector('#login_username')
    var password = form_login.querySelector('#login_password')

    if(username.value == "" && password.value == ''){
      toast.warning("Username dan password tidak boleh kosong")
      username.classList.add('_danger')
      password.classList.add('_danger')
      e.innerHTML = "Masuk"
    }else if(username.value == "" && password.value != ''){
      toast.warning("Username tidak boleh kosong")
      username.classList.add('_danger')
      password.classList.remove('_danger')
      e.innerHTML = "Masuk"
    }else if(password.value == "" && username.value != ''){
      toast.warning("password tidak boleh kosong")
      password.classList.add('_danger')
      username.classList.remove('_danger')
      e.innerHTML = "Masuk"
    }else{
      password.classList.remove('_danger')
      username.classList.remove('_danger')
      //logika login
      let url = form_login.action;
      let method = form_login.method.toUpperCase();
      let data = new FormData()
      data.append('username',username.value);
      data.append('password',password.value);

      ajax.open(method,url);
      ajax.responseType = 'json';
      ajax.send(data)
      ajax.onload = function(a){
        let response = a.target.response;
        if(response !== null){
          if(response.error == 0){
            toast.success('Selamat datang kembali,, Anda berhasil login')
            e.innerHTML = "Login berhasil...";
            var link = response.link;
            setTimeout(function(){
              window.location.href=`${link}`;
            },2000)

          }else{
            toast.error(response.message);
            e.innerHTML = "Masuk";
          }
        }
      }
      ajax.onerror = function(e){
        if(e.target.status == 0){
          alert("error Periksa koneksi internet anda")
          e.innerHTML = "Masuk";
        }
      }
    }
  }

  //logika daftar
  //jika user mengklik tombol daftar
  function daftar(e){
    //masukan data yang di ketikan user pada variabel
    let nama_lengkap = form_register.querySelector("#reg_nama_lengkap");
    let reg_username = form_register.querySelector("#reg_username");
    let reg_password = form_register.querySelector("#reg_password");
    let reg_password2 = form_register.querySelector("#reg_password2");
    //memvalidasi inputan yang di ketikan user 
    if(nama_lengkap.value == '' && reg_username.value =='' && reg_password.value == '' && reg_password2.value ==''){
      nama_lengkap.classList.add("_danger");
      reg_username.classList.add("_danger");
      reg_password.classList.add("_danger");
      reg_password2.classList.add("_danger");
    }else if(reg_username.value == ''){
      reg_username.classList.add("_danger");
    }else if(reg_password.value == ''){
      reg_password.classList.add("_danger");
    }else if(reg_password2.value == ''){
      reg_password2.classList.add("_danger");
    }else{
      nama_lengkap.classList.remove("_danger");
      reg_username.classList.remove("_danger");
      reg_password.classList.remove("_danger");
      reg_password2.classList.remove("_danger");
      if(reg_password2.value != reg_password.value){
        toast.warning("Kata sandi tidak cocok dengan yang sebelumnya!")
        reg_password.classList.add("_danger");
        reg_password2.classList.add("_danger");
      }else{
        reg_password.classList.remove("_danger");
        reg_password2.classList.remove("_danger");
        let reglink = form_register.action;
        let regmethod = form_register.method.toUpperCase()
        let regdata = new FormData();
        regdata.append('fullname',nama_lengkap.value);
        regdata.append('username',reg_username.value);
        regdata.append('password',reg_password.value);
        regdata.append('password2',reg_password2.value);
        ajax.open(regmethod,reglink);
        ajax.responseType= 'json';
        ajax.onprogress = function(){
          e.innerHTML = "Plase Wait..."
        }
        ajax.send(regdata)
        ajax.onload = function(a){
          let response = a.target.response;
          console.log(response.error)
          if(response.error == 0){
            toast.success(response.message);
            e.innerHTML = response.message;
            setTimeout(function(){
              window.location.href = response.link;
            },3000)
          }else if(response.error == 1){
            e.innerHTML = "Daftar";
            toast.warning(response.message);
          }
        }
      }
    }
  }

  //script js untuk mengubah mode register dan mode login
  //fungsi untuk menampilkan halaman register
  function tampilkanregister(){
    document.title = "Register";
    document.querySelector(".register").style.left = '0';
    document.querySelector(".container-auth").style.height = '520px';
    document.querySelector(".login").style.left = '-2000px';
  }
  //funsgi untuk menampilkan halaman login
  function tampilkanlogin(){
    document.title = "login"
    document.querySelector(".register").style.left = '820px';
    document.querySelector(".login").style.left = '0';
    document.querySelector(".container-auth").style.height = '400px';
  }