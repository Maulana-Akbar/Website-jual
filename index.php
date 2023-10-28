<?php
session_start();
$tgl_mulai = " ";
$koneksi = new mysqli("localhost", "root", "", "qumarang");

if (!isset($_SESSION["admin1"])) {
    header("location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="asset/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="asset/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script
src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Selamat Datang</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;font-size: 16px;
"> Date : <?php echo date("d-m-Y", strtotime($tgl_mulai)); ?> &nbsp; <a href="index.php?halaman=logout" class="btn btn-danger square-btn-adjust" style="border-radius: 8px 0px 8px 0px;">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>

                    <!--Halaman Navigasi Kiri-->
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Home</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=produk"><i class="fa fa-tag fa-3x"></i> Produk</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file fa-3x"></i> Laporan Penjualan</a>
                    </li>
                    -->                
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } else if ($_GET['halaman'] == "home") {
                    include 'home.php';
                    } else if ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } else if ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } else if ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } else if ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } else if ($_GET['halaman'] == "laporan_pembelian") {
                        include 'laporan_pembelian.php';
                    } else if ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    } else if ($_GET['halaman'] == "tambah") {
                        include 'tambahcart.php';
                    } else if ($_GET['halaman'] == "hapuskeranjang") {
                        include 'hapuskeranjang.php';
                    }                  
                    
                } else {
                    include 'home.php';
                }

                ?>

            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="asset/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="asset/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="asset/js/morris/raphael-2.1.0.min.js"></script>
    <script src="asset/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="asset/js/custom.js"></script>


</body>

</html>