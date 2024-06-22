<?php
session_start();
if (isset($_SESSION[id])){
    echo 'добро пожаловать',  $_SESSION[id];
    require_once '/home/andrew/PHP_Progects/stihi/views/my_form.php';
    if (empty($_POST) == TRUE) {
        unset($_SESSION[id]);
}
}
else{
require_once '/home/andrew/PHP_Progects/stihi/route.php';
$get = $_GET;
$url = $_SERVER['REQUEST_URI'];
echo $get;
rout($get, $url);
print($url);
}?>
