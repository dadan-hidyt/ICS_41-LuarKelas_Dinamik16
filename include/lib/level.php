<?php
//fungsi membuat point ke level/badge
function pointolevel($poin){
    if($poin >= 0 && $poin < 250){
        $gelar =  '<span class="badge badge-secondary">Pemula</span';
    }elseif($poin > 250 && $poin < 500){
        $gelar =  '<span class="badge badge-primary">Terpelajar</span';
    }elseif($poin > 500 && $poin < 1000){
        $gelar =  '<span class="badge badge-warning">Pakar</span';
    }elseif($poin > 1000 && $poin < 3000){
        $gelar =  '<span class="badge badge-success">Ambisius</span';
    }elseif($poin > 3000 && $poin < 15000){
        $gelar =  '<span class="badge badge-danger">Jenius</span';
    }elseif($poin >= 15000){
        $gelar =  '<span class="badge badge-danger">Sang Jenius</span';
    }    
    return $gelar;
}

?>