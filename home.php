<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
</head>
<body>
    <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12 main-chart">
                        <h3>Transaksi</h3>

<!-- Cari Barang -->
                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-search"></i> Cari Barang</h4>
                                </div>
                                <div class="panel-body">
                                        <form action="" method="get">
                                <input type="text" id="keyword" class="form-control" placeholder="Masukan Nama Barang " name="keyword">
                                <button  type="submit" class="btn btn-light">Search</button>
                              </form>
                                </div>
                            </div>
                        </div>
<!-- end cari barang -->

<!-- Hasil Pencarian -->
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-list"></i> Hasil Pencarian</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl_input">
                                        <form action="proses.php" method="post">
                                            <table class="table table-bordered text-center table-hovered">
                                            <thead>
                                                <tr >
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">ID Produk</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Kategori</th>
                                                    <th class="text-center">Harga</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th class="text-center">aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if (!isset($_GET['keyword'])) {
                                               
                                            } else {
                                                $keyword=$_GET['keyword'];
                                                $nomor = 1;
                                                $ambil = $koneksi->query("select * from produk where nama_produk like '%$keyword%'
                                                                          or kategori like '%$keyword%' or id_produk like '%$keyword%' ");
                                                while ($pecah = $ambil->fetch_assoc()) {
                                                     $linkID = "tambah-produk-" . $pecah['id_produk'];
                                                ?>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td  width="50"><?php echo $nomor; ?></td>
                                                            <td  width="100" ><?php echo $pecah['id_produk']; ?></td>
                                                            <td  width="100" ><?php echo $pecah['nama_produk']; ?></td>
                                                            <td  width="100" ><?php echo $pecah['kategori']; ?></td>
                                                            <td  width="100" >Rp.<?php echo number_format($pecah['harga_produk']); ?></td>
                                                            <td  width="100">
                                                                <input type="number" min="1" max="<?php echo $pecah['stok_produk']; ?>" class="form-control" name="qty">
                                                            </td>
                                                            <td  width="50" class="text-center">
                                                                <a id="<?php echo $linkID; ?>" href="index.php?halaman=tambah&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-success">
                                                                <i class="fa fa-plus-circle fa-1x"></i>&nbsp;Tambah
                                                                </a> 
                                                                <script>
                                                                    document.getElementById('<?php echo $linkID; ?>').addEventListener('click', function(e) {
                                                                        // Cari elemen input "qty" dengan name "qty"
                                                                        var qtyInput = document.querySelector('input[name="qty"]');

                                                                        // Periksa apakah nilai qty kosong atau kurang dari 1
                                                                        if (qtyInput.value === '' || parseInt(qtyInput.value) < 1) {
                                                                            e.preventDefault(); // Mencegah tautan dari mengarahkan ke halaman selanjutnya
                                                                            alert('Isi kolom Jumlah dengan banyak penjualan.');
                                                                        } else {
                                                                            // Tambahkan nilai qty ke URL tautan
                                                                            this.href += '&qty=' + qtyInput.value;
                                                                        }
                                                                    });
                                                                </script>        
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <?php
                                                    $nomor++;
                                                }
                                            }
                                            ?>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                </div>
            </div>
        </section>
    </section>
    
<!-- End Hasil Pencarian -->    

<!-- Kasir -->              
                        <div class="col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-shopping-cart"></i> KASIR
                                    <a class="btn btn-danger pull-right" 
                                        onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" 
                                        style="margin-top:-0.5pc;" href="index.php?halaman=hapuskeranjang">
                                        <b>RESET KERANJANG</b></a>
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div classs="table-responsive" id="keranjang">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><b>Tanggal</b></td>
                                                <td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered text-center table-hovered" id="example1">
                                            <thead>
                                                <tr>
                                                    <td class="text-center"> No</td>
                                                    <td class="text-center"> Nama Produk</td>
                                                    <td class="text-center"> Jumlah</td>
                                                    <td class="text-center"> harga</td>
                                                    <td class="text-center"> Subtotal</td>
                                                </tr>
                                            </thead>
                                            <?php
                                                $nomor = 1;
                                                $ambil = $koneksi->query("select * from keranjang ");
                                                $total = 0;
                                                while ($nilai = $ambil->fetch_assoc()) {
                                                    ?>
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td  width="50"><?php echo $nomor; ?></td>
                                                            <td  width="100" name="id"><?php echo $nilai['nama_produk']; ?></td>
                                                            <td  width="100" name="nama"><?php echo $nilai['jum']; ?></td>
                                                            <td  width="100" name="kat">Rp.<?php echo number_format ($nilai['harga']); ?></td>
                                                            <td  width="100" name="harga">Rp.<?php echo number_format ($nilai['subtotal']); ?></td>
                                                        </tr>
                                                    
                                                    <?php
                                                    $nomor++;
                                                    $total += $nilai['subtotal'];
                                                }
                                                ?>
                                                    <tr>
                                                        <td colspan="4">Total</td>
                                                        <td >Rp.<?php echo number_format($total); ?></td>
                                                    </tr>
                                        </tbody>
                                        </table>
                                    

                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>

</form>
</body>
</html> 

