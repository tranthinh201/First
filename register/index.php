<?php
	include('../database/dbHelper.php');
	if(isset($_POST['register'])) {
		$email = $_POST['email'];
		$address = $_POST['address'];
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];
		$confirmPass = $_POST['confirm-password'];
		$address = $_POST['address'];

		// Kiểm tra xem có bị trùng tài khoản sdt và email đăng ký hay không

		$sqls = "SELECT Count(*) FROM useracc WHERE username = '$username'";
		$result = executeResult($sqls);
		foreach($result as $ii) {
			if (empty($username)) {
				echo '<script language="javascript">alert("Bạn chưa nhập username");</script>';
			}
			else if (empty($email)) {
				echo '<script language="javascript">alert("Bạn chưa nhập email");</script>';
			}
			else if (empty($phonenumber)) {
				echo '<script language="javascript">alert("Bạn chưa nhập số điện thoại");</script>';
			}
			else if (empty($password)) {
				echo '<script language="javascript">alert("Bạn chưa nhập mật khẩu");</script>';
			}
			else if ($password != $confirmPass) {
				echo '<script language="javascript">alert("Mật khẩu không trùng khớp");</script>';
			}else if ($ii['Count(*)']  != 0) {
				echo '<script language="javascript">alert("Username đã được đăng ký");</script>';
			}
			else {
				echo '<script language="javascript">alert("Đăng ký thành công!");</script>';
				$sql = "INSERT INTO useracc (fullname, username, password, email, address, phonenumber) VALUES ('$fullname','$username','$password','$email', '$address', '$phonenumber')";
				 $result = execute($sql);
			}
		} 
	}
	
?>
<!DOCTYPE html>
<html>

<head>
	<title>Đăng ký</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/register.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>
<body>
	<?php 
		include('../front-end/header.php');
	 ?>
	<div class="container">
		<form method="POST" class="form">
			<h1 class="content">
				Đăng ký
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

					<div class="input-memer">
						<label for="">Địa chỉ</label>
						<input type="text" name="address" id="address">
					</div>
				</div>
				<div class="infor-user">
					<div class="input-memer">
						<label for="">Tài khoản</label>
						<input type="text" name="username" id="username">
					</div>

					<div class="input-memer">
						<label for="">Mật khẩu</label>
						<input type="password" name="password" id="password">
					</div>

					<div class="input-memer">
						<label for="">Xác nhận mật khẩu</label>
						<input type="password" name="confirm-password" id="confirm-password">
					</div>
				</div>

				<div class="input-memer">
					<input type="submit" value="Đăng ký" name="register" class="button-register" id="button-register">
				</div>
			</div>
		</form>
	</div>


<?php 
	include('../front-end/footer.php');
 ?>
</body>
</html>

<?php 
	include('../front-end/particel.php');
 ?>

