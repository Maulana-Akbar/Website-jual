<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
</head>

<body>
    <!--Navbar-->
    <?php include 'navbar.php'; ?>
    <!--Konten-->

    <section class="konten">
        <div class="container">
            <h2>DETAIL PEMBELIAN</h2>
            <?php
            $ambil = $koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");
            $detail = $ambil->fetch_assoc();
            ?>
            <!--Mengamankan ID nota-->
            <?php
            //mendapatkan id pelanggan yang beli
            $idpelangganyangbeli = $detail["id_pelanggan"];

            //mendapatkan id pelanggan yang login
            $idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];
            if ($idpelangganyangbeli !== $idpelangganlogin) {
                echo "<script>location='riwayat.php';</script>";
                exit();
            }

            ?>
            <div class="row">
                <div class="col-md-4">
                    <h3>Tanggal Pembelian</h3>
                    <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                    Tanggal Pembelian : <?php echo $detail['tangga_beli']; ?><br>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                    <p>
                        <?php echo $detail['telpon']; ?> <br>
                        <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <strong><?php echo $detail['nama_kota']; ?></strong><br>
                    Ongkos Kirim : Rp.<?php echo number_format($detail['tarif']); ?><br>
                    Pengiriman : <?php echo $detail['alamat']; ?>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <?php
                $nomor = 1;
                $ambil = $koneksi->query("select * from pembelian_produk where id_pembelian='$_GET[id]'");
                while ($pecah = $ambil->fetch_assoc()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td><?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['berat']; ?>Gr.</td>
                            <td><?php echo $pecah['jumlah'] ?></td>
                            <td>Rp.<?php echo number_format($pecah['subharga']) ?></td>
                        </tr>
                    <?php
                    $nomor++;
                }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">Total Belanja </th>
                            <th>Rp.<?php echo number_format($detail['total_pembelian']); ?></th>
                        </tr>
                    </tfoot>
            </table>
            <div class="row">
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <p>
                            Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?>
                            Transfer Ke Rekening
                            <br>
                            Bank Bri 123-45789-23-2-12 AN. Irfan Farezi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>