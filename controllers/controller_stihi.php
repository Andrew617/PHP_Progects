<?php
require_once '/home/andrew/PHP_Progects/stihi/model/model_stihi.php';
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';

class Controller_stihi extends Model_stihi {

    private function createOneArrayByArrays($arr)
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
    
    function getOnePoem($poemId)
    {
    $poemIdA = array($poemId);
    $poem = Model_stihi::selectPoemForId($poemIdA);
    $poem = $this -> createOneArrayByArrays($poem);
    return $poem;
    }

    
    function wrightPoem($id, $poem_name, $poem_text)
    {
    $values = array($id, $poem_name, $poem_text);
    Model_stihi::createNewPoetry($values);
    }

    function getAllpoemsFromUser($nick)
    {
    $nickArr = array($nick);
    $poemsFromUser = Model_stihi::getAllpoemsFromUser($nickArr);
    $AllpoemsFromUser = $this -> createOneArrayByArrays($poemsFromUser);
    return $AllpoemsFromUser;
    }

    function getAllpoemsId()
    {
    $allPoems = Model_stihi::getAllpoemsId();
    return $allPoems;
    }

    function getPoemIdFromPoemText($poemText)
    {
    $poemText = $poemText.'%';
    $array = array();
    $poemNameArr = array($poemText);
    $arrayPoemId = Model_stihi::getPoemIdFromPoemText($poemNameArr);
    $Controller_user = new Controller_user;
    $arrayId = $Controller_user -> createOneArrayByArrays($arrayPoemId);
    return $arrayId;
    }

}
//$poemText = 'В горах моё сердце';
//$poemId = '1';
//$a = new Controller_stihi;
//$b = $a -> getOnePoem($poemId);
//print_r($b);