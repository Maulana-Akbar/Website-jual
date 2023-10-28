<?php
session_start();
//Mendapatkan id_produk dari Url
$id_produk = $_GET['id'];
//Jika Sudah ada Produk dikeranjang maka produk itu jumlahya di +1
if(isset($_SESSION['keranjang'][$id_produk])){
    $_SESSION['keranjang'][$id_produk]+=1;
}else{
    $_SESSION['keranjang'][$id_produk]=1;
}
echo "<script>alert('Produk telah masuk kedalam keranjang');</script>";
echo "<script>location='index.php'</script>"
?>