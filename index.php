<?php
session_start();
include 'koneksi.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Qumarang Garden</title>
        <!--Link Bootstrap-->
        <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
        <!--Link my CSS-->
        <link rel="stylesheet" type="text/css" href="admin/assets/css/custom.css">

        <!-- FONTAWESOME STYLES-->
        <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    </head>

    <body style="background-color: #8CC3A9;">

        <section class="intro text-center" style="  padding-top: 5rem;"> 
            <p class="display-2" >Selamat Datang</h1>
            <p class="display-3" >Qumarang Garden adalah toko yang menjual berbagai macam tanaman hias dan lainnya</p>
            <hr class="my-4">
            <p class="fs-3">Klik dibawah ini untuk lebih mempelajari Tentang kami</p>
            <a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more</a>
            <p class="fs-3">Temukan barang yang anda cari disini</p>
            <form action="pencarian.php" method="get"  class="text-center mx-5">
                <input type="text" class="form-control text-center " name="keyword" placeholder="Masukkan nama barang yang dicari">
                <button type="submit" class="btn btn-primary" >Cari</button>
            </form>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </section>
        <!--Konten Toko-->
        <section class="stext-black" style="background-color: #f3f4f5;"  >
            <div class="container">
                <h1 style="text-align: center;">Produk Terbaru</h1>
                <div class="row justify-content-center">
                    <!--Produk-->
                    <?php
                    $ambil = $koneksi->query("select * from produk order by id_produk DESC;  ");
                    $no = 1;
                        while ($perproduk = $ambil->fetch_assoc()) {
                    ?>
                            <?php
                                if ( $no < 5) {
                            ?>
                              <div class="col-lg-3 col-md-3 col-xs-3" style="padding-bottom: 1rem;">
                                    <div class="card h-100">
                                        <a href="detail.php?id=<?php echo $perproduk["id_produk"];?>">
                                             <img src="fotoproduk/<?php echo $perproduk["foto_produk"]; ?>" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>       
                                            <p class="card-text">Rp.<?php echo number_format($perproduk['harga_produk']); ?></p>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    $no++;
                }
                    }
                    ?>
                </div>
            </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#8CC3A9" fill-opacity="1" d="M0,224L48,218.7C96,213,192,203,288,192C384,181,480,171,576,160C672,149,768,139,864,165.3C960,192,1056,256,1152,266.7C1248,277,1344,235,1392,213.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </section>
        
        <section class="pupuk">
            <div class="container">
                <h1 style="text-align: center;">Media Tanam</h1>
                <div class="row justify-content-center">
                    <!--Produk-->
                    <?php
                    $ambil = $koneksi->query("select * from produk where kategori = 'media tanam'");
                    $no = 1;
                        while ($perproduk = $ambil->fetch_assoc()) {
                    ?>
                            <?php
                                if ( $no < 5) {
                            ?>
                                <div class="col-lg-3 col-md-3" style="padding-bottom: 1rem;">
                                    <div class="card h-100">
                                        <a href="detail.php?id=<?php echo $perproduk["id_produk"];?>">
                                             <img src="fotoproduk/<?php echo $perproduk["foto_produk"]; ?>" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>       
                                            <p class="card-text">Rp.<?php echo number_format($perproduk['harga_produk']); ?></p>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    $no++;
                }
                    }
                    ?>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </section>
        <section class="tanaman" style="background-color: #f3f4f5" >
           <div class="container">
                <h1 style="text-align: center;">Tanaman Hias</h1>
                <div class="row justify-content-center">
                    <!--Produk-->
                    <?php
                    $ambil = $koneksi->query("select * from produk where kategori = 'Tanaman Hias'");
                    $no = 1;
                        while ($perproduk = $ambil->fetch_assoc()) {
                    ?>
                            <?php
                                if ( $no < 5) {
                            ?>
                                <div class="col-lg-3 col-md-3" style="padding-bottom: 1rem;">
                                    <div class="card h-100">
                                        <a href="detail.php?id=<?php echo $perproduk["id_produk"];?>">
                                             <img src="fotoproduk/<?php echo $perproduk["foto_produk"]; ?>" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>       
                                            <p class="card-text">Rp.<?php echo number_format($perproduk['harga_produk']); ?></p>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    $no++;
                }
                    }
                    ?>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f3f4f5" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </section>
        <script src="admin/assets/js/jquery.js"></script> 
        <script src="admin/assets/js/popper.js"></script> 
        <script src="admin/assets/js/bootstrap.js"></script>
    </body>

</html>