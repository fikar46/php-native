<!DOCTYPE html>
<html lang="en">
  <?php
  include_once 'component/head.php';
  ?>
<body>
  <?php
  include_once 'component/navigation.php';
  error_reporting(0);
 
  $request = $_SERVER['REQUEST_URI'];
switch ($request) {
    case '/' :
        require __DIR__ . '/screen/homepage.php';
        break;
    case '' :
        require __DIR__ . '/screen/homepage.php';
        break;
     case '/index.php' :
        require __DIR__ . '/screen/homepage.php';
        break;
    case '/about' :
        require __DIR__ . '/screen/about.php';
        break;
    case '/services' :
        require __DIR__ . '/screen/services.php';
        break;
    case '/contact' :
        require __DIR__ . '/screen/contact.php';
        break;
    case '/all-country' :
        require __DIR__ . '/screen/country.php';
        break;
    case '/login' :
        require __DIR__ . '/screen/login.php';
        break;
     case '/register' :
        require __DIR__ . '/screen/register.php';
        break;
     case '/logout' :
        require __DIR__ . '/src/backend/action/logout.php';
        break;
    case "/product-country?country=$_GET[country]" :
        require __DIR__ . '/screen/product-country.php';
        break;
    case "/product-detail?id=$_GET[id]" :
        require __DIR__ . '/screen/product-detail.php';
        break;
    case "/checkout?id_product=$_GET[id_product]&&number_of_product=$_GET[number_of_product]";
        require __DIR__ . '/screen/checkout.php';
        break;
    case "/checkout";
        require __DIR__ . '/screen/checkout.php';
        break;
    case '/cart' :
        require __DIR__ . '/screen/cart.php';
        break;
    default: 
        require __DIR__ . '/screen/404.html';
        break;
}
    if($request !== '/login' && $request !== '/register' && $request !== '/cart' ){
      include_once 'component/footer.php';
    }
?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
