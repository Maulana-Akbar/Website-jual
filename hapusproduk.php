<?php
$ambil = $koneksi->query("select * from produk where id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if(file_exists("../fotoproduk/$fotoproduk"))
{
    unlink("../fotoproduk/$fotoproduk");
}
$koneksi->query("delete from produk where id_produk='$_GET[id]'");

echo"<script>alert('produk terhapus');</script>";
echo"<script>location='index.php?halaman=produk';</script>";
?>