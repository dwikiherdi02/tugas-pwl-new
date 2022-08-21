<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard <small>Statistics and more</small></h1>
                    <div class="alert alert-dismissable bg-primary">
                        <button data-dismiss="alert" class="close" type="button">&times;</button>
                        Selamat datang <strong><i><?php echo $_SESSION['dpn']." ".$_SESSION['blk']; ?></i></strong> di Dashboard <strong class="text-uppercase">Dark Arsip!</strong> Cek semua Surat Masuk dan Surat Keluar sesuai kebutuhan Anda. 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-heading">
                        <div class="panel-body bg-warning">
                            <i class="fa fa-envelope-o fa-5x pull-right" aria-hidden="true"></i><h2>Surat Masuk &nbsp;<span class="label label-primary"><?php echo (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM surat_masuk"))); ?></span></h2>
                        </div>
                        <a href="?table=sm" class="panel panel-footer btn btn-block btn-warning">Cek Sekarang! <span class="fa fa-arrow-circle-right fa-lg"></span></a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-heading">
                        <div class="panel-body bg-success">
                            <i class="fa fa-envelope fa-5x pull-right" aria-hidden="true"></i><h2>Surat Keluar &nbsp;<span class="label label-primary"><?php echo (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM surat_keluar"))); ?></span></h2>
                        </div>
                        <a href="?table=sk" class="panel panel-footer btn btn-block btn-success">Cek Sekarang! <span class="fa fa-arrow-circle-right fa-lg"></span></a>
                    </div>
                </div>
            </div>