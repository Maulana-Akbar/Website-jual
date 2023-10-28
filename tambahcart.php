<?php
session_start();
$ambil = $koneksi->query("select * from produk where id_produk='$_GET[id]'");
$nilai = $_GET['qty'];
$pecah = $ambil->fetch_assoc();
$jual = $pecah['harga_produk'];
$sub = $nilai * $jual;
    
    $koneksi->query("INSERT INTO keranjang (id_produk, nama_produk, harga, jum, tgl_input, subtotal) 
                VALUES
                ('" . $pecah['id_produk'] . "', '" . $pecah['nama_produk'] . "', '" . $pecah['harga_produk'] . "', '$nilai', NOW(), '$sub')");
echo "<script>location='index.php?halaman=home';</script>";
?>