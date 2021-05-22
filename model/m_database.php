<?php
class database{
	protected $conn = null;
	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = '';
	protected $name = 'quanlybanhang';
	public function connect(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
		if (!$this->conn) {
			echo "Kết nối thất bại";
			exit();
		}
	}
	public function __construct(){
		$this->connect();
	}
	//xây dựng hàm lấy dữ liệu có hoặc không có điều kiện
	public function get($table, $condition = array()){
		//bước 1 tạo cấu trúc lệnh truy vấn
		$sql = "SELECT * FROM $table";
		//bước 2 kiểm tra xem có điều kiện không và nối chuỗi tương ứng
		if (!empty($condition)) {
			$sql.= " WHERE";
			foreach ($condition as $key => $value) {
				$sql.= " $key = '$value' AND";
			}
			$sql = trim($sql, 'AND');
		}
		//bước 3 chạy câu lệnh sql
		$query = mysqli_query($this->conn, $sql);
		//bước 4 tạo biến mảng để lạp hết dữ liệu của câu truy vấn vào biến mảng đó
		$result = array();
		if ($query) {
			while ($row = mysqli_fetch_assoc($query)) {
				$result[] = $row;
			}
		}
		//bước 5 trả về giá trị
		return $result;
	}
	public function get_like($table, $column, $value){
		//bước 1 khởi tạo cấu trúc câu lệnh truy vấn
		$sql = "SELECT * FROM $table";
		//bước 2 cộng chuỗi phần điều kiện like
		$sql .= " WHERE $column LIKE '%$value%'";
		//bước 3 chạy câu lệnh
		$query = mysqli_query($this->conn, $sql);
		//bước 4 khởi tạo 1 biến mảng và lặp hết dữ liệu lấy được từ câu truy vấn ở trên vào mảng đó
		$result = array();
		if ($query) {
			while ($row = mysqli_fetch_assoc($query)) {
				$result[] = $row;
			}
		}
		//bước 5 trả kết quả
		return $result;
	}
}
?>