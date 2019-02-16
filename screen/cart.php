<link href='./css/cart.css' rel='stylesheet'/> 
<div class="container">
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
					require_once('./src/route/config.php');
					$country = "SELECT gp.gambar as gambar, p.nama as nama, p.harga as harga, c.qty as qty, (c.qty* p.harga) as subtotal FROM cart c JOIN produk p on c.id_product =p.id JOIN gambar_produk gp ON c.id_product = gp.id_produk WHERE USER='$_COOKIE[user]'";
					$sql = mysql_query($country);
					if(mysql_num_rows($sql)>0){
					while($row = mysql_fetch_assoc($sql)) {
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
					<?php }} ?>
					</tbody>
					<tfoot>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<?php
							$totalcart = "SELECT SUM(c.qty* p.harga) as total FROM cart c JOIN produk p on c.id_product =p.id WHERE USER='$_COOKIE[user]'";
							$sqlcart = mysql_query($totalcart);
							while($row2 = mysql_fetch_assoc($sqlcart)) {
							?>
							<td class="hidden-xs text-center"><strong>Total Rp <?php echo $row2['total'] ?></strong></td>
							<?php } ?>
							<td><a href="checkout" class="btn btn-success btn-block">Checkout</a></td>
						</tr>
					</tfoot>
				</table>
</div>