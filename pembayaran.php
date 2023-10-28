<h2>Data Pembayaran</h2>

<?php 
//mendapatkan id pembelian dari Url
$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("select * from pembayaran where id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <td><?php echo $detail['nama']; ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detail['bank']; ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detail['jumlah']); ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>Rp. <?php echo $detail['tanggal']; ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>" style="width:350px;height:350px;" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="Barang Dikirim">Barang Dikirim</option>
            <option value="batal">Pemesanan Dibatalkan</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php
    if(isset($_POST["proses"])){
        $resi= $_POST["resi"];
        $status = $_POST["status"];
        $koneksi->query("update pembelian set resi_pengiriman='$resi',status_beli='$status' where id_pembelian='$id_pembelian'");
        echo"<script>alert('Data Pembelian Terupdate');</script>";
        echo "<script>location='index.php?halaman=pembelian';</script>";
    }
?>