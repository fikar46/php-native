<?php

if(isset($_COOKIE['user'])):
    setcookie('user', '', time()-7000000, '/');
    setcookie('email', '', time() -7000000, "/");
endif;
header("location:/");
?>