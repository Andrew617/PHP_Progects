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
        $columcs = '';
        foreach (array_keys($biographyUpdateList) as &$column)  {
            $columns.= str_replace("%column%",  $column, "%column%".","." ");
        }
        $columnSet = rtrim($columns, ",\ ");
        return $columnSet;
    }   
    
   private function getPlaceHoldersString($biographyUpdateList)
    {
        $qq='';
        foreach(array_keys($biographyUpdateList) as $q)
        {  
        $qq.= str_replace("%q%",  $q, ":"."%q%".","." ");
        }
        $placeHoldersString = rtrim($qq, ",\ ");
        return "(".$placeHoldersString.")";
    }
    
    
    private function createDataset($biographyUpdateList)
    {
        $data = '';
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
    
    function createOneArrayByArrays($arr)
    {
        $oneArray = array();
        foreach ($arr as $a)
        {
            foreach ($a as $column)
            {
                $oneArray[] = $column; 
            }
        }
    return $oneArray;
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
    
    function getUserIdFromNick($nick)
    {
        $oneArray = array();
        $nameArr = array($nick);
        $idarr = Model_user::selectUserFromNick($nameArr);
        $id = array_merge($oneArray, ...$idarr);
        return $id;
    }
    
    function getUserFromId($id)
    {
        $oneArray = array();
        $idarr = array($id);
        $userArr = Model_user::selectUserFromId($idarr);
        $user = array_merge($oneArray, ...$userArr);
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
        foreach ($a as $apass){
            $hash = $apass['password'];
            $veryfe = password_verify($password, $hash); #возможно есть решение лучше. Но работает
        }
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


#$a = new Controller_user;
#$newUser = array( 'nick' => 'Mikel', 'name' => 'Михаил', 'profession' => 'Поэт', 'biography' => 'Воевал на Кавказе. Пишу стихи, и, реже, прозу.', 'password' => '33W22');
#$nick = 'Mikel';
#$b = $a -> getUserIdFromNick($nick);
#print_r($b);