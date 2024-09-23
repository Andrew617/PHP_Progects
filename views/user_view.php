<!DOCTIPE html>
<head>
<h3>Пользователь</h3>
<meta charset="utf-8">
<img src="2311_mainfoto_03.jpg" align="right">  
<p>
<?php include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
include_once '/home/andrew/PHP_Progects/stihi/controllers/controller_stihi.php';
//include_once '/home/andrew/PHP_Progects/stihi/views/template.css';
$a = new Controller_user;
$b = new Controller_stihi;
$user = $a -> getUserFromId($get['id']);
$poems = $b -> getAllpoemsFromUser($user['nick']);?>
<p> Имя: <?php echo $user['name'];?><br><br>
Фамилия: <?php echo $user['surname'];?><br><br>
Биография:<br> <?php echo $user['biography'];?><br><br>
Профессия: <br><?php echo $user['profession'];?><br><br>
Произведения: <br><?php foreach ($poems as &$poem) {
    echo '<a href = "http://stihi?controller=poem&poem_text=',urlencode($poem),' "> ',$poem,'</a>';
}?><br><br>
 <head>
<button type = "button" onclick = "sendRequestFromGetMethod()"><?PHP echo $poem;?></button>
<script src = 'stihi.js'> 
let path = 'http://stihi';
let args1 = 'poem_id';
let args2 = <?PHP echo $poem;?>;
button.onclick = sendRequestFromGetMethod();
</script>
 </head>
 <title><?php if ($user['name'] == 'пользователь предпочёл не указывать своё имя'|| $user['name'] == Null) {echo 'autor id'.' '.$get['id'];}
 else {echo $user['name'];}?></title>
