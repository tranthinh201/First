<?php
    include('../database/dbHelper.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lịch sử mua hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/cart.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
    <?php 
        include('../front-end/header.php');
     ?>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Ngày</th>
                    <th>Tình trạng</th>
                </tr>
            </thead>
            <tbody>
        <?php 
            session_start();
            $id = '';
            $username = '';
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            }

            
            $sql = "select * from order_product, product, useracc where product.id_product = order_product.id_product and useracc.username='$username'";
            
            $kq = executeResult($sql);
            
            $stt = 1;
            foreach($kq as $item) {
                echo '  <tr>
                        <td>'.$stt++.'</td>
                        <td>'.$item['tiltle'].'</td>
                        <td>'.$item['created_at'].'</td>
                        <td>Thành công!</td>
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

