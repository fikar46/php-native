<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","warehousenesia");
    $query=mysqli_query($con, "select * from produk where nama LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['nama'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>