<?php
include('../../database/dbhelper.php');
$id_product = '';
$vixuly = '';
$manhinh = '';
$dophumau = '';
$ram = '';
$carddohoa = '';
$pin = '';
$luutru = '';
$congketnoi = '';
$cannang = '';
$hedieuhanh = '';
$mausac = '';
$id = '';

if (isset($_GET['id'])) {
	$id   = $_GET['id'];
}



if (!empty($_POST)) {
	if (isset($_POST['vixuly'])) {
		$vixuly = $_POST['vixuly'];
		$manhinh = $_POST['manhinh'];
		$dophumau = $_POST['dophumau'];
		$ram = $_POST['ram'];
		$carddohoa = $_POST['carddohoa'];
		$pin = $_POST['pin'];
		$luutru = $_POST['luutru'];
		$congketnoi = $_POST['congketnoi'];
		$cannang = $_POST['cannang'];
		$hedieuhanh = $_POST['hedieuhanh'];
		$mausac = $_POST['mausac'];

	}


	if (!empty($vixuly)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id != '') {
			$sql = 'insert into productdetails(vixuly, id_product, manhinh, dophumau, ram, carddohoa, pin, luutru, congketnoi, cannang, hedieuhanh, mausac, created_at, updated_at) values ("' . $vixuly . '", "' . $id . '", "' . $manhinh . '", "' . $dophumau . '", "' . $ram . '", "' . $carddohoa . '","' . $pin . '", "' . $luutru . '", "' . $congketnoi . '", "' . $cannang . '","' . $hedieuhanh . '", "' . $mausac . '", "' . $created_at . '", "' . $updated_at . '")';
			var_dump($sql);
			execute($sql);
			header('Location: index.php');
		} 
		
	}
}

session_start();
if (isset($_SESSION['username'])) {
	echo '<nav class="navbar navbar-light bg-light">
			  <form class="container-fluid justify-content-start">
				<span class="label label-default">Xin chào : ' . $_SESSION['username'] . '</span>
			  </form>
		</nav>';
} else {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="../category">Quản Lý Danh Mục</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="../product/index.php">Quản Lý Sản Phẩm</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../user">Quản Lý Người Dùng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../statistical">Quản Lý Đơn Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../news">Quản Lý Tin Tức</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../contact">Danh sách liên hệ</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../logout.php">Đăng Xuất</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm sản phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="name">Vi xử lý:</label>
						<input type="hidden" name="id" value="<?= $id?>"  >
						<input required="true" type="text" class="form-control" name="vixuly">
					</div>
					<!-- <div class="form-group">
						<label for="name">Giá Sản Phẩm:</label>
						<input required="true" type="text" class="form-control" name="price" value="<?= $id ?>">
					</div> -->
					<div class="form-group">
						<label for="name">Màn hình:</label>
						<input required="true" type="text" class="form-control" name="manhinh">
					</div>
					<div class="form-group">
					  <label for="name">Độ phủ màu:</label>
					  <input required="true" type="text" class="form-control" name="dophumau">
					</div>
					<div class="form-group">
						<label for="name">Ram:</label>
						<input required="true" type="text" class="form-control" name="ram">
					</div>
					<div class="form-group">
					  <label for="name">Card đồ hoạ:</label>
					  <input required="true" type="text" class="form-control" name="carddohoa">
					</div>
					<div class="form-group">
					  <label for="name">Pin:</label>
					  <input required="true" type="text" class="form-control" name="pin">
					</div>
					<div class="form-group">
					  <label for="name">Lưu trữ:</label>
					  <input required="true" type="text" class="form-control" name="luutru">
					</div>
					<div class="form-group">
					  <label for="name">Cổng kết nối:</label>
					  <input required="true" type="text" class="form-control" name="congketnoi">
					</div>
					<div class="form-group">
					  <label for="name">Cân nặng:</label>
					  <input required="true" type="text" class="form-control" name="cannang" >
					</div>
					<div class="form-group">
					  <label for="name">Hệ điều hành:</label>
					  <input required="true" type="text" class="form-control" name="hedieuhanh">
					</div>
					<div class="form-group">
					  <label for="name">Màu sắc:</label>
					  <input required="true" type="text" class="form-control" name="mausac" >
					</div>
					<button class="btn btn-success mt-3">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>