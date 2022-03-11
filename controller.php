<?php
//file controller
class controller{
    function view($viewname,$model = []){
      extract($model);
      include 'app/view/'.$viewname.'.php';
    }
    function model($model){
      
      include 'app/model/'.$model.'.php';
      return new $model;
    }
    function lib($libname){
      include 'include/lib/'.$libname.'.php';
    }
    function helper($filename){
      include 'include/pembantu/'.$filename.'.php';
    }
}
