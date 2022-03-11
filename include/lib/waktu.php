<?php 
//fungsi waktu postingan
function waktu($waktu){
	date_default_timezone_set('asia/jakarta');
	$dateSekarang = new DateTime();
	$waktulalu = date_create($waktu);

	$diff = $dateSekarang->diff($waktulalu);

	if($diff->y > 0){
		echo $diff->y .' Tahun yg Lalu';
	}elseif($diff->m > 0){
		echo $diff->m .' Bulan yg Lalu';
	}elseif($diff->d > 0){
		echo $diff->d .' Hari yg Lalu';
	}elseif($diff->h > 0){
		echo $diff->h.' Jam yg Lalu';
	}elseif($diff->i > 0){
		echo $diff->i.' Menit yg Lalu';
	}elseif($diff->s > 0){
		echo $diff->s.' Detik yg Lalu';
	}else{
		echo 'Baru saja';
	}

}

?>