<!-- Page Content -->
<div class="container">

<!-- Page Heading/Breadcrumbs -->
<h1 class="mt-4 mb-3">Request berdasarkan Negara
</h1>
<hr>

<div class="row">
<?php 
$country = $dbh->prepare("SELECT * FROM negara");
$country->execute();
  while($row = $country->fetch()) {
    ?>
  <div class="col-lg-6 portfolio-item">
    <div class="card h-100">
      <a href="product-country?country=<?php echo $row['id']?>"><img class="card-img-top" src="./image/negara/<?php echo $row['gambar']?>" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="product-country?country=<?php echo $row['id']?>" style="text-decoration:none "><?php echo $row['nama']?></a>
        </h4>
      </div>
    </div>
  </div>
  <?php
  }
?>
<!-- /.row -->

<!-- Pagination -->
<!-- <ul class="pagination justify-content-center">
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
</div>
<!-- /.container -->