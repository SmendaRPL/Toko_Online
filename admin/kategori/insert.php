<h1>Input Kategori Barang</h1>
<form class="form" method="post" action="">
	<label>Kategori :</label> <br/>
		<input type="text" name="kategori"/> <br/>
	<label>Keterangan :</label> <br/>
		<input type="text" name="keterangan"/> <br/>
	<input type="submit" name="btnsimpan" value="Simpan"/>
</form>
<?php
	if(!empty($_POST)){
		if(isset($_POST['kategori'],$_POST['keterangan'])){
			
			$kategori 	= $_POST['kategori'];
			$keterangan	= $_POST['keterangan'];
			
			if(!empty($kategori) && !empty($keterangan)){
				$insert = $db->prepare("INSERT INTO tblkategori (Kategori, Keterangan_Kategori) VALUES (?,?)");
				$insert->bind_param('ss', $kategori, $keterangan);
				
				if($insert->execute()){
					header('location:?menu=1&mode=1&page=1&data=1');
					die();
				}
			}
		}
	}
?>