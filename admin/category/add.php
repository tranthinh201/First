<?php
	include ('../../database/dbHelper.php');

$id = $name = $image = '';
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['image'])) {
		$image = $_POST['image'];
	}

	if (!empty($name)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into category(name, image_category, created_at, updated_at) values ("'.$name.'", "'.$image.'", "'.$created_at.'", "'.$updated_at.'")';
		} else {
			$sql = 'update category set name = "'.$name.'", image_category = "'.$image.'", updated_at = "'.$updated_at.'" where id_category = '.$id;
		}

		execute($sql);
		header('location: index.php');
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from category where id_category = '.$id;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$name = $category['name'];
	}
}
session_start();
	echo '<nav class="navbar navbar-light bg-light">
		  <form class="container-fluid justify-content-start">
		    <span class="label label-default">Xin chào : '. $_SESSION['username'].'</span>
		  </form>
	</nav>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Danh Mục Sản Phẩm</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

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
	    <a class="nav-link active" href="../category">Quản Lý Danh Mục</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../product">Quản Lý Sản Phẩm</a>
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
				<h2 class="text-center">Thêm/Sửa Danh Mục Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Danh Mục:</label>
					  <input type="text" name="id" value="<?=$id?>">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
					<div class="form-group">
					  <label for="name">Ảnh Danh Mục:</label>
					  <input required="true" type="file" class="form-control" name="image">
					</div>
					<button class="btn btn-success mt-3">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>