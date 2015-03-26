<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | InMarket	</title>
    <link href="<?php echo base_url();?>market/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>market/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>market/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>market/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo asset_url();?>icon/ikon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>market/images/ico/apple-touch-icon-57-precomposed.png">
    <script type='text/javascript'>
		document.getElementById('myImage').src = "newImage.png";
		document.getElementById('myImage').onload = function() {
			alert("done");
		}
		document.getElementById('myImage').onerror = function() {
			alert("Inserting alternate");
			document.getElementById('myImage').src = "alternate.png";
		}
	</script>
    <style>
        .item-image-container {
            width: 256px;
            height: 256px;
            margin: auto;
        }

        .item-image-container img {
            max-height: 100%;
            max-width: 100%;
        }
    </style>
</head>
<!--/head-->

<body>
	<!--header-->
	<header id="header">
		<!--header_top-->
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a ><i class="fa fa-phone"></i> +62 85 66 96 421</a></li>
								<li><a href="mailto:inmarket@gmail.com"><i class="fa fa-envelope"></i> inmarket@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<!--header-middle-->
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url();?>in_market"><img src="<?php echo base_url();?>market/images/home/coba1.png" alt="" /></a>
						</div>



						<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url();?>in_market" class="active">Home</a></li>
								<li ><a href="<?php echo base_url();?>in_market/contact_us">Contacs<i ></i></a></li>
								</ul>
				</div>
					<div class="col-sm-8">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" id="mySelect" onchange="keyPress()" value="<?=$cari?>"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->


	</header>
	<!--/header-->

	<!--slider-->
	<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<?php $x = 0; foreach ( $headline->result() as $row ) {
							?>
							<div class="item <?php if (++$x == 1) echo "active";?>">
								<div class="col-sm-6">
									<h1><span>In</span>Market</h1>
									<h2><?=$row->NAMA_BARANG?></h2>
									<p><?=$row->KETERANGAN?></p>
									<button class="btn btn-default get">Tersedia</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?><?=$row->GAMBAR?>" class="girl img-responsive" alt="" />
								</div>
							</div>
							<?php if ($x > 3) break; } ?>
							<!-- <div class="item active">
								<div class="col-sm-6">
									<h1><span>In</span>Market</h1>
									<h2>Shampoo Lifebuoy</h2>
									<p>Bagi anda yang ingin berambut Hitam dan Lebat, pakailah shampoo ini..</p>
									<button class="btn btn-default get">Tersedia</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>market/images/home/shampo1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>In</span>Market</h1>
									<h2>Pembersih Wajah Biore</h2>
									<p>Anda seorang Pria? Aktif dalam berkegiatan? Energik? Coba produk yang satu ini.</p>
									<button class="btn btn-default get">Tersedia</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>market/images/home/biore.jpg" class="girl img-responsive" alt="" />

								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>In</span>Market</h1>
									<h2>Deterjen Rinso dengan Pewangi Molto</h2>
									<p>Ingin baju Anda selembut sutra? Gunakan produk ini untuk mencucinya.</p>
									<button class="btn btn-default get">Tersedia</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url();?>market/images/home/rinso.jpg" class="girl img-responsive" alt="" />

								</div>
							</div> -->

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">

				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<!--category-productsr-->
						<div class="panel-group category-products" id="accordian">
							<?php foreach ( $kategori->result() as $row ) {
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url();?>in_market/kategori/<?=$row->ID_KATEGORI?>"><?=$row->NAMA_KATEGORI?></a></h4>
								</div>
							</div>
							<?php } ?>
							<!-- <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Sportswear</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Mens</a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Womens</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div> -->
						</div>
						<!--/category-products-->

					</div>
				</div>

				<div class="col-sm-9 padding-right">

					<!--features_items-->
					<div class="features_items">
						<h2 class="title text-center">Items</h2>

						<?php $x=0; foreach ( $promo->result() as $row ) {
						if ($x%3 == 0)
							echo'<div class="row">';
						$x++;
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<div class="item-image-container">
                                                <img src="<?php echo base_url();?><?=$row->GAMBAR?>" alt="" />
                                            </div>
											<h2>Rp <?php echo ($row->HARGA_JUAL - ($row->HARGA_JUAL * $row->DISKON / 100));?></h2>
											<p><?=$row->NAMA_BARANG?></p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp <?=$row->HARGA_JUAL?></h2>
												<!-- <p>Kamu hemat Rp <?php echo ($row->HARGA_JUAL * $row->DISKON / 100);?></p>
												<p>Rp <?php echo ($row->HARGA_JUAL - ($row->HARGA_JUAL * $row->DISKON / 100));?></p> -->
												<p><?=$row->NAMA_BARANG?></p>
												<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
											</div>
										</div>

									<?php if ( $row->STATUS == 1 ) { ?>
									<img src="<?php echo base_url();?>market/images/home/sale.png" class="sale" alt="" />
									<?php } else if ( $row->STATUS == 0 ) { ?>
									<img src="<?php echo base_url();?>market/images/home/new.png" class="new" alt="" />
									<?php } ?>
								</div>
							</div>
						</div>
						<?php
						if ($x%3 == 0)
							echo'</div>';

						} ?>

						<!-- <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url();?>market/images/home/sikatgigi.jpg" alt="" />
											<h2>Rp 3500</h2>
											<p>Sikat Gigi Pepsodent</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp 3500</h2>
												<p>Sikat Gigi Pepsodent</p>
												<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url();?>market/images/home/biorekecil.jpg" alt="" />
										<h2>Rp 7500</h2>
										<p>Sabun Biore</p>
										<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp 7500</h2>
											<p>Sabun Biore</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url();?>market/images/home/closeup.jpg" alt="" />
										<h2>Rp 10000</h2>
										<p>Pasta Gigi CloseUp</p>
										<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp 10000</h2>
											<p>Pasta Gigi CloseUp</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url();?>market/images/home/biorerefill.jpg" alt="" />
										<h2>Rp 18000</h2>
										<p>Sabun Biore</p>
										<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp 18000</h2>
											<p>Sabun Biore</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
									</div>
									<img src="<?php echo base_url();?>market/images/home/new.png" class="new" alt="" />
								</div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url();?>market/images/home/liferefill.jpg" alt="" />
										<h2>Rp 18000</h2>
										<p>Sabun Lifebuoy</p>
										<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp 18000</h2>
											<p>Sabun Lifebuoy</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
									</div>
									<img src="<?php echo base_url();?>market/images/home/sale.png" class="new" alt="" />
								</div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="<?php echo base_url();?>market/images/home/pepsodent.jpg" alt="" />
										<h2>Rp 5000</h2>
										<p>Pasta Gigi Pepsodent</p>
										<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">

											<h2>Rp 5000</h2>
											<p>Pasta Gigi Pepsodent</p>
											<a href="#" class="btn btn-default add-to-cart">Tersedia</a>
										</div>
									</div>
								</div>

							</div>
						</div> -->

					</div>
					<!--features_items-->

				</div>
			</div>
		</div>
	</section>

	<!--Footer-->
	<footer id="footer">

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 InMarket. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="<?php echo base_url()?>in_market/">InMarket</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->



    <script src="<?php echo base_url();?>market/js/jquery.js"></script>
	<script src="<?php echo base_url();?>market/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>market/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>market/js/price-range.js"></script>
    <script src="<?php echo base_url();?>market/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>market/js/main.js"></script>

    <script>
        function keyPress() {
            var val = $('#mySelect').val();
            window.location.replace("<?php echo base_url();?>in_market/cari/"+val);
        }
    </script>

</body>
</html>
