<h2>DETAIL PEMBELIAN</h2>
<?php
    $ambil = $koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan = pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
?>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian : <?php echo $detail['id_pembelian'];?></strong><br>
        Tanggal :<?php echo $detail['tangga_beli']; ?> <br>
        Total   :Rp. <?php echo number_format($detail['total_pembelian']); ?><br/>
        Status  :<?php echo $detail['status_beli'];?>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['nama_pelanggan'];?></strong><br>
        <?php echo $detail['telpon']; ?> <br>
        <?php echo $detail['email_pelanggan']; ?>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail['nama_kota'];?></strong><br>
        Ongkos Kirim : Rp.<?php echo number_format($detail['tarif']); ?><br>
        Pengiriman   : <?php echo $detail['alamat']; ?>
    </div>
</div>
<br/>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <?php
        $nomor = 1;
        $ambil= $koneksi->query("select * from pembelian_produk join produk on pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian='$_GET[id]'");
        while($pecah = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?></td>
        </tr>
        <?php
        $nomor++;
        }
        ?>
    </tbody>
</table>