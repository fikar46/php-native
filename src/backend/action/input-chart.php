<?php 
require_once('../../route/config.php');
 if(isset($_POST['cart'])&&(isset($_POST['number-product']))){
    date_default_timezone_set("Asia/Jakarta");
    $user = $_POST['user'];
    $produk = $_POST['product'];
    $number = $_POST['number-product'];
    $negara = $_POST['negara'];
    $date = date("Y-m-d H:i:sa");
    $insert = "insert into cart (user,id_product,qty,negara,date)values ('$user','$produk','$number','$negara','$date')";
   
    if(mysql_query($insert) === TRUE){
        header("location:/product-detail?id=$produk");
    }else{
        echo "<h1>ERRORS</h1>";
    }
}else{
    $produk = $_POST['product'];
    $number = $_POST['number-product'];
    header("location:/checkout?id_product=$produk&&number_of_product=$number");
}
?>