<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	</style>
	<link rel="stylesheet" type="text/css" href="./public/style/css_giohang.css">
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
</div>
<div class="container">
	<table>
		<caption><h3>Giỏ hàng</h3></caption>
		<tr>
			<th>Hình ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th>Tùy chọn</th>
		</tr>
		<?php
		$amount = 0;
		if (isset($_SESSION['cart'])) {
		foreach ($_SESSION['cart'] as $key => $value) {
			$amount += $value['sl'] * $value['price_after'];
		?>
		<tr>
			<td><img width="100px" src="./public/<?php echo $value['img_link'] ?>"></td>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo number_format($value['price_after']); ?></td>
			<td><?php echo $value['sl']; ?></td>
			<td><?php echo number_format($value['sl'] * $value['price_after']).' đ'; ?></td>
			<td>
				<a class="bt sub" href="?controller=xuly_cart&method=prev&id=<?php echo $value['id_product'] ?>"><i class="fas fa-minus"></i></a>
				<a class="bt add" href="?controller=xuly_cart&method=next&id=<?php echo $value['id_product'] ?>"><i class="fas fa-plus"></i></a>
				<a class="bt del" href="?controller=xuly_cart&method=del&id=<?php echo $value['id_product'] ?>"><i class="fas fa-trash"></i></a>
			</td>
		</tr>
		<?php }	} ?>
	</table>
	<div>
		<h2>Tổng tiền :<?php echo number_format($amount); ?><sup><u>vnđ</u></sup></h2>
	</div>
	<div>
		<a href="">Thanh toán</a>
	</div>
</div>
</body>
</html>