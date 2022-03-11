<?php

define("PATH", dirname(__FILE__));
#mengecek dulu versi php yang di gunakan
// if (version_compare('5.5', '7.4.1', '<')) {
//   die("Sorry ngab versi php kamu terlalu lama! Update dulu sono ke versi 7.4");
// }
#memanggil file file yang dibutuhkan
include PATH . "/config/config.php";
include PATH . "/config/database.php";
include PATH . '/include/lib/mysql.php';
include PATH . '/route.php';
include PATH . '/controller.php';
//fungsi membuat url otomatis
function base_url()
{
  $path = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
  $path .= '://' . $_SERVER['HTTP_HOST'];
  return $path . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
}
#Mengatur route
/**
 * index
 */
route::add("GET", '', 'HomeController', 'index');
route::add("GET", '/index', 'HomeController', 'index');
/**
 * auth
 * cek_login
 * proses_login
 * proses_daftar
 * logout
 */
route::add("GET", '/auth', 'AuthController', 'auth');
route::add("POST", '/cek_login', 'AuthController', 'cek_login');
route::add("POST", '/proses_daftar', 'AuthController', 'proses_daftar');
route::add("GET", '/logout', 'AuthController', 'logout');
#forums route
route::add("GET", '/forum', 'ForumController', 'index');
route::add("GET", '/forum/q/([0-9-]+)', 'ForumController', 'q');
route::add("GET", '/forum/tag/([a-zA-Z0-9-]+)', 'ForumController', 'tag');
route::add("GET", '/forum/posting', 'ForumController', 'posting');
route::add("GET", '/forum/getpost', 'ForumController', 'getPost');
route::add("GET", '/forum/jawab_postingan', 'ForumController', 'jawab_postingan');
route::add("GET", '/forum/postingansaya', 'ForumController', 'postingansaya');
route::add("GET", '/forum/livesearch', 'ForumController', 'livesearch');
route::add("POST", '/forum/delete', 'ForumController', 'delete');
#admin route
#edit
route::add("POST", '/edit/user_edit', 'EditController', 'user_edit');

route::add("GET", '/admin', 'AdminController', 'index');
route::add("GET", '/admin/login', 'AdminController', 'login');
route::add("GET", '/admin/roadmap', 'AdminController', 'roadmap');
route::add("GET", '/admin/user', 'AdminController', 'user');
route::add("GET", '/admin/logout', 'AdminController', 'logout');
route::add("GET", '/roadmap/add', 'AdminController', 'roadmap_add');
route::add("GET", '/roadmap/delete/([1-9]+)', 'AdminController', 'roadmap_delete');
route::add("GET", '/roadmap/edit/([1-9]+)', 'AdminController', 'edit');
route::add("GET", '/admin/fedback_roadmap', 'AdminController', 'fedback_roadmap');

#peta pelajar 
route::add("GET", '/roadmap', 'RoadmapController', 'index');
route::add("GET", '/roadmap/detail/([a-zA-Z0-9+]+)', 'RoadmapController', 'details');
route::add("GET", '/roadmap_getdata', 'RoadmapController', 'roadmap_getdata');
route::add("GET", '/roadmap_search', 'RoadmapController', 'roadmap_search');

#download
route::add("GET",'/zona-download/(.*)','DownloadController','zona_download');
route::run();
