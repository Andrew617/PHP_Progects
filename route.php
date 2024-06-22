<?php
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
function rout($get, $url)
{   $users = new Controller_user;
    $getUsers = $users -> getAllusersID();
    $getUsersNicks = $users -> getAllusersNick();
    $poems = new Controller_stihi;
    $allPoems = $poems -> getAllpoemsId();
    
    if (empty($get)){
        include_once '/home/andrew/PHP_Progects/stihi/views/Main_view.php';
    }
    
    else if ($get[controller]=='user' & in_array($get[id], $getUsers)){
        include_once '/home/andrew/PHP_Progects/stihi/views/user_view.php';
    }
    else if ($get[controller]=='user' & in_array($get[nick], $getUsersNicks)){
        $id = $users -> getUserIdFromNick($get[nick]);
        header ("Location: http://stihi?controller=user&id=".$id[id]);
    }
    
    else if($get[controller]=='poem') {
        include_once '/home/andrew/PHP_Progects/stihi/views/poem_view.php';
    }
    else if ($get[id] == 'new')
    {
        include_once '/home/andrew/PHP_Progects/stihi/views/registration_view.php';
    }
    else if($get[controller]=='entry' & $get[id]=='key')
    {
        include_once '/home/andrew/PHP_Progects/stihi/views/entry_form.html';
    }
    
    
    #else header("Location: HTTP/1.1 404 Not Found");
}

