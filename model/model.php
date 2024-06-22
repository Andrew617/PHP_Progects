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
        throw new Exception('ERROR');
        echo $e -> getMessage();
    }
    }
    
    function getResult($sqlCommand, $values)#возвращает результат параметризованного запроса
    { 
    $connect = $this -> create_new_connect();
    $result = $connect -> prepare($sqlCommand);
    $result -> execute($values);
    $myData = $result -> fetchAll(PDO::FETCH_ASSOC);
    return $myData;
    $connect = null;   
    $result = null;
    }

   
    function GetAll($sqlCommand) #получить все записи из БД
   {
    $connect = $this -> create_new_connect();
    $result = $connect -> prepare($sqlCommand);
    $result -> execute();
    $usersNick = $result -> fetchAll(PDO::FETCH_COLUMN);
    return $usersNick;
    $connect = null;
    $result = null;
    }
    
    function createOrEditEntry($sqlCommand, $values)#Создаёт или редактирует записи в БД
    {
        $connect = $this -> create_new_connect();
        $newScript = $connect -> prepare($sqlCommand);
        $newScript -> execute($values);
        $connect = null;
        $newScript = null;
    }

}

#print_r(PDO::getAvailableDrivers());   



