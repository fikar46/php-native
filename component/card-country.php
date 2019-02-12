<center>
  <h2>Lihat request berdasarkan negara</h2>
</center>
<div class="row">
<?php 
require_once('./src/route/config.php');
$country = "SELECT * FROM negara LIMIT 6";
$sql = mysql_query($country);
if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)) {
    ?>
    <div class="col-lg-4 col-sm-6 portfolio-item">
      <div class="card h-100">
        <a href="product-country"><img class="card-img-top" src="./image/negara/<?php echo $row['gambar']?>" alt=""></a>
      </div>
    </div>
    <?php
  }
}
?>
</div>
