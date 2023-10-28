<h2>DATA PEMBELIAN</h2>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>aksi</th>
        </tr>
    </thead>
    <?php
        $nomor = 1;
        $ambil= $koneksi->query("select * from pembelian join pelanggan on pembelian.id_pelanggan=pelanggan.id_pelanggan");
        while($pecah = $ambil->fetch_assoc()){
    ?>
    <tbody>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['tangga_beli']; ?></td>
            <td><?php echo $pecah['status_beli'];?></td>
            <td width="100">Rp.<?php echo number_format($pecah['total_pembelian']); ?></td>
            <td width="221">
                <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info"><i class="fa fa-eye fa-1x"></i>&nbsp;Detail</a>
            <?php 
            if($pecah['status_beli']!=="pending"):?>
            <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-danger">Cek Transfer</a>
            <?php endif ?>
            </td>
        </tr>
        <?php
        $nomor++;
        }
        ?>
    </tbody>
</table>