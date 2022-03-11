<?php

/**
 * @author dadan,ahmad,rafly 
 */
defined("PATH") or die("Tidak ada akses ngab");
class ForumController extends controller
{
    //method contruct
    function __construct()
    {
        session_start();
    }
    function headerwithnavbar($title)
    {
        $this->lib('level');
        $this->view("template/header", ['title' => 'LuarKelas | Forums']);
        $this->lib("session");
        $session = new session();
        $this->view('forums/navigation', ['session' => $session, 'title' => $title]);
    }
    //halaman utama forums
    function index()
    {
        $leaderboard = $this->leaderboard();
        $this->headerwithnavbar("Forum belajar");
        $this->view("forums/index");
        $this->view('forums/postingan');
        $this->view("forums/modalpostingan");
        $this->view('forums/leaderboard', ['leaderboarddata' => $leaderboard]);
        $this->view('template/footer');
    }
    //menghapus postingan user
    function delete()
    {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id_post'])) {
                $idpost = $_POST['id_post'];
                if (isset($_SESSION['logedin'])) {
                    $session = $_SESSION['id'];
                    $g = konek()->query("SELECT * FROM forums_postingan INNER JOIN user ON user.id = forums_postingan.author WHERE forums_postingan.id_post='$idpost'");
                    $h = $g->fetch_object();
                    if ($session == $h->author) {
                        if (konek()->query("DELETE FROM forums_postingan WHERE id_post='$idpost'")) {
                            konek()->query("DELETE FROM forums_jawaban WHERE post_id='$idpost'");
                            print json_encode(['success' => true]);
                        }
                    }
                } else {
                    print json_encode(['success' => true]);
                }
            }
        }
    }
    //fungsi menjawab postingan
    function jawab_postingan()
    {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $this->lib('session');
            $sessi = new session();
            $Postid = $_POST['postid'];
            $isi = $_POST['isi_jawaban'];
            $dijawaboleh = $sessi->sessionGet('id');

            $gch = konek()->query("SELECT * FROM forums_postingan WHERE id_post='$Postid'");
            $row = $gch->fetch_object();
            $tanggal = date("Y-m-d H:i:s");
            $poin = $row->poin;
            if (konek()->query("INSERT INTO forums_jawaban (post_id,dijawab_oleh,isi_jawaban,tanggal) VALUES ('$Postid','$dijawaboleh','$isi','$tanggal')")) {
                konek()->query("UPDATE user SET point = user.point+'$poin' WHERE id='$dijawaboleh'");
                print json_encode(['status' => true, 'message' => 'Anda berhasil menjawab pertanyaan,, Dan point anda bertambah']);
            }
        } else {
            header('location:forum');
        }
    }
    //fungsi menjawab postingan
    function q($id)
    {
        $this->lib('waktu');
        $konek = konek();
        if ($getpost = $konek->query("SELECT * FROM forums_postingan WHERE id_post='$id'")) {
            if ($getpost->num_rows > 0) {
                $this->headerwithnavbar("Forum belajar");
                $this->view('forums/pertanyaan', ['id' => $id]);
                $this->view('template/footer');
            } else {
                header('location:' . base_url() . 'forum');
            }
        }
    }
    //method
    function tag_popular($slug)
    {
        $konek = konek();
        // $get;
    }
    //method leaderboard
    function leaderboard()
    {
        $konek = konek();
        //mendapatkan user dengan poin terbesar
        $get = "SELECT * FROM user ORDER BY `point` DESC LIMIT 5";
        if ($gets = $konek->query($get)) {
            if ($gets->num_rows > 0) {
                while ($as = $gets->fetch_object()) {
                    $data[] = $as;
                }
                return $data;
            }
        } else {
            echo 'string';
        }
    }
    //fungsi  postingan

    function getPost()
    {
        $this->lib('level');
        $this->lib("session");
        $this->lib("waktu");
        $session = new session();
        $id = $session->sessionGet('id');

        $konek = konek();
        if ($getpost = $konek->query("SELECT * FROM forums_postingan INNER JOIN user on forums_postingan.author = user.id ORDER BY forums_postingan.id_post desc")) {
            if ($getpost->num_rows > 0) {
                while ($aa = $getpost->fetch_object()) {
?>
                    <div class="card card-post">
                        <div class="head-post">
                            <img width="50px" height="40px" class="img-responsive" style="border:1px solid #000" src="<?= base_url() ?>images/useravatar/<?= $aa->avatar == null ? 'nophoto.png' : $aa->avatar ?>">
                            <div class="user-info">
                                <?= $aa->author == $id ? '<span>Saya</span>' : '<span> ' . $aa->username . '</span>' ?>
                                <small><sup> &nbsp;<?= pointolevel($aa->point) ?></sup></small>
                                <div class="waktu" style="position: relative;top: -5px;">
                                    <small class="waktu-post" style="font-size:11px;">
                                        &nbsp;<?= waktu($aa->date) ?><span class="span"> | <?= $aa->tag == "" ? "Semuanya" : $aa->tag ?></span>
                                    </small>
                                </div>
                            </div>

                        </div>
                        <div class="body-post">
                            <?php
                            echo '<p>' . $aa->isi . '</p>';
                            ?>
                        </div>
                        <div class="footer-post">
                            <?php
                            $idp = $aa->id_post;
                            $k = konek()->query("SELECT * FROM forums_jawaban INNER JOIN user ON user.id = forums_jawaban.dijawab_oleh WHERE forums_jawaban.post_id='$idp'");
                            if ($k->num_rows > 0) {
                                if (isset($_SESSION['id'])) {
                                    echo '<span class="badge badge-success">Terjawab</span><br>';
                                    if ($id == $aa->author) {
                                        echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-primary btn-sm mt-2 mb-2">Lihat Jawaban</a> &nbsp;';
                                    } else {
                                        echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-sm mt-2 mb-3 " style="color:#fff;background-color:#f5a352;"> Lihat Jawaban</span></a>';
                                    }
                                } else {
                                    echo '<p class="alert alert-warning">Login dulu untuk membantu dan melihat jawaban ini</p>';
                                }
                            } else {
                                if (isset($_SESSION['id'])) {
                                    if ($id == $aa->author) {
                                        echo '<span class="badge badge-secondary mb-3">Belum terjawab</span><br>';
                                    } else {
                                        echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-sm mt-2 mb-3  " style="background-color:#f5a352; color:#fff;">Jawab<span class="badge badge-red">' . $aa->poin . '</span></a>';
                                    }
                                } else {
                                    echo '<p class="alert alert-warning">Login dulu untuk membantu jawab postingan ini</p>';
                                }
                            }

                            ?>

                        </div>
                    </div>

                <?php
                }
            } else {
                echo 'Belum ada postingan';
            }
        } else {
            echo $konek->error;
        }
    }
    //fungsi posting
    function posting()
    {
        $this->lib("session");
        $session = new session();
        $id = $session->sessionGet('id');
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $isipostingan = htmlentities($_POST['isi'], ENT_QUOTES, 'utf-8');
            $point = $_POST['poin'];
            $kategori = $_POST['kategoripost'];
            $waktu = date("Y-m-d H:i:s");
            if ($isipostingan == "") {
                print json_encode(['status' => false, 'message' => 'Anda belum menulis apapun']);
                exit;
            } elseif ($kategori == "") {
                print json_encode(['status' => false, 'message' => 'Silahkan pilih kategori dulu']);
            } else {
                if (konek()->query("INSERT INTO forums_postingan (author,isi,tag,date,poin) VALUES ('$id','$isipostingan','$kategori','$waktu','$point')")) {
                    print json_encode(['status' => true, 'message' => 'berhasil']);
                }
            }
        }
    }
    //fungsi postingan saya
    function postingansaya()
    {
        $this->lib('level');
        $this->lib("session");
        $session = new session();
        if (!$session->isLogin()) {
            echo '<p class="alert alert-danger">Silahkan login untuk mengakses halaman ini</p>';
            return;
        }
        $id = $session->sessionGet('id');
        $konek = konek();
        if ($getpost = $konek->query("SELECT * FROM forums_postingan INNER JOIN user on forums_postingan.author = user.id WHERE user.id = $id ORDER BY forums_postingan.id_post desc")) {
            if ($getpost->num_rows > 0) {
                echo '<p>' . $getpost->num_rows . ' Pertanyaan</p>';
                while ($aa = $getpost->fetch_object()) {
                ?>
                    <div class="card card-post">
                        <div class="head-post">
                            <img width="50px" height="40px" class="img-responsive" style="border:1px solid #000" src="<?= base_url() ?>images/useravatar/<?= $aa->avatar == null ? 'nophoto.png' : $aa->avatar ?>">
                            <span><?= $aa->username ?></span>
                            <small><sup> &nbsp;<?= pointolevel($aa->point) ?></sup></small>
                        </div>
                        <div class="body-post">
                            <p><?= $aa->isi ?> </p>
                            <?php
                            $idp = $aa->id_post;
                            $jawaban = konek()->query("SELECT * FROM forums_jawaban INNER JOIN user ON user.id = forums_jawaban.dijawab_oleh WHERE forums_jawaban.post_id='$idp'");
                            if ($jawaban->num_rows > 0) {
                                $jwbn = $jawaban->fetch_object();
                                echo "<p class='card card-body'>
                                    <b>Jawaban dari " . $jwbn->username . ": </b>
                                        " . $jwbn->isi_jawaban . "
                                    </p>";
                            } else {
                                echo "<span class='badge badge-warning'>Belum ada yang menjawab</span>";
                            }

                            ?>
                        </div>
                        <div class="footer-post">
                            <?php
                            echo '<a href="javascript:void(0)" onclick="hapuspostingan(this)" data-post="' . $idp . '" class="btn btn-danger btn-sm mt-2 mb-2">Hapus</a> &nbsp;';
                            ?>
                        </div>

                    </div>

                    <?php
                }
            } else {
                echo 'Anda nampaknya belum memposting sesuatu...';
            }
        } else {

            echo $konek->error;
        }
    }

    //fungsi live search
    function livesearch()
    {
        if (isset($_POST['keywords']) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $keywords = $_POST['keywords'];
            $this->lib('level');
            $this->lib("session");
            $this->lib("waktu");
            $session = new session();
            $id = $session->sessionGet('id');

            $konek = konek();
            if ($getpost = $konek->query("SELECT * FROM forums_postingan INNER JOIN user on forums_postingan.author = user.id WHERE (user.username LIKE '%" . $keywords . "%') OR (forums_postingan.isi LIKE '%" . $keywords . "%') OR (forums_postingan.tag LIKE '%" . $keywords . "%')  ORDER BY forums_postingan.id_post desc")) {
                if ($getpost->num_rows > 0) {
                    while ($aa = $getpost->fetch_object()) {
                    ?>
                        <div class="card card-post">
                            <div class="head-post">
                                <img width="50px" height="40px" class="img-responsive" style="border:1px solid #000" src="<?= base_url() ?>images/useravatar/<?= $aa->avatar == null ? 'nophoto.png' : $aa->avatar ?>">
                                <div class="user-info">
                                    <?= $aa->author == $id ? '<span>Saya</span>' : '<span> ' . $aa->username . '</span>' ?>
                                    <small><sup> &nbsp;<?= pointolevel($aa->point) ?></sup></small>
                                    <div class="waktu" style="position: relative;top: -5px;">
                                        <small class="waktu-post" style="font-size:11px;">
                                            &nbsp;<?= waktu($aa->date) ?><span class="span"> | <?= $aa->tag == "" ? "Semuanya" : $aa->tag ?></span>
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <div class="body-post">
                                <?php
                                echo '<p>' . $aa->isi . '</p>';
                                ?>
                            </div>
                            <div class="footer-post">
                                <?php
                                $idp = $aa->id_post;
                                $k = konek()->query("SELECT * FROM forums_jawaban INNER JOIN user ON user.id = forums_jawaban.dijawab_oleh WHERE forums_jawaban.post_id='$idp'");
                                if ($k->num_rows > 0) {
                                    if (isset($_SESSION['id'])) {
                                        echo '<span class="badge badge-success">Terjawab</span><br>';
                                        if ($id == $aa->author) {
                                            echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-primary btn-sm mt-2 mb-2">Lihat Jawaban</a> &nbsp;';
                                        } else {
                                            echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-sm mt-2 mb-3 btn-primary">Lihat Jawaban</span></a>';
                                        }
                                    } else {
                                        echo '<p class="alert alert-warning">Login dulu untuk membantu jawab postingan ini</p>';
                                    }
                                } else {
                                    if (isset($_SESSION['id'])) {
                                        if ($id == $aa->author) {
                                            echo '<span class="badge badge-secondary mb-3">Belum terjawab</span><br>';
                                        } else {
                                            echo '<a href="' . base_url() . 'forum/q/' . $aa->id_post . '" class="btn btn-sm mt-2 mb-3 btn-primary">Jawab <span class="badge badge-red">' . $aa->poin . '</span></a>';
                                        }
                                    } else {
                                        echo '<p class="alert alert-warning">Login dulu untuk membantu jawab postingan ini</p>';
                                    }
                                }

                                ?>

                            </div>
                        </div>

<?php
                    }
                } else {
                    echo 'Tidak ada postingan dengan keywords ' . $keywords;
                }
            } else {
                echo $konek->error;
            }
        } else {
            header('location:' . base_url() . 'forum');
        }
    }
}

?>