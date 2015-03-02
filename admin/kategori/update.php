<h1>Update Kategori Barang</h1>
<?php
	if($_GET['data']){
		$data = $_GET['data'];
		$query="SELECT * FROM tblkategori WHERE Kategori='$data'";
		
		if($results = $db->query($query)){
			if($results->num_rows){
				$row = $results->fetch_object();
				$kategori = $row->Kategori;
				$keterangan = $row->Keterangan_Kategori;
				$results->free();
			}
		}
	}
?>
<form class="form" method="post" action="">
	<label>Kategori :</label> <br/>
		<input type="text" name="kategori" value="<?php echo $kategori; ?>"/> <br/>
	<label>Keterangan :</label> <br/>
		<input type="text" name="keterangan" value="<?php echo $keterangan; ?>"/> <br/>
		<input type="submit" name="btnsimpan" value="Simpan">
</form>
<?php
	if(!empty($_POST)){
		if(isset($_POST['kategori'],$_POST['keterangan'])){
			$kategori = $_POST['kategori'];
			$keterangan = $_POST['keterangan'];
			
			$query = "UPDATE tblkategori SET Kategori='$kategori',
					  Keterangan_Kategori='$keterangan'
					  WHERE kategori='$data'";
			$db->query($query);
			header('location:?menu=1&mode=1&page=1&data=1');
		}
	}

?>