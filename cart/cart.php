<?php 
	include('../database/dbHelper.php');
	session_start();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$action = (isset($_GET['action']) ?$_GET['action'] : "add");

	$quantily = (isset($_GET['quantily']) ?$_GET['quantily'] : 1);




	if ($quantily < 0) {
		$quantily = 1;
	}

	

	$product = 'SELECT * FROM product where id_product ='.$id;

	$result = executeResult($product);

	foreach($result as $iii) {
		$items = [
			'id'=>$iii['id_product'],
			'tiltle'=>$iii['tiltle'],
			'price_sale'=>$iii['price_sale'] < $iii['price'] ? $iii['price_sale'] : $iii['price'],
			'thumbnail'=>$iii['thumbnail'],
			'quantily' => 1
		];
	}

	if ($action == 'add') {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantily'] += $quantily;
		}
		else {
			$_SESSION['cart'][$id] = $items;
		}
	}
	if ($action == 'update') {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantily'] = $quantily;
		}
	}

	if ($action == 'delete') {
		unset($_SESSION['cart'][$id]);
	}
	

	header("location: view-cart.php");
	echo '<pre>';
	print_r($_SESSION['cart']);


?>