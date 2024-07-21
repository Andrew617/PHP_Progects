<?php 
$post = $_POST;
    if (!empty($post['nick']) && !empty($post['password'])){
        include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
        $a = new Controller_user;
        $b = $a -> entry ($post['nick'], $post['password']);
        $userId = $a -> getUserIdFromNick($post['nick']);
        $idStr = strval($userId['id']);
        echo $idStr;
        if($b==TRUE){
            session_id($idStr);
            session_start();
            $_SESSION = ['name'=> $idStr];
            header("Location: my_form.php");
            exit();
        }
        else if($post=null && !empty($_SESSION['name']))
        {
        session_unset();
        session_destroy();
        header("Location: http://stihi");
        }
        else if($b==FALSE){
            echo "Вы ввели не верный логин или пароль. Пожалуйста будьте внимательнее";
            header("Location: http://stihi/?controller=entry&id=key");
        }
    }
    else
    {
        header("Location: http://stihi"); 
    }


