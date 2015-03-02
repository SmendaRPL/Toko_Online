<?php
	include_once('koneksi/koneksi.php');
	require_once('cart.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pembayaran Belanja</title>
		<link rel="stylesheet" type="text/css" href="admin/style.css">
	</head>
	<body class="view">
		<div class="view_cart">
			<h2 class="pembayaran"><center>Pembayaran Belanja Anda</center></h2>
			<hr/><br/>
			<?php
				$total = 0;
				if(!empty($_SESSION)){
					foreach($_SESSION as $name => $value){
						if($value>0){
							$id = substr($name,5,strlen($name)-5);
							$query = "SELECT * FROM tblbarang WHERE Id_barang = $id";
							$results = $db->query($query);
							while($row = $results->fetch_assoc()){
								$sub = $value*$row['Harga'];
								$total = ($total+$sub);
									echo "<div class='div-gambar1'>
											<img src='admin/images/$row[Foto]' class='gambar1'>
										</div>
										<div class='target'>"
											.$row['Nama_barang']. ' x '.$value. ' @ '
											.$row['Harga']. ' = ' .number_format($sub,0)
											.'<a href="?delete='.$id.'" class="link1"> DELETE</a>'
											."<br/>
										</div><br/><br/><hr/>";
							}
						}
					}
					if($total == 0){
						echo "<a href='index.php'>Anda belum berbelanja</a> <br/>";
					}else{
						echo "Total Belanja Anda = ";
						echo "Rp ".$total."<br/>";
						echo "<a href='index.php'>Kembali Berbelanja</a>";
					}
				}else{
					echo "<a href='index.php'>Anda belum berbelanja,silahkan berbelanja terlebih dahulu</a>";
				}
				
				if(isset($_GET['delete'])){
					$_SESSION['cart_'.(int)$_GET['delete']]='0';
				}
			?>
		</div>
	</body>
</html>