<?php
	include('../database/dbHelper.php');
	include('../cart/cart-function.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/slick.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/base.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</head>

<body>
	<?php 
		include '../front-end/header.php';
 	?>
	
	<div class="wrapper">
		<div class="slider">
			<button type="button" class="prev-slider button"><i class="fa fa-chevron-left"></i></button>
			<div class="slider-me">
				<div class="slider-items">
					<img src="https://cdn.tgdd.vn/2021/08/banner/800-200-800x200-98.png" alt="loading">
				</div class="slider-items">
				<div class="slider-items">
					<img src="https://cdn.tgdd.vn/2021/09/banner/800-200-800x200-57.png" alt="loading">
				</div>
				<div class="slider-items">
					<img src="https://cdn.tgdd.vn/2021/08/banner/800-200-800x200-90.png" alt="loading">
				</div>
			</div>
			<button type="button" class="next-slider button"><i class="fa fa-chevron-right"></i></button>
		</div>
		<div class="banner-slider">
			<?php
				 $sql = "select * from news";
				 $result = executeResult($sql);
				 foreach($result as $item) {
				 	echo '
				 		<div class="banner-slider-items">
							<a href="../news?id='.$item['id_news'].'"><p>'.$item['tiltle'].'</p></a>
						</div>
				 	';
				 }
			 ?>
		</div>
	</div>


	<div class="container" style="min-height: 800px;">
		<div class="list-sale-product" style="margin-bottom: 50px;">
			<div class="content-sale button-hex">
				<h1>Danh mục sản phẩm</h1>
			</div>
			<div class="product-sale-container">
				<?php
				$sql = "";
				$price_one = "";
				$price_two = "";
				$content = "";
				$name = '';
				if (isset($_GET['price']) && isset($_GET['prices'])) {
					$price_one = $_GET['price'];
					$price_two = $_GET['prices'];
					$sql = "SELECT * FROM product WHERE price_sale <= ".$price_two." AND price_sale > ".$price_one."";
					// echo $sql;
					// $content = "sản phẩm từ  ".number_format($price_one, 0, ",", ".")."₫ đến ".number_format($price_two, 0, ",", ".")."₫";
				} else if (isset($_GET['price'])) {
					$price_one = $_GET['price'];
					if ($price_one > 10000000) {
						$sql = "SELECT * FROM product WHERE price_sale =>".$price_one;
					} else {
						$sql = "SELECT * FROM product WHERE price_sale <=".$price_one;
					}
					// echo $sql;
					// $content = "sản phẩm trên ".number_format($price_one, 0, ",", ".")."₫";
				}
				else if (isset($_GET['all-product'])) {
					$sql = "SELECT * FROM product";
				}
				else if (isset($_GET['name'])) {
					$name = $_GET['name'];
					$sql = "SELECT * FROM product WHERE tiltle LIKE '%".$name."%'";
				}

		
				$productList = executeResult($sql);
				if (empty($productList)) {
					echo '<h1>Không tìm thấy sản phẩm</h1>';
				}
				foreach ($productList as $item) {
					echo '
						<div class="sale-product">
							<div class="image-product">
								<img src="../image/' . $item['thumbnail'] . '" alt="">
							</div>
							<div class="tiltle-product">
								<span>
									' . $item['tiltle'] . '
								</span>
							</div>

							<div class="product-price"> 
							<span>Giá:</span>
							<div class="price-old" style="text-decoration: line-through;"> ' . number_format($item['price'], 0, ",", ".") . ' đ </div>/
							<div class="price-new"> ' . number_format($item['price_sale'], 0, ",", ".") . '₫ </div> </div>

							<div class="infor-sale">
								<span>
									Giảm giá có quà tặng kèm
								</span>
							</div>

							<div class="add-to-cart">
							<button><a href="../cart/cart.php?id=' . $item['id_product'] . '">Thêm vào giỏ hàng</a></button>
							</div>

							<div class="details-product">
								<span><a href="../productdetails?id=' . $item['id_product'] . '">Xem thông tin chi tiết</a></span>
							</div>

						</div>
					';
				}
				?>
			</div>
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