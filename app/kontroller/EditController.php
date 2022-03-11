<?php
error_reporting(0);
class EditController extends controller
{
    function __construct()
    {
        session_start();
    }
    public function index()
    {
        header("location:index");
    }
    //proses update akun
    function user_edit()
    {
        $this->lib('session');
        //memanggil librari session
        $session = new session();
        if (!$session->isLogin()) {
            header('location:' . base_url() . '/index');
        }
        $id = $session->sessionGet('id');
        if (isset($_POST['submit'])) {
            $ge = konek()->query("SELECT * FROM user WHERE id='$id'");
            $f = $ge->fetch_object();
            //jika ada foto yang di upload
            //manipulasi foto sebelum di uploda
            //ubah ukuran jadi 80 pixel dan extensi jadi jpg or png
            if($_FILES['foto-profile']['error'] ==0){
                if($_POST['nama'] == ""){
                    $nama = $f->nama;
                }else{
                    $nama = $_POST['nama'];
                }
                //get image mime
                $fileinfo = $_FILES['foto-profile']['type'];

                if($fileinfo == "image/png"){
                    $ds = imagecreatefrompng($_FILES['foto-profile']['tmp_name']);
                }elseif($fileinfo == "image/jpeg" OR $fileinfo == "jpg"){
                    $ds = imagecreatefromjpeg($_FILES['foto-profile']['tmp_name']);
                }elseif($fileinfo == "image/gif"){
                    $ds = imagecreatefromgif($_FILES['foto-profile']['tmp_name']);
                }else{
                    echo "<script>alert('Update gagal format foto tidak di dukung harusnya jpg,png,gif');document.location.href='".base_url()."'</script>";
                }    
                $ss = getimagesize($_FILES['foto-profile']['tmp_name']);

                $yy = $ss[1];
                $xx = $ss[0];
                $fs2 = imagecreatetruecolor(80, 80);
                imagestring($fs2, 2, 22, 22, 'From luarkelas', imagecolorallocate($fs2, 0, 0, 0));
                imagecopyresampled($fs2, $ds, 0, 0, 0, 0, 80, 80, $xx, $yy);
                $names = uniqid().'-'.str_replace(' ', '-', $nama).".jpg";
                imagejpeg($fs2,'images/useravatar/'.$names);
                if(konek()->query("UPDATE user SET nama='$nama',avatar='$names' WHERE id='$id'")){
                    echo "<script>alert('Update data berhasil');document.location.href='".base_url()."'</script>";
                }
                
            }else{
                //jika tidak ada poto profile edit image only
                $nama = $_POST['nama'];
                if($nama == ""){
                    $nama = $f->nama;
                }
                if(konek()->query("UPDATE user SET nama='$nama' WHERE id='$id'")){
                 echo "<script>alert('Update info akun berhasil');document.location.href='".base_url()."'</script>";
             }
         }


     }
 }
}
