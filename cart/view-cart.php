<?php
	include('../database/dbHelper.php');
	include('cart-function.php');
	session_start();
	$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

?>
<!DOCTYPE html>
<html>

<head>
	<title>Giỏ hàng</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/cart.css">
</head>

<body>
	<?php 
		include('../front-end/header.php');
	 ?>

	<div class="container">
		<table>
					<?php
					$stt = 1;
					if (!empty($cart)) {
						echo '
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên</th>
								<th>Số lượng</th>
								<th>Ảnh</th>
								<th>Giá</th>
								<th>Thành tiền</th>
								<th>Chức năng</th>
							</tr>
						</thead>
						<tbody>
						';
					}
					else {
						echo '<h1>Giỏ hàng trống</h1><br>
								<a href="../index.php">Quay lại đặt hàng</a>
						';
					}
					
					foreach ($cart as $key => $items) {
						echo '  <tr>
									<td>'.$stt.'</td>
									<td>'.$items['tiltle'].'</td>
								<td>
									<form action="cart.php?action=update">
										<input type="hidden" value="' . $items['id'] . '" name="id">
										<input type="number" value="' . $items['quantily'] . '" name="quantily">
										<input type="hidden" value="update" name="action">
										<button class="btn btn-danger" type="submit">Cập nhật</button>
									</form>
								</td>
									<td><img src="../image/' . $items['thumbnail'] . '" alt="" class="image-product"></td>
									<td>' . number_format($items['price_sale'], 0, ",", ".") . '₫</td>
									<td>' . number_format($items['price_sale'] * $items['quantily'], 0, ",", ".") . '</td>
									<td><a href="cart.php?id=' . $items['id'] . '&action=delete" class="btn-danger">Xoá</a></td>
								</tr>
								';
								
							
					}
					if (!empty($cart)) {
						echo '
							<tr class="tt-clo">
								<td colspan="2">Tổng tiền</td>
								<td colspan="5">'.number_format(total_price($cart), 0, ",", ".").'₫</td>
							</tr>
							<tr style="background-color: #82ccdd;" class="tt-sp">
								<td colspan="7" class="tt-cart">
									<a href="check-out.php">Tiến hành thanh toán</a>
								</td>	
							</tr>
						';
					}
					?>
			</tbody>
		</table>
	</div>


	<?php 
		include('../front-end/footer.php');
	 ?>
</body>

</html>
	<?php 
		include('../front-end/particel.php');
	 ?>