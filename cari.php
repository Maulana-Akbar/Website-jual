<?php 
    $keyword=$_GET['keyword'];
	$semuadata=array();
	$ambil = $koneksi->query("select * from produk where nama_produk like '%$keyword%'
		or deskripsi like '%$keyword%' or kategori like '%$keyword%'");
	while ($pecah = $ambil->fetch_assoc()) {
		$semuadata[] = $pecah;
	}
?>
    <table class="table table-stripped" width="100%" id="example2">
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        <?php foreach($hasil1 as $hasil){?>
            <tr>
                <td><?php echo $hasil['id_barang'];?></td>
                <td><?php echo $hasil['nama_barang'];?></td>
                <td><?php echo $hasil['merk'];?></td>
                <td><?php echo $hasil['harga_jual'];?></td>
                <td>
                <a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang'];?>&id_kasir=<?php echo $_SESSION['admin']['id_member'];?>" 
                    class="btn btn-success">
                    <i class="fa fa-shopping-cart"></i></a></td>
            </tr>
        <?php }?>
        </table>