<?php
	include('../database/dbHelper.php');
	include('../cart/cart-function.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Tin Tức</title>
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
		<div class="news">
			<?php
			$id = '';
			if (isset($_GET['id'])) {
			 	$id = $_GET['id'];
			 	$sql = "select * from news where id_news= '$id'";
			 } 

			
			$result = executeResult($sql);
			foreach($result as $item) {
				echo '
					<h1 class="tiltle">'.$item['tiltle'].'</h1>
					<p class="date">'.$item['created_at'].'</p>
					<p class="noidung">'.$item['text'].'</p>
				';
			}
		 ?>
		 
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


<style>
	.container {
		background-color: white;
	}
	
	.news {
		margin: auto;
		padding-top: 100px;
		text-align: center;
		max-width: 600px;
	}

	.tiltle {
		font-weight: bold;
		font-size: 30px;
	}

	.date {
		margin: 20px 0;
	}

	.noidung {
		font-size: 18px;
		text-align: justify;
		line-height: 2;
	}
</style>