<?php require 'cart.php';?>
<!DOCTYPE html>
<html>
	<head>
		<title>Toko Online</title>
		<link rel="stylesheet" type="text/css" href="admin/style.css"/>
	</head>
	<body>
		<header>
			<h2>Selamat Datang di Toko DyserZ</h2>
		</header>
		<section class="home-side">
			<aside class="left-side">
				<section class="admin-p"><strong><a href="admin/admin.php" class="admin-p">Admin Page</a></strong></section>
			</aside>
			<aside class="center-side">
				<section class="slider">
					<img src="admin/images/slider.JPG" class="imgslider">
				</section>
				<section class="barang">
					<div class="box">
						<?php products() ;?>
					</div>
				</section>
			</aside>
			<aside class="right-side">
				<h5 class="keranjang"> Your Shopping Cart : </h5> <br/>
				<div class="cart"><?php cart() ;?></div>
			</aside>
		</section>
		<div class="clear"></div>
		<footer>
			<h2>Copyright&copy;DyserZ</h2>
		</footer>
	</body>
</html>