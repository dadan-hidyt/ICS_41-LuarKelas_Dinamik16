<?php
//class session
class Session{
  //cek session login
   function isLogin($url = ''){
       if($this->sessionGet('logedin') == true){
           return true;
       }else{
           return false;
       }
   }
   //dapatkan session dengan argument
   function sessionGet($sesname){
       if(array_key_exists($sesname,$_SESSION)){
           if(isset($_SESSION[$sesname])){
               return $_SESSION[$sesname];
           }
       }
   }
}