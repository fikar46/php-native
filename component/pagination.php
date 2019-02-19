
<ul class="pagination justify-content-center">
   <!-- LINK FIRST AND PREV -->
   <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li  class="disabled page-item"><a class="page-link" href="#">First</a></li>
          <li  class="disabled page-item"><a class="page-link" href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)? $page - 1 : 1;
          if(!isset($_GET["kategori"])){
        ?>
          <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&page=1">First</a></li>
          <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }else{
          ?>
           <li><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&kategori=<?php echo $_GET["kategori"]?>&&page=1">First</a></li>
          <li><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&kategori=<?php echo $_GET["kategori"]?>&&page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        } }
        ?>
        
        <!-- LINK NUMBER -->
  <?php
  if(!isset($_GET["kategori"])){
    $pagination = $dbh->prepare("SELECT COUNT(*) AS jumlah from produk where negara = $_GET[country]");
  }else{
    $pagination = $dbh->prepare("SELECT COUNT(*) AS jumlah from produk where negara = $_GET[country] AND kategori=$_GET[kategori]");
  }
  $pagination->execute();
  $get_jumlah = $pagination->fetch();
  $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
  $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
  
  for($i = $start_number; $i <= $end_number; $i++){
    $link_active = ($page == $i)? ' class="active page-item"' : '';
    if(!isset($_GET["kategori"])){
  ?>
    <li <?php echo $link_active; ?>><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php
  }else{
    ?>
    <li <?php echo $link_active; ?>><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&kategori=<?php echo $_GET["kategori"]?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php
  }}
  ?>
  
  <!-- LINK NEXT AND LAST -->
  <?php
  // Jika page sama dengan jumlah page, maka disable link NEXT nya
  // Artinya page tersebut adalah page terakhir 
  if($page == $jumlah_page){ // Jika page terakhir
  ?>
    <li class="disabled page-item"><a class="page-link" href="#">&raquo;</a></li>
    <li class="disabled page-item"><a class="page-link" href="#">Last</a></li>
  <?php
  }else{ // Jika Bukan page terakhir
    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
    if(!isset($_GET["kategori"])){
  ?>
    <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&page=<?php echo $link_next; ?>">&raquo;</a></li>
    <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&page=<?php echo $jumlah_page; ?>">Last</a></li>
  <?php
  }else{
    ?>
    <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&kategori=<?php echo $_GET["kategori"]?>&&page=<?php echo $link_next; ?>">&raquo;</a></li>
    <li class="page-item"><a class="page-link" href="product-country?country=<?php echo $_GET["country"] ?>&&kategori=<?php echo $_GET["kategori"]?>&&page=<?php echo $jumlah_page; ?>">Last</a></li>
    
    <?php
  }}
  ?>
</ul>