<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="body-admin">
		<?php require_once('../koneksi/koneksi.php')?>
		<div class="wrapper">
			<div class="content">
				<ul>
					Barang
					<li><a href="?menu=1&mode=1&page=1&data=1">Kategori</a></li>
					<li><a href="?menu=2&mode=1&page=1&data=1">Data Barang</a></li>
				</ul>
				<ul>
					Transaksi
					<li><a href="?menu=3&mode=1&page=1&data=1">Pembelian</a></li>
					<li><a href="?menu=4&mode=1&page=1&data=1">Pembayaran</a></li>
					<li><a href="?menu=5&mode=1&page=1&data=1">Pelanggan</a></li>
				</ul>
				<ul>
					Laporan
					<li><a href="?menu=6&mode=1&page=1&data=1">Laporan Pembelian</a></li>
					<li><a href="?menu=7&mode=1&page=1&data=1">Laporan Pengiriman</a></li>
				</ul>
				<ul>
					Utilitas
					<li><a href="?menu=8&mode=1&page=1&data=1">Identitas</a></li>
					<li><a href="?menu=9&mode=1&page=1&data=1">User</a></li>
				<ul>
			</div>
			
			<h1 class="adminpage">Admin Page</h1>
			
			<div class="maincontent">
				<?php
					if(isset($_GET['menu'],$_GET['mode'],$_GET['page'],$_GET['data'])){
						$menu = $_GET['menu'];
						$mode = $_GET['mode'];
						$page = $_GET['page'];
						$data = $_GET['data'];
						
						if(isset($_GET['page'])){
							$hal=$_GET['page'];
						}else{
							$hal=1;
						}
						
						if($menu == 1 and $mode == 1 and $page = $hal and $data == 1){
							require_once("kategori/select.php");
						}
						if($menu == 1 and $mode == 2 and $page == 1 and $data == 1){
							require_once("kategori/insert.php");
						}
						if($menu == 1 and $mode == 3 and $page == 1 and $data){
							require_once("kategori/update.php");
						}
						if($menu == 1 and $mode == 4 and $page == 1 and $data){
							require_once("kategori/delete.php");
						}
						if($menu == 2 and $mode == 1 and $page = $hal and $data == 1){
							require_once("barang/select.php");
						}
						if($menu == 2 and $mode == 2 and $page == 1 and $data == 1){
							require_once("barang/insert.php");
						}
						if($menu == 2 and $mode == 3 and $page == 1 and $data){
							require_once("barang/update.php");
						}
						if($menu == 2 and $mode == 4 and $page == 1 and $data){
							require_once("barang/delete.php");
						}
						if($menu == 3 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pembelian/select.php");
						}
						if($menu == 3 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pembelian/insert.php");
						}
						if($menu == 3 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pembelian/update.php");
						}
						if($menu == 3 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pembelian/delete.php");
						}
						if($menu == 4 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pembayaran/select.php");
						}
						if($menu == 4 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pembayaran/insert.php");
						}
						if($menu == 4 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pembayaran/update.php");
						}
						if($menu == 4 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pembayaran/delete.php");
						}
						if($menu == 5 and $mode == 1 and $page == 1 and $data == 1){
							require_once("pelanggan/select.php");
						}
						if($menu == 5 and $mode == 2 and $page == 1 and $data == 1){
							require_once("pelanggan/insert.php");
						}
						if($menu == 5 and $mode == 3 and $page == 1 and $data == 1){
							require_once("pelanggan/update.php");
						}
						if($menu == 5 and $mode == 4 and $page == 1 and $data == 1){
							require_once("pelanggan/delete.php");
						}
						if($menu == 6 and $mode == 1 and $page == 1 and $data == 1){
							require_once("laporanpembelian/select.php");
						}
						if($menu == 6 and $mode == 2 and $page == 1 and $data == 1){
							require_once("laporanpembelian/insert.php");
						}
						if($menu == 6 and $mode == 3 and $page == 1 and $data == 1){
							require_once("laporanpembelian/update.php");
						}
						if($menu == 6 and $mode == 4 and $page == 1 and $data == 1){
							require_once("laporanpembelian/delete.php");
						}
						if($menu == 7 and $mode == 1 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/select.php");
						}
						if($menu == 7 and $mode == 2 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/insert.php");
						}
						if($menu == 7 and $mode == 3 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/update.php");
						}
						if($menu == 7 and $mode == 4 and $page == 1 and $data == 1){
							require_once("laporanpengiriman/delete.php");
						}
						if($menu == 8 and $mode == 1 and $page == 1 and $data == 1){
							require_once("identitas/select.php");
						}
						if($menu == 8 and $mode == 2 and $page == 1 and $data == 1){
							require_once("identitas/insert.php");
						}
						if($menu == 8 and $mode == 3 and $page == 1 and $data == 1){
							require_once("identitas/update.php");
						}
						if($menu == 8 and $mode == 4 and $page == 1 and $data == 1){
							require_once("identitas/delete.php");
						}
						if($menu == 9 and $mode == 1 and $page == 1 and $data == 1){
							require_once("user/select.php");
						}
						if($menu == 9 and $mode == 2 and $page == 1 and $data == 1){
							require_once("user/insert.php");
						}
						if($menu == 9 and $mode == 3 and $page == 1 and $data == 1){
							require_once("user/update.php");
						}
						if($menu == 9 and $mode == 4 and $page == 1 and $data == 1){
							require_once("user/delete.php");
						}
					}
				?>
			</div>
		</div>
	</body>
</html>