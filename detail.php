<?php 
include 'koneksi.php';
session_start();
//ambil id produk dari database
$id_produk = $_GET["id"];
//query ambil data
$ambil= $koneksi->query("select * from produk where id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
    <!--Link Bootstrap-->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
<body style="background-color: #8CC3A9; padding-top: 6rem;">
    <!--Navbar-->
    <?php include'navbar.php'; ?>
    <br/>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="fotoproduk/<?php echo $detail["foto_produk"]; ?>" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail["nama_produk"]; ?></h2>
                    <h4>Rp. <?php echo number_format($detail["harga_produk"]);?></h4>
                    <h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>
                    <p><?php echo$detail["deskripsi"]; ?></p>
                </div>
            </div>
        </div>
    </section>
        <script src="admin/assets/js/jquery.js"></script> 
        <script src="admin/assets/js/popper.js"></script> 
        <script src="admin/assets/js/bootstrap.js"></script>
</body>
</html>