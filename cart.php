<?php
	session_start();
	
	
	require_once('koneksi/koneksi.php');
	
	
	if(isset($_GET['beli'])){
		if(empty($_SESSION['cart_'.$_GET['beli']])){
			$_SESSION['cart_'.$_GET['beli']]=1;
		}else{
			$id = $_GET['beli'];
			$query = "SELECT * FROM tblbarang WHERE Id_barang = $id";
			$results = $db -> query($query);
			$row = $results->fetch_assoc();
			if($row['Jumlah'] > $_SESSION['cart_'.$_GET['beli']]){
				$_SESSION['cart_'.$_GET['beli']]+=1;
			}
		}
	}
	
	if(isset($_GET['remove'])){
		$_SESSION['cart_'.(int)$_GET['remove']]--;
	}
	
	if(isset($_GET['delete'])){
		$_SESSION['cart_'.(int)$_GET['delete']]='0';
	}
	
	if(isset($_GET['kosongkan'])){
		session_destroy();
		header ('Location: index.php');
	}
	
	function cart(){
		global $db;
		$total = 0;
		foreach($_SESSION as $name => $value){
			if($value>0){
				$id = substr($name,5,strlen($name)-5);
				$query = "SELECT * FROM tblbarang WHERE Id_barang = '$id'";
				$results = $db -> query($query);
				while($row = $results->fetch_assoc()){
					$sub = $value*$row['Harga'];
					$total = ($total+$sub);
						echo $row['Nama_barang']. ' x ' .$value. ' @ '
						.$row['Harga']. ' = ' .number_format($sub,0)
						."<br/>".'<a href="?beli='.$id.'" class="link1">[ + ] </a>'
						.'<a href="?remove='.$id.'" class="link1">[ - ] </a>'
						.'<a href="?delete='.$id.'" class="link1">DELETE</a>'
						."<br/>"."<br/>";
				}
			}
		}if($total == 0){
			echo "Anda belum berbelanja <br/>";
		}else{
			echo "Total = ";
			echo "Rp ".$total."<br/>";
			echo "<a href='?kosongkan'>Kosongkan Keranjang</a> <br/>";
			echo "<a href='view_cart.php'>Bayar</a>";
		}
	}
	
	function products(){
		global $db;
		
		$query='SELECT * FROM tblbarang';
		$result=$db->query($query);
		$total=$result->num_rows;
		$data=3;
		$jumlahhalaman=ceil($total/$data);
				
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			$mulai = ($_GET['page']-1) * $data;
		}else{
			$mulai = 0;
			$page= 1;
		}
		
		echo "<br/>";
		
		$query = "SELECT * FROM tblbarang WHERE Jumlah > 0 ORDER BY Nama_barang ASC LIMIT $mulai,$data";
		$results = $db->query($query);
		
		if($results->num_rows){
			while($row = $results->fetch_array()){
				echo "<div class='barang1'>";
					echo "<section class='price'>Rp ".$row[5]."</section><br/>";
					echo "<img src='admin/images/$row[6]' class='gambar'>"."<br/>";
					echo "<h4>".$row[1]."</h4><br/>";
					echo "Kode : ".$row[0]."<br/>";
					echo "Deskripsi : ".$row[2]."<br/>";
					echo "<a href='?beli=$row[0]'> <section class='buy'>Add to Cart</section> </a>";
					echo "<img src='admin/images/active-state.PNG' class='active-state'>";
				echo "</div>";
			}
		} else {
			echo "Stok Kosong";
		}
		
		if($page > 1){
			echo "<a class='pagging' href='?page=";
			echo $page-1;
			echo "'>";
			echo "Mundur";
			echo "</a>";
			echo "&nbsp &nbsp";
		}
							
		for($a=1; $a<=$jumlahhalaman; $a++){
			echo "<a class='pagging' href='?page=$a'>$a</a>";
			echo "&nbsp &nbsp";
		}
							
		if($page <$jumlahhalaman){
			echo "<a class='pagging' href='?page=";
			echo $page+1;
			echo "'>";
			echo "Maju";
			echo "</a>";
		}
	}
?>