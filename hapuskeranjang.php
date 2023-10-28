<?php
// Lakukan koneksi ke database (pastikan variabel $koneksi sudah didefinisikan)
$koneksi = new mysqli("localhost", "root", "", "qumarang");

// Perintah SQL untuk menghapus semua data dari tabel "keranjang"
$sql = "DELETE FROM keranjang";

// Eksekusi perintah SQL
if ($koneksi->query($sql) === TRUE) {
    echo "Keranjang berhasil direset.";
} else {
    echo "Error: " . $koneksi->error;
}
// Redirect kembali ke halaman awal atau halaman lain jika perlu
header("Location: index.php");
?>