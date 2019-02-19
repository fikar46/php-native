<!-- Page Content -->
<div class=" ">

<!-- Page Heading/Breadcrumbs -->



<div class="row">
  <div class="col-lg-3">
  <?php include "./component/filter.php";?>
  </div>
  <div class="col-lg-9">
  <h1 class="mt-4 mb-3">Produk Berdasarkan Negara
</h1>
    <div class="row">
  <?php 
  $page = (isset($_GET['page']))? $_GET['page'] : 1;
  $limit = 12;
  $limit_start = ($page - 1) * $limit;
  if(!isset($_GET["kategori"])){
$country = $dbh->prepare("SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id WHERE n.id = $_GET[country] LIMIT $limit_start,$limit");
  }else{
    $country = $dbh->prepare("SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id WHERE n.id = $_GET[country] AND kp.id = $_GET[kategori] LIMIT $limit_start,$limit");  
  }
$country->execute();
if($country->rowCount()>0){
  while($row=$country->fetch()) {
    ?>
  <div class="col-lg-4 col-sm-6 portfolio-item">
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
        <p class="card-text">Rp <?php echo $row['harga']?></p>
      </div>
    </div>
  </div>
  <?php
  }
}
?>
  </div>
  </div>


  </div>
</div>

<!-- Pagination -->
<?php include "./component/pagination.php";?>

</div>
<!-- /.container -->