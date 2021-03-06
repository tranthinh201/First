<?php
include('../../database/dbhelper.php');
$id_product = '';
$vixuly = '';
$manhinh = '';
$dophumau = '';
$ram = '';
$carddohoa = '';
$pin = '';
$luutru = '';
$congketnoi = '';
$cannang = '';
$hedieuhanh = '';
$mausac = '';
$id = '';


if (!empty($_POST)) {
	if (isset($_POST['vixuly'])) {
		$vixuly = $_POST['vixuly'];
		$manhinh = $_POST['manhinh'];
		$dophumau = $_POST['dophumau'];
		$ram = $_POST['ram'];
		$carddohoa = $_POST['carddohoa'];
		$pin = $_POST['pin'];
		$luutru = $_POST['luutru'];
		$congketnoi = $_POST['congketnoi'];
		$cannang = $_POST['cannang'];
		$hedieuhanh = $_POST['hedieuhanh'];
		$mausac = $_POST['mausac'];

	}
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	

	if (!empty($vixuly)) {
		$created_at = $updated_at = date('Y-m-d H:s:i');
		//Luu vao database
		if($id != '') {
			$sql = 'update productdetails set vixuly = "' . $vixuly . '", id_product = "' . $id . '", manhinh = "' . $manhinh
			 . '",dophumau = "' . $dophumau . '", ram = "' . $ram . '", carddohoa= "' . $carddohoa. '", pin = "' . $pin . '", luutru = "' . $luutru . '" , congketnoi= "' . $congketnoi. '" , cannang= "' . $cannang. '" , hedieuhanh= "' . $hedieuhanh. '", mausac= "' . $mausac. '", updated_at= "' . $updated_at. '" where id_productdetail = ' . $id;
		}
		$result = execute($sql);
		print_r($result);
		// header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id'];
	$sql      = 'select * from productdetails where id_productdetail = ' . $id;
	$product = executeSingleResult($sql);
	if ($product != null) {
		$id_product = $product['id_product'];
		$vixuly = $product['vixuly'];
		$manhinh = $product['manhinh'];
		$dophumau = $product['dophumau'];
		$ram = $product['ram'];
		$carddohoa = $product['carddohoa'];
		$pin = $product['pin'];
		$luutru = $product['luutru'];
		$congketnoi = $product['congketnoi'];
		$cannang = $product['cannang'];
		$hedieuhanh = $product['hedieuhanh'];
		$mausac = $product['mausac'];
	}
}

session_start();
if (isset($_SESSION['username'])) {
	echo '<nav class="navbar navbar-light bg-light">
			  <form class="container-fluid justify-content-start">
				<span class="label label-default">Xin ch??o : ' . $_SESSION['username'] . '</span>
			  </form>
		</nav>';
} else {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Th??m/S???a Danh M???c S???n Ph???m</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
	    <a class="nav-link" href="../category">Qu???n L?? Danh M???c</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="../product/index.php">Qu???n L?? S???n Ph???m</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../user">Qu???n L?? Ng?????i D??ng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../statistical">Qu???n L?? ????n H??ng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../news">Qu???n L?? Tin T???c</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../contact">Danh s??ch li??n h???</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../logout.php">????ng Xu???t</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Th??m s???n ph???m</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="name">Vi x??? l??:</label>
						<input type="hidden" name="id" value="<?= $id?>"  >
						<input required="true" type="text" class="form-control" name="vixuly" value="<?= $vixuly ?>">
					</div>
					<!-- <div class="form-group">
						<label for="name">Gi?? S???n Ph???m:</label>
						<input required="true" type="text" class="form-control" name="price" value="<?= $id ?>">
					</div> -->
					<div class="form-group">
						<label for="name">M??n h??nh:</label>
						<input required="true" type="text" class="form-control" name="manhinh" value="<?= $manhinh ?>">
					</div>
					<div class="form-group">
					  <label for="name">????? ph??? m??u:</label>
					  <input required="true" type="text" class="form-control" name="dophumau" value="<?= $dophumau ?>">
					</div>
					<div class="form-group">
						<label for="name">Ram:</label>
						<input required="true" type="text" class="form-control" name="ram" value="<?= $ram ?>">
					</div>
					<div class="form-group">
					  <label for="name">Card ????? ho???:</label>
					  <input required="true" type="text" class="form-control" name="carddohoa" value="<?= $carddohoa ?>">
					</div>
					<div class="form-group">
					  <label for="name">Pin:</label>
					  <input required="true" type="text" class="form-control" name="pin" value="<?= $pin ?>">
					</div>
					<div class="form-group">
					  <label for="name">L??u tr???:</label>
					  <input required="true" type="text" class="form-control" name="luutru" value="<?= $luutru ?>">
					</div>
					<div class="form-group">
					  <label for="name">C???ng k???t n???i:</label>
					  <input required="true" type="text" class="form-control" name="congketnoi" value="<?= $congketnoi ?>">
					</div>
					<div class="form-group">
					  <label for="name">C??n n???ng:</label>
					  <input required="true" type="text" class="form-control" name="cannang" value="<?= $cannang ?>">
					</div>
					<div class="form-group">
					  <label for="name">H??? ??i???u h??nh:</label>
					  <input required="true" type="text" class="form-control" name="hedieuhanh" value="<?= $hedieuhanh ?>">
					</div>
					<div class="form-group">
					  <label for="name">M??u s???c:</label>
					  <input required="true" type="text" class="form-control" name="mausac" value="<?= $mausac ?>">
					</div>
					<button class="btn btn-success mt-3">L??u</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>