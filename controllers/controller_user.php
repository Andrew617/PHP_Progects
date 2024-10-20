<?php
require_once '/home/andrew/PHP_Progects/stihi/model/model_user.php';
class Controller_user 
{
    
    public $modelUser;

    public function __construct()
    {
        $this -> modelUser = new Model_user;
    }
    
    private function createPasswordhash($password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT); 
        return $hash;
    }
    
   private function createColumnset($biographyUpdateList)
    {
        $columns = '';
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
            $data.= str_replace("%value%",  $value, "'"."%value%"."'".","." ");
        }
        $dataSet = rtrim($data, ",\ ");
        return $dataSet;
    }
          
    
    
   private function createPDOset($biographyUpdateList) {
        if (count($biographyUpdateList) >1)
        {
        $columnSet = $this -> createColumnset($biographyUpdateList);
        $dataSet = $this -> createDataset($biographyUpdateList);
        $PDOset = "(".$columnSet.")"." "."="." "."(".$dataSet.")"; 
        }
        else
        {
        $columnSet = $this -> createColumnset($biographyUpdateList);
        $dataSet = $this -> createDataset($biographyUpdateList);
        $PDOset = $columnSet." "."="." ".$dataSet;
        }
        
       return $PDOset; 
    }
    
    private function exchangeNullFromString($v){
            if ($v == '')
            {   
            $v = 'Пользователь предпочёл удалить эти сведения';
            }
        return $v;
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
        return $oneArray;
        }
    }

    function getAllusersID()
        {
        $allId = $this -> modelUser -> getAllUsersID();
        
        return $allId;
        }
    
    function getAllusersNick()
    {
        $nicks = $this -> modelUser -> getAllUsersNick();
        return $nicks;
    }
    
    function getUserIdFromNick($nick)
    {
        $oneArray = array();
        $nameArr = array($nick);
        $idarr = $this -> modelUser -> selectUserFromNick($nameArr);
        $id = array_merge($oneArray, ...$idarr);
        return $id;
    }
    
    function getUserFromId($id)
    {
        $oneArray = array();
        $idarr = array($id);
        $userArr = $this -> modelUser -> selectUserFromId($idarr);
        if (empty($userArr)){
            header("Location: HTTP/1.1 404 Not Found");
        }
        else {
        $user = array_merge($oneArray, ...$userArr);
        $userWithoutNull = array_map('Controller_user::exchangeNullFromString',$user);
        return $userWithoutNull;
        }
        
    }
    
    
    function update($biographyUpdateList, $id) {
            $idarr = array($id);
            $pdoSet = $this -> createPDOset($biographyUpdateList);
            $this -> modelUser -> updateUser($pdoSet, $idarr);
        }   
    
    function getUsers()
    {
    $users = $this -> modelUser -> get_all_users();
    return $users;
    }
    
    function entry ($nick, $password) {
        $nickArr = array($nick);
        $enter = $this -> modelUser -> entry_in_page($nickArr);
        foreach ($enter as $apass){
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
        $this -> modelUser -> entryNewUser($columnSet, $newUserWithoutEmpty, $placeHoldersString);
    }

}
