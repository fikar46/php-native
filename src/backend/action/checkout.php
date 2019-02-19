<?php 
include_once('../../route/config.php');
date_default_timezone_set("Asia/Jakarta");
 if(isset($_POST['buttonpress'])&&isset($_POST['resultArray'])){
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $alamatInput =  $dbh->prepare("insert into alamat (first_name,last_name,email,address,address2,state,zip)values (?,?,?,?,?,?,?)");
    $alamatInput->execute(array($firstName,$lastName,$email , $address , $address2,$state,$zip));
    $date = date("Y-m-d H:i:sa");
    $getDatacart = $dbh->prepare("SELECT * FROM cart WHERE user ='$firstName'");
    $getDatacart->execute();
    while($row = $getDatacart->fetch()){
        $inputDataHistory =  $dbh->prepare("insert into history (id_product,user,qty,status,date) values (?,?,?,'belum dibayar',?)");
        $inputDataHistory->execute(array($row['id_product'],$email ,$row['qty'],$date));
    }
    $deleteDatacart = $dbh->prepare("DELETE FROM cart WHERE user ='$firstName'");
    $deleteDatacart->execute();
    if($deleteDatacart){
        header("location:/checkout");
    }else{
        echo "<h1>ERRORS</h1>";
    }
}else{
    if(isset($_POST['idproduct'])&&isset($_POST['qty'])){
        $date = date("Y-m-d H:i:sa");
        $email = $_POST['email'];
        $id = $_POST['idproduct'];
        $qty = $_POST['qty'];
        $inputDataHistory =  $dbh->prepare("insert into history (id_product,user,qty,status,date) values (?,?,?,'belum dibayar',?)");
        $inputDataHistory->execute(array($id,$email ,$qty,$date));
        if($inputDataHistory){
            header("location:/");
        }else{
            echo "<p>tidak masuk history</p>";
        }
       
    }else{
        echo "<p>tidak masuk</p>";
    }
}
?>