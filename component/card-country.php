<br>
<center>
  <h2>Produk berdasarkan negara</h2>
</center>
<hr>
<div class="row">
<?php 
$country = $dbh->prepare("SELECT * FROM negara LIMIT 6");
$country->execute();
if($country->rowCount()>0){
  while($row=$country->fetch()) {
    ?>
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card-country" style="background-image: url('./image/negara/<?php echo $row['gambar']?>')">
      
        <a href="product-country?country=<?php echo $row['id']?>" style="color:white; text-decoration:none ">
        <h2 class='negara'><?php echo $row['nama']?></h2>
        </a>
      </div>
    </div>
    <?php
  }
}
?>
</div>
