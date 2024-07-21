<?php 
session_start();
require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
$id = $_SESSION['name'];
print_r($id);
$title = $_POST['title'];
$word = $_POST['word'];
if (!empty($_POST) & !empty($id))
{
    echo "<pre>$word;</pre>";
    $newControllerStihi = new Controller_stihi;
    $newControllerStihi -> wrightPoem($id, $title, $word);
}
else {
    echo "Произошла ошибка";
} ?>
<a href = "http://stihi" > вернуться </a> </p>