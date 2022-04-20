<?php
	include('../database/dbHelper.php');
	include('cart-function.php');
	session_start();
	$username = '';
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	$id = "";
	$fullname = "";
	$phonenumber = "";
	$address = "";
	$note = "";
	if (isset($_POST['dathang'])) {
		$fullname = $_POST['fullname'];
		$phonenumber = $_POST['phonenumber'];
		$address = $_POST['address'];
		$note = $_POST['note'];
		$sql1 = "select * from useracc where username = '$username'";
		$result = executeResult($sql1);
		foreach($result as $meme) {
			$id = $meme['id'];
		}
		$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
		$created_at = $updated_at = date('Y-m-d H:s:i');
		foreach($cart as $items) {
			$sql = 'INSERT INTO order_product(id_user, id_product, fullname, address, phonenumber, note, updated_at, created_at, soluongod, dongia) values ("'.$id.'", "'.$items['id'].'", "'.$fullname.'", "'.$address.'", "'.$phonenumber.'", "'.$note.'", "'.$updated_at.'", "'.$created_at.'", "'.$items['quantily'].'", "'.$items['price_sale'] * $items['quantily'].'")';
			$result = execute($sql);
			unset($_SESSION['cart'][$items['id']]);
		}
		header('location: succses.php');
	}
	
	
?>
<!DOCTYPE html>
<html>

<head>
	<title>Thanh toán</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/cart.css">
</head>

<body>
	<?php
		include('../front-end/header.php');
	 ?>

	<div class="container" style="margin-bottom: 200px;">
		<table>
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên</th>
					<th>Số lượng</th>
					<th>Ảnh</th>
					<th>Giá</th>
					<th>Thành tiền</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$stt = 1;
					foreach ($cart as $key => $items) {
							echo '  <tr>
									<td>' . $stt++ . '</td>
									<td>' . $items['tiltle'] . '</td>
									<td><span>'.$items['quantily'].'</span></td>
									<td><img src="../image/' . $items['thumbnail'] . '" alt="" class="image-product"></td>
									<td>' . number_format($items['price_sale'], 0, ",", ".") . '₫ </td>
									<td>' . number_format($items['price_sale'] * $items['quantily'], 0, ",", ".") . '₫ </td>
								</tr>
								<input type="hidden" value="update" name="action">
							';
						}
						
					?>
					<tr>
						<td>Tổng tiền</td>
						<td><?php echo (number_format(total_price($cart), 0, ",", ".")) ?>₫</td>
					</tr>
			</tbody>
		</table>
		<form method="post">
			<input type="text" name="fullname" required placeholder="Họ và tên">
			<input type="text" name="phonenumber" required placeholder="Số điện thoại">
			<input type="text" name="address" required placeholder="Địa chỉ">
			<input type="text" name="note" required placeholder="Ghi chú">
			<td>
				<button type="submit" name="dathang">Đặt hàng</button>
			</td>	
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