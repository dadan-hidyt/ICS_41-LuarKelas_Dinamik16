<?php
//class route
class route{
    public static $route;
  
    public static function add( $method,$path,$controller,$function ){
       self::$route[] = array(
         "path"=>$path,
         "method"=>$method,
         "controller"=>$controller,
         "function"=>$function,
       );
    }
    //mengantur controller dan method
    public static function run(){
      $path = "/";
      if(isset($_SERVER['PATH_INFO'])){
        $path  = $_SERVER['PATH_INFO'];
      }
      $path = rtrim($path,'/');
      for($i =0;$i < count(self::$route);$i++){
       $regek =  "#^".rtrim(self::$route[$i]['path'])."$#";
       if(preg_match($regek,$path,$variabel)){
         $controller = self::$route[$i]['controller'];
         $function = self::$route[$i]['function'];
         include PATH.'/app/kontroller/'.$controller.'.php';
         $class = new $controller;
         if(method_exists($class,$function)){
           $function = $function;
         }else{
           $function = 'index';
         }
         array_shift($variabel);
         call_user_func_array([$class,$function],$variabel);
         return;
         exit;
       }
      }
      http_response_code(404);
      die(file_get_contents('404.html'));


    }

}
