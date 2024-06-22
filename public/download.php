<?php 
session_start();
include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
$id = $_SESSION['id'];
$title = $_POST['title'];
$word = $_POST['word'];
if (!empty($_POST) && !empty($_SESSION))
{
    echo "<pre>$word;</pre>";
    require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
    $newControllerStihi = new Controller_stihi;
    $newControllerStihi -> wrightPoem($id, $title, $word);
}
