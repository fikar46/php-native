<!-- Page Content -->
<div class="container">
<?php 
require_once('./src/route/config.php');
$country = "SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id WHERE p.id = $_GET[id]";
$sql = mysql_query($country);
if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)) {
    ?>
    <!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3"><?php echo $row['nama']?>
</h1>

<!-- Portfolio Item Row -->
<div class="row">

  <div class="col-md-8">
  <?php 
      require_once('./src/route/config.php');
      $image = "SELECT gp.gambar as gambar ,gp.gambar2 as gambar2, gp.gambar3 as gambar3 FROM produk p JOIN gambar_produk gp on p.id = gp.id_produk where p.id = $row[id]";
      $sql2 = mysql_query($image);
      if(mysql_num_rows($sql2)>0){
        while($row2 = mysql_fetch_assoc($sql2)){
          ?>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   
    <div class="carousel-item detail active">
      <img class="img-fluid d-block w-100" src="<?php echo $row2['gambar']?>" alt="First slide">
    </div>
    <?php if(isset($row2['gambar2'])){
    ?>
          <div class="carousel-item detail">
            <img class="d-block w-100" src="<?php echo $row2['gambar2']?>" alt="Second slide">
          </div>
      <?php
      }elseif(isset($row2['gambar3'])) {
        ?>
    <div class="carousel-item detail">
        <img class="d-block w-100" src="<?php echo $row2['gambar3']?>" alt="Third slide">
    </div>
        <?php
      }
      if (isset($row2['gambar4'])) {
        ?>
    <div class="carousel-item detail">
        <img class="d-block w-100" src="<?php echo $row2['gambar3']?>" alt="Third slide">
    </div>
        <?php
      }
      ?>
   
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <?php }} ?>
  </div>

  <div class="col-md-4">
    <h3>Rp <?php echo $row['harga']?></h3>
    <h3 class="my-3">Deskripsi Produk</h3>
    <p><?php echo $row['deskripsi']?></p>
    <h3 class="my-3">Spesifikasi</h3>
    <ul>
      <li>Kategori : <?php echo $row['kategori']?></li>
      <li>Asal Negara : <?php echo $row['negara']?></li>
    </ul>
    <p>Masukan jumlah yang diinginkan</p>
    <input type="number" class="input-wish" placeholder="1" min="1" max="100">
    <button class='btn btn-info w-100' type='button'>Masukan kedalam keranjang</button>
    <br><br>
    <button class='btn btn-success w-100' type='button'>Beli Sekarang</button>
  </div>
  
</div>
<!-- /.row -->
 
<!-- Related Projects Row -->
<h3 class="my-4">Barang terkait</h3>

<div class="row">

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="http://placehold.it/500x300" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="http://placehold.it/500x300" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="http://placehold.it/500x300" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="http://placehold.it/500x300" alt="">
    </a>
  </div>

</div>
<!-- /.row -->
<?php }} ?>
</div>
<!-- /.container -->