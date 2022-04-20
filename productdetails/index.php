<?php
	include('../database/dbHelper.php');
	session_start();
	$id = $_GET['id'];
	$sql = 'select * from category, product, productdetails where product.id_product = productdetails.id_product and category.id_category = product.id_category and product.id_product = '.$id;
	$result = executeResult($sql);
	$id_product = '';
	$price_product = '';
	foreach($result as $items) {
		$id_product = $items['id_product'];
		$price_product = $items['price_sale'];
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Chi tiết sản phẩm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/productdetails.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php 
		include('../front-end/header.php');
	 ?>
	<div class="container">
		<div class="product-detail">
			<div class="product-detail-container">
			<?php
				$id = $_GET['id'];
				$sql = 'select * from category, product, productdetails where product.id_product = productdetails.id_product and category.id_category = product.id_category and product.id_product = '.$id;
				$result = executeResult($sql);
				foreach($result as $items) {
					echo '
								<div class="image-prateails">
									<img src="../image/'.$items['thumbnail'].'" alt="">
								</div>
								<ul>
									<li class="flex-ct"><strong>Hãng: </strong><img src="../image/'.$items['image_category'].'" alt="'.$items['name'].'"></li>
									<li><strong>Tên máy: </strong>'.$items['tiltle'].'</li>
									<li><strong>Giá: </strong>'.number_format($items['price_sale'],0,",",".").' VND</li>
									<li><strong>Vi xử lý: </strong>'.$items['vixuly'].'</li>
									<li><strong>Màn hình: </strong>'.$items['manhinh'].'</li>
									<li><strong>Độ phủ màu: </strong>'.$items['dophumau'].'</li>
									<li><strong>Ram: </strong>'.$items['ram'].'</li>
									<li><strong>Card đồ hoạ: </strong>'.$items['carddohoa'].'</li>
									<li><strong>Pin: </strong>'.$items['pin'].'</li>
									<li><strong>Bộ nhớ: </strong>'.$items['luutru'].'</li>
									<li><strong>Cổng kết nối: </strong>'.$items['congketnoi'].'</li>
									<li><strong>Cân nặng: </strong>'.$items['cannang'].'</li>
									<li><strong>Màu sắc: </strong>'.$items['mausac'].'</li>
								</ul>			
							';
							
						}
						?>
						<div class="insurance">
							<div class="content-insurance">
								<h3>Bảo hành</h3>
							</div>
							<div class="infor-insurance">
								<ul>
									<li>Sản phẩm bảo hành<span> chính hãng</span></li>
									<li>Bảo hành<span> 12 tháng tại TTBH</span></li>
									<li><span>Áp dụng chính sách Bảo hành tại nhà 24/7 (Hotline: 0964997201)</span></li>
									<li>Đổi mới trong 15 ngày đầu tiiên</li>
								</ul>
							</div>
							<div class="infor-insurance">
								<p>
									Từ 22/12 - 31/12 giảm 1.000.000đ khi mua laptop Gamming
								</p>
							</div>
						</div>
				</div>
				<div class="btn-link">
					<div class="price-product">
						<span>Giá: <?php echo number_format($price_product,0,",",".")?>VND</span>
					</div>
					<input type="hidden" value="<?php echo $id_product?>" name="id">
					<button class="btn-cart"><a href = "../cart/cart.php?id=<?php echo $id_product?>">Thêm vào giỏ hàng</a></button>
				</div>
		</div>
	</div>

	<?php 
		include('../front-end/footer.php');
	 ?>
</body>

</html>


<div id="particles-js" style="background-color: #dff9fb; position: fixed; left: 0; right: 0; bottom: 0; top: 0; z-index: -1;"></div>
<script src="../js/particles.js"></script>
<script>
	particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#1995eb"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#92dcb0",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>