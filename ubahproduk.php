<h2>Ubah Produk</h2>
<?php
$ambil = $koneksi->query("select * from produk where id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah['foto_produk']);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div>
        <label>Kategori</label>
        <select class="form-select" aria-label="Default select example" name="kategori">
          <option selected>Pilih Kategori Produk</option>
          <option value="Tanaman Hias">Tanaman Hias</option>
          <option value="Media Tanam">Media Tanam</option>
          <option value="Pot">pot</option>
          <option value="Barang Lainnya">Barang Lainnya</option>
        </select>
    </div>
    <div class="form-group">
        <label>Harga Jual(Rp.)</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga Beli(Rp.)</label>
        <input type="number" name="beli" class="form-control" value="<?php echo $pecah['harga_beli']; ?>">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10">
   <?php echo $pecah['deskripsi']; ?>
   </textarea>
    </div>
    <div class="form-group">
        <label>Stok Produk</label>
        <input type="number" name="stok_produk" class="form-control" value="<?php echo $pecah['stok_produk']; ?>">
    </div>
    <button class="btn btn-primary" name="ubah">Submit</button>
</form>
<?php
if (isset($_POST['ubah'])) {
    $nama = $_FILES['foto']['name'];  
    $lokasi = $_FILES['foto']['tmp_name'];
    //Jika Foto Dirubah
    if (!empty($lokasi)) {
        move_uploaded_file($lokasi, "../fotoproduk/" . $nama);

        $koneksi->query("update produk set 
                     nama_produk='$_POST[nama]',
                     harga_produk='$_POST[harga]',
                     kategori='$_POST[kategori]',
                     harga_beli='$_POST[beli]', 
                     foto_produk= $nama,
                     deskripsi='$_POST[deskripsi]', 
                     stok_produk='$_POST[stok_produk]' 
                     where id_produk='$_GET[id]' ");
    } else {
        $koneksi->query("update produk set 
                            nama_produk='$_POST[nama]', 
                            kategori='$_POST[kategori]', 
                            harga_produk='$_POST[harga]',
                            harga_beli='$_POST[beli]', 
                            deskripsi='$_POST[deskripsi]', 
                            stok_produk='$_POST[stok_produk]' 
                        where id_produk='$_GET[id]' ");
    }
    echo "<script>alert('Data Telah Diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
    
}
?>