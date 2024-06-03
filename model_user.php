<?php
require_once '/home/andrew/PHP_Progects/stihi/model/model.php';

class Model_user extends Model {
    
    
    function selectUserFromId ($id) {
        $sqlCommand = 'SELECT nick, name, surname, profession, biography FROM passwords WHERE id = ?';
        $selector_user = Model::getResult($sqlCommand, $id);
        return $selector_user;
    }
    
    function selectUserFromNick($nick)
    {
        $sqlCommand = 'SELECT id FROM passwords WHERE nick = ?';
        $selector_user = Model::getResult($sqlCommand, $nick);
        return $selector_user;
    }
    
    function getAllUsersID(){
        $sqlCommand = 'SELECT id FROM passwords';
        $allUsersID = Model::GetAll($sqlCommand);
        return $allUsersID;
    }
    
    function getAllUsersNick(){
        $sqlCommand = 'SELECT nick FROM passwords';
        $allUsersID = Model::GetAll($sqlCommand);
        return $allUsersID;
    }
    
    function get_all_users(){
        $sqlCommand = 'SELECT nick FROM passwords';
        $allUsers = Model::GetAll($sqlCommand);
        return $allUsers;
    }


    function entryNewUser($columnSet, $dataset, $placeHoldersString){
        $sqlCommand = "INSERT INTO passwords"." "."(".$columnSet.")"." "."VALUES"." ".$placeHoldersString;
        Model::createOrEditEntry($sqlCommand, $dataset);
    }
    
    
    function updateUser($pdoSet, $id)
        {   
            $sqlCommand = "UPDATE passwords SET"." ".$pdoSet." "."WHERE id = :id";
            echo $sqlCommand;
            Model::createOrEditEntry($sqlCommand, $id);
        }                                                        

    function entry_in_page($nick)
        {
        $sqlCommand = "SELECT password FROM passwords WHERE nick = ?";
        $userVer = Model::getResult($sqlCommand, $nick);
        return $userVer;
        }

}
