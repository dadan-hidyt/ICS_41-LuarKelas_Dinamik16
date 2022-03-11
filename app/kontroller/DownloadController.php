<?php
//fungsi downlaod file roadmap
class DownloadController{
	function zona_download($ee){
		konek()->query("UPDATE roadmap SET jumlah_download=jumlah_download+1 WHERE file='$ee'");
		$extension = pathinfo($ee,PATHINFO_EXTENSION);
		if($extension == 'pdf'){
			$s = konek()->query("SELECT file FROM roadmap WHERE file='$ee'");
			$r = $s->fetch_object();
			header('Content-Type:octet/stream');
			header("Pragma:private");
			header("Expires:0");
			header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
			header('Cache-Control:private',false);
			header("Content-Type:application/pdf");
			header("Content-Disposition:attachment;filename=".$r->file.';');
			header("Content-Transfer-Encoding:binary");
			header('Content-Length:'.filesize('files/pdf/'.$r->file));
			readfile('files/pdf/'.$r->file);
			exit();
		}
	}
}
?>
