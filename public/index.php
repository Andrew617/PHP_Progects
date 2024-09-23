<?php
$get = $_GET;
$url = $_SERVER['REQUEST_URI'];
if (empty($get['controller']) && !empty($get['poem_id']))
{
require_once '/home/andrew/PHP_Progects/stihi/model/model_stihi.php';
$a = new Model_stihi;
$b = $a -> selectPoemForId($get['poem_id']);
}
else 
{
require_once '/home/andrew/PHP_Progects/stihi/route.php';
$rout = new Rout;
$rout -> rout($get);    
}?> 

