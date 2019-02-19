<link href='./css/cart.css' rel='stylesheet'/> 
<div class="container">
	<?php 
	$productDetail = $dbh->prepare("SELECT gp.gambar as gambar, p.nama as nama, p.harga as harga, c.qty as qty, (c.qty* p.harga) as subtotal FROM cart c JOIN produk p on c.id_product =p.id JOIN gambar_produk gp ON c.id_product = gp.id_produk WHERE USER='$_COOKIE[user]'");
	$productDetail->execute();
	if($productDetail->rowCount()>0){
	?>
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
					<?php 
					while($row=$productDetail->fetch()) {
    				?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-md-2">
                                        <img src="<?php echo $row['gambar'] ?>" alt="..." style="height:100px; widht:100px;" class="img-responsive"/>
                                    </div>
									<div class="col-md-10">
										<h4 class='ml-10'><?php echo $row['nama'] ?></h4>
									</div>
								</div>
							</td>
							<td data-th="Price">Rp <?php echo $row['harga'] ?></td>
							<td data-th="Quantity">
								<!-- <input type="number" class="form-control text-center" value="1"> -->
								<p class=' text-center'><?php echo $row['qty'] ?></p>
							</td>
							<td data-th="Subtotal" class="text-center">Rp <?php echo $row['subtotal'] ?></td>
							<td class="actions" data-th="">
								<!-- <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button> -->
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
					<?php }
				?>
					</tbody>
					<tfoot>
						<tr>
							<td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<?php
							$totalcart = $dbh->prepare("SELECT SUM(c.qty* p.harga) as total FROM cart c JOIN produk p on c.id_product =p.id WHERE USER='$_COOKIE[user]'");
							$totalcart->execute();
							while($row2=$totalcart->fetch()) {
							?>
							<td class="hidden-xs text-center"><strong>Total Rp <?php echo $row2['total'] ?></strong></td>
							<?php } ?>
							<td><a href="checkout" class="btn btn-success btn-block">Checkout</a></td>
						</tr>
					</tfoot>
				</table>
				<?php
			}else{?>
					<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>404 HTML Template by Colorlib</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/cart-empty.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body style="">

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1><span></span></h1>
			</div>
			<h2>Oops! your cart is empty</h2>
			<a href="/">Shopping now</a>
		</div>
	</div>




</body>
					 <?php
				} 
				?>
</div>