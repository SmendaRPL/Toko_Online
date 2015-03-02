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
<h1>Input Data Barang</h1>
<form class="form" method="post" action="" enctype="multipart/form-data">
	<label>Pilih Kategori:</label><br/>
		<select name="kategori">
			<?php
				foreach($records as $r){
					echo "<option value='$r->Kategori'>$r->Kategori</option>";
				}
			?>
		</select> <br/>
	<label>Kode Barang :</label> <br/>
		<input type="text" name="id"/> <br/>
	<label>Nama Barang :</label> <br/>
		<input type="text" name="barang"/> <br/>
	<label>Harga Barang :</label> <br/>
		<input type="text" name="harga"/> <br/>
	<label>Jumlah Barang :</label> <br/>
		<input type="text" name="jumlah"/> <br/>
	<label>Deskripsi :</label> <br/>
		<textarea name="deskripsi"></textarea> <br/>
	<input type="file" name="file">
	<input type="submit" name="btnsimpan" value="Simpan">
</form>
<?php
	if(isset($_FILES['file'])){
		$file = $_FILES['file'];
		
		//file properties
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_destination = 'images/'. $file_name;
		
		if(move_uploaded_file($file_tmp, $file_destination)){
			echo $file_destination;
		}
		
	}
?>
<?php
	if(isset($_POST['btnsimpan'])){
		$kategori = $_POST['kategori'];
		$id = $_POST['id'];
		$barang = $_POST['barang'];
		$harga = $_POST['harga'];
		$jumlah = $_POST['jumlah'];
		$deskripsi = $_POST['deskripsi'];
		
		if(!empty($kategori) && !empty($id) && !empty($barang) && !empty($harga) && !empty($jumlah) && !empty($deskripsi)){
			$insert = $db->prepare("INSERT INTO tblbarang
			(Kategori, Id_barang, Nama_barang, Harga, Jumlah, Deskripsi, Foto) VALUES
			(?,?,?,?,?,?,?)");
			$insert->bind_param('sssdiss', $kategori,$id,$barang,
			$harga,$jumlah,$deskripsi,$file_name);
			
			if($insert->execute()){
				header('location:?menu=2&mode=1&page=1&data=1');
				die();
			}
		}
	}
?>