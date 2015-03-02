<?php
	
	$records = array();
	
	if($results = $db->query("SELECT * FROM tblkategori")){
		if($results->num_rows){
			while($row = $results->fetch_object()){
				$records[]=$row;
			}
			$results->free();
		}
	}
	
?>
<h1>Kategori Barang</h1>
<a class="link" href="?menu=1&mode=2&page=1&data=1">Tambah Kategori</a><br/><br/>
<?php
	$query='SELECT * FROM tblkategori';
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
		echo "<a class='pagging' href='?menu=1&mode=1&page=";
		echo $page-1;
		echo "&data=1'>";
		echo "Mundur";
		echo "</a>";
		echo "&nbsp &nbsp";
	}
	
	for($a=1; $a<=$jumlahhalaman; $a++){
		echo "<a class='pagging' href='?menu=1&mode=1&page=$a&data=1'>$a</a>";
		echo "&nbsp &nbsp";
	}
	
	if($page <$jumlahhalaman){
		echo "<a class='pagging' href='?menu=1&mode=1&page=";
		echo $page+1;
		echo "&data=1'>";
		echo "Maju";
		echo "</a>";
	}
	echo "<br/>";
	
	$records = array();
	
	if($results = $db->query("SELECT * FROM tblkategori LIMIT $mulai,$data")){
		if($results->num_rows){
			while($row = $results->fetch_object()){
				$records[]=$row;
			}
			$results->free();
		}
	}

?>
<table>
	<tr>
		<th>No</th>
		<th>Kategori</th>
		<th>Keterangan</th>
		<th>Ubah</th>
		<th>Hapus</th>
	</tr>
	<?php
		$nomer=$mulai+1;
		foreach($records as $r){
	?>
		<tr>
			<td><?php echo $nomer++; ?></td>
			<td><?php echo $r->Kategori; ?></td>
			<td><?php echo $r->Keterangan_Kategori; ?></td>
			<td><a href="?menu=1&mode=3&page=1&data=<?php echo $r->Kategori; ?>">Ubah</a></td>
			<td><a href="?menu=1&mode=4&page=1&data=<?php echo $r->Kategori; ?>">Hapus</a></td>
		</tr>
	<?php
		}
	?>
</table>