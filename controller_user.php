<?php
require_once '/home/andrew/PHP_Progects/stihi/model/model_user.php';
class Controller_user extends Model_user {
    
    private function createPasswordhash($password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT); 
        return $hash;
    }
    
    private function createColumnset($biographyUpdateList)
    {
        foreach (array_keys($biographyUpdateList) as &$column)  {
            $columns.= str_replace("%column%",  $column, "%column%"." ");
            $columnArr = explode(" ", $columns);   
        }
        $newColumnSet = array_pop($columnArr);
        $columnSet = implode(", ",  $columnArr);
        return $columnSet;
    }   
    
    private function getPlaceHoldersString($biographyUpdateList)
    {
        foreach(array_keys($biographyUpdateList) as $q)
        { 
        $qq.= str_replace("%q%",  $q, ":"."%q%"." ");
        }
        $qArr= explode(' ', $qq);
        print_r($qArr);
        array_pop($qArr);
        $placeHoldersString = implode(', ', $qArr);
        return "(".$placeHoldersString.")";
    }
    
    
    private function createDataset($biographyUpdateList)
    {
        foreach ($biographyUpdateList as &$value) {
            $data.= str_replace("%value%",  $value, "'"."%value%"."'"." ");
            $dataArr = explode(" ", $data);
        }
        $newDataset = array_pop($dataArr);
        $dataSet = implode(",", $dataArr);
        return $dataSet;
    }
          
    
    
   private function createPDOset($biographyUpdateList) {
        $columnSet = $this -> createColumnset($biographyUpdateList);
        $dataSet = $this -> createDataset($biographyUpdateList);
        $PDOset = "(".$columnSet.")"." "."="." "."(".$dataSet.")";
       return $PDOset; 
    }
    
    
    function getAllusersID()
        {
        $allId = Model_user::getAllUsersID();
        return $allId;
        }
    
    function getAllusersNick()
    {
        $nicks = Model_user::getAllUsersNick();
        return $nicks;
    }
    
    function getUserIdFromNick($name)
    {
        $nameArr = array($name);
        $id = Model_user::selectUserFromNick($nameArr);
        return $id;
    }
    
    function getUserFromId($id)
    {
        $idarr = array($id);
        $user = Model_user::selectUserFromId($idarr);
        return $user;
    }
    
    
    function update($biographyUpdateList, $id) {
        if (isset($biographyUpdateList)) {
            $pdoSet = $this -> createPDOset($biographyUpdateList);
            Model_user::updateUser($pdoSet, $id);
        }   
    } 
    
    function getUsers()
    {
    $users = Model_user::get_all_users();
    return $users;
    }
    
    function entry ($nick, $password) {
        $nickArr = array($nick);
        $a = Model_user::entry_in_page($nickArr);
        $hash = $a['password'];
        $veryfe = password_verify($password, $hash);
        print($veryfe);
        return $veryfe;    
    }

    function createNewuser($newUser)
    {
        $hash = $this -> createPasswordhash($newUser['password']);
        $newUser['password'] = $hash;
        $newUserWithoutEmpty = array_filter($newUser);
        $columnSet = $this -> createColumnset($newUserWithoutEmpty);
        $placeHoldersString = $this -> getPlaceHoldersString($newUserWithoutEmpty);
        Model_user::entryNewUser($columnSet, $newUserWithoutEmpty, $placeHoldersString);
    }

}


$a = new Controller_user;
#$newUser = array( 'nick' => 'Mikel', 'name' => 'Михаил', 'profession' => 'Поэт', 'biography' => 'Воевал на Кавказе. Пишу стихи, и, реже, прозу.', 'password' => '33W22');
#$b = $a -> createNewuser($newUser);
$name = 'Тест';
$password = '123№456';
#$id = 25;
#$b = $a -> getUserFromId($id);
#print_r($b);
$c = $a -> entry ($name, $password);
print_r($c);