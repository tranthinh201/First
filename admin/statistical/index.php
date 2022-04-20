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
	<title>Quản lý đơn hàng</title>
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
	    <a class="nav-link active" href="../statistical">Quản Lý Đơn Hàng</a>
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
				<h2 class="text-center">Quản lý đơn hàng</h2>
			</div>
			<div class="panel-body">
				<form class="input-group rounded mb-3" method="post">
				    <input type="text" class="form-control rounded " placeholder="Thống kê theo tên sản phẩm..."/ name="name">
				  <span class="input-group-text border-0 " id="search-addon">
				    <input type="submit" value='Tìm kiếm'>
				  </span>
				</form>
				<form class="input-group rounded mb-3" method="post">
					<span class="input-group-text">Từ Ngày</span>
				    <input type="date" class="form-control rounded " placeholder="Thống kê theo tên sản phẩm..."/ name="date-start">
				    <span class="input-group-text">Đến Ngày</span>
				    <input type="date" class="form-control rounded " placeholder="Thống kê theo tên sản phẩm..."/ name="date-end">
				  <span class="input-group-text border-0 " id="search-addon">
				    <input type="submit" value='Tìm kiếm theo ngày'>
				  </span>
				</form>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng bán ra</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
							<th>Ngày bán</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$name = '';
							$sql = '';
							$soluong = 0;
							$tongtien = 0;
							$date_start = '';
							$date_end = '';
							if(isset($_POST['name'])) {
								$name = $_POST['name'];
								$sql = "SELECT * FROM order_product, product where order_product.id_product = product.id_product and tiltle LIKE '%".$name."%'";
							}
							else if (isset($_POST['date-start']) && isset($_POST['date-end'])) {
								$date_start = date('Y-m-d', strtotime($_POST['date-start']));
								$date_end = date('Y-m-d', strtotime($_POST['date-end']));
								$sql = 'SELECT * FROM order_product, product where order_product.created_at between "'.$date_start.' 00:00:00" and "'.$date_end.' 00:00:00"
								and order_product.id_product = product.id_product';
							}
							else {
							 	$sql = "SELECT * FROM order_product, product where order_product.id_product = product.id_product";
							}
							
							$result= executeResult($sql);
							// Số thứ tự
							$stt = 1;


							foreach ($result as $item)
							{
								echo '<tr>
										<td>'.$stt++.'</td>
										<td>'.$item['tiltle'].'</td>
										<td>'.$item['soluongod'].'</td>
										<td>' . number_format($item['price_sale'], 0, ",", ".") . '₫</td>
										<td>' . number_format($item['dongia'], 0, ",", ".") . '₫</td>
										<td>'.$item['created_at'].'</td>
									</tr>';
									$soluong += $item['soluong'];
									$tongtien += $item['dongia'];
							} 
						?>	
						<tr><td><b>Tổng tiền: <?php echo number_format($tongtien, 0, ",", ".") .'₫'; ?></b></td></tr>
						<tr><td><b>Số lượng: <?php echo number_format($soluong, 0, ",", "."); ?></b></td></tr>
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