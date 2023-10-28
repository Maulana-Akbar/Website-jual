<h2>DATA PRODUK</h2>

<a href="index.php?halaman=tambahproduk" class="btn btn-info">Tambah Data</a>
<form action="index.php?halaman=produk" class="d-flex " role="search">
    <input class="form-control" type="search" placeholder="Cari Barang" aria-label="Search" name="cari">
    <a id="pencarian" href="index.php?halaman=produk" class="btn btn-default"><i class="fa fa-edit fa-1x"></i>&nbsp;cari</a>

</form>
<div class="table-responsive">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Harga Jual</th>
            <th class="text-center">Harga Beli</th>
            <th class="text-center">foto</th>
            <th class="text-center">Stok Produk</th>
            <th class="text-center">aksi</th>
        </tr>
    </thead>
    <?php
    $nomor = 1;
    $ambil = $koneksi->query("select * from produk");
    while ($pecah = $ambil->fetch_assoc()) {
    ?>
        <tbody>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td><?php echo $pecah['kategori']; ?></td>
                <td ><?php echo $pecah['harga_produk']; ?></td>
                <td ><?php echo $pecah['harga_beli']; ?></td>
                <td >
                    <img src="../fotoproduk/<?php echo $pecah['foto_produk']; ?>" width="100">
                </td>
                <td ><?php echo $pecah['stok_produk']; ?></td>
                <td >
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger"><i class="fa fa-minus-circle fa-1x"></i>&nbsp;Hapus</a>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="fa fa-edit fa-1x"></i>&nbsp;Ubah</a>
                </td>
            </tr>
        <?php
        $nomor++;
    }
        ?>
        </tbody>
    </table>
</div>

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