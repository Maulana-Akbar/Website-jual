<?php include 'koneksi.php' ?>
<?php include 'navbar.php' ?>
<?php 
    $keyword=$_GET['keyword'];
	$semuadata=array();
	$ambil = $koneksi->query("select * from produk where nama_produk like '%$keyword%'
		or deskripsi like '%$keyword%' or kategori like '%$keyword%'");
	while ($pecah = $ambil->fetch_assoc()) {
		$semuadata[] = $pecah;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pencarian</title>
        <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
        <!--Link my CSS-->
        <link rel="stylesheet" type="text/css" href="admin/assets/css/custom.css">

        <!-- FONTAWESOME STYLES-->
        <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />

</head>
<body style="background-color: #8CC3A9;">
    <section class="konten" >
 	<div class="container">
            <form action="" method="get" class="text-center">
                <input type="text" class="form-control text-center " name="keyword" placeholder="Masukkan nama barang yang dicari">
                <button type="submit" class="btn btn-primary ">Cari</button>
            </form>
            <h1>Pencarian Yang ditemukan</h1>
            <div class="row">
                <?php foreach ($semuadata as $key => $perproduk):
                
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
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <script src="admin/assets/js/jquery.js"></script> 
    <script src="admin/assets/js/popper.js"></script> 
    <script src="admin/assets/js/bootstrap.js"></script>
</body>
</html>