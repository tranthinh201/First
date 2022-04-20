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
	<title>Chi Tiết Sản Phẩm</title>
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
				<h2 class="text-center">Chi tiết sản phẩm</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Vi xử lý</th>
							<th>Màn hình</th>
							<th>Độ phủ màu</th>
							<th>Ram</th>
							<th>Card đồ hoạ</th>
							<th>Pin</th>
							<th>Lưu trữ</th>
							<th>Cổng kết nối</th>
							<th>Cân nặng</th>
							<th>Màu sắc</th>
							<th>Chức năng</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$id = $_GET['id'];
							$sql='select * from product, category, productdetails  where category.id_category = product.id_category and product.id_product = productdetails.id_product and product.id_product ='.$id;
							$result=executeResult($sql);
							// Số thứ tự
							$stt = 1;

							foreach ($result as $item)
							{
								echo '<tr>
										<td>'.($stt++).'</td>
										<td>'.$item['vixuly'].'</td>
										<td>'.$item['manhinh'].'</td>
										<td>'.$item['dophumau'].'</td>
										<td>'.$item['ram'].'</td>
										<td>'.$item['carddohoa'].'</td>
										<td>'.$item['pin'].'</td>
										<td>'.$item['luutru'].'</td>
										<td>'.$item['congketnoi'].'</td>
										<td>'.$item['cannang'].'</td>
										<td>'.$item['mausac'].'</td>
										<td>
											<a href="update-productdetail.php?id='.$item['id_productdetail'].'"><button class="btn btn-warning">Sửa</button></a>
											<button class="btn btn-danger" onclick="deleteProductDetail('.$item['id_productdetail'].')">Xoá</button>
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
		function deleteProductDetail(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('delete-productdetail.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>