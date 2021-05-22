<?php
session_start();
require_once './model/m_database.php';
//tạo đối tượng $db
$db = new database();
//kiểm tra trên link có controller chưa
if (isset($_GET['controller'])) {
	//nếu có thì lấy giá trị đó
	$controller = $_GET['controller'];
} else $controller = 'trangchu';
//kiểm tra biến $controller bằng gì để require file tương ứng
switch ($controller) {
	case 'trangchu':
		require_once './controller/c_trangchu.php';
		break;
	case 'giohang':
		require_once './controller/c_giohang.php';
		break;
	case 'add_giohang':
		require_once './controller/c_add_giohang.php';
		break;
	case 'xuly_cart':
		require_once './controller/c_xuly_cart.php';
		break;
	case 'thanh-toan':
		require_once './controller/c_thanh_toan.php';
		break;
	default:
		echo "Lỗi trang";
		break;
}

?>