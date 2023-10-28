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
    <title>Produk</title>
</head>
<!--Link Bootstrap-->
<link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link rel="stylesheet" href="admin/assets/css/bootstrap-grid.css">
<!-- FONTAWESOME STYLES-->
<link href="admin/assets/css/font-awesome.css" rel="stylesheet" />

<body style="background-color: #8CC3A9;padding-top: 6rem;">
    <!--Konten Toko-->
    <section>
       <div class="container">
            <h2> Kategori Tanaman Hias</h2>
            <div class="row"> 
                    <?php
                        
                        $ambil = $koneksi->query("select * from produk where kategori = 'Tanaman Hias' ");
                            
                        ?>
                                <?php
                                    while ($perproduk = $ambil->fetch_assoc()) {
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
                    
                        }
                        ?>            
            </div>     
        </div>
    </section>
    <script src="admin/assets/js/jquery.js"></script> 
    <script src="admin/assets/js/popper.js"></script> 
    <script src="admin/assets/js/bootstrap.js"></script>
</body>

</html>