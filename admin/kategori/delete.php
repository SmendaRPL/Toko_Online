<h1>Hapus Kategori Barang</h1>
	
	<?php
		if(isset($_GET['data'])){
			$data=$_GET['data'];
			$query="DELETE FROM tblkategori WHERE Kategori='$data'";
			$results = $db->query($query);
			header('location:?menu=1&mode=1&page=1&data=1');
		}
	?>