<?php
require_once '/home/andrew/PHP_Progects/stihi/model/model.php';

class Model_stihi extends Model{
   

function createNewPoetry($values)
    {
    $sqlCommand = "INSERT INTO poems (id, poem_name, poem_text) VALUES (:id, :poem_name, :poem_text)";
    $dbconn = Model::createOrEditEntry($sqlCommand, $values);
    }


function selectPoemForId($poemId)
    {
    $sqlCommand = "SELECT poems.poem_name, poems.poem_text, passwords.name, passwords.surname, passwords.nick FROM poems LEFT OUTER JOIN passwords ON poems.id = passwords.id WHERE poem_id = ?"; 
    $poem = Model::getResult($sqlCommand, $poemId);
    return $poem;
    }

function getAllpoemsId()
    {
    $sqlCommand = "SELECT poem_id FROM poems";
    $poemsId = Model::GetAll($sqlCommand);
    return $poemsId;
    }

function getAllpoemsFromUser($nick)
    {
    $sqlCommand = "SELECT poem_name FROM passwords LEFT OUTER JOIN poems ON passwords.id = poems.id WHERE nick = ?";
    //$sqlCommand = "SELECT LEFT(poems.poem_text, 25) FROM passwords LEFT OUTER JOIN poems ON passwords.id = poems.id WHERE nick = ?";
    $allpoems = Model::getResult($sqlCommand, $nick);
    return $allpoems;
    }

function getPoemIdFromPoemText($poemText)
    {
    $sqlCommand = "SELECT poem_id FROM poems WHERE poem_name LIKE ?";
    $poemId = Model::getResult($sqlCommand, $poemText);
    return $poemId;
    }

}
#$poemText = array('В горах моё сердце%');
#$a = new Model_stihi;
#$b = $a -> getAllpoemsId();
#print_r($b);
#$poemName = array('Тестовое');
#$c = $a -> getPoemIdFromPoemText($poemText);
#print_r($c);