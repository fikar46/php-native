

  <?php 
  if(!isset($_COOKIE['user'])) {
   ?>
     <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top"  id="custom-nav">
    <div class="container-navbar container w-100">
    <a class="navbar-brand" href="/"><img class="img-responsive logo logo-warehouse" src="./image/logo.jpeg" widht="50px" height="50px"/>Warehousenesia</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
            <a class="nav-link" href="how-it-works">How It Works</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services">Testimonial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contact</a>
          </li>
          
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   <?php
} else {
  include_once './src/route/config.php';
  $cart = $dbh->prepare("SELECT * FROM cart WHERE USER='$_COOKIE[user]'");
  $cart->execute();
  $cek =$cart->rowCount();
?>
  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top" id="custom-nav">
    <div class="container container-navbar w-100">
    <a class="navbar-brand" href="/"><img class="img-responsive logo logo-warehouse" src="./image/logo.jpeg" widht="50px" height="50px"/>Warehousenesia</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
        
           <li class="nav-item">
            <a class="nav-link" href="how-it-works">How It Works</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contact</a>
          </li>
          </ul>
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <a class="nav-link" href="cart"><i class='far fa-heart'></i><i class='notif-badge'><?php echo $cek?></i></a>
          </li>
          <li class="nav-item">
           
            <a class="nav-link" href="cart">Cart<i class='fas fa-shopping-cart'></i><i class='notif-badge'><?php echo $cek?></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_COOKIE['user']?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="profile">Profile</a>
              <a class="dropdown-item" href="logout">Log Out</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>    
<?php
}
  ?>