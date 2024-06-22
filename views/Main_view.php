
<!DOCTIPE html>
<h1>Стихи</h1>
<head>
<title> СТИХИ </title>
<title> Главная страница</title>
<img src="/home/andrew/PHP_Progects/stihi/public/images/2311_mainfoto_03.jpg" align="center">
<p>Авторы</p>
<?php require_once '/home/andrew/PHP_Progects/stihi/controllers/controller_user.php';
$users = new Controller_user;
$get_users = $users -> getAllusersNick();
foreach ($get_users as $us) {
    echo '<a href = "http://stihi?controller=user&nick=',urlencode($us),' "> ',$us,'</a>';
}
?><br><br>
<p><a href = "http://stihi?id=new" > зарегистрироваться </a> </p>
<p><a href = "http://stihi?controller=entry&id=key" > войти</a></p>

