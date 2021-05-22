<?php
//kiểm tra xem có tồn tại keyword trên tranh url không
if (isset($_GET['keyword']) && $_GET['keyword'] != null) {
	$keyword = $_GET['keyword'];
	//nếu tồn tại thì mình sẽ lấy dữ liệu theo tên người dùng tìm kiếm
	$product_timkiem = $db->get_like('sanpham', 'name', $keyword);
} else {
	$product = $db->get('sanpham',array());
}
//lấy dữ liệu trong bảng quanlybanhang
$product = $db->get('sanpham',array());
require_once './view/v_trangchu.php';

?>