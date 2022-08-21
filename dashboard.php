<?php session_start();
include 'config/config.php';
if (!isset($_SESSION['user'])) {
     echo "<script>alert('Login Terlebih dahulu!');</script>
     <meta http-equiv='refresh' content='0;URL=index.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dark Arsip</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/local.css" />
    <link rel="stylesheet" type="text/css" href="assets/DataTables/css/jquery.dataTables.css">

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <!-- <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" /> -->
    <link rel="icon" href="EMail.ico">

    <!-- <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script> -->
</head>
<body class="container-fluid">
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?index"><i class="fa fa-dashcube"></i> Dark Arsip</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php include 'layout/navbar.php'; ?>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <?php include 'layout/alert.php';
                    ?>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i><?php echo $_SESSION['dpn']." ".$_SESSION['blk']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Pengaturan</a></li>
                            <li class="divider"></li> -->
                            <li><a href="?page=out" onclick="return confirm('Anda yakin ingin keluar?');"><i class="fa fa-power-off"></i> Keluar</a></li>

                        </ul>
                    </li>
                    <!-- <li class="divider-vertical"></li>
                    <li>
                        <form class="navbar-search">
                            <input type="text" placeholder="Search" class="form-control">
                        </form>
                    </li> -->
                </ul>
            </div>
        </nav>

        <div class="page-wrapper"><?php require 'url.php'; ?></div>
        

        <footer class="page-wrapper navbar-fixed-bottom"><span>&nbsp;&nbsp;&nbsp;Abdi Karya &copy; 2018</span></footer>
    </div>
    <!-- /#wrapper -->

    <!-- <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> -->
    <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/DataTables/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
    </script>
    <script type="text/javascript">
        jQuery(function ($) {
            var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                visits = [123, 323, 443, 32],
                traffic = [
                {
                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
                },
                {
                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
                },
                {
                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
                },
                {
                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
                },
                {
                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
                }];


            $("#shieldui-chart1").shieldChart({
                theme: "dark",

                primaryHeader: {
                    text: "Visitors"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "area",
                    collectionAlias: "Q Data",
                    data: performance
                }]
            });

            $("#shieldui-chart2").shieldChart({
                theme: "dark",
                primaryHeader: {
                    text: "Traffic Per week"
                },
                exportOptions: {
                    image: false,
                    print: false
                },
                dataSeries: [{
                    seriesType: "pie",
                    collectionAlias: "traffic",
                    data: visits
                }]
            });

            $("#shieldui-grid1").shieldGrid({
                dataSource: {
                    data: traffic
                },
                sorting: {
                    multiple: true
                },
                rowHover: false,
                paging: false,
                columns: [
                { field: "Source", width: "170px", title: "Source" },
                { field: "Amount", title: "Amount" },                
                { field: "Percent", title: "Percent", format: "{0} %" },
                { field: "Target", title: "Target" },
                ]
            });            
        });        
    </script>
</body>
</html>
