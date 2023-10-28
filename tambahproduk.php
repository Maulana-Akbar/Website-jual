<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
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
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group">
        <label>Harga Beli(Rp.)</label>
        <input type="number" class="form-control" name="harga_beli">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" row="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div>
        <label>Stok Produk</label>
        <input type="number" class="form-control" name="stok">
    </div>
    <br />
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../fotoproduk/" . $nama);
    $koneksi->query("insert into produk (nama_produk,harga_produk,harga_beli,kategori,foto_produk,deskripsi,stok_produk) 
                    values
                    ('$_POST[nama]','$_POST[harga]','$_POST[harga_beli]','$_POST[kategori]','$nama','$_POST[deskripsi]','$_POST[stok]')");
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='l;url='index.php?halaman=produk'>";
}
?>