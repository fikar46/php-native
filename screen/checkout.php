<body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>Checkout form</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <?php if(isset($_GET['id_product'])&&isset($_GET['number_of_product'])){
            ?>
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>
          <ul class="list-group mb-3">
              <?php
              $selectedproduk = $dbh->prepare("SELECT * FROM produk where id =$_GET[id_product]");
              $selectedproduk->execute();
              if($selectedproduk->rowCount()>0){
                while($row3 = $selectedproduk->fetch()){
              ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $row3['nama'] ?></h6>
                <small class="text-muted">qty: <?php echo $_GET['number_of_product'] ?></small>
              </div>
              <span class="text-muted">Rp <?php echo $_GET['number_of_product']*$row3['harga'] ?></span>
            </li>
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong>Rp <?php echo $_GET['number_of_product']*$row3['harga'] ?></strong>
            </li>
            <?php }} ?>
          </ul>
            <?php
            }else{?>
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <?php 	
					$cart=  $dbh->prepare("SELECT gp.gambar as gambar, p.nama as nama, p.harga as harga, c.qty as qty, (c.qty* p.harga) as subtotal FROM cart c JOIN produk p on c.id_product =p.id JOIN gambar_produk gp ON c.id_product = gp.id_produk WHERE user='$_COOKIE[user]'");
					$cart->execute();
					$count = $cart->rowCount();?>
            <span class="badge badge-secondary badge-pill"><?php echo $count?></span>
          </h4>
          <ul class="list-group mb-3">
          <?php 
					$cartList = $dbh->prepare("SELECT c.id_product as id, p.nama as nama, p.harga as harga, c.qty as qty, (c.qty* p.harga) as subtotal FROM cart c JOIN produk p on c.id_product =p.id JOIN gambar_produk gp ON c.id_product = gp.id_produk WHERE user='$_COOKIE[user]'");
          $cartList->execute();
          $get = $cartList->fetch();
          $checkoutList = array("id_product"=>"$get[id]","qty"=>"$get[qty]","subtotal"=>"$get[subtotal]");
          echo $checkoutList["id_product"] ;
					while($row = $cartList->fetch()) {
    				?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $row['nama'] ?></h6>
              </div>
              <span class="text-muted">Rp <?php echo $row['subtotal'] ?></span>
            </li>
            <?php } ?>
            
            <?php
							$totalcart = $dbh->prepare("SELECT SUM(c.qty* p.harga) as total FROM cart c JOIN produk p on c.id_product =p.id WHERE USER='$_COOKIE[user]'");
							$totalcart->execute();
							while($row2 = $totalcart->fetch()) {
							?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong>Rp <?php echo $row2['total'] ?></strong>
            </li>
            <?php } ?>
          </ul>
          <?php } ?>                  
          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form> -->
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Masukan Alamatmu </h4>
         
          <form class="needs-validation" action="./src/backend/action/checkout.php" method="post" novalidate="">
            <?php 
         if(isset($checkoutList)){
          foreach($checkoutList as $value)
          {
            echo '<input type="hidden" name="resultArray" value="'. $value. '">';
          }
         }   
            ?> 
            <input type="hidden" name="idproduct" value="<?php echo $_GET['id_product']?>"/>
            <input type="hidden" name="qty" value="<?php echo $_GET['number_of_product']?>"/>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $_COOKIE['first_name']?>" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name" value="<?php echo $_COOKIE['last_name']?>" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="<?php echo $_COOKIE['email']?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select name="state" class="custom-select d-block w-100" id="state" required="">
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input name="zip" type="text" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <input  name="buttonpress" class='btn btn-primary btn-lg btn-block' type='submit' value="Continue to checkout" />
          </form>
            
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
       
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  

</body>