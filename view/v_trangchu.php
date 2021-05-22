<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./public/style/style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="./public/style/font-awesome/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="./public/style/css_header.css">
</head>
<body>
<div class="header">
	<div class="header_top">
		<div class="header_item">
			<a href="./index.php" class="header_logo"><i class="icon-logo"></i></a>
			<div class="bordercol"></div>
			<a href="#" class="header_address">
				<p>Xem giá khuyến mãi tại</p>
				<span>La Khê, Hà Đông</span>
			</a>
			<form method="get" action="index.php" name="frm-search" class="frm-search">
				<input type="hidden" name="controller" value="trangchu">
				<input type="search" name="keyword" placeholder="Bạn tìm gì..." value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>">
				<input type="submit" name="submit" value="">
			</form>
			<a href="?controller=giohang" class="header_cart">
				<?php
					if (isset($_SESSION['qty']) && $_SESSION['qty']>0) {
						echo "<p class='qty'>".$_SESSION['qty']."</p>";
					} else {
						echo "<i class='icon-cart'></i>";
					}
				?>
				<span>Giỏ hàng</span>
			</a>
			<a href="?controller=lich-su-mua-hang" class="header_history">Lịch sử mua hàng</a>
			<div class="bordercol"></div>
			<a href="" class="header_hot">
				<p class="dotnew"><span class="animation"></span></p>
				<span class="tro-gia">Trợ giá mùa dịch giảm đến 50%</span>
			</a>
			<div class="header_listtop">
				<div class="bordercol"></div>
				<div class="divitem">
					<a href="">24<br>Công nghệ</a>
				</div>
				<div class="bordercol"></div>
				<div class="divitem">
					<a href="">Hỏi Đáp</a>
				</div>
				<div class="bordercol"></div>
				<div class="divitem">
					<a href="">Game App</a>
				</div>
			</div>
		</div>
	</div>

	<div class="header_bottom">
		<div class="header_center">
			<ul class="main_menu">
				<li></li>
			</ul>
		</div>
	</div>
</div>                                             <!-- kết thúc header -->

<div id="container">
	<div class="banner">
		<img src="./public/img/banner/1.png">
	</div>
	<div class="san-pham-hot">
		<div><p class="san-sale"><i>Săn Sale Online Mỗi Ngày</i></p></div>
		<div class="slider">
			<div class="products">
				<?php
					foreach ($product as $key => $value) {		
				?>
				<div class="product">
					<div class="item">
						<a href="#">
							<div class="item-label"><span>Trả góp 0%</span></div>
							<div class="item-img"><img src="./public/<?php echo $value['img_link'] ?>"></div>
							<strong class="detail"><?php echo $value['name'] ?></strong>
							<p><span class="price_after"><?php echo number_format($value['price_after']) ?><sup><u>đ</u></sup></span></p>
							<p class="price"><s><?php echo number_format($value['price']) ?><sup><u>đ</u></sup></s></p>
							<a href="?controller=add_giohang&id=<?php echo $value['id_product'] ?>" class="add_to_card">Mua ngay</a>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<button class="icon prew" type="button" onclick="next();"><i class="fas fa-chevron-left"></i></button>
			<button class="icon next" type="button" onclick="back();"><i class="fas fa-chevron-right"></i></button>
		</div>
	</div>
	<div class="timkiem">
		<?php
		if (isset($_GET['submit'])) {
			if(!empty($product_timkiem)) {
				echo "<div class='result'><h3 class='result_search'>Danh sách sản phẩm tìm thấy</h3></div>";
				foreach ($product_timkiem as $key => $value) {				
		?>
		<div class="product">
			<a href="#">
				<img src="./public/<?php echo $value['img_link'] ?>">
				<strong class="detail"><?php echo $value['name'] ?></strong>
				<p><span class="price_after"><?php echo number_format($value['price_after']) ?><sup><u>đ</u></sup></span></p>
				<p class="price"><s><?php echo number_format($value['price']) ?><sup><u>đ</u></sup></p>
				<a href="?controller=add_giohang&id=<?php echo $value['id_product'] ?>" class="add_to_card">Mua ngay</a>
			</a>
		</div>
		<?php }} else {
				echo "<div class='result'><h3 class='result_search'>Không tìm thấy sản phẩm phù hợp</h3></div>";
		}} ?>
	</div>
</div>
<script src="./public/style/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="./public/style/scr.js"></script>
</body>
</html>