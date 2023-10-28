<?php
session_start();
include'koneksi.php';
if(!isset($_SESSION["pelanggan"])OR empty($_SESSION["pelanggan"])){
    echo"<script>alert('Harap Login Terlebih dahulu');</script>";
    echo"<script>location='login.php'</script>";
    exit();
}
//mendapatkan ID Pembelian

$idpem = $_GET["id"];
$ambil=$koneksi->query("select * from pembelian where id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
///mendapatkan id pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !== $id_pelanggan_beli){
    echo"<script>location='riwayat.php';</script>";
    exit();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <!--Navbar-->
    <?php include'navbar.php'; ?>
    <!--Konten-->
    <div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2>Konfirmasi Pembayaran</h2>
            <p>Kirim Bukti Pembayaran Disini</p>
        <div class="alert alert-danger">
        Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pembeli</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Pembeli" autofocus="on">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank" placeholder="Masukan Bank Pembayaran" >
            </div>
            <div class="form-group">
                <label>Jumlah Tagihan</label>
                <input type="number" class="form-control" name="jumlah" placeholder="Masukan Tagihan Pembayaran" >
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Foto Bukti Transfer Maks 2MB</p>
            <button class="btn btn-primary" name="kirim">Kirim</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <?php 
    // Jika ada Data yang disimpan
    if(isset($_POST["kirim"])){
    //wajib upload foto tranfer
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $duluan =date("Ymdhis").$namabukti;
    move_uploaded_file($lokasibukti,"bukti_pembayaran/$duluan");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $tanggal = date("Y-m-d");
    //simpan pembayaran
    $koneksi->query("insert into pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti)
                     values ('$idpem','$nama','$bank','$jumlah','$tanggal','$duluan')");
    //update status pembayaran
    $koneksi->query("update pembelian set status_beli='Sudah Transfer' where id_pembelian='$idpem'");
    echo"<script>alert('Terima Kasih Telah Membayar Kami Akan Cek Pembayaran Anda');</script>";
    echo"<script>location='riwayat.php';</script>";
    }
    ?>
</body>
</html>