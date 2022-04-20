<?php
	include('../../database/dbHelper.php');
	session_start();
	if($_SESSION['username']) {
		echo '<nav class="navbar navbar-light bg-light">
		  <form class="container-fluid justify-content-start">
		    <span class="label label-default m-2">Xin chào : '. $_SESSION['username'].'</span>
		  </form>
		</nav>';
	}
	else {
		header('Location:../index.php');
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Tin Tức</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
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
	    <a class="nav-link" href="../product/index.php">Quản Lý Sản Phẩm</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../user">Quản Lý Người Dùng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../statistical">Quản Lý Đơn Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="../news">Quản Lý Tin Tức</a>
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
				<h2 class="text-center">Quản Lý Tin Tức</h2>
			</div>
			<div class="panel-body">
				<a href="add-news.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Tin Tức</button>
				</a>
				<form class="input-group rounded mb-3" method="post">
				    <input type="text" class="form-control rounded " placeholder="Tìm kiếm tin tức..."/ name="name">
				  <span class="input-group-text border-0 " id="search-addon">
				    <input type="submit" value='Tìm kiếm'>
				  </span>
				</form>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tiêu đề</th>
							<th>Ngày Đăng</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$name_product = '';
							$sql = '';
							if (isset($_POST['name'])) {
								$name = $_POST['name'];
								$sql = "SELECT * FROM news WHERE tiltle LIKE '%".$name."%'";
							}
							else {
								$sql='select * from news';
							}
							
							$result=executeResult($sql);
							// Số thứ tự
							$stt = 1;


							foreach ($result as $item)
							{
								echo '<tr>
										<td>'.$stt++.'</td>
										<td>'.$item['tiltle'].'</td>
										<td>'.$item['updated_at'].'</td>
										<td style="width:50px;">
											<a href="add-news.php?id='.$item['id_news'].'"><button class="btn btn-warning" style="width:100%;">Sửa</button></a>
											<button class="btn btn-danger" onclick="deleteProduct('.$item['id_news'].')" style="width:100%;">Xoá</button>
											<a href="news-detail.php?id='.$item['id_news'].'"><button class="btn btn-warning">Xem chi tiết</button></a>
										</td>
									</tr>';
							} 
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

<style>
	.btn {
		margin-bottom: 20px;
	}
</style>
<script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá tin tức này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('delete-news.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>