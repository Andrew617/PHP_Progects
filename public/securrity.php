<?php 
session_start();
$post = $_POST;
if (!empty($post[nick]) && !empty($post[password])){
    include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
    $a = new Controller_user;
    $b = $a -> entry ($post[nick], $post[password]);
    $userId = $a -> getUserIdFromNick($post[nick]);
    if($b==TRUE){
        $_SESSION[id]= $userId;
        header("Location: index.php");
    }
    else {
        echo "Вы ввели не верный логин или пароль. Пожалуйста будьте внимательнее";
        header("Location: http://stihi/?controller=entry&nick=key");
    }
}
else
{
    header("Location: http://stihi/?controller=entry&nick=key"); 
}
