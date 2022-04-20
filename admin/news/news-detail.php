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
	<title>Chi Tiết Tin Tức</title>
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
	    <a class="nav-link" href="../logout.php">Đăng Xuất</a>
	  </li>
	</ul>


	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Chi tiết Tin Tức</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tiêu đề</th>
							<th>Nội dung</th>
							<th>Ngày đăng</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$id = $_GET['id'];
							$sql='select * from news where id_news ='.$id;
							$result=executeResult($sql);
							// Số thứ tự
							$stt = 1;

							foreach ($result as $item)
							{
								echo '<tr>
										<td>'.($stt++).'</td>
										<td>'.$item['tiltle'].'</td>
										<td>'.$item['text'].'</td>
										<td>'.$item['created_at'].'</td>
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