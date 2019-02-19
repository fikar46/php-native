


<!-- Portfolio Section -->
<center><h2>Produk Terbaru</h2></center>
<br>

<div class="row">
<?php 
$country =  $dbh->prepare("SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id LIMIT 4");
$country->execute();
if($country->rowCount()>0){
  while($row=$country->fetch()) {
    ?>
  <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <a href="product-detail?id=<?php echo $row['id']?>">
      <?php 
      $image = $dbh->prepare("SELECT gp.gambar as gambar FROM produk p JOIN gambar_produk gp on p.id = gp.id_produk where p.id = $row[id] LIMIT 1");
      $image->execute();
      if($image->rowCount()>0){
        while($row2 = $image->fetch()){
          ?>
           <img class="card-img-top"  src="<?php echo $row2['gambar']?>" alt="">
          <?php
        }
      }
      ?>
     
    </a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="product-detail?id=<?php echo $row['id']?>">
          <?php echo $row['nama']?>
        </a>
        </h4>
        <p class="card-text"><?php echo $row['deskripsi']?></p>
        <p class="card-text">Asal negara: <?php echo $row['negara']?></p>
        <p class="card-text">Rp <?php echo $row['harga']?></p>
      </div>
    </div>
  </div>
  <?php
  }
}
?>
</div>
<!-- /.row -->


<!-- /.row -->



<!-- /.container -->
