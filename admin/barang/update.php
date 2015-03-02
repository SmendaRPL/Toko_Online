<h1>Update Data Barang</h1>
<?php
	if(isset($_GET['data'])){
		$data = $_GET['data'];
		
		$query = "SELECT * FROM tblbarang WHERE Id_barang='$data'";
		$results = $db->query($query);
		$row = $results->fetch_object();
	}
	
	$records = array();
	if($result = $db->query("SELECT * FROM tblkategori")){
		if($result->num_rows){
			while($rows = $result->fetch_object()){
				$records[]=$rows;
			}
			$result->free();
		}
	}
?>
<form class="form" method="post" action="" enctype="multipart/form-data">
	<label>Pilih Kategori:</label><br/>
		<select name="kategori">
			<?php
				foreach($records as $r){
					if($r->Kategori == $row->Kategori){
						echo "<option value='$r->Kategori' selected>$r->Kategori</option>";
					}else{
						echo "<option value='$r->Kategori'>$r->Kategori</option>";
					}
				}
			?>
		</select> <br/>
	<label>Kode Barang :</label> <br/>
		<input type="text" name="id" value="<?php echo $row->Id_barang;?>"/> <br/>
	<label>Nama Barang :</label> <br/>
		<input type="text" name="barang" value="<?php echo $row->Nama_barang;?>"/> <br/>
	<label>Harga Barang :</label> <br/>
		<input type="text" name="harga" value="<?php echo $row->Harga;?>"/> <br/>
	<label>Jumlah Barang :</label> <br/>
		<input type="text" name="jumlah" value="<?php echo $row->Jumlah;?>"/> <br/>
	<label>Deskripsi :</label> <br/>
		<textarea name="deskripsi"><?php echo $row->Deskripsi;?></textarea> <br/>
	<input type="file" name="file"><br/>
	<?php $file_name = $row->Foto;?>
	<input type="submit" name="btnsimpan" value="Simpan">
</form>
<?php
	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
		
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_destination = 'images/' . $file_name;
		
		if(move_uploaded_file($file_tmp, $file_destination)){
			echo $file_destination;
		}
	}
?>
<?php
	if(!empty ($_POST)){
		if(isset($_POST['kategori'],$_POST['id'],$_POST['barang'],$_POST['harga'],$_POST['jumlah'],$_POST['deskripsi'])){
			$kategori = $_POST['kategori'];
			$id = $_POST['id'];
			$barang = $_POST['barang'];
			$harga = $_POST['harga'];
			$jumlah = $_POST['jumlah'];
			$deskripsi = $_POST['deskripsi'];
		
			$query = "UPDATE tblbarang SET Kategori='$kategori',
			Id_barang='$id', Nama_barang='$barang', Harga='$harga',
			Jumlah='$jumlah', Deskripsi='$deskripsi' , Foto='$file_name'
			WHERE Id_barang='$data'";
			
			$db->query($query);
			header('location:?menu=2&mode=1&page=1&data=1');
		}
	}
?>