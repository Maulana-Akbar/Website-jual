

 <?php 
include 'koneksi.php';
		$cari = $_POST['keyword'];
		if($cari == '')
		{

		}else{
			$sql = "select * from produk where nama_produk like '%$keyword%'  or kategori like '%$keyword%'";
			$row = $koneksi -> prepare($sql);
			$row -> execute();
			$hasil1= $row -> fetchAll();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID produk</th>
				<th>Nama Produk</th>
				<th>Harga </th>
				<th>jumlah</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($hasil1 as $hasil){?>
			<tr>
				<td><?php echo $hasil['id_produk'];?></td>
				<td><?php echo $hasil['nama_produk'];?></td>
				<td><?php echo $hasil['harga_produk'];?></td>
				<td>
					<input type="number" name="jum">
				<td>
				<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_produk'];?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>