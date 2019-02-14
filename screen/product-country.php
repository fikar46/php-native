<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Produk Berdasarkan Negara
</h1>


<div class="row">
<?php 
require_once('./src/route/config.php');
$country = "SELECT p.id as id, p.nama as nama, p.deskripsi as deskripsi, p.harga as harga, kp.nama as kategori, p.negara as id_negara, n.nama as negara from produk p JOIN kategori_produk kp ON p.kategori = kp.id JOIN negara n ON p.negara = n.id WHERE n.id = $_GET[country]";
$sql = mysql_query($country);
if(mysql_num_rows($sql)>0){
  while($row = mysql_fetch_assoc($sql)) {
    ?>
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <a href="product-detail?id=<?php echo $row['id']?>"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="product-detail?id=<?php echo $row['id']?>"><?php echo $row['nama']?></a>
        </h4>
        <p class="card-text"><?php echo $row['deskripsi']?></p>
      </div>
    </div>
  </div>
  <?php
  }
}
?>
  </div>
</div>

<!-- Pagination
<ul class="pagination justify-content-center">
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Previous">
      <span aria-hidden="true">&laquo;</span>
      <span class="sr-only">Previous</span>
    </a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">1</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">2</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#">3</a>
  </li>
  <li class="page-item">
    <a class="page-link" href="#" aria-label="Next">
      <span aria-hidden="true">&raquo;</span>
      <span class="sr-only">Next</span>
    </a>
  </li>
</ul> -->

</div>
<!-- /.container -->