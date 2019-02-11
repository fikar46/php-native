<!DOCTYPE html>
<html lang="en">
  <?php
  include_once 'component/head.php';
  ?>
<body>
  <?php
  include_once 'component/navigation.php';
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
    case '/product-country' :
        require __DIR__ . '/screen/product-country.php';
        break;
    case '/product-detail' :
        require __DIR__ . '/screen/product-detail.php';
        break;
    default: 
        require __DIR__ . '/screen/404.html';
        break;
}
    if($request !== '/login' && $request !== '/register' ){
      include_once 'component/footer.php';
    }
?>
</body>

</html>
