<center>
  <h2>Lihat request berdasarkan negara</h2>
</center>
<hr>
<div class="row">
<?php 
require_once('./src/route/config.php');
$country = "SELECT * FROM negara LIMIT 6";
$sql = mysql_query($country);
if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)) {
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
