<?php
require_once '/home/andrew/PHP_Progects/stihi/config.php';
class Model {
    
    private $host= HOST; 
    private $dbname=DB_NAME; 
    private $user=USER; 
    private $password=PASSWORD;
    
    
    
    private function create_new_connect() 
    { 
    try { $dsn = "pgsql:host = {$this -> host}; port=5432; dbname = {$this -> dbname};  user = {$this -> user}; password= {$this -> password}";
    $dbconn = new PDO ($dsn);
    return $dbconn;
    }
    catch (PDOException $e){
        $e -> getMassage('Error in the data base');
    }
    }
    
    function getResult($sqlCommand, $values)#возвращает результат параметризованного запроса
    { 
    $connect = $this -> create_new_connect();
    $result = $connect -> prepare($sqlCommand);
    $result -> execute($values);
    $debag = $result -> debugDumpParams(); #нужно для отладки, в дальнейшем использоваться не будет
    #echo $debag;
    #$result->setFetchMode(PDO::FETCH_ASSOC);
    $myData = $result -> fetch(PDO::FETCH_ASSOC);
    return $myData;
    $connect = null;   
    }

   
    function GetAll($sqlCommand) #получить все записи из БД
   {
    $connect = $this -> create_new_connect();
    $result = $connect -> prepare($sqlCommand);
    $result -> execute();
    $usersNick = $result -> fetchAll(PDO::FETCH_COLUMN);
    return $usersNick;
    $connect = null;
    }
    
    function createOrEditEntry($sqlCommand, $values)#Создаёт или редактирует записи в БД
    {
        $connect = $this -> create_new_connect();
        $newUser = $connect -> prepare($sqlCommand);
        $newScript = $newUser -> execute($values);
        $debag = $newUser -> debugDumpParams(); #нужно для отладки, в дальнейшем использоваться не будет
        echo $debag;
        #return $newScript;
        $connect = null;
    }

}

#print_r(PDO::getAvailableDrivers());   



