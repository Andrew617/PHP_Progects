<?php
$get = $_GET;
print($get);
if (empty($get)){
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
$controllerUserObj = new Controller_user;
$users = $controllerUserObj -> getAllusersID();
$usersFromJson = json_encode($users);
print($usersFromJson);
}
else if(!empty($get))
{
    require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
    $controllerStihiObj = new Controller_stihi;
    $poem = $controllerStihiObj -> getOnePoem($get['poem_id']);
    echo $poem['1'];
}