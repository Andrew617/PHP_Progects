<!DOCTYPE html>
<form method="POST">
        <input type = "text" name="nick" rows="50" cols="20" placeholder="Ник*"><br><br>
        <input type = "text" name="name" placeholder="Имя"><br><br>
        <input type = "text" name="surname" placeholder="Фамилия"><br><br>
        <input type = "text" name="profession" placeholder="Ваш основной род занятий"><br><br>
        <textarea wrap = "hard" rows="100" cols="100" name="biography" placeholder="Напишите, что хотели бы рассказать о себе?"></textarea><br><br>    
        <input type = "password" name="password" placeholder="Пароль*"><br><br>
        <h5>NB! Поля под * обязательны для заполнения</h5><br><br>
        <input type="submit" value="ОТПРАВИТЬ"></form> 
    
<p>
<?php 
    $newUser = $_POST;               
    print_r($newUser);
    if (!empty($newUser)) {
        include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
        $userss = new Controller_user;
        $userss -> createNewuser($newUser); 
    } 
   
