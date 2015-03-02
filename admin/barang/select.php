<h1>Data Barang</h1>
<a class="link" href="?menu=2&mode=2&page=1&data=1">Tambah Data Barang</a><br/><br/>
<?php
	$query='SELECT * FROM tblbarang';
	$result=$db->query($query);
	$total=$result->num_rows;
	$data=2;
	$jumlahhalaman=ceil($total/$data);
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$mulai = ($_GET['page']-1) * $data;
	}else{
		$mulai = 0;
		$page= 0;
	}
	
	if($page > 1){
		echo "<a class='pagging' href='?menu=2&mode=1&page=";
		echo $page-1;
		echo "&data=1'>";
		echo "Mundur";
		echo "</a>";
		echo "&nbsp &nbsp";
	}
	
	for($a=1; $a<=$jumlahhalaman; $a++){
		echo "<a class='pagging' href='?menu=2&mode=1&page=$a&data=1'>$a</a>";
		echo "&nbsp &nbsp";
	}
	
	if($page <$jumlahhalaman){
		echo "<a class='pagging' href='?menu=2&mode=1&page=";
		echo $page+1;
		echo "&data=1'>";
		echo "Maju";
		echo "</a>";
	}
	echo "<br/>";
	
	$barang = array();
	
	$records = array();
	if($results = $db->query("SELECT * FROM tblkategori")){
		if($results->num_rows){
			while($row = $results->fetch_object()){
				$records[]=$row;
			}
			$results->free();
		}
	}
	
	$query="SELECT * FROM tblbarang LEFT JOIN tblkategori
			ON tblbarang.Kategori = tblkategori.Kategori LIMIT $mulai,$data";
			
	$barang = array();
		if($results = $db->query($query)){
			if($results->num_rows){
				while($row = $results->fetch_object()){
					$barang[]=$row;
				}
				$results->free();
			}
		}
	
	if(isset($_POST['select'])){
		$select = $_POST['select'];
		$query="SELECT * FROM tblbarang LEFT JOIN tblkategori
				ON tblbarang.Kategori = tblkategori.Kategori
				WHERE tblbarang.Kategori = '$select'";
				
		$barang = array();
		if($results = $db->query($query)){
			if($results->num_rows){
				while($row = $results->fetch_object()){
					$barang[]=$row;
				}
				$results->free();
			}
		}
	}
?>

<form class="form" method="POST">
	<select name="select">
		<?php
			foreach($records as $r){
				echo "<option value='$r->Kategori'>$r->Kategori</option>";
			}
		?>
	</select>
	<input type="submit" name="btncari" value="Cari"/>
</form>
<table>
	<tr>
		<th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Deskripsi</th>
		<th>Kategori</th>
		<th>Jumlah</th>
		<th>Harga</th>
		<th>Foto</th>
		<th>Ubah</th>
		<th>Hapus</th>
	</tr>
	<?php
		$nomer= $mulai + 1;
		foreach($barang as $b){
	?>
	<tr>
		<td><?php echo $nomer++;?></td>
		<td><?php echo $b->Id_barang;?></td>
		<td><?php echo $b->Nama_barang;?></td>
		<td><?php echo $b->Deskripsi;?></td>
		<td><?php echo $b->Kategori;?></td>
		<td><?php echo $b->Jumlah;?></td>
		<td><?php echo $b->Harga;?></td>
		<td><?php echo "<img src='images/$b->Foto'/>";?></td>
		<td><a href="?menu=2&mode=3&page=1&data=<?php echo $b->Id_barang;?>">Ubah</a></td>
		<td><a href="?menu=2&mode=4&page=1&data=<?php echo $b->Id_barang;?>">Hapus</a></td>
	</tr>
	<?php
		}
	?>
</table>