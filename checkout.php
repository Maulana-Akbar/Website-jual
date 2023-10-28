<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
include 'koneksi.php';

//jika tidak login maka di suruh login
if(!isset($_SESSION["pelanggan"])){
    echo"<script>alert('Harap Login Terlebih dahulu');</script>";
    echo"<script>location='login.php'</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
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
    <section class="konten">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>SubHarga</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $nomor=1;
                $totalbelanja = 0;
                foreach($_SESSION["keranjang"] as $id_produk => $jumlah):  ?>
                <?php
                //Menampilkan produk yang sedang diloop berdasarkan id   
                $ambil=$koneksi->query("select * from produk where id_produk='$id_produk'");
                $pecah=$ambil->fetch_assoc();
                //Jumlah Harga
                $subharga = $pecah['harga_produk']*$jumlah;
                
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
                </tbody>
              <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja </th>
                        <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                    </tr>
              </tfoot>
            </table>

            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <input type="text" readonly value ="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <input type="text" readonly value ="<?php echo $_SESSION["pelanggan"]['telpon'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="id_ongkir">
                        <option value="">Pilih Ongkos Kirim</option>
                        <?php $ambil = $koneksi->query("select * from ongkir");
                              while($perongkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $perongkir["id_ongkir"] ?>"> <?php echo $perongkir['nama_kota'] ?> -
                                          Rp. <?php echo number_format($perongkir['tarif']);?>
                        </option>
                        <?php } ?>
                        </select>
                </div>
                </div>
                <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <textarea class="form-control" name="alamat" placeholder="Masukan Alamat Pengiriman"></textarea>
                </div>
                <button class="btn btn-primary" name="checkout">Bayar</button>
            </form>
            <?php 
            if(isset($_POST["checkout"])){
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tangga_beli = date("Y-m-d");
                $alamat= $_POST['alamat'];

                $ambil = $koneksi->query("select * from ongkir where id_ongkir ='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc();
                $nama_kota=$arrayongkir['nama_kota'];
                $tarif = $arrayongkir['tarif'];
                $total_pembelian = $totalbelanja + $tarif;

                //1. menyimpan data ketable pembelian
                $koneksi ->query("insert into pembelian (id_pelanggan,id_ongkir,tangga_beli,total_pembelian,nama_kota,tarif,alamat) 
                values 
                ('$id_pelanggan','$id_ongkir','$tangga_beli','$total_pembelian','$nama_kota','$tarif','$alamat')");
                // mendapatkan id_pembelian yang telah terjadi
                $id_pembelian_baru = $koneksi->insert_id;
                foreach($_SESSION["keranjang"]as $id_produk => $jumlah)
                {
                    //Kosongkan Keranjang
                    unset($_SESSION["keranjang"]);
                    // Mendapatkan data produk berdasarkan id_produk
                    $ambil=$koneksi->query("select * from produk where id_produk='$id_produk'");
                    $perpoduk=$ambil->fetch_assoc();

                    $nama=$perpoduk['nama_produk'];
                    $harga=$perpoduk['harga_produk'];
                    $berat=$perpoduk['berat'];

                    $subberat=$perpoduk['berat']*$jumlah;
                    $subharga=$perpoduk['harga_produk']*$jumlah;

                    $koneksi->query("insert into pembelian_produk (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah) 
                    values 
                    ('$id_pembelian_baru','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");
                    //pengurangan Stok Produk Toko
                    $koneksi->query("update produk set stok_produk=stok_produk -$jumlah where id_produk='$id_produk'");
                }
                // Lempar kehalaman nota ketika pembelian terjadi
                echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
            }
            ?>
        </div>
    </section>
</body>
</html>