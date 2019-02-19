<div class="filter-card">
  <h4 class="mt-4 mb-3">filter
</h4>
    <h5>Sort by:</h5>
    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 
  <?php 
  $countrName = $dbh->prepare("SELECT * FROM negara where id = $_GET[country]");
  $countrName->execute();
    while($rows=$countrName->fetch()) {
     
        echo $rows["nama"];
      
    }
  ?>
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <?php 
  $countrName = $dbh->prepare("SELECT * FROM negara");
  $countrName->execute();
    while($rows=$countrName->fetch()) {
     if($rows["id"]!==$_GET["country"]){
     ?>
        <a class="dropdown-item" href="product-country?country=<?php echo $rows["id"] ?>"><?php echo $rows["nama"] ?></a>
      <?php
    }}
  ?>
    <!-- <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a> -->
  </div>
  <div class="list">
    
    <ul class="list-group">
      <li class="list-category" style="list-style-type:none;"><a href="#" class="text-secondary">Kategori:</a></li>
      <li  style="list-style-type:none;"><a href="product-country?country=<?php echo $_GET['country'] ?>" class="text-secondary">All</a></li>
      <?php 
       $category = $dbh->prepare("SELECT * FROM kategori_produk");
       $category->execute();
       while($rows=$category->fetch()) {
      ?>
      <li style="list-style-type:none;"><a href="product-country?country=<?php echo $_GET['country'] ?>&&kategori=<?php echo $rows['id']?>" class="text-secondary"><?php echo $rows["nama"]?></a></li>
       <?php } ?>
    </ul>
    
    
  </div>
</div>
    </div>