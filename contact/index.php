<?php
	include('../database/dbHelper.php');
	include('../cart/cart-function.php');
session_start();
	if(isset($_POST['register'])) {	
		$fullname = '';
		$email = $_POST['email'];
		if (isset($_POST['fullname'])) {
			$fullname = $_POST['fullname'];
		}
		
		$phonenumber = $_POST['phonenumber'];
		$note = $_POST['text'];
		$product = $_POST['product'];
		$created_at = $updated_at = date('Y-m-d H:s:i');
		// Kiểm tra xem có bị trùng tài khoản sdt và email đăng ký hay khôn;
				$sql = "INSERT INTO contact (fullname, email, note, sdt, product, created_at, updated_at) VALUES ('$fullname','$email','$note','$phonenumber','$product' ,'$created_at','$updated_at')";
				 $result = execute($sql);

	}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Liên hệ</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../css/register.css">
	<link rel="stylesheet" href="../css/base.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>
	<?php 
		include '../front-end/header.php';
 	?>
	
		
	<div class="container" style="min-height: 800px;">
		<div class="container-form">
			<form method="POST" class="form">
			<h1 class="content">
				Liên hệ
			</h1>
			<div>
				<div class="input-group">
					<div class="input-memer">
						<label for="">Họ và tên</label>
						<input type="text" name="fullname" id="fullname">
					</div>
					<div class="input-memer">
						<label for="">Email</label>
						<input type="text" name="email" id="email">
					</div>
				</div>

				<div class="input-group">
					<div class="input-memer">
						<label for="">Số điện thoại</label>
						<input type="text" name="phonenumber" id="phonenumber">
					</div>
				</div>
				<div class="infor-user">
					<div class="input-memer">
						<label for="">Sản phẩm quan tâm</label>
						<input type="text" name="product" id="username">
					</div>

					<div class="input-memer">
						<label for="">Ghi chú</label>
						<input type="text" name="text" id="password">
					</div>
				</div>

				<div class="input-memer">
					<input type="submit" value="Đăng ký" name="register" class="button-register" id="button-register">
				</div>
			</div>
		</form>
		</div>
 	 
 
  
		
	</div>
	<?php 
		include '../front-end/footer.php';
 	?>
</body>

</html>

<script src="../js/slick.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../jquery-3.5.1.min.js"></script>

<script>
	$('.slider-me').slick({
		responsive: [{
				breakpoint: 768,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 3
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '40px',
					slidesToShow: 1
				}
			}
		],
		prevArrow: $('.prev-slider'),
		nextArrow: $('.next-slider')
	});
</script>

<?php 
	include '../front-end/particel.php';
 ?>
