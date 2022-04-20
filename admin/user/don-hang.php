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
	<title>Quản Lý Người Dùng</title>
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
	    <a class="nav-link active" href="../user">Quản Lý Người Dùng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../statistical">Quản lý đơn hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../news">Quản Lý Tin Tức</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../contact">Danh sách liên hệ</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../logout.php">Đăng xuất</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thông tin đơn hàng</h2>
			</div>
			<div class="panel-body">
				<a href="index.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Trở về</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Họ và tên</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$id = '';
							if (isset($_GET['id'])) {
								$id = $_GET['id'];
							}
							$sql = "select * from order_product, product where order_product.id_product = product.id_product and id_user = '$id'";
							$result= executeResult($sql);
							
							// Số thứ tự
							$stt = 1;


							foreach ($result as $item)
							{
								echo '<tr>
										<td>'.$stt++.'</td>
										<td>'.$item['tiltle'].'</td>
										<td>'.$item['fullname'].'</td>
										<td>'.$item['phonenumber'].'</td>
										<td>'.$item['address'].'</td>
										<td>'.$item['soluongod'].'</td>
										<td><b>' . number_format($item['dongia'], 0, ",", ".") . '₫</b></td>
									</tr>';
							} 
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- 
	<div class="container" style="margin-top: 60px">
		<div class="row">
			<ul class="pagination">
			<?php
			 for ($i=1;$i<=$pages;$i++)
			 {
			 	echo '
				  
				  	<li class="page-item"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>

				';
			 } 
			?>

			</ul>
		</div>
	</div> -->
</body>
</html>

<style>
	.btn {
		margin-bottom: 20px;
	}
</style>
<script type="text/javascript">
		function deleteProduct(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('delete-user.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>