<?php
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';

    class Rout {

        public $users;
        public $poems;
       
        
        
        public function __construct()
        {
            $this -> users = new Controller_user;
            $this -> poems = new Controller_stihi;
        }
    
        public function rout($get)
        {
            if (empty($get)){
                include_once '/home/andrew/PHP_Progects/stihi/views/Main_view.php';
        }
            else if ($get['controller']=='user'){
                $usersId = $this -> users -> getAllusersID();  
                if (in_array($get['id'], $usersId))
                {
                include_once '/home/andrew/PHP_Progects/stihi/views/user_view.php';  
                }
                else if (isset($get['nick'])){
                    $id = $this -> users -> getUserIdFromNick($get['nick']);
                    header ("Location: http://stihi?controller=user&id=".$id['id']);
                }
                else {
                
                header("Location: HTTP/1.1 404 Not Found");
            }
            }
            else if ($get['controller']=='poem') 
            {
            $allPoemsId = $this -> poems -> getAllpoemsId();
            if (in_array($get['poem_id'], $allPoemsId))
            {
            include_once '/home/andrew/PHP_Progects/stihi/views/poem_view.php';   
            }
            else if(isset($get['poem_text']))
            {
            $id = $this -> poems -> getPoemIdFromPoemName($get['poem_text']);
            header ("Location: http://stihi?controller=poem&poem_id=".$id['0']);
            } 
            else {
                header("Location: HTTP/1.1 404 Not Found");
            }
            }
            else if($get[controller]=='entry' & $get['id']=='key')
            {
            include_once '/home/andrew/PHP_Progects/stihi/views/entry_form.html';
            }    
            else {header("Location: HTTP/1.1 404 Not Found");}
        }
    }
    