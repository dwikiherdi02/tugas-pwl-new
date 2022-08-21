<?php session_start();
if (isset($_SESSION['user'])) {
     echo "<meta http-equiv='refresh' content='0;URL=dashboard.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/local.css" />

    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="EMail.ico">   
</head>
<body class="container">

    <div class="login">
                <div class="col-lg-12 text-center v-center form-signin">
                    <div class="text-center">
                        <img src="Mail.ico" alt="Dark Logo">
                    </div>
                    <h1><i class="fa fa-dashcube"></i> Dark Arsip</h1>
                    <p class="lead">Selamat Datang, silahkan login!</p>

                    <br>

                    <form class="col-lg-12" method="post" action="auth.php">
                        <div class="form-group col-md-6 col-md-offset-3">
                            <input class="form-control input-lg" title="Confidential signup."
                                placeholder="Enter your username" type="text" name="username">
                        </div><br>
                        <div class="form-group col-md-6 col-md-offset-3">
                            <input class="form-control input-lg" title="Confidential signup."
                                placeholder="Enter your password" type="password" name="password">
                        </div>
                        <div class="form-group col-md-6 col-md-offset-3">
                            <button class="btn btn-lg btn-primary" type="submit"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <p class="text-muted">Belum punya akun? Buat akun <a class="label label-primary" data-toggle="modal" data-target="#myModal">disini</a></p>
                </div>
                 <!-- Modal Register -->
                    <form method="POST" action="core/insert.php">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user"></i> Daftar Akun</h4>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" class="form-control" name="nm_dpn" required placeholder="Masukkan Nama Depan Anda">
                            </div>

                            <div class="form-group">
                                <label>Nama Belakang</label>
                                <input type="text" class="form-control" name="nm_blk" required placeholder="Masukkan Nama Belakang Anda">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required placeholder="Masukkan Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="Masukkan Kata Sandi">
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="kon_pass" required placeholder="Masukkan Kata Sandi">
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                            <button type="submit" class="btn btn-success" name="register"><i class="fa fa-check"></i> Daftar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    <!-- End of Modal Register -->
    </div>
            <br>
            <br>
            <br>
            <br>
            <br>
    <!-- <div class="text-center">
                <h1>Follow us</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center v-center" style="font-size: 39pt;">
                    <a href="#"><span class="avatar"><i class="fa fa-google-plus"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-linkedin"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-facebook"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-github"></i></span></a>
                </div>
            </div> -->
            <!-- /.row -->   
</body>
</html>