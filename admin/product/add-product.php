<?php
include('../../database/dbhelper.php');
$tiltle = '';
$price = '';
$thumnail = '';
$content = '';
$idCategory = '';
$soluong = '';
$tinhtrang = '';
$giaSale = '';
$id = '';

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from product where id_product = ' . $id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$tiltle = $product['tiltle'];
		$price = $product['price'];
		$content = $product['content'];
		$soluong = $product['soluong'];
		$tinhtrang = $product['tinhtrang'];
		$giaSale = $product['price_sale'];
	}
}

if (!empty($_POST)) {
	if (isset($_POST['tiltle'])) {
		$tiltle = $_POST['tiltle'];
		$price = $_POST['price'];
		// $thumnail = $_POST['thumnail'];
		$thumnail = $_POST['uploadfile'];
		$content = $_POST['content'];
		$idCategory = $_POST['id-category'];
		$soluong = $_POST['soluong'];
		$tinhtrang = $_POST['tinhtrang'];
		$giaSale = $_POST['price-sale'];
	}

	if (isset($_POST['id_product'])) {
		$id = $_POST['id_product'];
	}
	if (!empty($tiltle)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == "") {
			$sql = 'insert into product(tiltle, price, thumbnail, content, id_category, soluong, tinhtrang, price_sale, created_at, updated_at) values ("' . $tiltle . '", "' . $price . '", "' . $thumnail . '", "' . $content . '", "' . $idCategory . '","' . $idCategory . '", "' . $tinhtrang . '", "' . $giaSale . '", "' . $created_at . '", "' . $updated_at . '")';
		} else {
			$sql = 'update product set tiltle = "' . $tiltle . '", price = "' . $price . '", thumbnail = "' . $thumnail . '",content = "' . $content . '", updated_at = "' . $updated_at . '", soluong = "' . $soluong . '", id_category = "' . $idCategory . '", tinhtrang = "' . $tinhtrang . '", price_sale = "' . $giaSale . '" where id_product = ' . $id;
		}
		execute($sql);
		header('Location: index.php');
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
						<label for="name">Tên Sản Phẩm:</label>
						<input type="text" name="id" value="<?= $id ?>" hidden="true">
						<input required="true" type="text" class="form-control" name="tiltle" value="<?= $tiltle ?>">
					</div>
					<div class="form-group">
						<label for="name">Giá Sản Phẩm:</label>
						<input required="true" type="text" class="form-control" name="price" value="<?= $price ?>">
					</div>
					<div class="form-group">
						<label for="name">Giá Sale:</label>
						<input required="true" type="text" class="form-control" name="price-sale" value="<?= $giaSale ?>">
					</div>
					<!-- <div class="form-group">
					  <label for="name">Ảnh Sản Phẩm:</label>
					  <input required="true" type="text" class="form-control" name="thumnail" value="<?= $thumnail ?>">
					</div> -->
					<div class="form-group">
						<label for="name">Ảnh Sản Phẩm:</label>
						<input required="true" type="file" class="form-control" name="uploadfile">
					</div>
					<div class="form-group">
						<label for="name">Content Sản Phẩm:</label>
						<input required="true" type="text" class="form-control" name="content" value="<?= $content ?>">
					</div>
					<div class="form-group">
						<label for="name">Loại Sản Phẩm:</label>
						<select name="id-category" class="form-select">
							<?php
							$sql          = 'select * from category';
							$categoryIDList = executeResult($sql);

							$index = 1;
							foreach ($categoryIDList as $item) {
								echo '
									<option value="' . $item['id_category'] . '">' . $item['name'] . '</option>
								';
							}
							?>
						</select>
						<div class="form-group">
							<label for="name">Số Lượng Sản Phẩm:</label>
							<input required="true" type="text" class="form-control" name="soluong" value="<?= $soluong ?>">
						</div>
						<div class="form-group">
							<label for="name">Tình trạng Sản Phẩm:</label>
							<input required="true" type="text" class="form-control" name="tinhtrang" value="<?= $tinhtrang ?>">
						</div>
					</div>
					<button class="btn btn-success mt-3">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>