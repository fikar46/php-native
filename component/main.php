


<!-- Portfolio Section -->
<h2>Produk Terbaru</h2>

<div class="row">
<?php 
require_once('./src/route/config.php');
$country = "SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id LIMIT 9";
$sql = mysql_query($country);
if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)) {
    ?>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <a href="product-detail?id=<?php echo $row['id']?>">
      <?php 
      require_once('./src/route/config.php');
      $image = "SELECT gp.gambar as gambar FROM produk p JOIN gambar_produk gp on p.id = gp.id_produk where p.id = $row[id] LIMIT 1";
      $sql2 = mysql_query($image);
      if(mysql_num_rows($sql2)>0){
        while($row2 = mysql_fetch_assoc($sql2)){
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
