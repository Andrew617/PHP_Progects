<!DOCTIPE html>
<head>
<h3>Пользователь</h3>
<meta charset="utf-8">
<img src="/home/andrew/PHP_Progects/stihi/public/images/2311_mainfoto_03.jpg" align="right">  
<p>
<?php include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi';
$a = new Controller_user;
$b = new Controller_stihi;
$user = $a -> getUserFromId($get['id']);
$poems = $b -> getAllpoemsFromUser($user['nick']);?>
<p> Имя: <?php echo $user['name'];?><br><br>
Фамилия: <?php echo $user['surname'];?><br><br>
Биография:<br> <?php echo $user['biography'];?><br><br>
Профессия: <br><?php echo $user['profession'];?><br><br>
Произведения: <br> <?php print_r($poems); ?><br><br>


