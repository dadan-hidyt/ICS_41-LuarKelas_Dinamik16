<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Luarkelas - Login</title>
    <link href="<?= base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">

</head>
<?php
session_start();
if (isset($_SESSION['adminlogin'])) {
    header('location:' . base_url() . 'admin');
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != "" && $password != "") {
        if ($ro = konek()->query("SELECT * from admin WHERE username='$username' AND password='$password'")) {
            if ($ro->num_rows > 0) {
                echo "login berhasil";
                $_SESSION['adminlogin'] = true;
                header('location:' . base_url() . 'admin');
            }else{
                echo "<script>alert('username dan password salah');</script>";
            }
        }
    }
}
?>

<body class="bg-gradient-login">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
								<div class="card-body">
								<form class="user" method="POST" action="">
										<div class="form-group">
										    <input type="txt" class="form-control" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address">
										</div>
										<div class="form-group">
										    <input type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Password">
										</div>

										<div class="form-group">
										    <button class="btn btn-block btn-primary" name="login">login</button>
										</div>

									</form>
								</div>
            </div>
        </div>
    </div>
</div>
    <!-- Login Content -->
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/admin/js/ruang-admin.min.js"></script>
</body>

</html>